<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Youssuph\CustomCatalog\Api\Data;

/**
 * @api
 * @since 100.0.2
 */
interface ProductDataInterface
{

    const ENTITY_ID = 'entity_id';

    const PRODUCT_ID = 'product_id';

    const COPY_WRITE_INFO = 'copywrite_info';

    const VPN = 'vpn';

    const SKU = 'sku';


    /**
     * Gets the entity Id
     *
     * @return int
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getEntityId();

    /**
     * Sets the entity Id
     *
     * @param int $entity_id
     * @return $this
     */
    public function setEntityId($entity_id);

    /**
     * Gets the product Id
     *
     * @return string
     */
    public function getProductId();

    /**
     * Sets the Product Id
     *
     * @param string $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Gets the Copyright Info
     *
     * @return string
     */
    public function getCopywriteInfo();

    /**
     * Sets the Copyright Info
     *
     * @param string $copyright_info
     * @return $this
     */
    public function setCopywriteInfo($copyright_info);

    /**
     * Gets VPN
     *
     * @return string
     */
    public function getVpn();

    /**
     * Sets VPN
     *
     * @param string $vpn
     * @return $this
     */
    public function setVpn($vpn);

    /**
     * Gets SKU
     *
     * @return string
     */
    public function getSku();

    /**
     * Sets SKU
     *
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

}
