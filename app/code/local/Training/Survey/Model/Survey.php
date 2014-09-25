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
class Training_Survey_Model_Survey extends Mage_Core_Model_Abstract
{
	protected function _construct()
    {
        $this->_init('training_survey/survey');
    }
    
    function getSurveyData(){
		$data['question'] = 'How are you feeling today ?';
		$data['answers']  = '';
		$data['type']	  = 'text';
        
		return $data;
    }

}