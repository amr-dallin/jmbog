<div class="row">
    <div class="col-md-12">
        <div id="panel_<?= str_replace('.', '_', (isset($prefix) ? $prefix : '')) ?>meta_tags" class="panel shadow-0" data-panel-close data-panel-refresh data-panel-locked>
            <div class="panel-hdr">
                <h2><?= __d('smart_admin', 'Meta Tags && Open Graph') ?></h2>
            </div>
            <div class="panel-container">
                <div class="panel-content">
                    <?php
                    echo $this->MetaForm->render(
                        $metaTags,
                        (isset($prefix) ? $prefix : null)
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>