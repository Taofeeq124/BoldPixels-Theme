<?php
get_header();
?>

<style>

.error-404{
    padding:100px 0;
}

.error-404 .display-1{
    font-size:140px;
    font-weight:700;
    color:#000;
    line-height:1;
}

.error-404 h2{
    margin:20px 0;
}

.error-404 p{
    max-width:600px;
    margin:0 auto;
}

.error-404 .btn{
    padding:12px 30px;
}

.error-404 form{
    max-width:500px;
    margin:30px auto 0;
}

</style>


<section class="error-404 not-found ">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <h1 class="display-1">404</h1>

                <h2>Oops! Page Not Found</h2>

                <p>
                    Sorry, the page you are looking for doesn't exist,
                    may have been moved, or the URL may be incorrect.
                </p>

                <div class="mt-4">
                    <a class="box-btn" href="<?php echo esc_url(home_url('/')); ?>">
                        Back to Home
                    </a>
                </div>

                <div class="mt-5">
                    <?php get_search_form(); ?>
                </div>

            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>