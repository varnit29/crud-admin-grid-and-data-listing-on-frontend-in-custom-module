<?php

namespace Ksolves\FAQ\Controller\Blog;

/**
* class Index
* Here Post is for FAQ
*/
class Index extends \Magento\Framework\App\Action\Action
{
    /**
    * @var $resultPageFactory
    */
    protected $ksResultPageFactory = false;

    /**
    * @param \Magento\Backend\App\Action\Context $context
    * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
    */
    public function __construct(
        \Magento\Framework\App\Action\Context $ksContext,
        \Magento\Framework\View\Result\PageFactory $ksResultPageFactory
    ) {
        parent::__construct($ksContext);
        $this->ksResultPageFactory = $ksResultPageFactory;
    }

    /**
    * FAQ  action
    * @return \Magento\Framework\View\Result\$ksResultPageFactory
    */
    public function execute()
    {
        $ksResultPage = $this->ksResultPageFactory->create();
        // $ksResultPage->setActiveMenu('Ksolves_FAQ::faq');
        // $ksResultPage->getConfig()->getTitle()->prepend((__("Listing of FAQ's")));
        return $ksResultPage;
    }

}
?>