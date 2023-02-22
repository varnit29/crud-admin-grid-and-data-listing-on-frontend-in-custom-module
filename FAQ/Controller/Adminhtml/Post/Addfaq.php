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

/**
* class Addfaq
* Here Post is for FAQ
*/
class Addfaq extends \Magento\Backend\App\Action
{
    /**
    * Magento\Framework\View\Result\PageFactory
    */
    protected $ksResultPageFactory = false;

    /**
    * @param \Magento\Backend\App\Action\Context $ksContext
    * @param Magento\Framework\View\Result\PageFactory $ksResultPageFactory
    */
    public function __construct(
        \Magento\Backend\App\Action\Context $ksContext,
        \Magento\Framework\View\Result\PageFactory $ksResultPageFactory
    ) {
        parent::__construct($ksContext);
        $this->ksResultPageFactory = $ksResultPageFactory;
    }

    /**
    * FAQ  action
    *
    * @return \Magento\Framework\View\Result\$ksResultPageFactory
    */
    public function execute()
    {
        $ksResultPage = $this->ksResultPageFactory->create();
        //$ksResultPage->getConfig()->getTitle()->prepend((__('Add FAQ')));
        return $ksResultPage;
    }
}