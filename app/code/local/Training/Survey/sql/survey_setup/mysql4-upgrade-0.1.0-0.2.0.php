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

$installer = $this;
$installer->startSetup();

$surveyTable = $installer->getTable('training_survey/surveyresults');

$installer->getConnection()
    ->addColumn(
        $surveyTable, 'comments',
        array(
            'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
            'length'    => 562,
            'nullable'  => true,
            'comment'   => 'Comments by Admin'
        )
    );

$installer->endSetup();
