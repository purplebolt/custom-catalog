<?php
/**
 * installSchema.php
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */
namespace Youssuph\CustomCatalog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Youssuph\CustomCatalog\Setup\EavTablesSetupFactory;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @var EavTablesSetupFactory
     */
    protected $eavTablesSetupFactory;

    /**
     * Init
     *
     * @param EavTablesSetupFactory $eavTablesSetupFactory
     *
     * @internal param EavTablesSetupFactory $EavTablesSetupFactory
     */
    public function __construct(EavTablesSetupFactory $eavTablesSetupFactory)
    {
        $this->eavTablesSetupFactory = $eavTablesSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) //@codingStandardsIgnoreLine
    {
        $setup->startSetup();

        $tableName = CustomcatSetup::ENTITY_TYPE_CODE . '_entity';
        /**
         * Create entity Table
         */
        $table = $setup->getConnection()
            ->newTable($setup->getTable($tableName))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->setComment('Entity Table');

        $table->addColumn(
            'vpn',
            Table::TYPE_TEXT,
            100,
            ['nullable' => false],
            'VPN'
        );

        $table->addColumn(
            'product_id',
            Table::TYPE_TEXT,
            100,
            ['nullable' => false],
            'Product ID'
        );

        $table->addColumn(
            'sku',
            Table::TYPE_TEXT,
            100,
            ['nullable' => false],
            'sku'
        )->addIndex(
            $setup->getIdxName($tableName, ['sku']),
            ['sku']
        );

        $setup->getConnection()->createTable($table);

        /** @var \Youssuph\CustomCatalog\Setup\EavTablesSetup $eavTablesSetup */
        $eavTablesSetup = $this->eavTablesSetupFactory->create(['setup' => $setup]);
        $eavTablesSetup->createEavTables(CustomcatSetup::ENTITY_TYPE_CODE);

        $setup->endSetup();
    }
}
