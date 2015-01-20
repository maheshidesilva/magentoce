<?php
require_once '../../abstract.php';
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
class Mage_Shell_Api_Customer_Apiv1 extends Mage_Shell_Abstract
{
    /**
     * Run script
     *
     */
    public function run()
    {
        echo "test";
    }
}

$shell = new Mage_Shell_Api_Customer_Apiv1();

// Initiate script
$shell->run();