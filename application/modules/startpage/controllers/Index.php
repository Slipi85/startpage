<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Startpage\Controllers;

use Modules\Startpage\Mappers\Startpage as StartpageMapper;

class Index extends \Ilch\Controller\Frontend
{
    public function init()
    {
    }

    public function indexAction()
    {
      $startpageMapper = new StartpageMapper();
      $startpage = $startpageMapper->getStartpage();

      $this->getView()->set('startpage', $startpage);
      $this->getView()->set('layout', $this->getLayout());

      }
}

