<?php
/**
 * DeleteButton
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */
namespace Youssuph\CustomCatalog\Block\Adminhtml\Customcat\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class DeleteButton implements ButtonProviderInterface
{
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry
     *
     * @var Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        Registry $registry
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [
            'label' => __('Delete'),
            'class' => 'delete',
            'id' => 'customcat-edit-delete-button',
            'data_attribute' => [
                'url' => $this->getDeleteUrl()
            ],
            'on_click' =>
                'deleteConfirm(\'' . __("Are you sure you want to do this?") . '\', \'' . $this->getDeleteUrl() . '\')',
            'sort_order' => 20,
        ];
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->urlBuilder->getUrl('*/*/delete', ['entity_id' => $this->registry->registry('entity_id')]);
    }
}
