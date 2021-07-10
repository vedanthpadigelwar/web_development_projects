<?php
function amr_include(){
    wp_register_style('amr_bootstrap',get_template_directory_uri().'/Assets/Css/bootstrap.css');
    wp_register_style('amr_alumni',get_template_directory_uri().'/Assets/Css/alumni.css');
    wp_enqueue_style('amr_bootstrap');
    wp_enqueue_style('amr_alumni');

    wp_enqueue_script('amr_bootstrap',get_template_directory_uri().'/Assets/Js/bootstrap.js');
    wp_enqueue_script('amr_custom',get_template_directory_uri().'/Assets/Js/custom.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('amr_bootstrap');
    wp_enqueue_script('amr_custom');
}

function amr_enableMenu(){
    register_nav_menu('main','Main menubar');
}

function amr_widgets(){
    register_sidebar(array(
        'name' => 'Main',
        'id'  => 'amr_main',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="%2$s col-md-12 sidebar">',
        'after_title' => '</h2><div class="innerSide">',
        'after_widget' => '</div></div>'
    ));
}