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
        ],
        'default' => 'layout-1',
    ]
);

//end layout section
$this->end_controls_section();

$this->start_controls_section(
    'od_price_box_togle_title',
    [
        'label' => __('Price Toogle Title', 'ordainit-toolkit'),
    ]
);

// write tab control for price toogle title tab control

// Normal tab

$this->start_controls_tabs(
    'od_price_box_togle_title_tabs'
);

$this->start_controls_tab(
    'od_price_box_togle_title_monthly_tab',
    [
        'label' => __('Monthy', 'ordainit-toolkit'),
    ]
);

// text control for price toogle title

$this->add_control(
    'od_price_box_togle_title_monthly',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Monthly', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_tab();

// Yearly tab

$this->start_controls_tab(
    'od_price_box_togle_title_yearly_tab',
    [
        'label' => __('Yearly', 'ordainit-toolkit'),
    ]
);

// text control for price toogle title

$this->add_control(
    'od_price_box_togle_title_yearly',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Yearly', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();



$this->end_controls_section();



$this->start_controls_section(
    'od_price_monlty_price_box_wrapper',
    [
        'label' => __('Monthly Price Box', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_price_monlty_price_box_items',
    [
        'label' => esc_html__('Price Items', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_price_monlty_price_box_package_title',
                'label' => esc_html__('Package Name', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Basic', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_price_monlty_price_box_price',
                'label' => esc_html__('Price', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => od_kses('39$ <i>/Month</i>', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_price_monlty_price_box_description_',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_price_monlty_price_box_image',
                'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-1'],
                ],
            ],

            [
                'name' => 'od_price_monlty_price_box_list_item',
                'label' => esc_html__('List Item', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('List Item', 'ordainit-toolkit'),
                'label_block' => true,
            ],

            [
                'name' => 'od_price_monlty_price_box_button_text',
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join Standard Plan', 'ordainit-toolkit'),
                'label_block' => true,
            ],

            [
                'name' => 'od_price_monlty_price_box_button_url',
                'label' => esc_html__('Button URL', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],




        ],
        'default' => [
            [
                'od_price_monlty_price_box_package_title' => esc_html__('Basic', 'ordainit-toolkit'),
            ],
            [
                'od_price_monlty_price_box_package_title' => esc_html__('Standard', 'ordainit-toolkit'),
            ],
            [
                'od_price_monlty_price_box_package_title' => esc_html__('Premium', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_price_monlty_price_box_package_title }}}',
    ]
);





$this->end_controls_section();

// write control for yearly price box

$this->start_controls_section(
    'od_price_yearly_price_box_wrapper',
    [
        'label' => __('Yearly Price Box', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_price_yearly_price_box_items',
    [
        'label' => esc_html__('Price Items', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_price_yearly_price_box_package_title',
                'label' => esc_html__('Package Name', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Basic', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_price_yearly_price_box_price',
                'label' => esc_html__('Price', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => od_kses('39$ <i>/Month</i>', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_price_yearly_price_box_description_',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_price_yearly_price_box_image',
                'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ],

            [
                'name' => 'od_price_yearly_price_box_list_item',
                'label' => esc_html__('List Item', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('List Item', 'ordainit-toolkit'),
                'label_block' => true,
            ],

            [
                'name' => 'od_price_yearly_price_box_button_text',
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join Standard Plan', 'ordainit-toolkit'),
                'label_block' => true,
            ],

            [
                'name' => 'od_price_yearly_price_box_button_url',
                'label' => esc_html__('Button URL', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],

        ],
        'default' => [
            [
                'od_price_yearly_price_box_package_title' => esc_html__('Basic', 'ordainit-toolkit'),
            ],
            [
                'od_price_yearly_price_box_package_title' => esc_html__('Standard', 'ordainit-toolkit'),
            ],
            [
                'od_price_yearly_price_box_package_title' => esc_html__('Premium', 'ordainit-toolkit'),
            ],
        ],

        'title_field' => '{{{ od_price_yearly_price_box_package_title }}}',

    ]

);

$this->end_controls_section();







$this->start_controls_section(
    'od_price_box_wrap_style',
    [
        'label' => __('Price Box Area', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// write tab control for box wrap area

// Normal tab

$this->start_controls_tabs(
    'od_price_box_wrap_style_tabs'
);

$this->start_controls_tab(
    'od_price_box_wrap_style_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// write control for box wrap area background color

$this->add_control(
    'od_price_box_wrap_bg_color',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ag-price-style .it-price-item::before' => 'background: {{VALUE}}',
        ],
    ]
);

// /end normal tab

$this->end_controls_tab();

// Active tab

$this->start_controls_tab(
    'od_price_box_wrap_style_active_tab',
    [
        'label' => __('Active', 'ordainit-toolkit'),
    ]
);


// write control for box wrap area background color

$this->add_control(
    'od_price_box_wrap_active_bg_color',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item.active' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ag-price-style .it-price-item.active::before' => 'background-color: {{VALUE}}',
        ],
    ]
);

// /end active tab

$this->end_controls_tab();

$this->end_controls_tabs();


// price box wrap border color

$this->add_control(
    'od_price_box_wrap_border_color',
    [
        'label' => __('Border Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-price-style .it-price-item' => 'border-color: {{VALUE}}',
            '{{WRAPPER}} .ag-price-style .it-price-item::after' => 'background: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-4'],
        ],
    ]
);


$this->end_controls_section();

$this->start_controls_section(
    'od_price_box_toggle_title',
    [
        'label' => __('Toogle title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

//Toggle title Bg Color

$this->add_control(
    'od_price_box_toggle_title_bg_color',
    [
        'label' => __('Toogle Switcher Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-toggle-input-wrap' => 'background-color: {{VALUE}}',
        ],
    ]
);

// toogle title normal color

$this->add_control(
    'od_price_box_toggle_title_color',
    [
        'label' => __('Toogle Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-toggler-pre, .it-toggler-post' => 'color: {{VALUE}}',
        ],
    ]
);

// toogle title active color

$this->add_control(
    'od_price_box_toggle_title_active_color',
    [
        'label' => __('Toogle Title Active Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-toggler-pre.is-active' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-toggler-post.is-active' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-toggler-pre:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-toggler-post:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_price_box_package_style',
    [
        'label' => __('Package Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// write control for package BG Color

$this->add_control(
    'od_price_box_package_bg_color',
    [
        'label' => __('Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-tag span' => 'background-color: {{VALUE}}',
        ],
    ]
);

// write control for package title color

$this->add_control(
    'od_price_box_package_title_color',
    [
        'label' => __('Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-tag span' => 'color: {{VALUE}}',
        ],
    ]
);

// Title active color

$this->add_control(
    'od_price_box_package_title_active_color',
    [
        'label' => __('Title Active Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-price-style .it-price-item.active .it-price-tag span' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-4'],
        ],
    ]
);

// write control for package title typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_price_box_package_title_typography',
        'selector' => '{{WRAPPER}} .it-price-tag span',
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_price_box_description_style',
    [
        'label' => __('Description Title', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Description color

$this->add_control(
    'od_price_box_description_color',
    [
        'label' => __('Description Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-head p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ai-price-style .it-price-item-list > span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ma-price-style .it-price-text p' => 'color: {{VALUE}}',
        ],
    ]
);

// description active color

$this->add_control(
    'od_price_box_description_active_color',
    [
        'label' => __('Description Active Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-price-style .it-price-item.active .it-price-item-list > span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ag-price-style .it-price-item.active .it-price-item-list > span' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-4'],
        ],
    ]
);

// Description typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_price_box_description_typography',
        'selector' => '{{WRAPPER}} .it-price-head p, {{WRAPPER}}  .ai-price-style .it-price-item-list > span, {{WRAPPER}} .ma-price-style .it-price-text p',
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_price_box_price_style',
    [
        'label' => __('Price', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Price color

$this->add_control(
    'od_price_box_price_color',
    [
        'label' => __('Price Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-value' => 'color: {{VALUE}}',
        ],
    ]
);

// Price typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_price_box_price_typography',
        'selector' => '{{WRAPPER}} .it-price-value',
    ]
);


$this->end_controls_section();



$this->start_controls_section(
    'od_price_box_list_item_style',
    [
        'label' => __('List Item', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// List Item color

$this->add_control(
    'od_price_box_list_item_color',
    [
        'label' => __('List Item Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item-list ul li span' => 'color: {{VALUE}}',
        ],
    ]
);

// List item active color

$this->add_control(
    'od_price_box_list_item_active_color',
    [
        'label' => __('List Item Active Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-price-style .it-price-item.active .it-price-item-list ul li span' => 'color: {{VALUE}}',
        ],
    ]
);




// List Item typography 

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_price_box_list_item_typography',
        'selector' => '{{WRAPPER}} .it-price-item-list ul li span',
    ]
);

// List Item icon color

$this->add_control(
    'od_price_box_list_item_icon_color',
    [
        'label' => __('Icon Deactive Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item-list ul li span svg path' => 'fill: {{VALUE}}',
        ],
    ]
);


// list item icon active color

$this->add_control(
    'od_price_box_list_item_icon_active_color',
    [
        'label' => __('Icon Active Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item-list ul li span svg path' => 'stroke: {{VALUE}}',
        ],
    ]
);




$this->end_controls_section();




$this->start_controls_section(
    'od_price_box_button_style',
    [
        'label' => __('Button', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


// tab control for button

// Normal tab

$this->start_controls_tabs(
    'od_price_box_button_style_tabs'
);

$this->start_controls_tab(
    'od_price_box_button_style_normal_tab',
    [
        'label' => __('Normal', 'ordainit-toolkit'),
    ]
);

// Button color

$this->add_control(
    'od_price_box_button_color',
    [
        'label' => __('Text Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item .it-btn.black-bg' => 'color: {{VALUE}}',
            '{{WRAPPER}} .aiZ-btn' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-btn' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_price_box_button_hover_color',
    [
        'label' => __('Text Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item .it-btn:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ai-btn:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-btn.hover-2:hover' => 'color: {{VALUE}}',
        ],
    ]
);


// Button background color

$this->add_control(
    'od_price_box_button_bg_color',
    [
        'label' => __('Button Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn.black-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ai-btn' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .cr-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);



// end normal tab

$this->end_controls_tab();

// Active tab

$this->start_controls_tab(
    'od_price_box_button_style_active_tab',
    [
        'label' => __('Active', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-1'],
        ],
    ]
);

// Button color

$this->add_control(
    'od_price_box_button_active_color',
    [
        'label' => __('Text Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item.active .it-btn.black-bg' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ai-price-style .it-price-item.active .ai-btn' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_price_box_button_active_hoer_color',
    [
        'label' => __('Text Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item.active .it-btn.black-bg:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ai-price-style .it-price-item.active .ai-btn:hover' => 'color: {{VALUE}}',
        ],
    ]
);


// Button background color


$this->add_control(
    'od_price_box_button_active_bg_color',
    [
        'label' => __('Button Active BG Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-price-item.active .it-btn.black-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ai-price-style .it-price-item.active .ai-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);


$this->add_control(
    'od_price_box_button_active_hover_bg_color',
    [
        'label' => __('Button BG Hover Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}}  .it-price-item .it-btn.black-bg::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}}  .ai-btn:hover::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end active tab

$this->end_controls_tab();

// start hover tab

$this->start_controls_tab(
    'od_price_box_button_style_hover_tab',
    [
        'label' => __('Hover', 'ordainit-toolkit'),
    ]
);

// Button color

$this->add_control(
    'od_price_box_button_hover_color',
    [
        'label' => __('Text Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-btn.hover-2:hover' => 'color: {{VALUE}}',
        ],
    ]
);

// Button background color

$this->add_control(
    'od_price_box_button_hover_bg_color',
    [
        'label' => __('Button Background Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-btn.hover-2::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// end hover tab

$this->end_controls_tab();

$this->end_controls_tabs();

// Button typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_price_box_button_typography',
        'selector' => '{{WRAPPER}} .it-btn',
    ]
);



$this->end_controls_section();
