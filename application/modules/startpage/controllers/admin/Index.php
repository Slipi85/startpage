<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Startpage\Controllers\Admin;

use Modules\Startpage\Mappers\Startpage as StartpageMapper;
use Modules\Startpage\Models\Startpage as StartpageModel;
use Ilch\Validation;

class Index extends \Ilch\Controller\Admin
{
  public function init()
  {
      $items = [
          [
              'name' => 'manage',
              'active' => false,
              'icon' => 'fa fa-th-list',
              'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'index']),
              [
                  'name' => 'add',
                  'active' => false,
                  'icon' => 'fa fa-plus-circle',
                  'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'treat'])
              ]
          ],
      ];

      if ($this->getRequest()->getActionName() === 'treat') {
          $items[0][0]['active'] = true;
      } else {
          $items[0]['active'] = true;
      }

      $this->getLayout()->addMenu
      (
          'menuStartpage',
          $items
      );
  }

  public function indexAction()
  {
      $startpageMapper = new StartpageMapper();

      $this->getLayout()->getAdminHmenu()
              ->add($this->getTranslator()->trans('menuStartpage'), ['action' => 'index']);

      if ($this->getRequest()->getPost('action') === 'delete' && $this->getRequest()->getPost('check_startpage')) {
          foreach ($this->getRequest()->getPost('check_startpage') as $startpageId) {
              $startpageId->delete($startpageId);
          }
      }

      $this->getView()->set('startpages', $startpageMapper->getStartpage());
  }

  public function treatAction()
  {
      $startpageMapper = new StartpageMapper();

      if ($this->getRequest()->getParam('id')) {
          $this->getLayout()->getAdminHmenu()
                  ->add($this->getTranslator()->trans('menuStartpage'), ['action' => 'index'])
                  ->add($this->getTranslator()->trans('edit'), ['action' => 'treat']);

          $this->getView()->set('startpage', $startpageMapper->getStartpageById($this->getRequest()->getParam('id')));
      } else {
          $this->getLayout()->getAdminHmenu()
                  ->add($this->getTranslator()->trans('menuStartpage'), ['action' => 'index'])
                  ->add($this->getTranslator()->trans('add'), ['action' => 'treat']);
      }

      if ($this->getRequest()->isPost()) {
          $validation = Validation::create($this->getRequest()->getPost(), [
            'heading' => 'required',
            'class' => 'required',
            'grid' => 'required'
          ]);

          if ($validation->isValid()) {
              $model = new StartpageModel();

              if ($this->getRequest()->getParam('id')) {
                  $model->setId($this->getRequest()->getParam('id'));
              }

              $model->setGrid($this->getRequest()->getPost('grid'));
              $model->setBackgroundselection($this->getRequest()->getPost('background_selection'));
              $model->setBackground($this->getRequest()->getPost('background'));
              $model->setImage($this->getRequest()->getPost('image'));
              $model->setColor($this->getRequest()->getPost('color'));
              $model->setHeading($this->getRequest()->getPost('heading'));
              $model->setClass($this->getRequest()->getPost('class'));
              $model->setGrid1($this->getRequest()->getPost('grid1'));
              $model->setGrid2($this->getRequest()->getPost('grid2'));
              $model->setGrid3($this->getRequest()->getPost('grid3'));
              $model->setGrid4($this->getRequest()->getPost('grid4'));
              $model->setBackgroundGrid($this->getRequest()->getPost('background_grid'));
              $model->setColorGrid($this->getRequest()->getPost('color_grid'));
              $model->setHeadingGrid1($this->getRequest()->getPost('heading_grid1'));
              $model->setHeadingGrid2($this->getRequest()->getPost('heading_grid2'));
              $model->setHeadingGrid3($this->getRequest()->getPost('heading_grid3'));
              $model->setHeadingGrid4($this->getRequest()->getPost('heading_grid4'));
              $model->setFunction($this->getRequest()->getPost('function'));
              $startpageMapper->save($model);

              $this->addMessage('saveSuccess');
              $this->redirect(['action' => 'index']);
          } else {
              $this->addMessage($validation->getErrorBag()->getErrorMessages(), 'danger', true);
              $this->redirect()
                ->withInput()
                ->withErrors($validation->getErrorBag())
                ->to(['action' => 'treat', 'id' => $this->getRequest()->getParam('id')]);
          }
      }

      $this->getView()->set('startpages', $startpageMapper->getStartpage());
  }

  public function delStartpageAction()
  {
      if ($this->getRequest()->isSecure()) {
          $startpageMapper = new StartpageMapper();
          $startpageMapper->delete($this->getRequest()->getParam('id'));

          $this->addMessage('deleteSuccess');
      }

      $this->redirect(['action' => 'index']);
  }
}
