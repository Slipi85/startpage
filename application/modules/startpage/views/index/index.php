<?php
$startpages = $this->get('startpage');
?>
<link href="<?=$this->getModuleUrl('static/css/startpage.css') ?>" rel="stylesheet">
<?php if (!empty($startpages)): ?>
    <?php foreach ($startpages as $startpage): ?>
    <?php
        if ($startpage->getGrid() == '1') {
        $grid = "col-lg-12";
        } elseif ($startpage->getGrid() == '2') {
        $grid = "col-lg-6";
        } elseif ($startpage->getGrid() == '3') {
        $grid = "col-lg-4";
        } else {
        $grid = "col-lg-3";
        }

    $boxObj1 = $startpage->getBox1();
    echo $boxObj1->getName();
    //$this->getBox($box1->getKey(), $box1->getKey());
    ?>
    <div class="<?=$grid?> <?=$this->escape($startpage->getClass()) ?> start-padding">
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
