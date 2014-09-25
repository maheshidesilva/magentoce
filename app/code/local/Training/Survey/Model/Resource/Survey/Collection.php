<?php
class Training_Survey_Model_Resource_Survey_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {


    protected function _construct()
    {
        //survey at the latter part should be the model name
        // we need to init our Collection with the Model URI.
            $this->_init('training_survey/survey');
    }
}