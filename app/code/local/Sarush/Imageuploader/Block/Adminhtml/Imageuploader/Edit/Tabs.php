<?php

class Sarush_Imageuploader_Block_Adminhtml_Imageuploader_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('imageuploader_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('imageuploader')->__('Slide Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('imageuploader')->__('Slide Information'),
          'title'     => Mage::helper('imageuploader')->__('Slide Information'),
          'content'   => $this->getLayout()->createBlock('imageuploader/adminhtml_imageuploader_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
