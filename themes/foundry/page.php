<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <?php if (has_post_thumbnail()) { ?>
  <div class="jumbotron">
    <div class="container">
    <?php the_post_thumbnail(); ?>    </div>
  </div>

  <?php } ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

      <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
        <div class="entry-summary">
          <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
      <?php else : ?>
        <div class="entry-content">
          <?php the_content( 'Continue reading <span class="meta-nav">&rarr;</span>' ); ?>
          <?php wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
      <?php endif; ?>

    </div><!-- #post-## -->

<?php endwhile; // End the loop. ?>


<?php get_footer(); ?>