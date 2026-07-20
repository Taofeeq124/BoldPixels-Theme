<?php

/** 
 * 
 *
 * Template Name: Portfolio Page
 */

get_header();
?>

<section class="breadcumb-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="breadcumb">
               <h4>Portfolio</h4>
               <ul>
                  <li><a href="<?php site_url() ?>"></a>  <?php echo get_the_title(get_option('page_on_front')); ?></li> /
                  <li><?php the_title(); ?></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- projectss Area Start -->
<section class="projects-area pb-100 pt-100" id="projects">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="portfolio-menu mb-40 text-center">
               <?php
               $terms = get_terms(array(
                  'taxonomy' => 'portfolio_category',
                  'hide_empty' => true,
               ));
               if ($terms && !is_wp_error($terms)) :
                  foreach ($terms as $term) :
               ?>
                     <button data-filter=".<?php echo esc_attr($term->slug); ?>" class=""><?php echo esc_html($term->name); ?></button>
               <?php
                  endforeach;
               endif;
               ?>
            </div>
         </div>
      </div>
      <div class="row grid no-gutters">

         <?php

         $portfolio_items = new WP_Query(array(
            'post_type' => 'portfolios',
            'posts_per_page' => -1,
         ));
         if ($portfolio_items->have_posts()) :
            while ($portfolio_items->have_posts()) : $portfolio_items->the_post();
               $terms = get_the_terms(get_the_ID(), 'portfolio_category');
               $term_classes = '';

               if ($terms && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                     $term_classes .= ' ' . esc_attr($term->slug);
                  }
               }
         ?>

               <div class="col-md-4 grid-item<?php echo $term_classes; ?>">
                  <div class="single-portfolio">
                     <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">

                     <div class="portfolio-hover">
                        <div class="portfolio-content">
                           <h3>
                              <a href="<?php the_permalink(); ?>">
                                 <i class="fa fa-link"></i>
                                 <?php the_title(); ?>
                                 <span><?php the_field('designation'); ?></span>
                              </a>
                           </h3>
                        </div>
                     </div>
                  </div>
               </div>
            <?php

            endwhile;
            wp_reset_postdata();
         else : ?>
            <div class="col-md-4 grid-item">
               <div class="single-portfolio">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/projects/placeholder.jpg'); ?>" alt="No Projects Found">
                  <div class="portfolio-hover">
                     <div class="portfolio-content">
                        <h3>No Projects Found</h3>
                     </div>
                  </div>
               </div>
            </div>
         <?php
         endif;
         ?>

      </div>
   </div>
</section>
<!-- projectss Area End -->

<?php get_footer(); ?>