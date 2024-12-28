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
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_video_btn_content',
    [
        'label' => __('Video Button Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_video_btn_url',
    [
        'label' => __('URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
        'default' => [
            'url' => '#',
        ],
    ]
);

$this->end_controls_section();

// Style
$this->start_controls_section(
    'od_video_btn_style',
    [
        'label' => __('Video Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_video_btn_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-video-box a svg path' => 'fill: {{VALUE}}',
            '{{WRAPPER}} .cr-video-btn svg path' => 'fill: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_video_btn_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-video-box a' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .cr-video-btn' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2'],
        ],
    ]
);

$this->add_control(
    'od_video_btn_bg_gradient_start_color',
    [
        'label' => esc_html__('Gradient BG Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#0bcf77',
        'selectors' => [
            '{{WRAPPER}} .ag-video-style .cr-video-btn' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_video_btn_bg_gradient_end_color.VALUE}} 100%);',
        ],
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_video_btn_bg_gradient_end_color',
    [
        'label' => esc_html__('Gradient BG End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#69d619',
        'selectors' => [
            '{{WRAPPER}} .ag-video-style .cr-video-btn' => 'background: linear-gradient(90deg, {{od_video_btn_bg_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
        ],
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_video_btn_animation_color',
    [
        'label' => __('Animation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => 'rgba(255, 255, 255, 0.2)',
        'selectors' => [
            '{{WRAPPER}} .dt-video-box a' => '--animation-color: {{VALUE}};',
            '{{WRAPPER}} .cr-video-btn' => '--animation-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();
