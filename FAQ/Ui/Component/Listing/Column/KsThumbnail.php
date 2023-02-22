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

namespace Ksolves\FAQ\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Store\Model\StoreManagerInterface;

class KsThumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $ksStoreManager;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $_objectManager;

    /**
     * @var \Magento\Catalog\Helper\Image
     */
    protected $ksImageHelper;

    /**
    * @var Magento\Framework\UrlInterface
    */
    protected $ksUrlBuilder;

    /**
     * @param ContextInterface $ksContext
     * @param UiComponentFactory $ksUiComponentFactory
     * @param \Magento\Catalog\Helper\Image $ksImageHelper
     * @param \Magento\Framework\UrlInterface $ksUrlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $ksContext,
        UiComponentFactory $ksUiComponentFactory,
        StoreManagerInterface $ksStoreManager,
        \Magento\Framework\UrlInterface $ksUrlBuilder,
        \Magento\Framework\ObjectManagerInterface $objectmanager,
        array $components = [],
        array $data = []
    ) {
        $this->ksUrlBuilder = $ksUrlBuilder;
        $this->ksStoreManager = $ksStoreManager;
        $this->_objectManager = $objectmanager;
        $this->ksImageHelper = $this->_objectManager->get(\Magento\Catalog\Helper\Image::class);
        parent::__construct($ksContext, $ksUiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $ksDataSource
     * @return array
     */
    public function prepareDataSource(array $ksDataSource)
    {
        if (isset($ksDataSource['data']['items'])) {
            $ksFieldName = $this->getData('name');
            $ksPath = $this->ksStoreManager->getStore()->getBaseUrl(
                \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
            );
            foreach ($ksDataSource['data']['items'] as & $ksItem) {
                if ($ksItem['image']) {
                    $ksItem[$ksFieldName . '_src'] = $ksPath.$ksItem['image'];
                    $ksItem[$ksFieldName . '_alt'] = 'FAQ Image';
                    $ksItem[$ksFieldName . '_orig_src'] = $ksPath.$ksItem['image'];
                    $ksItem[$ksFieldName . '_link'] = $this->ksUrlBuilder->getUrl(
                        'faq/post/edit',
                        ['faq_id' => $ksItem['faq_id']]
                    );
                } else {
                    $ksItem[$ksFieldName . '_src'] =   $this->ksImageHelper->getDefaultPlaceholderUrl('small_image');
                    $ksItem[$ksFieldName . '_alt'] = 'Place Holder';
                    $ksItem[$ksFieldName . '_orig_src'] =   $this->ksImageHelper->getDefaultPlaceholderUrl('small_image');
                    $ksItem[$ksFieldName . '_link'] = $this->ksUrlBuilder->getUrl(
                        'faq/post/edit',
                        ['faq_id' => $ksItem['faq_id']]
                    );
                }
            }
        }

        return $ksDataSource;
    }
}