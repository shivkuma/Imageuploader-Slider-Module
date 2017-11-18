<?php

class Sarush_Imageuploader_Model_Mysql4_Imageuploader extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the imageuploader_id refers to the key field in your database table.
        $this->_init('imageuploader/imageuploader', 'imageuploader_id');
    }
}