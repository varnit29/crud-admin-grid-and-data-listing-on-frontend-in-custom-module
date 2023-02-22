<?php


namespace Ksolves\FAQ\Controller\Adminhtml\Post;

/**
* class Edit
* Here Post is for FAQ
*/
class Edit extends \Ksolves\FAQ\Controller\Adminhtml\Faq
{
    /**
    * FAQ  action
    * @return \Magento\Framework\View\Result\$resultPageFactory
    */
    public function execute()
    {
        $ksId = $this->getRequest()->getParam('faq_id');
        $model = $this->_objectManager->create('Ksolves\FAQ\Model\Post');

        if ($ksId) {
            $model->load($ksId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('faq/*');
                return;
            }
        }

        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
        $this->_coreRegistry->register('ksolves_faq_post', $model);
        $ksResultPage = $this->resultPageFactory->create();
        $ksResultPage->getConfig()->getTitle()->prepend((__('Update FAQ')));
        return $ksResultPage;
    }
}
