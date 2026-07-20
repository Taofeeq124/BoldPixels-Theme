<?php

/** 
 * 
 *
 * Template Name: Page Template
 */

get_header();
?>

<section class="breadcumb-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="breadcumb">
               <h4><?php the_title(); ?></h4>
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
      
      <div class="row grid no-gutters">

      <div>
         <p>
            <?php the_content() ?>
         </p>
      </div>
    
      </div>
   </div>
</section>
<!-- projectss Area End -->

<?php get_footer(); ?>