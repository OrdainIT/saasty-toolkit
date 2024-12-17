<?php

use Elementor\Controls_Manager;

// Layout
$this->start_controls_section(
    'od_cta_layout',
    [
        'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_cta_design_style',
    [
        'label' => esc_html__('Select Layout', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'layout-1' => esc_html__('Layout 1', 'ordainit-toolkit'),
            'layout-2' => esc_html__('Layout 2', 'ordainit-toolkit'),
            'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
            'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
            'layout-5' => esc_html__('Layout 5', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Background
$this->start_controls_section(
    'od_cta_section_background',
    [
        'label' => __('Background Image', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-1']
        ],
    ]

);

$this->add_control(
    'od_cta_background_image',
    [
        'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/cta/cta-bg-1-1.jpg',
        ],
    ]
);

$this->end_controls_section();

// Content
$this->start_controls_section(
    'od_cta_section_content',
    [
        'label' => __('Cta Title & Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_section_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Cta Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_cta_section_description',
    [
        'label' => __('Desvription', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Cta Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Cta Form
$this->start_controls_section(
    'od_cta_form',
    [
        'label' => __('Cta Form', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_cta_form_list',
    [
        'label'   => esc_html__('Select Form', 'odcore'),
        'type'    => Controls_Manager::SELECT,
        'default' => '0',
        'options' => $this->get_od_contact_form(),
    ]
);

$this->end_controls_section();

// Cta Form
$this->start_controls_section(
    'od_cta_link_content',
    [
        'label' => __('Cta Link Content', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_cta_link_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Already a member?', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_cta_link_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Sign In', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_cta_link_url',
    [
        'label' => __('URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type url here', 'ordainit-toolkit'),
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



$this->end_controls_section();
