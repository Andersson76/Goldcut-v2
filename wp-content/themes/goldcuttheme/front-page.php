<?php get_header();?>

<div id="primary" class="content-area">
<main>
   <section class="container-fluid p-0">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
               <img class="d-block w-100 hero-img" src="<?php the_field('hero-img-startpage'); ?>">
                 <div class="carousel-caption">
                     <h1 class="text-hero-h1"><?php the_field('heading-over-image-startpage'); ?></h1>
                     <p class="text-hero"><?php the_field('text-over-image-startpage'); ?></p>
                </div>
            </div>
         </div>
      </div>
   </section>

   <section>
         <div class="container">
            <div class="row">
               <div class="col">
                  <?php
			         if ( have_posts() ) :
			            while ( have_posts() ) : the_post();
			            the_content();
			 	         endwhile;
			         endif;
		            ?>
               </div>
            </div>
         </div>
      </section>

      <section class="offers-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                     <div class="text-center pb-5">
                       <h3><?php the_field('services-text');?></h3>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-12 col-md-6 services-section">
                  <img class="d-block w-100 img-startpage" src="<?php the_field('divone-img'); ?>">
                        <div class="text-over-img">
                           <h3 class="h1-home"><?php the_field('divone');?></h3>
                           <?php 
                              $link = get_field('link');
                              if( $link ): 
                              $link_url = $link['url'];
                              $link_title = $link['title'];
                              $link_target = $link['target'] ? $link['target'] : '_self';
                              ?>
                              <a class="button btn-style" href="<?php echo esc_url( $link_url ); ?>" target="
                              <?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                           <?php endif; ?>
                        </div>
               </div>
                <div class="col col-12 col-md-6 services-section">
                  <img class="d-block w-100 img-startpage" src="<?php the_field('divtwo-img'); ?>">
                        <div class="text-over-img">
                           <h3 class="h1-home"><?php the_field('divtwo');?></h3>
                           <?php 
                              $link = get_field('link-two');
                              if( $link ): 
                              $link_url = $link['url'];
                              $link_title = $link['title'];
                              $link_target = $link['target'] ? $link['target'] : '_self';
                              ?>   
                              <a class="button btn-style" href="<?php echo esc_url( $link_url ); ?>" target="
                              <?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                           <?php endif; ?>
                        </div>
               </div>
               <div class="col col-12 col-md-6 services-section">
                  <img class="d-block w-100 img-startpage" src="<?php the_field('divthree-img'); ?>">
                        <div class="text-over-img">
                           <h3 class="h1-home"><?php the_field('divthree');?></h3>
                           <?php 
                              $link = get_field('link-three');
                              if( $link ): 
                              $link_url = $link['url'];
                              $link_title = $link['title'];
                              $link_target = $link['target'] ? $link['target'] : '_self';
                              ?>
                              <a class="button btn-style" href="<?php echo esc_url( $link_url ); ?>" target="
                              <?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                           <?php endif; ?>
                        </div>
               </div>
                <div class="col col-12 col-md-6 services-section">
                     <img class="d-block w-100 img-startpage" src="<?php the_field('divfour-img'); ?>">
                        <div class="text-over-img">
                           <h3 class="h1-home"><?php the_field('divfour');?></h3>
                           <?php 
                              $link = get_field('link-four');
                              if( $link ): 
                              $link_url = $link['url'];
                              $link_title = $link['title'];
                              $link_target = $link['target'] ? $link['target'] : '_self';
                              ?>
                        
                              <a class="button btn-style" href="<?php echo esc_url( $link_url ); ?>" target="
                              <?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                           <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
      </section>

      

      <section class="container">
         <h3 class="text-center pt-5"><?php the_field('product-text');?></h3>
         <div class="pt-5 pb-5">
             <?php echo do_shortcode('[products columns=4 limit=4]'); ?>
        </div>
      </section>

      <section class="contact-form">
         <div class="container-form">
            <div class="row">
               <div class="col-12 col-md-6">
                  <div class="pt-5 pb-5">
                        <h4 class="text-contact-h4"><?php the_field('contact-us-h1');?></h4>
                        <p class="text-contact-p"><?php the_field('contact-us');?></p>
                     <div class="opening-time">
                        <p class="opening-text"><?php the_field('opening-time');?></p>
                     </div>
                  </div>
                  </div>
               <div class="col-12 col-md-6">
                  <div class="pt-5 pb-5">
                     <?php echo do_shortcode('[fluentform id="1"]');?>
                  </div>
               </div>
            </div>
         </div>
      </section>



<?php get_footer();?>