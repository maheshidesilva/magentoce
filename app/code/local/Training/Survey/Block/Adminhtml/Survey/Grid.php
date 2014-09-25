<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition License
 *
 * DISCLAIMER
 *
 * This custom extension is owned by IE Media and it licensed under IE.com.au
 * Please do not modify this file cause you will lose the modified when upgrading it
 *
 * @category  
 * @package   
 * @author    Maheshi De Silva <md@ie.com.au>
 * @copyright 2014 IE Agency http://ie.com.au/
 * @license   IE Agency http://ie.com.au/
 */
/*
     * Admin Step #6:
     *
     * */
class Training_Survey_Block_Adminhtml_Survey_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    /*
     * Admin Step #7:
     *
     * */
    protected function _prepareCollection()
    {
        /**
         * Tell Magento which collection to use to display in the grid.
         */

        $collection = Mage::getModel('training_survey/survey')->getCollection();

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /*
     * Admin Step #8:
     *
     * */
    protected function _prepareColumns()
    {
        /**
         * Here, we'll define which columns to display in the grid.
         */
        $this->addColumn('survey_id', array(
            'header' => $this->_getHelper()->__('ID'),
            'type' => 'number',
            'index' => 'survey_id',
        ));

        $this->addColumn('question_title', array(
            'header' => $this->_getHelper()->__('Question Title'),
            'type' => 'text',
            'index' => 'question_title',
        ));

        $this->addColumn('question_answers', array(
            'header' => $this->_getHelper()->__('Answers'),
            'type' => 'text',
            'index' => 'question_answers',
        ));

        $this->addColumn('customer_id', array(
            'header' => $this->_getHelper()->__('Customer'),
            'type' => 'number',
            'index' => 'customer_id',
        ));

        $this->addColumn('question_type', array(
            'header' => $this->_getHelper()->__('Question Type'),
            'type' => 'text',
            'index' => 'question_type',
        ));

        $this->addColumn('created_at', array(
            'header' => $this->_getHelper()->__('Created'),
            'type' => 'datetime',
            'index' => 'created_at',
        ));

        $this->addColumn('updated_at', array(
            'header' => $this->_getHelper()->__('Updated At'),
            'type' => 'datetime',
            'index' => 'updated_at',
        ));

        $this->addColumn('comments', array(
            'header' => $this->_getHelper()->__('Admin Comments'),
            'type' => 'text',
            'index' => 'comments',
        ));

        return parent::_prepareColumns();
    }

    protected function _getHelper()
    {
        return Mage::helper('training_survey');
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('survey_id');
        $this->getMassactionBlock()->setFormFieldName('survey_id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> Mage::helper('training_survey')->__('Delete'),
            'url'  => $this->getUrl('*/*/massDelete', array('' => '')),
            'confirm' => Mage::helper('tax')->__('Are you sure ?')
        ));

        return $this;
    }

    /*
     * Admin Step #9:
     *
     * */
    public function getRowUrl($row)
    {
        return $this->getUrl(
            'adminhtml/survey/edit',
            array(
                'id' => $row->getId()
            )
        );
    }

}