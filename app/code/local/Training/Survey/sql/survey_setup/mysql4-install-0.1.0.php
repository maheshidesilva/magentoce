<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    CREATE TABLE `{$installer->getTable('training_survey/surveyresults')}` (
      `survey_id` int(11) NOT NULL auto_increment,
      `customer_id` int(11) NOT NULL,
      `question_title` text,
      `question_answers` text,
      `question_type` text,
      `updated_at` datetime default NULL,
      `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
      PRIMARY KEY  (`survey_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");
$installer->endSetup();