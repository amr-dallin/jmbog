<div class='nav-container'>
    <div class="bar bar--sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-2">
                    <a href="/">
                        <img class="logo logo-dark" alt="logo" src="/img/logo-dark.png" />
                        <img class="logo logo-light" alt="logo" src="/img/logo-light.png" />
                    </a>
                </div>
                <div class="col-9 col-md-10 text-right">
                    <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                        <i class="icon icon--sm stack-interface stack-menu"></i>
                    </a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
    <!--end bar-->
    <nav id="menu1" class="bar bar--sm bar-1 hidden-xs <?= isset($mode) ? 'bar--absolute bar--transparent' : '' ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-2 hidden-xs">
                    <div class="bar__module">
                        <a href="/">
                            <img class="logo logo-dark" alt="logo" src="/img/logo-dark.png" />
                            <img class="logo logo-light" alt="logo" src="/img/logo-light.png" />
                        </a>
                    </div>
                    <!--end module-->
                </div>
                <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                    <div class="bar__module">
                        <ul class="menu-horizontal text-left">
                            <li>
                                <?php
                                echo $this->Html->link(__('Home'),
                                    ['_name' => 'home'],
                                    ['title' => __('Home')]
                                );
                                ?>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link(__('Events'),
                                    ['controller' => 'Events', 'action' => 'index'],
                                    ['title' => __('Events')]
                                );
                                ?>
                            </li>
                            <li>
                                <?php
                                echo $this->Html->link(__('Plots'),
                                    ['controller' => 'Plots', 'action' => 'index'],
                                    ['title' => __('Plots')]
                                );
                                ?>
                            </li>
                        </ul>
                        <!--end of modal instance-->
                    </div>
                    <div class="bar__module ml-0">

                    </div>
                    <!--end module-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </nav>
    <!--end bar-->
</div>
