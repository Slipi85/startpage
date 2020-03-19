<?php
$startpages = $this->get('startpage');
?>
<link href="<?=$this->getModuleUrl('static/css/startpage.css') ?>" rel="stylesheet">
<?php
function gridCol() {
    $grid = $this->get('startpage');
    if ($grid->getGrid() == '1') {
        echo "col-lg-12";
    }elseif ($grid->getGrid() == '2') {
        echo "col-lg-6";
    }elseif ($grid->getGrid() == '3') {
        echo "col-lg-4";
    }else{
    echo "col-lg-3";
    }
}
?>
<?php if (!empty($startpages)): ?>
  <?php foreach ($startpages as $startpage): ?>
  <div class="<?php echo gridCol() ?> <?=$this->escape($startpage->getClass()) ?> start-padding">
        <div class="start-panel">
              <div class="start-heading">
                  <h1><?=$this->escape($startpage->getHeading()) ?></h1>
              </div>
              <div class="start-content">

              </div>
        </div>
        <style>
          .<?php echo $startpage->getClass();?> {background:<?php echo $startpage->getBackground();?>}
          .<?php echo $startpage->getClass();?> .start-panel {background:<?php echo $startpage->getBackgroundGrid()?>;<?=$this->escape($startpage->getColorGrid()) ?>;}
        </style>
  </div>
  <?php endforeach; ?>
<?php else: ?>
    <?=$this->getTrans('noSectionIndex') ?>
<?php endif; ?>
