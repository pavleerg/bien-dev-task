<?php
$args = array(
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'ASC'
);

$query = new WP_Query($args);
?>


<section class="post-list">
    <?php if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            $delay = rand(0, 10) * 100;
            ?>
            <div class="post-card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <?php if (has_post_thumbnail()): ?>
                    <div class="post-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div>
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-author">
                        <?php
                        $architect = get_post_meta(get_the_ID(), 'architect_name', true);
                        if ($architect):
                            ?>
                        <p class="post-architect"><?php echo esc_html($architect); ?></p>
                    <?php endif; ?>

                    </p>
                </div>

                <?php
                $categories = get_the_category();
                if (!empty($categories)):
                    ?>
                    <p class="post-tag"><?php echo esc_html($categories[0]->name); ?></p>
                <?php endif; ?>

            </div>
        <?php endwhile; else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</section>