<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Startpage\Mappers;

use Modules\Media\Models\Media as MediaModel;
use Modules\Startpage\Models\Startpage as StartpageModel;
use Modules\Admin\Models\Box as BoxModel;

class Startpage extends \Ilch\Mapper
{
    /**
     * Get startpage (optionally with a condition)
     *
     * @param array $where
     * @return array|StartpageModel[]
     */
    public function getStartpage($where = [])
    {
        $startpageArray = $this->db()->select('*')
            ->from('startpage')
            ->where($where)
            ->execute()
            ->fetchRows();

        if (empty($startpageArray)) {
            return [];
        }

        $statpages = [];
        $boxMapper = new Startpage();
        foreach ($startpageArray as $startpageRow) {
            $startpageModel = new StartpageModel();

            $startpageModel->setId($startpageRow['id']);
            $startpageModel->setGrid($startpageRow['grid']);
            // TODO: Remove the four calls of getBoxById() (basically four database queries) per iteration.
            // boxMapper is not necessary as this is the class and the function is part of this class.
            $startpageModel->setBox1($boxMapper->getBoxById(['key' => $startpageRow['box1']]));
            $startpageModel->setBox2($boxMapper->getBoxById(['key' => $startpageRow['box2']]));
            $startpageModel->setBox3($boxMapper->getBoxById(['key' => $startpageRow['box3']]));
            $startpageModel->setBox4($boxMapper->getBoxById(['key' => $startpageRow['box4']]));
            $startpageModel->setBackgroundSelection($startpageRow['background_selection']);
            $startpageModel->setBackground($startpageRow['background']);
            $startpageModel->setImage($startpageRow['image']);
            $startpageModel->setColor($startpageRow['color']);
            $startpageModel->setHeading($startpageRow['heading']);
            $startpageModel->setClass($startpageRow['class']);
            $startpageModel->setBoxShadow($startpageRow['boxshadow']);
            $startpageModel->setBackgroundGrid($startpageRow['background_grid']);
            $startpageModel->setColorGrid($startpageRow['color_grid']);
            $startpageModel->setFunction($startpageRow['function']);

            $startpage[] = $startpageModel;
        }

        return $startpage;
    }

    /**
     * Get box from daterbase by key and name.
     *
     * @param array $where
     * @return mixed
     */
    // TODO: Consider using a similar function in the box mapper of the admin module if possible or move this to that mapper.
    private function getBoxById($where = [])
    {
        $boxRow = $this->db()->select('*')
            ->from('modules_boxes_content')
            ->where($where)
            ->execute()
            ->fetchAssoc();

        if (empty($boxRow)) {
            return null;
        }

        $boxModel = new BoxModel();
        $boxModel->setKey($boxRow['key']);
        $boxModel->setModule($boxRow['module']);
        $boxModel->setLocale($boxRow['locale']);
        $boxModel->setName($boxRow['name']);

        return $boxModel;
    }

    /**
     * Get startpage by id.
     *
     * @param int $id
     * @return mixed
     */
    public function getStartpageById($id)
    {
        $startpage = $this->getStartpage(['id' => $id]);
        return reset($startpage);
    }

    /**
     * Save startpage to database.
     *
     * @param StartpageModel $startpage
     */
    public function save(StartpageModel $startpage)
    {
        $fields = [
            'id' => $startpage->getId(),
            'grid' => $startpage->getGrid(),
            'box1' => $startpage->getBox1(),
            'box2' => $startpage->getBox2(),
            'box3' => $startpage->getBox3(),
            'box4' => $startpage->getBox4(),
            'background_selection' => $startpage->getBackgroundSelection(),
            'background' => $startpage->getBackground(),
            'image' => $startpage->getImage(),
            'color' => $startpage->getColor(),
            'heading' => $startpage->getHeading(),
            'class' => $startpage->getClass(),
            'boxshadow' => $startpage->getBoxShadow(),
            'background_grid' => $startpage->getBackgroundGrid(),
            'color_grid' => $startpage->getColorGrid(),
            'function' => $startpage->getFunction(),
        ];

        if ($startpage->getId()) {
            $this->db()->update('startpage')
                ->values($fields)
                ->where(['id' => $startpage->getId()])
                ->execute();
        } else {
            $this->db()->insert('startpage')
                ->values($fields)
                ->execute();
        }
    }

    /**
     * Delete startpage by id.
     *
     * @param int $id
     */
    public function delete($id)
    {
        $this->db()->delete('startpage')
            ->where(['id' => $id])
            ->execute();
    }
}
