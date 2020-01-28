<?php echo $this->Html->docType(); ?>
<html lang="en" prefix="http://ogp.me/ns#">
    <head>
        <?php echo $this->fetch('meta'); ?>
        <title><?php echo $this->fetch('title'); ?></title>
        <?php echo $this->Html->css(['bootstrap', 'stack-interface', 'socicon', 'lightbox.min', 'flickity', 'iconsmind', 'theme', 'custom']); ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <?php echo $this->fetch('css'); ?>
    </head>
    <body class="" data-smooth-scroll-offset='64'>
        <div class="main-container">
            <?php echo $this->fetch('content'); ?>
        </div>
        <?php echo $this->Html->script('jquery-3.1.1.min'); ?>
        <?php echo $this->Html->script('isotope.min'); ?>
        <?php echo $this->Html->script('smooth-scroll.min'); ?>
        <?php echo $this->Html->script('scripts'); ?>
    </body>
</html>