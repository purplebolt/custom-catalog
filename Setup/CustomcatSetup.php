<?php
/**
 * CustomcatSetup
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */

namespace Youssuph\CustomCatalog\Setup;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;

/**
 * @codeCoverageIgnore
 */
class CustomcatSetup extends EavSetup
{
    /**
     * Entity type for Customcat EAV attributes
     */
    const ENTITY_TYPE_CODE = 'youssuph_customcat';

    /**
     * Retrieve Entity Attributes
     *
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function getAttributes()
    {
        $attributes = [];

        $attributes['vpn'] = [
            'type' => 'static',
            'backend' => '',
            'frontend' => '',
            'label' => 'VPN',
            'input' => 'text',
            'class' => '',
            'source' => '',
            'global' => 1,
            'visible' => true,
            'required' => true,
            'user_defined' => true,
            'default' => null,
            'searchable' => true,
            'filterable' => true,
            'unique' => false,
            'option' => ['values' => [""]]
        ];

        $attributes['product_id'] = [
            'type' => 'static',
            'backend' => '',
            'frontend' => '',
            'label' => 'productID',
            'input' => 'text',
            'class' => '',
            'source' => '',
            'global' => 1,
            'visible' => true,
            'required' => true,
            'user_defined' => true,
            'default' => null,
            'searchable' => true,
            'filterable' => true,
            'unique' => true,
            'option' => ['values' => [""]]
        ];

        $attributes['copywrite_info'] = [
            'type' => 'text',
            'backend' => '',
            'frontend' => '',
            'label' => 'CopyWriteInfo',
            'input' => 'textarea',
            'class' => '',
            'source' => '',
            'global' => 0,
            'visible' => true,
            'required' => true,
            'user_defined' => true,
            'default' => null,
            'searchable' => true,
            'filterable' => true,
            'unique' => false,
            'option' => ['values' => [""]]
        ];

        $attributes['sku'] = [
            'type' => 'static',
            'backend' => '',
            'frontend' => '',
            'label' => 'SKU',
            'input' => 'text',
            'class' => '',
            'source' => '',
            'global' => 1,
            'visible' => true,
            'required' => true,
            'user_defined' => true,
            'default' => null,
            'searchable' => true,
            'filterable' => true,
            'unique' => true,
            'option' => ['values' => [""]]
        ];

        // Add your entity attributes here... For example:
//        $attributes['is_active'] = [
//            'type' => 'int',
//            'label' => 'Is Active',
//            'input' => 'select',
//            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
//            'sort_order' => 10,
//            'global' => ScopedAttributeInterface::SCOPE_STORE,
//            'group' => 'General',
//        ];

        return $attributes;
    }

    /**
     * Retrieve default entities: customcat
     *
     * @return array
     */
    public function getDefaultEntities()
    {
        $entities = [
            self::ENTITY_TYPE_CODE => [
                'entity_model' => 'Youssuph\CustomCatalog\Model\ResourceModel\Customcat',
                'attribute_model' => 'Youssuph\CustomCatalog\Model\ResourceModel\Eav\Attribute',
                'table' => self::ENTITY_TYPE_CODE . '_entity',
                'increment_model' => null,
                'additional_attribute_table' => self::ENTITY_TYPE_CODE . '_eav_attribute',
                'entity_attribute_collection' => 'Youssuph\CustomCatalog\Model\ResourceModel\Attribute\Collection',
                'attributes' => $this->getAttributes()
            ]
        ];

        return $entities;
    }
}
