<?php
class Sarush_Imageuploader_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/imageuploader?id=15 
    	 *  or
    	 * http://site.com/imageuploader/id/15 	
    	 */
    	
		$imageuploader_id = $this->getRequest()->getParam('id');

  		if($imageuploader_id != null && $imageuploader_id != '')	{
			$imageuploader = Mage::getModel('imageuploader/imageuploader')->load($imageuploader_id)->getData();
		} else {
			$imageuploader = null;
		}	
		
		
		 /*
    	 * If no param we load a the last created item
    	 */
    	
    	if($imageuploader == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$imageuploaderTable = $resource->getTableName('imageuploader');
			
			$select = $read->select()
			   ->from($imageuploaderTable,array('imageuploader_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$imageuploader = $read->fetchRow($select);
		}
		Mage::register('imageuploader', $imageuploader);
		

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}
