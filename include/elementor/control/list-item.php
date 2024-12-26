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
    'od_list_item_section',
    [
        'label' => __('List Item', 'ordainit-toolkit'),
    ]
);

// List item title


$this->add_control(
    'list_item_repeater',
    [
        'label' => esc_html__('List Items', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            // list item title
            [
                'name' => 'list_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Item Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],

            // list item description
            [
                'name' => 'list_description',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'description' => esc_html__('Only for style 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('List Item Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],

            // list select control for icon and svg control

            [
                'name' => 'list_item_icon_type',
                'label' => esc_html__('Icon Type', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'svg',
                'options' => [
                    'icon' => esc_html__('Icon', 'ordainit-toolkit'),
                    'svg' => esc_html__('SVG', 'ordainit-toolkit'),
                ],
            ],

            // Icon control

            [
                'name' => 'list_item_icon',
                'label' => esc_html__('Icon', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'solid',
                ],
                'condition' => [
                    'list_item_icon_type' => 'icon',
                ],
            ],

            // SVG control in text control

            [
                'name' => 'list_item_svg',
                'label' => esc_html__('SVG', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'condition' => [
                    'list_item_icon_type' => 'svg',
                ],
            ],
        ],
        'default' => [
            [
                'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
            ],
            [
                'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
            ],
            [
                'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
            ],
            [
                'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ list_title }}}',
    ]
);







$this->end_controls_section();


$this->start_controls_section(
    'od_list_item_settings',
    [
        'label' => __('Settings', 'ordainit-toolkit'),
    ]
);

// list item animation delay

$this->add_control(
    'list_fade_delay',
    [
        'label' => __('Delay', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => '0.3',
        'label_block' => true,
    ]
);

// fade animation switcher control

$this->add_control(
    'list_fade_animation_switcher',
    [
        'label' => __('Fade Animation Switcher', 'ordainit-toolkit'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Yes', 'ordainit-toolkit'),
        'label_off' => __('No', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

// list item animation

$this->add_control(
    'list_fade_animation',
    [
        'label' => __('Fade Animation', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => 'bottom',
        'options' => [
            'none' => __('None', 'ordainit-toolkit'),
            'bottom' => __('Bottom', 'ordainit-toolkit'),
            'left' => __('Left', 'ordainit-toolkit'),
            'right' => __('Right', 'ordainit-toolkit'),
            'top' => __('Top', 'ordainit-toolkit'),
        ],
        'condition' => [
            'list_fade_animation_switcher' => 'yes',
        ],
    ]
);


$this->end_controls_section();



$this->start_controls_section(
    'od_list_item_style_section',
    [
        'label' => __('list Item ', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// list item title color

$this->add_control(
    'list_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'default' => '#000',
        'selectors' => [
            '{{WRAPPER}} .od-list-item.it-software-item-list ul li span' => 'color: {{VALUE}}',
        ],
    ]
);

// list item title typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'list_title_typography',
        'label' => esc_html__('Typography', 'ordainit-toolkit'),
        'selector' => '{{WRAPPER}} .od-list-item.it-software-item-list ul li span',
    ]
);

// list item margin

$this->add_responsive_control(
    'list_item_margin',
    [
        'label' => esc_html__('Margin', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'default' => [
            'top' => '0',
            'right' => '0',
            'bottom' => '18',
            'left' => '0',
            'unit' => 'px',
        ],
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .it-software-item-list ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);

// list item padding

$this->add_responsive_control(
    'list_item_padding',
    [
        'label' => esc_html__('Padding', 'ordainit-toolkit'),
        'type' => Controls_Manager::DIMENSIONS,
        'default' => [
            'top' => '0',
            'right' => '0',
            'bottom' => '0',
            'left' => '32',
            'unit' => 'px',
        ],
        'size_units' => ['px', 'em', '%'],
        'selectors' => [
            '{{WRAPPER}} .it-software-item-list ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
        ],
    ]
);






$this->end_controls_section();


$this->start_controls_section(
    'od_list_item_icon_style_section',
    [
        'label' => __('Icon ', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// list item icon color

$this->add_control(
    'list_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'default' => '#000',
        'selectors' => [
            '{{WRAPPER}} .od-list-item.it-software-item-list ul li i' => 'color: {{VALUE}}',
        ],
    ]
);

// list item icon size

$this->add_responsive_control(
    'list_icon_size',
    [
        'label' => esc_html__('Icon Size', 'ordainit-toolkit'),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px', 'em', '%'],
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .od-list-item.it-software-item-list ul li i' => 'font-size: {{SIZE}}{{UNIT}}',
        ],
    ]
);



$this->end_controls_section();


$this->start_controls_section(
    'od_list_item_icon_svg_style_section',
    [
        'label' => __('SVG Icon ', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// list item icon color

$this->add_control(
    'list_svg_color',
    [
        'label' => esc_html__('SVG Fill Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-software-item-list ul li svg path' => 'fill: {{VALUE}}',
        ],
    ]
);

// list item icon stroke color

$this->add_control(
    'list_svg_stroke_color',
    [
        'label' => esc_html__('SVG Stroke Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-software-item-list ul li svg path' => 'stroke: {{VALUE}}',
        ],
    ]
);

// list item icon height width

$this->add_responsive_control(
    'list_svg_height_width',
    [
        'label' => esc_html__('SVG Height Width', 'ordainit-toolkit'),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px', 'em', '%'],
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .it-software-item-list ul li svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
        ],
    ]
);


$this->end_controls_section();
