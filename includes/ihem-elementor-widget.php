<?php
defined( 'ABSPATH' ) || die();

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Background;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

class IHEM_Elementor_Widget extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 */
	public function get_name() {
		return 'ihem_elementor_widget';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_html__( 'Image Hover Effects', 'ihem' );
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories() {
		return [ 'basic','general' ];
	}

	/**
	 * Get widget keywords.
	 */
	public function get_keywords() {
		return [ 'image', 'hover', 'effect', 'ihem' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 */
	public function get_style_depends() {
		return [ 'ihem-imagehover', 'ihem-ihover' ];
	}

	public $dropdown_options_1 = [
		'left_to_right' => 'Left to right',
		'right_to_left' => 'Right to left',
		'top_to_bottom' => 'Top to bottom',
		'bottom_to_top' => 'Bottom to top',
	];

	/**
	 * Register the widget controls.
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ihem' ),
			]
		);

		// title
		$this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'ihem' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Awesome Heading', 'ihem' ),
            ]
        );

		// desc
		$this->add_control(
            'desc',
            [
                'label' => esc_html__( 'Description', 'ihem' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Life is too important to be taken seriously!', 'ihem' ),
            ]
        );

		// image_arr
		$this->add_control(
		    'image_arr',
		    [
		        'label' => esc_html__( 'Image', 'ihem' ),
		        'type' => Controls_Manager::MEDIA,
		        'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
		    ]
		);

		// image_size
		$this->add_group_control(
		    Group_Control_Image_Size::get_type(),
		    [
		        'name' => 'image_size',
		        'default' => 'large',
		        'exclude' => ['custom'],
		        'separator' => 'none',
		    ]
		);

		// link to
		$this->add_control(
			'link_to',
			[
				'label' => esc_html__( 'Link To', 'ihem' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'ihem' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => true,
				],
			]
		);

		// type
		$this->add_control(
		    'type',
		    [
		        'label' => esc_html__( 'Type', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'default' => 'square',
		        'options' => [
		            'square'   => esc_html__( 'Square', 'ihem' ),
		            'circle'   => esc_html__( 'Circle', 'ihem' ),
		        ],
		    ]
		);

		//square_effect
		$this->add_control(
		    'square_effect',
		    [
		        'label' => esc_html__( 'Select Effect', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'fade' => esc_html__('fade', 'ihem'),
		        	'push-up' => esc_html__('push-up', 'ihem'),
		        	'push-down' => esc_html__('push-down', 'ihem'),
		        	'push-left' => esc_html__('push-left', 'ihem'),
		        	'push-right' => esc_html__('push-right', 'ihem'),
		        	'slide-up' => esc_html__('slide-up', 'ihem'),
		        	'slide-down' => esc_html__('slide-down', 'ihem'),
		        	'slide-left' => esc_html__('slide-left', 'ihem'),
		        	'slide-right' => esc_html__('slide-right', 'ihem'),
		        	'reveal-up' => esc_html__('reveal-up', 'ihem'),
		        	'reveal-down' => esc_html__('reveal-down', 'ihem'),
		        	'reveal-left' => esc_html__('reveal-left', 'ihem'),
		        	'reveal-right' => esc_html__('reveal-right', 'ihem'),
		        	'hinge-up' => esc_html__('hinge-up', 'ihem'),
		        	'hinge-down' => esc_html__('hinge-down', 'ihem'),
		        	'hinge-left' => esc_html__('hinge-left', 'ihem'),
		        	'hinge-right' => esc_html__('hinge-right', 'ihem'),
		        	'flip-horiz' => esc_html__('flip-horiz', 'ihem'),
		        	'flip-vert' => esc_html__('flip-vert', 'ihem'),
		        	'flip-diag-1' => esc_html__('flip-diag-1', 'ihem'),
		        	'flip-diag-2' => esc_html__('flip-diag-2', 'ihem'),
		        	'shutter-out-horiz' => esc_html__('shutter-out-horiz', 'ihem'),
		        	'shutter-out-vert' => esc_html__('shutter-out-vert', 'ihem'),
		        	'shutter-out-diag-1' => esc_html__('shutter-out-diag-1', 'ihem'),
		        	'shutter-out-diag-2' => esc_html__('shutter-out-diag-2', 'ihem'),
		        	'shutter-in-horiz' => esc_html__('shutter-in-horiz', 'ihem'),
		        	'shutter-in-vert' => esc_html__('shutter-in-vert', 'ihem'),
		        	'shutter-in-out-horiz' => esc_html__('shutter-in-out-horiz', 'ihem'),
		        	'shutter-in-out-vert' => esc_html__('shutter-in-out-vert', 'ihem'),
		        	'shutter-in-out-diag-1' => esc_html__('shutter-in-out-diag-1', 'ihem'),
		        	'shutter-in-out-diag-2' => esc_html__('shutter-in-out-diag-2', 'ihem'),
		        	'fold-up' => esc_html__('fold-up', 'ihem'),
		        	'fold-down' => esc_html__('fold-down', 'ihem'),
		        	'fold-left' => esc_html__('fold-left', 'ihem'),
		        	'fold-right' => esc_html__('fold-right', 'ihem'),
		        	'zoom-in' => esc_html__('zoom-in', 'ihem'),
		        	'zoom-out' => esc_html__('zoom-out', 'ihem'),
		        	'zoom-out-up' => esc_html__('zoom-out-up', 'ihem'),
		        	'zoom-out-down' => esc_html__('zoom-out-down', 'ihem'),
		        	'zoom-out-left' => esc_html__('zoom-out-left', 'ihem'),
		        	'zoom-out-right' => esc_html__('zoom-out-right', 'ihem'),
		        	'zoom-out-flip-horiz' => esc_html__('zoom-out-flip-horiz', 'ihem'),
		        	'zoom-out-flip-vert' => esc_html__('zoom-out-flip-vert', 'ihem'),
		        	'blur' => esc_html__('blur', 'ihem'),
		        	'_45' => esc_html__('effect 45', 'ihem'),
		        	'_46' => esc_html__('effect 46', 'ihem'),
		        	'_47' => esc_html__('effect 47', 'ihem'),
		        	'_48' => esc_html__('effect 48', 'ihem'),
		        	'_49' => esc_html__('effect 49', 'ihem'),
		        	'_50' => esc_html__('effect 50', 'ihem'),
		        	'_51' => esc_html__('effect 51', 'ihem'),
		        	'_52' => esc_html__('effect 52', 'ihem'),
		        	'_53' => esc_html__('effect 53', 'ihem'),
		        	'_54' => esc_html__('effect 54', 'ihem'),
		        	'_55' => esc_html__('effect 55', 'ihem'),
		        ],
		        'default' => 'fade',
		        'condition'	=> [
		        	'type'	=>  array('square')
		        ]
		    ]
		);

		// square_effect_45_style
		$this->add_control(
		    'square_effect_45_style',
		    [
		        'label' => esc_html__( 'Select Effect-45 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'left_and_right'	=> esc_html__('Left and right', 'ihem'),
		        	'top_to_bottom'	=> esc_html__('Top to bottom', 'ihem'),
		        	'bottom_to_top'	=> esc_html__('Bottom to top', 'ihem'),
		        ],
		        'default' => 'left_and_right',
		        'condition'	=> [
		        	'square_effect'	=>  array('_45')
		        ]
		    ]
		);

		// square_effect_47_style
		$this->add_control(
		    'square_effect_47_style',
		    [
		        'label' => esc_html__( 'Select Effect-47 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'top_to_bottom'	=> esc_html__('Top to bottom', 'ihem'),
		        	'bottom_to_top'	=> esc_html__('Bottom to top', 'ihem'),
		        ],
		        'default' => 'top_to_bottom',
		        'condition'	=> [
		        	'square_effect'	=>  array('_47')
		        ]
		    ]
		);

		// square_effect_49_style
		$this->add_control(
		    'square_effect_49_style',
		    [
		        'label' => esc_html__( 'Select Effect-49 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'left_to_right'	=> esc_html__('Left to right', 'ihem'),
		        	'right_to_left'	=> esc_html__('Right to left', 'ihem'),
		        ],
		        'default' => 'left_to_right',
		        'condition'	=> [
		        	'square_effect'	=>  array('_49')
		        ]
		    ]
		);

		// square_effect_50_style
		$this->add_control(
		    'square_effect_50_style',
		    [
		        'label' => esc_html__( 'Select Effect-50 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'from_top_and_bottom'	=> esc_html__('From top and_bottom', 'ihem'),
		        	'from_left_and_right'	=> esc_html__('From left and right', 'ihem'),
		        	'top_to_bottom'	=> esc_html__('Top to bottom', 'ihem'),
		        	'bottom_to_top'	=> esc_html__('Bottom to top', 'ihem'),
		        ],
		        'default' => 'from_top_and_bottom',
		        'condition'	=> [
		        	'square_effect'	=>  array('_50')
		        ]
		    ]
		);

		// square_effect_52_style
		$this->add_control(
		    'square_effect_52_style',
		    [
		        'label' => esc_html__( 'Select Effect-52 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'scale_up'	=>  esc_html__('Scale up', 'ihem'),
		        	'scale_down'	=> esc_html__('Scale down', 'ihem'),
		        ],
		        'default' => 'scale_up',
		        'condition'	=> [
		        	'square_effect'	=>  array('_52')
		        ]
		    ]
		);

		foreach(array('53','54','55','56','57','58','59') as $item){
			$this->add_control(
			    'square_effect_'. $item .'_style',
			    [
			        'label' => esc_html__( 'Select Effect-'. $item .' Style', 'ihem' ),
			        'type' => Controls_Manager::SELECT,
			        'options' => $this->dropdown_options_1,
			        'default' => 'left_to_right',
			        'condition'	=> [
			        	'square_effect'	=>  array( '_'.$item )
			        ]
			    ]
			);
		}

		//circle_effect
		$this->add_control(
		    'circle_effect',
		    [
		        'label' => esc_html__( 'Select Effect', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'_1'	=> 	esc_html__('Effect 1', 'ihem'),
		        	'_2'	=> 	esc_html__('Effect 2', 'ihem'),
		        	'_3'	=> 	esc_html__('Effect 3', 'ihem'),
		        	'_4'	=> 	esc_html__('Effect 4', 'ihem'),
		        	'_5'	=> 	esc_html__('Effect 5', 'ihem'),
		        	'_6'	=> 	esc_html__('Effect 6', 'ihem'),
		        	'_7'	=> 	esc_html__('Effect 7', 'ihem'),
		        	'_8'	=> 	esc_html__('Effect 8', 'ihem'),
		        	'_9'	=> 	esc_html__('Effect 9', 'ihem'),
		        ],
		        'default' => '_1',
		        'condition'	=> [
		        	'type'	=>  array('circle')
		        ]
		    ]
		);

		// square_width
		$this->add_responsive_control(
		    'square_width',
		    [
		        'label' => esc_html__( 'Width (px)', 'ihem' ),
		        'type' => Controls_Manager::NUMBER,
		        'selectors' => [
                    '{{WRAPPER}} .ihem-item.ihem-square.effect1' => 'width: {{VALUE}}px;',
                ],
                'placeholder'	=> 	'auto',
		        'default' => '350',
		        'condition'	=> [
		        	'type' => array('square'),
		        	'square_effect' => array('_45', '_48'),
		        ]
		    ]
		);

		// square_height
		$this->add_responsive_control(
		    'square_height',
		    [
		        'label' => esc_html__( 'Height (px)', 'ihem' ),
		        'type' => Controls_Manager::NUMBER,
		        'step'	=> 5,
		        'selectors' => [
                    '{{WRAPPER}} .ihem-item.ihem-square.effect1' => 'height: {{VALUE}}px;',
                ],
                'placeholder'	=> 	'auto',
		        'default' => '350',
		        'condition'	=> [
		        	'type' => array('square'),
		        	'square_effect' => array('_45', '_48'),
		        ]
		    ]
		);

		// circle_width
		$this->add_responsive_control(
		    'circle_width',
		    [
		        'label' => esc_html__( 'Width (px)', 'ihem' ),
		        'type' => Controls_Manager::NUMBER,
		        'selectors' => [
                    '{{WRAPPER}} .ihem-item.ihem-circle.effect1 .ihem-img' => 'width: {{VALUE}}px;',
                    '{{WRAPPER}} .ihem-item.ihem-circle.effect1 .ihem-info' => 'width: {{VALUE}}px;',
                ],
                'placeholder'	=> 	'auto',
		        'default' => '350',
		        'condition'	=> [
		        	'type' => array('circle'),
		        	'circle_effect' => array('_1'),
		        ]
		    ]
		);

		// circle_height
		$this->add_responsive_control(
		    'circle_height',
		    [
		        'label' => esc_html__( 'Height (px)', 'ihem' ),
		        'type' => Controls_Manager::NUMBER,
		        'step'	=> 5,
		        'selectors' => [
                    '{{WRAPPER}} .ihem-item.ihem-circle.effect1 .ihem-img' => 'height: {{VALUE}}px;',
                    '{{WRAPPER}} .ihem-item.ihem-circle.effect1 .ihem-info' => 'height: {{VALUE}}px;',
                ],
                'placeholder'	=> 	'auto',
		        'default' => '350',
		        'condition'	=> [
		        	'type' => array('circle'),
		        	'circle_effect' => array('_1'),
		        ]
		    ]
		);

		// circle_effect_1_spinner_width
		$this->add_responsive_control(
		    'circle_effect_1_spinner_width',
		    [
		        'label' => esc_html__( 'Spinner Width (px)', 'ihem' ),
		        'type' => Controls_Manager::NUMBER,
                'description'	=> 	__('This width should be 10px larger than the item width', 'ihem'),
		        'selectors' => [
                    '{{WRAPPER}} .ihem-item.ihem-circle.effect1 .spinner' => 'width: {{VALUE}}px;',
                ],
                'placeholder'	=> 	'auto',
		        'default' => '360',
		        'condition'	=> [
		        	'type' => array('circle'),
		        	'circle_effect' => array('_1'),
		        ]
		    ]
		);

		// circle_effect_1_spinner_height
		$this->add_responsive_control(
		    'circle_effect_1_spinner_height',
		    [
		        'label' => esc_html__( 'Spinner Height (px)', 'ihem' ),
		        'type' => Controls_Manager::NUMBER,
		        'step'	=> 5,
		        'description'	=> 	esc_html__('This width should be 10px larger than the item width', 'ihem'),
		        'selectors' => [
                    '{{WRAPPER}} .ihem-item.ihem-circle.effect1 .spinner' => 'height: {{VALUE}}px;',
                ],
                'placeholder'	=> 	'auto',
		        'default' => '360',
		        'condition'	=> [
		        	'type' => array('circle'),
		        	'circle_effect' => array('_1'),
		        ]
		    ]
		);

		foreach(array('2', '3', '4', '7', '8', '9', '11', '12', '14', '18') as $item){
			$this->add_control(
			    'circle_effect_'. $item .'_style',
			    [
			        'label' => esc_html__( 'Select Effect-'.$item.' Style', 'ihem' ),
			        'type' => Controls_Manager::SELECT,
			        'options' => $this->dropdown_options_1,
			        'default' => 'left_to_right',
			        'condition'	=> [
			        	'circle_effect'	=>  array( '_'.$item )
			        ]
			    ]
			);
		}
		
		// circle_effect_6_style
		$this->add_control(
		    'circle_effect_6_style',
		    [
		        'label' => esc_html__( 'Select Effect-6 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'scale_up'	=> esc_html__('scale_up', 'ihem'),
		        	'scale_down'	=> esc_html__('scale_down', 'ihem'),
		        	'scale_down_up'	=> esc_html__('scale_down_up', 'ihem'),
		        ],
		        'default' => 'scale_up',
		        'condition'	=> [
		        	'circle_effect'	=>  array('_6')
		        ]
		    ]
		);

		foreach(array('10', '20') as $item){
			$this->add_control(
			    'circle_effect_'. $item .'_style',
			    [
			        'label' => esc_html__( 'Select Effect-'. $item.' Style', 'ihem' ),
			        'type' => Controls_Manager::SELECT,
			        'options' => [
			        	'top_to_bottom'	=> esc_html__('Top to bottom', 'ihem'),
			        	'bottom_to_top'	=> esc_html__('Bottom to top', 'ihem'),
			        ],
			        'default' => 'top_to_bottom',
			        'condition'	=> [
			        	'circle_effect'	=>  array( '_'. $item )
			        ]
			    ]
			);
		}

		// circle_effect_10_position_v
		$this->add_control(
		    'circle_effect_10_position_v',
		    [
		        'label' => esc_html__( 'Inner Image Vertical  Position', 'ihem' ),
		        'description' => esc_html__( 'Control the position of inner image', 'ihem' ),
		        'type' => Controls_Manager::SLIDER,
		        'range' => [
		        	'px' => [
		        		'min' => -500,
		        		'max' => 500,
		        	],
		        ],
		        'default' => [
		        	'unit' => 'px',
		        	'size' => 50,
		        ],
		        'condition'	=> [
		        	'circle_effect'	=>  array( '_10'  )
		        ],
		        'selectors' => [
		        	'{{WRAPPER}} .ihem-item.ihem-circle.effect10 a:hover .ihem-img' => '-webkit-transform: translateY({{SIZE}}px) scale(0.5);-moz-transform: translateY({{SIZE}}px) scale(0.5);-ms-transform: translateY({{SIZE}}px) scale(0.5);-o-transform: translateY({{SIZE}}px) scale(0.5);-o-transform: translateY({{SIZE}}px) scale(0.5);
    transform: translateY({{SIZE}}px) scale(0.5);',
		        ],
		    ]
		);

		// circle_effect_13_style
		$this->add_control(
		    'circle_effect_13_style',
		    [
		        'label' => esc_html__( 'Select Effect-13 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'from_left_and_right'	=> esc_html__('From left and right', 'ihem'),
		        	'top_to_bottom'	=> esc_html__('Top to bottom', 'ihem'),
		        	'bottom_to_top'	=> esc_html__('Bottom to top', 'ihem'),
		        ],
		        'default' => 'from_left_and_right',
		        'condition'	=> [
		        	'circle_effect'	=>  array('_13')
		        ]
		    ]
		);

		// circle_effect_16_style
		$this->add_control(
		    'circle_effect_16_style',
		    [
		        'label' => esc_html__( 'Select Effect-16 Style', 'ihem' ),
		        'type' => Controls_Manager::SELECT,
		        'options' => [
		        	'left_to_right'	=> esc_html__('Left to right', 'ihem'),
		        	'right_to_left'	=> esc_html__('Right to left', 'ihem'),
		        ],
		        'default' => 'left_to_right',
		        'condition'	=> [
		        	'circle_effect'	=>  array('_16')
		        ]
		    ]
		);

		$this->end_controls_section();

		// Styling section start
		$this->start_controls_section(
			'section_styling',
			[
				'label' => esc_html__( 'General Styling', 'ihem' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'item_options',
				[
					'label' => esc_html__( 'Item Background:', 'ihem' ),
					'type' => Controls_Manager::HEADING,
				]
			);
			// item_bg_color
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'item_bg_color',
					'label' => esc_html__( 'Hover Content BG Color', 'ihem' ),
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} .ihem-imghvr:hover figcaption, {{WRAPPER}} .ihem-item a:hover .ihem-info',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label' => esc_html__( 'Title Styling', 'ihem' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			// title_bg_color
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'title_bg_color',
					'label' => esc_html__( 'BG Color', 'ihem' ),
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} .ihem-imghvr h3, {{WRAPPER}} .ihem-item.ihem-square .ihem-info h3, {{WRAPPER}} .ihem-item.ihem-circle .ihem-info h3',
				]
			);

			// title_color
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Text Color', 'ihem' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .ihem-imghvr h3' => 'color:{{VALUE}}',
						'{{WRAPPER}} .ihem-item.ihem-square .ihem-info h3' => 'color:{{VALUE}}',
						'{{WRAPPER}} .ihem-item.ihem-circle .ihem-info h3' => 'color:{{VALUE}}'
					],
				]
			);

			// title_typography
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'ihem' ),
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .ihem-imghvr h3, {{WRAPPER}} .ihem-item.ihem-square .ihem-info h3, {{WRAPPER}} .ihem-item.ihem-circle .ihem-info h3',
				]
			);

			// title_margin
			$this->add_responsive_control(
               'title_margin',
               [
                   'label' => esc_html__( 'Margin', 'ihem' ),
                   'type' => Controls_Manager::DIMENSIONS,
                   'size_units' => [ 'px', '%', 'em' ],
                   'selectors' => [
                       '{{WRAPPER}} .ihem-imghvr h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       '{{WRAPPER}} .ihem-item.ihem-square .ihem-info h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       '{{WRAPPER}} .ihem-item.ihem-circle .ihem-info h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                   ],
               ]
           );

			// title_padding
			$this->add_responsive_control(
               'title_padding',
               [
                   'label' => esc_html__( 'Padding', 'ihem' ),
                   'type' => Controls_Manager::DIMENSIONS,
                   'size_units' => [ 'px', '%', 'em' ],
                   'selectors' => [
                       '{{WRAPPER}} .ihem-imghvr h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       '{{WRAPPER}} .ihem-item.ihem-square .ihem-info h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       '{{WRAPPER}} .ihem-item.ihem-circle .ihem-info h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                   ],
               ]
           );

			// title_border
			$this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => esc_html__( 'Border', 'ihem' ),
                    'selector' => '{{WRAPPER}} .ihem-imghvr h3,{{WRAPPER}} .ihem-item.ihem-square .ihem-info h3,{{WRAPPER}} .ihem-item.ihem-circle .ihem-info h3'
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
			'desc_styling',
			[
				'label' => esc_html__( 'Desc Styling', 'ihem' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'desc_options',
				[
					'label' => esc_html__( 'Desc Options', 'ihem' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			// desc_bg_color
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'desc_bg_color',
					'label' => esc_html__( 'BG Color', 'ihem' ),
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} .ihem-imghvr p, {{WRAPPER}} .ihem-item.ihem-square .ihem-info p',
				]
			);

			// desc_color
			$this->add_control(
				'desc_color',
				[
					'label' => esc_html__( 'Desc Text Color', 'ihem' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .ihem-imghvr p' => 'color:{{VALUE}}',
						'{{WRAPPER}} .ihem-item.ihem-square .ihem-info p' => 'color:{{VALUE}}',
						'{{WRAPPER}} .ihem-item.ihem-circle .ihem-info p' => 'color:{{VALUE}}'
					],
				]
			);

			// desc_typography
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'label' => esc_html__( 'Typography', 'ihem' ),
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .ihem-imghvr p, {{WRAPPER}} .ihem-item.ihem-square .ihem-info p',
				]
			);

			// desc_margin
			$this->add_responsive_control(
               'desc_margin',
               [
                   'label' => esc_html__( 'Margin', 'ihem' ),
                   'type' => Controls_Manager::DIMENSIONS,
                   'size_units' => [ 'px', '%', 'em' ],
                   'selectors' => [
                       '{{WRAPPER}} .ihem-imghvr p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       '{{WRAPPER}} .ihem-item.ihem-square .ihem-info p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                   ],
               ]
           );

			// desc_padding
			$this->add_responsive_control(
               'desc_padding',
               [
                   'label' => esc_html__( 'Padding', 'ihem' ),
                   'type' => Controls_Manager::DIMENSIONS,
                   'size_units' => [ 'px', '%', 'em' ],
                   'selectors' => [
                       '{{WRAPPER}} .ihem-imghvr p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       '{{WRAPPER}} .ihem-item.ihem-square .ihem-info p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                   ],
               ]
           );

			// desc_border
			$this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'desc_border',
                    'label' => esc_html__( 'Border', 'ihem' ),
                    'selector' => '{{WRAPPER}} .ihem-imghvr p,{{WRAPPER}} .ihem-item.ihem-square .ihem-info p'
                ]
            );


		$this->end_controls_section();

		$this->start_controls_section(
			'circle_effect_styling',
			[
				'label' => esc_html__( 'Circle Effect Styling', 'ihem' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            // circle_effect_1_spinner_border_style
			$this->add_responsive_control(
               'circle_effect_1_spinner_border_style',
               [
                   'label' => esc_html__( 'Spinner Border Style', 'ihem' ),
                   'type' => Controls_Manager::SELECT,
                   'options' => [
	                   	'' => esc_html__( 'None', 'ihem' ),
	                   	'solid' => esc_html__( 'Solid', 'ihem' ),
	                   	'double' => esc_html__( 'Double', 'ihem' ),
	                   	'dotted' => esc_html__( 'Dotted', 'ihem' ),
	                   	'dashed' => esc_html__( 'Dashed', 'ihem' ),
	                   	'groove' => esc_html__( 'Groove', 'ihem' ),
	                ],
                   'selectors' => [
                   	'{{WRAPPER}} .ihem-item.ihem-circle.effect1 .spinner' => 'border-style: {{VALUE}};',
                   ],
                   'condition'	=> [
                   		'type'	=> 	'circle',
                   		'circle_effect'	=> 	'_1'
                   ]
               ]
           	);

           	// circle_effect_1_spinner_border_left_color
			$this->add_responsive_control(
               'circle_effect_1_spinner_border_left_color',
               [
                   'label' => esc_html__( 'Spinner Border Left Color', 'ihem' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '',
                   'selectors' => [
                   		'{{WRAPPER}} .ihem-item.ihem-circle.effect1 .spinner' => 'border-left-color: {{VALUE}};',
                   ],
                   'condition' => [
                   		'circle_effect_1_spinner_border_style!' => '',
                   ],
               ]
           	);

           	// circle_effect_1_spinner_border_top_color
			$this->add_responsive_control(
               'circle_effect_1_spinner_border_top_color',
               [
                   'label' => esc_html__( 'Spinner Border Top Color', 'ihem' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '',
                   'selectors' => [
                   		'{{WRAPPER}} .ihem-item.ihem-circle.effect1 .spinner' => 'border-top-color: {{VALUE}};',
                   ],
                   'condition' => [
                   		'circle_effect_1_spinner_border_style!' => '',
                   ],
               ]
           	);

           	// circle_effect_1_spinner_border_right_color
			$this->add_responsive_control(
               'circle_effect_1_spinner_border_right_color',
               [
                   'label' => esc_html__( 'Spinner Border Right Color', 'ihem' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '',
                   'selectors' => [
                   		'{{WRAPPER}} .ihem-item.ihem-circle.effect1 .spinner' => 'border-right-color: {{VALUE}};',
                   ],
                   'condition' => [
                   		'circle_effect_1_spinner_border_style!' => '',
                   ],
               ]
           	);

           	// circle_effect_1_spinner_border_bottom_color
			$this->add_responsive_control(
               'circle_effect_1_spinner_border_bottom_color',
               [
                   'label' => esc_html__( 'Spinner Border Bottom Color', 'ihem' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '',
                   'selectors' => [
                   		'{{WRAPPER}} .ihem-item.ihem-circle.effect1 .spinner' => 'border-bottom-color: {{VALUE}};',
                   ],
                   'condition' => [
                   		'circle_effect_1_spinner_border_style!' => '',
                   ],
               ]
           	);

           	// circle_effect_2_box_shadow
           	$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'circle_effect_2_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'ihem' ),
					'description' => esc_html__( 'Customize the circle color, size , opacity, spread etc', 'ihem' ),
					'selector' => '{{WRAPPER}} .ihem-item.ihem-circle .ihem-img:before',
					'condition' => [
							'circle_effect' => ['_2', '_3', '_4', '_7', '_8', '_9', '_11', '_12', '_14', '_16', '_18'],
					],
				]
			);

			// circle_effect_16_dot_color
			$this->add_responsive_control(
               'circle_effect_16_dot_color',
               [
                   'label' => esc_html__( 'Dot Color', 'ihem' ),
                   'type' => Controls_Manager::COLOR,
                   'default' => '',
                   'selectors' => [
                   		'{{WRAPPER}} .ihem-item.ihem-circle.effect16 .ihem-img:after' => 'background-color: {{VALUE}};',
                   ],
                   'condition' => [
                   		'circle_effect' => '_16',
                   ],
               ]
           	);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$id = substr( $this->get_id_int(), 0, 3 );

		$type = $settings['type'];
		$square_effect = $settings['square_effect'];
		$square_effect_number = str_replace('_', '', $square_effect);
		$circle_effect = $settings['circle_effect'];
		$circle_effect_number = str_replace('_', '', $settings['circle_effect']);
		$title = $settings['title'];
		$desc = $settings['desc'];
		$image = Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image_arr' );

		// link
		$link_to = $settings['link_to']['url'];
		$target = $settings['link_to']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link_to']['nofollow'] ? ' rel="nofollow"' : '';


		if($type == 'square'):
			if($square_effect_number >= 45):
				$sqr_effect = $square_effect_number - 44;

				$style_str = 'square_effect_'.$square_effect_number.'_style';
				$style = $settings[$style_str] ?  $settings[$style_str] : '';
			?>
		    	<div class="ihem-item ihem-square effect<?php echo esc_attr($sqr_effect); ?> <?php echo esc_attr($style); ?>">
		    		<?php echo '<a href="' . esc_url($link_to) . '"' . $target . $nofollow . '>'; ?>
		    	        <div class="ihem-img">
		    	        	<?php echo wp_kses_post($image); ?>
		    	        </div>
		    	        <div class="ihem-info">
		    	        	<div class="ihem-info-inner">
				    	          <h3><?php echo wp_kses_post($title); ?></h3>
				    	          <?php echo wp_kses_post(wpautop($desc)); ?>
		    	          	</div>
		    	        </div>
		        	</a>
		    	</div>
			<?php
			else:
			?>
				<figure class="ihem-imghvr ihem-imghvr-<?php echo esc_attr($square_effect); ?>">
				    <?php echo wp_kses_post($image); ?>
				    <figcaption>
				    	<h3><?php echo wp_kses_post($title); ?></h3>
				        <?php echo wp_kses_post(wpautop($desc)); ?>
				    </figcaption>
				    <?php if($link_to) { echo '<a href="' . esc_url($link_to) . '"' . $target . $nofollow . '></a>';  } ?>
				</figure>
			<?php
			endif; // square_effect_number
		else:
			$style_str = 'circle_effect_'.$circle_effect_number.'_style';
			$style = $settings[$style_str] ?  $settings[$style_str] : '';
			?>
			<div class="ihem-item ihem-circle effect<?php echo esc_attr($circle_effect_number); ?> <?php echo esc_attr($style); ?>"">
				<?php echo '<a href="' . esc_url($link_to) . '"' . $target . $nofollow . '>'; ?>
				    
				    <?php if($circle_effect_number == '1'){echo '<div class="spinner"></div>';} ?>

				    <?php if($circle_effect_number == '8'){echo ' <div class="ihem-img-container">';} ?>
				    <div class="ihem-img">
				    	<?php echo wp_kses_post($image); ?>
				    </div>
				    <?php if($circle_effect_number == '8'){echo ' </div>';} ?>

					<?php if($circle_effect_number == '8'){echo ' <div class="ihem-info-container">';} ?>
				    <div class="ihem-info">
				    	<?php if($circle_effect_number == '20' || $circle_effect_number == '5'){echo ' <div class="ihem-info-back">';} ?>
						<div class="ihem-info-inner">
				        <h3><?php echo wp_kses_post($title); ?></h3>
				        <?php echo wp_kses_post(wpautop($desc)); ?>
				        </div>

				    	<?php if($circle_effect_number == '20' || $circle_effect_number == '5'){echo ' </div>';} ?>
				    </div>
				    <?php if($circle_effect_number == '8'){echo ' </div>';} ?>
				</a>
			</div>
			<?php
		endif; // type
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new IHEM_Elementor_Widget() );