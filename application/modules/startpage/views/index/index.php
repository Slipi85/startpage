<?php
$startpages = $this->get('startpages');
$layout = $this->get('layout');
?>
<link href="<?= $this->getModuleUrl('static/css/startpage.css') ?>" rel="stylesheet">
<link href="<?= $this->getModuleUrl('static/css/ilch-bs.css') ?>" rel="stylesheet">
<?php if (!empty($startpages)): ?>
    <div id="startpage">
        <?php foreach ($startpages as $startpage): ?>
            <div class="<?= $this->escape($startpage->getClass()) ?> row start-padding">
                <div class="start-heading">
                    <h1><?= $this->escape($startpage->getHeading()) ?></h1>
                </div>
                <?php
                switch($startpage->getGrid()) {
                    case '4':
                        $boxObj4 = $startpage->getBox4();
                        $boxObj3 = $startpage->getBox3();
                        $boxObj2 = $startpage->getBox2();
                        $boxObj1 = $startpage->getBox1();
                        $grid = 'col-lg-3';
                        $content = '<div class="stretch"><div class="' . $grid . ' start-content">' . $layout->getBox($boxObj1->getModule(), $boxObj1->getKey()) . '</div>
                                    <div class="' . $grid . ' start-content">' . $layout->getBox($boxObj2->getModule(), $boxObj2->getKey()) . '</div>
                                    <div class="' . $grid . ' start-content">' . $layout->getBox($boxObj3->getModule(), $boxObj3->getKey()) . '</div>
                                    <div class="' . $grid . ' start-content">' . $layout->getBox($boxObj4->getModule(), $boxObj4->getKey()) . '</div></div>';
                        break;
                    case '3':
                        $boxObj3 = $startpage->getBox3();
                        $boxObj2 = $startpage->getBox2();
                        $boxObj1 = $startpage->getBox1();
                        $grid = 'col-lg-4';
                        $content = '<div class="stretch"><div class="' . $grid . ' start-content">' . $layout->getBox($boxObj1->getModule(), $boxObj1->getKey()) . '</div>
                                    <div class="' . $grid . ' start-content">' . $layout->getBox($boxObj2->getModule(), $boxObj2->getKey()) . '</div>
                                    <div class="' . $grid . ' start-content">' . $layout->getBox($boxObj3->getModule(), $boxObj3->getKey()) . '</div></div>';
                        break;
                    case '2':
                        $boxObj2 = $startpage->getBox2();
                        $boxObj1 = $startpage->getBox1();
                        $grid = 'col-lg-6';
                        $content = '<div class="stretch"><div class="' . $grid . ' start-content">' . $layout->getBox($boxObj1->getModule(), $boxObj1->getKey()) . '</div>
                                    <div class="' . $grid . ' start-content">' . $layout->getBox($boxObj2->getModule(), $boxObj2->getKey()) . '</div></div>';
                        break;
                    case '1':
                        $boxObj1 = $startpage->getBox1();
                        $grid = 'col-lg-12';
                        $content = '<div class="stretch"><div class="' . $grid . ' start-content">' . $layout->getBox($boxObj1->getModule(), $boxObj1->getKey()) . '</div></div>';
                        break;
                    default:
                }

                echo $content;
                ?>
                <style>
                    .<?= $startpage->getClass()?> {
                        background: <?= ($startpage->getBackgroundSelection() == 0) ? 'url(./'.$startpage->getImage().')' : $startpage->getBackground() ?>;
                        color: <?=$this->escape($startpage->getColor()) ?>;
                    }

                    .<?= $startpage->getClass()?> .start-content {
                        background: <?= $startpage->getBackgroundGrid()?>;
                        color: <?=$this->escape($startpage->getColorGrid()) ?>;
                        box-shadow: <?=$this->escape($startpage->getBoxShadow()) ?>
                    }
                </style>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <?= $this->getTrans('noSectionIndex') ?>
<?php endif; ?>
