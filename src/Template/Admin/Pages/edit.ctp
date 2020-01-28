<?php
$this->assign('title', h($page->title));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('control_panel', 'Pages'), 'url' => ['controller' => 'Pages', 'action' => 'index']],
    ['title' => h($page->title)]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['pages'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css('formplugins/summernote/summernote', ['block' => true]);
echo $this->Html->script(
    [
        'formplugins/summernote/summernote',
        '/vendor/bundle.umd.min'
    ],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.summernote').summernote(
        {
            height: '200px',
            tabsize: 2,
            dialogsFade: true,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        }
    );

    $('#title').on('input', function() {
        var text = $(this).val();
        var msg = slugify(text);
        $("#slug").val(msg);
    });
});
</script>
<?php $this->end(); ?>

<?= $this->Form->create($page, ['type' => 'file']) ?>
<div class="row">
    <div class="col-md-9">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                        echo $this->Form->control('title', [
                            'class' => 'form-control input-lg form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0',
                            'placeholder' => __d('control_panel', 'Title')
                        ]);

                        echo $this->Form->control('slug', [
                            'placeholder' => __d('control_panel', 'Slug')
                        ]);

                        echo $this->Form->control('body', [
                            'class' => 'form-control summernote'
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div id="panel-2" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __d('control_panel', 'Publish mode') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?= $this->Published->control($page->published) ?>
                    <div class="d-flex border-top pt-3">
                        <?php
                        echo $this->SmartHtml->postLink(
                            $this->Html->tag('i', '', ['class' => 'fal fa-trash']) . ' ' . __d('control_panel', 'Delete'),
                            $this->Url->build(['action' => 'delete', h($page->id)]),
                            [
                                'class' => 'color-danger-900 mt-2 pr-2 mr-auto',
                                'data-title' => __d('control_panel', 'Are you sure you want to delete the page?'),
                                'data-message' => __d('control_panel', 'Deletion eliminates the possibility of data recovery.')
                            ]
                        );

                        echo $this->Form->submit(__d('control_panel', 'Save'));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('meta_tags', ['metaTags' => $page->meta_tags]) ?>
<?= $this->Form->end() ?>
