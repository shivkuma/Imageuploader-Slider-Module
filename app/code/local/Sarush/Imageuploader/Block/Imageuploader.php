<?php
class Sarush_Imageuploader_Block_Imageuploader extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getImageuploader()     
     { 
        if (!$this->hasData('imageuploader')) {
            $this->setData('imageuploader', Mage::registry('imageuploader'));
        }
        return $this->getData('imageuploader');
        
    }
}