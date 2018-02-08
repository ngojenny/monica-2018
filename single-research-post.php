<?php
/*
Template Name: Research Post
Template Post Type: research_post, section
*/
?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1,
        'post_type' => 'research_post',
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

        <article id="<?php echo $post->post_name; ?>">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>