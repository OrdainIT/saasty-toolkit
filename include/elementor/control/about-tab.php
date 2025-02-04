<?php




$this->start_controls_section(
    'od_about_tab_content',
    [
        'label' => esc_html__('Tab Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_about_tab_lists',
    [
        'label' => esc_html__('Tabs List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_about_tab_list_title',
                'label' => esc_html__('Tab Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_about_tab_list_description',
                'label' => esc_html__('Tab Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Description', 'ordainit-toolkit'),
            ],
            [
                'name' => 'od_about_tab_list_is_active',
                'label' => esc_html__('Active Tab', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ordainit-toolkit'),
                'label_off' => esc_html__('No', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => '',
            ],
        ],
        'default' => [
            [
                'od_about_tab_list_title' => esc_html__('Mission', 'ordainit-toolkit'),
                'od_about_tab_list_description' => esc_html__('At the heart of our mission is a commitment to...', 'ordainit-toolkit'),
                'od_about_tab_list_is_active' => 'yes',
            ],
            [
                'od_about_tab_list_title' => esc_html__('Vision', 'ordainit-toolkit'),
                'od_about_tab_list_description' => esc_html__('Our vision focuses on empowering businesses through...', 'ordainit-toolkit'),
            ],
            [
                'od_about_tab_list_title' => esc_html__('Values', 'ordainit-toolkit'),
                'od_about_tab_list_description' => esc_html__('We prioritize integrity, innovation, and collaboration...', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_about_tab_list_title }}}',
    ]
);

$this->end_controls_section();

// About Tab Style
$this->start_controls_section(
    'od_about_tab_style',
    [
        'label' => __('About Tab Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_about_tab_margin',
    [
        'label' => esc_html__('Tab Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => 0,
            'right' => 0,
            'bottom' => 30,
            'left' => 0,
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'od_about_tab_btn_heading',
    [
        'label' => esc_html__('Tab Button Style', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);


$this->start_controls_tabs(
    'od_about_tab_btn_style_tabs'
);

$this->start_controls_tab(
    'od_about_tab_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_about_tab_btn_style_normal_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'od_about_tab_btn_style_normal_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_about_tab_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover/Active', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_about_tab_btn_style_hover_color',
    [
        'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-button ul li button.active' => 'color: {{VALUE}};',
            '{{WRAPPER}} .it-about-details-nav-button ul li button:hover' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_about_tab_btn_style_hover_bg_color',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-button ul li button.active' => 'background-color: {{VALUE}};',
            '{{WRAPPER}} .it-about-details-nav-button ul li button:hover' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();
$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_about_tab_btn_typography',
        'selector' => '{{WRAPPER}} .it-about-details-nav-button ul li button',
    ]
);

$this->add_control(
    'od_about_tab_btn_margin',
    [
        'label' => esc_html__('Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_about_tab_btn_padding',
    [
        'label' => esc_html__('Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    'od_about_tab_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-details-nav-content p' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_about_tab_description_typography',
        'selector' => '{{WRAPPER}} .it-about-details-nav-content p',
    ]
);


$this->end_controls_section();
