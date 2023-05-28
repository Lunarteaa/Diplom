<?php

namespace src\writers\custom\purfectpets_local;

use src\interfaces\ReadersInterface;
use src\interfaces\WritersInterface;

class PurfectpetsSectionWriter implements WritersInterface
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
        $dir = ROOT_DIR . '/../' . $this->options['folder_for_section_images'];
        if(!is_dir($dir)) @mkdir($dir,0777, true);

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

        foreach ($sections as $section) {
            $siteDomain = $this->options['parse_site_domain'];

            $ch = curl_init($siteDomain . $section['sectionPathImage']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $picture = curl_exec($ch);
            curl_close($ch);

            $imagePathArray = explode('/', $section['sectionPathImage']);
            $imageName = $imagePathArray[count($imagePathArray) - 1];

            $absoluteImagePath = $dir . '/' . $imageName;

            file_put_contents($absoluteImagePath, $picture);

            $imagePath = $this->options['folder_for_section_images'] . $imageName;

            mysqli_query(
                $link,
                'INSERT INTO '. $this->options['db_table_section'] .' (name, photopath, code) VALUES ("' . $section['sectionName'] . '", "' . $imagePath . '", "'. $section['sectionCode'] .'")'
            );
        }
    }
}