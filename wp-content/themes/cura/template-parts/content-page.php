<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php
		if ( 'default' === radiantthemes_global_var( 'blog-style', '', false ) && get_post() && ! preg_match( '/vc_row/', get_post()->post_content ) ) {
			the_title( '<h2 class="entry-title">', '</h2>' );
		} elseif ( ! class_exists( 'ReduxFrameworkPlugin' ) && ! preg_match( '/vc_row/', get_post()->post_content ) ) {
			the_title( '<h2 class="entry-title">', '</h2>' );
		}
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cura' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
