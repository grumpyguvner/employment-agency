<?php
namespace Application\Attribute\Fileset;

use Loader;
use \Concrete\Core\Foundation\Object;
use \Concrete\Core\Attribute\DefaultController;
use FileSet;

class Controller extends DefaultController
{
    protected $searchIndexFieldDefinition = array('type' => 'text', 'options' => array());

    public function form() {
        
        $fs = new FileSet();
        $fileSets = $fs->getMySets();
        $sets = array(0 => t('None'));
        foreach($fileSets as $fileSet) {
                $sets[$fileSet->fsID] = $fileSet->fsName;
        }
		if (is_object($this->attributeValue)) {
			$value = $this->getAttributeValue()->getValue();
		}
        print Loader::helper('form')->select($this->field('value'), $sets, $value);
        
    }

}
