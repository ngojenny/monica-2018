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

        <section id="<?php echo $post->post_name; ?>" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> )" class="contact">
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
            </div>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>