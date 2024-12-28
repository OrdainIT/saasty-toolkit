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


// Brand Title Area Starts
$this->start_controls_section(
    'od_brand_title_section',
    [
        'label' => __('Brand Title', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
    ]
);

$this->add_control(
    'od_brand_title_show',
    [
        'label' => esc_html__('Show Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'od_brand_title',
    [
        'label' => __('Brand Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('od brand', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type brand title here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_brand_title_show' => 'yes',
        ],
    ]
);

$this->end_controls_section();

// Brand Area Starts
$this->start_controls_section(
    'od_brand_section',
    [
        'label' => __('Brand Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_lists',
    [
        'label' => esc_html__('Brand List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_brand_list_thumbnail',
                'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ],
        ],
        'default' => [
            [
                'od_brand_list_thumbnail' => esc_url('od_brand_list_thumbnail', 'ordainit-toolkit'),
            ],

        ],
        'title_field' => 'Brand',
    ]
);

$this->end_controls_section();


// Brand Area 2 Starts
$this->start_controls_section(
    'od_brand_section_2',
    [
        'label' => __('Brand Content 2', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_brand_2_lists',
    [
        'label' => esc_html__('Brand 2 List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_brand_2_list_thumbnail',
                'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],


            ],
        ],

        'default' => [
            [
                'od_brand_2_list_thumbnail' => esc_url('od_brand_2_list_thumbnail', 'ordainit-toolkit'),
            ],

        ],

        'title_field' => 'Brand_2',
    ]
);

$this->end_controls_section();


// Brand Slider settings
$this->start_controls_section(
    'od_brand_slider_settings',
    [
        'label' => __('Brand Slider Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_brand_slider_autoplay',
    [
        'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();


// Brand Style
$this->start_controls_section(
    'od_brand_style',
    [
        'label' => __('Brand Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_brand_bg_color',
    [
        'label' => esc_html__('Brand BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .gray-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .blue-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_brand_padding',
    [
        'label' => esc_html__('Brand Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'selectors' => [
            '{{WRAPPER}} .it-brand-ptb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .ss-brand-ptb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->end_controls_section();

// Brand Content Style
$this->start_controls_section(
    'od_brand_content_style',
    [
        'label' => __('Brand Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_brand_line_color',
    [
        'label' => esc_html__('Brand Line Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}}  .it-brand-top-box::after' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_brand_title_bg_color',
    [
        'label' => esc_html__('Brand Title BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}}  .it-brand-top-box span' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_brand_title_color',
    [
        'label' => esc_html__('Brand Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-brand-top-box span' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_brand_title_typography',
        'selector' => '{{WRAPPER}} .it-brand-top-box span',
    ]
);

$this->end_controls_section();
