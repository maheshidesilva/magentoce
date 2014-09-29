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
 * Class Training_Survey_Block_Adminhtml_Survey_Edit
 * #1-Admin-Grid: 11. This class is to edit or create entity in Grid.php and
 * added in controller edit action
 */
class Training_Survey_Block_Adminhtml_Survey_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    /**
     * #1-Admin-Grid: 13. define the needed parameters here to load the blcoks
     */
    protected function _construct(){
        $this->_blockGroup = 'training_survey';
        $this->_controller = 'adminhtml_survey';
        $this->_mode = 'edit';

        $editType = $this->getRequest()->getParam('id')
            ? $this->__('Edit')
            : $this->__('New');
        $this->_headerText =  $editType . ' ' . $this->__('Survey');
    }
}