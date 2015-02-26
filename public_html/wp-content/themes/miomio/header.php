<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

    <?php global $global_theme_options; ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php echo $global_theme_options['opt-favicon']['url']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>

    <!-- google analytics -->
    <script>

        <?php echo $global_theme_options['opt-google-analytics'] ?>

    </script>

</head>
<body class="<?php body_class(); ?>" style="background-image: url('<?php echo $global_theme_options['opt-background']['background-image'] ?>'); background-repeat: <?php echo  $global_theme_options['opt-background']['background-repeat']; ?>; background-color: <?php echo  $global_theme_options['opt-background']['background-color']; ?>;">
<header class="header">
    <div class="row">
        <nav class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name">
                    <h1 class="logo"><a href="<?php bloginfo('url')?>"> <img src="<?php echo $global_theme_options['opt-logo']['url']; ?>" alt="logo"/> </a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
            </ul>
            
            <!-- main menu -->
            <?php

            $main_menu_args = array(
                'theme_location'  => 'main-menu',
                'menu'            => 'main-menu',
                'container'       => 'div',
                'container_class' => 'top-bar-section',
                'walker'          => new top_bar_walker()
            );

            wp_nav_menu( $main_menu_args );

            ?>
            
        </nav>
    </div>
</header>