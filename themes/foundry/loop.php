<?php if ( ! have_posts() ) : ?>
	<div class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<div class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>


<?php while ( have_posts() ) : the_post(); ?>

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

			<div class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="cat-links">
						<?php printf( '<span class="%1$s">Posted in</span> %2$s', 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( '<span class="%1$s">Tagged</span> %2$s', 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( 'Leave a comment', '1 Comment', '% Comments' ); ?></span>
				<?php edit_post_link( 'Edit', '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts' ); ?></div>
					<div class="nav-next"><?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>' ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>