<?php

namespace src\readers;

use src\interfaces\ReadersInterface;

class PurfectpetsProductsReader implements ReadersInterface
{

    private $rowData;

    private $data = [];

    public function __construct(string $filePath){
        require_once __DIR__ . '/../library/simple_html_dom.php';

        $this->rowData = file_get_html($filePath);
    }

    public function parseFile(): void{}

    public function getData(): array
    {
        return $this->rowData;
    }

    public function getElement()
    {
        // TODO: Implement getElement() method.
    }

    public function getElements(): array
    {
        if (empty($this->data)) {
            if(empty($this->rowData->find('.b-common-item--catalog'))){
                foreach ($this->rowData->find('.b-common-item--catalog-item') as $item) {
                    if (!empty($item->find('.b-common-item__image'))) {
                        $product = [
                            'productImage' => $item->find('.b-common-item__image')[0]->getAttribute('src'),
                            'productLink' => $item->find('.b-common-item__description-wrap')[0]->getAttribute('href')
                        ];

                        $itemPage = file_get_html('https://4lapy.ru' . $product['productLink']);

                        if (!empty($itemPage)) {
                            $this->data[] = [
                                'productName' => $itemPage->find('h1.b-title--card')[0]->innertext(),
                                'productImage' => $product['productImage'],
                                'productPrice' => $itemPage->find('.b-product-information__price')[0]->innertext(),
                                'productDescription' => htmlspecialchars($itemPage->find('.rc-product-detail')[0]->innertext())
                            ];
                        }
                    }
                }

                return $this->data;
            }

            foreach ($this->rowData->find('.b-common-item--catalog') as $sections) {
                $section = [
                    'sectionId' => $sections->getAttribute('id'),
                    'sectionName' => $sections->find('.b-clipped-text--catalog span')[0]->innertext(),
                    'sectionLink' => $sections->find('.b-common-item__link')[0]->getAttribute('href')
                ];

                $this->data[$section['sectionId']] = [
                    'sectionName' => $section['sectionName'],
                    'items' => []
                ];

                $itemsPage = file_get_html('https://4lapy.ru' . $section['sectionLink']);

                foreach ($itemsPage->find('.b-common-item--catalog-item') as $item) {
                    if (!empty($item->find('.b-common-item__image'))) {
                        $product = [
                            'productImage' => $item->find('.b-common-item__image')[0]->getAttribute('src'),
                            'productLink' => $item->find('.b-common-item__description-wrap')[0]->getAttribute('href')
                        ];

                        $itemPage = file_get_html('https://4lapy.ru' . $product['productLink']);

                        if (!empty($itemPage)) {
                            $this->data[$section['sectionId']]['items'][] = [
                                'productName' => $itemPage->find('h1.b-title--card')[0]->innertext(),
                                'productImage' => $product['productImage'],
                                'productPrice' => $itemPage->find('.b-product-information__price')[0]->innertext(),
                                'productDescription' => htmlspecialchars($itemPage->find('.rc-product-detail')[0]->innertext())
                            ];
                        }
                    }
                }
            }
        }

        return $this->data;
    }

    public function getCountElements(): int
    {
        return count($this->data) ?? 0;
    }
}