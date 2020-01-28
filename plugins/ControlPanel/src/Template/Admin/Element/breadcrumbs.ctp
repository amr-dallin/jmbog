<ol class="breadcrumb page-breadcrumb">
    <?php
    $dashboardValue = $this->Html->link(__d('control_panel', 'Dashboard'), ['_name' => 'dashboard']);
    if ($this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'display') {
        $dashboardValue = __d('control_panel', 'Dashboard');
    }

    echo $this->Html->tag('li', $dashboardValue, ['class' => 'breadcrumb-item']);

    if (isset($breadcrumbs) && !empty($breadcrumbs)) {
        foreach($breadcrumbs as $breadcrumb) {
            $breadcrumbValue = $breadcrumb['title'];
            if (!empty($breadcrumb['url'])) {
                $breadcrumbValue = $this->Html->link($breadcrumb['title'], $breadcrumb['url']);
            }

            echo $this->Html->tag('li', $breadcrumbValue, ['class' => 'breadcrumb-item']);
        }
    }

    echo $this->Html->tag(
        'li',
        $this->Html->tag('span', '', ['class' => 'js-get-date']),
        ['class' => 'position-absolute pos-top pos-right d-none d-sm-block']
    );
    ?>
</ol>
