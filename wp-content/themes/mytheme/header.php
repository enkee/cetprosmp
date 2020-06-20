<!DOCTYPE html>
<html lang="es">

<head>
    <title>My Blog</title>
    <meta charset="UTF-8">
    <meta name="title" content="Theme_wp">
    <meta name="description" content="Tema de WordPress">
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#191919" />

    <!-- Carga de Archivos CSS principales-->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

    <!-- jquery ui-interface-->


    <!-- Cargando fuentes-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700" rel="stylesheet">

    <!--Cargando iconos-->
    <link href="<?php bloginfo('template_url'); ?>/css/all.min.css" rel="stylesheet">

    <!-- Carga slideshow (slick) -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css" />

    <!-- Carga de Archivos CSS complementarios-->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.min.css">

    <?php wp_head(); ?>
</head>

<body>
    <header class="encabezado fixed-top" role="banner" id="encabezado">
        <div class="containera">
            <a href="<?php echo get_option('home'); ?>/" id="logo">
                <img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="">
            </a>

            <button type="button" class="ssm-toggle-nav boton-menu" aria-expanded="false">
                <i class="fas fa-bars" aria-hidden="true"></i>
            </button>

            <button type="button" class="boton-buscar" aria-expanded="false">
                <i class="fas fa-search" aria-hidden="true"></i>
            </button>
           
            <div id="general">
                <?php if (is_user_logged_in()) {
                    global $current_user;
                    get_currentuserinfo();
                ?>
                <div id="perfil">
                    <a href="#">
                        <?php echo get_avatar($current_user->id, 48);?>
                        <div class="infouser"> 
                            <span><?php echo $current_user->user_firstname;?></span>
                            <span><?php echo $current_user->user_lastname; ?></span>
                            <span><?php echo $current_user->user_login; ?></span>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a class="salir" href="<?php echo wp_logout_url() ?>">
                                salir
                            </a>
                        </li>
                        <li>
                            <a class="profile" href="#">
                                Perfil
                            </a>
                        </li>
                    </ul>
                </div>
                <?php }?>

                <div id="encuentranos">
                    <p>Visitanos en:</p>
                    <a href="https://www.facebook.com/cetprosanmartindeporres1" target="_blank" >
                        <img src="<?php bloginfo('template_url'); ?>/img/facebook.png" alt="">
                    </a>
                    <a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/img/youtube.png" alt="">
                    </a>
                    <a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/img/twitter.png" alt="">
                    </a>
                </div>

                <a class="boton-buscar" aria-expanded="false">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </a>

                <?php
                    wp_nav_menu(
                    array(
                        'container'      => false,
                        'items_wrap'     => '<ul id="menu-top">%3$s</ul>',
                        'theme_location' => 'menu',
                    ));
                ?>
            </div>

            <div id="bloque-buscar">
                <?php get_search_form();?>
            </div>

            <nav>
                <?php if (is_user_logged_in()) {
                    global $current_user;
                    get_currentuserinfo();
                ?>
                <div id="perfil">
                    <?php 
                        echo get_avatar($current_user->id, 48);
                    ?>
                    <div class="infouser"> 
                        <p><?php echo $current_user->user_firstname;?><br>
                        <?php echo $current_user->user_lastname; ?><br></p>
                        <span><?php echo $current_user->user_login; ?></span>
                    </div>
                    <div>
                        <a href="<?php echo wp_logout_url() ?>" class="btn btn-primary">Salir</a>
                    </div>
                </div>
                <?php }?>

                <div id="encuentranos">
                    <p>Visitanos en:</p>
                    <a href="https://www.facebook.com/cetprosanmartindeporres1" target="_blank" >
                        <img src="<?php bloginfo('template_url'); ?>/img/facebook.png" alt="">
                    </a>
                    <a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/img/youtube.png" alt="">
                    </a>
                    <a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/img/twitter.png" alt="">
                    </a>
                </div>
                
                <?php
                    wp_nav_menu(
                    array(
                        'container'      => false,
                        'items_wrap'     => '<ul id="menu-top" class="sidebar-menu">%3$s</ul>',
                        'theme_location' => 'menu',
                    ));
                ?>
            </nav>

            <div class="ssm-overlay ssm-toggle-nav"></div>

        </div>
    </header>