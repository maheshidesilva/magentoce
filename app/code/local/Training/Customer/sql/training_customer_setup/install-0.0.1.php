<?php

$installer = $this;

$installer->startSetup();

//this is bit different because here we add for eav attribute
$installer->addAttribute(
        'customer', 'website',
        array(
            'label'           => 'Customer Personal Website',
            'required'        => false,
            'type'            => 'varchar',
            'input'           => 'text',
            'sort_order'      => 0,
            'is_system'       => 1,
            'is_user_defined' => 0,
        )
    );

$installer->endSetup();

