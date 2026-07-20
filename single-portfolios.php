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
                  <li><a href="<?php site_url() ?>"></a> <?php echo get_the_title(get_option('page_on_front')); ?></li> /
                  <li><?php the_title(); ?></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="portfolio-single pt-100 pb-100">
   <div class="container">
      <div class="row">
         <div class="col-xl-8">
            <h2><?php the_title(); ?></h2>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
            <p><?php the_content(); ?></p>
            <div class="row">

               <div class="col-xl-12">
                  <h4>project gallery</h4>
               </div>

               <?php $gallery_images = get_field('gallery'); ?>
               <?php if ($gallery_images) : ?>
                  <?php foreach ($gallery_images as $gallery_image): ?>

                     <div class="col-xl-4">
                        <div class="project-gallery">
                           <img src="<?php echo esc_url($gallery_image['url']); ?>" alt="<?php echo esc_attr($gallery_image['alt']); ?>">
                        </div>
                     </div>

                  <?php endforeach; ?>
               <?php endif; ?>


            </div>

            <br><br>

            <?php
            $video = get_field('project_video');

            if ($video) {

               preg_match('/(?:youtu\.be\/|youtube\.com\/watch\?v=|youtube\.com\/embed\/)([^&\n?#]+)/', $video, $matches);

               if (!empty($matches[1])) {
                  $embed = 'https://www.youtube.com/embed/' . $matches[1];
            ?>
                  <div class="row">
                     <div class="col-xl-12">
                        <h4>Project Overview</h4>

                        <iframe
                           width="100%"
                           height="500"
                           src="<?php echo esc_url($embed); ?>"
                           frameborder="0"
                           allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                           allowfullscreen>
                        </iframe>

                     </div>
                  </div>
            <?php
               }
            }
            ?>


         </div>

         <div class="col-xl-4">
            <div class="portfolio-sidebar">
               <h4>Technology Used</h4>

               <ul>
                  <?php if (have_rows('technologies')) : ?>
                     <?php while (have_rows('technologies')) : the_row(); ?>
                        <li><i class="fa fa-arrow-right"></i> <?php the_sub_field('tech'); ?></li>
                     <?php endwhile; ?>
                  <?php else : ?>
                     <?php // No technologies found
                     ?>
                  <?php endif; ?>
               </ul>

            </div>
            <div class="portfolio-sidebar">
               <h4>project features</h4>
               <ul>
                  <?php if (have_rows('project_features')) : ?>
                     <?php while (have_rows('project_features')) : the_row(); ?>
                        <li><i class="fa fa-arrow-right"></i><?php the_sub_field('features'); ?> </li>
                     <?php endwhile; ?>
                  <?php else : ?>
                     <?php // No Features found
                     ?>
                  <?php endif; ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>


<?php get_footer(); ?>