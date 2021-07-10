<!DOCTYPE html>
<html>
<head>
    <title>Amrita Alumni Connect</title>
    <meta charset="utf-8">
   <?php wp_head(); ?>

</head>
<body>
<nav class="navbar navbar-default mainnav">
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
<div class="cover">
    <div class="covercont">
        <h1 style="margin-bottom: 0px">AMRITA </h1>
        <h1 style="margin-top: 0px;">Alum<span>CONNECT</span></h1>
        <a href="#">Connect</a>
    </div>
</div>
<hr style="border: solid 2px #263238; margin: 0px">
<div class="col-md-12 mainwrap">
    <div class="col-md-9 site-main">
        <?php
          if(have_posts()){
              while (have_posts()){
                  the_post();
                  ?>
                  <div class="col-md-offset-1 col-md-3 post">
                      <div class="imagewrap">
                        <?php the_post_thumbnail('medium',array()) ?>
                      </div>
                      <div class="title-wrap">
                      <a href="<?php the_permalink(); ?>"><?php  strtoupper(the_title()) ?></a>
                      </div>
                      <hr/>
                      <p><?php the_excerpt(); ?></p>
                  </div>
        <?php
              }
          }
        ?>

         <div class="col-md-offset-4 col-md-4 dirwrap">
                    <div class="col-md-offset-2 col-md-6" id="previous"><?php previous_posts_link('<span class="btn btn-primary" >Previous</span>'); ?></div>
                    <div class="col-md-4" id="next"><?php next_posts_link('<span class="btn btn-primary">Next</span>'); ?></div>
        </div>
    </div>
    <div class="col-md-3" style="padding-top: 3vh">
           <?php get_sidebar(); ?>
    </div>
</div>
<div class="footer col-md-12">
  <?php wp_footer(); ?>
</div>
</body>
</html>