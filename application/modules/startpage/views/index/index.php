<?php
$startpages = $this->get('startpage');
$layout = $this->get('layout');
?>
<link href="<?=$this->getModuleUrl('static/css/startpage.css') ?>" rel="stylesheet">
<link href="<?=$this->getModuleUrl('static/css/ilch-bs.css') ?>" rel="stylesheet">
        <?php if (!empty($startpages)): ?>
            <div id="startpage">
            <?php foreach ($startpages as $startpage): ?>
                <?php
                    if ($startpage->getGrid() == '1') {
                    $grid = "ilch-lg-12";
                    } elseif ($startpage->getGrid() == '2') {
                    $grid = "ilch-lg-6";
                    } elseif ($startpage->getGrid() == '3') {
                    $grid = "ilch-lg-4";
                    } else {
                    $grid = "ilch-lg-3";
                    }

                    //$this->getBox($box1->getKey(), $box1->getKey());
                ?>
                <div class="<?=$this->escape($startpage->getClass()) ?> row start-padding">
                    <div class="start-heading">
                        <h1><?=$this->escape($startpage->getHeading()) ?></h1>
                    </div>
                    <?php
                    $boxObj1 =  $startpage->getBox1();
                    $boxObj2 =  $startpage->getBox2();
                    $boxObj3 =  $startpage->getBox3();
                    $boxObj4 =  $startpage->getBox4();
                    if ($startpage->getGrid() == '1') {
                        $content = '<div class="stretch"><div class="'.$grid.' start-content">'.$layout->getBox($boxObj1->getModule(), $boxObj1->getKey()).'</div></div>';
                    } elseif ($startpage->getGrid() == '2') {
                        $content = '<div class="stretch"><div class="'.$grid.' start-content">'.$layout->getBox($boxObj1->getModule(), $boxObj1->getKey()).'</div>
                                    <div class="'.$grid.' start-content">'.$layout->getBox($boxObj2->getModule(), $boxObj2->getKey()).'</div></div>';
                    } elseif ($startpage->getGrid() == '3') {
                        $content = '<div class="stretch"><div class="'.$grid.' start-content">'.$layout->getBox($boxObj1->getModule(), $boxObj1->getKey()).'</div>
                                    <div class="'.$grid.' start-content">'.$layout->getBox($boxObj2->getModule(), $boxObj2->getKey()).'</div>
                                    <div class="'.$grid.' start-content">'.$layout->getBox($boxObj3->getModule(), $boxObj3->getKey()).'</div></div>';
                    } else {
                        $content = '<div class="stretch"><div class="'.$grid.' start-content">'.$layout->getBox($boxObj1->getModule(), $boxObj1->getKey()).'</div>
                                    <div class="'.$grid.' start-content">'.$layout->getBox($boxObj2->getModule(), $boxObj2->getKey()).'</div>
                                    <div class="'.$grid.' start-content">'.$layout->getBox($boxObj3->getModule(), $boxObj3->getKey()).'</div>
                                    <div class="'.$grid.' start-content">'.$layout->getBox($boxObj4->getModule(), $boxObj4->getKey()).'</div></div>';
                    }
                    echo $content;
                    ?>
<style>
.<?php echo $startpage->getClass();?> {background:<?php if($startpage->getBackgroundSelection() == 0 ) {echo $startpage->getBackground();} else {echo $startpage->getImage();}?>;color:<?=$this->escape($startpage->getColor()) ?>;}
.<?php echo $startpage->getClass();?> .start-content {background:<?php echo $startpage->getBackgroundGrid()?>;color:<?=$this->escape($startpage->getColorGrid()) ?>;width:100%;}
</style>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
    <?=$this->getTrans('noSectionIndex') ?>
<?php endif; ?>
