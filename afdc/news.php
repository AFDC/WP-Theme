<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package AFDC
 * @subpackage WP-Theme
 */
?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<div class="section-head-border"><div class="section-head">Featured</div></div>
<div class="newsfeed">
<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display all other posts. */ ?>

		<div id="news-post-<?php the_ID(); ?>" class="news-post">
                    <div class="news-post-content">
			<h2 class="news-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

            <div class="news-summary">
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('news-thumbnail'); ?></a>
                <?php the_excerpt(); ?>
            </div><!-- .news-content -->

		</div><!-- #post-## -->
</div>

<?php endwhile; // End the loop. Whew. ?>
</div>
