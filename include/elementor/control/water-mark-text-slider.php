<?php

use Elementor\Controls_Manager;

// Content
$this->start_controls_section(
    'od_water_mark_slider_content',
    [
        'label' => __('Water Mark Slider Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_water_mark_slider_lists',
    [
        'label' => esc_html__('Text Slider Items', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_water_mark_slider_list_text',
                'label' => esc_html__('Slider Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_water_mark_slider_list_image',
                'label' => esc_html__('Slider Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ],
        ],
        'default' => [
            [
                'od_water_mark_slider_list_text' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
            ],
            [
                'od_water_mark_slider_list_text' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
            ],
            [
                'od_water_mark_slider_list_text' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_water_mark_slider_list_text }}}',
    ]
);


$this->end_controls_section();


// Style
$this->start_controls_section(
    'od_water_mark_slider_style',
    [
        'label' => __('Water Mark Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_water_mark_slider_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-text-slider-item span' => '-webkit-text-stroke: 1px {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Text Typography', 'ordainit-toolkit'),
        'name' => 'od_water_mark_slider_text_typography',
        'selector' => '{{WRAPPER}} .it-text-slider-item span',
    ]
);

$this->add_control(
    'od_water_mark_slider_margin',
    [
        'label' => esc_html__('Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
            '{{WRAPPER}} .it-text-slider-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_water_mark_slider_padding',
    [
        'label' => esc_html__('Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => 30,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-text-slider-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->end_controls_section();
