
<?php 


get_header('navbar'); ?>
<div class="col-md-12 mainwrap">
    <div class="col-md-9" style="padding-top: 20px; padding-bottom: 20px;">
     <?php
        if (have_posts()){
            while(have_posts()){
                the_post();
       the_content(); }
        }?>
    </div>
     <div class="col-md-3" style="padding-top: 3vh">
           <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>