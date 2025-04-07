<main class="single-post">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <?php if (has_post_thumbnail()): ?>
                <div class="single-post-image" data-aos="zoom-in-down">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>

            <div class="single-post-container">

                <div class="single-post-header" data-aos="fade-up" data-aos-delay="500">
                    <div class="single-post-title"><?php echo animate_text(get_the_title()); ?></div>

                    <?php
                    $architect = get_post_meta(get_the_ID(), 'architect_name', true);
                    if ($architect):
                        ?>
                        <p class="single-post-architect"><?php echo esc_html($architect); ?>
                        </p>
                    <?php endif; ?>

                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)):
                        ?>
                        <p class="single-post-tag">
                            <?php echo esc_html($categories[0]->name); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="single-post-content" data-aos="fade-up" data-aos-delay="100">
                    <?php the_content(); ?>
                </div>

            </div>


        <?php endwhile; endif; ?>
</main>