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
class Training_Survey_Adminhtml_SurveyController extends Mage_Adminhtml_Controller_Action
{

    protected function _initAction()
    {
        $this->loadLayout()
             ->_setActiveMenu('training_survey/items');

        return $this;
    }

    /**
     * #1-Admin-Grid: 3. This is the action when menu is clicked
     * the particular block is called here
     */
    public function indexAction() {
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('training_survey/adminhtml_survey'));
        $this->renderLayout();

    }

    /**
     * #1-Admin-Grid: 10. edit Controller Action
     */
    public function editAction() {
        $survey = Mage::getModel('training_survey/survey');

        if ($surveyId = $this->getRequest()->getParam('id')) {
            $survey->load($surveyId);

            if ($survey->getId()) {
                // survey data loaded from the url param id
                Mage::register('survey_admin_data',$survey);
                // Set the active menu to admin
                // Add edit block as the content
                // Add the tabs as the left content
                $this->loadLayout()
                    ->_setActiveMenu('training_survey/items')
                    ->_addContent($this->getLayout()->createBlock('training_survey/adminhtml_survey_edit'))
                    ->_addLeft($this->getLayout()->createBlock('training_survey/adminhtml_survey_edit_tabs'))
                    ->renderLayout();
            } else {
                // if the survey does not exist
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('training_survey')->__('Survey does not exist!'));
                $this->_redirect('*/*/');
            }

        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('training_survey')->__('There is an error! Please try again !'));
            $this->_redirect('*/*/');
        }


    }

    public function saveAction() {

        if($this->getRequest()->getPost()){
            try {
                $data = $this->getRequest()->getPost();

                $survey = Mage::getModel('training_survey/survey');
                if ($surveyId = $this->getRequest()->getParam('id')) {
                    $survey->load($surveyId);

                    $survey->addData($data)
                        ->setUpdatedAt(Mage::getSingleton('core/date')->gmtDate());

                    $survey->save();

                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('training_survey')->__('Survey was saved successfully !'));
                    Mage::getSingleton('adminhtml/session')->setSurveyAdminData(false);
                    $this->_redirect('*/*/');
                }
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setSurveyAdminData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit',array('id'=> $this->getRequest()->getParam('id')));
            }

            $this->_redirect('*/*/');

        }
    }

    /*
    public function newAction() {
        $this->_forward('edit');
    }*/

    public function deleteAction(){
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $survey = Mage::getModel('training_survey/survey');
                $survey->setId($this->getRequest()->getParam('id'))->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('training_survey')->__('Survey was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction() {
        $surveyIds = $this->getRequest()->getParam('survey_id');      // $this->getMassactionBlock()->setFormFieldName('survey_id'); from Grid

        if(!is_array($surveyIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('training_survey')->__('Please select survey ID(s).'));
        } else {
            try {
                $survey = Mage::getModel('training_survey/survey');
                foreach ($surveyIds as $surveyId) {
                    $survey->load($surveyId)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('training_survey')->__(
                        'Total of %d record(s) were deleted.', count($surveyIds)
                    )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }

}