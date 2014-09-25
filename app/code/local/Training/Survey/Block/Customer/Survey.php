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
class Training_Survey_Block_Customer_Survey extends Mage_Core_Block_Template
{

    protected function _getHelper()
    {
        return Mage::helper('training_survey');
    }

    /*
     * C4: This is to show last 3 survey in customer dashboard
     */
    public function getSurveyOfCustomer() {

        $helper = $this->_getHelper();
        if ($helper->isUserLoggedIn()) {
            $customerId = $helper->returnUserId();
            $surveyColl = Mage::getSingleton('training_survey/survey')
                        ->getCollection()
                        ->addFieldToFilter('customer_id',$customerId)
                        ->setOrder('created_at','DESC');
            $surveyColl->getSelect()->limit(3);

            return $surveyColl->getData();
        } else {
            return false;
        }



    }


}