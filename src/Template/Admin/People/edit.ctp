<?php
$title = h($person->full_name);
$this->assign('title', $title);

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'People'), 'url' => ['action' => 'index']],
    ['title' => $title]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['people'][1] = true;
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
                    <div class="d-flex pt-3">
                        <?php
                        echo $this->SmartHtml->postLink(
                            $this->Html->tag('i', '', ['class' => 'fal fa-trash']) . ' ' . __d('control_panel', 'Delete'),
                            $this->Url->build(['action' => 'delete', h($person->id)]),
                            [
                                'class' => 'color-danger-900 mt-2 pr-2 mr-auto',
                                'data-title' => __d('control_panel', 'Are you sure you want to delete the person?'),
                                'data-message' => __d('control_panel', 'Deletion eliminates the possibility of data recovery, including related data.')
                            ]
                        );
                        echo $this->Form->submit(__d('control_panel', 'Save'));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

<div class="modal" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
