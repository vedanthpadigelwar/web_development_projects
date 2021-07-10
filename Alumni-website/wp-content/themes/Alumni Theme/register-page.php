<?php

   /**
 *
 * Template Name: Register-template
 *
*/

get_header('register'); ?>
<div class="col-md-12 mainContains">
    <div class="innerContain">
        <div class="col-md-offset-2 col-md-8 formContain">
            <div class="col-md-offset-1 col-md-10">
            <h1>REGISTER</h1>
            <hr>
            
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