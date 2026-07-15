<!-- CTA Area Start -->
<section class="cta">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h4><?php the_field('cta_title_', 'option'); ?> <span><?php the_field('description', 'option'); ?></span></h4>
         </div>
         <div class="col-md-6 text-center">
            <a href="<?php the_field('cta_btn_url', 'option'); ?>" class="box-btn"><?php the_field('cta_text', 'option'); ?><i class="fa fa-angle-double-right"></i></a>
         </div>
      </div>
   </div>
</section>

<!-- CTA Area End -->

<!-- Footer Area End -->
<footer class="footer-area pt-50 pb-50">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="single-footer footer-logo">
               <h3><?php the_field('footer_text_logo', 'option'); ?></h3>
               <p><?php the_field('company_short_bio', 'option'); ?></p>
            </div>
         </div>
         <div class="col-lg-2 col-md-6">
            <div class="single-footer">
               <h4>Quick Links</h4>
               <ul>

                  <?php if (have_rows('quick_links', 'option')) : ?>
                     <?php while (have_rows('quick_links', 'option')) : the_row(); ?>

                        <?php if (have_rows('link_repeater')) : ?>
                           <?php while (have_rows('link_repeater')) : the_row(); ?>
                              <li><a href=" <?php the_sub_field('url'); ?>"><?php the_sub_field('title'); ?></a></li>
                           <?php endwhile; ?>
                        <?php else : ?>
                           <?php // No rows found 
                           ?>
                        <?php endif; ?>
                     <?php endwhile; ?>
                  <?php endif; ?>

               </ul>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="single-footer">
               <h4><?php the_field('heading_two', 'option'); ?></h4>
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
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="single-footer contact-box">
               <h4>Contact Us</h4>
               <ul>


                  <?php if (have_rows('heading_three', 'option')) : ?>
                     <?php while (have_rows('heading_three', 'option')) : the_row(); ?>

                        <li><i class="fa <?php the_sub_field('icon'); ?>"></i> <?php the_sub_field('content'); ?></li>

                     <?php endwhile; ?>
                  <?php else : ?>
                     <?php // No rows found 
                     ?>
                  <?php endif; ?>

               </ul>
            </div>
         </div>
      </div>
      <div class="row copyright">
         <div class="col-md-6">
            <p>&copy; <?php the_field('all_right_reserved', 'option'); ?> <?php echo date('Y'); ?></p>
         </div>


         <div class="col-md-6 text-right">
            <ul>
               <?php
               $social_links = get_field('social', 'option');

               if ($social_links) {
                  foreach ($social_links as $link) {
                     echo '<li><a href="' . esc_url($link['social_url']) . '"><i class="fa ' . esc_attr($link['icon']) . '"></i></a></li>';
                  }
               }
               ?>
            </ul>
         </div>
      </div>
   </div>
</footer>

<?php wp_footer(); ?>

</body>
<!-- Slider Area Start -->

</html>