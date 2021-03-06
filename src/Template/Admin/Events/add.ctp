<?php
$this->assign('title', __d('control_panel', 'Create event'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Events'), 'url' => ['action' => 'index']],
    ['title' => __d('control_panel', 'Create')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['events'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css(
    [
        'formplugins/summernote/summernote',
        'formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker'
    ],
    ['block' => true]
);
echo $this->Html->script(
    [
        'formplugins/summernote/summernote',
        'dependency/moment/moment',
        'formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker'
    ],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.summernote').summernote(
        {
            height: '360px',
            tabsize: 2,
            dialogsFade: true,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        }
    );

    $('#date-beginning').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DDTHH:mm',
            applyLabel: '<?= __d('control_panel', 'Apply') ?>',
            cancelLabel: '<?= __d('control_panel', 'Cancel') ?>',
            weekLabel: 'W',
            daysOfWeek: [
                '<?= __d('control_panel', 'Su') ?>',
                '<?= __d('control_panel', 'Mo') ?>',
                '<?= __d('control_panel', 'Tu') ?>',
                '<?= __d('control_panel', 'We') ?>',
                '<?= __d('control_panel', 'Th') ?>',
                '<?= __d('control_panel', 'Fr') ?>',
                '<?= __d('control_panel', 'Sa') ?>'
            ],
            monthNames: [
                '<?= __d('control_panel', 'January') ?>',
                '<?= __d('control_panel', 'February') ?>',
                '<?= __d('control_panel', 'March') ?>',
                '<?= __d('control_panel', 'April') ?>',
                '<?= __d('control_panel', 'May') ?>',
                '<?= __d('control_panel', 'June') ?>',
                '<?= __d('control_panel', 'July') ?>',
                '<?= __d('control_panel', 'August') ?>',
                '<?= __d('control_panel', 'September') ?>',
                '<?= __d('control_panel', 'October') ?>',
                '<?= __d('control_panel', 'November') ?>',
                '<?= __d('control_panel', 'December') ?>'
            ],
            firstDay: 1
        },
        minYear: parseInt(moment().format('YYYY'),10) - 1,
        maxYear: parseInt(moment().format('YYYY'),10) + 1
    });
});
</script>
<?php $this->end(); ?>

<?= $this->Form->create($event) ?>
<div class="row">
    <div class="col-md-9">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                        echo $this->Form->control('title', [
                            'class' => 'form-control input-lg form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0',
                            'placeholder' => __d('control_panel', 'Title')
                        ]);

                        echo $this->Form->control('body', [
                            'class' => 'form-control summernote'
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

        <div id="panel-3" class="panel shadow-0" data-panel-close data-panel-sortable data-panel-fullscreen data-panel-refresh data-panel-locked>
            <div class="panel-hdr">
                <h2><?= __d('control_panel', 'Status') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                    echo $this->Form->control('date_beginning', [
                        'type' => 'text',
                        'data-toggle' => 'datetimepicker',
                        'data-target' => '#date-beginning',
                        'placeholder' => __d('control_panel', 'Date beginning')
                    ]);
                    echo $this->Form->control('completed');
                    ?>
                </div>
            </div>
        </div>

        <div id="panel-4" class="panel shadow-0" data-panel-close data-panel-sortable data-panel-fullscreen data-panel-refresh data-panel-locked>
            <div class="panel-hdr">
                <h2><?= __d('control_panel', 'Location') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                    echo $this->Form->control('coordinates', [
                        'placeholder' => __d('control_panel', 'Coordinates')
                    ]);
                    echo $this->Form->control('location', [
                        'placeholder' => __d('control_panel', 'Location')
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('meta_tags', ['metaTags' => $event->meta_tags]) ?>

<?= $this->Form->end() ?>
