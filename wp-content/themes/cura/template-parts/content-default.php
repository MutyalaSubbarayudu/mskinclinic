<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

?>
<div class="row">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-default' ); ?>>
	    <header class="entry-header">
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-main">
    		<div class="entry-extra-item">
    		    <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_time( 'F d, Y' ); ?></span>
        		<span class="comments"><i class="fa fa-user"></i><?php esc_html_e( 'By ', 'cura' ); ?><?php the_author(); ?> </span>
        		<?php
        		if ( has_category() ) {
        			?>
        			<span class="category"><span class="ti-direction-alt"></span> <?php esc_html_e( 'In', 'cura' ); ?> <?php the_category( ', ' ); ?>  </span>
        			<?php
        		} else {
        			?>
        
        		<?php } ?>
    		</div>
    	</div>
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail ">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
			</div><!-- .post-thumbnail -->
		<?php } ?>
		<div class="entry-main">
    		<div class="entry-content">
				<?php echo wp_kses( substr( get_the_excerpt(), 0, 300 ), 'rt-content' ) . '...'; ?>
				<div class="post-meta">
					<!-- .entry-content -->
					<div class="row entry-extra">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding">
							<div class="entry-extra-item text-left">
								<div class="post-read-more">
									<a class="btn" href="<?php the_permalink(); ?>" data-hover="<?php esc_attr_e( 'Read More', 'cura' ); ?>"><span><?php esc_html_e( 'Read More', 'cura' ); ?></span></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding">
							<div class="pull-right"></div>
						</div>
					</div>
				</div>
			</div><!-- .entry-main -->
		</div>
	</article><!-- #post-## -->
</div>
