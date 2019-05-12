<?php
/**
 * DataProvider
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */

namespace Youssuph\CustomCatalog\Ui\Component\Listing;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider as UiDataProvider;

class DataProvider extends UiDataProvider
{
    /**
     * @param SearchResultInterface $searchResult
     * @return array
     */
    protected function searchResultToOutput(SearchResultInterface $searchResult)
    {
        $searchResult->setStoreId($this->request->getParam('store', 0))
            ->addAttributeToSelect(['product_id', 'copywrite_info', 'vpn', 'sku']);

        return parent::searchResultToOutput($searchResult);
    }

    /**
     * @return void
     */
    protected function prepareUpdateUrl()
    {
        $storeId = $this->request->getParam('store', 0);
        if ($storeId) {
            $this->data['config']['update_url'] = sprintf(
                '%s%s/%s',
                $this->data['config']['update_url'],
                'store',
                $storeId
            );
        }
        return parent::prepareUpdateUrl();
    }
}
