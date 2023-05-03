<?php 
    /* 
    Template Name: ShopPage 
    */ ?>

<?php get_header();?>

<div id="primary" class="content-area">
<main>

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


   <section class="section-one">
      <div class="container d-flex align-items-center box-one">
         <div class="row d-flex align-items-center">
            <div class="col-sm-6">
               <div class="section-text">
                  <h2><?php the_field('section-heading-one'); ?></h2>
				      <p class="text"><?php the_field('text-one'); ?></p>
                     <div class="btn-container">
                        <?php 
                           $link = get_field('btn-link-read-more-one');
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
               <div class="col-sm-6">
                  <img class="img-shop" src="<?php the_field('img-section-one'); ?>">
               </div>
            </div>
         </div>
      </div>
   </section>
        
   <section class="section-two">
      <div class="container d-flex align-items-center box-two">
         <div class="row d-flex align-items-center">
            <div class="col-sm-6">
               <img class="img-shop reg-img" src="<?php the_field('img-section-two'); ?>">
            </div>
            <div class="col-sm-6">
               <div class="section-text-two">  
                  <h2><?php the_field('section-heading-two'); ?></h2>
				      <p class="text"><?php the_field('text-two'); ?></p>
                     <div class="btn-container">   
                        <?php 
                           $link = get_field('btn-link-read-more-two');
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
              <div class="col-sm-6">
                     <img class="img-shop ex-img" src="<?php the_field('img-section-two'); ?>">
                  </div>
            </div>
         </div>
      </div>
   </section>

   <section class="section-three">
      <div class="container d-flex align-items-center box-three">
         <div class="row d-flex align-items-center">
            <div class="col-sm-6">
               <div class="section-text">
                  <h2><?php the_field('section-heading-three'); ?></h2>
				      <p class="text"><?php the_field('text-three'); ?></p>
                     <div class="btn-container">
                        <?php 
                           $link = get_field('btn-link-read-more-three');
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
           <div class="col-sm-6">
               <img class="img-shop" src="<?php the_field('img-section-three'); ?>">
           </div>
         </div>
      </div>
   </section>

   <section class="section-four">
      <div class="container d-flex align-items-center box-four">
         <div class="row d-flex align-items-center">
            <div class="col-sm-6">
               <img class="img-shop reg-img" src="<?php the_field('img-section-four'); ?>">
            </div>
            <div class="col-sm-6">
               <div class="section-text-two">  
                  <h2><?php the_field('section-heading-four'); ?></h2>
				      <p class="text"><?php the_field('text-four'); ?></p>
                     <div class="btn-container">
                        <?php 
                           $link = get_field('btn-link-read-more-four');
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
              <div class="col-sm-6">
                  <img class="img-shop ex-img" src="<?php the_field('img-section-four'); ?>">
               </div>
            </div>
         </div>
      </div>
   </section>

</main>
</div>

<?php get_footer(); ?>
