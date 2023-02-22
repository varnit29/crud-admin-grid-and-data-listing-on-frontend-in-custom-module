<?php


namespace Ksolves\FAQ\Controller\Adminhtml;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

/**
* class Faqgroup
* Items controller
*/
abstract class Faq extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    // protected $uploaderFactory;
    // protected $adapterFactory;
    // protected $filesystem;

    
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        // \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
        // DirectoryList $directoryList,
        // UploaderFactory $uploaderFactory,
        // AdapterFactory $adapterFactory,
        // Filesystem $filesystem,
        // \Magento\Framework\Filesystem\Driver\File $file
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
        // $this->resultForwardFactory = $resultForwardFactory;
        $this->resultPageFactory = $resultPageFactory;
    //     $this->directoryList = $directoryList;
    //     $this->uploaderFactory = $uploaderFactory;
    //     $this->adapterFactory = $adapterFactory;
    //     $this->filesystem = $filesystem;
    //     $this->_file = $file;
    }
}
?>