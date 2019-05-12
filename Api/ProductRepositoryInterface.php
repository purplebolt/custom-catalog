<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Youssuph\CustomCatalog\Api;

/**
 * @api
 * @since 100.0.2
 */
interface ProductRepositoryInterface
{
    /**
     * Updates Custom Product
     *
     * @param \Youssuph\CustomCatalog\Api\Data\ProductDataInterface $item
     * @return \Youssuph\CustomCatalog\Api\Data\ProductDataInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function updateProduct(\Youssuph\CustomCatalog\Api\Data\ProductDataInterface $item);

    /**
     * Get info about Custom Product Based on VPN
     *
     * @param string $vpn
     * @return \Youssuph\CustomCatalog\Api\Data\ProductDataInterface[]
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByVpn($vpn);


}
