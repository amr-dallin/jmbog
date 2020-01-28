<?php
$this->assign('title', __d('control_panel', 'Create New Setting'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Create New')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['setting_add'] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();
?>

<?= $this->Form->create($setting) ?>
<div class="row">
    <div class="col-md-6">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                        echo $this->Form->controls(
                            [
                                'field_key'  => [
                                    'placeholder' => __d('control_panel', 'Key')
                                ],
                                'field_type'  => [
                                    'type' => 'select',
                                    'options' => [
                                        'text' => __d('control_panel', 'Text'),
                                        'checkbox' => __d('control_panel', 'Checkbox'),
                                        'textarea' => __d('control_panel', 'Textarea')
                                    ]
                                ],
                                'title'  => [
                                    'placeholder' => __d('control_panel', 'Title')
                                ],
                                'value'  => [
                                    'placeholder' => __d('control_panel', 'Value')
                                ]
                            ],
                            ['fieldset' => false, 'legend' => false]
                        );
                    ?>

                    <div class="text-right"><?= $this->Form->submit() ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
