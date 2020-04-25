<h1><?=$this->getTrans('manage') ?></h1>
<?php if (!empty($this->get('startpages'))): ?>
    <form class="form-horizontal" method="POST">
        <?=$this->getTokenField() ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <colgroup>
                    <col class="icon_width">
                    <col class="icon_width">
                    <col class="icon_width">
                    <col class="col-lg-2">
                    <col class="col-lg-2">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th><?=$this->getCheckAllCheckbox('check_startpage') ?></th>
                        <th></th>
                        <th></th>
                        <th><?=$this->getTrans('heading') ?></th>
                        <th><?=$this->getTrans('areas') ?></th>
                        <th><?=$this->getTrans('class') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->get('startpages') as $startpage): ?>
                        <tr>
                            <td><?=$this->getDeleteCheckbox('check_startpage', $startpage->getId()) ?></td>
                            <td><?=$this->getEditIcon(['action' => 'treat', 'id' => $startpage->getId()]) ?></td>
                            <td><?=$this->getDeleteIcon(['action' => 'delstartpage', 'id' => $startpage->getId()]) ?></td>
                            <td><?=$this->escape($startpage->getHeading()) ?></td>
                            <td><?=$this->escape($startpage->getGrid()) ?></td>
                            <td><?=$this->escape($startpage->getClass()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?=$this->getListBar(['delete' => 'delete']) ?>
    </form>
<?php else: ?>
    <?=$this->getTrans('noSection') ?>
<?php endif; ?>
