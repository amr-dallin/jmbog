<?php
$this->layout = 'utilities';
$this->assign('title', __('Log in'));
?>

<section class="height-100 imagebg text-center" data-overlay="4">
    <div class="background-image-holder">
        <img alt="background" src="/img/inner-4.jpg" />
    </div>
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-7 col-lg-5">
                <h2><?= __('Log in') ?></h2>
                <?= $this->Form->create(null) ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        echo $this->Form->control('username', [
                                'label' => false,
                                'placeholder' => __('Username')
                            ]
                        );
                        ?>
                    </div>
                    <div class="col-md-12">
                        <?php
                        echo $this->Form->control('password', [
                                'label' => false,
                                'placeholder' => __('Password')
                            ]
                        );
                        ?>
                    </div>
                    <div class="col-md-12">
                        <?= $this->Form->button(__('Log in'), ['class' => 'btn btn--primary type--uppercase']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <?= $this->Flash->render() ?>
                    </div>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
