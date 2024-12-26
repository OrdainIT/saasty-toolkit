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
        'condition' => [
            'od_design_style' => 'layout-1',
        ],
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
        'condition' => [
            'od_design_style' => 'layout-1',
        ],
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
        'condition' => [
            'od_design_style' => 'layout-1',
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
            '{{WRAPPER}} .ag-portfolio-item::after' => 'background: {{VALUE}}',
        ],
    ]
);

// portfloio box border

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'portfolio_box_border',
        'selector' => '{{WRAPPER}} .ag-portfolio-item, {{WRAPPER}} .ag-portfolio-thumb, {{WRAPPER}} .ag-portfolio-thumb img ',
        'condition' => [
            'od_design_style' => 'layout-2',
        ],
    ]
);

// border radius control

$this->add_control(
    'portfolio_box_border_radius',
    [
        'label' => __('Border Radius', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%'],
        'selectors' => [
            '{{WRAPPER}} .ag-portfolio-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .ag-portfolio-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .ag-portfolio-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
            '{{WRAPPER}} .ag-portfolio-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .border-line-black' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
            '{{WRAPPER}} .border-line-white' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',

        ],
    ]
);



// title typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'portfolio_title_typography',
        'selector' => '{{WRAPPER}} .dt-project-content h4, {{WRAPPER}} .ag-portfolio-title',
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_portfolio_box_subtitle_style',
    [
        'label' => __('Sub Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => 'layout-1',
        ],
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
        'condition' => [
            'od_design_style' => 'layout-1',
        ],
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

$this->start_controls_section(
    'od_portfolio_box_button_style2',
    [
        'label' => __('Button', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => 'layout-2',
        ],
    ]
);

$this->start_controls_tabs(
    'portfolio_button_tabs'
);

$this->start_controls_tab(
    'portfolio_button_normal',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Button BG Color Control

$this->add_control(
    'portfolio_button_bg_color2',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-portfolio-arrow' => 'background-color: {{VALUE}}',
        ],
    ]
);

// Button Icon color Control

$this->add_control(
    'portfolio_button_icon_color2',
    [
        'label' => __('Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-portfolio-arrow' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'portfolio_button_hover',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Button BG Color Control

$this->add_control(
    'portfolio_button_bg_color_hover',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-portfolio-arrow:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

// Button Icon color Control

$this->add_control(
    'portfolio_button_icon_color_hover',
    [
        'label' => __('Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-portfolio-arrow:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();



$this->end_controls_section();
