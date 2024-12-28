<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_tab_section',
    [
        'label' => __('Tab Content', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_tab_repeater',
    [
        'label' => esc_html__('Tab List', 'textdomain'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_tab_nav_button_title',
                'label' => esc_html__('Tab Nav Button', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Management', 'textdomain'),
                'label_block' => true,
            ],
            [
                'name' => 'od_tab_content_title',
                'label' => esc_html__('Tab Content Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => od_kses('Manage All Operations <br> with Rich Analytics.', 'textdomain'),
                'label_block' => true,
            ],
            [
                'name' => 'od_tab_content_description',
                'label' => esc_html__('Tab Content Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('CRM Brings your everything your need to increase lead <br>  numbers, accelerate sales and measure sales.', 'textdomain'),
                'label_block' => true,
            ],

            [
                'name' => 'od_tab_content_list',
                'label' => esc_html__('Tab Content List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('List Content', 'textdomain'),
                'label_block' => true,
            ],
            // button title

            [
                'name' => 'od_tab_button_title',
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'textdomain'),
                'label_block' => true,
            ],

            [
                'name' => 'od_tab_button_url',
                'label' => esc_html__('Button URL', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'textdomain'),
                'label_block' => true,
            ],

            // tab bg image
            [
                'name' => 'od_tab_bg_image',
                'label' => esc_html__('Tab Background Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ],

            //tab shape image 1
            [
                'name' => 'od_tab_shape_image_1',
                'label' => esc_html__('Tab Shape Image 1', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ],

            // tab shape image 2
            [
                'name' => 'od_tab_shape_image_2',
                'label' => esc_html__('Tab Shape Image 2', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ],

            // tab shape image 3
            [
                'name' => 'od_tab_shape_image_3',
                'label' => esc_html__('Tab Shape Image 3', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ],








        ],
        'default' => [
            [
                'od_tab_nav_button_title' => esc_html__('Management', 'textdomain'),
            ],
            [
                'od_tab_nav_button_title' => esc_html__('Sales', 'textdomain'),
            ],
            [
                'od_tab_nav_button_title' => esc_html__('Performance', 'textdomain'),
            ],
            [
                'od_tab_nav_button_title' => esc_html__('Omnichannel', 'textdomain'),
            ],
        ],
        'title_field' => '{{{ od_tab_nav_button_title }}}',
    ]

);





$this->end_controls_section();


$this->start_controls_section(
    'od_tab_shap',
    [
        'label' => __('Tab Shap', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tab_shape_image_1',
    [
        'label' => __('Tab Shape Image 1', 'ordainit-toolkit'),
        'type' => Controls_Manager::MEDIA,
    ]
);

$this->add_control(
    'od_tab_shape_image_2',
    [
        'label' => __('Tab Shape Image 2', 'ordainit-toolkit'),
        'type' => Controls_Manager::MEDIA,
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_tab_style_section',
    [
        'label' => __('Tab Nav Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);
// Nav button bg color

$this->add_control(
    'od_tab_nav_button_bg_color',
    [
        'label' => __('Nav Button Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-analytics-button nav button' => 'background-color: {{VALUE}}',
        ],
    ]
);

// Nav button color

$this->add_control(
    'od_tab_nav_button_color',
    [
        'label' => __('Nav Button Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-analytics-button nav button' => 'color: {{VALUE}}',
        ],
    ]
);

// nav button active bg color

$this->add_control(
    'od_tab_nav_button_active_bg_color',
    [
        'label' => __('Nav Button Active Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-analytics-button nav #lineMarker' => 'background-color: {{VALUE}}',
        ],
    ]
);

// nav button active color

$this->add_control(
    'od_tab_nav_button_active_color',
    [
        'label' => __('Nav Button Active Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-analytics-button nav button.active' => 'color: {{VALUE}}',
        ],
    ]
);

// nav button typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_tab_nav_button_typography',
        'label' => __('Nav Button Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .it-analytics-button nav button',
    ]
);

$this->end_controls_section();



$this->start_controls_section(
    'od_tab_content_title_style_section',
    [
        'label' => __('Tab Content Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Tab content Title Color

$this->add_control(
    'od_tab_content_title_color',
    [
        'label' => __('Tab Content Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'default' => '#fff',
        'selectors' => [
            '{{WRAPPER}} .it-section-title-2' => 'color: {{VALUE}}',
        ],
    ]
);

// Tab content Title Typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_tab_content_title_typography',
        'label' => __('Tab Content Title Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .it-section-title-2',
    ]
);




$this->end_controls_section();


$this->start_controls_section(
    'od_tab_content_description_style',
    [
        'label' => __('Tab Description', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


// Tab content Description Color

$this->add_control(
    'od_tab_content_description_color',
    [
        'label' => __('Tab Content Description Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'default' => '#fff',
        'selectors' => [
            '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
        ],
    ]
);

// Tab content Description Typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_tab_content_description_typography',
        'label' => __('Tab Content Description Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .it-section-title-box p',
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_tab_content_list_style',
    [
        'label' => __('Tab List', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


// Tab content List Color

$this->add_control(
    'od_tab_content_list_color',
    [
        'label' => __('Tab Content List Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'default' => '#fff',
        'selectors' => [
            '{{WRAPPER}} .it-analytics-item-list ul li span' => 'color: {{VALUE}}',
        ],
    ]
);

// Tab content List Typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_tab_content_list_typography',
        'label' => __('Tab Content List Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .it-analytics-item-list ul li span',
    ]
);

// List Icon Color

$this->add_control(
    'od_tab_content_list_icon_color',
    [
        'label' => __('List Icon Fill Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-analytics-item-list ul li svg path' => 'fill: {{VALUE}}',
        ],
    ]
);

// stroke color

$this->add_control(
    'od_tab_content_list_icon_stroke_color',
    [
        'label' => __('List Icon Stroke Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-analytics-item-list ul li svg path' => 'stroke: {{VALUE}}',
        ],
    ]
);



$this->end_controls_section();


$this->start_controls_section(
    'od_tab_content_button_style',
    [
        'label' => __('Buton', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// tabs control for button


$this->start_controls_tabs(
    'od_tab_content_button_style_tabs'
);

// tab for normal button

$this->start_controls_tab(
    'od_tab_content_button_style_normal',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Button Text Color

$this->add_control(
    'od_tab_button_text_color',
    [
        'label' => __('Button Text Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn.white-bg' => 'color: {{VALUE}}',
        ],
    ]
);

// Button Background Color

$this->add_control(
    'od_tab_button_bg_color',
    [
        'label' => __('Button Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn.white-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end tab for normal button

$this->end_controls_tab();

// tab for hover button

$this->start_controls_tab(
    'od_tab_content_button_style_hover',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Button Text Color

$this->add_control(
    'od_tab_button_text_hover_color',
    [
        'label' => __('Button Text Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn.white-bg:hover' => 'color: {{VALUE}}',
        ],
    ]
);

// Button Background Color

$this->add_control(
    'od_tab_button_bg_hover_color',
    [
        'label' => __('Button Background Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end tab for hover button

$this->end_controls_tab();

// end tabs for button

$this->end_controls_tabs();

// Button Typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_tab_button_typography',
        'selector' => '{{WRAPPER}} .it-btn.white-bg',
    ]
);




$this->end_controls_section();
