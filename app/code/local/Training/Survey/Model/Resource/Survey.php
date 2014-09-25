<?php
class Training_Survey_Model_Resource_Survey extends Mage_Core_Model_Resource_Db_Abstract{
    
	protected function _construct()
    {
        //surveyresults here is the identifier for the table, entity
        $this->_init('training_survey/surveyresults', 'survey_id');
    }
}