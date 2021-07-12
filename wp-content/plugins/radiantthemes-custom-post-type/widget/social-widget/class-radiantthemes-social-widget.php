<?php
/**
 * Adds a Social widget.
 *
 * @package radiantthemes-addons
 */

/**
 * Class Definition.
 */
class Radiantthemes_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			// Base ID of your widget.
			'radiantthemes_social_widget',
			// Widget name will appear in UI.
			esc_html__( 'RadiantThemes Social', 'radiantthemes-addons' ),
			// Widget description.
			array(
				'description' => esc_html__( 'Widget for Social.', 'radiantthemes-addons' ),
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
		$socialtitle = ! empty( $instance['socialtitle'] ) ? $instance['socialtitle'] : '';
		// This is where you run the code and display the output.
		?>
		<?php
		if ( true == radiantthemes_global_var( 'social-icon-target', '', false ) ) {
			$social_target = 'target="_blank"';
		} else {
			$social_target = '';
		}
		?>
		<?php if ( ! empty( $instance['socialtitle'] ) ) : ?>
			<h5 class="widget-title"><?php echo esc_attr( $socialtitle ); ?></h5>
		<?php endif; ?>
		<ul class="social">
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-googleplus', '', false ) ) ) : ?>
				<li class="google-plus"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-googleplus', '', false ) ); ?>" rel="publisher" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-google-plus"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-facebook', '', false ) ) ) : ?>
				<li class="facebook"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-facebook', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-facebook"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-twitter', '', false ) ) ) : ?>
				<li class="twitter"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-twitter', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-twitter"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-vimeo', '', false ) ) ) : ?>
				<li class="vimeo"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-vimeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vimeo"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-youtube', '', false ) ) ) : ?>
				<li class="youtube"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-youtube', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-youtube-play"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-flickr', '', false ) ) ) : ?>
				<li class="flickr"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-flickr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-flickr"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-linkedin', '', false ) ) ) : ?>
				<li class="linkedin"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-linkedin', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-linkedin"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-pinterest', '', false ) ) ) : ?>
				<li class="pinterest"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-pinterest', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-pinterest-p"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-xing', '', false ) ) ) : ?>
				<li class="xing"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-xing', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-xing"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-viadeo', '', false ) ) ) : ?>
				<li class="viadeo"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-viadeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-viadeo"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-vkontakte', '', false ) ) ) : ?>
				<li class="vkontakte"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-vkontakte', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vk"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-tripadvisor', '', false ) ) ) : ?>
				<li class="tripadvisor"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-tripadvisor', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tripadvisor"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-tumblr', '', false ) ) ) : ?>
				<li class="tumblr"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-tumblr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tumblr"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-behance', '', false ) ) ) : ?>
				<li class="behance"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-behance', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-behance"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-instagram', '', false ) ) ) : ?>
				<li class="instagram"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-instagram', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-instagram"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-dribbble', '', false ) ) ) : ?>
				<li class="dribbble"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-dribbble', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-dribbble"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( radiantthemes_global_var( 'social-icon-skype', '', false ) ) ) : ?>
				<li class="skype"><a href="<?php echo esc_url( radiantthemes_global_var( 'social-icon-skype', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-skype"></i></a></li>
			<?php endif; ?>
		</ul>

		<?php

		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Widget Backend
	 *
	 * @param  [type] $instance description.
	 */
	public function form( $instance ) {
		$socialtitle = ! empty( $instance['socialtitle'] ) ? $instance['socialtitle'] : '';
		// Widget admin form.
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'socialtitle' ) ); ?>"><?php esc_html_e( 'Title:', 'radiantthemes-addons' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'socialtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'socialtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $socialtitle ); ?>" />
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
		$instance                = array();
		$instance['socialtitle'] = ( ! empty( $new_instance['socialtitle'] ) ) ? strip_tags(
			$new_instance['socialtitle']
		) : '';
		return $instance;
	}

}
/**
 * Register and load the widget
 */
function radiantthemes_social_load_widget() {
	register_widget( 'Radiantthemes_Social_Widget' );
}
add_action( 'widgets_init', 'radiantthemes_social_load_widget' );