  <?php get_header(); ?>
  <div class="container">
    <?php while (have_posts()) {
      the_post();
      ?>
      <div class="row">
        <div class="col-lg-9">
          <h2 class="page-heading"><?php the_title(); ?></h2>
          Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?>
          <?php if (get_post_type() == 'post') { ?>
            in <a href="#"><?php echo get_the_category_list(', ') ?></a>
          <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9">
          <div class="page-image">
            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
          </div>
          <div class="page-content">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="col-lg-3">
          <aside id="sidebar">
            <?php dynamic_sidebar('main_sidebar'); ?>
          </aside>
        </div>
      </div>
    </div>
    <div class="jumbotron jumbotron-fluid">
      <div class="comments-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">
              <?php
              $fields = array(
                'author' => '<p class="comment-form-author">' . ($req ? '<span class="required">*</span>' : '') .
                  '<input placeholder="Name" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
                'email'  => '<p class="comment-form-email"><label for="email">' . ($req ? '<span class="required">*</span>' : '') .
                  '<input placeholder="Email" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
              );


              $args = array(
                'title_reply' => 'Discuss this topic',
                'fields' => $fields,
                'comment_field' => '<textarea placeholder="Your Comment" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
                  '</textarea>',
                'comment_notes_before' => '<p class="comment-notes">Please, fill all of the forms.<p>'
              );
              comment_form($args);

              $comments_number = get_comments_number();
              if ($comments_number != 0) {
                ?>
                <div class="comments">
                  <h3>Recent comments</h3>
                  <ol class="all-comments">
                    <?php
                    $comments = get_comments(array(
                      'post_id' => $post->ID,
                      'status' => ' approve '
                    ));
                    wp_list_comments(array(
                      'per_page' => 15
                    ), $comments);
                    ?>
                  </ol>
                </div>
              <?php
            }
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>