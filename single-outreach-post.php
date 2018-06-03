<?php
/*
Template Name: Outreach Post
Template Post Type: outreach_post, section
*/
?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1000,
        'post_type' => 'outreach_post',
        'order' => 'ASC'
    )
); 
?>
<div class="outreach-page">
    <?php if ( $onePageQuery->have_posts() ) : ?>

        <?php while ($onePageQuery->have_posts()) : $onePageQuery->the_post(); ?>
            <?php 
                $img_id = get_post_thumbnail_id(get_the_ID());
                $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            ?>
            
            <article class="flex-container" id="<?php echo $post->post_name; ?>">
                <div class="left flex-child">
                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php $alt_text?>">
                </div>
                <div class="right flex-child">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else:  ?>
        
    <?php endif; ?>
</div>