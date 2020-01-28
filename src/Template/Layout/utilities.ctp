<?php echo $this->Html->docType(); ?>
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $this->fetch('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex">
        <?php echo $this->Html->meta('icon'); ?>
        <?php echo $this->Html->css(['bootstrap', 'stack-interface', 'socicon', 'iconsmind', 'theme']); ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <?php echo $this->fetch('css'); ?>
    </head>
    <body class=" " data-smooth-scroll-offset='64'>
        <a id="start"></a>

        <div class="main-container">
            <?php echo $this->fetch('content'); ?>
        </div>
        <!--<div class="loader"></div>-->
        <?php echo $this->Html->script('jquery-3.1.1.min'); ?>
        <?php echo $this->Html->script('typed.min'); ?>
        <?php echo $this->Html->script('isotope.min'); ?>
        <?php echo $this->Html->script('granim.min'); ?>
        <?php echo $this->Html->script('smooth-scroll.min'); ?>
        <?php echo $this->Html->script('scripts'); ?>
    </body>
</html>
