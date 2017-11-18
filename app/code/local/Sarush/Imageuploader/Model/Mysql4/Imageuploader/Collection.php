<?php

class Sarush_Imageuploader_Model_Mysql4_Imageuploader_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('imageuploader/imageuploader');
    }
}