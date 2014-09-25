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
class Training_Survey_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction(){

        $survey = Mage::getModel('training_survey/survey')->getSurveyData();
    	Mage::register('current_survey', $survey);

        $this->loadLayout();
        $this->renderLayout();
    }

    /*
     * A. This is to save the survey data entered in the home page
     */
    public function saveAction() {
        $session = Mage::getSingleton('core/session');
        $data = $this->getRequest()->getPost();

        $helper = Mage::helper('training_survey');
        if($helper->isUserLoggedIn()){
            $customerID = $helper->returnUserId();
        } else { //guest
            $customerID = 0;
        }

        if (!$data['question_answers'] == '') {
            try {
                $survey = Mage::getModel('training_survey/survey')->setData($data);
                $survey->setCreatedAt(time())
                    ->setUpdatedAt(date('Y-m-d H:i:s'),time())
                    ->setCustomerId($customerID);

                $survey->save();
                $session->addSuccess($this->_getHelper()->__('Survey submitted successfully!'));
            } catch(Exception $e) {
                $session->addError($this->_getHelper()->__('Unable to submit the survey! Please try again later!'));
            }

        } else {
            $session->setFormData($data);
            $session->addError($this->_getHelper()->__('Unable to submit the survey! Please enter a valid input!'));
        }

        //this part is to redirect to parent url
        $url = Mage::getSingleton('core/session')->getLastUrl();
        $this->_redirectUrl($url);

    }

    protected function _getHelper()
    {
        return Mage::helper('training_survey');
    }


}