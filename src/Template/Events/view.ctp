<?php
$this->assign('meta',
$this->MetaRender->init($event)->render()
);

$this->start('navigation');
echo $this->element('navigation');
$this->end();
?>

<section class="space--xs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="boxed boxed--border bg--secondary boxed--lg box-shadow">
                    <h1><?= h($event->title) ?></h1>

                    <div class="h3">
                        <i class="icon icon--xs icon-Calendar mr-2"></i> <?= $this->Time->i18nFormat($event->date_beginning, 'dd MMMM Y H:mm') ?>
                    </div>

                    <?php if (!empty($event->location)): ?>
                    <div class="h3">
                        <i class="icon icon--xs icon-Location-2 mr-2"></i> <?= $event->location ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($event->completed): ?>
                    <span class="h3 color--success mb-0"><?= __('Completed') ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<?= $event->body ?>
