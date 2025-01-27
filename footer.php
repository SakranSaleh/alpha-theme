<div class="footer">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-12">
                &copy; LWHH - All Rights Reserved
            </div> -->

            <div class="col-md-6">
                <?php
                            if(is_active_sidebar( "footer-left" )){
                                dynamic_sidebar( "footer-left" );
                            }
                
                ?>
            </div>
            <div class="col-md-6">
            <?php
                                  if(is_active_sidebar( "footer-right" )){
                                    dynamic_sidebar( "footer-right" );
                                }
                ?>
            <div class="footr-menu>
                <?php
                    wp_nav_menu( 
                        array(
                            "theme_location" => "footermenu",
                            "menu_id" => "footer-menu-container",
                            "menu_class" => "list-inline text-center",
                        )
                        );
                
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>