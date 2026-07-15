<?php

/** 
 * 
 *
 * Template Name: Home Page
 */

get_header();
?>

<!-- Slider Area Start -->
<section class="slider-area" id="home">
   <div class="slider owl-carousel">

      <?php

      $args = array(
         'post_type' => 'sliders',
         'posts_per_page' => 3,
      );

      $query = new WP_Query($args);
      if ($query->have_posts()) {
         while ($query->have_posts()) {
            $query->the_post();
            $slide_subtitle = get_post_meta(get_the_ID(), 'slide_subtitle', true);
            $slide_btn = get_post_meta(get_the_ID(), 'slide_btn', true);
            $btn_url = get_post_meta(get_the_ID(), 'btn-url', true);
      ?>

            <div class="single-slide" style="background-image:url('<?php the_post_thumbnail_url() ?>">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="slide-table">
                           <div class="slide-tablecell">
                              <h4><?php echo esc_html($slide_subtitle); ?></h4>
                              <h2><?php the_title(); ?></h2>
                              <p><?php the_content(); ?></p>
                              <a href="<?php echo esc_url($btn_url); ?>" class="box-btn"><?php echo esc_html($slide_btn); ?> <i class="fa fa-angle-double-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

      <?php
         }
      }
      wp_reset_postdata();
      ?>


   </div>
</section>
<!-- Slider Area Start -->

<!-- About Area Start -->
<section class="about-area pt-100 pb-100" id="about">
   <div class="container">
      <div class="row section-title">

         <?php if (have_rows('about_section_title', 'option')) : ?>
            <?php while (have_rows('about_section_title', 'option')) : the_row(); ?>

               <div class="col-md-6 text-right">

                  <h3><span><?php the_sub_field('about_sub_title_top'); ?></span> <?php the_sub_field('about_title'); ?></h3>

               </div>

               <div class="col-md-6">
                  <p><?php the_sub_field('about_right_side_text'); ?></p>
               </div>

            <?php endwhile; ?>
         <?php endif; ?>

      </div>

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
<!-- Choose Area End -->
<section class="choose">
   <div class="container">
      <div class="row pt-100 pb-100">
         <div class="col-md-6">
            <div class="faq">
               <div class="page-title">
                  <h4><?php the_field('faqs_heading', 'option'); ?></h4>
               </div>

               <div class="accordion" id="accordionExample">

                  <?php if (have_rows('faq', 'option')) : ?>
                     <?php $i = 1; ?>
                     <?php while (have_rows('faq', 'option')) : the_row(); ?>

                        <div class="card">
                           <div class="card-header" id="heading<?php echo $i; ?>">
                              <h5 class="mb-0">
                                 <button
                                    class="btn btn-link <?php echo $i != 1 ? 'collapsed' : ''; ?>"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#collapse<?php echo $i; ?>"
                                    aria-expanded="<?php echo $i == 1 ? 'true' : 'false'; ?>"
                                    aria-controls="collapse<?php echo $i; ?>">

                                    <?php the_sub_field('faq_title'); ?>

                                 </button>
                              </h5>
                           </div>

                           <div
                              id="collapse<?php echo $i; ?>"
                              class="collapse <?php echo $i == 1 ? 'show' : ''; ?>"
                              aria-labelledby="heading<?php echo $i; ?>"
                              data-parent="#accordionExample">

                              <div class="card-body">
                                 <?php the_sub_field('faq_content'); ?>
                              </div>
                           </div>
                        </div>

                     <?php $i++;
                     endwhile; ?>
                  <?php endif; ?>

               </div>

            </div>
         </div>

         <div class="col-md-6">
            <div class="skills">
               <div class="page-title">
                  <h4><?php the_field('skill_set_heading', 'option'); ?></h4>
               </div>

               <?php if (have_rows('skill_set', 'option')) : ?>
                  <?php while (have_rows('skill_set', 'option')) : the_row(); ?>

                     <div class="single-skill">
                        <h4><?php the_sub_field('title'); ?></h4>
                        <div class="progress-bar" role="progressbar" style="width: <?php the_sub_field('skill_width_value'); ?>%;" aria-valuenow="<?php the_sub_field('skill_width_value'); ?>" aria-valuemin="0" aria-valuemax="100"><?php the_sub_field('skill_width_value'); ?>%</div>
                     </div>
                  <?php endwhile; ?>
               <?php endif; ?>
            </div>
         </div>

      </div>
   </div>
</section>
<!-- Choose Area End -->
<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">


   </div>
   </div>
   </div>
   </div>
</section>
<!-- Choose Area End -->
<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">
   <div class="container">
      <div class="row section-title">
         <div class="col-md-6 text-right">
            <h3><span>who we are?</span> our services</h3>
         </div>
         <div class="col-md-6">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
         </div>
      </div>

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

<!-- Counter Area End -->
<section class="counter-area">
   <div class="container-fluid">
      <div class="row">

         <?php

         $args = array(
            'post_type' => 'counters',
            'posts_per_page' => 4,
         );

         $query = new WP_Query($args);
         if ($query->have_posts()) {
            while ($query->have_posts()) {
               $query->the_post(); ?>

               <div class="col-md-3">
                  <div class="single-counter">
                     <h4><i class="<?php the_field('counter_icon'); ?>"></i><span class="counter"><?php the_field('counter_number'); ?></span><?php the_title() ?></span></h4>
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
<!-- Counter Area End -->
<!-- Team Area Start -->
<section class="team-area pb-100 pt-100" id="team">
   <div class="container">
      <div class="row section-title">
         <div class="col-md-6 text-right">
            <h3><span>who we are?</span> creative team</h3>
         </div>
         <div class="col-md-6">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
         </div>
      </div>
      <div class="row">


         <?php

         $args = array(
            'post_type' => 'teams',
            'posts_per_page' => 3,
         );

         $query = new WP_Query($args);
         if ($query->have_posts()) {
            while ($query->have_posts()) {
               $query->the_post(); ?>

               <div class="col-md-4">
                  <div class="single-team">
                     <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
                     <div class="team-hover">
                        <div class="team-content">
                           <h4><?php the_title(); ?> <span><?php the_field('team_designation'); ?></span></h4>
                           <ul>
                              <li><a href="<?php the_field('facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="<?php the_field('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="<?php the_field('linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="<?php the_field('google_plus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                        </div>
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
<!-- Team Area End -->

<!-- Testimonials Area Start -->
<!-- <section class="testimonial-area pb-100 pt-100" id="testimonials">
         <div class="container">
            <div class="row section-title white-section">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> what client say</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="testimonials owl-carousel">
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/03.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/01.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/04.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/02.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
<!-- Testimonilas Area End -->

<!-- Latest News Area Start -->
<section class="blog-area pb-100 pt-100" id="blog">
   <div class="container">
      <div class="row section-title">
         <div class="col-md-6 text-right">
            <h3><span>who we are?</span> latest news</h3>
         </div>
         <div class="col-md-6">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
         </div>
      </div>
      <div class="row">


         <?php

         $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
         );

         $query = new WP_Query($args);
         if ($query->have_posts()) {
            while ($query->have_posts()) {
               $query->the_post(); ?>


               <div class="col-md-4">
                  <div class="single-blog">
                     <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="#"><?php the_title(); ?></a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#"><?php echo get_the_date(); ?></a></li>
                              <li><a href="#"><?php the_author(); ?></a></li>
                           </ul>
                        </div>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
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