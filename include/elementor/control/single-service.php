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


// Feature Content
$this->start_controls_section(
    'od_single_service_content',
    [
        'label' => __('Service Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_single_service_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Service Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_single_service_url',
    [
        'label' => __('URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
        'show_external' => true,
        'default' => [
            'url' => '#',
        ],
    ]
);

$this->add_control(
    'od_single_service_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Service Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_single_service_thumbnail_image',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

$this->end_controls_section();


// Service Bottom Content
$this->start_controls_section(
    'od_single_service_bottom_content',
    [
        'label' => __('Service Bottom Content', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_single_service_bottom_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('50%', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_single_service_bottom_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('Reduction in Writing Time', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();


// Animation Section
$this->start_controls_section(
    'od_single_service_animation',
    [
        'label' => __('Service Animation', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_single_service_animation_fade_from',
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
    'od_single_service_animation_delay',
    [
        'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('0.3', 'ordainit-toolkit'),
        'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();


// content style
$this->start_controls_section(
    'od_single_service_style',
    [
        'label' => __('Service Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_single_service_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-item' => 'background: {{VALUE}}',
            '{{WRAPPER}} .pg-service-style .dt-service-item' => 'background: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_single_service_bg_hover_color',
    [
        'label' => esc_html__('BG Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-item::after' => 'background: {{VALUE}}',
            '{{WRAPPER}} .seo-service-style .dt-service-item::after' => 'background: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_single_service_border_color',
    [
        'label' => esc_html__('Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-item' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_single_service_divider_border_color',
    [
        'label' => esc_html__('Divider Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-service-bottom' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_single_service_divider_hover_border_color',
    [
        'label' => esc_html__('Divider Hover Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-service-style .dt-service-item:hover .seo-service-bottom' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->end_controls_section();


// content style
$this->start_controls_section(
    'od_single_service_content_style',
    [
        'label' => __('Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_single_service_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-title' => 'color: {{VALUE}}',
            '{{WRAPPER}}  .dt-service-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_single_service_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-service-style .dt-service-item:hover .dt-service-title' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_single_service_title_border_color',
    [
        'label' => esc_html__('Title Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .border-line-white' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_single_service_title_typography',
        'selector' => '
            {{WRAPPER}} .ss-service-style .dt-service-title,
            {{WRAPPER}} .dt-service-title
        ',
    ]
);

$this->add_control(
    'od_single_service_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-content p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .seo-service-style .dt-service-content p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_single_service_description_hover_color',
    [
        'label' => esc_html__('Description Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-service-style .dt-service-item:hover p' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_single_service_description_typography',
        'selector' => '
            {{WRAPPER}} .ss-service-style .dt-service-content p,
            {{WRAPPER}} .seo-service-style .dt-service-content p
        ',
    ]
);


$this->end_controls_section();

// content btn style
$this->start_controls_section(
    'od_single_service_btn_style',
    [
        'label' => __('Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->start_controls_tabs(
    'od_single_service_btn_style_tabs'
);

$this->start_controls_tab(
    'od_single_service_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkitn'),
    ]
);


$this->add_control(
    'od_single_service_btn_style_normal_tab_color',
    [
        'label' => esc_html__('Btn Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-service-link' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_single_service_btn_style_normal_tab_bg_color',
    [
        'label' => esc_html__('Btn BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-link' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

//Hover
$this->start_controls_tab(
    'od_single_service_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkitn'),
    ]
);


$this->add_control(
    'od_single_service_btn_style_hover_tab_color',
    [
        'label' => esc_html__('Btn Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-item:hover .dt-service-link' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_single_service_btn_style_hover_tab_bg_color',
    [
        'label' => esc_html__('Btn Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-service-style .dt-service-link::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();


// Bottom Content style
$this->start_controls_section(
    'od_single_service_bottom_content_style',
    [
        'label' => __('Bottom Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_single_service_bottom_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-service-bottom span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_single_service_bottom_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .seo-service-style .dt-service-item:hover .seo-service-bottom span' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_section();
