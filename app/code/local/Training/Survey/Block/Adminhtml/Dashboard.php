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
class Training_Survey_Block_Adminhtml_Dashboard extends Mage_Adminhtml_Block_Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('survey/dashboard/index.phtml');

    }
    protected function _prepareLayout()
    {
        $this->setChild('lastSurveys',
            $this->getLayout()->createBlock('training_survey/adminhtml_dashboard_survey_last')
        );

        parent::_prepareLayout();
    }
}