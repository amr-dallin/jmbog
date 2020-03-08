<?php
$this->assign('title', __d('smart_admin', 'Create dynamic page'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('smart_admin', 'Dynamic pages'), 'url' => ['controller' => 'Pages', 'action' => 'index']],
    ['title' => __d('smart_admin', 'Create')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['pages']['dynamic'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css('formplugins/summernote/summernote', ['block' => true]);
echo $this->Html->script(
    [
        'formplugins/summernote/summernote',
        'https://cdn.jsdelivr.net/npm/transliteration@2.1.3/dist/browser/bundle.umd.min.js'
    ],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.summernote').summernote(
        {
            height: '100px',
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
                            'placeholder' => __d('smart_admin', 'Title')
                        ]);

                        echo $this->Form->control('slug', [
                            'placeholder' => __d('smart_admin', 'Slug')
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
        <div id="panel-2" class="panel shadow-0" data-panel-close data-panel-collapsed data-panel-sortable data-panel-fullscreen data-panel-refresh data-panel-locked>
            <div class="panel-hdr">
                <h2><?= __d('smart_admin', 'Publish mode') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?= $this->Form->control('published') ?>
                    <div class="border-top pt-3 text-right">
                        <?= $this->Form->submit(__d('smart_admin', 'Save')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('meta_tags', ['metaTags' => $page->meta_tags]) ?>
<?= $this->Form->end() ?>