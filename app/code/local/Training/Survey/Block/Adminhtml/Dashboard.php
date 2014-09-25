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
 * #2-Admin-Dash
 * 2. This is the class which is used to add the new block of surveys to show in the dashboard
 * This class extends the core Dashboard
 *
 */
class Training_Survey_Block_Adminhtml_Dashboard extends Mage_Adminhtml_Block_Dashboard
{
    /**
     * #2-Admin-Dash
     * 4. Here the new customized template is set as the required template for the dashboard
     * Reason - this template contains all the child html calls and it is advised to have a separate
     * template file without editing core files. So the template file is in
     * design/adminhtml/default/default/template/survey/dashboard/
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('survey/dashboard/index.phtml');

    }

    /**
     * #2-Admin-Dash
     * 3. This function is used to inject new block to the dashboard
     * The new block to load surveys is in Block/Adminhtml/Dashboard/Survey
     * Here a name of the block and the respective block is set
     * this name is defined in the block class and later it is used in the template file
     */
    protected function _prepareLayout()
    {
        $this->setChild('lastSurveys',
            $this->getLayout()->createBlock('training_survey/adminhtml_dashboard_survey_last')
        );

        parent::_prepareLayout();
    }
}