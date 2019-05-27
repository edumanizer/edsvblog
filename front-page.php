<?php get_header(); ?>
<section class="blog-section">
    <div class="container">
        <div id="banner" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#banner" data-slide-to="0" class="active"></li>
                <li data-target="#banner" data-slide-to="1"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/wp-content/themes/edsvblog/img/blog-banner.jpg" alt="Los Angeles" style="width: 100%">
                    <div class="carousel-caption">
                        <a href="http://www.edsv.site/blog/">
                            <h3>Check Our Blog!</h3>
                        </a>
                        <p>There is so much i need to tell...</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/wp-content/themes/edsvblog/img/news-banner.jpg" alt="Chicago" style="width: 100%">
                    <div class="carousel-caption">
                        <a href="http://www.edsv.site/news/">
                            <h3>Hottest News!</h3>
                        </a>
                        <p>Just For You, only real things!</p>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#banner" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#banner" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

        <a href="<?php echo site_url('/blog'); ?>">
            <h2>Latest Posts</h2>
        </a>
        <div class="card-deck">
            <?php
            $args = array(
                'post_type' => 'post',
                'post_per_page' => 3
            );
            $blogposts = new WP_Query($args);


            while ($blogposts->have_posts()) {
                $blogposts->the_post();
                ?>
                <div class="card">
                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Post Image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title"><?php the_title(); ?></h4>
                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        <a href="<?php echo the_permalink(); ?>" class="btn btn-dark stretched-link">Read More</a>
                    </div>
                </div>
            <?php }
        wp_reset_query(); ?>
        </div>
    </div>
</section>
<div class="jumbotron jumbotron-fluid">
    <section class="news-section">
        <div class="container">
            <a href="<?php echo site_url('/news'); ?>">
                <h2>Hottest News</h2>
            </a>
            <div class="card-deck">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'post_per_page' => 3
                );
                $news = new WP_Query($args);


                while ($news->have_posts()) {
                    $news->the_post();
                    ?>
                    <div class="card">
                        <a href="<?php echo the_permalink(); ?>">
                            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Post Image" style="width:100%">
                        </a>
                        <div class="card-body">
                            <a href="<?php echo the_permalink(); ?>">
                                <h4 class="card-title"><?php the_title(); ?></h4>
                            </a>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <a href="<?php echo the_permalink(); ?>" class="btn btn-dark stretched-link">Read More</a>
                        </div>
                    </div>
                <?php }
            wp_reset_query(); ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>