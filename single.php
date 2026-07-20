<?php

get_header();

?>


<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_title()  ?>Single Blog</h4>
                    <ul>
                        <li><a href=""></a>Home</li> /
                        <li><?php the_title() ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-single pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <h2><?php the_title() ?></h2>
                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                <p> <?php the_content() ?> </p>
                
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                
            </div>
            <div class="col-xl-4">
                <div class="single-sidebar">
                    <h4>latest post</h4>

                    <ul>
                        <?php
                        $recent_posts = new WP_Query(array(
                            'post_type'      => 'post',
                            'posts_per_page' => 5,
                            'post_status'    => 'publish'
                        ));

                        if ($recent_posts->have_posts()) :
                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                        ?>

                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </li>

                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>

                    </ul>

                </div>
                <div class="single-sidebar">
                    <h4>Categories</h4>

                    <ul>
                        <?php
                        wp_list_categories(array(
                            'title_li'   => '',
                            'show_count' => false,
                            'orderby'    => 'name',
                        ));
                        ?>
                    </ul>
                </div>

                <div class="single-sidebar">
                    <h4>Recent Comments</h4>
                    <ul>
                        <?php
                        $comments = get_comments(array(
                            'number' => 5,
                            'status' => 'approve'
                        ));

                        foreach ($comments as $comment) :
                        ?>
                            <li>
                                <a href="<?php echo esc_url(get_comment_link($comment)); ?>">
                                    <?php echo esc_html($comment->comment_author); ?>
                                    on
                                    <?php echo esc_html(get_the_title($comment->comment_post_ID)); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>