<?php
/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Modules\Startpage\Controllers;

use Modules\Startpage\Mappers\Startpage as StartpageMapper;

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $startpageMapper = new StartpageMapper();
        $startpage = $startpageMapper->getStartpages($this->getTranslator()->getLocale());

        $this->getView()->set('startpage', $startpage);
        $this->getView()->set('layout', $this->getLayout());
    }
}

