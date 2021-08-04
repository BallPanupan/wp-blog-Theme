<?php

    function theme_support(){
        //add dynamic title tag support
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }
    add_action( 'after_setup_theme', 'theme_support' );


    //menu location
    function menus(){
        $locations = array(
            'primary' => "Desktop primary left Sidebar",
            'footer' => "Footer Menu Items"
        );

        register_nav_menus($locations);
    }
    add_action('init', 'menus');

    function register_styles() {
        
        $version = wp_get_theme()->get( 'Version' );
        wp_enqueue_style('style', get_template_directory_uri() . "/assets/css/style.css", array(), $version, 'all');
        wp_enqueue_style('bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
        wp_enqueue_style('fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    }

    add_action( 'wp_enqueue_scripts', 'register_styles' );

    function register_script(){
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
        wp_enqueue_script('popper', 'ttps://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '3.4.1', true);
        wp_enqueue_script('bootstrapcdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '3.4.1', true);
        wp_enqueue_script('javascript', get_template_directory_uri() . '/assets/js/main.js', array(), '3.4.1', true);
    }
    add_action( 'wp_enqueue_scripts', 'register_script' );


    function widget_areas(){
        register_sidebar(
            array(
                'before_title' => '<h2>',
                'after_title' => '</h2>',
                'before_widget' => '',
                'after_widget' => '',
            ),
            array(
                'name' => 'Sidebar Area',
                'id' => 'sidebar-1',
                'discription' => 'Sidebar widget area'
            )
        );
    }
    add_action( 'widgets_init', 'widget_areas' );

?>