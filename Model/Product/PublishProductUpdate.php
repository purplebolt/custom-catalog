<?php

namespace Youssuph\CustomCatalog\Model\Product;

class PublishProductUpdate
{
    const TOPIC_NAME = 'youssuph.product.put';
    /**
     * @var \Magento\Framework\MessageQueue\PublisherInterface
     */
    private $publisher;
    /**
     * @param \Magento\Framework\MessageQueue\PublisherInterface $publisher
     */
    public function __construct(\Magento\Framework\MessageQueue\PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }
    /**
     * {@inheritdoc}
     */
    public function execute(\Youssuph\CustomCatalog\Api\Data\ProductDataInterface $product)
    {
        $this->publisher->publish(self::TOPIC_NAME, $product);
    }
}