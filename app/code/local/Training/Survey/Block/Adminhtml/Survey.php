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
 * @category  Survey
 * @package   Training_Survey
 * @author    Maheshi De Silva <md@ie.com.au>
 * @copyright 2014 IE Agency http://ie.com.au/
 * @license   IE Agency http://ie.com.au/
 */
/**
 * Class Training_Survey_Block_Adminhtml_Survey
 * #1-Admin-Grid: 4.
 */
class Training_Survey_Block_Adminhtml_Survey extends Mage_Adminhtml_Block_Widget_Grid_Container {

    /**
     * #1-Admin-Grid: 5. This is the construct function of the block class which
     * uses to load the remaining grid block
     */
    public function __construct()
    {
        parent::__construct();
        $this->_removeButton('add');
        /* _controller and _bockGroup are used by this container to find and load the grid block
         path to grid block class which is Adminhtml/Survey/ */
        $this->_controller = 'adminhtml_survey';
        /* module name which is defined in the config under blocks section */
        $this->_blockGroup = 'training_survey';

        $this->_headerText = Mage::helper('training_survey')->__('Survey Manager');

    }
}