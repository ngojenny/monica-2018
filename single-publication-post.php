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

<div class="publications-page">
    <?php if ( $onePageQuery->have_posts() ) : ?>

        <?php while ($onePageQuery->have_posts()) : $onePageQuery->the_post(); ?>
            <?php 
                $img_id = get_post_thumbnail_id(get_the_ID());
                $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
            ?>

            <article id="<?php echo $post->post_name; ?>">
                <a href="<?php the_field('publication_link'); ?>" target="_blank">
                    <figure>
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
                        <div class="overlay">
                            <p><?php the_title(); ?></p>
                        </div>
                    </figure>
                </a>
                <div class="article-info">
                    <p><?php the_field('authors') ?></p>
                    <a href="<?php the_field('publication_link'); ?>" target="_blank"><?php the_field('journal_issue_page_number'); ?></a>
                </div>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else:  ?>
        
    <?php endif; ?>
    
</div>