<?php
/**
 * Color Meta box in Portfolio Custom Post Type.
 *
 * @package RadiantThemes
 */

/**
 * Portfolio_Colors_Metabox class
 */
class Radiantthemes_Portfolio_Colors_Metabox {

	/**
	 * Undocumented function
	 */
	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php', array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	/**
	 * Undocumented function
	 */
	public function init_metabox() {

		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
		add_action( 'save_post', array( $this, 'save_metabox' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts_styles' ) );
		add_action( 'admin_footer', array( $this, 'color_field_js' ) );

	}

	/**
	 * Undocumented function
	 */
	public function add_metabox() {

		add_meta_box(
			'portfolio_colors',
			__( 'Portfolio Color Box', 'radiantthemes-custom-post-type' ),
			array( $this, 'render_metabox' ),
			'portfolio',
			'side',
			'default'
		);

	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $post Post.
	 * @return void
	 */
	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'radiant_pc_nonce_action', 'radiant_pc_nonce' );

		// Retrieve an existing value from the database.
		$radiant_pc_primary_color = get_post_meta( $post->ID, 'radiant_pc_primary_color', true );

		// Set default values.
		if ( empty( $radiant_pc_primary_color ) ) {
			$radiant_pc_primary_color = '#000';
		}

		// Form fields.
		echo '<table class="form-table">';
		echo '<tr>';
		echo '<th><label for="radiant_pc_primary_color" class="radiant_pc_primary_color_label">' . esc_html__( 'Background Color', 'radiant-colors' ) . '</label></th>';
		echo '<td>';
		echo '<input type="text" id="radiant_pc_primary_color" name="radiant_pc_primary_color" class="radiant_pc_primary_color_field" value="' . esc_attr( $radiant_pc_primary_color ) . '">';
		echo '<p class="description">' . esc_html__( 'Select Background color', 'radiant-colors' ) . '</p>';
		echo '</td>';
		echo '</tr>';
		echo '</table>';

	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $post_id Post Id.
	 * @param [type] $post Post.
	 * @return void
	 */
	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['radiant_pc_nonce'] ) ? $_POST['radiant_pc_nonce'] : '';
		$nonce_action = 'radiant_pc_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) ) {
			return;
		}

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
			return;
		}

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) ) {
			return;
		}

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		// Sanitize user input.
		$radiant_pc_new_primary_color = isset( $_POST['radiant_pc_primary_color'] ) ? sanitize_text_field( $_POST[ 'radiant_pc_primary_color' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'radiant_pc_primary_color', $radiant_pc_new_primary_color );

	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function load_scripts_styles() {

		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );

	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function color_field_js() {

		// Print js only once per page.
		if ( did_action( 'portfolio_colors_metabox_color_picker_js' ) >= 1 ) {
			return;
		}

		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#radiant_pc_primary_color').wpColorPicker();
			});
		</script>
		<?php
		do_action( 'portfolio_colors_metabox_color_picker_js', $this );

	}

}
new Radiantthemes_Portfolio_Colors_Metabox();
