<?php 
    /* 
    Template Name: Contact page
    */ ?>

<?php get_header();?>


<div id="primary" class="content-area">
<main>

<section>
   <div class="top-section">
   </div>
</section>

    <div class="row">	
    	<?php
			if ( have_posts() ) :
			    while ( have_posts() ) : the_post();
			    the_content();
			 	endwhile;
			endif;
		?>
	</div>

</main>
</div>

<?php get_footer();?>