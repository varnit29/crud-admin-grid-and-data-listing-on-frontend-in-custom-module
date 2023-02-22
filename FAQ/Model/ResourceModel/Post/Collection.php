<?php
/**
 * Ksolves
 *
 * @category  Ksolves
 * @package   Ksolves_FAQ
 * @author    Ksolves Team
 * @copyright Copyright (c) Ksolves India Limited (https://www.ksolves.com/)
 * @license   https://store.ksolves.com/magento-license
 */

namespace Ksolves\FAQ\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'faq_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Ksolves\FAQ\Model\Post',
            'Ksolves\FAQ\Model\ResourceModel\Post'
        );
    }
}