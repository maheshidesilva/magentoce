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
 * @category  Survey
 * @package   Training_Survey
 * @author    Maheshi De Silva <md@ie.com.au>
 * @copyright 2014 IE Agency http://ie.com.au/
 * @license   IE Agency http://ie.com.au/
 */

/**
 * Class Training_Survey_Block_Adminhtml_Dashboard_Survey_Last
 * #2-Admin-Dash
 * 5. This is the new Block class used to load the surveys
 */
class Training_Survey_Block_Adminhtml_Dashboard_Survey_Last extends Mage_Adminhtml_Block_Dashboard_Grid {

    /**
     * #2-Admin-Dash
     * 6. block name is defined here so that it can be used in template file
     * and other places where needed to set the block class
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('lastSurveys');
    }

    /**
     * #2-Admin-Dash
     * 7. Here the collection to load the survey is defined and initialized.
     */
    protected function _prepareCollection()
    {
        if (!Mage::helper('core')->isModuleEnabled('Mage_Reports')) {
            return $this;
        }
        $collection = Mage::getResourceModel('training_survey/survey_collection')
            ->setOrder('created_at','DESC');

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * #2-Admin-Dash
     * 8. Prepares page sizes for dashboard grid with either
     *    the default number or the configured number in the admin
     *
     * @return void
     */
    protected function _preparePage()
    {

        if ($number = Mage::helper('training_survey')->getSurveyNumberAdminDashboard()) {
            $this->getCollection()->setPageSize($this->getParam($this->getVarNameLimit(), $number));

        } else {
            $this->getCollection()->setPageSize($this->getParam($this->getVarNameLimit(), $this->_defaultLimit));
        }
    }

    /**
     * #2-Admin-Dash
     * 9. Here the required columns are defined to show in the dashboard
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn('question_title', array(
            'header'    => $this->__('Survey Title'),
            'sortable'  => false,
            'index'     => 'question_title',
        ));

        $this->addColumn('question_answers', array(
            'header'    => $this->__('Survey Answers'),
            'align'     => 'right',
            'type'      => 'text',
            'sortable'  => false,
            'index'     => 'question_answers'
        ));

        $this->addColumn('customer_id', array(
            'header'    => $this->__('Customer ID'),
            'align'     => 'right',
            'sortable'  => false,
            'type'      => 'number',
            'index'     => 'customer_id'
        ));

        $this->setFilterVisibility(false);
        $this->setPagerVisibility(false);

        return parent::_prepareColumns();
    }


}