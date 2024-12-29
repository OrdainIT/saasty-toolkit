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
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();


// Content
$this->start_controls_section(
    'od_card_box_content',
    [
        'label' => __('Card Box Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_card_box_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Od Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_card_box_subtitle',
    [
        'label' => esc_html__('Subtitle', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Od Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_card_box_number',
    [
        'label' => esc_html__('Number', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('01', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type work number here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);


$this->end_controls_section();
