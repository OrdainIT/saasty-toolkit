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
    'od_card_box_description',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Od Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your description here', 'ordainit-toolkit'),
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
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_card_box_icon',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => od_kses('', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Put icon here here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);



$this->end_controls_section();

// Animation Section
$this->start_controls_section(
    'od_card_box_animation',
    [
        'label' => __('Animation', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_card_box_animation_fade_from',
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
    'od_card_box_animation_delay',
    [
        'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('0.3', 'ordainit-toolkit'),
        'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();


// Card Box Style
$this->start_controls_section(
    'od_card_box_style',
    [
        'label' => __('Card Box Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_card_box_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-work-item-box::before' => 'background: {{VALUE}}',
            '{{WRAPPER}} .ss-work-item-box::after' => 'background: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_card_box_bg_hover_color',
    [
        'label' => esc_html__('BG Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-work-item-box:hover::before' => 'background: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();


// Card Box Style
$this->start_controls_section(
    'od_card_box_content_style',
    [
        'label' => __('Card Box Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_card_box_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-work-item-content span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ma-marketing-2-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_card_box_title_typography',
        'selector' => '{{WRAPPER}} .ss-work-item-content span, {{WRAPPER}} .ma-marketing-2-title',
    ]
);

$this->add_control(
    'od_card_box_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-work-item-content p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ma-marketing-2-content p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_card_box_description_typography',
        'selector' => '{{WRAPPER}} .ss-work-item-content p, {{WRAPPER}} .ma-marketing-2-content p',
    ]
);

$this->add_control(
    'od_card_box_number_color',
    [
        'label' => esc_html__('Number Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-work-item-number' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_card_box_icon_style',
    [
        'label' => __('Icon Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->start_controls_tabs(
    'od_card_box_icon_style_tabs'
);

$this->start_controls_tab(
    'od_card_box_icon_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_card_box_icon_style_normal_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ma-marketing-2-icon' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_card_box_icon_style_normal_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ma-marketing-2-icon' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_card_box_icon_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_card_box_icon_style_hover_color',
    [
        'label' => esc_html__('Icon Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ma-marketing-2-content-box:hover .ma-marketing-2-icon' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_card_box_icon_style_hover_bg_color',
    [
        'label' => esc_html__('Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ma-marketing-2-content-box:hover .ma-marketing-2-icon' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();
$this->end_controls_tabs();

$this->end_controls_section();
