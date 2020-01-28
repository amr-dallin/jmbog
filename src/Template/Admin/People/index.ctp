<?php
$this->assign('title', __d('control_panel', 'People'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'People')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['people'][1] = true;
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
        order: [[1, 'asc']]
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
                                <th class="min-desktop text-center"><?= __d('control_panel', 'ID') ?></th>
                                <th class="all" style="width: 65%"><?= __d('control_panel', 'Full name') ?></th>
                                <th class="all text-center"><?= __d('control_panel', 'Quantity') ?></th>
                                <th class="min-desktop"><?= __d('control_panel', 'Date modified') ?></th>
                                <th class="all"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($people as $person): ?>
                            <tr>
                                <td class="text-center"><?= h($person->id) ?></td>
                                <td><?= h($person->full_name) ?></td>
                                <td class="text-center"><?= count($person->plots) ?></td>
                                <td><?= $person->date_modified->format('d-m-Y H:i:s') ?></td>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-pencil']),
                                        ['action' => 'edit', h($person->id)],
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
