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
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// feature content style
$this->start_controls_section(
    'od_image_box_content',
    [
        'label' => __('Image Box Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_image_box_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Feature Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_image_box_number',
    [
        'label' => __('Number', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('01', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Number here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_image_box_url',
    [
        'label' => __('URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
        'show_external' => true,
        'default' => [
            'url' => '#',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3'],
        ],
    ]
);

$this->add_control(
    'od_image_box_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Feature Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_image_box_thumbnail_image',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/service-icon.png',
        ],
    ]
);

$this->end_controls_section();

// Animation Section
$this->start_controls_section(
    'od_image_box_animation',
    [
        'label' => __('Image Box Animation', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_image_box_animation_fade_from',
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
    'od_image_box_animation_delay',
    [
        'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('0.3', 'ordainit-toolkit'),
        'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();


// style
$this->start_controls_section(
    'od_image_box_style',
    [
        'label' => __('Image Box Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_image_box_bg_color',
    [
        'label' => esc_html__('Feature BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-service-style .ai-service-item::before' => 'background: {{VALUE}}',
            '{{WRAPPER}} .cr-platform-item' => 'background: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2'],
        ],
    ]
);


$this->add_control(
    'od_image_box_border_gradient_start_color',
    [
        'label' => esc_html__('Border Gradient Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#0BCF77',
        'selectors' => [
            '{{WRAPPER}} .ag-service-style .ai-service-item::after' => 'background: linear-gradient(to right, {{VALUE}} 0%, {{od_image_box_border_gradient_end_color.VALUE}} 100%);',
        ],
        'condition' => [
            'od_design_style' => 'layout-1',
        ],
    ]
);
$this->add_control(
    'od_image_box_border_gradient_end_color',
    [
        'label' => esc_html__('Border Gradient End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#69D619',
        'selectors' => [
            '{{WRAPPER}} .ag-service-style .ai-service-item::after' => 'background: linear-gradient(to right, {{od_image_box_border_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
        ],
        'condition' => [
            'od_design_style' => 'layout-1',
        ],
    ]
);

$this->add_control(
    'od_image_box_border_color',
    [
        'label' => esc_html__('Feature Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-platform-item' => 'border-color: {{VALUE}}',
            '{{WRAPPER}} .ai-service-item' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-3'],
        ],
    ]
);

$this->add_control(
    'od_image_box_border_hover_color',
    [
        'label' => esc_html__('Feature Border Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-item:hover' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => 'layout-3',
        ],
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_image_box_content_style',
    [
        'label' => __('Image Box Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_image_box_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-service-style .dt-service-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-platform-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .dt-service-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_image_box_title_border_color',
    [
        'label' => esc_html__('Title Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .border-line-white' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
            '{{WRAPPER}} .border-line-black' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_image_box_title_typography',
        'selector' => '
            {{WRAPPER}} .ag-service-style .dt-service-title,
            {{WRAPPER}} .cr-platform-title,
            {{WRAPPER}} .pg-service-style .dt-service-title
        ',
    ]
);

$this->add_control(
    'od_image_box_number_color',
    [
        'label' => esc_html__('Number Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-number' => '-webkit-text-stroke: 1px {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => 'layout-3',
        ],
    ]
);

$this->add_control(
    'od_image_box_number_hover_color',
    [
        'label' => esc_html__('Number Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-service-item:hover .ai-service-number' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => 'layout-3',
        ],
    ]
);

$this->add_control(
    'od_image_box_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-service-style .ai-service-content p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-platform-item p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ai-service-content p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_image_box_description_typography',
        'selector' => '
            {{WRAPPER}} .ag-service-style .ai-service-content p,
            {{WRAPPER}} .cr-platform-item p,
            {{WRAPPER}} .ai-service-content p
        ',
    ]
);

$this->end_controls_section();
