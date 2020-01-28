<?php echo $this->Html->docType(); ?>
<html lang="ru_UZ" prefix="http://ogp.me/ns#">
    <head>
        <?= $this->Html->charset() ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?= $this->fetch('meta') ?>
        <?= $this->element('metrics') ?>
        <link rel="icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
        <link rel="shortcut icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
        <link rel="icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="shortcut icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="apple-touch-icon" href="/img/touch-icon-iphone.png" type="image/png">
        <link rel="apple-touch-icon" href="/img/touch-icon-ipad.png" type="image/png" sizes="76x76">
        <link rel="apple-touch-icon" href="/img/touch-icon-iphone-retina.png" type="image/png" sizes="120x120">
        <link rel="apple-touch-icon" href="/img/touch-icon-ipad-retina.png" type="image/png" sizes="152x152">
        <?= $this->Html->meta('icon') ?>
        <?php
        echo $this->Html->css([
            'bootstrap',
            'stack-interface',
            'socicon',
            'lightbox.min',
            'flickity',
            'iconsmind',
            'jquery.steps',
            'theme',
            'custom'
        ]);
        ?>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <?php echo $this->fetch('css'); ?>
    </head>
    <body class="" data-smooth-scroll-offset='64'>
        <a id="start"></a>
        <?php echo $this->fetch('navigation'); ?>

        <div class="main-container">
            <?php
            echo $this->fetch('content');
            echo $this->element('footer');
            ?>
        </div>
        <!--<div class="loader"></div>-->
        <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>
        <?php echo $this->Html->script('jquery-3.1.1.min'); ?>
        <?php echo $this->Html->script('flickity.min'); ?>
        <?php echo $this->Html->script('easypiechart.min'); ?>
        <?php echo $this->Html->script('parallax'); ?>
        <?php echo $this->Html->script('typed.min'); ?>
        <?php echo $this->Html->script('datepicker'); ?>
        <?php echo $this->Html->script('isotope.min'); ?>
        <?php echo $this->Html->script('ytplayer.min'); ?>
        <?php echo $this->Html->script('lightbox.min'); ?>
        <?php echo $this->Html->script('granim.min'); ?>
        <?php echo $this->Html->script('granim.min'); ?>
        <?php echo $this->Html->script('jquery.steps.min'); ?>
        <?php echo $this->Html->script('countdown.min'); ?>
        <?php echo $this->Html->script('twitterfetcher.min'); ?>
        <?php echo $this->Html->script('spectragram.min'); ?>
        <?php echo $this->Html->script('smooth-scroll.min'); ?>
        <?php echo $this->Html->script('scripts'); ?>
        <?php echo $this->fetch('script'); ?>
        <?php echo $this->fetch('script-code'); ?>

    </body>
</html>
