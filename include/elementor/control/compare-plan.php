<?php

use Elementor\Controls_Manager;

// Compare Heading
$this->start_controls_section(
    'od_compare_plan_heading_section',
    [
        'label' => __('Plan Heading', 'my-elementor-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_1',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Essentials', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_2',
    [
        'label' => esc_html__('Title - 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Free', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_3',
    [
        'label' => esc_html__('Title - 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Starter', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_4',
    [
        'label' => esc_html__('Title - 4', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Premium', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_5',
    [
        'label' => esc_html__('Title - 5', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Enterprise', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Compare items
$this->start_controls_section(
    'od_compare_plan_section',
    [
        'label' => __('Plan Content', 'my-elementor-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'od_compare_plan_info_icon_show',
    [
        'label' => esc_html__('Show Info Icon', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'od_compare_lists',
    [
        'label' => esc_html__('Plan List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_compare_list_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_compare_list_item_1',
                'label' => esc_html__('Item 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('item-1', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Put you text / svg / icon here', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_compare_list_item_2',
                'label' => esc_html__('Item 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('item-2', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Put you text / svg / icon here', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_compare_list_item_3',
                'label' => esc_html__('Item 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('item-3', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Put you text / svg / icon here', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_compare_list_item_4',
                'label' => esc_html__('Item 4', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('item-4', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Put you text / svg / icon here', 'ordainit-toolkit'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_compare_list_title' => esc_html__('Send invoices and quotes', 'ordainit-toolkit'),
                'od_compare_list_item_1' => esc_html__('1', 'ordainit-toolkit'),
                'od_compare_list_item_2' => esc_html__('Up TO 15', 'ordainit-toolkit'),
                'od_compare_list_item_3' => esc_html__('Up TO 15', 'ordainit-toolkit'),
                'od_compare_list_item_4' => esc_html__('Unlimited', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_compare_list_title }}}',
    ]
);

$this->end_controls_section();

// Style Starts
$this->start_controls_section(
    'od_compare_plan_style',
    [
        'label' => __('Plan Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_compare_plan_bg_color',
    [
        'label' => esc_html__('Plan Item BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-top-box' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-plan-height:nth-child(2n)' => 'background-color: {{VALUE}}',
        ],
    ]
);


$this->end_controls_section();

// Style Starts
$this->start_controls_section(
    'od_compare_plan_heading_title_1_style',
    [
        'label' => __('Heading Title - 1 Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_1_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_compare_plan_heading_title_1_typography',
        'selector' => '{{WRAPPER}} .it-plan-title',
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_compare_plan_heading_title_2_style',
    [
        'label' => __('Heading Title - 2 Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_2_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:first-child span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_2_gradient_start_color',
    [
        'label' => esc_html__('Title BG Gradient Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#0BCF77',
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:first-child span' => 'background: linear-gradient(to right, {{VALUE}} 0%, {{od_compare_plan_heading_title_2_gradient_end_color.VALUE}} 100%);',
        ],
    ]
);
$this->add_control(
    'od_compare_plan_heading_title_2_gradient_end_color',
    [
        'label' => esc_html__('Title BG Gradient End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#69D619',
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:first-child span' => 'background: linear-gradient(to right, {{od_compare_plan_heading_title_2_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_compare_plan_heading_title_2_typography',
        'selector' => '{{WRAPPER}} .it-plan-head ul li:first-child span',
    ]
);

$this->end_controls_section();

// Title -3
$this->start_controls_section(
    'od_compare_plan_heading_title_3_style',
    [
        'label' => __('Heading Title - 3 Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_3_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:nth-child(2) span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_3_bg_color',
    [
        'label' => esc_html__('Title BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:nth-child(2) span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_compare_plan_heading_title_3_typography',
        'selector' => '{{WRAPPER}} .it-plan-head ul li:nth-child(2) span',
    ]
);

$this->end_controls_section();

// Title -4
$this->start_controls_section(
    'od_compare_plan_heading_title_4_style',
    [
        'label' => __('Heading Title - 4 Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_4_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:nth-child(3) span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_4_bg_color',
    [
        'label' => esc_html__('Title BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:nth-child(3) span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_compare_plan_heading_title_4_typography',
        'selector' => '{{WRAPPER}} .it-plan-head ul li:nth-child(3) span',
    ]
);

$this->end_controls_section();

// Title - 5
$this->start_controls_section(
    'od_compare_plan_heading_title_5_style',
    [
        'label' => __('Heading Title - 5 Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_5_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:nth-child(4) span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_compare_plan_heading_title_5_bg_color',
    [
        'label' => esc_html__('Title BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-head ul li:nth-child(4) span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_compare_plan_heading_title_5_typography',
        'selector' => '{{WRAPPER}} .it-plan-head ul li:nth-child(4) span',
    ]
);

$this->end_controls_section();

// Plan Items Style
$this->start_controls_section(
    'od_compare_plan_content_style',
    [
        'label' => __('Plan Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_compare_plan_item_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-bottom-title-sm' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_compare_plan_item_title_typography',
        'selector' => '{{WRAPPER}} .it-plan-bottom-title-sm',
    ]
);

$this->add_control(
    'hr_3',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_control(
    'od_compare_plan_item_info_icon_color',
    [
        'label' => esc_html__('Info Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-bottom-title span svg path' => 'fill: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_control(
    'od_compare_plan_item_color',
    [
        'label' => esc_html__('Items Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-bottom ul li span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Items Typography', 'ordainit-toolkit'),
        'name' => 'od_compare_plan_item_typography',
        'selector' => '{{WRAPPER}} .it-plan-bottom ul li span',
    ]
);

$this->add_control(
    'od_compare_plan_item_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-plan-bottom ul li span svg circle' => 'stroke: {{VALUE}}',
            '{{WRAPPER}} .it-plan-bottom ul li span svg path' => 'stroke: {{VALUE}}',
        ],
    ]
);


$this->end_controls_section();
