<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>

    <div class="info-card">
        <?= $this->Html->image('card-backgrounds/cover-5-lg.png', ['class' => 'cover']) ?>
        <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
            <i class="fal fa-angle-down"></i>
        </a>
    </div>

    <ul id="js-nav-menu" class="nav-menu">
        <!-- Dashboard menu -->
        <li class="<?php if (isset($menu['dashboard'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-home']).
                ' '.
                $this->Html->tag('span', __d('control_panel', 'Dashboard'),
                    ['class' => 'nav-link-text']
                ),
                ['_name' => 'dashboard'],
                ['escape' => false, 'title' => __d('control_panel', 'Dashboard'), 'data-filter-tags' => __d('control_panel', 'dashboard')]
            );
            ?>
        </li>

        <!-- ########################### Begin objects ########################### -->
        <li class="nav-title"><?= __d('control_panel', 'Objects') ?></li>

        <!-- Begin events -->
        <li class="<?php if (isset($menu['events'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-calendar-alt']) .
                $this->Html->tag(
                    'span',
                    __d('control_panel', 'Events'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __d('control_panel', 'Events'), 'data-filter-tags' => __d('control_panel', 'events')]
            );
            ?>
            <ul>
                <li <?php if (isset($menu['events'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'Create'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Events', 'action' => 'add'],
                        ['escape' => false, 'title' => __d('control_panel', 'Create event'), 'data-filter-tags' => __d('control_panel', 'create event')]
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['events'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'List'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Events', 'action' => 'index'],
                        ['escape' => false, 'title' => __d('control_panel', 'List events'), 'data-filter-tags' => __d('control_panel', 'list events')]
                    );
                    ?>
                </li>
            </ul>
        </li>
        <!-- End events -->

        <!-- Begin plots -->
        <li class="<?php if (isset($menu['plots'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-warehouse']) .
                $this->Html->tag(
                    'span',
                    __d('control_panel', 'Plots'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __d('control_panel', 'Plots'), 'data-filter-tags' => __d('control_panel', 'plots')]
            );
            ?>
            <ul>
                <li <?php if (isset($menu['plots'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'Create'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Plots', 'action' => 'add'],
                        ['escape' => false, 'title' => __d('control_panel', 'Create plot'), 'data-filter-tags' => __d('control_panel', 'create plot')]
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['plots'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'List'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Plots', 'action' => 'index'],
                        ['escape' => false, 'title' => __d('control_panel', 'List plots'), 'data-filter-tags' => __d('control_panel', 'list plots')]
                    );
                    ?>
                </li>
            </ul>
        </li>
        <!-- End plots -->

        <!-- Begin people -->
        <li class="<?php if (isset($menu['people'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-users']) .
                $this->Html->tag(
                    'span',
                    __d('control_panel', 'People'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __d('control_panel', 'Plots'), 'data-filter-tags' => __d('control_panel', 'plots')]
            );
            ?>
            <ul>
                <li <?php if (isset($menu['people'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'Create'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'People', 'action' => 'add'],
                        ['escape' => false, 'title' => __d('control_panel', 'Create person'), 'data-filter-tags' => __d('control_panel', 'create person')]
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['people'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'List'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'People', 'action' => 'index'],
                        ['escape' => false, 'title' => __d('control_panel', 'List people'), 'data-filter-tags' => __d('control_panel', 'list people')]
                    );
                    ?>
                </li>
            </ul>
        </li>
        <!-- End people -->
        <!-- ########################### End objects ########################### -->

        <!-- ########################### Begin publications and files ########################### -->
        <li class="nav-title"><?= __d('control_panel', 'Publications and files') ?></li>

        <!-- Begin pages -->
        <li class="<?php if (isset($menu['pages'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file-alt']) .
                $this->Html->tag(
                    'span',
                    __d('smart_admin', 'Pages'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __d('smart_admin', 'Pages'), 'data-filter-tags' => __d('smart_admin', 'pages')]
            );
            ?>
            <ul>
                <li class="<?php if (isset($menu['pages']['dynamic'])) echo 'active open'; ?>">
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-paper-plane']) .
                        $this->Html->tag(
                            'span',
                            __d('smart_admin', 'Dynamic'),
                            ['class' => 'nav-link-text']
                        ),
                        '#',
                        ['escape' => false, 'title' => __d('smart_admin', 'Dynamic pages'), 'data-filter-tags' => __d('smart_admin', 'dynamic pages')]
                    );
                    ?>
                    <ul>
                        <li <?php if (isset($menu['pages']['dynamic'][0])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                                $this->Html->tag(
                                    'span',
                                    __d('smart_admin', 'Create'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'Pages', 'action' => 'add'],
                                ['escape' => false, 'title' => __d('smart_admin', 'Create dynamic page'), 'data-filter-tags' => __d('smart_admin', 'create dynamic page')]
                            );
                            ?>
                        </li>
                        <li <?php if (isset($menu['pages']['dynamic'][1])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                                $this->Html->tag(
                                    'span',
                                    __d('smart_admin', 'List'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'Pages', 'action' => 'index'],
                                ['escape' => false, 'title' => __d('smart_admin', 'List dynamic pages'), 'data-filter-tags' => __d('smart_admin', 'list dynamic pages')]
                            );
                            ?>
                        </li>
                    </ul>
                </li>
                <li class="<?php if (isset($menu['pages']['systemic'])) echo 'active open'; ?>">
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-paperclip']) .
                        $this->Html->tag(
                            'span',
                            __d('smart_admin', 'Systemic'),
                            ['class' => 'nav-link-text']
                        ),
                        '#',
                        ['escape' => false, 'title' => __d('smart_admin', 'Systemic pages'), 'data-filter-tags' => __d('smart_admin', 'systemic pages')]
                    );
                    ?>
                    <ul>
                        <li <?php if (isset($menu['pages']['systemic'][0])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                                $this->Html->tag(
                                    'span',
                                    __d('smart_admin', 'Create'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'SystemicPages', 'action' => 'add'],
                                ['escape' => false, 'title' => __d('smart_admin', 'Create systemic page'), 'data-filter-tags' => __d('smart_admin', 'create systemic page')]
                            );
                            ?>
                        </li>
                        <li <?php if (isset($menu['pages']['systemic'][1])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                                $this->Html->tag(
                                    'span',
                                    __d('smart_admin', 'List'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'SystemicPages', 'action' => 'index'],
                                ['escape' => false, 'title' => __d('smart_admin', 'List systemic pages'), 'data-filter-tags' => __d('smart_admin', 'list systemic pages')]
                            );
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!-- End pages -->

        <!-- Begin files -->
        <li class="<?php if (isset($menu['files'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file']) .
                $this->Html->tag(
                    'span',
                    __d('control_panel', 'Files'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __d('control_panel', 'Files'), 'data-filter-tags' => __d('control_panel', 'files')]
            );
            ?>
            <ul>
                <li <?php if (isset($menu['files'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'Create'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Files', 'action' => 'add'],
                        ['escape' => false, 'title' => __d('control_panel', 'Create file(s)'), 'data-filter-tags' => __d('control_panel', 'create file')]
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['files'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'List'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Files', 'action' => 'index'],
                        ['escape' => false, 'title' => __d('control_panel', 'List files'), 'data-filter-tags' => __d('control_panel', 'list files')]
                    );
                    ?>
                </li>
                <li class="<?php if (isset($menu['files']['types'])) echo 'active open'; ?>">
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file-word']) .
                        $this->Html->tag(
                            'span',
                            __d('control_panel', 'By type'),
                            ['class' => 'nav-link-text']
                        ),
                        '#',
                        ['escape' => false, 'title' => __d('control_panel', 'Files by type'), 'data-filter-tags' => __d('control_panel', 'files by type')]
                    );
                    ?>
                    <ul>
                        <li <?php if (isset($menu['files']['types'][0])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag(
                                    'span',
                                    __d('control_panel', 'Documents'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'Files', 'action' => 'documents'],
                                ['escape' => false, 'title' => __d('control_panel', 'Documents'), 'data-filter-tags' => __d('control_panel', 'documents')]
                            );
                            ?>
                        </li>
                        <li <?php if (isset($menu['files']['types'][1])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag(
                                    'span',
                                    __d('control_panel', 'Images'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'Files', 'action' => 'images'],
                                ['escape' => false, 'title' => __d('control_panel', 'Images'), 'data-filter-tags' => __d('control_panel', 'images')]
                            );
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!-- End files -->
        <!-- ########################### End publications and files ########################### -->
    </ul>
</nav>
