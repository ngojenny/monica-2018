<?php

/*
	Template Name: Full Page, No Sidebar, Home
*/

get_header();  ?>

<header id="home-top" class="hero" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> )">
  <div>
    <nav class="main-menu">
      <?php wp_nav_menu( array(
        'container' => false,
        'theme_location' => 'primary'
      )); ?>
    </nav>
    <i class="fas fa-bars hidden-desktop"></i>
  </div>
  <div class="container">
    <?php 
    	$post_object = get_field('btn-hot-link'); 
    	$post_name = $post_object -> post_name;
    ?>
    <div class="hero-text">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <h2><?php the_field('tagline'); ?></h2>
      
      <a class="btn btn-outline btn-light" href="#<?php echo $post_name; ?>"><?php the_field('btn-text'); ?></a>
    </div><!-- /.hero-text -->
  </div> <!-- /.container -->
</header> 
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

<div class="side-scroll-buttons">
  <a href="#home-top"></a>
  <a href="#about"></a>
  <a href="#experience"></a>
  <a href="#research"></a>
  <a href="#publications"></a>
  <a href="#open-science"></a>
  <a href="#contact"></a>
</div>