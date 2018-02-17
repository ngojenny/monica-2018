<?php
/*
Template Name: Single
Template Post Type: research_post, opensci_post
*/
?>

<?php get_header(); ?>

<main>
  <div class="wrapper">
    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php 
            $img_id = get_post_thumbnail_id(get_the_ID());
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            $half_img_1 = get_field('half_image_1');
            $half_img_2 = get_field('half_image_2');
            $third_img_1 = get_field('third_image_1');
            $third_img_2 = get_field('third_image_2');
            $third_img_3 = get_field('third_image_3');
            $post_link = get_post_permalink();
                print_r($post_link);
        ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>


          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <?php //hackeryou_posted_in(); ?>
            <?php //edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

        <?php if ($half_img_1 && $half_img_2) : ?>
                <div class="flex-container">
                    <div class="gallery-half">
                        <img src="<?php echo $half_img_1['url']; ?>" alt="<?php echo $half_img_1['alt']; ?>" />
                    </div>
                    <div class="gallery-half">
                        <img src="<?php echo $half_img_2['url']; ?>" alt="<?php echo $half_img_2['alt']; ?>" />
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($third_img_1 && $third_img_2 && $third_img_3) : ?>
                <div class="flex-container">
                    <div class="gallery-third">
                        <img src="<?php echo $third_img_1['url']; ?>" alt="<?php echo $third_img_1['alt']; ?>" />
                    </div>
                    <div class="gallery-third">
                        <img src="<?php echo $third_img_2['url']; ?>" alt="<?php echo $third_img_2['alt']; ?>" />
                    </div>
                    <div class="gallery-third">
                        <img src="<?php echo $third_img_3['url']; ?>" alt="<?php echo $third_img_3['alt']; ?>" />
                    </div>
                </div>
            <?php endif; ?>

      <?php endwhile; // end of the loop. ?>
      <a id="go-back" class="btn btn-light" href="#">Back</a>
    </div> <!-- /.content -->


  </div> <!-- /.wrapper -->
</main> 

<?php get_footer(); ?>