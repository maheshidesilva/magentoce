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
class Training_Survey_Block_Survey_Form extends Mage_Core_Block_Template
{
    function getSurveyData(){
    	$survey = Mage::registry('current_survey');
        if (!$survey) {
            $survey = Mage::getModel('training_survey/survey')->getSurveyData();
            Mage::register('current_survey', $survey);
        }

        return $survey;
    }

    public function checkUserLoggedStatus() {
        $helper = $this->_getHelper();

        return $helper->isUserLoggedIn();
    }

    protected function _getHelper()
    {
        return Mage::helper('training_survey');
    }
}