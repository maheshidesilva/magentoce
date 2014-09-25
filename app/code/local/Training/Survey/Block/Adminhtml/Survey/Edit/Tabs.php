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

class Training_Survey_Block_Adminhtml_Survey_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('survey_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('training_survey')->__('Survey Information'));
    }

    protected function _prepareLayout()
    {
        $this->addTab('survey_section', array(
            'label' => Mage::helper('training_survey')->__('Survey Information'),
            'title' => Mage::helper('training_survey')->__('Survey Information'),
            'content' => $this->getLayout()->createBlock('training_survey/adminhtml_survey_edit_tab_form')->toHtml(),
        ));


        parent::_prepareLayout();
        return $this;
    }
}