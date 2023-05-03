<?php 
    /* 
    Template Name: About us page
    */ ?>

<?php get_header();?>

<div id="primary" class="content-area">
<main>
    <div class="row">	
    	<?php
			if ( have_posts() ) :
			    while ( have_posts() ) : the_post();
			    the_content();
			 	endwhile;
			endif;
		?>
	</div>

<?php get_footer();?>