<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Startpage\Models;

class Startpage extends \Ilch\Model
{
  /**
   * The Id of the startpage.
   *
   * @var int
   */
  protected $id;

  /**
   * The Grid of the startpage.
   *
   * @var string
   */
  protected $grid;

  /**
   * The Background-Selection of the startpage.
   *
   * @var string
   */
  protected $backgroundselection;

  /**
   * The Background of the startpage.
   *
   * @var string
   */
  protected $background;

  /**
   * The Image of the startpage.
   *
   * @var string
   */
  protected $image;

  /**
   * The Color of the startpage.
   *
   * @var string
   */
  protected $color;

  /**
   * The Heading of the startpage.
   *
   * @var string
   */
  protected $heading;

  /**
   * The Class of the startpage.
   *
   * @var string
   */
  protected $class;

  /**
   * The Grid1 of the startpage.
   *
   * @var string
   */
  protected $grid1;

  /**
   * The Grid2 of the startpage.
   *
   * @var string
   */
  protected $grid2;

  /**
   * The Grid3 of the startpage.
   *
   * @var string
   */
  protected $grid3;

  /**
   * The Grid4 of the startpage.
   *
   * @var string
   */
  protected $grid4;

  /**
   * The Background-Img of the startpage.
   *
   * @var string
   */
  protected $backgroundImg;

  /**
   * The Color-Grid of the startpage.
   *
   * @var string
   */
  protected $colorGrid;

  /**
   * The Color-Grid of the startpage.
   *
   * @var string
   */
  protected $headinggrid1;

  /**
   * The Color-Grid of the startpage.
   *
   * @var string
   */
  protected $headinggrid2;

  /**
   * The Color-Grid of the startpage.
   *
   * @var string
   */
  protected $headinggrid3;

  /**
   * The Color-Grid of the startpage.
   *
   * @var string
   */
  protected $headinggrid4;

  /**
   * The Function of the startpage.
   *
   * @var string
   */
  protected $function;

  /**
   * Gets the id of the startpage.
   *
   * @param int $id
   * @return this
   */
  public function getId()
  {
      return $this->id;
  }

  /**
   * Sets the id of the startpage.
   *
   * @param int $id
   * @return this
   */
  public function setId($id)
  {
      $this->id = (int)$id;

      return $this;
  }

  /**
   * Gets the grid of the startpage.
   *
   * @param int
   * @return this
   */
  public function getGrid()
  {
      return $this->grid;
  }

  /**
   * Sets the grid of the startpage.
   *
   * @param int $id
   * @return this
   */
  public function setGrid($grid)
  {
      $this->grid = (int)$grid;

      return $this;
  }

  /**
   * Gets the Background-Selection of the startpage.
   *
   * @param int
   * @return this
   */
  public function getBackgroundselection()
  {
      return $this->backgroundselection;
  }

  /**
   * Sets the Background-Selection of the startpage.
   *
   * @param int $backgroundselection
   * @return this
   */
  public function setBackgroundselection($backgroundselection)
  {
      $this->backgroundselection = (int)$backgroundselection;

      return $this;
  }

  /**
   * Gets the background of the startpage.
   *
   * @param string
   * @return this
   */
  public function getBackground()
  {
      return $this->background;
  }

  /**
   * Sets the background of the startpage.
   *
   * @param string $background
   * @return this
   */
  public function setBackground($background)
  {
      $this->background = (string)$background;

      return $this;
  }
  /**
   * Gets the image of the startpage.
   *
   * @param string
   * @return this
   */
  public function getImage()
  {
      return $this->image;
  }

  /**
   * Sets the image of the startpage.
   *
   * @param string $image
   * @return this
   */
  public function setImage($image)
  {
      $this->image = (string)$image;

      return $this;
  }
  /**
   * Gets the color of the startpage.
   *
   * @param string $color
   * @return this
   */
  public function getColor()
  {
      return $this->color;
  }

  /**
   * Sets the color of the startpage.
   *
   * @param string $color
   * @return this
   */
  public function setColor($color)
  {
      $this->color = (string)$color;

      return $this;
  }
  /**
   * Gets the heading of the startpage.
   *
   * @param string $id
   * @return this
   */
  public function getHeading()
  {
      return $this->heading;
  }

  /**
   * Sets the heading of the startpage.
   *
   * @param string $heading
   * @return this
   */
  public function setHeading($heading)
  {
      $this->heading = (string)$heading;

      return $this;
  }
  /**
   * Gets the class of the startpage.
   *
   * @param string
   * @return this
   */
  public function getClass()
  {
      return $this->class;
  }

