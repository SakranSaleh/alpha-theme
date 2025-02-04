<?php
get_header(); ?>

<div class="container text-center mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-1 fw-bold text-danger">404</h1>
            <h2 class="mb-4">Oops! Page Not Found</h2>
            <p class="lead">The page you're looking for doesn't exist. It may have been moved or deleted.</p>

            <a href="<?php echo home_url(); ?>" class="btn btn-primary mt-3">
                <i class="bi bi-house-door"></i> Back to Homepage
            </a>

            <div class="mt-4">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.svg" alt="Page Not Found" class="img-fluid" style="max-width: 400px;">
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>