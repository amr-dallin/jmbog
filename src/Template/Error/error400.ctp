<?php
$this->layout = 'error';

$this->start('title');
echo __('404 Page not found');
$this->end();
?>

<section class="height-100 bg--dark text-center">
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1--large">404</h1>
                <p class="lead"><?php echo __('The link you clicked may be damaged or the page deleted.'); ?></p>
                <?php echo __('Go {0} or visit {1}.', [$this->Html->link(__('back'), 'javascript:history.back()'), $this->Html->link(__('home page'), ['_name' => 'home'])]); ?>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>