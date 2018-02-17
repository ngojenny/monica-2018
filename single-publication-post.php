<?php
/*
Template Name: Publication Post
Template Post Type: pub_post, section
*/
?>
<?php $onePageQuery = new WP_Query(
array(
        'posts_per_page' => 1000,
        'post_type' => 'publication_post',
        'order' => 'DESC'
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
            <figure>
                <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
                <div class="overlay">
                    <p><?php the_title(); ?></p>
                </div>
            </figure>
            <div class="article-info">
                <p><?php the_field('authors') ?></p>
                <p><?php the_field('journal_issue_page_number'); ?></p>
            </div>
            <?php the_content(); ?>
        </article>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

<?php else:  ?>
    
<?php endif; ?>