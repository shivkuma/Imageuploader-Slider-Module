<?php

class Sarush_Imageuploader_Block_Adminhtml_Imageuploader_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'imageuploader';
        $this->_controller = 'adminhtml_imageuploader';
        
        $this->_updateButton('save', 'label', Mage::helper('imageuploader')->__('Save Image'));
        $this->_updateButton('delete', 'label', Mage::helper('imageuploader')->__('Delete Image'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('imageuploader_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'imageuploader_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'imageuploader_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('imageuploader_data') && Mage::registry('imageuploader_data')->getId() ) {
            return Mage::helper('imageuploader')->__("Edit Image '%s'", $this->htmlEscape(Mage::registry('imageuploader_data')->getTitle()));
        } else {
            return Mage::helper('imageuploader')->__('Add Image');
        }
    }
}
