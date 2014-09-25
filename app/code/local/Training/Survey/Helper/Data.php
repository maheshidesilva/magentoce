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
class Training_Survey_Helper_Data extends Mage_Core_Helper_Abstract {

    public function isUserLoggedIn () {
        $sessionCustomer = Mage::getSingleton("customer/session");

        if($sessionCustomer->isLoggedIn()) {
            return true;
        } else {
            return false;
        }
    }

    public function returnUserId () {
        $sessionCustomer = Mage::getSingleton("customer/session");

        if($sessionCustomer->isLoggedIn()) {
            return $sessionCustomer->getId();
        }
    }


    public function getSurveyNumberAdminDashboard() {
        if (Mage::getStoreConfig('survey_options/survey_grid/number_of_survey_admin_dashboard')) {
            return Mage::getStoreConfig('survey_options/survey_grid/number_of_survey_admin_dashboard');
        }
    }

    public function getSurveyNumberMyAccount() {
        if (Mage::getStoreConfig('survey_options/survey_grid/number_of_survey_myaccount')) {
            return Mage::getStoreConfig('survey_options/survey_grid/number_of_survey_myaccount');
        }
    }
}