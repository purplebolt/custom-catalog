<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Youssuph\CustomCatalog\Model\Product;


use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;

class SaveProductUpdate {

    /**
     * @var \Youssuph\CustomCatalog\Api\ProductRepositoryInterface
     */
    private $_repository;
    /**
     * Process product update queue
     *
     * @param \Youssuph\CustomCatalog\Api\ProductRepositoryInterface $repository
     */
    public function __construct(
        \Youssuph\CustomCatalog\Api\ProductRepositoryInterface $repository
    ) {
        $this->_repository = $repository;
    }

    /**
     * @param \Youssuph\CustomCatalog\Api\Data\ProductDataInterface $product
     * @return void
     * @throws CouldNotSaveException
     * @throws InputException
     */
    public function processUpdate(\Youssuph\CustomCatalog\Api\Data\ProductDataInterface $product)
    {
        $this->_repository->save($product);
    }
}