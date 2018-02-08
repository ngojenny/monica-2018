<?php
/*
Template Name: Publication Section
Template Post Type: publication_home, section
*/
?>
<?php $cta_text = get_field('pub_btn_text') ?>
<?php $cta_link = get_field('pub_btn_link') ?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1,
        'post_type' => 'publication_home',
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

        <section id="<?php echo $post->post_name; ?>">
            <div class="wrapper">
                <h2><?php the_title(); ?></h2>
                <div class="publication page">
                    <h3><?php the_field('pub_feat_title') ?></h3>
                    <?php the_content(); ?>
                    <?php 
                        if( $cta_text ) { ?>
                            <a class="btn btn-outline btn-outline-light" href="<?php echo $cta_link ?>"><?php echo $cta_text ?></a>
                        <?php }  ?>
                            
                </div>

            </div>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>