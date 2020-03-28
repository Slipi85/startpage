<link href="<?=$this->getModuleUrl('static/css/box-shadow_tool.css') ?>" rel="stylesheet">
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
                    <input type="radio" class="flipswitch-input" id="background-color" name="background_selection" value="1" <?php if ($this->get('background_selection') == '1') { echo 'checked="checked"'; }  ?> />
                    <label for="background-color" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('color') ?></label>
                    <input type="radio" class="flipswitch-input" id="background-image" name="background_selection" value="0" <?php if ($this->get('background_selection') != '1') { echo 'checked="checked"'; }  ?> />
                    <label for="background-image" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('img') ?></label>
                    <span class="flipswitch-selection"></span>
                </div>
              </div>
          </div>
      </div>

      <!-- input background-color for section -->

      <div id="background" <?php if ($this->get('background_selection') == '1') { echo 'class="hidden"'; } ?>>
        <div class="form-group">
            <label for="background" class="col-lg-4 control-label">
                <?=$this->getTrans('backgroundColor') ?>:
            </label>
            <div class="col-lg-8 input-group date">
                <input class="form-control color {hash:true}"
                       id="background_selection"
                       name="background"
                       value="<?php if ($this->get('startpage') != '') { echo $this->get('startpage')->getBackground(); } else { echo '#32333B'; } ?>">
                <span class="input-group-addon">
                    <span class="fa fa-undo" onclick="document.getElementById('color').color.fromString('32333B')"></span>
                </span>
            </div>
        </div>
      </div>

      <!-- input background-image for section -->

      <div id="image" <?php if ($this->get('regist_accept') != '1') { echo 'class="hidden"'; } ?>>
        <div class="form-group <?=$this->validation()->hasError('image') ? 'has-error' : '' ?>">
            <label for="selectedImage" class="col-lg-4 control-label">
                <?=$this->getTrans('backgroundImage') ?>:
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
                <?=$this->getTrans('backgroundColor') ?>:
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
        <div class="form-group">
            <label for="background_grid" class="col-lg-4 control-label">
                <?=$this->getTrans('boxshadow') ?>:
            </label>
            <div class="col-lg-8">
                <input class="form-control" data-toggle="modal" data-target="#boxShadow"
                       id="shadowOutput1"
                       name="boxshadow"
                       onclick="setSetVal()"
                       value="<?php if ($this->get('startpage') != '') { echo $this->get('startpage')->getBoxShadow(); } else { echo ''; } ?>">
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
                <option value="<?=($this->get('startpage') != '') ? $this->escape($this->get('startpage')->getGrid()) : $this->escape($this->originalInput('grid')) ?>" ><?=$this->getTrans('pleaseSelect')?></option>
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
                            <option value="" disabled selected><?=$this->getTrans('pleaseSelect') ?></option>
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
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
                            <option value="" disabled selected><?=$this->getTrans('pleaseSelect') ?></option>
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
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
                            <option value="" disabled selected><?=$this->getTrans('pleaseSelect') ?></option>
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
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
                            <option value="" disabled selected><?=$this->getTrans('pleaseSelect') ?></option>
                            <?php foreach ($boxArray as $box) { echo '<option value="'.$box->getKey().'">'.$box->getName().'</option>'; } foreach ($selfBoxes as $box) { echo '<option value="'.$box->getId().'">self_'.$this->escape($box->getTitle()).'</option>';} echo '</select>'; ?>
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
<!--
//
//
// Ilch Box-Shadow Tool
//
//
-->
<div class="modal fade" id="boxShadow" role="dialog">
    <div class="modal-dialog shadow-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ilch Box-Shadow Tool</h4>
            </div>
            <div class="modal-body row">
                <div class="col-lg-4">
                    <h4><?=$this->getTrans('shadowsetting') ?></h4>
                    <label class="ilch-label-left"><?=$this->getTrans('blur') ?>:</label>
                    <input type="range" id="blur" value="0" min="0" max="50">
                    <label class="ilch-label-left"><?=$this->getTrans('spread') ?>:</label>
                    <input type="range" id="spread" value="0" min="0" max="50">
                    <h4><?=$this->getTrans('colorsetting') ?></h4>
                    <label class="ilch-label-left"><?=$this->getTrans('shadowred') ?>:</label>
                    <input type="range" id="shadowred" value="0" min="0" max="255">
                    <label class="ilch-label-left"><?=$this->getTrans('shadowblue') ?>:</label>
                    <input type="range" id="shadowblue" value="0" min="0" max="255">
                    <label class="ilch-label-left"><?=$this->getTrans('shadowgreen') ?>:</label>
                    <input type="range" id="shadowgreen" value="0" min="0" max="255">
                    <label class="ilch-label-left"><?=$this->getTrans('shadowopacity') ?>:</label>
                    <input type="range" id="shadowopacity" value="1" min="0" max="1" step="0.01">
                    <div id="demo"></div>
                    <script>
                        function changeShadow() {
                            let a = document.getElementById('background_selection').value;
                            let b = document.getElementById('background_grid').value;
                            let blur = document.getElementById('blur').value;
                            let spread = document.getElementById('spread').value;
                            let shadowred = document.getElementById('shadowred').value;
                            let shadowblue = document.getElementById('shadowblue').value;
                            let shadowgreen = document.getElementById('shadowgreen').value;
                            let shadowopacity = document.getElementById('shadowopacity').value;
                            let shadow = '0px 0px '+ blur +'px ' + spread + 'px rgb( '+ shadowred +' , '+ shadowblue +' , '+ shadowgreen +' , ' + shadowopacity +' )' ;
                            let back = a;
                            let backgroundcolor = b;
                            document.getElementById('objektcontent').style.background = back;
                            document.getElementById('boxshadow').style.background = backgroundcolor;
                            document.getElementById('boxshadow').style.boxShadow = shadow;
                            document.getElementById('shadowOutput').innerHTML =  shadow;
                        }
                        document.getElementById('background').addEventListener('input',changeShadow)
                        document.getElementById('background_grid').addEventListener('input',changeShadow)
                        document.getElementById('blur').addEventListener('input',changeShadow)
                        document.getElementById('spread').addEventListener('input',changeShadow)
                        document.getElementById('shadowred').addEventListener('input',changeShadow)
                        document.getElementById('shadowblue').addEventListener('input',changeShadow)
                        document.getElementById('shadowgreen').addEventListener('input',changeShadow)
                        document.getElementById('shadowopacity').addEventListener('input',changeShadow)

                        function getSetVal() {
                            let input = document.getElementById('shadowOutput').innerHTML;
                            document.getElementById('shadowOutput1').value = input;
                        }

                        function setSetVal() {
                            let value = document.getElementById('shadowOutput1').value;
                            var str = document.getElementById('shadowOutput1').value;
                            var res = str.split("px");
                            var blur = (res[2]);
                            var spread = (res[3]);
                            var shadowred = (res[4]);
                            var red = shadowred.split("rgb(");
                            var all = blur + spread + red;
                            var allouput = all.split(")");
                            document.getElementById("blur").value = blur;
                            document.getElementById("spread").value = spread;
                            document.getElementById("spread").value = shadowred;
                            document.getElementById("demo").innerHTML = allouput;
                            document.getElementById("shadowOutput").innerHTML = value;
                        }

                        function myFunction() {
                        }
                    </script>
                </div>
                <div class="col-lg-8" id="objektcontent">
                    <div class="objekt-content">
                        <div class="objekt-body" id="boxshadow">
                            <span class="container" id="shadowOutput"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="getSetVal();"><?=$this->getTrans('shadowtake') ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
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
<!-- https://stackoverflow.com/questions/10890946/javascript-box-shadow
https://www.tutorialrepublic.com/codelab.php?topic=faq&file=javascript-split-a-string-by-space
<h1>The output element</h1>
<form oninput="x.value=parseInt(a.value)">0
    <input type="range" id="a" value="0">
    <output name="x" for="a"></output>
</form>
-->
