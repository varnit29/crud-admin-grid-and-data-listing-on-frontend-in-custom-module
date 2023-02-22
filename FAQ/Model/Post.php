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

namespace Ksolves\FAQ\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Ksolves\FAQ\Model\ResourceModel\Post');
    }
}
?>