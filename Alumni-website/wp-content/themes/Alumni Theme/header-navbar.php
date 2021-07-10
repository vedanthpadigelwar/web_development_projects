<!DOCTYPE html>
<html>
<head>
    
    <title>Amrita Alumni Connect</title>
    <meta charset="utf-8">
   <?php wp_head();
    ?>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top mainnav">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img alt="Brand" src="<?php echo get_template_directory_uri().'/Assets/Images/logo.png' ?>" class="univ-logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
            </ul>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main',
                'container'      => 'ul',
                'menu_class'     => 'nav navbar-nav navbar-right'
            ));
            ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>