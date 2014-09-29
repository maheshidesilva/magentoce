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

/**
 * Class Training_Survey_Block_Adminhtml_Survey_Edit_Tab_Form
 * #1-Admin-Grid: 17. Content for the first tab is coming from here
 */
class Training_Survey_Block_Adminhtml_Survey_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('survey_form', array('legend'=>Mage::helper('training_survey')->__('Survey information')));

        $fieldset->addField('question_title', 'text', array(
            'label'    => Mage::helper('training_survey')->__('Question Title'),
            'class'    => 'required-entry',
            'required' => true,
            'name'     => 'question_title',
        ));

        $fieldset->addField('question_answers', 'text', array(
            'label'    => Mage::helper('training_survey')->__('Answers'),
            'class'    => 'required-entry',
            'required' => true,
            'name'     => 'question_answers',
        ));

        $fieldset->addField('customer_id', 'label', array(
            'label'    => Mage::helper('training_survey')->__('Customer ID'),
            'class'    => 'required-entry',
            'required' => true,
            'name'     => 'customer_id',
        ));

        $fieldset->addField('comments', 'editor', array(
            'label'    => Mage::helper('training_survey')->__('Admin Comments'),
            'required' => false,
            'name'     => 'comments',
        ));

        if ( Mage::getSingleton('adminhtml/session')->getSurveyAdminData() ) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getSurveyAdminData());
            Mage::getSingleton('adminhtml/session')->getSurveyAdminData(null);
        } elseif ( Mage::registry('survey_admin_data') ) {
            $form->setValues(Mage::registry('survey_admin_data')->getData());
        }

        return parent::_prepareForm();
    }
}
