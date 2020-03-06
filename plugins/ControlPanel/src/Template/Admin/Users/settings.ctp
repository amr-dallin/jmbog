<?php
$this->assign('title', __d('control_panel', 'Settings'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Settings')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
echo $this->element('navigation');
$this->end();
?>

<?= $this->Form->create($user) ?>
<div class="row">
    <div class="col-md-6">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                        echo $this->Form->controls(
                            [
                                'current_password'  => [
                                    'placeholder' => __d('control_panel', 'Current Password'),
                                    'type'        => 'password'
                                ],
                                'new_password'  => [
                                    'placeholder' => __d('control_panel', 'New Password'),
                                    'type'        => 'password'
                                ],
                                'new_password_confirm'  => [
                                    'placeholder' => __d('control_panel', 'Confirm New Password'),
                                    'type'        => 'password'
                                ],
                            ],
                            ['fieldset' => false, 'legend' => false]
                        );
                    ?>

                    <div class="mt-5 pt-3 border-top text-right"><?= $this->Form->submit() ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
