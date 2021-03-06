<?php
/*
Template Name: Open Science Section
Template Post Type: opensci_home, section
*/
?>
<?php $cta_text = get_field('opensci_btn_text') ?>
<?php $cta_link = get_field('opensci_btn_link') ?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1,
        'post_type' => 'opensci_home',
        'order' => 'ASC'
    )
); 
?>
<?php if ( $onePageQuery->have_posts() ) : ?>

    <?php while ($onePageQuery->have_posts()) : $onePageQuery->the_post(); ?>
        <?php 
            $img_id = get_post_thumbnail_id(get_the_ID());
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            //print_r(the_post_thumbnail_url());
        ?>

        <section id="<?php echo $post->post_name; ?>" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> )" class="open-sci">
            <div class="wrapper">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <?php 
                    if( $cta_text ) { ?>
                        <a class="btn btn-outline btn-light" href="<?php echo $cta_link ?>"><?php echo $cta_text ?></a>
                    <?php }  ?>
            </div>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>