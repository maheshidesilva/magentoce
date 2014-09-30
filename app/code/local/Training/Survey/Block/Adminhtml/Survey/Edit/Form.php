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
 * Class Training_Survey_Block_Adminhtml_Survey_Edit_Form
 * #1-Admin-Grid: 14.
 */
class Training_Survey_Block_Adminhtml_Survey_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     * #1-Admin-Grid: 15
     */
    protected function _prepareForm()
    {
        // id should be same as the setDestElementId in Tabs.php
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => (int) $this->getRequest()->getParam('id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}