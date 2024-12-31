<?php

use Elementor\Controls_Manager;

// Content
$this->start_controls_section(
    'od_webgl_img_content',
    [
        'label' => __('Webgl Img Content', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_webgl_img_thumbnail',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

$this->add_control(
    'od_webgl_img_anim_thumbnail',
    [
        'label' => esc_html__('Choose Animation Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/webgl/pattern-1.jpg',
        ],
    ]
);

$this->end_controls_section();


// Style Starts
$this->start_controls_section(
    'od_webgl_img_anim_style',
    [
        'label' => __('Image Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_webgl_img_anim_border_radius',
    [
        'label' => esc_html__('Border Radius', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'selectors' => [
            '{{WRAPPER}} .it-img-anim img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .it-img-anim canvas' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_webgl_img_anim_margin',
    [
        'label' => esc_html__('Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'selectors' => [
            '{{WRAPPER}} .it-img-anim' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->end_controls_section();
