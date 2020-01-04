<h1>
  <?php if (!empty($this->get('startpage'))) {
      echo $this->getTrans('edit');
  } else {
      echo $this->getTrans('add');
  }
  ?>
</h1>
<form class="form-horizontal" id="startpage_form" method="POST">
    <?=$this->getTokenField() ?>

    <!-- switch Box or Slider -->

    <div id="switcharea">
        <div class="form-group">
            <div class="col-lg-2 control-label">
                <?=$this->getTrans('box-or-slider') ?>:
            </div>
            <div class="col-lg-4">
              <div class="flipswitch">
                  <input type="radio" class="flipswitch-input" id="box-area" name="switcharea" value="1" <?php if ($this->get('switcharea') == '1') { echo 'checked="checked"'; } ?> />
                  <label for="box-area" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('color') ?></label>
                  <input type="radio" class="flipswitch-input" id="slider-area" name="switcharea" value="0" <?php if ($this->get('switcharea') != '1') { echo 'checked="checked"'; } ?> />
                  <label for="slider-area" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('img') ?></label>
                  <span class="flipswitch-selection"></span>
              </div>
            </div>
        </div>
    </div>

    <!-- switch Background-Color or Background-Image for section -->

    <div id="switchbackground">
        <div class="form-group">
            <div class="col-lg-2 control-label">
                <?=$this->getTrans('background') ?>:
            </div>
            <div class="col-lg-4">
              <div class="flipswitch">
                  <input type="radio" class="flipswitch-input" id="background-color" name="background_selection" value="1" <?php if ($this->get('background_selection') == '1') { echo 'checked="checked"'; } ?> />
                  <label for="background-color" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('color') ?></label>
                  <input type="radio" class="flipswitch-input" id="background-image" name="background_selection" value="0" <?php if ($this->get('background_selection') != '1') { echo 'checked="checked"'; } ?> />
                  <label for="background-image" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('img') ?></label>
                  <span class="flipswitch-selection"></span>
              </div>
            </div>
        </div>
    </div>

    <!-- input background-color for section -->

    <div id="background" class="hidden">
      <div class="form-group">
          <label for="background" class="col-lg-2 control-label">
              <?=$this->getTrans('color') ?>:
          </label>
          <div class="col-lg-2 input-group date">
              <input class="form-control color {hash:true}"
                     id="background"
                     name="background"
                     value="<?php if ($this->get('startpage') != '') { echo $this->get('startpage')->getBackground(); } else { echo '#32333B'; } ?>">
              <span class="input-group-addon">
                  <span class="fa fa-undo" onclick="document.getElementById('color').color.fromString('32333B')"></span>
              </span>
          </div>
      </div>
    </div>

    <!-- input background-image for section -->

    <div id="image">
      <div class="form-group <?=$this->validation()->hasError('image') ? 'has-error' : '' ?>">
          <label for="selectedImage" class="col-lg-2 control-label">
              <?=$this->getTrans('image') ?>:
          </label>
          <div class="col-lg-4">
              <div class="input-group">
                  <input type="text"
                         class="form-control"
                         id="selectedImage"
                         name="image"
                         value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getImage()) : $this->originalInput('image') ?>" />
                  <span class="input-group-addon"><a id="media" href="javascript:media()"><i class="fa fa-picture-o"></i></a></span>
              </div>
          </div>
      </div>
    </div>

    <!-- input font-color for section -->

    <div class="form-group">
        <label for="color" class="col-lg-2 control-label">
            <?=$this->getTrans('textcolor') ?>:
        </label>
        <div class="col-lg-2 input-group date">
            <input class="form-control color {hash:true}"
                   id="color"
                   name="color"
                   value="<?php if ($this->get('startpage') != '') { echo $this->get('startpage')->getColor(); } else { echo '#32333B'; } ?>">
            <span class="input-group-addon">
                <span class="fa fa-undo" onclick="document.getElementById('color').color.fromString('32333B')"></span>
            </span>
        </div>
    </div>
    <h1><?=$this->getTrans('setting') ?></h1>

    <!--
    Slider Area
    -->

    <div id="slider">
      Hallo Welt
    </div>

    <!--
    Box Area
    -->

    <div id="box">
      <div class="form-group <?=$this->validation()->hasError('grid') ? 'has-error' : '' ?>">
          <label for="grid" class="col-lg-2 control-label">
              <?=$this->getTrans('areas') ?>:
          </label>
          <div class="col-lg-2">
            <select class="form-control" id="grid" name="grid">
                <option value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getGrid()) : $this->originalInput('grid') ?>" ><?=$this->getTrans('pleaseSelect')?></option>
                <option value="1"><?=$this->getTrans('one') ?></option>
                <option value="2"><?=$this->getTrans('two') ?></option>
                <option value="3"><?=$this->getTrans('three') ?></option>
                <option value="4"><?=$this->getTrans('fore') ?></option>
            </select>
          </div>
      </div>

      <!-- Input Section Area Heading -->

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

      <!-- Input Section Area Class for style -->

      <div class="form-group <?=$this->validation()->hasError('text') ? 'has-error' : '' ?>">
          <label for="class" class="col-lg-2 control-label">
              <?=$this->getTrans('class-area') ?>:<br />
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

      <!-- Input Background-Color for Boxes -->

      <div class="form-group">
          <label for="background_grid" class="col-lg-2 control-label">
              <?=$this->getTrans('background') ?>:
          </label>
          <div class="col-lg-2 input-group date">
              <input class="form-control color {hash:true}"
                     id="background_grid"
                     name="background_grid"
                     value="<?php if ($this->get('startpage') != '') { echo $this->get('startpage')->getBackgroundGrid(); } else { echo '#32333B'; } ?>">
              <span class="input-group-addon">
                  <span class="fa fa-undo" onclick="document.getElementById('color').color.fromString('32333B')"></span>
              </span>
          </div>
      </div>

      <!-- Input Font-Color for Boxes -->

      <div class="form-group">
          <label for="color_grid" class="col-lg-2 control-label">
              <?=$this->getTrans('textcolor') ?>:
          </label>
          <div class="col-lg-2 input-group date">
              <input class="form-control color {hash:true}"
                     id="color_grid"
                     name="color_grid"
                     value="<?php if ($this->get('startpage') != '') { echo $this->get('startpage')->getColorGrid(); } else { echo '#32333B'; } ?>">
              <span class="input-group-addon">
                  <span class="fa fa-undo" onclick="document.getElementById('color').color.fromString('32333B')"></span>
              </span>
          </div>
      </div>

      <!-- Area1 -->
      <!-- Input Icon for Area1 -->

      <div class="form-group <?=$this->validation()->hasError('heading_grid1') ? 'has-error' : '' ?>">
          <label for="heading_grid1" class="col-lg-2 control-label">
              <?=$this->getTrans('header-box-icon') ?>:</br>
              <?=$this->getTrans('header-box-icon-info') ?>
          </label>
          <div class="col-lg-3">
          <input type="text"
                     class="form-control"
                     id="heading_grid1"
                     name="heading_grid1"
                     value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getHeadingGrid1()) : $this->escape($this->originalInput('heading_grid1')) ?>" />
          </div>
      </div>

      <!-- Input Content for Area1 -->

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
        <!-- Input Icon for Area2 -->

      <div id="grid2" class="hidden">
        <div class="form-group <?=$this->validation()->hasError('heading_grid2') ? 'has-error' : '' ?>">
            <label for="heading_grid2" class="col-lg-2 control-label">
                <?=$this->getTrans('header-box') ?>:</br>
                <?=$this->getTrans('header-box-info') ?>
            </label>
            <div class="col-lg-3">
            <input type="text"
                       class="form-control"
                       id="heading_grid2"
                       name="heading_grid2"
                       value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getHeadingGrid2()) : $this->escape($this->originalInput('heading_grid2')) ?>" />
            </div>
        </div>

        <!-- Input Content for Area2 -->

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
        <!-- Input Icon for Area3 -->

      <div id="grid3" class="hidden">
        <div class="form-group <?=$this->validation()->hasError('heading_grid3') ? 'has-error' : '' ?>">
            <label for="heading_grid3" class="col-lg-2 control-label">
                <?=$this->getTrans('header-box') ?>:</br>
                <?=$this->getTrans('header-box-info') ?>
            </label>
            <div class="col-lg-3">
            <input type="text"
                       class="form-control"
                       id="heading_grid3"
                       name="heading_grid3"
                       value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getHeadingGrid3()) : $this->escape($this->originalInput('headinggrid3')) ?>" />
            </div>
        </div>

        <!-- Input Content for Area1 -->

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
        <!-- Input Icon for Area4 -->

      <div id="grid4" class="hidden">
        <div class="form-group <?=$this->validation()->hasError('heading_grid4') ? 'has-error' : '' ?>">
            <label for="heading_grid4" class="col-lg-2 control-label">
                <?=$this->getTrans('header-box') ?>:</br>
                <?=$this->getTrans('header-box-info') ?>
            </label>
            <div class="col-lg-3">
            <input type="text"
                       class="form-control"
                       id="heading_grid4"
                       name="heading_grid4"
                       value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getHeadingGrid4()) : $this->escape($this->originalInput('heading_grid4')) ?>" />
            </div>
        </div>

        <!-- Input Content for Area4 -->

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
      <div class="form-group">
          <label for="preview" class="col-lg-2 control-label">
              <?=$this->getTrans('preview') ?>:
          </label>
          <div class="col-lg-4">
              <a id="preview" class="btn btn-default"><?=$this->getTrans('show') ?></a>
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
$('[name="grid"]').click(function () {
switch($(this).val()) {
    case "1":
        $('#grid2').addClass('hidden');
        $('#grid3').addClass('hidden');
        $('#grid4').addClass('hidden');
        break;
    case "2":
        $('#grid2').removeClass('hidden');
        $('#grid3').addClass('hidden');
        $('#grid4').addClass('hidden');
        break;
    case "3":
        $('#grid2').removeClass('hidden');
        $('#grid3').removeClass('hidden');
        $('#grid4').addClass('hidden');
        break;
    default:
        $('#grid2').removeClass('hidden');
        $('#grid3').removeClass('hidden');
        $('#grid4').removeClass('hidden');
}
});
$('[name="background_selection"]').click(function () {
switch($(this).val()) {
    case "1":
        $('#image').addClass('hidden');
        $('#background').removeClass('hidden');
        break;
    case "0":
        $('#image').removeClass('hidden');
        $('#background').addClass('hidden');
        break;
    default:
        $('#background').removeClass('hidden');
        $('#image').removeClass('hidden');
}
});
$('[name="switcharea"]').click(function () {
switch($(this).val()) {
    case "1":
        $('#box').addClass('hidden');
        $('#slider').removeClass('hidden');
        break;
    case "0":
        $('#box').removeClass('hidden');
        $('#slider').addClass('hidden');
        break;
    default:
        $('#box').removeClass('hidden');
        $('#slider').removeClass('hidden');
}
});
</script>
    <?=$this->getDialog('mediaModal', $this->getTrans('media'), '<iframe frameborder="0"></iframe>'); ?>
<script>
    <?=$this->getMedia()
            ->addMediaButton($this->getUrl('admin/media/iframe/index/type/single/'))
            ->addUploadController($this->getUrl('admin/media/index/upload'))
    ?>
</script>
<script src="<?=$this->getStaticUrl('js/jscolor/jscolor.js') ?>"></script>
