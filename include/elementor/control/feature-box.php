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
            'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
            'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
            'default' => 'layout-1',
        ]
    ]
);

$this->end_controls_section();


// Feature BG Content
$this->start_controls_section(
    'od_feature_bg_content',
    [
        'label' => __('Feature BG', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-3']
        ],
    ]
);

$this->add_control(
    'od_feature_background_image',
    [
        'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/feature/feature-bg-3-1.jpg',
        ],
    ]
);

$this->end_controls_section();

// Feature Content
$this->start_controls_section(
    'od_feature_content',
    [
        'label' => __('Feature Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_feature_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Feature Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_feature_url',
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
    'od_feature_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Feature Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_feature_thumbnail_image',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/feature/feature-1-1.png',
        ],
    ]
);

$this->end_controls_section();

// Content Btn Section
$this->start_controls_section(
    'od_feature_btn',
    [
        'label' => __('Feature Button', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_feature_btn_text',
    [
        'label' => __('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Read More', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type button text here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_feature_btn_url',
    [
        'label' => __('Button URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
        'show_external' => true,
        'default' => [
            'url' => '#',
        ],
    ]
);

$this->add_control(
    'od_feature_btn_icon_switcher',
    [
        'label' => esc_html__('Show Icon', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();


// Animation Section
$this->start_controls_section(
    'od_feature_animation',
    [
        'label' => __('Feature Animation', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_feature_animation_fade_from',
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
    'od_feature_animation_delay',
    [
        'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('0.3', 'ordainit-toolkit'),
        'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();


// Style Starts


// feture content style
$this->start_controls_section(
    'od_feature_content_style',
    [
        'label' => __('Feature Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_feature_bg_color',
    [
        'label' => esc_html__('Feature BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-feature-item' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .dt-feature-item' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ss-feature-item::before' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_feature_hover_bg_color',
    [
        'label' => esc_html__('Feature Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-feature-item:hover::before' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-4']
        ],
    ]
);

$this->add_control(
    'od_feature_border_color',
    [
        'label' => esc_html__('Feature Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-feature-item' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_feature_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-feature-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .dt-feature-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-feature-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-feature-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_feature_title_border_color',
    [
        'label' => esc_html__('Title Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .border-line-black' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
            '{{WRAPPER}} .border-line-white' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_feature_title_typography',
        'selector' => '
            {{WRAPPER}} .it-feature-title,
            {{WRAPPER}} .dt-feature-title,
            {{WRAPPER}} .pg-feature-title,
            {{WRAPPER}} .ss-feature-title
        ',
    ]
);

$this->add_control(
    'od_feature_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-feature-item p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-feature-content p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_feature_description_typography',
        'selector' => '
            {{WRAPPER}} p,
            {{WRAPPER}} .pg-feature-item p,
            {{WRAPPER}} .ss-feature-content p
        ',
    ]
);

$this->end_controls_section();


// feature content btn style
$this->start_controls_section(
    'od_feature_btn_style',
    [
        'label' => __('Feature Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);


$this->start_controls_tabs(
    'od_feature_btn_style_tabs'
);

$this->start_controls_tab(
    'od_feature_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_feature_btn_style_normal_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-feature' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_feature_btn_style_normal_circle_bg_color',
    [
        'label' => esc_html__('Circle BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-feature::after' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_feature_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_feature_btn_style_hover_color',
    [
        'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-feature:hover' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_feature_btn_style_hover_circle_bg_color',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-feature::before' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();
$this->end_controls_tabs();

$this->add_control(
    'hr_2',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_feature_btn_typography',
        'selector' => '{{WRAPPER}} .it-btn-feature',
    ]
);

$this->end_controls_section();
