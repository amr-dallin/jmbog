<?php
$this->assign('title', __d('control_panel', 'Create person'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'People'), 'url' => ['action' => 'index']],
    ['title' => __d('control_panel', 'Create')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['people'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();
?>

<?= $this->Form->create($person) ?>
<div class="row">
    <div class="col-md-9">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                    echo $this->Form->control('last_name', [
                        'placeholder' => __d('control_panel', 'Last name')
                    ]);
                    echo $this->Form->control('first_name', [
                        'placeholder' => __d('control_panel', 'First name')
                    ]);
                    echo $this->Form->control('middle_name', [
                        'placeholder' => __d('control_panel', 'Middle name')
                    ]);
                    echo $this->Form->control('cell_number', [
                        'placeholder' => __d('control_panel', 'Cell number')
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div id="panel-2" class="panel shadow-0" data-panel-close data-panel-collapsed data-panel-sortable data-panel-fullscreen data-panel-refresh data-panel-locked>
            <div class="panel-hdr">
                <h2><?= __d('control_panel', 'Publish mode') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="pt-3 text-right">
                        <?= $this->Form->submit(__d('control_panel', 'Save')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
