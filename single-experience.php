<?php
/*
Template Name: Experience Section
Template Post Type: experience, section
*/
?>
<section id="experience">
    <div class="wrapper">
        <?php $title = get_field('experience_main_title')?>
        <h2>
            <?php 
                if($title) {
                    echo $title;
                } else {
                    echo 'Experience highlights';
                }
            ?>
            
        </h2>
        <ul class="timeline">
            <?php $onePageQuery = new WP_Query(
            array(
                    'posts_per_page' => -1,
                    'post_type' => 'experience',
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

                    <li>
                        <div class="experience-info">
                            <p class="title"><?php the_field('experience_title')?></p>
                            <p class="affiliation"><?php the_field('experience_affiliate')?></p>
                            <p class="date"><?php the_field('experience_date')?></p>
                        </div>
                        <div class="experience-desc">
                            <p><?php the_field('experience_description')?></p>
                        </div>
                    </li>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php else:  ?>
                
            <?php endif; ?>
        </ul>
        <a href="#"></a>
    </div>
</section>
