<?php

use Elementor\Controls_Manager;

// Brand Area Starts
$this->start_controls_section(
    'od_brand_full_heading_section',
    [
        'label' => __('Brand Heading Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_full_heading_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Brand Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_brand_full_heading_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Brand Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_brand_full_heading_btn_text',
    [
        'label' => __('Btn Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Button Text', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type btn text here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_brand_full_heading_btn_url',
    [
        'label' => __('Btn Url', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type btn url here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_brand_full_heading_shape_image',
    [
        'label' => esc_html__('Choose Shape Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

$this->end_controls_section();

// Brand Area Starts
$this->start_controls_section(
    'od_brand_full_section',
    [
        'label' => __('Brand Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_full_lists',
    [
        'label' => esc_html__('Brand List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_brand_full_list_thumbnail',
                'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ],
        ],
        'default' => [
            [
                'od_brand_full_list_thumbnail' => esc_url('od_brand_full_list_thumbnail', 'ordainit-toolkit'),
            ],

        ],
        'title_field' => 'Brand',
    ]
);

$this->end_controls_section();


// Brand Area 2 Starts
$this->start_controls_section(
    'od_brand_full_section_2',
    [
        'label' => __('Brand Content 2', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_full_2_lists',
    [
        'label' => esc_html__('Brand 2 List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_brand_full_2_list_thumbnail',
                'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ],
        ],
        'default' => [
            [
                'od_brand_full_2_list_thumbnail' => esc_url('od_brand_full_2_list_thumbnail', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => 'Brand_2',
    ]
);

$this->end_controls_section();


// Brand Slider settings
$this->start_controls_section(
    'od_brand_full_slider_settings',
    [
        'label' => __('Brand Slider Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_full_slider_autoplay',
    [
        'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();


// Brand Style
$this->start_controls_section(
    'od_brand_full_style',
    [
        'label' => __('Brand Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_brand_gradient_direction',
    [
        'label' => esc_html__('Gradient Direction', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '180deg',
        'options' => [
            '0deg' => esc_html__('Top to Bottom', 'ordainit-toolkit'),
            '90deg' => esc_html__('Left to Right', 'ordainit-toolkit'),
            '180deg' => esc_html__('Bottom to Top', 'ordainit-toolkit'),
            '270deg' => esc_html__('Right to Left', 'ordainit-toolkit'),
        ],
    ]
);

$this->add_control(
    'od_brand_gradient_start_color',
    [
        'label' => esc_html__('Gradient Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#f1f5ff',
        'selectors' => [
            '{{WRAPPER}} .cr-brand-bg' => 'background: linear-gradient({{od_brand_gradient_direction.VALUE}}, {{VALUE}} 0%, {{od_brand_gradient_end_color.VALUE}} 100%);',
        ],
    ]
);

$this->add_control(
    'od_brand_gradient_end_color',
    [
        'label' => esc_html__('Gradient End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => 'rgba(241, 245, 255, 0)',
        'selectors' => [
            '{{WRAPPER}} .cr-brand-bg' => 'background: linear-gradient({{od_brand_gradient_direction.VALUE}}, {{od_brand_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
        ],
    ]
);

$this->end_controls_section();

// Brand Style
$this->start_controls_section(
    'od_brand_full_content_style',
    [
        'label' => __('Brand Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_brand_slider_full_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-section-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_brand_slider_full_title_typography',
        'selector' => '
            {{WRAPPER}} .cr-section-title 
        ',
    ]
);

$this->add_control(
    'od_brand_slider_full_subtitle_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-section-subtitle' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_brand_slider_full_subtitle_typography',
        'selector' => '
            {{WRAPPER}} .cr-section-subtitle
        ',
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);


// Button
$this->start_controls_tabs(
    'od_brand_slider_full_btn_style_tabs'
);

// Normal
$this->start_controls_tab(
    'od_brand_slider_full_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_slider_full_btn_style_normal_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-btn' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_brand_slider_full_btn_style_normal_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_brand_slider_full_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_slider_full_btn_style_hover_color',
    [
        'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-btn:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_brand_slider_full_btn_style_hover_bgcolor',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-btn::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();
$this->end_controls_tabs();

$this->add_control(
    'hr_2',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_brand_slider_full_btn_typography',
        'selector' => '
        {{WRAPPER}} .cr-btn
        ',
    ]
);

$this->end_controls_section();
