<?php
$title = __d('control_panel', 'Cottage plot №{0}', $this->Number->format($plot->number));
$this->assign('title', $title);

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Plots'), 'url' => ['action' => 'index']],
    ['title' => $title]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['plots'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css(
    ['formplugins/select2/select2.bundle'],
    ['block' => true]
);
echo $this->Html->script(
    ['formplugins/select2/select2.bundle'],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<?php $this->end(); ?>

<?= $this->Form->create($plot) ?>
<div class="row">
    <div class="col-md-9">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->control('number', [
                                'type' => 'text',
                                'class' => 'form-control input-lg form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0',
                                'placeholder' => __d('control_panel', 'The number of the suburban area')
                            ]);

                            echo $this->Form->control('notes', [
                                'rows' => 5,
                                'placeholder' => __d('control_panel', 'Notes')
                            ]);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->control('person_id', [
                                'class' => 'form-control select2',
                                'empty' => __d('control_panel', 'Choose the owner of a summer cottage'),
                                'rel' => $this->Url->build([
                                    'controller' => 'People',
                                    'action' => 'add'
                                ])
                            ]);
                            ?>
                        </div>
                    </div>
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
                            $this->Url->build(['action' => 'delete', h($plot->id)]),
                            [
                                'class' => 'color-danger-900 mt-2 pr-2 mr-auto',
                                'data-title' => __d('control_panel', 'Are you sure you want to delete the plot?'),
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
