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

$defaultUsedInFormsCustomer = array(
    'checkout_register',
    'customer_account_create',
    'customer_account_edit'
);

$attribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'website');

$attribute->setData('used_in_forms',$defaultUsedInFormsCustomer);

$attribute->save();

$installer->endSetup();