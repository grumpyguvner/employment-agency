<?php
namespace Application\Block\Search;

use Loader;
use CollectionAttributeKey;
use \Concrete\Core\Page\PageList;
use \Concrete\Core\Block\BlockController;
use Page;
use Core;

class Controller extends \Concrete\Block\Search
{
    
    public function do_search()
    {
        $q = $_REQUEST['query'];
        // i have NO idea why we added this in rev 2000. I think I was being stupid. - andrew
        // $_q = trim(preg_replace('/[^A-Za-z0-9\s\']/i', ' ', $_REQUEST['query']));
        $_q = $q;

        $ipl = new PageList();
        $aksearch = false;
        if (is_array($_REQUEST['akID'])) {
            foreach ($_REQUEST['akID'] as $akID => $req) {
                $fak = CollectionAttributeKey::getByID($akID);
                if (is_object($fak)) {
                    $type = $fak->getAttributeType();
                    $cnt = $type->getController();
                    $cnt->setAttributeKey($fak);
                    $cnt->searchForm($ipl);
                    $aksearch = true;
                }
            }
        }

        if (isset($_REQUEST['month']) && isset($_REQUEST['year'])) {
            $year = @intval($_REQUEST['year']);
            $month = abs(@intval($_REQUEST['month']));
            if (strlen(abs($year)) < 4) {
                $year = (($year < 0) ? '-' : '') . str_pad($year, 4, '0', STR_PAD_LEFT);
            }
            if ($month < 12) {
                $month = str_pad($month, 2, '0', STR_PAD_LEFT);
            }
            $daysInMonth = date('t', strtotime("$year-$month-01"));
            $dh = Core::make('helper/date');
            /* @var $dh \Concrete\Core\Localization\Service\Date */
            $start = $dh->toDB("$year-$month-01 00:00:00", 'user');
            $end = $dh->toDB("$year-$month-$daysInMonth 23:59:59", 'user');
            $ipl->filterByPublicDate($start, '>=');
            $ipl->filterByPublicDate($end, '<=');
            $aksearch = true;
        }

        if (empty($_REQUEST['query']) && $aksearch == false) {
            return false;
        }

        if (isset($_REQUEST['query'])) {
            $ipl->filterByKeywords($_q);
        }

        if ( is_array($_REQUEST['search_paths']) ) {
            foreach ($_REQUEST['search_paths'] as $path) {
                if(!strlen($path)) continue;
                $ipl->filterByPath($path);
            }
        } elseif ($this->baseSearchPath != '') {
            $ipl->filterByPath($this->baseSearchPath);
        }

        // TODO fix this
        //$ipl->filter(false, '(ak_exclude_search_index = 0 or ak_exclude_search_index is null)');

        $pagination = $ipl->getPagination();
        $results = $pagination->getCurrentPageResults();

        $this->set('query', $q);
        $this->set('results', $results);
        $this->set('do_search', true);
        $this->set('searchList', $ipl);
        $this->set('pagination', $pagination);
    }

}
