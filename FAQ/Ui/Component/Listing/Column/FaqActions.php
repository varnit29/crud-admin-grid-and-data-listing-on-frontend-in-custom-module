<?php


namespace Ksolves\FAQ\Ui\Component\Listing\Column;

class FaqActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    public const URL_PATH_EDIT = 'faq/post/edit';

   
    protected $ksUrlBuilder;

    
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $ksContext,
        \Magento\Framework\View\Element\UiComponentFactory $ksUiComponentFactory,
        \Magento\Framework\UrlInterface $ksUrlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->ksUrlBuilder = $ksUrlBuilder;
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
            foreach ($ksDataSource['data']['items'] as & $ksItem) {
                if (isset($ksItem['faq_id'])) {
                    $ksItem[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->ksUrlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'faq_id' => $ksItem['faq_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ]
                    ];
                }
            }
        }

        return $ksDataSource;
    }
}