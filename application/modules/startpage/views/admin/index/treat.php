<h1>
  <?php if (!empty($this->get('startpage'))) {
      echo $this->getTrans('edit');
  } else {
      echo $this->getTrans('add');
  }
  ?>
</h1>
<form class="form-horizontal" method="POST">
  <?=$this->getTokenField() ?>

  <div id="switchbackground">
      <div class="form-group">
          <div class="col-lg-2 control-label">
              <?=$this->getTrans('background') ?>:
          </div>
          <div class="col-lg-4">
            <div class="flipswitch">
                <input type="radio" class="flipswitch-input" id="background-color" name="background-selection" value="1" <?php if ($this->get('background') == '1') { echo 'checked="checked"'; } ?> />
                <label for="background-color" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('color') ?></label>
                <input type="radio" class="flipswitch-input" id="background-image" name="background-selection" value="0" <?php if ($this->get('background') != '1') { echo 'checked="checked"'; } ?> />
                <label for="background-image" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('img') ?></label>
                <span class="flipswitch-selection"></span>
            </div>
          </div>
      </div>
  </div>
  <div id="background" <?php if ($this->get('background') == '1' ) { echo 'class="hidden"'; } ?>>
    <div class="form-group <?=$this->validation()->hasError('background') ? 'has-error' : '' ?>">
        <label for="background" class="col-lg-2 control-label">
            <?=$this->getTrans('background') ?>:
        </label>
        <div class="col-lg-2">
          <input type="color"  name="appearances[][textcolor]"
                 value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getBackground()) : $this->originalInput('background') ?>">
        </div>
    </div>
  </div>
  <div id="image" <?php if ($this->get('background') == '0' ) { echo 'class="hidden"'; } ?>>
    <div class="form-group <?=$this->validation()->hasError('image') ? 'has-error' : '' ?>">
        <label for="selectedImage" class="col-lg-2 control-label">
            <?=$this->getTrans('image') ?>:
        </label>
        <div class="col-lg-4">
            <div class="input-group">
                <input type="image"
                       class="form-control"
                       id="selectedImage"
                       name="image"
                       value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getImage()) : $this->originalInput('image') ?>" />
                <span class="input-group-addon"><a id="media" href="javascript:media()"><i class="fa fa-picture-o"></i></a></span>
            </div>
        </div>
    </div>
  </div>
  <div class="form-group <?=$this->validation()->hasError('color') ? 'has-error' : '' ?>">
      <label for="color" class="col-lg-2 control-label">
          <?=$this->getTrans('textcolor') ?>:
      </label>
      <div class="col-lg-2">
        <input type="color"  name="appearances[][textcolor]"
               value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getColor()) : $this->originalInput('color') ?>">
      </div>
  </div>
  <!-- Setting for grid lvl 1-4 -->
  <div class="form-group <?=$this->validation()->hasError('grid') ? 'has-error' : '' ?>">
      <label for="grid" class="col-lg-2 control-label">
          <?=$this->getTrans('areas') ?>:
      </label>
      <div class="col-lg-2">
        <select class="form-control" id="grid" name="grid">
            <option value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getGrid()) : $this->originalInput('grid') ?>"  disabled><?=$this->getTrans('pleaseSelect') ?></option>
            <option value="1"><?=$this->getTrans('one') ?></option>
            <option value="2"><?=$this->getTrans('two') ?></option>
            <option value="3"><?=$this->getTrans('three') ?></option>
            <option value="4"><?=$this->getTrans('fore') ?></option>
        </select>
      </div>
  </div>
  <h1><?=$this->getTrans('setting') ?></h1>

  <div class="form-group <?=$this->validation()->hasError('heading') ? 'has-error' : '' ?>">
      <label for="heading" class="col-lg-2 control-label">
          <?=$this->getTrans('header') ?>:
      </label>
      <div class="col-lg-3">
      <input type="text"
                 class="form-control"
                 id="heading"
                 name="heading"
                 value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getHeading()) : $this->escape($this->originalInput('heading')) ?>" />
      </div>
  </div>
  <div class="form-group <?=$this->validation()->hasError('text') ? 'has-error' : '' ?>">
      <label for="text" class="col-lg-2 control-label">
          <?=$this->getTrans('class') ?>:<br />
          <?=$this->getTrans('classinfo') ?>
      </label>
      <div class="col-lg-3">
      <input type="text"
                 class="form-control"
                 id="class"
                 name="class"
                 value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getClass()) : $this->escape($this->originalInput('class')) ?>" />
      </div>
  </div>
  <div class="form-group <?=$this->validation()->hasError('background') ? 'has-error' : '' ?>">
      <label for="background" class="col-lg-2 control-label">
          <?=$this->getTrans('background') ?>:
      </label>
      <div class="col-lg-2">
        <input type="color"  name="appearances[][textcolor]"
               value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getBackgroundGrid()) : $this->originalInput('background_grid') ?>">
      </div>
  </div>
  <div class="form-group <?=$this->validation()->hasError('textcolor') ? 'has-error' : '' ?>">
      <label for="textcolor" class="col-lg-2 control-label">
          <?=$this->getTrans('textcolor') ?>:
      </label>
      <div class="col-lg-2">
        <input type="color"  name="appearances[][textcolor]"
               value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getColorGrid()) : $this->originalInput('color_grid') ?>">
      </div>
  </div>
  <!-- Area1 -->
  <div class="form-group <?=$this->validation()->hasError('grid1') ? 'has-error' : '' ?>">
    <label for="text" class="col-lg-2 control-label">
        <?=$this->getTrans('box1') ?>:
    </label>
    <div class="col-lg-6">
        <textarea class="form-control ckeditor"
                  id="ck_1"
                  name="grid1"
                  toolbar="ilch_html"><?=($this->get('startpage') != '') ? $this->get('startpage')->getGrid1(): $this->originalInput('grid1') ?></textarea>
    </div>
  </div>
    <!-- Area2 -->
  <div id="grid2" <?php if ($this->get('grid') == '1' ) { echo 'class="hidden"'; } ?>>
    <div class="form-group <?=$this->validation()->hasError('grid2') ? 'has-error' : '' ?>">
      <label for="grid2" class="col-lg-2 control-label">
            <?=$this->getTrans('box2') ?>:
      </label>
      <div class="col-lg-6">
          <textarea class="form-control ckeditor"
                    id="ck_2"
                    name="grid2"
                    toolbar="ilch_html"><?=($this->get('startpage') != '') ? $this->get('startpage')->getGrid2(): $this->originalInput('grid2') ?></textarea>
      </div>
    </div>
  </div>
    <!-- Area3 -->
  <div id="grid3" <?php if ($this->get('grid') == '1' ) { echo 'class="hidden"'; } ?>>
    <div class="form-group <?=$this->validation()->hasError('grid3') ? 'has-error' : '' ?>">
      <label for="grid3" class="col-lg-2 control-label">
          <?=$this->getTrans('box3') ?>:
      </label>
        <div class="col-lg-6">
          <textarea class="form-control ckeditor"
                    id="ck_3"
                    name="grid3"
                    toolbar="ilch_html"><?=($this->get('startpage') != '') ? $this->get('startpage')->getGrid3(): $this->originalInput('grid3') ?></textarea>
        </div>
    </div>
  </div>
    <!-- Area4 -->
  <div id="grid4" <?php if ($this->get('grid') == '1' ) { echo 'class="hidden"'; } ?>>
    <div class="form-group <?=$this->validation()->hasError('grid4') ? 'has-error' : '' ?>">
      <label for="grid4" class="col-lg-2 control-label">
          <?=$this->getTrans('box4') ?>:
      </label>
        <div class="col-lg-6">
          <textarea class="form-control ckeditor"
                    id="ck_4"
                    name="grid4"
                    toolbar="ilch_html"><?=($this->get('startpage') != '') ? $this->get('startpage')->getGrid4(): $this->originalInput('grid4') ?></textarea>
        </div>
      </div>
  </div>
  <?php if (!empty($this->get('startpage'))) {
      echo $this->getSaveBar('updateButton');
  } else {
      echo $this->getSaveBar('addButton');
  }
  ?>
