<?php
$startpages = $this->get('startpage');
?>

<link href="<?=$this->getModuleUrl('static/css/startpage.css') ?>" rel="stylesheet">

<?php $number = $this->getGrid()?>

<?php function gridContent($number) { ?>
  <div class="col-xs-12 col-sm-6">
    <div class="start-panel" style="background:<?=$this->escape($startpage->getBackgroundGrid()) ?>; color:<?=$this->escape($startpage->getColorGrid()) ?>;">
      <div class="start-heading">
        <i class="<?=$this->escape($startpage->getHeadingGrid1()) ?>"></i>
      </div>
      <?php $content = $startpage->getGrid1(); ?>

      <?php if (strpos($content, '[PREVIEWSTOP]') !== false): ?>
        <?php $contentParts = explode('[PREVIEWSTOP]', $content); ?>
          <?=$this->purify(reset($contentParts)) ?>
        <?php else: ?>
          <?=$this->purify($content) ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="start-panel" style="background:<?=$this->escape($startpage->getBackgroundGrid()) ?>; color:<?=$this->escape($startpage->getColorGrid()) ?>;">
        <div class="start-heading">
          <i class="<?=$this->escape($startpage->getHeadingGrid2()) ?>"></i>
        </div>
        <?php $content = 1; ?>

        <?php if (strpos($content, '[PREVIEWSTOP]') !== false): ?>
          <?php $contentParts = explode('[PREVIEWSTOP]', $content); ?>
            <?=$this->purify(reset($contentParts)) ?>
          <?php else: ?>
            <?=$this->purify($content) ?>
          <?php endif; ?>
        </div>
      </div>
<?php } ?>

<?php if (!empty($startpages)): ?>
  <?php foreach ($startpages as $startpage): ?>
    <section class="<?=$this->escape($startpage->getClass()) ?> padding" style="background:<?=$this->escape($startpage->getBackground()) ?>; color:<?=$this->escape($startpage->getColor()) ?>;">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 section-heading">
            <?=$this->escape($startpage->getHeading()) ?>
          </div>
          <?php gridContent(1) ?>
          </div>
      </div>
    </section>
  <?php endforeach; ?>
<?php else: ?>
  <section>
    <div class="container">
      <div class="gaming">
        <div class="row">
          <?=$this->getTrans('noSectionIndex') ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
