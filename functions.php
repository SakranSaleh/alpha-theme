<?php

function lwhh_alpha_bootsrepping(){
    load_theme_textdomain( "LWHH-alpha" );
    add_theme_support( "post-thumbnails");
    add_theme_support( "title-tag" );
    register_nav_menu( "topmenu", __("Top Menus", "LWHH-alpha" ) );
    register_nav_menu( "footermenu", __("Footer Menu", "LWHH-alpha" ) );
}

add_action( "after_setup_theme", "lwhh_alpha_bootsrepping" );

function lwhh_alpha_scripts(){
    wp_enqueue_style( 'lwhh_alpha_style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}

add_action( "wp_enqueue_scripts", "lwhh_alpha_scripts" );


function lwhh_alphp_sidebar(){
    register_sidebar( 
        array(
            'name'           =>  __( "Single Post Sidebar", "LWHH-alpha" ),
            'id'             => "sidebar-1",
            'description'    => __("Right Sidebar", "LWHH-alpha"),
            'class'          => '',
            'before_widget'  => "",
            'after_widget'   => "",
            'before_title'   => '<h2 class="widgettitle">',
            'after_title'    => "</h2>\n",
            'before_sidebar' => '',
            'after_sidebar'  => '',
        )
        );

        register_sidebar( 
            array(
                'name'           =>  __( "Footer Left", "LWHH-alpha" ),
                'id'             => "footer-left",
                'description'    => __("Wedgetezed area in footer left side", "LWHH-alpha"),
                'class'          => '',
                'before_widget'  => "",
                'after_widget'   => "",
                'before_title'   => "",
                'after_title'    => "",
                'before_sidebar' => '',
                'after_sidebar'  => '',
            )
            );

            register_sidebar( 
                array(
                    'name'           =>  __( "Footer Right", "LWHH-alpha" ),
                    'id'             => "footer-right",
                    'description'    => __("Wedgetezed area in footer right side", "LWHH-alpha"),
                    'class'          => '',
                    'before_widget'  => "",
                    'after_widget'   => "",
                    'before_title'   => "",
                    'after_title'    => "",
                    'before_sidebar' => '',
                    'after_sidebar'  => '',
                )
                );
}

add_action( "widgets_init", "lwhh_alphp_sidebar" );


function lwhh_alphp_the_excerpt($excerpt){
    if(!post_password_required( )){
        return $excerpt;
    }else{
        echo get_the_password_form( );
    }
}
add_filter( "the_excerpt", "lwhh_alphp_the_excerpt" );

function lwhh_alphp_protected_title_change(){
    return "%s";
}

add_filter( "protected_title_format", "lwhh_alphp_protected_title_change" );

function lwhh_alphp_add_menu_item_class($class, $item){
    $class[] = "list-inline-item";
    return $class;
}
add_filter( "nav_menu_css_class", "lwhh_alphp_add_menu_item_class", 10, 2);