</form>
<script>
$('[name="background-selection"]').click(function () {
    if ($(this).val() == "1") {
        $('#background').removeClass('hidden');
    } else {
        $('#background').addClass('hidden');
    }
});
$('[name="background-selection"]').click(function () {
   if ($(this).val() == "0") {
       $('#image').removeClass('hidden');
   } else {
       $('#image').addClass('hidden');
   }
});
$('[name="grid"]').click(function () {
    if ($(this).val() == "2") {
        $('#grid2').removeClass('hidden');
    } else {
        $('#grid2').addClass('hidden');
    }
});
$('[name="grid"]').click(function () {
    if ($(this).val() == "2") {
        $('#grid3').removeClass('hidden');
    } else {
        $('#grid3').addClass('hidden');
    }
});
$('[name="grid"]').click(function () {
    if ($(this).val() == "2") {
        $('#grid4').removeClass('hidden');
    } else {
        $('#grid4').addClass('hidden');
    }
});
</script>
<!--<?=$this->getDialog('mediaModal', $this->getTrans('media'), '<iframe frameborder="0"></iframe>'); ?>
<script src="<?=$this->getStaticUrl('js/datetimepicker/js/bootstrap-datetimepicker.min.js') ?>" charset="UTF-8"></script>
<?php if (substr($this->getTranslator()->getLocale(), 0, 2) != 'en'): ?>
    <script src="<?=$this->getStaticUrl('js/datetimepicker/js/locales/bootstrap-datetimepicker.'.substr($this->getTranslator()->getLocale(), 0, 2).'.js') ?>" charset="UTF-8"></script>
<?php endif; ?>
<?=$this->getMedia()
        ->addMediaButton($this->getUrl('admin/media/iframe/index/type/single/'))
        ->addUploadController($this->getUrl('admin/media/index/upload'))
?>-->
