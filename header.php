<?php wp_head(); ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Title -->
      <title>BoldPixels | Multipurpose Website</title>
      <!-- Font Google -->
   </head>
   <body>
	   <section class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="header-left">

                  <?php  
                  
                  $email = get_field('email', 'option');
                  $phone = get_field('phone', 'option');

                  if ($email) {
                     echo '<a href="mailto:' . esc_attr($email) . '"><i class="fa fa-envelope"></i> ' . esc_html($email) . '</a>';
                  }
                  if ($phone) {
                     echo '<a href="tel:' . esc_attr($phone) . '"><i class="fa fa-phone"></i> ' . esc_html($phone) . '</a>';
                  }
                  ?>

						</div>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="header-social">

                     <?php
                  $social_links = get_field('social', 'option');

                  if ($social_links) {
                     foreach ($social_links as $link) {
                        echo '<a href="' . esc_url($link['social_url']) . '"><i class="fa ' . esc_attr($link['icon']) . '"></i></a>';
                     }
                  }
                  ?>
						</div>

						</div>

					</div>
				</div>
	   </section>
      <!-- Header Area Start -->
      <header class="header header-fixed">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <nav class="navbar navbar-expand-md navbar-light">
                     <a class="navbar-brand" href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/brandpixel.webp" height="100"  width="120"></a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse ml-auto mainmenu justify-content-end" id="navbarNav">

                        <?php
                        
                        wp_nav_menu(array(
                           'theme_location' => 'primary',
                           'container' => false,
                           'menu_class' => 'navbar-nav ml-auto'
                        ));

                        ?>

                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!-- Header Area Start -->
      