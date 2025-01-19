<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_single_funfact_layout',
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

$this->start_controls_section(
    'od_single_funfact_content',
    [
        'label' => __('Fun Fact Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_single_funfact_number',
    [
        'label' => esc_html__('Number', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('121', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_single_funfact_suffix',
    [
        'label' => esc_html__('Suffix', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('+', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_single_funfact_description',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Description', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();



// Funfact Style
$this->start_controls_section(
    'od_single_funfact_style',
    [
        'label' => __('Funfact Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_SINGLE_funfact_bG_color',
    [
        'label' => esc_html__('Fun Fact bg Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-choose-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_single_funfact_margin',
    [
        'label' => esc_html__('Fun Fact Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
            '{{WRAPPER}} .seo-choose-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_single_funfact_padding',
    [
        'label' => esc_html__('Fun Fact Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
            '{{WRAPPER}} .seo-choose-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();

// Funfact Style
$this->start_controls_section(
    'od_single_funfact_content_style',
    [
        'label' => __('Funfact Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_single_funfact_number_color',
    [
        'label' => esc_html__('Number Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-about-funfact-item h5' => 'color: {{VALUE}}',
            '{{WRAPPER}} .seo-choose-item span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Number Typography', 'ordainit-toolkit'),
        'name' => 'od_single_funfact_number_typography',
        'selector' => '
            {{WRAPPER}} .ss-about-funfact-item h5,
            {{WRAPPER}} .seo-choose-item span
        ',
    ]
);


$this->add_control(
    'od_single_funfact_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-about-funfact-item span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .seo-choose-item p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_single_funfact_description_typography',
        'selector' => '
            {{WRAPPER}} .ss-about-funfact-item span,
            {{WRAPPER}} .seo-choose-item p
        ',
    ]
);

$this->end_controls_section();
