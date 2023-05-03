<?php 
    /* 
    Template Name: Treatments
    */ ?>

<?php get_header();?>

<div id="primary" class="content-area">
<main>
   <section>
      <?php
         while (have_posts()) {
            the_post(); ?>
             <?php the_content();?>
             <?php the_post_thumbnail(); ?>          
      <?php } ?>
    </section>
</main>
</div>

<?php get_footer();?>