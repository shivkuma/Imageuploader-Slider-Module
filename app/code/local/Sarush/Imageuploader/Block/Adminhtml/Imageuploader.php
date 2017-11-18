<?php
class Sarush_Imageuploader_Block_Adminhtml_Imageuploader extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_imageuploader';
    $this->_blockGroup = 'imageuploader';
    $this->_headerText = Mage::helper('imageuploader')->__('Slide Manager');
    $this->_addButtonLabel = Mage::helper('imageuploader')->__('Add Image');
    parent::__construct();
  }
}
