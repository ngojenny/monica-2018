<?php get_header();  ?>
<!-- <header class="banner" style="background-image:url(<?php// the_post_thumbnail_url( 'full' ); ?> )"> -->
<header class="banner">
  <div>
    <nav class="secondary-page-nav main-menu">
      <?php wp_nav_menu( array(
        'container' => false,
        'theme_location' => 'primary'
      )); ?>
    </nav>
    <i class="fas fa-bars hidden-desktop"></i>
  </div>
  <i class="fa fa-bars hidden-desktop" aria-hidden="true"></i>
  <div class="wrapper clearfix">
    <div class="hero-text">
      <img class="page-icon" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</header>
<main>
  <div class="wrapper">
    <?php // Start the loop ?>
    <?php 
      $post_object = get_post(); 
      $post_name = $post_object -> post_name;
      $post_id = $post_object -> ID;
      // printing the id to use, remove this after dev
      //print_r($post_id);
    ?>

    <?php if ( have_posts() && ($post_id !== 5 && $post_id !== 30) ) while ( have_posts() ) : the_post(); ?>
    <?php if($post_id !== 32): ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
      <?php else: ?>
      <h2>Let's connect</h2>
      <section class="contact contact-page">
        <div class="contact-form-container">
          <form class="contact-form" action="https://formspree.io/<?php the_field('primary_action_value')?>" method="POST">
              <label class="visuallyhidden" for="firstname">First name</label>
              <input type="text" name="firstname" id="firstname" placeholder="first name" required>
              <label class="visuallyhidden" for="lastname">Last name</label>
              <input type="text" name="lastname" id="lastname" placeholder="last name" required>
              <label class="visuallyhidden" for="email">Email</label>
              <input type="email" name="_replyto" id="email" placeholder="email"required>
              <label class="visuallyhidden" for="message">Message (required)</label>
              <textarea name="message" id="message" cols="30" rows="10" placeholder="message" required></textarea>
              <input type="submit" value="Send" class="submit">
          </form>
        </div>
      </section>
      <?php endif; ?>
      
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