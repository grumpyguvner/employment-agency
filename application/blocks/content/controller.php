<?php

namespace Application\Block\Content;

use \Concrete\Core\Block\BlockController;
use \Concrete\Core\Editor\LinkAbstractor;

/**
 * The controller for the content block.
 *
 * @package Blocks
 * @subpackage Content
 * @author Andrew Embler <andrew@concrete5.org>
 * @copyright  Copyright (c) 2003-2012 Concrete5. (http://www.concrete5.org)
 * @license    http://www.concrete5.org/license/     MIT License
 *
 */
class Controller extends BlockController {

    protected $btTable = 'btContentLocal';
    protected $btInterfaceWidth = "600";
    protected $btInterfaceHeight = "465";
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btSupportsInlineEdit = true;
    protected $btSupportsInlineAdd = true;
    protected $btCacheBlockOutputForRegisteredUsers = false;
    protected $btCacheBlockOutputLifetime = 0; //until manually updated or cleared
    
    protected $scrmableCount = 0;
    
    public function getBlockTypeDescription() {
        return t("HTML/WYSIWYG Editor Content.");
    }

    public function getBlockTypeName() {
        return t("Content");
    }

    function getContent() {
        return LinkAbstractor::translateFrom($this->content);
    }

    public function getSearchableContent() {
        return $this->content;
    }

    function br2nl($str) {
        $str = str_replace("\r\n", "\n", $str);
        $str = str_replace("<br />\n", "\n", $str);
        return $str;
    }

    public function registerViewAssets($outputContent) {
        if (preg_match('/data-concrete5-link-launch/i', $outputContent)) {
            $this->requireAsset('core/lightbox');
        }
    }

    public function view() {
        $this->set('content', $this->getContent());
    }

    function getContentEditMode() {
        return LinkAbstractor::translateFromEditMode($this->content);
    }

    public function add() {
        $this->requireAsset('redactor');
        $this->requireAsset('core/file-manager');
    }

    public function edit() {
        $this->requireAsset('redactor');
        $this->requireAsset('core/file-manager');
    }

    public function composer() {
        $this->requireAsset('redactor');
        $this->requireAsset('core/file-manager');
    }

    public function getImportData($blockNode) {
        $content = $blockNode->data->record->content;
        $content = LinkAbstractor::import($content);
        $args = array('content' => $content);
        return $args;
    }

    public function export(\SimpleXMLElement $blockNode) {
        $data = $blockNode->addChild('data');
        $data->addAttribute('table', $this->btTable);
        $record = $data->addChild('record');
        $cnode = $record->addChild('content');
        $node = dom_import_simplexml($cnode);
        $no = $node->ownerDocument;
        $content = LinkAbstractor::export($this->content);
        $cdata = $no->createCDataSection($content);
        $node->appendChild($cdata);
    }

    function save($args) {
        $args['content'] = LinkAbstractor::translateTo($args['content']);
        parent::save($args);
    }
    
        function iscramble_links ($html) {
                        $error = "''";
                        preg_match_all('/(<a\b[^>]*href=)\"(mailto:.*)\"([^>]*)>(.*)<\/a>/iU', $html, $matches, PREG_SET_ORDER);
                        
                        foreach ($matches as $val) {
                            $html = str_replace($val[0], self::iScramble($val[1] . '"' . $val[2] . '"' . $val[3] . "  rel=\"nofollow\">" . $val[4] . "</a>", 0, 0, ''), $html);
                        }
                        return $html;
	} // end function cutoffText

// end function
        
        function iScramble($plain, $longPwd = False, $rot13 = False, $sorry = "<em>[Please Enable JavaScript]</em>") {
        $iscramble_version = "1.0";

        $escaped = self::iScramble_escape($plain);
        if ($rot13) {
            $escaped = self::iScramble_rot13($escaped);
        }

        $numberOfColumns = 10;
        $numberOfRows = ceil(strlen($escaped) / $numberOfColumns);
        $scrambled = "";

        $escaped = str_pad($escaped, $numberOfColumns * $numberOfRows);

        // Choose a password
        $password = "";
        srand(time());
        for ($j = 0; $j < ($longPwd ? $numberOfRows : 1); $j++) {
            $availChars = substr("0123456789", 0, $numberOfColumns);
            for ($i = 0; $i < $numberOfColumns; $i++) {
                $char = $availChars{ rand(0, strlen($availChars) - 1) };
                $password .= $char;
                $availChars = str_replace($char, "", $availChars);
            }
        }
        
        srand();
        $scrambleID = $this->scrmableCount++ . rand(1000, 9999);
        $scramblePassword = str_repeat($password, $longPwd ? 1 : $numberOfRows);

        // Do the scrambling
        $scrambled = str_repeat(" ", $numberOfColumns * $numberOfRows);
        $k = 0;
        for ($i = 0; $i < $numberOfRows; $i++) {
            for ($j = 0; $j < $numberOfColumns; $j++) {
                $scrambled{(((int) $scramblePassword{$k}) * $numberOfRows) + $i} = $escaped{$k};
                $k++;
            }
        }

        // Generate the JavaScript
        $javascript = "<span id=\"scramble" . $scrambleID . "\">$sorry</span>";
        $javascript .= "<script type=\"text/javascript\">\n//<![CDATA[
\n";
        $javascript .= "var a='';var b='$scrambled';var c='$password';";
        if ($rot13) {
            $javascript .= "var d='';";
        }
        $javascript .= "for(var i=0;i<$numberOfRows;i++) for(var j=0;j<$numberOfColumns;j++) ";

        if ($rot13) {
            $javascript .= "{d=b.charCodeAt(";
        } else {
            $javascript .= "a+=b.charAt(";
        }

        if ($longPwd) {
            $javascript .= "(parseInt(c.charAt(i*$numberOfColumns+j))*$numberOfRows)+i); ";
        } else {
            $javascript .= "(parseInt(c.charAt(j))*$numberOfRows)+i);";
        }

        if ($rot13) {
            $javascript .= "if ((d>=65 && d<78) || (d>=97 && d<110)) d+=13; else if ((d>=78 && d<91) || (d>=110 && d<123)) d-=13;a+=String.fromCharCode(d);}";
        }

        $javascript .= "$('#scramble" . $scrambleID  . "').html(unescape(a));\n";
        $javascript .= "//]]>\n</script>\n";

        return $javascript;
    }

    /* Perform ROT13 encoding on a string */

    static function iScramble_rot13($str) {
        $from = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $to = 'nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM';

        return strtr($str, $from, $to);
    }

    /* Perform the equivalent of the JavaScript escape function */

    static function iScramble_escape($plain) {
        $escaped = "";
        $passChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789*@-_+./";

        for ($i = 0; $i < strlen($plain); $i++) {
            $char = $plain{$i};
            if (strpos($passChars, $char) === false) {
                // $char is not in the list of $passChars. Encode in hex format
                $escaped .= sprintf("%%%02X", ord($char));
            } else {
                $escaped .= $char;
            }
        }

        return $escaped;
    }
        
	function removeSlashed ($dastring) {
		return trim(str_replace("\\'","'",str_replace("\\\"","\"",str_replace("\\\\","\\",$dastring))));
	} // end function
}

?>
