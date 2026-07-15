<?php

/** 
 * 
 *
 * Template Name: Services Page
 */

get_header();
?>

<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href=""></a>Home</li> /
                        <li>Our Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">
    <div class="container">
        <div class="row">


            <?php

            $args = array(
                'post_type' => 'services',
                'posts_per_page' => 6,
            );

            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post(); ?>

                    <div class="col-lg-4 col-md-6">
                        <!-- Single Service -->
                        <div class="single-service">
                            <i class="<?php the_field('service-icon') ?>"></i>
                            <h4><?php the_title() ?></h4>
                            <p><?php the_content() ?></p>
                        </div>
                    </div>

            <?php

                }
            }

            wp_reset_postdata();

            ?>

        </div>
    </div>
</section>
<!-- Services Area End -->

<?php get_footer(); ?>