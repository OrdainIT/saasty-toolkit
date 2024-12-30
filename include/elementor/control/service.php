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
    'od_service_section_post',
    [
        'label' => __('Post Query', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_blog_section_service_post_per_page',
    [
        'label' => esc_html__('Post Per Page', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('3', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);


$this->add_control(
    'od_categoryservice_select',
    [
        'label' => esc_html__('Select Post Category', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'multiple' => true,
        'options' => od_get_all_categories_for_service(), // Custom function to get categories
    ]
);

$this->add_control(
    'od_blog_service_orderby',
    [
        'label' => esc_html__('Order', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'DESC',
        'options' => [
            'DESC' => esc_html__('DESC', 'ordainit-toolkit'),
            'ASC' => esc_html__('ASC', 'ordainit-toolkit'),
        ],
    ]
);


$this->add_control(
    'od_service_button_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Details', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);



$this->end_controls_section();



$this->start_controls_section(
    'od_services_area_bg_style',
    [
        'label' => __('Background', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
    ]
  
);

$this->start_controls_tabs(
    'od_services_area_bg_style_tabs'
);

$this->start_controls_tab(
    'od_services_area_bg_style_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Background Color Control

$this->add_control(
    'od_services_area_bg_color',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-service-style .dt-service-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end Normal Tab

$this->end_controls_tab();

$this->start_controls_tab(
    'od_services_area_bg_style_hover_tab',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Background Hover Color Control

$this->add_control(
    'od_services_area_bg_hover_color',
    [
        'label' => __('Background Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .dt-service-item::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end Hover Tab

$this->end_controls_tab();

$this->end_controls_tabs();



$this->end_controls_section();



$this->start_controls_section(
    'od_services_area_title_style',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1'],

        ]
    ]
   

);

$this->start_controls_tabs(
    'od_services_area_title_style_tabs'
);

$this->start_controls_tab(
    'od_services_area_title_style_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Title Color Control

$this->add_control(
    'od_services_area_title_color',
    [
        'label' => __('Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-service-style .dt-service-title' => 'color: {{VALUE}}',
        ],
    ]
);

// end Normal Tab

$this->end_controls_tab();

$this->start_controls_tab(
    'od_services_area_title_style_hover_tab',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Title Hover Color Control

$this->add_control(
    'od_services_area_title_hover_color',
    [
        'label' => __('Title Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-service-style .dt-service-item:hover .dt-service-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .border-line-white' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}})',
        ],
    ]
);

// end Hover Tab

$this->end_controls_tab();

$this->end_controls_tabs();

// Title Typography Control

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_services_area_title_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .pg-service-style .dt-service-title',
    ]
);




$this->end_controls_section();


$this->start_controls_section(
    'od_services_area_description_style',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
        'tab' => Controls_Manager::TAB_STYLE,
    ]


);

$this->start_controls_tabs(
    'od_services_area_description_style_tabs'
);

$this->start_controls_tab(
    'od_services_area_description_style_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Description Color Control

$this->add_control(
    'od_services_area_description_color',
    [
        'label' => __('Description Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-content p' => 'color: {{VALUE}}',
        ],
    ]
);

// end Normal Tab

$this->end_controls_tab();

$this->start_controls_tab(
    'od_services_area_description_style_hover_tab',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Description Hover Color Control

$this->add_control(
    'od_services_area_description_hover_color',
    [
        'label' => __('Description Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-service-style .dt-service-item:hover p' => 'color: {{VALUE}}',
        ],
    ]
);

// end Hover Tab

$this->end_controls_tab();

$this->end_controls_tabs();

// Description Typography Control

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_services_area_description_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .dt-service-content p',
    ]
);



$this->end_controls_section();



$this->start_controls_section(
    'od_services_area_button_style',
    [
        'label' => __('Button', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
        'tab' => Controls_Manager::TAB_STYLE,
    ]

    


);


$this->start_controls_tabs(
    'od_services_area_button_style_tabs'
);

$this->start_controls_tab(
    'od_services_area_button_style_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Button Color Control

$this->add_control(
    'od_services_area_button_color',
    [
        'label' => __('Button Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .pg-btn' => 'color: {{VALUE}}',
        ],
    ]
);

// Button Background Color Control

$this->add_control(
    'od_services_area_button_bg_color',
    [
        'label' => __('Button Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .pg-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end Normal Tab

$this->end_controls_tab();

$this->start_controls_tab(
    'od_services_area_button_style_hover_tab',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Button Hover Color Control

$this->add_control(
    'od_services_area_button_hover_color',
    [
        'label' => __('Button Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .dt-service-item:hover .pg-btn' => 'color: {{VALUE}}',
        ],
    ]
);

// Button Hover Background Color Control

$this->add_control(
    'od_services_area_button_hover_bg_color',
    [
        'label' => __('Button Hover Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .dt-service-item:hover .pg-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end Hover Tab

$this->end_controls_tab();

$this->end_controls_tabs();

// Button Typography Control

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_services_area_button_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .ai-service-style-2 .pg-btn',
    ]
);

// button padding

$this->add_responsive_control(
    'od_services_area_button_padding',
    [
        'label' => __('Padding', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .pg-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// button margin

$this->add_responsive_control(
    'od_services_area_button_margin',
    [
        'label' => __('Margin', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .pg-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// button border radius

$this->add_responsive_control(
    'od_services_area_button_border_radius',
    [
        'label' => __('Border Radius', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .ai-service-style-2 .pg-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);





$this->end_controls_section();




$this->start_controls_section(
    'od_service_area_bg_style2',
    [
        'label' => __('Background', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]


);


// Background Color Control


$this->add_control(
    'od_service_area_bg_color2',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

// Border color Control

$this->add_control(
    'od_service_area_border_color2',
    [
        'label' => __('Border Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-item' => 'border-color: {{VALUE}}',
        ],
    ]
);


// border hover color

$this->add_control(
    'od_service_area_border_hover_color2',
    [
        'label' => __('Border Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-item:hover' => 'border-color: {{VALUE}}',
        ],
    ]
);

// Box shadow color

$this->add_control(
    'od_service_area_box_shadow_color2',
    [
        'label' => __('Box Shadow Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-item:hover' => 'box-shadow: 0 20px 30px 0 {{VALUE}}',
        ],
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_service_title_style2',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]


);


// Title Color Control

$this->add_control(
    'od_service_title_color2',
    [
        'label' => __('Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .border-line-black' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}})',
        ],
    ]
);

// title typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_service_title_typography2',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .dt-service-title',
    ]
);






$this->end_controls_section();


$this->start_controls_section(
    'od_service_descrption_style2',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]


);


// Description Color Control


$this->add_control(
    'od_service_description_color2',
    [
        'label' => __('Description Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-content p' => 'color: {{VALUE}}',
        ],
    ]
);

// Description Typography Control


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_service_description_typography2',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .dt-service-content p',
    ]
);




$this->end_controls_section();



$this->start_controls_section(
    'od_service_icon_style2',
    [
        'label' => __('Icon BTN', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]


);


$this->start_controls_tabs(
    'od_service_icon_style2_tabs'
);


$this->start_controls_tab(
    'od_service_icon_style2_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Icon Color Control

$this->add_control(
    'od_service_icon_color2',
    [
        'label' => __('Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-link' => 'color: {{VALUE}}',
        ],
    ]
);

// Icon Background Color Control

$this->add_control(
    'od_service_icon_bg_color2',
    [
        'label' => __('Icon Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-link' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end Normal Tab

$this->end_controls_tab();

$this->start_controls_tab(
    'od_service_icon_style2_hover_tab',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Icon Hover Color Control

$this->add_control(
    'od_service_icon_hover_color2',
    [
        'label' => __('Icon Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-link:hover' => 'color: {{VALUE}}',
        ],
    ]
);

// Icon Hover Background Color Control

$this->add_control(
    'od_service_icon_hover_bg_color2',
    [
        'label' => __('Icon Hover Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-link::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end Hover Tab

$this->end_controls_tab();

$this->end_controls_tabs();






$this->end_controls_section();
