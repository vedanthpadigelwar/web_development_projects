<?php

   /**
 *
 * Template Name: Login-template
 *
*/
   get_header('register'); ?>
    <div class="col-md-12 mainContain">
    <div class="innerContain">
        <div class="col-md-offset-2 col-md-8 formContain">
        <div class="col-md-6 logowrap">
          
        </div>
            <div class="col-md-6">
             <?php
        if (have_posts()){
            while(have_posts()){
                the_post();
       the_content(); }
        }?>
            </div>
        </div>
    </div>
    </div>