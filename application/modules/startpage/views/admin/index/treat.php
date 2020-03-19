<?php
$boxArray = $this->get('boxArray');
$selfBoxes =$this->get('self_boxes');
//$switchbackground = $this->get('startpage')
?>
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
    <div class="col-sm-7 col-lg7">

      <!-- switch Background-Color or Background-Image for section -->

      <div id="switchbackground">
          <div class="form-group">
              <div class="col-lg-4 control-label">
                  <?=$this->getTrans('background') ?>:
              </div>
              <div class="col-lg-8">
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

      <div id="background" <?php if ($this->get('background_selection') != '1') { echo 'class="hidden"'; } ?>>
        <div class="form-group">
            <label for="background" class="col-lg-4 control-label">
                <?=$this->getTrans('color') ?>:
            </label>
            <div class="col-lg-8 input-group date">
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

      <div id="image" <?php if ($this->get('regist_accept') == '1') { echo 'class="hidden"'; } ?>>
        <div class="form-group <?=$this->validation()->hasError('image') ? 'has-error' : '' ?>">
            <label for="selectedImage" class="col-lg-4 control-label">
                <?=$this->getTrans('image') ?>:
            </label>
            <div class="col-lg-8">
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
          <label for="color" class="col-lg-4 control-label">
              <?=$this->getTrans('textcolor') ?>:
          </label>
          <div class="col-lg-8 input-group date">
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
      <div id="box">
        <!-- Input Section Area Heading -->
        <div class="form-group <?=$this->validation()->hasError('heading') ? 'has-error' : '' ?>">
            <label for="heading" class="col-lg-4 control-label">
                <?=$this->getTrans('header') ?>:
            </label>
            <div class="col-lg-8">
            <input type="text"
                       class="form-control"
                       id="heading"
                       name="heading"
                       value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getHeading()) : $this->escape($this->originalInput('heading')) ?>" />
            </div>
        </div>
        <!-- Input Section Area Class for style -->
        <div class="form-group <?=$this->validation()->hasError('text') ? 'has-error' : '' ?>">
            <label for="class" class="col-lg-4 control-label">
                <?=$this->getTrans('class-area') ?>:<br />
                <?=$this->getTrans('classinfo') ?>
            </label>
            <div class="col-lg-8">
            <input type="text"
                       class="form-control"
                       id="class"
                       name="class"
                       value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getClass()) : $this->escape($this->originalInput('class')) ?>" />
            </div>
        </div>
        <!-- Input Background-Color for Boxes -->
        <div class="form-group">
            <label for="background_grid" class="col-lg-4 control-label">
                <?=$this->getTrans('background') ?>:
            </label>
            <div class="col-lg-8 input-group date">
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
            <label for="color_grid" class="col-lg-4 control-label">
                <?=$this->getTrans('textcolor') ?>:
            </label>
            <div class="col-lg-8 input-group date">
                <input class="form-control color {hash:true}"
                       id="color_grid"
                       name="color_grid"
                       value="<?php if ($this->get('startpage') != '') { echo $this->get('startpage')->getColorGrid(); } else { echo '#32333B'; } ?>">
                <span class="input-group-addon">
                    <span class="fa fa-undo" onclick="document.getElementById('color').color.fromString('32333B')"></span>
                </span>
            </div>
        </div>
      </div>
      <h1><?=$this->getTrans('box') ?></h1>
      <div class="form-group <?=$this->validation()->hasError('grid') ? 'has-error' : '' ?>">
          <label for="grid" class="col-lg-4 control-label">
              <?=$this->getTrans('areas') ?>:
          </label>
          <div class="col-lg-8">
            <select class="form-control" id="grid" name="grid">
                <option value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getGrid()) : $this->originalInput('grid') ?>" ><?=$this->getTrans('pleaseSelect')?></option>
                <option value="1"><?=$this->getTrans('one') ?></option>
                <option value="2"><?=$this->getTrans('two') ?></option>
                <option value="3"><?=$this->getTrans('three') ?></option>
                <option value="4"><?=$this->getTrans('fore') ?></option>
            </select>
          </div>
      </div>
        <div class="form-group hidden" id="box1">
            <label for="boxkey" class="col-lg-4 control-label">
                <?=$this->getTrans('boxChange1') ?>:
            </label>
            <div class="col-lg-8">
                <input type="hidden" id="id" value="" />
                <div class="dyn">
                    <div class="form-group">
                        <select class="form-control" id="boxkey" name="box1">
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getModule().'_'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group hidden" id="box2">
            <label for="boxkey" class="col-lg-4 control-label">
                <?=$this->getTrans('boxChange2') ?>:
            </label>
            <div class="col-lg-8">
                <input type="hidden" id="id" value="" />
                <div class="dyn">
                    <div class="form-group">
                        <select class="form-control" id="boxkey" name="box2">
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getModule().'_'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group hidden" id="box3">
            <label for="boxkey" class="col-lg-4 control-label">
                <?=$this->getTrans('boxChange3') ?>:
            </label>
            <div class="col-lg-8">
                <input type="hidden" id="id" value="" />
                <div class="dyn">
                    <div class="form-group">
                        <select class="form-control" id="boxkey" name="box3">
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getModule().'_'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group hidden" id="box4">
            <label for="boxkey" class="col-lg-4 control-label">
                <?=$this->getTrans('boxChange4') ?>:
            </label>
            <div class="col-lg-8">
                <input type="hidden" id="id" value="" />
                <div class="dyn">
                    <div class="form-group">
                        <select class="form-control" id="boxkey" name="box4">
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getModule().'_'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
                    </div>
                </div>
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
            $('#box1').removeClass('hidden');
            $('#box2').addClass('hidden');
            $('#box3').addClass('hidden');
            $('#box4').addClass('hidden');
            break;
        case "2":
            $('#box1').removeClass('hidden');
            $('#box2').removeClass('hidden');
            $('#box3').addClass('hidden');
            $('#box4').addClass('hidden');
            break;
        case "3":
            $('#box1').removeClass('hidden');
            $('#box2').removeClass('hidden');
            $('#box3').removeClass('hidden');
            $('#box4').addClass('hidden');
            break;
        case "4":
            $('#box1').removeClass('hidden');
            $('#box2').removeClass('hidden');
            $('#box3').removeClass('hidden');
            $('#box4').removeClass('hidden');
            break;
        default:
            $('#box1').removeClass('hidden');
            $('#box2').removeClass('hidden');
            $('#box3').removeClass('hidden');
            $('#box4').removeClass('hidden');
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
</script>
    <?=$this->getDialog('mediaModal', $this->getTrans('media'), '<iframe frameborder="0"></iframe>'); ?>
<script>
    <?=$this->getMedia()
            ->addMediaButton($this->getUrl('admin/media/iframe/index/type/single/'))
            ->addUploadController($this->getUrl('admin/media/index/upload'))
    ?>
</script>
<script src="<?=$this->getStaticUrl('js/jscolor/jscolor.js') ?>"></script>
