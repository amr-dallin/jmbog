<?php
$this->assign(
    'meta',
    $this->MetaRender->init($page)->render()
);

$this->start('navigation');
echo $this->element('navigation', ['mode' => true]);
$this->end();
?>

<section class="cover height-100 imagebg text-center parallax" data-overlay="6">
    <div class="background-image-holder">
        <img alt="background" src="img/inner-4.jpg" />
    </div>
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1--large"><?= h($page->title) ?></h1>
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
                <div class="boxed boxed--border bg--secondary boxed--lg box-shadow">
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
                                ['escape' => false, 'class' => 'btn btn--primary type--uppercase inner-link']
                            );
                            ?>
                        </div>
                        <div class="col-md-3 text-center">
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
