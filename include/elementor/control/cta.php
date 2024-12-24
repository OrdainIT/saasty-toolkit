<?php

use Elementor\Controls_Manager;

// Layout
$this->start_controls_section(
    'od_cta_layout',
    [
        'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_cta_design_style',
    [
        'label' => esc_html__('Select Layout', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'layout-1' => esc_html__('Layout 1', 'ordainit-toolkit'),
            'layout-2' => esc_html__('Layout 2', 'ordainit-toolkit'),
            'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
            'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
            'layout-5' => esc_html__('Layout 5', 'ordainit-toolkit'),
            'layout-6' => esc_html__('Layout 6', 'ordainit-toolkit'),
            'layout-7' => esc_html__('Layout 7', 'ordainit-toolkit'),
            'layout-8' => esc_html__('Layout 8', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Background
$this->start_controls_section(
    'od_cta_section_background',
    [
        'label' => __('Background Image', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-2', 'layout-4', 'layout-5', 'layout-6', 'layout-7']
        ],
    ]
);

$this->add_control(
    'od_cta_background_image',
    [
        'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/cta/cta-bg-1-1.jpg',
        ],
    ]
);

$this->end_controls_section();

// Content
$this->start_controls_section(
    'od_cta_section_content',
    [
        'label' => __('CTA Title & Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_section_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD CTA Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_cta_section_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD CTA Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_cta_design_style' => ['layout-6']
        ],
    ]
);

$this->add_control(
    'od_cta_section_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD CTA Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-6']
        ],
    ]
);

$this->end_controls_section();

// CTA Button Content
$this->start_controls_section(
    'od_cta_btn_content',
    [
        'label' => __('CTA Button', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-5', 'layout-6', 'layout-7', 'layout-8']
        ],
    ]
);

$this->add_control(
    'od_cta_btn_text',
    [
        'label' => __('Btn Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Button Text', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type btn text here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_cta_btn_url',
    [
        'label' => __('Btn Url', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type btn url here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

// CTA Button 2 Content
$this->start_controls_section(
    'od_cta_btn_2_content',
    [
        'label' => __('CTA Button 2', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-5']
        ],
    ]
);

$this->add_control(
    'od_cta_btn_2_text',
    [
        'label' => __('Btn Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Button Text 2', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type btn text here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_cta_btn_2_url',
    [
        'label' => __('Btn Url', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type btn url here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

// CTA Form
$this->start_controls_section(
    'od_cta_form',
    [
        'label' => __('CTA Form', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_cta_form_list',
    [
        'label'   => esc_html__('Select Form', 'odcore'),
        'type'    => Controls_Manager::SELECT,
        'default' => '0',
        'options' => $this->get_od_contact_form(),
    ]
);

$this->end_controls_section();

// CTA Link Content
$this->start_controls_section(
    'od_cta_link_content',
    [
        'label' => __('CTA Link Content', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_cta_link_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Already a member?', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_cta_link_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Sign In', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_cta_link_url',
    [
        'label' => __('URL', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type url here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

// CTA Shape
$this->start_controls_section(
    'od_cta_shape',
    [
        'label' => __('CTA Shape', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8']
        ],
    ]
);

$this->add_control(
    'od_cta_shape_image_1',
    [
        'label' => esc_html__('Choose Shape Image 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/shape/cta-shape-2-1.png',
        ],
    ]
);

$this->add_control(
    'od_cta_shape_image_2',
    [
        'label' => esc_html__('Choose Shape Image 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/shape/cta-shape-2-2.png',
        ],
    ]
);

$this->add_control(
    'od_cta_shape_image_3',
    [
        'label' => esc_html__('Choose Shape Image 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'description' => 'It will works only for layout-5 & layout-8',
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/shape/cta-shape-5-4.png',
        ],
    ]
);

$this->add_control(
    'od_cta_shape_image_4',
    [
        'label' => esc_html__('Choose Shape Image 4', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'description' => 'It will works only for layout-5',
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/shape/cta-shape-5-5.png',
        ],
    ]
);


$this->end_controls_section();


// CTA Info Section
$this->start_controls_section(
    'od_cta_info',
    [
        'label' => __('CTA Info', 'ordainit-toolkit'),
        'condition' => [
            'od_cta_design_style' => ['layout-6']
        ],
    ]
);

$this->add_control(
    'od_cta_info_switcher',
    [
        'label' => esc_html__('Show CTA Info', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'od_cta_info_lists',
    [
        'label' => esc_html__('Info List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_cta_info_list_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],

        ],
        'default' => [
            [
                'od_cta_info_list_title' => esc_html__('Title #1', 'ordainit-toolkit'),
            ],
            [
                'od_cta_info_list_title' => esc_html__('Title #2', 'ordainit-toolkit'),
            ],
            [
                'od_cta_info_list_title' => esc_html__('Title #2', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_cta_info_list_title }}}',
        'condition' => [
            'od_cta_info_switcher' => 'yes',
        ],
    ]
);

$this->end_controls_section();




// Style Starts

// CTA style Starts
$this->start_controls_section(
    'od_cta_style',
    [
        'label' => __('CTA Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-5', 'layout-8']
        ],
    ]
);

$this->add_control(
    'od_cta_bg_color',
    [
        'label' => esc_html__('CTA BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .gray-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .pg-cta-wrap' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .blue-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .black-2-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

// CTA Wrap style Starts
$this->start_controls_section(
    'od_cta_wrap_style',
    [
        'label' => __('CTA Wrap Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_cta_design_style' => ['layout-8']
        ],
    ]
);


$this->add_control(
    'od_cta_wrap_bg_gradient',
    [
        'label' => esc_html__('CTA Wrap BG Gradient', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'rows' => '3',
        'default' => 'linear-gradient(90deg, #0bcf77 0%, #69d619 100%)',
        'selectors' => [
            '{{WRAPPER}} .ag-cta-style .ai-cta-wrap' => 'background: {{VALUE}}',
        ],
        'label_block' => true,
    ]
);

$this->end_controls_section();

// CTA Title & Content Starts
$this->start_controls_section(
    'od_cta_content_style',
    [
        'label' => __('CTA Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_cta_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title-2' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-cta-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ag-section-title' => 'color: {{VALUE}}',
        ],

    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_title_typography',
        'selector' => '
            {{WRAPPER}} .it-section-title-2, 
            {{WRAPPER}} .it-section-title,
            {{WRAPPER}} .pg-section-title,
            {{WRAPPER}} .cr-section-title,
            {{WRAPPER}} .ss-cta-title,
            {{WRAPPER}} .ag-section-title
        ',
    ]
);

$this->add_control(
    'od_cta_subtitle_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_cta_design_style' => ['layout-6']
        ],

    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
        'condition' => [
            'od_cta_design_style' => ['layout-6']
        ],
    ]
);

$this->add_control(
    'od_cta_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-section-title-box p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-6']
        ],

    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_description_typography',
        'selector' => '
            {{WRAPPER}} .it-section-title-box p,
            {{WRAPPER}} .pg-section-title-box p,
            {{WRAPPER}} .it-section-title-box p
        ',
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-6']
        ],
    ]
);

$this->end_controls_section();


// Contact Form Style
$this->start_controls_section(
    'od_cta_contact_form_style',
    [
        'label' => __('Contact Form Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_cta_contact_form_bg_color',
    [
        'label' => esc_html__('Form Bg Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-cta-input-box form input' => 'background-color: {{VALUE}}',

        ],
    ]
);

$this->add_control(
    'od_cta_contact_form_focus_color',
    [
        'label' => esc_html__('Focus Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-cta-input-box form input:focus' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_contact_form_placeholder_color',
    [
        'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-cta-input-box form input::placeholder' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_contact_form_text_color',
    [
        'label' => esc_html__('Input Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-cta-input-box form input' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

// Button
$this->start_controls_tabs(
    'od_cta_contact_form_style_tabs'
);

// Normal
$this->start_controls_tab(
    'od_cta_contact_form_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_contact_form_btn_style_normal_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_contact_form_btn_style_normal_bgcolor',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_cta_contact_form_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_contact_form_btn_style_hover_color',
    [
        'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_cta_contact_form_btn_style_hover_bgcolor',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
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

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_contact_form_btn_typography',
        'selector' => '{{WRAPPER}} .it-btn',
    ]
);

$this->end_controls_section();




// CTA Button Style
$this->start_controls_section(
    'od_cta_btn_style',
    [
        'label' => __('Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-5', 'layout-6', 'layout-7', 'layout-8']
        ],
    ]
);

// Button
$this->start_controls_tabs(
    'od_cta_btn_style_tabs'
);

// Normal
$this->start_controls_tab(
    'od_cta_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_btn_style_normal_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-btn.green-bg' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-btn' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-btn.white-bg' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-btn' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ag-btn.white-bg' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_btn_style_normal_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .pg-btn.green-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ss-btn' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-btn.white-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .cr-btn' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ag-btn.white-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_cta_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_btn_style_hover_color',
    [
        'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-btn:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-btn:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-btn:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ag-btn:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_cta_btn_style_hover_bgcolor',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .pg-btn::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ss-btn::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .cr-btn::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ag-btn::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();
$this->end_controls_tabs();

$this->add_control(
    'hr_3',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_btn_typography',
        'selector' => '
        {{WRAPPER}} .it-btn,
        {{WRAPPER}} .pg-btn,
        {{WRAPPER}} .ss-btn,
        {{WRAPPER}} .cr-btn,
        {{WRAPPER}} .ag-btn
        ',
    ]
);

$this->end_controls_section();

// CTA Button 2 Style
$this->start_controls_section(
    'od_cta_btn_2_style',
    [
        'label' => __('Button 2 Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_cta_design_style' => ['layout-5']
        ],
    ]
);

// Button
$this->start_controls_tabs(
    'od_cta_btn_2_style_tabs'
);

// Normal
$this->start_controls_tab(
    'od_cta_btn_2_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_btn_2_style_normal_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-btn.border-btn' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_btn_2_style_normal_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-btn.border-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_btn_2_style_normal_border_color',
    [
        'label' => esc_html__('Button Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-btn.border-btn' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_cta_btn_2_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_cta_btn_2_style_hover_color',
    [
        'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-btn.border-btn:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_btn_2_style_hover_bgcolor',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-btn.border-btn::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_btn_2_style_hover_border_color',
    [
        'label' => esc_html__('Button Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-btn.border-btn:hover' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();
$this->end_controls_tabs();

$this->add_control(
    'hr_4',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_btn_2_typography',
        'selector' => '
        {{WRAPPER}} .ss-btn.border-btn,
        ',
    ]
);

$this->end_controls_section();

// CTA Link Style
$this->start_controls_section(
    'od_cta_link_content_style',
    [
        'label' => __('Link Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_cta_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_cta_link_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-cta-link a' => 'color: {{VALUE}}',
        ],

    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_link_title_typography',
        'selector' => '{{WRAPPER}} .it-cta-link a',
    ]
);

$this->add_control(
    'od_cta_link_subtitle_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-cta-link a:last-child' => 'color: {{VALUE}}',
        ],

    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_link_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-cta-link a:last-child',
    ]
);

$this->end_controls_section();

// CTA Link Style
$this->start_controls_section(
    'od_cta_info_style',
    [
        'label' => __('Info Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_cta_design_style' => ['layout-6']
        ],
    ]
);


$this->add_control(
    'od_cta_info_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-cta-wrap .it-cta-info span svg circle' => 'fill: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_cta_info_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ai-cta-wrap .it-cta-info span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_cta_info_title_typography',
        'selector' => '{{WRAPPER}} .ai-cta-wrap .it-cta-info span',
    ]
);

$this->end_controls_section();
