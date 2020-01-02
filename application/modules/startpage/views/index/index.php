<?php
$startpages = $this->get('startpage');
?>

<?php if (!empty($startpages)): ?>

<?php else: ?>
    <?=$this->getTrans('noSectionIndex') ?>
<?php endif; ?>
