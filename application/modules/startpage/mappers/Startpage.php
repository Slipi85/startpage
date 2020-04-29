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
     * Get all startpages by locale.
     *
     * @param string $locale
     * @return array|StartpageModel[]
     */
    public function getStartpages($locale)
    {
        $startpageArray = $this->db()->select(['startpage.id', 'startpage.grid', 'startpage.box1', 'startpage.box2', 'startpage.box3', 'startpage.box4', 'startpage.background_selection', 'startpage.background', 'startpage.image', 'startpage.color', 'startpage.heading', 'startpage.class', 'startpage.boxshadow', 'startpage.background_grid', 'startpage.color_grid'])
            ->from(['startpage' => 'startpage'])
            ->join(['selfbox1' => 'boxes_content'], 'startpage.box1 = selfbox1.box_id', 'LEFT', ['selfbox1_id' => 'selfbox1.box_id', 'selfbox1_content' => 'selfbox1.content', 'selfbox1_locale' => 'selfbox1.locale', 'selfbox1_title' => 'selfbox1.title'])
            ->join(['selfbox2' => 'boxes_content'], 'startpage.box2 = selfbox2.box_id', 'LEFT', ['selfbox2_id' => 'selfbox2.box_id', 'selfbox2_content' => 'selfbox2.content', 'selfbox2_locale' => 'selfbox2.locale', 'selfbox2_title' => 'selfbox2.title'])
            ->join(['selfbox3' => 'boxes_content'], 'startpage.box3 = selfbox3.box_id', 'LEFT', ['selfbox3_id' => 'selfbox3.box_id', 'selfbox3_content' => 'selfbox3.content', 'selfbox3_locale' => 'selfbox3.locale', 'selfbox3_title' => 'selfbox3.title'])
            ->join(['selfbox4' => 'boxes_content'], 'startpage.box4 = selfbox4.box_id', 'LEFT', ['selfbox4_id' => 'selfbox4.box_id', 'selfbox4_content' => 'selfbox4.content', 'selfbox4_locale' => 'selfbox4.locale', 'selfbox4_title' => 'selfbox4.title'])
            ->join(['modulebox1' => 'modules_boxes_content'], 'startpage.box1 = modulebox1.key', 'LEFT', ['modulebox1_key' => 'modulebox1.key', 'modulebox1_module' => 'modulebox1.module', 'modulebox1_locale' => 'modulebox1.locale', 'modulebox1_name' => 'modulebox1.name'])
            ->join(['modulebox2' => 'modules_boxes_content'], 'startpage.box2 = modulebox2.key', 'LEFT', ['modulebox2_key' => 'modulebox2.key', 'modulebox2_module' => 'modulebox2.module', 'modulebox2_locale' => 'modulebox2.locale', 'modulebox2_name' => 'modulebox2.name'])
            ->join(['modulebox3' => 'modules_boxes_content'], 'startpage.box3 = modulebox3.key', 'LEFT', ['modulebox3_key' => 'modulebox3.key', 'modulebox3_module' => 'modulebox3.module', 'modulebox3_locale' => 'modulebox3.locale', 'modulebox3_name' => 'modulebox3.name'])
            ->join(['modulebox4' => 'modules_boxes_content'], 'startpage.box4 = modulebox4.key', 'LEFT', ['modulebox4_key' => 'modulebox4.key', 'modulebox4_module' => 'modulebox4.module', 'modulebox4_locale' => 'modulebox4.locale', 'modulebox4_name' => 'modulebox4.name'])
            ->where(['startpage.grid' => 1, 'modulebox1.locale' => $locale])
            ->orWhere(['startpage.grid >=' => 2, 'modulebox1.locale' => $locale, 'modulebox2.locale' => $locale])
            ->orWhere(['startpage.grid >=' => 3, 'modulebox1.locale' => $locale, 'modulebox2.locale' => $locale, 'modulebox3.locale' => $locale])
            ->orWhere(['startpage.grid' => 4, 'modulebox1.locale' => $locale, 'modulebox2.locale' => $locale, 'modulebox3.locale' => $locale, 'modulebox4.locale' => $locale])
            ->orWhere(['modulebox1.key' => '', 'modulebox2.key' => '', 'modulebox3.key' => '', 'modulebox4.key' => ''], 'or')
            ->group(['startpage.id'])
            ->execute()
            ->fetchRows();

        file_put_contents('php://stderr', print_r($startpageArray, TRUE));
        if (empty($startpageArray)) {
            return [];
        }

        $startpages = [];
        foreach ($startpageArray as $startpageRow) {
            $startpageModel = new StartpageModel();
            $startpageModel->setId($startpageRow['id']);
            $startpageModel->setGrid($startpageRow['grid']);

            $boxModel = new BoxModel();
            if (!empty($startpageRow['modulebox1_key'])) {
                $boxModel->setKey($startpageRow['modulebox1_key']);
                $boxModel->setModule($startpageRow['modulebox1_module']);
                $boxModel->setLocale($startpageRow['modulebox1_locale']);
                $boxModel->setName($startpageRow['modulebox1_name']);
            } else {
                $boxModel->setId($startpageRow['selfbox1_id']);
                $boxModel->setContent($startpageRow['selfbox1_content']);
                $boxModel->setLocale($startpageRow['selfbox1_locale']);
                $boxModel->setTitle($startpageRow['selfbox1_title']);
            }
            $startpageModel->setBox1($boxModel);

            $boxModel = new BoxModel();
            if (!empty($startpageRow['modulebox2_key'])) {
                $boxModel->setKey($startpageRow['modulebox2_key']);
                $boxModel->setModule($startpageRow['modulebox2_module']);
                $boxModel->setLocale($startpageRow['modulebox2_locale']);
                $boxModel->setName($startpageRow['modulebox2_name']);
            } else {
                $boxModel->setId($startpageRow['selfbox2_id']);
                $boxModel->setContent($startpageRow['selfbox2_content']);
                $boxModel->setLocale($startpageRow['selfbox2_locale']);
                $boxModel->setTitle($startpageRow['selfbox2_title']);
            }
            $startpageModel->setBox2($boxModel);

            $boxModel = new BoxModel();
            if (!empty($startpageRow['modulebox3_key'])) {
                $boxModel->setKey($startpageRow['modulebox3_key']);
                $boxModel->setModule($startpageRow['modulebox3_module']);
                $boxModel->setLocale($startpageRow['modulebox3_locale']);
                $boxModel->setName($startpageRow['modulebox3_name']);
            } else {
                $boxModel->setId($startpageRow['selfbox3_id']);
                $boxModel->setContent($startpageRow['selfbox3_content']);
                $boxModel->setLocale($startpageRow['selfbox3_locale']);
                $boxModel->setTitle($startpageRow['selfbox3_title']);
            }
            $startpageModel->setBox3($boxModel);

            $boxModel = new BoxModel();
            if (!empty($startpageRow['modulebox4_key'])) {
                $boxModel->setKey($startpageRow['modulebox4_key']);
                $boxModel->setModule($startpageRow['modulebox4_module']);
                $boxModel->setLocale($startpageRow['modulebox4_locale']);
                $boxModel->setName($startpageRow['modulebox4_name']);
            } else {
                $boxModel->setId($startpageRow['selfbox4_id']);
                $boxModel->setContent($startpageRow['selfbox4_content']);
                $boxModel->setLocale($startpageRow['selfbox4_locale']);
                $boxModel->setTitle($startpageRow['selfbox4_title']);
            }
            $startpageModel->setBox4($boxModel);

            $startpageModel->setBackgroundSelection($startpageRow['background_selection']);
            $startpageModel->setBackground($startpageRow['background']);
            $startpageModel->setImage($startpageRow['image']);
            $startpageModel->setColor($startpageRow['color']);
            $startpageModel->setHeading($startpageRow['heading']);
            $startpageModel->setClass($startpageRow['class']);
            $startpageModel->setBoxShadow($startpageRow['boxshadow']);
            $startpageModel->setBackgroundGrid($startpageRow['background_grid']);
            $startpageModel->setColorGrid($startpageRow['color_grid']);
            $startpages[] = $startpageModel;
        }

        return $startpages;
    }

    /**
     * Get a startpage by id and locale.
     *
     * @param int $id
     * @param string $locale
     * @return StartpageModel|null
     */
    public function getStartpage($id, $locale)
    {
        $startpageRow = $this->db()->select(['startpage.id', 'startpage.grid', 'startpage.box1', 'startpage.box2', 'startpage.box3', 'startpage.box4', 'startpage.background_selection', 'startpage.background', 'startpage.image', 'startpage.color', 'startpage.heading', 'startpage.class', 'startpage.boxshadow', 'startpage.background_grid', 'startpage.color_grid'])
            ->from(['startpage' => 'startpage'])
            ->join(['selfbox1' => 'boxes_content'], 'startpage.box1 = selfbox1.box_id', 'LEFT', ['selfbox1_id' => 'selfbox1.box_id', 'selfbox1_content' => 'selfbox1.content', 'selfbox1_locale' => 'selfbox1.locale', 'selfbox1_title' => 'selfbox1.title'])
            ->join(['selfbox2' => 'boxes_content'], 'startpage.box2 = selfbox2.box_id', 'LEFT', ['selfbox2_id' => 'selfbox2.box_id', 'selfbox2_content' => 'selfbox2.content', 'selfbox2_locale' => 'selfbox2.locale', 'selfbox2_title' => 'selfbox2.title'])
            ->join(['selfbox3' => 'boxes_content'], 'startpage.box3 = selfbox3.box_id', 'LEFT', ['selfbox3_id' => 'selfbox3.box_id', 'selfbox3_content' => 'selfbox3.content', 'selfbox3_locale' => 'selfbox3.locale', 'selfbox3_title' => 'selfbox3.title'])
            ->join(['selfbox4' => 'boxes_content'], 'startpage.box4 = selfbox4.box_id', 'LEFT', ['selfbox4_id' => 'selfbox4.box_id', 'selfbox4_content' => 'selfbox4.content', 'selfbox4_locale' => 'selfbox4.locale', 'selfbox4_title' => 'selfbox4.title'])
            ->join(['modulebox1' => 'modules_boxes_content'], 'startpage.box1 = modulebox1.key', 'LEFT', ['modulebox1_key' => 'modulebox1.key', 'modulebox1_module' => 'modulebox1.module', 'modulebox1_locale' => 'modulebox1.locale', 'modulebox1_name' => 'modulebox1.name'])
            ->join(['modulebox2' => 'modules_boxes_content'], 'startpage.box2 = modulebox2.key', 'LEFT', ['modulebox2_key' => 'modulebox2.key', 'modulebox2_module' => 'modulebox2.module', 'modulebox2_locale' => 'modulebox2.locale', 'modulebox2_name' => 'modulebox2.name'])
            ->join(['modulebox3' => 'modules_boxes_content'], 'startpage.box3 = modulebox3.key', 'LEFT', ['modulebox3_key' => 'modulebox3.key', 'modulebox3_module' => 'modulebox3.module', 'modulebox3_locale' => 'modulebox3.locale', 'modulebox3_name' => 'modulebox3.name'])
            ->join(['modulebox4' => 'modules_boxes_content'], 'startpage.box4 = modulebox4.key', 'LEFT', ['modulebox4_key' => 'modulebox4.key', 'modulebox4_module' => 'modulebox4.module', 'modulebox4_locale' => 'modulebox4.locale', 'modulebox4_name' => 'modulebox4.name'])
            ->where(['startpage.grid' => 1, 'modulebox1.locale' => $locale])
            ->orWhere(['startpage.grid >=' => 2, 'modulebox1.locale' => $locale, 'modulebox2.locale' => $locale])
            ->orWhere(['startpage.grid >=' => 3, 'modulebox1.locale' => $locale, 'modulebox2.locale' => $locale, 'modulebox3.locale' => $locale])
            ->orWhere(['startpage.grid' => 4, 'modulebox1.locale' => $locale, 'modulebox2.locale' => $locale, 'modulebox3.locale' => $locale, 'modulebox4.locale' => $locale])
            ->orWhere(['modulebox1.key' => '', 'modulebox2.key' => '', 'modulebox3.key' => '', 'modulebox4.key' => ''], 'or')
            ->group(['startpage.id'])
            ->execute()
            ->fetchAssoc();

        if (empty($startpageRow)) {
            return null;
        }

        $startpageModel = new StartpageModel();
        $startpageModel->setId($startpageRow['id']);
        $startpageModel->setGrid($startpageRow['grid']);

        $boxModel = new BoxModel();
        if (!empty($startpageRow['modulebox1_key'])) {
            $boxModel->setKey($startpageRow['modulebox1_key']);
            $boxModel->setModule($startpageRow['modulebox1_module']);
            $boxModel->setLocale($startpageRow['modulebox1_locale']);
            $boxModel->setName($startpageRow['modulebox1_name']);
        } else {
            $boxModel->setId($startpageRow['selfbox1_id']);
            $boxModel->setContent($startpageRow['selfbox1_content']);
            $boxModel->setLocale($startpageRow['selfbox1_locale']);
            $boxModel->setTitle($startpageRow['selfbox1_title']);
        }
        $startpageModel->setBox1($boxModel);

        $boxModel = new BoxModel();
        if (!empty($startpageRow['modulebox2_key'])) {
            $boxModel->setKey($startpageRow['modulebox2_key']);
            $boxModel->setModule($startpageRow['modulebox2_module']);
            $boxModel->setLocale($startpageRow['modulebox2_locale']);
            $boxModel->setName($startpageRow['modulebox2_name']);
        } else {
            $boxModel->setId($startpageRow['selfbox2_id']);
            $boxModel->setContent($startpageRow['selfbox2_content']);
            $boxModel->setLocale($startpageRow['selfbox2_locale']);
            $boxModel->setTitle($startpageRow['selfbox2_title']);
        }
        $startpageModel->setBox2($boxModel);

        $boxModel = new BoxModel();
        if (!empty($startpageRow['modulebox3_key'])) {
            $boxModel->setKey($startpageRow['modulebox3_key']);
            $boxModel->setModule($startpageRow['modulebox3_module']);
            $boxModel->setLocale($startpageRow['modulebox3_locale']);
            $boxModel->setName($startpageRow['modulebox3_name']);
        } else {
            $boxModel->setId($startpageRow['selfbox3_id']);
            $boxModel->setContent($startpageRow['selfbox3_content']);
            $boxModel->setLocale($startpageRow['selfbox3_locale']);
            $boxModel->setTitle($startpageRow['selfbox3_title']);
        }
        $startpageModel->setBox3($boxModel);

        $boxModel = new BoxModel();
        if (!empty($startpageRow['modulebox4_key'])) {
            $boxModel->setKey($startpageRow['modulebox4_key']);
            $boxModel->setModule($startpageRow['modulebox4_module']);
            $boxModel->setLocale($startpageRow['modulebox4_locale']);
            $boxModel->setName($startpageRow['modulebox4_name']);
        } else {
            $boxModel->setId($startpageRow['selfbox4_id']);
            $boxModel->setContent($startpageRow['selfbox4_content']);
            $boxModel->setLocale($startpageRow['selfbox4_locale']);
            $boxModel->setTitle($startpageRow['selfbox4_title']);
        }
        $startpageModel->setBox4($boxModel);

        $startpageModel->setBackgroundSelection($startpageRow['background_selection']);
        $startpageModel->setBackground($startpageRow['background']);
        $startpageModel->setImage($startpageRow['image']);
        $startpageModel->setColor($startpageRow['color']);
        $startpageModel->setHeading($startpageRow['heading']);
        $startpageModel->setClass($startpageRow['class']);
        $startpageModel->setBoxShadow($startpageRow['boxshadow']);
        $startpageModel->setBackgroundGrid($startpageRow['background_grid']);
        $startpageModel->setColorGrid($startpageRow['color_grid']);

        return $startpageModel;
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
