<?php

/**
 * Uninstall.php
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */
namespace Youssuph\CustomCatalog\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class Uninstall implements UninstallInterface
{
    /**
     * @var array
     */
    protected $tablesToUninstall = [
        CustomcatSetup::ENTITY_TYPE_CODE . '_entity',
        CustomcatSetup::ENTITY_TYPE_CODE . '_eav_attribute',
        CustomcatSetup::ENTITY_TYPE_CODE . '_entity_datetime',
        CustomcatSetup::ENTITY_TYPE_CODE . '_entity_decimal',
        CustomcatSetup::ENTITY_TYPE_CODE . '_entity_int',
        CustomcatSetup::ENTITY_TYPE_CODE . '_entity_text',
        CustomcatSetup::ENTITY_TYPE_CODE . '_entity_varchar'
    ];

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context) //@codingStandardsIgnoreLine
    {
        $setup->startSetup();

        foreach ($this->tablesToUninstall as $table) {
            if ($setup->tableExists($table)) {
                $setup->getConnection()->dropTable($setup->getTable($table));
            }
        }

        $setup->endSetup();
    }
}
