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
                $boxObjects = [];
                switch($startpage->getGrid()) {
                    case '4':
                        $boxObjects = [$startpage->getBox1(), $startpage->getBox2(), $startpage->getBox3(), $startpage->getBox4()];
                        $grid = 'col-lg-3';
                        break;
                    case '3':
                        $boxObjects = [$startpage->getBox1(), $startpage->getBox2(), $startpage->getBox3()];
                        $grid = 'col-lg-4';
                        break;
                    case '2':
                        $boxObjects = [$startpage->getBox1(), $startpage->getBox2()];
                        $grid = 'col-lg-6';
                        break;
                    case '1':
                        $boxObjects[] = $startpage->getBox1();
                        $grid = 'col-lg-12';
                        break;
                    default:
                }

                $content = '<div class="stretch">';
                foreach($boxObjects as $boxObject) {
                    if ($boxObject->getKey()) {
                        $content .= '<div class="' . $grid . ' start-content">' . $layout->getBox($boxObject->getModule(), $boxObject->getKey()) . '</div>';
                    } else {
                        $content .= '<div class="' . $grid . ' start-content">' . $layout->purify($boxObject->getContent()) . '</div>';
                    }
                }
                $content .= '</div>';

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
