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

<section class="space--xs bg--primary-1">
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

<?php if (!empty($events)): ?>
<section class="text-center space--xs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mb-0"><?= __('Upcoming events') ?></h2>
            </div>
        </div>
    </div>
        <!--end of container-->
</section>
<section class="space--xs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?php foreach($events as $event): ?>
                <div class="boxed boxed--border bg--secondary boxed--lg box-shadow p-5">
                    <div class="row">
                        <div class="col-md-9">
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('h3', h($event->title)),
                                ['_name' => 'event_view', 'id' => $this->Number->format($event->id)],
                                ['escape' => false]
                            );
                            ?>
                            <div class="h5 mb-3">
                                <i class="icon icon--xs icon-Calendar color--error"></i> <?= $this->Time->i18nFormat($event->date_beginning, 'dd MMMM Y H:mm') ?>
                            </div>

                            <?php if (!empty($event->location)): ?>
                            <div class="h5">
                                <i class="icon icon--xs icon-Location-2 color--facebook"></i> <?= $event->location ?>
                            </div>
                            <?php endif; ?>

                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('span', __('More'), ['class' => 'btn__text']),
                                ['_name' => 'event_view', 'id' => $this->Number->format($event->id)],
                                ['escape' => false, 'class' => 'btn btn--primary d-block d-md-inline-block type--uppercase']
                            );
                            ?>
                        </div>
                        <div class="col-md-3 text-center text-left-xs mt-4 mt-sm-0">
                            <span class="countdown h1 mb-0" data-date="<?= $event->date_beginning->format('Y/m/d h:i') ?>"></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<?php endif; ?>

<?php if (!empty($eventsCompleted)): ?>
<hr/>
<section class="text-center space--xs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mb-0"><?= __('Completed activities') ?></h2>
            </div>
        </div>
    </div>
        <!--end of container-->
</section>
<section class="space--xs text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?php foreach($eventsCompleted as $event): ?>
                <div class="boxed boxed--border">
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('h3', h($event->title)),
                        ['_name' => 'event_view', 'id' => $this->Number->format($event->id)],
                        ['escape' => false]
                    );
                    ?>
                    <div class="h5 mb-3">
                        <i class="icon icon--xs icon-Calendar color--error"></i> <?= $this->Time->i18nFormat($event->date_beginning, 'dd MMMM Y H:mm') ?>
                    </div>

                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('span', __('More'), ['class' => 'btn__text']),
                        ['_name' => 'event_view', 'id' => $this->Number->format($event->id)],
                        ['escape' => false, 'class' => 'btn btn--primary type--uppercase']
                    );
                    ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<?php endif; ?>
