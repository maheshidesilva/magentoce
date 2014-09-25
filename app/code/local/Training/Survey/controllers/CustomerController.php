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
class Training_Survey_CustomerController extends Mage_Core_Controller_Front_Action {

    /*
     * C3. This is the function to load the template in customer survey dashboard
     */
    public function indexAction(){
        $helper = Mage::helper('training_survey');
        //this is to check the customer is logged in
        //if not return to the loging page
        if(! $helper->isUserLoggedIn() ){
            Mage::getSingleton('customer/session')->authenticate($this);
            return;
        }
        $this->loadLayout();
        $this->renderLayout();
    }
}