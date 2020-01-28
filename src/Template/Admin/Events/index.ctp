<?php
$this->assign('title', __d('control_panel', 'Events'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Events')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['events'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css('datagrid/datatables/datatables.bundle', ['block' => true]);
echo $this->Html->script('datagrid/datatables/datatables.bundle', ['block' => true]);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.datatable').dataTable({
        responsive: {
            details: {
                type: 'column', target: 'tr'
            }
        },
        columnDefs: [{
            targets: [0, 4],
            orderable: false
        }],
        order: [[2, 'desc']]
    });
});
</script>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table table-bordered table-hover table-striped w-100 datatable">
                        <thead>
                            <tr>
                                <th class="all"></th>
                                <th class="all w-50"><?= __d('control_panel', 'Title') ?></th>
                                <th class="min-desktop"><?= __d('control_panel', 'Date Beginning') ?></th>
                                <th class="min-tablet text-center"><?= __d('control_panel', 'Completed') ?></th>
                                <th class="all"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $event): ?>
                            <tr>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-eye']),
                                        ['_name' => 'event_view', 'id' => h($event->id)],
                                        ['escape' => false, 'target' => '_blank']
                                    );
                                    ?>
                                </td>
                                <td><?= h($event->title) ?></td>
                                <td><?= $this->Time->i18nFormat($event->date_beginning, 'd MMMM Y HH:mm') ?></td>
                                <td class="text-center"><?= $this->SmartHtml->mode($event->completed); ?></td>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-pencil']),
                                        ['action' => 'edit', h($event->id)],
                                        ['escape' => false]
                                    );
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
