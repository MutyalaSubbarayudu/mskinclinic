<?php
/**
 * Adds a Recent Posts widget.
 *
 * @package radiantthemes-addons
 */

/**
 * Class Definition.
 */
class Radiantthemes_Recent_Posts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			// Base ID of your widget.
			'radiantthemes_recent_posts_widget',
			// Widget name will appear in UI.
			esc_html__( 'RadiantThemes Recent Posts With Thumbnail Widget', 'radiantthemes-addons' ),
			// Widget description.
			array(
				'description' => esc_html__( 'Widget for recent posts.', 'radiantthemes-addons' ),
			)
		);
	}

	/**
	 * Creating widget front-end.
	 *
	 * @param  [type] $args     description.
	 * @param  [type] $instance description.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		// before and after widget arguments are defined by themes.
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] );
		}

		$maxpoststitle = ! empty( $instance['maxpoststitle'] ) ? $instance['maxpoststitle'] : '';
		$maxposts      = ! empty( $instance['maxposts'] ) ? $instance['maxposts'] : esc_html__( '4', 'radiantthemes-addons' );
		?>
		<div class="rt-recent-post-with-thumbnail element-one">
			<h5 class="widget-title"><?php echo esc_attr( $maxpoststitle ); ?></h5>
			<ul class="rt-recent-post-with-thumbnail-holder">
				<?php
				$query = new WP_Query(
					array(
						'post_type'      => 'post',
						'posts_per_page' => $maxposts,
						'orderby'        => 'date',
						'order'          => 'DESC',
						'category_name'  => 'blog-widgets'
					)
				);
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
				<li class="rt-recent-post-with-thumbnail-post">
				    <div class="blog-widget-post">
    					<?php if ( has_post_thumbnail() ) { ?>
    					    <div class="blog-widget-post-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
    					    </div>
    					<?php } ?>
    					<div class="blog-widget-post-content">
    					    <h5 class="blog-widget-title">
    					        <a href="<?php the_permalink(); ?>">
    					            <?php $content = get_the_title(); //echo implode(' ', array_slice(str_word_count($content, 2), 0, 4)); ??>
    					            <?php echo substr($content, 0, 50); ?>...
    					        </a>
    					    </h5>
    					    <div class="blog-widget-date">
    					        <p class="excerpt"><?php echo get_the_time( 'F d, Y' ); ?></p>
    					    </div>
    					</div>
					</div>
				</li>
					<?php
				endwhile; // End of the loop.
				?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Widget Backend
	 *
	 * @param  [type] $instance description.
	 */
	public function form( $instance ) {
		$maxpoststitle = ! empty( $instance['maxpoststitle'] ) ? $instance['maxpoststitle'] : "";
		$maxposts      = ! empty( $instance['maxposts'] ) ? $instance['maxposts'] : esc_html__( '4', 'radiantthemes-addons' );
		// Widget admin form.
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'maxpoststitle' ) ); ?>"><?php esc_html_e( 'Title:', 'radiantthemes-addons' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'maxpoststitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'maxpoststitle' ) ); ?>" type="text" value="<?php echo esc_attr( $maxpoststitle ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'maxposts' ) ); ?>"><?php esc_html_e( 'No. of Posts to show:', 'radiantthemes-addons' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'maxposts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'maxposts' ) ); ?>" type="number" value="<?php echo esc_attr( $maxposts ); ?>" />
		</p>
		<?php
	}

	/**
	 * Updating widget replacing old instances with new.
	 *
	 * @param  [type] $new_instance description.
	 * @param  [type] $old_instance description.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                  = array();
		$instance['maxpoststitle'] = ( ! empty( $new_instance['maxpoststitle'] ) ) ? strip_tags(
			$new_instance['maxpoststitle']
		) : '';

		$instance['maxposts'] = ( ! empty( $new_instance['maxposts'] ) ) ? strip_tags(
			$new_instance['maxposts']
		) : '';

		return $instance;
	}

}
/**
 * Register and load the widget
 */
function radiantthemes_recent_posts_load_widget() {
	register_widget( 'Radiantthemes_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'radiantthemes_recent_posts_load_widget' );