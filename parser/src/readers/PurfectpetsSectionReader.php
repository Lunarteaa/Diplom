<?php

namespace src\readers;

use src\interfaces\ReadersInterface;

class PurfectpetsSectionReader implements ReadersInterface
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
            foreach ($this->rowData->find('.b-common-item--catalog') as $element) {
                $image = $element->find('img')[0];

                if ($image->getAttribute('src') === '/static/build/images/inhtml/no_image_list.jpg') {
                    $this->data[] = [
                        'sectionPathImage' => $image->getAttribute('data-img-product-catalog-main'),
                        'sectionName' => $element->find('.b-clipped-text--catalog span')[0]->innertext(),
                        'sectionCode' => $element->getAttribute('id')
                    ];
                } else {
                    $this->data[] = [
                        'sectionPathImage' => $image->getAttribute('src'),
                        'sectionName' => $element->find('.b-clipped-text--catalog span')[0]->innertext(),
                        'sectionCode' => $element->getAttribute('id')
                    ];
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