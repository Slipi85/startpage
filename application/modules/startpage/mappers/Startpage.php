<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Startpage\Mappers;
use Modules\Startpage\Models\Startpage as StartpageModel;

class Startpage extends \Ilch\Mapper
{
  /**
   * Get social (optionally with a condition)
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
      foreach ($startpageArray as $startpageRow) {
          $startpageModel = new StartpageModel();
          $startpageModel->setId($startpageRow['id']);
          $startpageModel->setGrid($startpageRow['grid']);
          $startpageModel->setBox1($startpageRow['box1']);
          $startpageModel->setBox2($startpageRow['box2']);
          $startpageModel->setBox3($startpageRow['box3']);
          $startpageModel->setBox4($startpageRow['box4']);
          $startpageModel->setBackgroundSelection($startpageRow['background_selection']);
          $startpageModel->setBackground($startpageRow['background']);
          $startpageModel->setImage($startpageRow['image']);
          $startpageModel->setColor($startpageRow['color']);
          $startpageModel->setHeading($startpageRow['heading']);
          $startpageModel->setClass($startpageRow['class']);
          $startpageModel->setBackgroundGrid($startpageRow['background_grid']);
          $startpageModel->setColorGrid($startpageRow['color_grid']);
          $startpageModel->setFunction($startpageRow['function']);

          $startpage[] = $startpageModel;
      }

      return $startpage;
  }

  /**
   * Get social by id.
   *
   * @param $id
   * @return mixed
   */
  public function getStartpageById($id)
  {
      $startpage = $this->getStartpage(['id' => $id]);
      return reset($startpage);
  }

  /**
   * Save social to database.
   *
   * @param StartpageModel $social
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
   * Delete social by id.
   *
   * @param $id
   */
  public function delete($id)
  {
      $this->db()->delete('startpage')
          ->where(['id' => $id])
          ->execute();
  }
}
