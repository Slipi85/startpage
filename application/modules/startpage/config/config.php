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
      $this->db()->queryMulti('DROP TABLE `[prefix]_startpage`;');
    }

    public function getInstallSql()
    {
      return	'CREATE TABLE IF NOT EXISTS `[prefix]_startpage` (
      				`id` INT(11) NOT NULL AUTO_INCREMENT,
      				`grid` MEDIUMTEXT NOT NULL,
              `background_selection` MEDIUMTEXT NOT NULL,
      				`background` VARCHAR(255) NOT NULL,
              `color` VARCHAR(255) NOT NULL,
              `heading` MEDIUMTEXT NOT NULL,
              `class` VARCHAR(255) NOT NULL,
              `grid1` MEDIUMTEXT NOT NULL,
              `grid2` MEDIUMTEXT NOT NULL,
              `grid3` MEDIUMTEXT NOT NULL,
              `grid4` MEDIUMTEXT NOT NULL,
              `background_grid` VARCHAR(255) NOT NULL,
              `color_grid` VARCHAR(255) NOT NULL,
              `function` MEDIUMTEXT NOT NULL,
      				PRIMARY KEY (`id`)
      				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;';
    }
    public function getUpdate($installedVersion)
    {

    }
}
