<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>

</head>

<body>

    <header>
        <div class="header-container">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo">
                </a>
            </div>
            <nav class="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                ));
                ?>
            </nav>

        </div>
    </header>

    <div class="page-wrapper">