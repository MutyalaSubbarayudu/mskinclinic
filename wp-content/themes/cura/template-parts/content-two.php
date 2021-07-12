<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-two' ); ?>>

<?php if ( has_post_format( 'image' ) ) { ?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);">
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-main">
		<div class="holder">
			<ul class="entry-action-buttons">
				<li><a class="btn fancybox" href="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>"><span class="ti-zoom-in"></span></a></li>
			</ul><!-- .entry-action-buttons -->
			<div class="post-meta">
				<span><?php echo get_the_date(); ?></span>
			</div><!-- .post-meta -->
			<header class="entry-header">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			</header><!-- .entry-header -->
		</div>
	</div><!-- .entry-main -->

<?php } elseif ( has_post_format( 'quote' ) ) { ?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);">
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-main">
		<div class="holder">
			<ul class="entry-action-buttons">
				<li><div class="btn"><span class="ti-quote-left"></span></div></li>
			</ul><!-- .entry-action-buttons -->
			<header class="entry-header">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<p><?php echo wp_kses( substr( wp_strip_all_tags( get_the_excerpt() ), 0, 80 ), 'rt-content' ) . '...'; ?></p>
			</div><!-- .entry-content -->
			<div class="post-meta">
				<span><?php echo get_the_author_link(); ?></span>
			</div><!-- .post-meta -->
		</div>
	</div><!-- .entry-main -->

<?php } elseif ( has_post_format( 'status' ) ) { ?>

	<div class="entry-main">
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<p><?php echo wp_kses( substr( wp_strip_all_tags( get_the_excerpt() ), 0, 100 ), 'rt-content' ) . '...'; ?></p>
		</div><!-- .entry-content -->
		<div class="post-meta">
			<?php
				$user = wp_get_current_user();
			if ( $user ) :
				?>
				<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" alt="<?php echo get_the_author(); ?>" width="96" height="96">
			<?php endif; ?>
			<span><?php echo esc_html__( 'by', 'cura' ); ?> <?php echo get_the_author_link(); ?></span>
		</div><!-- .post-meta -->
	</div><!-- .entry-main -->

<?php } else { ?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-main">
		<div class="holder">
			<div class="post-meta">
				<span><?php echo get_the_date(); ?></span>
			</div><!-- .post-meta -->
			<header class="entry-header">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<p><?php echo wp_kses( substr( wp_strip_all_tags( get_the_excerpt() ), 0, 80 ), 'rt-content' ) . '...'; ?></p>
			</div><!-- .entry-content -->
			<div class="entry-more">
				<a class="btn" href="<?php esc_url( get_permalink() ); ?>"><span><?php echo esc_html__( 'Read More', 'cura' ); ?></span><span class="btn-arrow"><i class="fa fa-angle-right"></i></span></a>
			</div><!-- .entry-more -->
		</div>
	</div><!-- .entry-main -->

<?php } ?>

</article><!-- #post-## -->
