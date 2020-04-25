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
//        $startpageArray = $this->db()->select(['startpage.id', 'startpage.grid', 'startpage.box1', 'startpage.box2', 'startpage.box3', 'startpage.box4', 'startpage.background_selection', 'startpage.background', 'startpage.image', 'startpage.color', 'startpage.heading', 'startpage.class', 'startpage.boxshadow', 'startpage.background_grid', 'startpage.color_grid', 'startpage.function'])
//            ->from(['startpage' => 'startpage'])
//            ->join(['selfbox' => 'boxes_content'], 'startpage.box1 = selfbox.box_id', 'LEFT', ['box1_id' => 'selfbox.box_id', 'box1_content' => 'selfbox.content', 'box1_locale' => 'selfbox.locale', 'box1_title' => 'selfbox.title'])
//            ->join(['selfbox2' => 'boxes_content'], 'startpage.box2 = selfbox2.box_id', 'LEFT', ['box2_id' => 'selfbox2.box_id', 'box2_content' => 'selfbox2.content', 'box2_locale' => 'selfbox2.locale', 'box2_title' => 'selfbox2.title'])
//            ->join(['selfbox3' => 'boxes_content'], 'startpage.box3 = selfbox3.box_id', 'LEFT', ['box3_id' => 'selfbox3.box_id', 'box3_content' => 'selfbox3.content', 'box3_locale' => 'selfbox3.locale', 'box3_title' => 'selfbox3.title'])
//            ->join(['selfbox4' => 'boxes_content'], 'startpage.box4 = selfbox4.box_id', 'LEFT', ['box4_id' => 'selfbox4.box_id', 'box4_content' => 'selfbox4.content', 'box4_locale' => 'selfbox4.locale', 'box4_title' => 'selfbox4.title'])
////            ->join(['modulebox' => 'modules_boxes_content'], 'startpage.box1 = modulebox.key', 'LEFT', ['box1_key' => 'modulebox.key', 'box1_module' => 'modulebox.module', 'box1_modulelocale' => 'modulebox.locale', 'box1_name' => 'modulebox.name'])
////            ->join(['modulebox' => 'modules_boxes_content'], 'startpage.box2 = modulebox.key', 'LEFT', ['box2_key' => 'modulebox.key', 'box2_module' => 'modulebox.module', 'box2_modulelocale' => 'modulebox.locale', 'box2_name' => 'modulebox.name'])
////            ->join(['modulebox' => 'modules_boxes_content'], 'startpage.box3 = modulebox.key', 'LEFT', ['box3_key' => 'modulebox.key', 'box3_module' => 'modulebox.module', 'box3_modulelocale' => 'modulebox.locale', 'box3_name' => 'modulebox.name'])
////            ->join(['modulebox' => 'modules_boxes_content'], 'startpage.box4 = modulebox.key', 'LEFT', ['box4_key' => 'modulebox.key', 'box4_module' => 'modulebox.module', 'box4_modulelocale' => 'modulebox.locale', 'box4_name' => 'modulebox.name'])
//            ->where($where)
//            ->execute()
//            ->fetchRows();

        if (empty($startpageArray)) {
            return [];
        }

        $startpages = [];
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
            $startpages[] = $startpageModel;
        }

        return $startpages;
    }

    /**
     * Return a slimmed down list of the startpages (id, grid, heading and class).
     *
     * @param array $where
     * @return array|StartpageModel[]
     */
    public function getStartPagesList($where = [])
    {
        $startpageRows = $this->db()->select(['id', 'grid', 'heading', 'class'])
            ->from('startpage')
            ->where($where)
            ->execute()
            ->fetchRows();

        if (empty($startpageRows)) {
            return [];
        }

        $startpages = [];
        foreach ($startpageRows as $startpageRow) {
            $startpageModel = new StartpageModel();

            $startpageModel->setId($startpageRow['id']);
            $startpageModel->setGrid($startpageRow['grid']);
            $startpageModel->setHeading($startpageRow['heading']);
            $startpageModel->setClass($startpageRow['class']);
            $startpages[] = $startpageModel;
        }

        return $startpages;
    }

    /**
     * Get box from datebase by key and name.
     *
     * @param array $where
     * @return mixed
     */
    // TODO: Use getBoxByIdLocale in the box mapper of the admin module if possible.
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
