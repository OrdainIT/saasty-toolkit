<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_single_price_box_section_content',
    [
        'label' => __('Content', 'ordainit-toolkit'),
    ]
);

// price box package title control

$this->add_control(
    'single_price_box_package_title',
    [
        'label' => __('Package Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Standard', 'ordainit-toolkit'),
        'label_block' => true,
    ]

);

// price box package price control

$this->add_control(
    'single_price_box_package_price',
    [
        'label' => __('Package Price', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('$19.99', 'ordainit-toolkit'),
        'label_block' => true,
    ]

);

// price box package features control

$this->add_control(
    'single_price_box_package_features',
    [
        'label' => __('Package Features', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => od_kses('Feature Item', 'ordainit-toolkit'),
        'label_block' => true,
    ]

);

// Description control

$this->add_control(
    'single_price_box_package_description',
    [
        'label' => __('Package Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => od_kses('Feature Item', 'ordainit-toolkit'),
        'label_block' => true,
    ]

);

// Button control

$this->add_control(
    'single_price_box_package_button',
    [
        'label' => __('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Get Started Now', 'ordainit-toolkit'),
        'label_block' => true,
    ]

);



// Button Shap Media control

$this->add_control(
    'single_price_box_package_shape_image',
    [
        'label' => esc_html__('Shap Image', 'textdomain'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

// Button URL control Text Field


$this->add_control(
    'single_price_box_package_button_url',
    [
        'label' => __('Button UrL', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('#', 'ordainit-toolkit'),
        'label_block' => true,
    ]

);




$this->end_controls_section();



$this->start_controls_section(
    'od_single_price_box_section_settings',
    [
        'label' => __('Settings', 'ordainit-toolkit'),
    ]
);

// Fade Animation control

$this->add_control(
    'od_single_price_box_fade_animation',
    [
        'label' => __('Fade Animation', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => 'bottom',
        'options' => [
            'bottom' => __('Bottom', 'ordainit-toolkit'),
            'top' => __('Top', 'ordainit-toolkit'),
            'left' => __('Left', 'ordainit-toolkit'),
            'right' => __('Right', 'ordainit-toolkit'),
        ],
    ]

);

// Delay control

$this->add_control(
    'od_single_price_box_delay',
    [
        'label' => __('Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => '0.3',
        'label_block' => true,
    ]

);



$this->end_controls_section();

$this->start_controls_section(
    'section_style',
    [
        'label' => __('Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'text_transform',
    [
        'label' => __('Text Transform', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => '',
        'options' => [
            '' => __('None', 'ordainit-toolkit'),
            'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
            'lowercase' => __('lowercase', 'ordainit-toolkit'),
            'capitalize' => __('Capitalize', 'ordainit-toolkit'),
        ],
        'selectors' => [
            '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();
