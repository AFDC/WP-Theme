<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

			<?php
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : false;
if ( $paged === false ) {
$args=array(
   'cat'=> 19,
   'posts_per_page' => 1,
);
query_posts($args);

get_template_part( 'alert', 'index' );
wp_reset_query();
}
?>
		<div id="container">

			<div id="content" role="main">
<?php
if ( $paged === false ) {
$args=array(
   'cat'=> 13,
   'posts_per_page' => 3,
);
query_posts($args);

get_template_part( 'news', 'index' );
wp_reset_query();
?>
<div class="section-head-border"><div class="section-head">All News</div></div>
<?php
$args=array(
   'cat'=>-19,
   'posts_per_page' => 5,
);
query_posts($args);

get_template_part( 'loop', 'index' );
wp_reset_query();

}
else {
    get_template_part( 'loop', 'index' );
}
			?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
