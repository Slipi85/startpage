<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Startpage\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'key' => 'startpage',
        'version' => '1.0',
        'icon_small' => 'fa-superpowers',
        'author' => 'Slipi',
        'link' => 'https://www.ilch.de',
        'languages' => [
            'de_DE' => [
                'name' => 'Startseite',
                'description' => 'In diesem Modul kann eine Startseite verwalten werden, in dem man einzellne Sektionen hinzufühgt. Diese Sektionen können in 1 - 4 Berreiche aufgeteilt werden.',
            ],
            'en_EN' => [
                'name' => 'Startpage',
                'description' => 'In this module you can manage a home page in which you can add a cell section',
            ],
        ],
        'ilchCore' => '2.0.0',
        'phpVersion' => '5.6'
    ];

    public function install()
    {
      $this->db()->queryMulti($this->getInstallSql());
    }

    public function uninstall()
    {
      $this->db()->queryMulti('DROP TABLE `[prefix]_startpage`;
                               DROP TABLE `[prefix]_startpage_col`;');
    }

    public function getInstallSql()
    {
      return	'CREATE TABLE IF NOT EXISTS `[prefix]_startpage` (
      				`id` INT(11) NOT NULL AUTO_INCREMENT,
      				`grid` MEDIUMTEXT NOT NULL,
      				`box1` VARCHAR(255) NOT NULL,
      				`box2` VARCHAR(255) NOT NULL,
      				`box3` VARCHAR(255) NOT NULL,
      				`box4` VARCHAR(255) NOT NULL,
              `background_selection` MEDIUMTEXT NOT NULL,
      				`background` VARCHAR(255) NOT NULL,
              `image` VARCHAR(255) NOT NULL,
              `color` VARCHAR(255) NOT NULL,
              `heading` VARCHAR(255) NOT NULL,
              `class` VARCHAR(255) NOT NULL,
              `background_grid` VARCHAR(255) NOT NULL,
              `color_grid` VARCHAR(255) NOT NULL,
              `function` MEDIUMTEXT NOT NULL,
      				PRIMARY KEY (`id`)
      		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;

          CREATE TABLE IF NOT EXISTS `[prefix]_startpage_col` (
              `id` Int(11) NOT NULL AUTO_INCREMENT,
              `ilch-col` VARCHAR(55) NOT NULL,
              PRIMARY KEY (`id`)
      		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;

          INSERT INTO `[prefix]_startpage_col` (`id`, `ilch-col`) VALUES
              (1, "ilch-col-1"),
              (2, "ilch-col-2"),
              (3, "ilch-col-3"),
              (4, "ilch-col-4"),
              (5, "ilch-col-5"),
              (6, "ilch-col-6"),
              (7, "ilch-col-7"),
              (8, "ilch-col-8"),
              (9, "ilch-col-9"),
              (10, "ilch-col-10"),
              (11, "ilch-col-11"),
              (12, "ilch-col-12");';
    }
    public function getUpdate($installedVersion)
    {

    }
}
