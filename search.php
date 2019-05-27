<?php get_header(); ?>
<?php if (have_posts()) { ?>
    <section class="blog-section">
        <div class="container">
            <a href="<?php echo site_url('/blog'); ?>">
                <h2 class="page-heading">Search results for "<?php echo get_search_query() ?>"</h2>
            </a>
            <div class="card-deck">
                <?php
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="card">
                        <a href="<?php echo the_permalink(); ?>">
                            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Post Image" style="width:100%">
                        </a>
                        <div class="card-body">
                            <a href="<?php echo the_permalink(); ?>">
                                <h4 class="card-title"><?php the_title(); ?></h4>
                            </a>
                            <div class="card-meta">
                                Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?>
                                <?php if (get_post_type() == 'post') { ?>
                                    in <a href="#"><?php echo get_the_category_list(', ') ?></a>
                                <?php } ?>
                            </div>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                            <a href="<?php echo the_permalink(); ?>" class="btn btn-dark stretched-link">Read More</a>
                        </div>
                    </div>
                <?php }
            wp_reset_query(); ?>
            </div>
        </div>
    </section>
<?php } else { ?>
    <div class="no-results">
        <h2> Ooops... There must be some mistake. Please, try again!</h2>
    </div>
<?php } ?>
<div class="pagination">
    <?php echo paginate_links(); ?>
</div>
<?php get_footer(); ?>