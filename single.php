<?php get_header() ?>

<body <?php body_class(); ?>>
    <?php get_template_part("/template-parts/common/hero") ?>
    <div class="container">
        <div class="row">
            <div class="col md-8">
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
                                            <h2 class="post-title"><?php the_title(); ?></h2>
                                            <p>
                                                <strong><?php the_author() ?> </strong><br />
                                                <?php echo get_the_date(); ?>
                                            </p>
                                            <?php echo get_the_tag_list('<ul class="list-unstyled"><li>', '</li><li>', '</li></ul>'); ?>
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
                    <?php if (comments_open()) : ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">

                                    <?php comments_template();

                                    ?>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                if (is_active_sidebar("sidebar-1")) {
                    dynamic_sidebar("sidebar-1");
                }

                ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>