<?php
$startpages = $this->get('startpage');
?>

<?php if (!empty($startpages)): ?>
  <?php foreach ($startpages as $startpage): ?>
    <section class="<?=$this->escape($startpage->getClass()) ?> padding" style="background:<?=$this->escape($startpage->getBackground()) ?>;">
      <div class="container">
        <div class="col-xs-12 text-center start-heading">
          <?=$this->escape($startpage->getHeading()) ?>
        </div>
        <div class="col-xs-12 ilch-box-m">
          <div class="ilch-box-2" style="background:<?=$this->escape($startpage->getBackgroundGrid()) ?>; color:<?=$this->escape($startpage->getColorGrid()) ?>;">
            <?php $content = $startpage->getGrid1(); ?>

            <?php if (strpos($content, '[PREVIEWSTOP]') !== false): ?>
                <?php $contentParts = explode('[PREVIEWSTOP]', $content); ?>
                <?=$this->purify(reset($contentParts)) ?>
            <?php else: ?>
                <?=$this->purify($content) ?>
            <?php endif; ?>
          </div>
          <div class="ilch-box-2" style="background:<?=$this->escape($startpage->getBackgroundGrid()) ?>; color:<?=$this->escape($startpage->getColorGrid()) ?>;">
            <?php $content = $startpage->getGrid2(); ?>

            <?php if (strpos($content, '[PREVIEWSTOP]') !== false): ?>
                <?php $contentParts = explode('[PREVIEWSTOP]', $content); ?>
                <?=$this->purify(reset($contentParts)) ?>
            <?php else: ?>
                <?=$this->purify($content) ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
  <style>
  .padding {
    padding:50px 0px;
  }
  .ilch-box-2 {
    padding:15px;
    overflow: hidden;
    width:50%;
  }
  .ilch-box-m {
    display:flex;
    align-items: stretch;
  }
  </style>
<?php else: ?>
    <?=$this->getTrans('noSectionIndex') ?>
<?php endif; ?>
