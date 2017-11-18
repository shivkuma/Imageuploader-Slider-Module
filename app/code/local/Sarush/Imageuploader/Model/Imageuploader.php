<?php

class Sarush_Imageuploader_Model_Imageuploader extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('imageuploader/imageuploader');
    }
}