<?php get_header();  ?>

<div class="banner" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> )">
  <h1><?php the_title(); ?></h1>
</div>
<main>
  <div class="wrapper">
    <?php // Start the loop ?>
    <?php 
      $post_object = get_post(); 
      $post_name = $post_object -> post_name;
      $post_id = $post_object -> ID;
      // printing the id to use, remove this after dev
      print_r($post_id);
    ?>


    <?php if ( have_posts() && ($post_id !== 5 && $post_id !== 30) ) while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
      
    <?php endwhile; // end the loop?>

    <?php 
      switch ($post_id) {
        //research
        case 5:
          get_template_part('single-research-post');
        break;

        //publication
        case 7:
          get_template_part('single-publication-post');
        break;

        //outreach
        case 9:
          get_template_part('single-outreach-post');
        break;

        //open science
        case 30:
          get_template_part('single-opensci-post');
        break;
      }
    ?>

  </div> <!-- /.wrapper -->
</main> <!-- /.main -->

<?php get_footer(); ?>