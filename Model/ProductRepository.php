<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Youssuph\CustomCatalog\Model;

use \Magento\Framework\Exception\CouldNotSaveException;
use \Magento\Framework\Exception\NoSuchEntityException;
use \Youssuph\CustomCatalog\Api\Data\ProductDataInterface;

class ProductRepository implements \Youssuph\CustomCatalog\Api\ProductRepositoryInterface
{
    protected $_resourceModel;

    protected $_modelFactory;

    protected $_entityManager;

    protected $_customcatResourceModel;

    protected $_productCollectionFactory;
	
	protected $_publisher;

    protected $_searchCriteria;

    /**
     * @param \Magento\Framework\EntityManager\EntityManager $entityManager
     *
     * @param \Youssuph\CustomCatalog\Api\Data\ProductDataInterfaceFactory $modelFactory
     *
     * @param \Youssuph\CustomCatalog\Model\ResourceModel\Customcat $customcatResourceModel
     *
     * @param \Youssuph\CustomCatalog\Model\ResourceModel\Customcat\CollectionFactory $productCollectionFactory
	 *
	 * @param \Youssuph\CustomCatalog\Model\Product\PublishProductUpdate $publisher
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     */
    public function __construct(\Magento\Framework\EntityManager\EntityManager $entityManager,
                                \Youssuph\CustomCatalog\Api\Data\ProductDataInterfaceFactory $modelFactory,
                                \Youssuph\CustomCatalog\Model\ResourceModel\Customcat $customcatResourceModel,
                                \Youssuph\CustomCatalog\Model\ResourceModel\Customcat\CollectionFactory $productCollectionFactory,
								\Youssuph\CustomCatalog\Model\Product\PublishProductUpdate $publisher,
                                \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria){

        $this->_entityManager = $entityManager;

        $this->_modelFactory = $modelFactory;

        $this->_customcatResourceModel = $customcatResourceModel;

        $this->_productCollectionFactory = $productCollectionFactory;
		
		$this->_publisher = $publisher;

        $this->_searchCriteria = $searchCriteria;

    }

    /**
     * {@inheritdoc}
     */
    public function updateProduct(ProductDataInterface $item){

		$this->_publisher->execute($item);
        return $item;
    }

    /**
     * {@inheritdoc}
     */
    public function getByVpn($vpn){

        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*')
                   ->addAttributeToFilter('vpn', ['eq'=> $vpn]);

        $collection->load();
        return $collection->getItems();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($itemId){

        $item = $this->_modelFactory->create();

        $this->_entityManager->load($item, $itemId);

        if(!$item->getEntityId()){
            throw new NoSuchEntityException(__('Couldn\'t find product with specified ID'));
        }
        return $item;
    }
	
	public function save(ProductDataInterface $item){
		
		$item->setData('store_id', 0);
        $response = $this->_customcatResourceModel->save($item);
        if(!$response)
            throw new CouldNotSaveException(__('Error saving Item, Please examine input and try again.'));
		return $response;
		
	}


}
