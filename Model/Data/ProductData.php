<?php


namespace Youssuph\CustomCatalog\Model\Data;

/**
 * @api
 * @since 100.0.2
 */
class ProductData extends \Magento\Framework\Model\AbstractModel
    implements \Youssuph\CustomCatalog\Api\Data\ProductDataInterface
{

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Youssuph\CustomCatalog\Model\ResourceModel\Customcat $resource,
        \Youssuph\CustomCatalog\Model\ResourceModel\Customcat\Collection $resourceCollection,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityId(){
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setEntityId($entity_id){
        $this->setData(self::ENTITY_ID, $entity_id);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductId(){
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setProductId($productId){
        $this->setData(self::PRODUCT_ID, $productId);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCopywriteInfo(){
        return $this->getData(self::COPY_WRITE_INFO);
    }

    /**
     * {@inheritdoc}
     */
    public function setCopywriteInfo($copyright_info){
        $this->setData(self::COPY_WRITE_INFO, $copyright_info);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVpn(){
        return $this->getData(self::VPN);
    }

    /**
     * {@inheritdoc}
     */
    public function setVpn($vpn){
        $this->setData(self::VPN, $vpn);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSku(){
        return $this->getData(self::SKU);
    }

    /**
     * {@inheritdoc}
     */
    public function setSku($sku){
        $this->setData(self::SKU, $sku);
        return $this;
    }

}
