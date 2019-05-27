<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <a href="<?php echo site_url(''); ?>">
        <div id="main-banner">
            <h1>EDSV-Media Blog</h1>
            <h3>Read, learn and have fun!</h3>
        </div>
    </a>
    <nav class="navbar navbar-light navbar-expand-md sticky-top">
        <div class="container">
            <div id="logo-img">
                <a href="<?php echo site_url(''); ?>">
                    <img src="/wp-content/themes/edsvblog/img/logo.png" alt="EDSV Logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a href="<?php echo site_url(''); ?>" <?php if (is_front_page()) echo 'class="active"' ?>>Main Page</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/blog'); ?>" <?php if (get_post_type() == 'post') echo 'class="active"' ?>>Blog</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/news'); ?>" <?php if (get_post_type() == 'news') echo 'class="active"' ?>>News</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/about'); ?>" <?php if (is_page('about')) echo 'class="active"' ?>>About Us</a>
                    </li>
                </ul>
                <form class="form-inline" method="get" action="<?php echo home_url() ?>">
                    <input class="form-control-sm mr-sm-1" type="search" name="s" placeholder="Search..." value="<?php get_search_query(); ?>">
                    <button class="btn btn-sm" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>