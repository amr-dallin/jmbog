<?php
$this->assign('title', __d('control_panel', 'Plots'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Plots')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['plots'][1] = true;
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
                                <th class="all"></th>
                                <th class="min-desktop text-center"><?= __d('control_panel', 'Number') ?></th>
                                <th class="all" style="width: 60%"><?= __d('control_panel', 'Full name') ?></th>
                                <th class="min-desktop"><?= __d('control_panel', 'Date modified') ?></th>
                                <th class="all"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($plots as $plot): ?>
                            <tr>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-eye']),
                                        ['_name' => 'plot_view', 'number' => h($plot->number)],
                                        ['escape' => false, 'target' => '_blank']
                                    );
                                    ?>
                                </td>
                                <td class="text-center h6"><?= $this->Number->format($plot->number) ?></td>
                                <td>
                                    <?php
                                    if ($plot->has('person')) {
                                        echo $this->Html->link(
                                            h($plot->person->full_name),
                                            ['controller' => 'People', 'action' => 'edit', $this->Number->format($plot->person->id)]
                                        );
                                    }
                                    ?>
                                </td>
                                <td><?= $plot->date_modified->format('d-m-Y H:i:s') ?></td>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-pencil']),
                                        ['action' => 'edit', h($plot->id)],
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
