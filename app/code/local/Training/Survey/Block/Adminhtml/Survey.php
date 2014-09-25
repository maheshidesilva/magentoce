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
/*
     * Admin Step #4:
     *
     * */
class Training_Survey_Block_Adminhtml_Survey extends Mage_Adminhtml_Block_Widget_Grid_Container {

    /*
     * Admin Step #5:
     *
     * */
    public function __construct()
    {
        parent::__construct();
        $this->_removeButton('add');
        /* path to block class*/
        $this->_controller = 'adminhtml_survey';
        /* module name*/
        $this->_blockGroup = 'training_survey';

        $this->_headerText = Mage::helper('training_survey')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('training_survey')->__('Add Item');

    }
}