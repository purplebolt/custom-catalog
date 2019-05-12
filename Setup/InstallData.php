<?php
/**
 * InstallData
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */

namespace Youssuph\CustomCatalog\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Customcat setup factory
     *
     * @var CustomcatSetupFactory
     */
    protected $customcatSetupFactory;

    /**
     * Init
     *
     * @param CustomcatSetupFactory $customcatSetupFactory
     */
    public function __construct(CustomcatSetupFactory $customcatSetupFactory)
    {
        $this->customcatSetupFactory = $customcatSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) //@codingStandardsIgnoreLine
    {
        /** @var CustomcatSetup $customcatSetup */
        $customcatSetup = $this->customcatSetupFactory->create(['setup' => $setup]);

        $setup->startSetup();

        $customcatSetup->installEntities();
        $entities = $customcatSetup->getDefaultEntities();
        foreach ($entities as $entityName => $entity) {
            $customcatSetup->addEntityType($entityName, $entity);
        }

        $setup->endSetup();
    }
}
