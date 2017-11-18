<?php

class Sarush_Imageuploader_Block_Adminhtml_Imageuploader_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
	$model = Mage::getModel('cms/page');
	$collection = $model->getCollection();
	$cmsPages=array();
	foreach($collection as $item){
		if($item->getTitle()!='404 Not Found 1' && $item->getTitle()!='Enable Cookies'){
		$cmsPages[]=array('value'=>$item->getTitle(),'label'=>Mage::helper('imageuploader')->__($item->getTitle()));
		}
	}
	/* Code end to get CMS pages names to display in Category Select Box */
      $fieldset = $form->addFieldset('imageuploader_form', array('legend'=>Mage::helper('imageuploader')->__('Slide information')));
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('imageuploader')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('imageuploader')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('imageuploader')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('imageuploader')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('imageuploader')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('imageuploader')->__('Page Link'),
          'title'     => Mage::helper('imageuploader')->__('Page Link'),
          'style'     => 'width:100%; height:50px;',
          'wysiwyg'   => false,
          'required'  => false,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getImageuploaderData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getImageuploaderData());
          Mage::getSingleton('adminhtml/session')->setImageuploaderData(null);
      } elseif ( Mage::registry('imageuploader_data') ) {
          $form->setValues(Mage::registry('imageuploader_data')->getData());
      }
      return parent::_prepareForm();
  }
}
