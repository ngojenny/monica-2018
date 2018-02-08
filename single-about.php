<?php
/*
Template Name: About Section
Template Post Type: about, section
*/
?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1,
        'post_type' => 'about',
        'order' => 'ASC'
    )
); 
?>
<?php if ( $onePageQuery->have_posts() ) : ?>

    <?php while ($onePageQuery->have_posts()) : $onePageQuery->the_post(); ?>
        <?php 
            $img_id = get_post_thumbnail_id(get_the_ID());
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            $show_secondary = get_field('show_secondary_info');
        ?>

        <section id="<?php echo $post->post_name; ?>">
            <div class="wrapper">
                <div class="left">
                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php echo $alt_text ?>">
                </div>
                <div class="right">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                    <?php 
                        if( $show_secondary ) { ?>
                            <h3><?php the_field('about_subtitle')?></h3>
                            <p><?php the_field('about_secondary_text')?></p>

                        <?php } else { ?>
                            
                        <?php }
                    ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>