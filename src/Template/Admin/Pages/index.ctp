<?php
$this->assign('title', __d('control_panel', 'Dynamic Pages'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Pages')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['pages'][1] = true;
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
        order: 1
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
                                <th class="all w-75"><?= __d('control_panel', 'Title') ?></th>
                                <th class="min-phone text-center"><?= __d('control_panel', 'Mode') ?></th>
                                <th class="all"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pages as $page): ?>
                            <tr>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-eye']),
                                        ['_name' => 'page_view', 'slug' => h($page->slug)],
                                        ['escape' => false, 'target' => '_blank']
                                    );
                                    ?>
                                </td>
                                <td>
                                    <?= h($page->title) ?>
                                    <code class="d-block">
                                        <?php
                                        echo $this->url->build(
                                            ['_name' => 'page_view', 'slug' => h($page->slug)],
                                            true
                                        );
                                        ?>
                                    </code>
                                </td>
                                <td class="text-center"><?= $this->Published->publishLink($page) ?></td>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-pencil']),
                                        ['action' => 'edit', h($page->id)],
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
