<?php

class Sarush_Imageuploader_Block_Adminhtml_Imageuploader_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('imageuploaderGrid');
      $this->setDefaultSort('imageuploader_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('imageuploader/imageuploader')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('imageuploader_id', array(
          'header'    => Mage::helper('imageuploader')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'imageuploader_id',
      ));

      $this->addColumn('filename', array(
          'header'    => Mage::helper('imageuploader')->__('Image'),
          'align'     =>'center',
	  'type'      => 'image',
	  'width'     => '100px',
          'index'     => 'filename',
      ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('imageuploader')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('imageuploader')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('imageuploader')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		//$this->addExportType('*/*/exportCsv', Mage::helper('imageuploader')->__('CSV'));
		//$this->addExportType('*/*/exportXml', Mage::helper('imageuploader')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('imageuploader_id');
        $this->getMassactionBlock()->setFormFieldName('imageuploader');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('imageuploader')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('imageuploader')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('imageuploader/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('imageuploader')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('imageuploader')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}