  /**
   * Sets the class of the startpage.
   *
   * @param string $class
   * @return this
   */
  public function setClass($class)
  {
      $this->class = (string)$class;

      return $this;
  }
  /**
   * Gets the grid1 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getGrid1()
  {
      return $this->grid1;
  }

  /**
   * Sets the grid1 of the startpage.
   *
   * @param string $grid1
   * @return this
   */
  public function setGrid1($grid1)
  {
      $this->grid1 = (string)$grid1;

      return $this;
  }
  /**
   * Gets the grid2 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getGrid2()
  {
      return $this->grid2;
  }

  /**
   * Sets the grid2 of the startpage.
   *
   * @param string $grid2
   * @return this
   */
  public function setGrid2($grid2)
  {
      $this->grid2 = (string)$grid2;

      return $this;
  }
  /**
   * Gets the grid3 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getGrid3()
  {
      return $this->grid3;
  }

  /**
   * Sets the grid3 of the startpage.
   *
   * @param string $grid3
   * @return this
   */
  public function setGrid3($grid3)
  {
      $this->grid3 = (string)$grid3;

      return $this;
  }
  /**
   * Gets the grid4 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getGrid4()
  {
      return $this->grid4;
  }

  /**
   * Sets the grid4 of the startpage.
   *
   * @param string $grid4
   * @return this
   */
  public function setGrid4($grid4)
  {
      $this->grid4 = (string)$grid4;

      return $this;
  }

  /**
   * Gets the background-grid of the startpage.
   *
   * @param string
   * @return this
   */
  public function getBackgroundGrid()
  {
      return $this->backgroundgrid;
  }

  /**
   * Sets the background-grid of the startpage.
   *
   * @param string $backgroundgrid
   * @return this
   */
  public function setBackgroundGrid($backgroundgrid)
  {
      $this->backgroundgrid = (string)$backgroundgrid;

      return $this;
  }

  /**
   * Gets the color-gird of the startpage.
   *
   * @param string
   * @return this
   */
  public function getColorGrid()
  {
      return $this->colorgrid;
  }

  /**
   * Sets the color-grid of the startpage.
   *
   * @param string $colorgrid
   * @return this
   */
  public function setColorGrid($colorgrid)
  {
      $this->colorgrid = (string)$colorgrid;

      return $this;
  }

  /**
   * Gets the Heading Grid1 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getHeadingGrid1()
  {
      return $this->headinggrid1;
  }

  /**
   * Sets the Heading Grid1 of the startpage.
   *
   * @param string $headinggrid
   * @return this
   */
  public function setHeadingGrid1($headinggrid1)
  {
      $this->headinggrid1 = (string)$headinggrid1;

      return $this;
  }

  /**
   * Gets the Heading Grid1 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getHeadingGrid2()
  {
      return $this->headinggrid2;
  }

  /**
   * Sets the Heading Grid1 of the startpage.
   *
   * @param string $headinggrid2
   * @return this
   */
  public function setHeadingGrid2($headinggrid2)
  {
      $this->headinggrid2 = (string)$headinggrid2;

      return $this;
  }

  /**
   * Gets the Heading Grid3 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getHeadingGrid3()
  {
      return $this->headinggrid3;
  }

  /**
   * Sets the Heading Grid3 of the startpage.
   *
   * @param string $headinggrid3
   * @return this
   */
  public function setHeadingGrid3($headinggrid3)
  {
      $this->headinggrid3 = (string)$headinggrid3;

      return $this;
  }

  /**
   * Gets the Heading Grid4 of the startpage.
   *
   * @param string
   * @return this
   */
  public function getHeadingGrid4()
  {
      return $this->headinggrid4;
  }

  /**
   * Sets the Heading Grid4 of the startpage.
   *
   * @param string $headinggrid4
   * @return this
   */
  public function setHeadingGrid4($headinggrid4)
  {
      $this->headinggrid4 = (string)$headinggrid4;

      return $this;
  }

  /**
   * Gets the id of the startpage.
   *
   * @param int
   * @return this
   */
  public function getFunction()
  {
      return $this->function;
  }

  /**
   * Sets the id of the startpage.
   *
   * @param int $function
   * @return this
   */
  public function setFunction($function)
  {
      $this->function = (int)$function;

      return $this;
  }
}
