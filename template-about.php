<?php

/** 
 * 
 *
 * Template Name: About Page
 */
get_header(); ?>


<section class="breadcumb-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="breadcumb">
               <h4>About Us</h4>
               <ul>
                  <li><a href=""></a>Home</li> /
                  <li>About Us</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- About Area Start -->

<section class="about-area pt-100 pb-100" id="about">
   <div class="container">
     
      <div class="row">
         <div class="col-md-7">

            <?php if (have_rows('about_section_content', 'option')) : ?>
               <?php while (have_rows('about_section_content', 'option')) : the_row(); ?>

                  <div class="about">
                     <div class="page-title">
                        <h4><?php the_sub_field('about_sub_title'); ?></h4>
                     </div>
                     <p><?php the_sub_field('about_sub_title_text'); ?></p>
                     <a href=" <?php the_sub_field('button_url'); ?>" class="box-btn"><?php the_sub_field('button_text'); ?><i class="fa fa-angle-double-right"></i></a>
                  </div>

               <?php endwhile; ?>
            <?php endif; ?>

         </div>



         <div class="col-md-5">

            <?php if (have_rows('about_feature', 'option')) : ?>
               <?php while (have_rows('about_feature', 'option')) : the_row(); ?>
                  <div class="single_about">
                     <i class="fa <?php the_sub_field('icon'); ?>"></i>
                     <h4><?php the_sub_field('title'); ?></h4>
                     <p><?php the_sub_field('description'); ?></p>
                  </div>
               <?php endwhile; ?>
            <?php else : ?>
               <?php // No rows found 
               ?>
            <?php endif; ?>

         </div>
      </div>
   </div>
</section>

<!-- About Area End -->

<?php get_footer(); ?>