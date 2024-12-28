<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_funfact_layout',
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
    'od_funfact_section',
    [
        'label' => esc_html__('Fun Facts', 'ordainit-toolkit'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'od_funfact_lists',
    [
        'label' => esc_html__('Repeater List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_funfact_number',
                'label' => esc_html__('Number', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('0', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_funfact_suffix',
                'label' => esc_html__('Suffix', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('m', 'ordainit-toolkit'),
            ],
            [
                'name' => 'od_funfact_description',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_funfact_prefix',
                'label' => esc_html__('Prefix', 'ordainit-toolkit'),
                'description' => esc_html__('It will works only for layout 3'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$', 'ordainit-toolkit'),
            ],
        ],
        'default' => [
            [
                'od_funfact_number' => esc_html__('90', 'ordainit-toolkit'),
                'od_funfact_suffix' => esc_html__('%', 'ordainit-toolkit'),
                'od_funfact_description' => esc_html__('Powerful customization', 'ordainit-toolkit'),
            ],
            [
                'od_funfact_number' => esc_html__('125', 'ordainit-toolkit'),
                'od_funfact_suffix' => esc_html__('+', 'ordainit-toolkit'),
                'od_funfact_description' => esc_html__('Project Completed', 'ordainit-toolkit'),
            ],
            [
                'od_funfact_number' => esc_html__('2', 'ordainit-toolkit'),
                'od_funfact_suffix' => esc_html__('X', 'ordainit-toolkit'),
                'od_funfact_description' => esc_html__('Faster development', 'ordainit-toolkit'),
            ],
            [
                'od_funfact_number' => esc_html__('50', 'ordainit-toolkit'),
                'od_funfact_suffix' => esc_html__('+', 'ordainit-toolkit'),
                'od_funfact_description' => esc_html__('Winning Award', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_funfact_description }}}',
    ]
);

$this->end_controls_section();


// Funfact Style
$this->start_controls_section(
    'od_funfact_style',
    [
        'label' => __('Funfact Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_funfact_bg_color',
    [
        'label' => esc_html__('Fun Fact BG', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .theme-2-bg' => 'background: {{VALUE}}',
            '{{WRAPPER}} .pg-funfact-style-2 .dt-funfact-bg' => 'background: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2'],
        ],
    ]
);

$this->add_control(
    'od_funfact_after_bg_color',
    [
        'label' => esc_html__('Fun Fact After BG', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-bg::after' => 'background: {{VALUE}}',
            '{{WRAPPER}} .pg-funfact-style-2 .dt-funfact-bg::after' => 'background: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2'],
        ],
    ]
);

$this->add_control(
    'od_funfact_border_color',
    [
        'label' => esc_html__('Border Right Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-item.border-right::after' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2'],
        ],
    ]
);

$this->add_control(
    'od_funfact_margin',
    [
        'label' => esc_html__('Fun Fact Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .pg-funfact-style' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_funfact_padding',
    [
        'label' => esc_html__('Fun Fact Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .pg-funfact-style-2 .dt-funfact-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .pg-funfact-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();

// Funfact Style
$this->start_controls_section(
    'od_funfact_content_style',
    [
        'label' => __('Funfact Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_funfact_number_color',
    [
        'label' => esc_html__('Number Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-item h5' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Number Typography', 'ordainit-toolkit'),
        'name' => 'od_funfact_number_typography',
        'selector' => '{{WRAPPER}} .dt-funfact-item h5',
    ]
);

$this->add_control(
    'od_funfact_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-item p' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2'],
        ],
    ]
);

$this->add_control(
    'od_funfact_description_gradient',
    [
        'label' => esc_html__('Description Gradient Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_funfact_gradient_start_color',
    [
        'label' => esc_html__('Gradient Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-item p' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_funfact_gradient_end_color.VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_funfact_gradient_end_color',
    [
        'label' => esc_html__('Gradient End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-item p' => 'background: linear-gradient(90deg, {{od_funfact_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_funfact_description_typography',
        'selector' => '{{WRAPPER}} .dt-funfact-item p',
    ]
);

$this->end_controls_section();
