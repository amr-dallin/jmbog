<?php
$this->layout = 'error';

$this->start('title');
echo __('500 Internal error');
$this->end();
?>

<section class="height-100 bg--dark text-center">
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1--large">500</h1>
                <p class="lead"><?php echo __('An unexpected error has occured preventing the page from loading.'); ?></p>
                <?php echo __('Go back to {0}', $this->Html->link(__('home page'), ['_name' => 'home'])); ?>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>