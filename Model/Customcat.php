<?php

/**
 * Customcat.php
 *
 * @copyright Copyright © 2019 Youssuph Inc.. All rights reserved.
 * @author    purplescroll@gmail.com
 */

namespace Youssuph\CustomCatalog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Customcat extends AbstractModel implements IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'youssuph_customcatalog_customcat';

    /**
     * @var string
     */
    protected $_cacheTag = 'youssuph_customcatalog_customcat';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'youssuph_customcatalog_customcat';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Youssuph\CustomCatalog\Model\ResourceModel\Customcat');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Save from collection data
     *
     * @param array $data
     * @return $this|bool
     */
    public function saveCollection(array $data)
    {
        if (isset($data[$this->getId()])) {
            $this->addData($data[$this->getId()]);
            $this->getResource()->save($this);
        }
        return $this;
    }


}
