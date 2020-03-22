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
     * The Grid of the startpage.
     *
     * @var string
     */
    protected $box1;

    /**
     * The Grid of the startpage.
     *
     * @var string
     */
    protected $box2;

    /**
     * The Grid of the startpage.
     *
     * @var string
     */
    protected $box3;

    /**
     * The Grid of the startpage.
     *
     * @var string
     */
    protected $box4;

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
    * @param int $grid
    * @return this
    */
    public function setGrid($grid)
    {
      $this->grid = (int)$grid;

      return $this;
    }

    /**
     * Gets the box1 of the startpage.
     *
     * @param string $box1
     * @return this
     */
    public function getBox1()
    {
        return $this->box1;
    }

    /**
     * Sets the box1 of the startpage.
     *
     * @param int $box1
     * @return this
     */
    public function setBox1($box1)
    {
        $this->box1 = $box1;

        return $this;
    }

    /**
     * Gets the box2 of the startpage.
     *
     * @param string $box2
     * @return this
     */
    public function getBox2()
    {
        return $this->box2;
    }

    /**
     * Sets the box2 of the startpage.
     *
     * @param string $box2
     * @return this
     */
    public function setBox2($box2)
    {
        $this->box2 = $box2;

        return $this;
    }

    /**
     * Gets the box3 of the startpage.
     *
     * @param string $box3
     * @return this
     */
    public function getBox3()
    {
        return $this->box3;
    }

    /**
     * Sets the box3 of the startpage.
     *
     * @param string $box3
     * @return this
     */
    public function setBox3($box3)
    {
        $this->box3 = $box3;

        return $this;
    }

    /**
     * Gets the box4 of the startpage.
     *
     * @param string $box4
     * @return this
     */
    public function getBox4()
    {
        return $this->box4;
    }

    /**
     * Sets the box4 of the startpage.
     *
     * @param string $box4
     * @return this
     */
    public function setBox4($box4)
    {
        $this->box4 = $box4;

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
