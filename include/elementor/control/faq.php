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
    'od_faq_content',
    [
        'label' => __('Accordion Lists', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_faq_items',
    [
        'label' => __('Accordion Item', 'ordainit-toolkit'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_faq_title',
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Accordion Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_faq_content',
                'label' => __('Content', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => od_kses('Accordion Content', 'ordainit-toolkit'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_faq_title' => esc_html__('Accordion Title 1', 'ordainit-toolkit'),
                'od_faq_content' => od_kses('Accordion Content 1', 'ordainit-toolkit'),
            ],
            [
                'od_faq_title' => esc_html__('Accordion Title 2', 'ordainit-toolkit'),
                'od_faq_content' => od_kses('Accordion Content 2', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{od_faq_title}}',
    ]
);



$this->end_controls_section();





$this->start_controls_section(
    'od{_faq_style',
    [
        'label' => __('Accordion Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// accordion bg color

$this->add_control(
    'od_faq_bg_color',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-items' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-items' => 'background-color: {{VALUE}}',
        ],
    ]
);

// accordion border control for sytle layout-2

$this->add_control(
    'od_faq_border_color',
    [
        'label' => __('Border Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-items' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => 'layout-2',
        ],
    ]
);

// accordion title color

$this->add_control(
    'od_faq_title_color',
    [
        'label' => __('Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons' => 'color: {{VALUE}}',
        ],
    ]
);

// title active color 

$this->add_control(
    'od_faq_title_active_color',
    [
        'label' => esc_html__('Title Active Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'condition' => [
            'od_design_style' => 'layout-1',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons:not(.collapsed)' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons:not(.collapsed)' => 'color: {{VALUE}}',
        ],
    ]
);

// title Gradient color

$this->add_control(
    'od_faq_title_gradient_start_color',
    [
        'label' => esc_html__('Gradient Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'condition' => [
            'od_design_style' => 'layout-2',
        ],
        'selectors' => [
            '{{WRAPPER}} .od-custom-accordion2.pg-custom-accordion .accordion-buttons:not(.collapsed)' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_faq_title_gradient_end_color.VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
    ]
);

$this->add_control(
    'od_faq_title_gradient_end_color',
    [
        'label' => esc_html__('Gradient End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'condition' => [
            'od_design_style' => 'layout-2',
        ],
        'selectors' => [
            '{{WRAPPER}} .od-custom-accordion2.pg-custom-accordion .accordion-buttons:not(.collapsed)' => 'background: linear-gradient(90deg, {{od_faq_title_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
    ]
);

// accordion title typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_faq_title_typography',
        'label' => __('Title Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .it-custom-accordion .accordion-buttons, {{WRAPPER}} .pg-custom-accordion .accordion-buttons',
    ]
);

// accordion title margin

$this->add_responsive_control(
    'od_faq_title_margin',
    [
        'label' => __('Title Margin', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

// accordion title padding

$this->add_responsive_control(
    'od_faq_title_padding',
    [
        'label' => __('Title Padding', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'default' => [
            'top' => '29',
            'right' => '50',
            'bottom' => '29',
            'left' => '',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

// accordion content color

$this->add_control(
    'od_faq_content_color',
    [
        'label' => __('Content Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-body p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-body p' => 'color: {{VALUE}}',
        ],
    ]
);

// accordion content typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_faq_content_typography',
        'label' => __('Content Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .it-custom-accordion .accordion-body p, {{WRAPPER}} .pg-custom-accordion .accordion-body p',
    ]
);


// accordion content margin

$this->add_responsive_control(
    'od_faq_content_margin',
    [
        'label' => __('Content Margin', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'default' => [
            'top' => '0',
            'right' => '50',
            'bottom' => '0',
            'left' => '0',
            'unit' => 'px',
        ],
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .it-custom-accordion .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

// accordion content padding

$this->add_responsive_control(
    'od_faq_content_padding',
    [
        'label' => __('Content Padding', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            '{{WRAPPER}} .it-custom-accordion .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

// accordion icon heading control

$this->add_control(
    'od_faq_icon_heading',
    [
        'label' => __('Accordion Icon', 'ordainit-toolkit'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

// accordion icon tabs control

$this->start_controls_tabs(
    'od_faq_icon_tabs'
);

// accordion icon normal tab

$this->start_controls_tab(
    'od_faq_icon_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// accordion icon color

$this->add_control(
    'od_faq_icon_color',
    [
        'label' => __('Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons.collapsed::after' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons.collapsed::after' => 'color: {{VALUE}}',
            '{{WRAPPER}} ' => 'color: {{VALUE}}',
        ],
    ]
);

// accordion icon border color for layoyt-2

$this->add_control(
    'od_faq_icon_border_color',
    [
        'label' => __('Icon Border Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons.collapsed::after' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => 'layout-2',
        ],
    ]
);

// accordion icon background color

$this->add_control(
    'od_faq_icon_bg_color',
    [
        'label' => __('Icon Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons.collapsed::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons.collapsed::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end accordion icon normal tab

$this->end_controls_tab();

// accordion icon active tab

$this->start_controls_tab(
    'od_faq_icon_active_tab',
    [
        'label' => __('Active', 'ordainit-toolkit'),
    ]
);

// accordion icon active color

$this->add_control(
    'od_faq_icon_active_color',
    [
        'label' => __('Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons::after' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons::after' => 'color: {{VALUE}}',
        ],
    ]
);

// accordion icon border color for layout-2

$this->add_control(
    'od_faq_icon_active_border_color',
    [
        'label' => __('Icon Border Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons::after' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => 'layout-2',
        ],
    ]
);

// accordion icon active background color

$this->add_control(
    'od_faq_icon_active_bg_color',
    [
        'label' => __('Icon Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-custom-accordion .accordion-buttons::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end accordion icon active tab

$this->end_controls_tab();

// end accordion icon tabs control

$this->end_controls_tabs();


$this->end_controls_section();
