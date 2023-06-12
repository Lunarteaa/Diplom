<?php

namespace src\writers\custom\purfectpets_local;

use src\interfaces\ReadersInterface;
use src\interfaces\WritersInterface;

class PurfectpetsProductsWriter implements WritersInterface
{
    private ReadersInterface $reader;
    private array $options;

    public function __construct(ReadersInterface $reader, array $options = [])
    {
        $this->reader = $reader;
        $this->options = $options;
    }

    public function run(): void
    {
        $dir = ROOT_DIR . '/../' . $this->options['folder_for_products_images'];
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }

        $link = mysqli_connect(
            $this->options['db_host'],
            $this->options['db_user'],
            $this->options['db_password'],
            $this->options['db_database'],
            $this->options['db_port']
        );
        if (!$link) {
            die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }

        $sections = $this->reader->getElements();

        if($this->options['parse_section_link'] !== ''){
            foreach ($sections as $product) {
                $siteDomain = $this->options['parse_site_domain'];

                $ch = curl_init($siteDomain . $product['productImage']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $picture = curl_exec($ch);
                curl_close($ch);

                $imagePathArray = explode('/', $product['productImage']);
                $imageName = $imagePathArray[count($imagePathArray) - 1];

                $absoluteImagePath = $dir . '/' . $imageName;

                file_put_contents($absoluteImagePath, $picture);

                $imagePath = $this->options['folder_for_products_images'] . $imageName;

                $arrLink = explode('/', $this->options['parse_section_link']);
                $sectionKey = $arrLink[count($arrLink) - 2];

                $sql = mysqli_query($link, 'SELECT id FROM sections WHERE code="'.$sectionKey . '"');
                $sectionId = $sql->fetch_assoc();

                mysqli_query(
                    $link,
                    'INSERT INTO ' . $this->options['db_table_products'] . ' (name, description, photoPath, price, section_id) VALUES ("' . $product['productName'] . '", "' . $product['productDescription'] . '", "' . $imagePath . '", "' . $product['productPrice'] . '", '. $sectionId['id'] .')'
                );
            }

            return;
        }

        foreach ($sections as $sectionKey => $section) {
            foreach ($section['items'] as $product) {
                $siteDomain = $this->options['parse_site_domain'];

                $ch = curl_init($siteDomain . $product['productImage']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $picture = curl_exec($ch);
                curl_close($ch);

                $imagePathArray = explode('/', $product['productImage']);
                $imageName = $imagePathArray[count($imagePathArray) - 1];

                $absoluteImagePath = $dir . '/' . $imageName;

                file_put_contents($absoluteImagePath, $picture);

                $imagePath = $this->options['folder_for_products_images'] . $imageName;

                $sql = mysqli_query($link, 'SELECT id FROM sections WHERE code="'.$sectionKey . '"');
                $sectionId = $sql->fetch_assoc();

                mysqli_query(
                    $link,
                    'INSERT INTO ' . $this->options['db_table_products'] . ' (name, description, photoPath, price, section_id) VALUES ("' . $product['productName'] . '", "' . $product['productDescription'] . '", "' . $imagePath . '", "' . $product['productPrice'] . '", '. $sectionId['id'] .')'
                );
            }
        }
    }
}