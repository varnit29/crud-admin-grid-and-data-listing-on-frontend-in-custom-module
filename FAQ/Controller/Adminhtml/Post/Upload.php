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

namespace Ksolves\FAQ\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;

/**
 * Class Upload
 */
class Upload extends \Magento\Backend\App\Action
{
    /**
     * Image uploader
    * @var \Ksolves\FAQ\Model\ImageUploader
     */
    public $ksImageUploader;

    /**
     * @param \Magento\Backend\App\Action\Context $ksContext
     * @param \Ksolves\FAQ\Model\ImageUploader $ksImageUploader
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $ksContext,
        \Ksolves\FAQ\Model\Faq\ImageUploader $ksImageUploader
    ) {
        parent::__construct($ksContext);
        $this->ksImageUploader = $ksImageUploader;
    }

    /**
     * Upload file controller action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $ksResult = $this->ksImageUploader->saveFileToTmpDir('image');

            $ksResult['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $ksResult = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($ksResult);
    }
}