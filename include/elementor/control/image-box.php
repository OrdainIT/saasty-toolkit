<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_layout',
    [
        'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_design_style',
    [
        'label' => esc_html__('Select Layout', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'layout-1' => esc_html__('Layout 1', 'ordainit-toolkit'),
            'layout-2' => esc_html__('Layout 2', 'ordainit-toolkit'),
            'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
            'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
            'default' => 'layout-1',
        ]
    ]
);

$this->end_controls_section();

// feature content style
$this->start_controls_section(
    'od_image_box_content',
    [
        'label' => __('Feature Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_image_box_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Feature Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_image_box_url',
    [
        'label' => __('URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
        'show_external' => true,
        'default' => [
            'url' => '#',
        ],
    ]
);

$this->add_control(
    'od_image_box_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Feature Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_image_box_thumbnail_image',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/service-icon.png',
        ],
    ]
);

$this->end_controls_section();

// Animation Section
$this->start_controls_section(
    'od_image_box_animation',
    [
        'label' => __('Feature Animation', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_image_box_animation_fade_from',
    [
        'label' => __('Fade From', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'top' => __('Top', 'ordainit-toolkit'),
            'bottom' => __('Bottom', 'ordainit-toolkit'),
            'left' => __('Left', 'ordainit-toolkit'),
            'right' => __('Right', 'ordainit-toolkit'),
        ],
        'default' => 'top',
        'label_block' => true,
    ]
);

$this->add_control(
    'od_image_box_animation_delay',
    [
        'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('0.3', 'ordainit-toolkit'),
        'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();
