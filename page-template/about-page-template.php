<?php
/*
* Template Name: About Page Template
*/
?>

<?php get_header() ?>

<body <?php body_class(); ?>>
    <?php get_template_part("/template-parts/about-us/hero-page") ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="posts">
                    <?php
                    while (have_posts()):
                        the_post();
                    ?>
                        <div class="post" <?php post_class(); ?>>
                            <div class="container">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="">
                                            <h2 class="post-title text-center"><?php the_title(); ?></h2>

                                        </div>
                                        <p>
                                            <?php
                                            if (has_post_thumbnail()) {
                                                // $thumbnail_url = get_the_post_thumbnail_url( null, "large" );
                                                // echo '<a href="'. $thumbnail_url .'" data-featherlight="image">';
                                                echo '<a href="#" class="popup" data-featherlight="image">';
                                                // printf('<a href="%s" data-featherlight="image">', $thumbnail_url);
                                                the_post_thumbnail("large", array("class" => "img-fluid"));
                                                echo "</ a>";
                                            }
                                            ?>
                                        </p>

                                        <p> <?php

                                            the_content();

                                            ?>
                                        </p>
                                        <?php next_post_link();
                                        previous_post_link();
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php

                    endwhile;

                    ?>
                </div>
            </div>

        </div>
    </div>
    <?php get_footer(); ?>