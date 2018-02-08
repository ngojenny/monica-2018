<?php
/*
Template Name: Contact Section
Template Post Type: contact_home, section
*/
?>
<?php $cta_text = get_field('opensci_btn_text') ?>
<?php $cta_link = get_field('opensci_btn_link') ?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1,
        'post_type' => 'contact_home',
        'order' => 'ASC'
    )
); 
?>
<?php if ( $onePageQuery->have_posts() ) : ?>

    <?php while ($onePageQuery->have_posts()) : $onePageQuery->the_post(); ?>
        <?php 
            $img_id = get_post_thumbnail_id(get_the_ID());
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
        ?>

        <section id="<?php echo $post->post_name; ?>" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> )">
            <div class="wrapper">
                <h2><?php the_title(); ?></h2>
                <div class="contact-info">
                    <p><?php the_field('primary_action_label')?></p>
                    <p><?php the_field('primary_action_value')?></p>

                    <?php wp_nav_menu( array(
                      'container' => false,
                      'theme_location' => 'social'
                    )); ?>
                </div>
                <div class="contact-form">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>