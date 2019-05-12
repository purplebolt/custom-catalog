<?php
/**
 * Delete
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */
namespace Youssuph\CustomCatalog\Controller\Adminhtml\Customcat;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Youssuph\CustomCatalog\Model\CustomcatFactory;

class Delete extends Action
{
    /** @var customcatFactory $objectFactory */
    protected $objectFactory;

    /**
     * @param Context $context
     * @param CustomcatFactory $objectFactory
     */
    public function __construct(
        Context $context,
        CustomcatFactory $objectFactory
    ) {
        $this->objectFactory = $objectFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Youssuph_CustomCatalog::customcat');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('entity_id', null);

        try {
            $objectInstance = $this->objectFactory->create()->load($id);
            if ($objectInstance->getId()) {
                $objectInstance->delete();
                $this->messageManager->addSuccessMessage(__('You deleted the record.'));
            } else {
                $this->messageManager->addErrorMessage(__('Record does not exist.'));
            }
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        
        return $resultRedirect->setPath('*/*');
    }
}
