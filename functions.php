<?php

if (site_url() == "http://lwhh-1.test") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}


function lwhh_alpha_bootsrepping()
{
    load_theme_textdomain("LWHH-alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    $LWHH_alpha_custom_header_details = [
        "header_text" => true,
        "default_text_color" => "#222",
        "width" => "1200",
        "height" => "600",
        "flex-width" => true,
        "flex-height" => true
    ];
    add_theme_support("custom-header", $LWHH_alpha_custom_header_details);
    $custom_logo_dafaults = [
        "width" => "100",
        "height" => "100"
    ];
    add_theme_support("custom-logo", $custom_logo_dafaults);
    add_theme_support("custom-background");
    register_nav_menu("topmenu", __("Top Menus", "LWHH-alpha"));
    register_nav_menu("footermenu", __("Footer Menu", "LWHH-alpha"));
}

add_action("after_setup_theme", "lwhh_alpha_bootsrepping");

function lwhh_alpha_scripts()
{
    wp_enqueue_style('lwhh_alpha_style', get_stylesheet_uri(), null, VERSION);
    wp_enqueue_style('bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style('featherlight-css', "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");


    wp_enqueue_script("featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", true);
    wp_enqueue_script("lwhh-alpha-main-js", get_theme_file_uri("/assets/js/main.js"), array("jQuery", "featherlight-js"), VERSION, true);
}

add_action("wp_enqueue_scripts", "lwhh_alpha_scripts");


function lwhh_alphp_sidebar()
{
    register_sidebar(
        array(
            'name'           =>  __("Single Post Sidebar", "LWHH-alpha"),
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
            'name'           =>  __("Footer Left", "LWHH-alpha"),
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
            'name'           =>  __("Footer Right", "LWHH-alpha"),
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

add_action("widgets_init", "lwhh_alphp_sidebar");


function lwhh_alphp_the_excerpt($excerpt)
{
    if (!post_password_required()) {
        return $excerpt;
    } else {
        echo get_the_password_form();
    }
}
add_filter("the_excerpt", "lwhh_alphp_the_excerpt");

function lwhh_alphp_protected_title_change()
{
    return "%s";
}

add_filter("protected_title_format", "lwhh_alphp_protected_title_change");

function lwhh_alphp_add_menu_item_class($class, $item)
{
    $class[] = "list-inline-item";
    return $class;
}
add_filter("nav_menu_css_class", "lwhh_alphp_add_menu_item_class", 10, 2);



function lwhh_alphp_about_page_template_banner()
{
    if (is_page()) {
        $alpga_feat_image = get_the_post_thumbnail_url(null, "large");

?>
        <style>
            /* Hello style */
            .page-header {
                background-image: url("<?php echo $alpga_feat_image ?>");

            }
        </style>

        <?php
    }

    if (is_front_page()) {
        if (current_theme_supports("custom-header")) {
        ?>
            <style>
                .header {
                    background-image: url("<?php echo header_image(); ?>");
                    background-size: cover;
                }

                .header h1 a,
                .header .tagline {
                    color: #<?php echo get_header_textcolor(); ?>;

                    <?php if (!display_header_text()) {
                        echo "display: none;";
                    }

                    ?>
                }
            </style>
<?php
        }
    }
}
add_action("wp_head", "lwhh_alphp_about_page_template_banner");
