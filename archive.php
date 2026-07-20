<?php

/** 
 * 
 *
 * Template Name: Blog Page
 */
get_header(); ?>


<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_archive_title() ?></h4>
                    <ul>
                        <li><a href="<?php site_url() ?>"></a>Home</li> /
                        <li><?php the_archive_title() ?> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-area pb-100 pt-100" id="blog">
    <div class="container">
        <div class="row">

            <?php

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 12,
            );

            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post(); ?>

                    <div class="col-md-4">
                        <div class="single-blog">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=" <?php the_title() ?>" />
                            <div class="post-content">
                                <div class="post-title">
                                    <h4><a href="<?php the_permalink() ?>"><?php the_title() ?>blog title</a></h4>
                                </div>
                                <div class="pots-meta">

                                    <?php
                                    $archive_year = get_the_time('Y');
                                    $archive_month = get_the_time('m');
                                    $archive_day = get_the_time('d');

                                    ?>
                                    <ul>
                                        <li><?php echo the_category() ?></li>
                                        <li><a href="<?php echo get_day_link($archive_day, $archive_month, $archive_year) ?>"><?php echo get_the_date() ?></a></li>
                                        <li><?php the_author_posts_link() ?></li>
                                    </ul>
                                </div>
                                <p><?php the_excerpt() ?></p>
                                <a href="<?php the_permalink() ?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
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
<!-- Latest News Area End -->

<?php get_footer(); ?>