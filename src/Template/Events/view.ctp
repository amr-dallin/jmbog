<?php
$this->assign('meta',
$this->MetaRender->init($event)->render()
);

$this->start('navigation');
echo $this->element('navigation', ['mode' => true]);
$this->end();
?>

<section class="cover height-90 imagebg switchable switchable--switch" data-overlay="6">
    <div class="background-image-holder">
        <img alt="background" src="/img/cover.jpg" />
    </div>
    <div class="container pos-vertical-center">
        <div class="row justify-content-around">
            <div class="col-lg-5 col-md-7">
                <div class="switchable__text">
                    <h1><?= h($event->title) ?></h1>
                    <div>
                        <i class="icon icon--sm icon-Calendar mr-2"></i>
                        <span class="h3 color--white d-inline-block mb-2"><?= $this->Time->i18nFormat($event->date_beginning, 'd MMMM Y H:mm') ?></span>
                    </div>
                    <?php if (!empty($event->location)): ?>
                    <div>
                        <i class="icon icon--sm icon-Location-2 mr-2"></i>
                        <span class="h3 color--white d-inline-block"><?= $event->location ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if (!$event->completed): ?>
                    <span class="countdown h2 mt-3" data-date="<?= $event->date_beginning->format('Y/m/d h:i') ?>"></span>
                    <?php endif; ?>

                    <?php if (!empty($event->result)): ?>
                    <a class="btn btn--primary type--uppercase mt-3 inner-link" href="#result-section">
                        <span class="btn__text">
                            <?= __('Event Results') ?>
                        </span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-12">
            <div class="map-container">
                <iframe src="https://yandex.uz/map-widget/v1/-/CKennM2E"></iframe>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<?= $event->body ?>

<?php if (!empty($event->result)): ?>
<section class="text-center space--xs" id="result-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h2><?= __('Event Results') ?></h2>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<?= $event->result ?>
<?php endif; ?>

<?php if (!empty($event->plots)): ?>
<section class="text-center space--xs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h2 class="mb-2"><?= __('Attended the event') ?></h2>
                <div class="lead"><?= __('The event was attended by the owners of {0} land', count($event->plots)) ?></div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center space--xxs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="row">
                    <?php foreach($event->plots as $plot): ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="boxed boxed--border bg--secondary box-shadow">
                            <span class="display-2"><?= $this->Number->format($plot->number) ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<?php endif; ?>
