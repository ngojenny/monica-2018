<?php

/*
	Template Name: Full Page, No Sidebar, Home
*/

get_header();  ?>

<div class="hero" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> )">
  <div class="container">

    <?php 
    	$post_object = get_field('btn-hot-link'); 
    	$post_name = $post_object -> post_name;
    ?>

      <h1 class="page-title"><?php the_title(); ?></h1>
      <h2><?php the_field('tagline'); ?></h2>
      
      <a class="btn btn-outline btn-outline-light" href="#<?php echo $post_name; ?>"><?php the_field('btn-text'); ?></a>
  </div> <!-- /.container -->
</div> <!-- /.main -->
<!-- MAIN STARTS HERE -->
<main>
	<?php get_template_part('single-about'); ?>
	<?php get_template_part('single-experience'); ?>
	<?php get_template_part('single-research'); ?>
	<?php get_template_part('single-publications'); ?>
	<?php get_template_part('single-opensci'); ?>
	<?php get_template_part('single-contact'); ?>
</main>

<?php get_footer(); ?>