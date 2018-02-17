<?php
/*
Template Name: Open Science Post
Template Post Type: opensci_post, section
*/
?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1000,
        'post_type' => 'opensci_post',
        'order' => 'DESC'
    )
); 
?>
<?php if ( $onePageQuery->have_posts() ) : ?>

    <?php while ($onePageQuery->have_posts()) : $onePageQuery->the_post(); ?>
        <?php 
            $img_id = get_post_thumbnail_id(get_the_ID());
            $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            $half_img_1 = get_field('half_image_1');
            $half_img_2 = get_field('half_image_2');
            $third_img_1 = get_field('third_image_1');
            $third_img_2 = get_field('third_image_2');
            $third_img_3 = get_field('third_image_3');
        ?>

        <article id="<?php echo $post->post_name; ?>">
            <h2><?php the_title(); ?></h2>
            <?php the_content('Read more'); ?>
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

        </article>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>