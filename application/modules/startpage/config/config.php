<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Startpage\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'key' => 'startpage',
        'icon_small' => 'fa-star',
        'author' => 'Slipi',
        'languages' => [
            'de_DE' => [
                'name' => 'Startseite',
                'description' => 'In diesem Modul kann eine Startseite verwaltet werden, indem man einzelne Sektionen hinzufügt. Diese Sektionen können in 1 - 4 Bereiche aufgeteilt werden.',
            ],
            'en_EN' => [
                'name' => 'Startpage',
                'description' => 'In this module you can manage a home page in which you can add single sections. These sections can be distributed to one to four areas.',
            ],
        ],
        'system_module' => 'true'
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
        return 'CREATE TABLE IF NOT EXISTS `[prefix]_startpage` (
                    `id` INT(11) NOT NULL AUTO_INCREMENT,
                    `grid` TINYINT(1) NOT NULL,
                    `box1` VARCHAR(255) NOT NULL,
                    `box2` VARCHAR(255) NOT NULL,
                    `box3` VARCHAR(255) NOT NULL,
                    `box4` VARCHAR(255) NOT NULL,
                    `background_selection` INT(11) NOT NULL,
                    `background` VARCHAR(255) NOT NULL,
                    `image` VARCHAR(255) NOT NULL,
                    `color` VARCHAR(255) NOT NULL,
                    `heading` VARCHAR(255) NOT NULL,
                    `class` VARCHAR(255) NOT NULL,
                    `boxshadow` VARCHAR(255) NOT NULL,
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
