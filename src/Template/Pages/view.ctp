<?php
$this->assign(
    'meta',
    $this->MetaRender->init($page)->render()
);

$this->start('navigation');
echo $this->element('navigation');
$this->end();
?>

<section class="space--xs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <article>
                    <div class="article__title text-center">
                        <h1 class="h2"><h1><?= h($page->title) ?></h1></h1>
                    </div>
                    <!--end article title-->
                    <div class="article__body">
                        <?= $page->body ?>
                    </div>
                </article>
                <!--end item-->
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
