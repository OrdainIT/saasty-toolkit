<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_portfolio_box',
    [
        'label' => __('Portfolio Box', 'ordainit-toolkit'),
    ]
);

// Portfoio Title Control

$this->add_control(
    'portfolio_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Product Analysis', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Portfolio Sub Title Control

$this->add_control(
    'portfolio_subtitle',
    [
        'label' => __('Sub Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Data Research', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Portfolio Image Control

$this->add_control(
    'portfolio_image',
    [
        'label' => __('Image', 'ordainit-toolkit'),
        'type' => Controls_Manager::MEDIA,
        'default' => [
            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/project/project-2-1.jpg',
        ],
        'label_block' => true,
    ]
);



// Portfolio URL Control

$this->add_control(
    'portfolio_url',
    [
        'label' => __('URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);



$this->end_controls_section();



$this->start_controls_section(
    'od_portfolio_settings',
    [
        'label' => __('Settings', 'ordainit-toolkit'),
    ]
);

// Portfolio Fade Animation Control

$this->add_control(
    'portfolio_fade_animation',
    [
        'label' => __('Fade Animation', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => 'bottom',
        'options' => [
            'bottom' => __('Bottom', 'ordainit-toolkit'),
            'left' => __('Left', 'ordainit-toolkit'),
            'right' => __('Right', 'ordainit-toolkit'),
            'top' => __('Top', 'ordainit-toolkit'),
        ],
    ]
);

// Portfolio Delay Control

$this->add_control(
    'portfolio_delay',
    [
        'label' => __('Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => '0.3',
        'label_block' => true,
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_portfolio_box_style',
    [
        'label' => __('Box', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// portfolio box bg color

$this->add_control(
    'portfolio_box_bg_color',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-project-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

// Porfolio box overlay bg color

$this->add_control(
    'portfolio_box_overlay_bg_color',
    [
        'label' => __('Overlay Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-project-thumb::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_portfolio_box_title_style',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


// Portfolio Title Color Control

$this->add_control(
    'portfolio_title_color',
    [
        'label' => __('Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-project-content h4' => 'color: {{VALUE}}',
            '{{WRAPPER}} .border-line-black' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',

        ],
    ]
);



// title typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'portfolio_title_typography',
        'selector' => '{{WRAPPER}} .dt-project-content h4',
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_portfolio_box_subtitle_style',
    [
        'label' => __('Sub Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Sub Title Color Control

$this->add_control(
    'portfolio_subtitle_color',
    [
        'label' => __('Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-project-content span' => 'color: {{VALUE}}',
        ],
    ]
);

// Sub Title Typography Control

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'portfolio_subtitle_typography',
        'selector' => '{{WRAPPER}} .dt-project-content span',
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_portfolio_box_button_style',
    [
        'label' => __('Button', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Button BG Color Control

$this->add_control(
    'portfolio_button_bg_color',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-project-arrow a' => 'background-color: {{VALUE}}',
        ],
    ]
);

// Button Icon color Control

$this->add_control(
    'portfolio_button_icon_color',
    [
        'label' => __('Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-project-arrow a' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_section();
