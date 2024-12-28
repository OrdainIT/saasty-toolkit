<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_video_popup_content',
    [
        'label' => __('Popup Video Content', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_video_popup_thumbnail_image',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

$this->add_control(
    'od_video_popup_url',
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


$this->end_controls_section();


// Animation Section
$this->start_controls_section(
    'od_video_popup_animation',
    [
        'label' => __('Popup Animation', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_video_popup_animation_fade_from',
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
    'od_video_popup_animation_delay',
    [
        'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('0.3', 'ordainit-toolkit'),
        'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();


// Style

$this->start_controls_section(
    'od_video_popup_style',
    [
        'label' => __('Popup Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_video_popup_overlay_color',
    [
        'label' => esc_html__('Overlay Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-video-inner-item::after' => 'background: {{VALUE}}',
        ],
    ]
);


$this->add_control(
    'od_video_popup_border_radius',
    [
        'label' => __('Border Radius', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
            '{{WRAPPER}} .it-video-inner-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .it-video-inner-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_video_popup_btn_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-video-inner-item:hover .cr-video-btn svg path' => 'fill: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_video_popup_btn_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-video-inner-item:hover .cr-video-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_video_popup_btn_animation_color',
    [
        'label' => __('Animation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => 'rgba(255, 255, 255, 0.2)',
        'selectors' => [
            '{{WRAPPER}} .cr-video-btn' => '--animation-color: {{VALUE}};',
        ],
    ]
);


$this->end_controls_section();
