<?php
/**
 * InlineEdit.php
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */
namespace Youssuph\CustomCatalog\Controller\Adminhtml\Customcat;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Youssuph\CustomCatalog\Model\ResourceModel\Customcat\Collection;

/**
 * Grid inline edit controller
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InlineEdit extends Action
{

    /** @var JsonFactory $jsonFactory */
    protected $jsonFactory;

    /**
     * @var Collection
     */
    protected $objectCollection;

    /**
     * @param Context $context
     * @param Collection $objectCollection
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        Collection $objectCollection,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->objectCollection = $objectCollection;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        try {
            $this->objectCollection
                ->setStoreId($this->getRequest()->getParam('store', 0))
                ->addFieldToFilter('entity_id', ['in' => array_keys($postItems)])
                ->walk('saveCollection', [$postItems]);
        } catch (\Exception $e) {
            $messages[] = __('There was an error saving the data: ') . $e->getMessage();
            $error = true;
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
