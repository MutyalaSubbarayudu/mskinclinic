<?php
/**
 * Adds a Image Box widget.
 *
 * @package radiantthemes-addons
 */

/**
 * Class Definition.
 */
class Radiantthemes_Image_Box_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		// Add Widget scripts.
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'image_box_scripts' ) );

		parent::__construct(
			// Base ID of your widget.
			'radiantthemes_image_box_widget',
			// Widget name will appear in UI.
			esc_html__( 'RadiantThemes Image Box Widget', 'radiantthemes-addons' ),
			// Widget description.
			array(
				'description' => esc_html__( 'Image Box Widget.', 'radiantthemes-addons' ),
			)
		);
	}

	/**
	 * Add Scripts for Media upload.
	 *
	 * @return void
	 */
	public function admin_scripts() {
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media();
		wp_enqueue_script(
			'rt_image_box',
			plugins_url( 'radiantthemes-custom-post-type/js/rt_image_box.js' ),
			array( 'jquery' ),
			time(),
			true
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

		$img_box_image = apply_filters( 'widget_image', empty( $instance['img_box_image'] ) ? '' : $instance['img_box_image'], $instance );
		$img_box_title = empty( $instance['img_box_title'] ) ? '' : $instance['img_box_title'];
		$img_box_text  = empty( $instance['img_box_text'] ) ? '' : $instance['img_box_text'];
		$img_box_link  = empty( $instance['img_box_link'] ) ? '' : $instance['img_box_link'];

		?>
		<div class="rt-image-box random-post-wrapper">
		
			<div class="random-post-pic">
				<img src="<?php echo esc_url( $img_box_image ); ?>" alt="/">
			</div>
			<div class="random-post-data">
				<h3 class="title"><?php echo esc_html( $img_box_title ); ?></h3>
				<p class="random-post-excerpt"><?php echo esc_html( $img_box_text ); ?></p>
			</div>
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

		// Set default values.
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'img_box_image' => '',
				'img_box_title' => '',
				'img_box_text'  => '',
				'img_box_link'  => '',
			)
		);

		// Retrieve an existing value from the database.
		$img_box_image = ! empty( $instance['img_box_image'] ) ? $instance['img_box_image'] : '';
		$img_box_title = ! empty( $instance['img_box_title'] ) ? $instance['img_box_title'] : '';
		$img_box_text  = ! empty( $instance['img_box_text'] ) ? $instance['img_box_text'] : '';
		$img_box_link  = ! empty( $instance['img_box_link'] ) ? $instance['img_box_link'] : '';
		// Widget admin form.
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'img_box_image' ) ); ?>"><?php esc_html_e( 'Image:', 'radiantthemes-addons' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'img_box_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_box_image' ) ); ?>" type="text" value="<?php echo esc_url( $img_box_image ); ?>" />
			<button class="upload_image_button button button-primary"><?php esc_html_e( 'Upload Image', 'radiantthemes-addons' ); ?></button>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'img_box_title' ) ); ?>"><?php esc_html_e( 'Title:', 'radiantthemes-addons' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'img_box_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_box_title' ) ); ?>" type="text" value="<?php echo esc_attr( $img_box_title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'img_box_text' ) ); ?>"><?php esc_html_e( 'Content:', 'radiantthemes-addons' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'img_box_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_box_text' ) ); ?>"><?php echo esc_html( $img_box_text ); ?></textarea>
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

		$instance = $old_instance;

		$instance['img_box_image'] = ( ! empty( $new_instance['img_box_image'] ) ) ? wp_strip_all_tags(
			$new_instance['img_box_image']
		) : '';

		$instance['img_box_title'] = ( ! empty( $new_instance['img_box_title'] ) ) ? wp_strip_all_tags(
			$new_instance['img_box_title']
		) : '';

		$instance['img_box_text'] = ( ! empty( $new_instance['img_box_text'] ) ) ? wp_strip_all_tags(
			$new_instance['img_box_text']
		) : '';

		

		return $instance;

	}

}
/**
 * Register and load the widget
 */
function radiantthemes_image_box_load_widget() {
	register_widget( 'Radiantthemes_Image_Box_Widget' );
}
add_action( 'widgets_init', 'radiantthemes_image_box_load_widget' );
