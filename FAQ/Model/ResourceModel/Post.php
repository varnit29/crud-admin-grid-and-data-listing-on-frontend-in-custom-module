<?php

namespace Ksolves\FAQ\Model\ResourceModel;

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ksolves_faq', 'faq_id');
    }
}