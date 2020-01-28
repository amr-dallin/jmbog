<?php
$this->assign('meta',
    $this->MetaRender->init($page)->render()
);

$this->start('navigation');
echo $this->element('navigation');
$this->end();

$this->Html->css(
    ['/vendors/DataTables/datatables.min'],
    ['block' => true]
);

$this->Html->script(
    ['/vendors/DataTables/datatables.min'],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(function () {
    $('#table-plots').DataTable({
        responsive: {
            details: {
                type: 'column', target: 'tr'
            }
        },
        columnDefs: [{
            targets: [2],
            orderable: false
        }],
        fixedHeader: true,
        info: false,
        paging: false,
        order: [[0, 'asc']]
    });
})
</script>
<?php $this->end(); ?>

<section class="space--xs bg--primary-2">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <h1><?= h($page->title) ?></h1>
                <?= $page->body ?>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section class="space--xs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <table class="border--round table--alternate-row" id="table-plots">
                    <thead>
                        <tr>
                            <th class="all text-center"><?= __('Number') ?></th>
                            <th class="all w-75"><?= __('Owner') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($plots as $plot): ?>
                        <tr>
                            <td class="text-center display-4"><?= $this->Number->format($plot->number) ?></td>
                            <td class="h4"><?= $plot->has('person') ? h($plot->person->full_name) : '' ?></td>
                            <td class="text-center"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
