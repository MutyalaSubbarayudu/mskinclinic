<?php
/**
 * Portfolio Style Addon
 *
 * @package RadiantThemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

/**
 * Class definition.
 *
 * @since 1.1.0
 */
class Radiantthemes_Style_Portfolio extends Widget_Base {

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
		return 'radiant-portfolio';
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
		return __( 'Portfolio', 'radiantthemes-addons' );
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
		return 'eicon-folder';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array(
			'radiantthemes-addons-custom',
		);
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
		    'radiantthemes-portfolio-pkgd',
		    'radiantthemes-portfolio2',
			'radiantthemes-portfolio',
			
		);
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
		return array( 'radiant-widgets-category' );
	}

	/**
	 * Get all Portfolio Custom Post Type Categories.
	 *
	 * @return array Portfolio categories.
	 */
	public function get_portfolio_categories() {
		$portfolio_terms = get_terms(
			array(
				'taxonomy'   => 'portfolio-category',
				'hide_empty' => true,
			)
		);

		$portfolio_category_array = array();
		if ( ! empty( $portfolio_terms ) ) {
			foreach ( $portfolio_terms as $portfolio_term ) {
				$portfolio_category_array[ $portfolio_term->term_id ] = $portfolio_term->name;
			}
		}

		return $portfolio_category_array;
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
			array(
				'label' => __( 'Content', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_portfolio_style',
			array(
				'label'       => esc_html__( 'Portfolio Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					
					'nine'     => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'fourteen' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'sixteen'  => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'seventeen'  => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'eightteen'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
				),
				'default'     => 'fourteen',
			)
		);

		$this->add_control(
			'radiant_portfolio_category',
			array(
				'label'       => esc_html__( 'Select Portfolio Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_portfolio_categories(),
				'description' => esc_html__( 'Display posts from a specific category. ', 'radiantthemes-addons' ),
				'multiple'    => true,
			)
		);

		$this->add_control(
			'radiant_portfolio_row_posts',
			array(
				'label'       => esc_html__( 'How many items in a row?', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Set number of posts to display in a row. ', 'radiantthemes-addons' ),
				'options'     => array(
					'two'   => esc_html__( 'Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Four', 'radiantthemes-addons' ),
				),
				'default'     => 'three',
				'condition'   => array(
					'radiant_portfolio_style' => array(
						'five',
						'eight',
						'nine',
						'twelve',
						'thirteen',
						'fourteen',
					),
				),
			)
		);
		//$this->add_control(
		//	'radiant_portfolio_filter',
		//	array(
		//		'label'        => esc_html__( 'Enable portfolioy filter?', 'radiantthemes-addons' ),
		//		'type'         => Controls_Manager::SWITCHER,
		//		'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
		//		'label_off'    => esc_html__( 'No', 'your-plugin' ),
		//		'return_value' => 'yes',
		//		'default'      => 'yes',
		//	)
		//);
		$this->add_control(
			'radiant_portfolio_max_posts',
			array(
				'label'       => esc_html__( 'How many items to show?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::NUMBER,
				'min'         => -1,
				'default'     => 7,
				'description' => esc_html__( 'Use -1 to dislay all posts.', 'radiantthemes-addons' ),
				'condition'   => array(
					'radiant_portfolio_filter' => 'no',
				),
			)
		);
		$this->add_control(
			'radiant_portfolio_filter_style',
			array(
				'label'     => esc_html__( 'Portfolioy Filter Style', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'one'   => esc_html__( 'One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Four', 'radiantthemes-addons' ),
				),
				'default'   => 'one',
				'condition' => array(
					'radiant_portfolio_filter' => 'yes',
				),
			)
		);
		$this->add_control(
			'radiant_portfolio_filter_alignment',
			array(
				'label'     => esc_html__( 'Portfolioy Filter Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'left'   => esc_html__( 'Left', 'radiantthemes-addons' ),
					'right'  => esc_html__( 'Right', 'radiantthemes-addons' ),
					'center' => esc_html__( 'Center', 'radiantthemes-addons' ),

				),
				'default'   => 'center',
				'condition' => array(
					'radiant_portfolio_filter' => 'yes',
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_add_link',
			array(
				'label'        => esc_html__( 'Enable portfolio link?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'radiant_portfolio_add_zoom',
			array(
				'label'        => esc_html__( 'Enable portfolio zoom?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'radiant_portfolio_style!' => 'fourteen',
				),

			)
		);

		$this->add_control(
			'radiant_portfolio_looping_order',
			array(
				'label'   => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'date'       => esc_html__( 'Date', 'radiantthemes-addons' ),
					'ID'         => esc_html__( 'ID', 'radiantthemes-addons' ),
					'title'      => esc_html__( 'Title', 'radiantthemes-addons' ),
					'modified'   => esc_html__( 'Modified', 'radiantthemes-addons' ),
					'random'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'menu_order' => esc_html__( 'Menu order', 'radiantthemes-addons' ),
				),
				'default' => 'ID',
			)
		);

		$this->add_control(
			'radiant_portfolio_looping_sort',
			array(
				'label'   => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				),
				'default' => 'ASC',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_portofolio_general',
			array(
				'label'     => __( 'General', 'radiantthemes-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' =>
				array(
					'radiant_portfolio_style!' => 'fourteen',
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_color',
			array(
				'label'       => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Set your Portfolio Color Scheme. (If not selected, it will take default color)', 'radiantthemes-addons' ),
				'selectors'   => array(
					'{{WRAPPER}} .rt-portfolio-box.element-eleven .rt-portfolio-box-item > .holder > .data .btn' =>'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-portfolio-box.element-seventeen .rt-portfolio-box-item .text-holder' =>'background-color: {{VALUE}}',
					'{{WRAPPER}} .element-eightteen .rt-portfolio-box-item .holder .text-holder' =>'background-color: {{VALUE}}',
				),
				'default'     => '#000000',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_portfolio_title',
			array(
				'label' => esc_html__( 'Title', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .title a,
				{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item >  .data .title a , .rt-portfolio-box.element-seventeen .rt-portfolio-box-item .text-holder .text-wrapper .content-text .content-entry-title , .element-eightteen .rt-portfolio-box-item .holder .text-holder .text-wrapper .content-text .content-entry-title',
			)
		);

		$this->add_control(
			'radiant_portfolio_title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .data .title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-portfolio-box.element-seventeen .rt-portfolio-box-item .text-holder .text-wrapper .content-text .content-entry-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-eightteen .rt-portfolio-box-item .holder .text-holder .text-wrapper .content-text .content-entry-title' => 'color: {{VALUE}}',
					
					
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_portfolio_category',
			array(
				'label' => esc_html__( 'Category', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Category Typography', 'radiantthemes-addons' ),
				'name'     => 'portfolio_category_typography',
				'selector' => '{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .categories span,
				{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .data .categories span , .rt-portfolio-box.element-seventeen .rt-portfolio-box-item .text-holder .text-wrapper .content-text .content-category , .element-eightteen .rt-portfolio-box-item .holder .text-holder .text-wrapper .content-text .content-category',
			)
		);

		$this->add_control(
			'radiant_portfolio_category_color',
			array(
				'label'     => esc_html__( 'Category Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .holder > .data .categories span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-portfolio-box .rt-portfolio-box-item > .data .categories span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-portfolio-box.element-seventeen .rt-portfolio-box-item .text-holder .text-wrapper .content-text .content-category' => 'color: {{VALUE}}',
					'{{WRAPPER}} .element-eightteen .rt-portfolio-box-item .holder .text-holder .text-wrapper .content-text .content-category' => 'color: {{VALUE}}',
					
					
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_gradient_bg_add',
			array(
				'label'        => esc_html__( 'Add Overlay Gradient Background?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
				'condition'    => array(
					'radiant_portfolio_style' => 'four',
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Gradient Background Type', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'to bottom'       => esc_html__( 'To Bottom', 'radiantthemes-addons' ),
					'to top'          => esc_html__( 'To Top', 'radiantthemes-addons' ),
					'to right'        => esc_html__( 'To Right', 'radiantthemes-addons' ),
					'to left'         => esc_html__( 'To Left', 'radiantthemes-addons' ),
					'to top left'     => esc_html__( 'To Top Left', 'radiantthemes-addons' ),
					'to bottom left'  => esc_html__( 'To Bottom Left', 'radiantthemes-addons' ),
					'to top right'    => esc_html__( 'To Top Right', 'radiantthemes-addons' ),
					'to bottom right' => esc_html__( 'To Bottom Right', 'radiantthemes-addons' ),
				),
				'condition'   => array(
					'radiant_portfolio_gradient_bg_add' => 'yes',
					'radiant_portfolio_style'           => 'four',
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_portfolio_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'radiant_portfolio_gradient_bg_add' => 'yes',
					'radiant_portfolio_style'           => 'four',
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .overlay' => 'background: linear-gradient({{radiant_portfolio_gradient_bg_type.VALUE}}, {{radiant_portfolio_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(
					'radiant_portfolio_gradient_bg_add' => 'yes',
					'radiant_portfolio_style'           => 'four',
				),
			)
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
	protected function render() {
		$settings      = $this->get_settings_for_display();
		$tem           = 1;
		$hidden_filter = ( 'no' === $settings['radiant_portfolio_filter'] ) ? 'hidden' : '';
		require 'template/template-portfolio-element-' . $settings['radiant_portfolio_style'] . '.php';

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
