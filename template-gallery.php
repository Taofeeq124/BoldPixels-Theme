<?php

/** 
 * 
 *
 * Template Name: Gallery Page
 */

get_header();
?>


<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4>Gallery</h4>
                    <ul>
                        <li><a href=""></a>Home</li> /
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery-area pt-100 pb-100">
    <div class="container">
        <div class="row">

            <?php
            $args = array(
                'post_type' => 'Galleries',
                'posts_per_page' => 12,
            );

            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post(); ?>

                    <div class="col-xl-4">
                        <div class="single-gallery">
                            <img src="<?php the_post_thumbnail_url() ?>" alt="">
                            <div class="gallery-hover">
                                <div class="gallery-content">
                                    <h3><a href="<?php the_post_thumbnail_url() ?>" class="gallery"><i class="fa fa-plus"></i> <?php the_title() ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php  }
            }
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>