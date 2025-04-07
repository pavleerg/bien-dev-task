<?php get_header(); ?>


<section class="hero-container">
    <div class="hero-banner">
        <h1 class="hero-title">

            <?php echo animate_text('ARCHITECTURE for EVERYONE'); ?>

        </h1>
    </div>
</section>

<?php get_template_part('templates/content', 'posts-list'); ?>

<?php get_footer(); ?>