<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

/**
 * @since 1.1.0
 */
class Radiantthemes_Style_Team extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'radiant-team';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Team', 'radiantthemes-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'radiantthemes-addons-custom',
		];
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-team',
		];
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'radiant-widgets-category' ];
	}

	/**
	 * Get all team Custom Post Type Categories.
	 *
	 * @return array team categories.
	 */
	public function get_team_categories() {
		$team_terms = get_terms(
			array(
				'taxonomy'   => 'profession',
				'hide_empty' => false,
			)
		);

		$team_category_array = array();
		$team_category_array = array( 'all' => 'Show all Professions' );
		if ( ! empty( $team_terms ) ) {
			foreach ( $team_terms as $team_term ) {
				$team_category_array[ $team_term->slug ] = $team_term->name;
			}
		}

		return $team_category_array;
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'style_variation',
			[
				'label'       => esc_html__( 'Team Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'eight'   => esc_html__( 'Style One ', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two ', 'radiantthemes-addons' ),
					'three'   => esc_html__( 'Style Three ', 'radiantthemes-addons' ),
					'four'   => esc_html__( 'Style Four ', 'radiantthemes-addons' ),
					
				],
				'default'     => 'eight',
			]
		);

		$this->add_control(
			'team_category',
			[
				'label'       => esc_html__( 'Select Professions', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_team_categories(),
				'default'     => 'all','multiple'    => true,
			]
		);

		$this->add_control(
			'team_allow_carousel',
			[
				'label'   => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default' => 'true',
			]
		);

		$this->add_control(
			'allow_nav',
			[
				'label'     => esc_html__( 'Allow Navigation?', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default'   => 'true',
				'condition' => [
					'team_allow_carousel' => 'true',
				],
			]
		);

		$this->add_control(
			'navigation_style',
			[
				'label'       => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One (Arrow - Light)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Circle)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Arrow - Dark)', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
				'condition'   => [
					'allow_nav'                   => 'true',
					'team_allow_carousel!' => 'false',
				],
			]
		);

		$this->add_control(
			'allow_dots',
			[
				'label'       => esc_html__( 'Allow Dots for Navigation?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default'     => 'true',
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
			]
		);

		$this->add_control(
			'navigation_dot_style',
			[
				'label'       => esc_html__( 'Navigation Dot Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one' => esc_html__( 'Center Dot (Dark)', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Right Dot (Light)', 'radiantthemes-addons' ),
				],
				'default'     => 'two',
				'condition'   => [
					'allow_dots'                  => 'true',
					'team_allow_carousel!' => 'false',
				],
			]
		);

		$this->add_control(
			'allow_loop',
			[
				'label'       => esc_html__( 'Allow Loop?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default'     => 'true',
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
			]
		);

		$this->add_control(
			'allow_autoplay',
			[
				'label'       => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default'     => 'true',
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
			]
		);

		$this->add_control(
			'autoplay_timeout',
			[
				'label'       => esc_html__( 'Autoplay Timeout (in milliseconds)', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::NUMBER,
				'min'         => 500,
				'default'     => 6000,
				'step'        => 500,
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'       => esc_html__( 'Order', 'radiantthemes-addons' ),
				'label_block' => false,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				],
				'default'     => 'DESC',
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'       => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'ID'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),
				],
				'default'     => 'date',
			]
		);

		$this->add_control(
			'max_posts',
			[
				'label'       => esc_html__( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => -1,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'default'     => 4,
			]
		);

		$this->add_control(
			'posts_in_desktop',
			[
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 3,
			]
		);

		$this->add_control(
			'posts_in_tab',
			[
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 2,
			]
		);

		$this->add_control(
			'posts_in_mobile',
			[
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 1,
			]
		);
		$this->add_control(
			'space_between_posts',
			[
				'label'       => esc_html__( 'Space beteen posts', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Space between Two Posts', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 30,
			]
		);

		$this->add_control(
			'team_no_row_items',
			[
				'label'       => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'false',
				],
				'default'     => 2,
			]
		);

		$this->add_control(
			'team_enable_link',
			[
				'label'   => __( 'Enable Link?', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),

				],
				'default' => 'true',

			]
		);
		$this->add_control(
			'team_button_text',
			[
				'label'       => esc_html__( 'Button Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'condition'   => [
					'team_enable_link' => 'true',
				],
				'default'     => 'Read More',
			]
		);

		$this->add_control(
			'add_animation',
			[
				'label'   => __( 'Add Animation?', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'radiantthemes-addons' ),
				'label_off' => __( 'no', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'rt_animation',
			[
				'label'   => __( 'Animation Name', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => sprintf( wp_kses_post( 'Choose your animation name. Powered By:  <a href="%s" target="_blank">Animate css</a>).', 'radiantthemes-addons' ), 'https://daneden.github.io/animate.css' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'attention_seekers' => esc_html__( 'Attention Seekers', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'bouncing_entrances' => esc_html__( 'Bouncing Entrances', 'radiantthemes-addons' ),
					'bouncing_exits' => esc_html__( 'Bouncing Exits', 'radiantthemes-addons' ),
					'fading_entrances' => esc_html__( 'Fading Entrances', 'radiantthemes-addons' ),
					'fading_exits' => esc_html__( 'Fading Exits', 'radiantthemes-addons' ),
					'flippers' => esc_html__( 'Flippers', 'radiantthemes-addons' ),
					'lightspeed' => esc_html__( 'Lightspeed', 'radiantthemes-addons' ),
					'rotating_entrances' => esc_html__( 'Rotating Entrances', 'radiantthemes-addons' ),
					'rotating_exits' => esc_html__( 'Rotating Exits', 'radiantthemes-addons' ),
					'sliding_entrances' => esc_html__( 'Sliding Entrances', 'radiantthemes-addons' ),
					'sliding_exits' => esc_html__( 'Sliding Exits', 'radiantthemes-addons' ),
					'zoom_entrances' => esc_html__( 'Zoom Entrances', 'radiantthemes-addons' ),
					'zoom_exits' => esc_html__( 'Zoom Exits', 'radiantthemes-addons' ),
					'specials' => esc_html__( 'Specials', 'radiantthemes-addons' ),


				],
				'default'     => 'attention_seekers',
				'condition'   => [
					'add_animation' => 'yes',
				],

			]
		);
		$this->add_control(
			'attention_seekers',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'bounce' => esc_html__( 'Bounce', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'flash' => esc_html__( 'Flash', 'radiantthemes-addons' ),
					'pulse' => esc_html__( 'Pulse', 'radiantthemes-addons' ),
					'rubberBand' => esc_html__( 'rubberBand', 'radiantthemes-addons' ),
					'shake' => esc_html__( 'shake', 'radiantthemes-addons' ),
					'swing' => esc_html__( 'swing', 'radiantthemes-addons' ),
					'tada' => esc_html__( 'tada', 'radiantthemes-addons' ),
					'wobble' => esc_html__( 'wobble', 'radiantthemes-addons' ),
					'jello' => esc_html__( 'jello', 'radiantthemes-addons' ),



				],
				'default'     => 'bounce',
				'condition'   => [
					'rt_animation' => 'attention_seekers',
				],

			]
		);
		$this->add_control(
			'bouncing_entrances',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'bounceIn' => esc_html__( 'BounceIn', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'bounceInDown' => esc_html__( 'BounceInDown', 'radiantthemes-addons' ),
					'bounceInLeft' => esc_html__( 'BounceInLeft', 'radiantthemes-addons' ),
					'bounceInRight' => esc_html__( 'BounceInRight', 'radiantthemes-addons' ),
					'bounceInUp' => esc_html__( 'BounceInUp', 'radiantthemes-addons' ),

				],
				'default'     => 'bounceIn',
				'condition'   => [
					'rt_animation' => 'bouncing_entrances',
				],

			]
		);
		$this->add_control(
			'bouncing_exits',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'bounceOut' => esc_html__( 'bounceOut', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'bounceOutDown' => esc_html__( 'bounceOutDown', 'radiantthemes-addons' ),
					'bounceOutLeft' => esc_html__( 'bounceOutLeft', 'radiantthemes-addons' ),
					'bounceOutRight' => esc_html__( 'bounceOutRight', 'radiantthemes-addons' ),
					'bounceOutUp' => esc_html__( 'bounceOutUp', 'radiantthemes-addons' ),

				],
				'default'     => 'bounceOut',
				'condition'   => [
					'rt_animation' => 'bouncing_exits',
				],

			]
		);
		$this->add_control(
			'fading_entrances',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'fadeIn' => esc_html__( 'fadeIn', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'radiantthemes-addons' ),
					'fadeInDownBig' => esc_html__( 'fadeInDownBig', 'radiantthemes-addons' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'radiantthemes-addons' ),
					'fadeInLeftBig' => esc_html__( 'fadeInLeftBig', 'radiantthemes-addons' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'radiantthemes-addons' ),
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'radiantthemes-addons' ),

				],
				'default'     => 'bounceOut',
				'condition'   => [
					'rt_animation' => 'bouncing_exits',
				],

			]
		);
		$this->add_control(
			'fading_exits',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'fadeOut' => esc_html__( 'fadeOut', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'fadeOutDown' => esc_html__( 'fadeOutDown', 'radiantthemes-addons' ),
					'fadeOutDownBig' => esc_html__( 'fadeOutDownBig', 'radiantthemes-addons' ),
					'fadeOutLeft' => esc_html__( 'fadeOutLeft', 'radiantthemes-addons' ),
					'fadeOutLeftBig' => esc_html__( 'fadeOutLeftBig', 'radiantthemes-addons' ),
					'fadeOutRight' => esc_html__( 'fadeOutRight', 'radiantthemes-addons' ),
					'fadeOutRightBig' => esc_html__( 'fadeOutRightBig', 'radiantthemes-addons' ),
					'fadeOutUp' => esc_html__( 'fadeOutUp', 'radiantthemes-addons' ),
					'fadeOutUpBig' => esc_html__( 'fadeOutUpBig', 'radiantthemes-addons' ),


				],
				'default'     => 'fadeOut',
				'condition'   => [
					'rt_animation' => 'fading_exits',
				],

			]
		);
		$this->add_control(
			'flippers',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'flip' => esc_html__( 'flip', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'flipInX' => esc_html__( 'flipInX', 'radiantthemes-addons' ),
					'flipInY' => esc_html__( 'flipInY', 'radiantthemes-addons' ),
					'flipOutX' => esc_html__( 'flipOutX', 'radiantthemes-addons' ),
					'flipOutY' => esc_html__( 'flipOutY', 'radiantthemes-addons' ),



				],
				'default'     => 'flip',
				'condition'   => [
					'rt_animation' => 'flippers',
				],

			]
		);
		$this->add_control(
			'lightspeed',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'lightSpeedIn' => esc_html__( 'lightSpeedIn', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'lightSpeedOut' => esc_html__( 'lightSpeedOut', 'radiantthemes-addons' ),

				],
				'default'     => 'lightSpeedIn',
				'condition'   => [
					'rt_animation' => 'lightspeed',
				],

			]
		);
		$this->add_control(
			'rotating_entrances',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'rotateIn' => esc_html__( 'rotateIn', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'rotateInDownLeft' => esc_html__( 'rotateInDownLeft', 'radiantthemes-addons' ),
					'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'rotateInUpLeft' => esc_html__( 'rotateInUpLeft', 'radiantthemes-addons' ),
					'rotateInUpRight' => esc_html__( 'rotateInUpRight', 'radiantthemes-addons', 'radiantthemes-addons' ),


				],
				'default'     => 'rotateIn',
				'condition'   => [
					'rt_animation' => 'rotating_entrances',
				],

			]
		);
		$this->add_control(
			'rotating_exits',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'rotateOut' => esc_html__( 'rotateOut', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'rotateOutDownLeft' => esc_html__( 'rotateOutDownLeft', 'radiantthemes-addons' ),
					'rotateOutDownRight' => esc_html__( 'rotateOutDownRight', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'rotateOutUpLeft' => esc_html__( 'rotateOutUpLeft', 'radiantthemes-addons' ),
					'rotateOutUpRight' => esc_html__( 'rotateOutUpRight', 'radiantthemes-addons', 'radiantthemes-addons' ),


				],
				'default'     => 'rotateIn',
				'condition'   => [
					'rt_animation' => 'rotating_exits',
				],

			]
		);

		$this->add_control(
			'sliding_entrances',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'slideInUp' => esc_html__( 'slideInUp', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'slideInDown' => esc_html__( 'slideInDown', 'radiantthemes-addons' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'slideInRight' => esc_html__( 'slideInRight', 'radiantthemes-addons' ),


				],
				'default'     => 'slideInUp',
				'condition'   => [
					'rt_animation' => 'sliding_entrances',
				],

			]
		);

		$this->add_control(
			'sliding_exits',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'slideOutUp' => esc_html__( 'slideOutUp', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'slideOutDown' => esc_html__( 'slideOutDown', 'radiantthemes-addons' ),
					'slideOutLeft' => esc_html__( 'slideOutLeft', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'slideOutRight' => esc_html__( 'slideOutRight', 'radiantthemes-addons' ),


				],
				'default'     => 'slideOutUp',
				'condition'   => [
					'rt_animation' => 'sliding_exits',
				],

			]
		);
		$this->add_control(
			'zoom_entrances',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'zoomIn' => esc_html__( 'zoomIn', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'zoomInDown' => esc_html__( 'zoomInDown', 'radiantthemes-addons' ),
					'zoomInLeft' => esc_html__( 'zoomInLeft', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'zoomInRight' => esc_html__( 'zoomInRight', 'radiantthemes-addons' ),
					'zoomInUp' => esc_html__( 'zoomInUp', 'radiantthemes-addons' ),


				],
				'default'     => 'zoomIn',
				'condition'   => [
					'rt_animation' => 'zoom_entrances',
				],

			]
		);
		$this->add_control(
			'zoom_exits',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'zoomOut' => esc_html__( 'zoomOut', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'zoomOutDown' => esc_html__( 'zoomOutDown', 'radiantthemes-addons' ),
					'zoomOutLeft' => esc_html__( 'zoomOutLeft', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'zoomOutRight' => esc_html__( 'zoomOutRight', 'radiantthemes-addons' ),
					'zoomOutUp' => esc_html__( 'zoomOutUp', 'radiantthemes-addons' ),


				],
				'default'     => 'zoomOut',
				'condition'   => [
					'rt_animation' => 'zoom_exits',
				],

			]
		);
		$this->add_control(
			'specials',
			[
				'label'   => __( 'Animation Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'options'     => [
					'hinge' => esc_html__( 'hinge', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'jackInTheBox' => esc_html__( 'jackInTheBox', 'radiantthemes-addons' ),
					'rollIn' => esc_html__( 'rollIn', 'radiantthemes-addons', 'radiantthemes-addons' ),
					'rollOut' => esc_html__( 'rollOut', 'radiantthemes-addons' ),


				],
				'default'     => 'zoomOut',
				'condition'   => [
					'rt_animation' => 'specials',
				],

			]
		);

		$this->add_control(
			'duration',
			[
				'label'   => __( 'Animation Duration', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put time is seconds. Eg. 2s', 'radiantthemes-addons' ),
				'default'     => '2s',
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'condition'   => [
					'add_animation' => 'true',
				],
			]
		);
		$this->add_control(
			'delay',
			[
				'label'   => __( 'Animation Delay', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'description' => esc_html__( 'Put time is seconds. Eg. 0s', 'radiantthemes-addons' ),
				'default'     => '0s',
				'edit_field_class' => 'vc_col-xs-3 vc_column',
				'condition'   => [
					'add_animation' => 'true',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_general',
			[
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'team_color',
			[
				'label'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-one .team-item > .holder > .data .designation,
					.team.element-one .team-four > .holder > .data .designation' => 'color: {{VALUE}}',

					'{{WRAPPER}} .team.element-three .rt-doctor:hover .box-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .team.element-four .rt-professionals:hover .box-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .team.element-eight .team-item .holder .team-content' => 'background-color: {{VALUE}}',

				],
				'default'   => '#000000',
			]
		);

		$this->add_control(
			'extra_class',
			[
				'label'       => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'extra_id',
			[
				'label'       => esc_html__( 'Element ID', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .team.element-two .rt-doctor .box-content a , .team.element-three .rt-doctor:hover .box-content .view_btn, .team.element-three .rt-doctor:hover .box-content .view_btn.view_btn-simple,.team.element-four .rt-professionals:hover .box-content .view_btn.view_btn-simple',
				'condition'   => [
					'team_enable_link' => 'true',
				],
			]
		);
		$this->add_control(
			'team_button_color',
			[
				'label'     => esc_html__( 'Button color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-two .rt-doctor .box-content a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three .rt-doctor:hover .box-content .view_btn.view_btn-simple:after,
.team.element-three .rt-doctor:hover .box-content .view_btn.view_btn-simple:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three .rt-doctor:hover .box-content .view_btn.view_btn-simple' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-four .rt-professionals:hover .box-content .view_btn.view_btn-simple' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three .rt-professionals:hover .box-content .view_btn.view_btn-simple:after,
.team.element-three .rt-professionals:hover .box-content .view_btn.view_btn-simple:before' => 'background-color: {{VALUE}}',
					
					
				],
				'condition'   => [
					'team_enable_link' => 'true',
				],
				
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_content',
			[
				'label' => __( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Content Typography', 'radiantthemes-addons' ),
				'name'     => 'content_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .team .team-item > .holder > .team-data blockquote p , .team.element-two .rt-doctor .box-content p , .team.element-three .rt-doctor .box-content p , .team.element-four .rt-professionals .box-content p',
			]
		);
		$this->add_control(
			'team_content_color',
			[
				'label'     => esc_html__( 'Content color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-one .team-item > .holder > .data .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-two .rt-doctor .box-content p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three .rt-doctor .box-content p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-four .rt-professionals .box-content p' => 'color: {{VALUE}}',
					
					

				],
				
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_title',
			[
				'label' => esc_html__( 'Title', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'name'     => 'title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => 
				'{{WRAPPER}} .team .team-item > .holder > .team-title .title, .team.element-five .rt_team_detail_bx h3, .team.element-seven .rt_team_detail_bx h3 , .team.element-one .team-item > .holder > .data .title , .team.element-eight .team-item .holder .team-content .team-title ,.team.element-two .rt-doctor .box-content h4 , .team.element-three h3, .team.element-four h4',
				
				
				
				
			]
		);
		$this->add_control(
			'team_time_color',
			[
				'label'     => esc_html__( 'Title color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-one .team-item > .holder > .data .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-seven .rt_team_detail_bx h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-eight .team-item .holder .team-content .team-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-two .rt-doctor .box-content h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-four h4' => 'color: {{VALUE}}',
					

					

				],
				
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_designation',
			[
				'label' => esc_html__( 'Designation', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Designation Typography', 'radiantthemes-addons' ),
				'name'     => 'designation_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => 
				    '{{WRAPPER}} .team.element-eight .team-item .holder .team-content .team-role , .team.element-two .rt-doctor .box-content .post , .team.element-three h4 ,.team.element-four h6 ',
				    
			]
		);
		$this->add_control(
			'team_designation_color',
			[
				'label'     => esc_html__( 'Designation color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-two .rt-doctor .box-content .post' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-eight .team-item .holder .team-content .team-role' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three h4' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .team.element-four h6' => 'color: {{VALUE}}',
					

				],
				
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	 public function radiantthemes_team_style_func( $atts, $content = null, $tag ) {
			$settings = settings_atts(
				array(
					'style_variation'      => 'one',
					'team_category'        => 'all',
					'team_allow_carousel'  => 'true',
					'select_category'      => '',
					'allow_nav'            => 'true',
					'navigation_style'     => 'one',
					'allow_loop'           => 'true',
					'allow_autoplay'       => 'true',
					'allow_dots'           => 'true',
					'navigation_dot_style' => 'two',
					'autoplay_timeout'     => '',
					'order'                => 'DESC',
					'order_by'             => 'date',
					'max_posts'            => -1,
					'posts_in_desktop'     => '3',
					'posts_in_tab'         => '2',
					'posts_in_mobile'      => '1',
					'team_no_row_items'    => '2',
					'team_enable_link'     => 'no',
					'add_animation'        => '',
					'rt_animation'         => 'attention_seekers',
					'attention_seekers'    => 'bounce',
					'bouncing_entrances'   => 'bounceIn',
					'bouncing_exits'       => 'bounceOut',
					'fading_entrances'     => 'fadeIn',
					'fading_exits'         => 'fadeOut',
					'flippers'             => 'flip',
					'lightspeed'           => 'lightSpeedIn',
					'rotating_entrances'   => 'rotateIn',
					'rotating_exits'       => 'rotateOut',
					'sliding_entrances'    => 'slideInUp',
					'sliding_exits'        => 'slideOutUp',
					'zoom_entrances'       => 'zoomIn',
					'zoom_exits'           => 'zoomOut',
					'specials'             => 'hinge',
					'duration'             => '2s',
					'delay'                => '0s',
					'extra_class'          => '',
					'extra_id'             => '',
				), $atts
			);
	 }
	protected function render() {
		$settings = $this->get_settings_for_display();

		$navigation_style = $settings['allow_nav'] ? 'owl-nav-style-' . esc_attr( $settings['navigation_style'] ) : '';
		$dot_style        = $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

		$team_id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';
		$output = "\r" . '<!-- team -->' . "\r";

						$time="";
							$rt_animation="";
							if($settings['add_animation'] )
							{ $time = 'data-wow-duration="'.$settings['duration'].'"';
							  $time    .= ' data-wow-delay="'.$settings['delay'].'"';

								if ( 'attention_seekers' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['attention_seekers'] ) ? esc_attr( $settings['attention_seekers'] ) : 'bounce';

						} elseif ( 'bouncing_entrances' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['bouncing_entrances'] ) ? esc_attr( $settings['bouncing_entrances'] ) : 'bounceIn';

						} elseif ( 'bouncing_exits' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['bouncing_exits'] ) ? esc_attr( $settings['bouncing_exits'] ) : 'bounceOut';

						} elseif ( 'fading_entrances' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['fading_entrances'] ) ? esc_attr( $settings['fading_entrances'] ) : 'fadeIn';

						}elseif ( 'fading_exits' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['fading_exits'] ) ? esc_attr( $settings['fading_exits'] ) : 'fadeOut';

						}elseif ( 'flippers' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['flippers'] ) ? esc_attr( $settings['flippers'] ) : 'flip';

						}elseif ( 'lightspeed' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['lightspeed'] ) ? esc_attr( $settings['lightspeed'] ) : 'lightSpeedIn';

						}elseif ( 'rotating_entrances' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['rotating_entrances'] ) ? esc_attr( $settings['rotating_entrances'] ) : 'rotateIn';

						}elseif ( 'rotating_exits' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['rotating_exits'] ) ? esc_attr( $settings['rotating_exits'] ) : 'rotateOut';


						}elseif ( 'sliding_entrances' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['sliding_entrances'] ) ? esc_attr( $settings['sliding_entrances'] ) : 'slideInUp';

						}elseif ( 'sliding_exits' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['sliding_exits'] ) ? esc_attr( $settings['sliding_exits'] ) : 'slideOutUp';

						}elseif ( 'zoom_entrances' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['zoom_entrances'] ) ? esc_attr( $settings['zoom_entrances'] ) : 'zoomIn';

						}elseif ( 'zoom_exits' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['zoom_exits'] ) ? esc_attr( $settings['zoom_exits'] ) : 'zoomOut';

						}elseif ( 'specials' === $settings['rt_animation'] ) {
						$rt_animation = isset( $settings['specials'] ) ? esc_attr( $settings['specials'] ) : 'hinge';

						}
                        $rt_animation='wow '.$rt_animation;
                        }

		if ( 'false' == $settings['team_allow_carousel'] ) {
				$output .= '<div class="team element-' . $settings['style_variation'] . ' ';
				$output .= ' ' . $settings['extra_class'] . '"  ' . $team_id;
				$output .= ' data-row-items="';
				$output .= esc_attr( $settings['team_no_row_items'] ) . '"';
				$output .= '>';
			} elseif ( 'true' == $settings['team_allow_carousel'] ) {
				//$output .= '<div class="team swiper-container element-' . $settings['style_variation'] . '  ';
				$output = '<div class="team swiper-container element-' . $settings['style_variation'] . '" data-mobile-items="'.$settings['posts_in_mobile'] . '" data-tab-items="'.$settings['posts_in_tab'] . '" data-desktop-items="'.$settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
				$output .= ' <div class="swiper-wrapper">';
			} else {
				$output .= '';
			}
			$count=0;
            if($settings['team_category'] && 'all' != $settings['team_category']){
	    	$count=count($settings['team_category']);}
			for($i=0;$i<$count;$i++)
            {	
                $c[] =  $settings['team_category'][$i] ;
            }
            
			if ( 'all' == $settings['team_category'] || '' == $settings['team_category'] ) {
			    $team_category = '';
			} else {
			    $team_category = array(
			        array(
			            'taxonomy' => 'profession',
			            'field'    => 'slug',
			            'terms'    => $c,
			        ),
			    );
			    $hidden_filter      = 'hidden';
			}
			$query = new \WP_Query(
				array(
					'post_type'      => 'doctor',
					'posts_per_page' => $settings['max_posts'],
					'order'          => $settings['order'],
					'orderby'        => $settings['order_by'],
					'tax_query'      => $team_category,
				)
			);




		if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}

		$data  = 0;
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					require 'template/template-team-item-' . $settings['style_variation'] . '.php';
				}
				wp_reset_postdata();
			} else {
				$output .= wp_kses_post('<p>No items found</p>', 'radiantthemes-addons' );
			}
			if ( 'true' == $settings['team_allow_carousel'] ) {
        		$output .= '</div>';
			}
		if ( 'true' === $settings['allow_dots'] ) {
		$output .= '<div class="swiper-pagination"></div>';
        }

			$output .= '</div>' . "\r";
			$output .= '<!-- team -->' . "\r";
			echo $output;
		?>
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _content_template() {

	}
}