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
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/shape/marketing-8-2.png',
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
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/integration/integration-4-3.png',
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
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/integration/integration-4-8.png',
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
    'od_brand_full_bg_gradient',
    [
        'label' => esc_html__('Brand BG Gradient', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'rows' => '3',
        'default' => 'linear-gradient(180deg, #f1f5ff 0%, rgba(241, 245, 255, 0) 100%)',
        'selectors' => [
            '{{WRAPPER}} .cr-brand-bg' => 'background: {{VALUE}}',
        ],
        'label_block' => true,
    ]
);

$this->add_control(
    'hr_4',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
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
