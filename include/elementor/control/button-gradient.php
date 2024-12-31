<?php

use Elementor\Controls_Manager;

// Button Content Section
$this->start_controls_section(
    'od_btn_content',
    [
        'label' => __('Button Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Button', 'ordainit-toolkit'),
        'title' => esc_html__('Enter button text', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_link_type',
    [
        'label' => esc_html__('Button Link Type', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            '1' => 'Custom Link',
            '2' => 'Internal Page',
        ],
        'default' => '1',
        'label_block' => true,
    ]
);

$this->add_control(
    'od_btn_link',
    [
        'label' => esc_html__('Button link', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'dynamic' => [
            'active' => true,
        ],
        'placeholder' => esc_html__('htods://your-link.com', 'ordainit-toolkit'),
        'show_external' => false,
        'default' => [
            'url' => '#',
            'is_external' => true,
            'nofollow' => true,
            'custom_attributes' => '',
        ],
        'condition' => [
            'od_btn_link_type' => '1',
        ],
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_page_link',
    [
        'label' => esc_html__('Select Button Page', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => od_get_all_pages(),
        'condition' => [
            'od_btn_link_type' => '2',
        ]
    ]
);


$this->end_controls_section();

// Button Animation Section
$this->start_controls_section(
    'od_btn_animation',
    [
        'label' => __('Button Animation', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_animation_fade_from',
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
    'od_btn_animation_ease',
    [
        'label' => __('Ease', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            '' => __('None', 'ordainit-toolkit'),
            'bounce' => __('Bounce', 'ordainit-toolkit'),

        ],
        'default' => 'bounce',
        'label_block' => true,
    ]
);

$this->add_control(
    'od_btn_animation_delay',
    [
        'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('0.3', 'ordainit-toolkit'),
        'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Style Section Starts
$this->start_controls_section(
    'od_btn_style',
    [
        'label' => __('Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_btn_margin',
    [
        'label' => esc_html__('Button Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => '20',
            'right' => '30',
            'bottom' => '20',
            'left' => '30',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_btn_padding',
    [
        'label' => esc_html__('Button Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => '20',
            'right' => '30',
            'bottom' => '20',
            'left' => '30',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Border
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'border',
        'selector' => '{{WRAPPER}} .ag-btn',
    ]
);

$this->add_control(
    'od_btn_border_radius',
    [
        'label' => esc_html__('Border Radius', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => '30',
            'right' => '30',
            'bottom' => '30',
            'left' => '30',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->start_controls_tabs(
    'od_btn_style_tabs'
);

$this->start_controls_tab(
    'od_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_normal_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_hover_color',
    [
        'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-btn:hover' => 'color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();
$this->end_controls_tabs();


$this->add_control(
    'hr_3',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);
// Button Gradient BG

$this->add_control(
    'od_btn_bg_gradient_color_1',
    [
        'label' => esc_html__('Button Gradient Bg Color 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{VALUE}}, {{od_btn_bg_gradient_color_2.VALUE}}, {{od_btn_bg_gradient_color_3.VALUE}}, {{od_btn_bg_gradient_color_4.VALUE}});',
        ],
    ]
);

$this->add_control(
    'od_btn_bg_gradient_color_2',
    [
        'label' => esc_html__('Button Gradient Bg Color 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_btn_bg_gradient_color_1.VALUE}}, {{VALUE}} , {{od_btn_bg_gradient_color_3.VALUE}}, {{od_btn_bg_gradient_color_4.VALUE}});',
        ],
    ]
);

$this->add_control(
    'od_btn_bg_gradient_color_3',
    [
        'label' => esc_html__('Button Gradient Bg Color 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_btn_bg_gradient_color_1.VALUE}}, {{od_btn_bg_gradient_color_2.VALUE}} ,{{VALUE}}, {{od_btn_bg_gradient_color_4.VALUE}});',
        ],
    ]
);
$this->add_control(
    'od_btn_bg_gradient_color_4',
    [
        'label' => esc_html__('Button Gradient Bg Color 4', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_btn_bg_gradient_color_1.VALUE}}, {{od_btn_bg_gradient_color_2.VALUE}} , {{od_btn_bg_gradient_color_3.VALUE}}, {{VALUE}});',
        ],
    ]
);

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_button_typography',
        'selector' => '{{WRAPPER}} .ag-btn',
    ]
);

$this->end_controls_section();
