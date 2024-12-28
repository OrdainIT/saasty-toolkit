<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_tab_accordion_title_content',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);


$this->add_control(
    'od_tab_section_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => od_kses('Frequently Asked  Questions', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);


$this->add_control(
    'od_tab_section_descrption',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => od_kses('Absolutely! One of our tools is a long-form article writer which is <br> specifically designed to generate unlimited content', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_tab_accordion_content_wrap',
    [
        'label' => __('Tab Accordion Content', 'ordainit-toolkit'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

// Sub-items repeater (nested items)
$accordion_nested_repeater = new \Elementor\Repeater();
$accordion_nested_repeater->add_control(
    'accordion_title',
    [
        'label'       => __('Accordion Title', 'ordainit-toolkit'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default'     => __('Accordion Title', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$accordion_nested_repeater->add_control(
    'accordion_description',
    [
        'label'       => __('Accordion Description', 'ordainit-toolkit'),
        'type'        => \Elementor\Controls_Manager::TEXTAREA,
        'default'     => __('Accordion Descrption', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Main repeater
$accordion_button_repeater = new \Elementor\Repeater();
$accordion_button_repeater->add_control(
    'accordion_button_text',
    [
        'label'       => __('Button Text', 'ordainit-toolkit'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default'     => __('Account', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Add sub-items repeater inside the main repeater
$accordion_button_repeater->add_control(
    'accordion_nested_items',
    [
        'label'       => __('Accordion Title', 'ordainit-toolkit'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => $accordion_nested_repeater->get_controls(),
        'title_field' => '{{{ accordion_title }}}',
    ]
);

// Add main repeater to widget controls
$this->add_control(
    'accordion_multi_repeater',
    [
        'label'       => __('Accordion List Items', 'ordainit-toolkit'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => $accordion_button_repeater->get_controls(),
        'title_field' => '{{{ accordion_button_text }}}',
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_accordion_tab_shap',
    [
        'label' => __('Shap', 'ordainit-toolkit'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);



$this->add_control(
    'od_accordion_tab_shap_img',
    [
        'label' => esc_html__('Shap Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_accordion_tab_section_title_style',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Title style controls here

$this->add_control(
    'od_accordion_tab_section_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-section-title' => 'color: {{VALUE}}',
        ],
    ]
);

// Title typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_accordion_tab_section_title_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .seo-section-title',
    ]
);

// Description style controls here

$this->add_control(
    'od_accordion_tab_section_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-section-title-box p' => 'color: {{VALUE}}',
        ],
    ]
);

// Description typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_accordion_tab_section_description_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .seo-section-title-box p',
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_accordion_tab_button_style',
    [
        'label' => __('Accordion Button', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// button tabs controls here

$this->start_controls_tabs(
    'od_accordion_tab_button_tabs'
);

$this->start_controls_tab(
    'od_accordion_tab_button_normal',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_accordion_tab_button_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_accordion_tab_button_bg_color',
    [
        'label' => esc_html__('Background Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end normal tab

$this->end_controls_tab();

// button active tab

$this->start_controls_tab(
    'od_accordion_tab_button_active',
    [
        'label' => __('Active', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_accordion_tab_button_active_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button.active' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_accordion_tab_button_active_bg_color',
    [
        'label' => esc_html__('Background Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button.active' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end active tab

$this->end_controls_tab();

$this->end_controls_tabs();

// button typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_accordion_tab_button_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button',
    ]
);






$this->end_controls_section();

$this->start_controls_section(
    'od_accordion_tab_list_content_style',
    [
        'label' => __('Accordion List Content', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


// list content bg heading control

$this->add_control(
    'od_accordion_tab_list_content_bg_heading',
    [
        'label' => __('Background', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
    ]
);

// list content bg color control

$this->add_control(
    'od_accordion_tab_list_content_bg_color',
    [
        'label' => esc_html__('Background Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .accordion-items' => 'background-color: {{VALUE}}',
        ],
    ]
);

// list content bg padding control

$this->add_control(
    'od_accordion_tab_list_content_bg_padding',
    [
        'label' => esc_html__('Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .accordion-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

// list content bg margin control

$this->add_control(
    'od_accordion_tab_list_content_bg_margin',
    [
        'label' => esc_html__('Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .accordion-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

// list content bg border control

$this->add_control(
    'od_accordion_tab_list_content_bg_border',
    [
        'label' => esc_html__('Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-faq-style .accordion-items' => 'border-color: {{VALUE}}',
        ],
    ]
);


// Title style heading control

$this->add_control(
    'od_accordion_tab_list_content_title_heading',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
    ]
);

// Title color control

$this->add_control(
    'od_accordion_tab_list_content_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons' => 'color: {{VALUE}}',
        ],
    ]
);

// Title typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_accordion_tab_list_content_title_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .pg-custom-accordion .accordion-buttons',
    ]
);

// Description style heading control

$this->add_control(
    'od_accordion_tab_list_content_description_heading',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
    ]
);

// Description color control

$this->add_control(
    'od_accordion_tab_list_content_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-body p' => 'color: {{VALUE}}',
        ],
    ]
);

// Description typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_accordion_tab_list_content_description_typography',
        'label' => __('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .pg-custom-accordion .accordion-body p',
    ]
);


// icon style heading control

$this->add_control(
    'od_accordion_tab_list_content_icon_heading',
    [
        'label' => __('Icon', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
    ]
);

// icon tabs controls here

$this->start_controls_tabs(
    'od_accordion_tab_list_content_icon_tabs'
);

$this->start_controls_tab(
    'od_accordion_tab_list_content_icon_normal',
    [
        'label' => __('Active', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_accordion_tab_list_content_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons::after' => 'color: {{VALUE}}',
        ],
    ]
);

// icon normal border control

$this->add_control(
    'od_accordion_tab_list_content_icon_border',
    [
        'label' => esc_html__('Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons::after' => 'border-color: {{VALUE}}',
        ],
    ]
);



// end normal tab

$this->end_controls_tab();

// icon active tab

$this->start_controls_tab(
    'od_accordion_tab_list_content_icon_active',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_accordion_tab_list_content_icon_active_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons.collapsed::after' => 'color: {{VALUE}}',
        ],
    ]
);

// icon active border control

$this->add_control(
    'od_accordion_tab_list_content_icon_active_border',
    [
        'label' => esc_html__('Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-custom-accordion .accordion-buttons.collapsed::after' => 'border-color: {{VALUE}}',
        ],
    ]
);

// end active tab

$this->end_controls_tab();

$this->end_controls_tabs();








$this->end_controls_section();
