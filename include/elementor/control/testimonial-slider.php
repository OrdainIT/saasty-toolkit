<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_testimonial_slider_layout',
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
            'layout-5' => esc_html__('Layout 5', 'ordainit-toolkit'),
            'layout-6' => esc_html__('Layout 6', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Background
$this->start_controls_section(
    'od_testimonial_slider_background',
    [
        'label' => __('Background Image', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-3', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_background_image',
    [
        'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

$this->end_controls_section();


// Testimonial Title Content
$this->start_controls_section(
    'od_testimonial_slider_heading_content',
    [
        'label' => __('Testimonial Title Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_heading_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Testimonial Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_testimonial_slider_heading_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Testimonial Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Subtitle title here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_heading_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Testimonial Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4']
        ],
    ]
);

$this->end_controls_section();


// Testimonial List Content
$this->start_controls_section(
    'od_testimonial_slider_section_content_list',
    [
        'label' => __('Testimonial Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_lists',
    [
        'label' => esc_html__('Testimonial List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_testimonial_slider_list_author',
                'label' => esc_html__('Author', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Testimonial Author', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_slider_list_avatar',
                'label' => esc_html__('Choose Avatar', 'ordainit-toolkit'),
                'description' => esc_html__('It works for layout - 2 to 6'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ],
            [
                'name' => 'od_testimonial_slider_list_designation',
                'label' => esc_html__('Designation', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Testimonial Designation', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_slider_list_description',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Testimonial Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_slider_list_rating',
                'label' => esc_html__('Select Star', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'description' => esc_html__('It works for layout - 1'),
                'default' => '5',
                'options' => [
                    '1' => esc_html__('1 Star', 'ordainit-toolkit'),
                    '2' => esc_html__('2 Stars', 'ordainit-toolkit'),
                    '3' => esc_html__('3 Stars', 'ordainit-toolkit'),
                    '4' => esc_html__('4 Stars', 'ordainit-toolkit'),
                    '5' => esc_html__('5 Stars', 'ordainit-toolkit'),
                ],

            ],
            [
                'name' => 'od_testimonial_slider_list_icon_image',
                'label' => esc_html__('Choose Icon Image', 'ordainit-toolkit'),
                'description' => esc_html__('It works for layout - 1'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ],

        ],
        'default' => [
            [
                'od_testimonial_slider_list_author' => esc_html__('Francis Roman', 'ordainit-toolkit'),
            ],
            [
                'od_testimonial_slider_list_author' => esc_html__('Isco Alarcon', 'ordainit-toolkit'),
            ],
            [
                'od_testimonial_slider_list_author' => esc_html__('Sergio Ramos', 'ordainit-toolkit'),
            ],

        ],
        'title_field' => '{{{ od_testimonial_slider_list_author }}}',
    ]
);

$this->end_controls_section();


// Thumbnail
$this->start_controls_section(
    'od_testimonial_slider_thumbnail_section',
    [
        'label' => __('Thumbnail', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-6']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_thumbnail_image',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],

    ]
);

$this->end_controls_section();


// Shape
$this->start_controls_section(
    'od_testimonial_slider_shape_section',
    [
        'label' => __('Shape', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_shape_image_1',
    [
        'label' => esc_html__('Choose Shape Image 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-6']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_shape_image_2',
    [
        'label' => esc_html__('Choose Shape Image 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_shape_image_3',
    [
        'label' => esc_html__('Choose Shape Image 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_shape_image_4',
    [
        'label' => esc_html__('Choose Shape Image 4', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_shape_image_5',
    [
        'label' => esc_html__('Choose Shape Image 5', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_shape_image_6',
    [
        'label' => esc_html__('Choose Shape Image 6', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_shape_image_7',
    [
        'label' => esc_html__('Choose Shape Image 7', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->end_controls_section();


// Testimonial settings
$this->start_controls_section(
    'od_testimonial_slider_settings',
    [
        'label' => __('Testimonial Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_autoplay',
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


// Rating Star Switcher
$this->start_controls_section(
    'od_testimonial_slider_star_switcher_section',
    [
        'label' => __('Rating Star Switcher', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_star_switcher',
    [
        'label' => esc_html__('Show / Hide Star', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();

// Quote Icon Switcher
$this->start_controls_section(
    'od_testimonial_slider_quote_switcher_section',
    [
        'label' => __('Quote Icon Switcher', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_quote_switcher',
    [
        'label' => esc_html__('Show / Hide Quote Icon', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();


// Arrow Switcher
$this->start_controls_section(
    'od_testimonial_slider_arrow_switcher_section',
    [
        'label' => __('Testimonial Arrow Switcher', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_switcher',
    [
        'label' => esc_html__('Show / Hide Arrow', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();


// Heading Title Animation
$this->start_controls_section(
    'od_testimonial_slider_heading_title_animation',
    [
        'label' => __('Title Box Animation', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_heading_title_animation_split_in',
    [
        'label' => __('Title Split In', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'right' => __('Right', 'ordainit-toolkit'),
            'left' => __('Left', 'ordainit-toolkit'),
            'up' => __('Top', 'ordainit-toolkit'),
            'down' => __('Bottom', 'ordainit-toolkit'),
        ],
        'default' => 'right',
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Funfact Section

$this->start_controls_section(
    'od_testimonial_funfact_section',
    [
        'label' => esc_html__('Fun Facts', 'ordainit-toolkit'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        'condition' => [
            'od_design_style' => ['layout-4']
        ],
    ]
);

$this->add_control(
    'od_testimonial_funfact_lists',
    [
        'label' => esc_html__('Repeater List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_testimonial_funfact_number',
                'label' => esc_html__('Number', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('0', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_funfact_suffix',
                'label' => esc_html__('Suffix', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('m', 'ordainit-toolkit'),
            ],
            [
                'name' => 'od_testimonial_funfact_description',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_funfact_style',
                'label' => esc_html__('Style', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style-1',
                'options' => [
                    'style-1' => esc_html__('Style 1', 'ordainit-toolkit'),
                    'style-2' => esc_html__('Style 2', 'ordainit-toolkit'),
                    'style-3' => esc_html__('Style 3', 'ordainit-toolkit'),
                    'style-4' => esc_html__('Style 4', 'ordainit-toolkit'),
                ],
            ],
        ],
        'default' => [
            [
                'od_testimonial_funfact_number' => esc_html__('35', 'ordainit-toolkit'),
                'od_testimonial_funfact_suffix' => esc_html__('m', 'ordainit-toolkit'),
                'od_testimonial_funfact_description' => esc_html__('Active Users', 'ordainit-toolkit'),
                'od_testimonial_funfact_style' => 'style-1',
            ],
            [
                'od_testimonial_funfact_number' => esc_html__('240', 'ordainit-toolkit'),
                'od_testimonial_funfact_suffix' => esc_html__('+', 'ordainit-toolkit'),
                'od_testimonial_funfact_description' => esc_html__('Trusted Companies', 'ordainit-toolkit'),
                'od_testimonial_funfact_style' => 'style-2',
            ],
        ],
        'title_field' => '{{{ od_testimonial_funfact_description }}}',
    ]
);

$this->end_controls_section();




// Style Section Starts

// Testimonial Style
$this->start_controls_section(
    'od_testimonial_slider_style',
    [
        'label' => __('Testimonial Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-3', 'layout-4', 'layout-5', 'layout-6']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_bg_color',
    [
        'label' => esc_html__('Testimonial BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-area.green-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .cr-testimonial-style.dark-green-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ss-testimonial-style.blue-bg' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ag-testimonial-style.black-2-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

// Testimonial Style
$this->start_controls_section(
    'od_testimonial_slider_dimension_style',
    [
        'label' => __('Testimonial Dimension Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-3']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_margin',
    [
        'label' => esc_html__('Margin', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-ptb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_padding',
    [
        'label' => esc_html__('Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-ptb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();


// Heading Style
$this->start_controls_section(
    'od_testimonial_slider_heading_style',
    [
        'label' => __('Testimonial Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,

    ]
);

//Title
$this->add_control(
    'od_testimonial_slider_heading_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .dt-section-title-2' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ag-section-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_heading_title_span_gradient_start_color',
    [
        'label' => esc_html__('Title Gradient Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-section-title span' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_testimonial_slider_heading_title_span_gradient_end_color.VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
        'condition' => [
            'od_design_style' => ['layout-6'],
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_heading_title_span_gradient_end_color',
    [
        'label' => esc_html__('Title Gradient End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-section-title span' => 'background: linear-gradient(90deg, {{od_testimonial_slider_heading_title_span_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
        'condition' => [
            'od_design_style' => ['layout-6'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_slider_heading_title_typography',
        'selector' => '
            {{WRAPPER}} .it-section-title,
            {{WRAPPER}} .dt-section-title-2,
            {{WRAPPER}} .pg-section-title,
            {{WRAPPER}} .cr-section-title,
            {{WRAPPER}} .ss-section-title,
            {{WRAPPER}} .ag-section-title
        ',
    ]
);

//Sub Title
$this->add_control(
    'od_testimonial_slider_heading_subtitle_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-section-subtitle' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-section-subtitle' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-section-subtitle' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-section-subtitle' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ag-section-subtitle' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_heading_subtitle_bg_color',
    [
        'label' => esc_html__('Subtitle BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-section-subtitle.white-style' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-3']
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_slider_heading_subtitle_typography',
        'selector' => '
            {{WRAPPER}} .dt-section-subtitle,
            {{WRAPPER}} .pg-section-subtitle,
            {{WRAPPER}} .cr-section-subtitle,
            {{WRAPPER}} .ss-section-subtitle,
            {{WRAPPER}} .ag-section-subtitle,
        ',
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
        ],
    ]
);

//Description
$this->add_control(
    'od_testimonial_slider_heading_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-section-title-box p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .cr-section-title-box p' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4']
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_slider_heading_description_typography',
        'selector' => '
            {{WRAPPER}} .it-section-title-box p,
            {{WRAPPER}} .pg-section-title-box p,
            {{WRAPPER}} .cr-section-title-box p
        ',
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4']
        ],
    ]
);

$this->end_controls_section();


// Testimonial Thumbnail Style
$this->start_controls_section(
    'od_testimonial_slider_thumbnail_style',
    [
        'label' => __('Thumbnail Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_thumbnail_bg_color',
    [
        'label' => esc_html__('Thumbnail BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-thumb::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

// Testimonial Content Style Starts
$this->start_controls_section(
    'od_testimonial_slider_content_style',
    [
        'label' => __('Testimonial Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Content BG
$this->add_control(
    'od_testimonial_slider_content_bg_color',
    [
        'label' => esc_html__('Content BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-item' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-3', 'layout-4', 'layout-5']
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_content_border_color',
    [
        'label' => esc_html__('Content Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-testimonial-style .pg-testimonial-item' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-5']
        ],
    ]
);


$this->add_control(
    'hr_3',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
        'condition' => [
            'od_design_style' => ['layout-3', 'layout-4', 'layout-5']
        ],
    ]
);

// Author Style
$this->add_control(
    'od_testimonial_slider_author_color',
    [
        'label' => esc_html__('Author Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-author-info h5' => 'color: {{VALUE}}',
            '{{WRAPPER}} .dt-testimonial-author-info h5' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_slider_author_typography',
        'selector' => '
            {{WRAPPER}} .it-testimonial-author-info h5,
            {{WRAPPER}} .dt-testimonial-author-info h5
        ',
    ]
);

// Designation Style
$this->add_control(
    'od_testimonial_slider_designation_color',
    [
        'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-author-info span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .dt-testimonial-author-info span' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5']
        ],
    ]
);


$this->add_control(
    'od_testimonial_slider_designation_gradient_start_color',
    [
        'label' => esc_html__('Designation Gradient Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-testimonial-style .it-testimonial-author-info span' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_testimonial_slider_designation_gradient_end_color.VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
        'condition' => [
            'od_design_style' => ['layout-6'],
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_designation_gradient_end_color',
    [
        'label' => esc_html__('Designation Gradient End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-testimonial-style .it-testimonial-author-info span' => 'background: linear-gradient(90deg, {{od_testimonial_slider_designation_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
        ],
        'condition' => [
            'od_design_style' => ['layout-6'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_slider_designation_typography',
        'selector' => '
            {{WRAPPER}} .it-testimonial-author-info span,
            {{WRAPPER}} .dt-testimonial-author-info span,
            {{WRAPPER}} .ag-testimonial-style .it-testimonial-author-info span
        ',
    ]
);

// Description Style
$this->add_control(
    'od_testimonial_slider_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-text' => 'color: {{VALUE}}',
            '{{WRAPPER}} .dt-testimonial-text p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-testimonial-text p' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_slider_description_typography',
        'selector' => '
            {{WRAPPER}} .it-testimonial-text,
            {{WRAPPER}} .dt-testimonial-text p,
            {{WRAPPER}} .pg-testimonial-text p
        ',
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
        ],
    ]
);

// Rating star style
$this->add_control(
    'od_testimonial_slider_star_color',
    [
        'label' => esc_html__('Rating Star Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-ratting span svg path' => 'fill: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-5', 'layout-6'],
            'od_testimonial_slider_star_switcher' => 'yes'
        ],
    ]
);

// Quote style
$this->add_control(
    'od_testimonial_slider_quote_color',
    [
        'label' => esc_html__('Quote Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-quote svg path' => 'fill: {{VALUE}}',
            '{{WRAPPER}} .cr-testimonial-style .cr-testimonial-quote svg path' => 'fill: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4'],
            'od_testimonial_slider_quote_switcher' => 'yes'
        ],
    ]
);
$this->add_control(
    'od_testimonial_slider_quote_bg_color',
    [
        'label' => esc_html__('Quote Icon BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .cr-testimonial-style .cr-testimonial-quote' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4'],
            'od_testimonial_slider_quote_switcher' => 'yes'
        ],
    ]
);

$this->end_controls_section();

// Arrow Style
$this->start_controls_section(
    'od_testimonial_slider_arrow_style',
    [
        'label' => __('Testimonial Arrow Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-5'],
            'od_testimonial_slider_arrow_switcher' => 'yes'
        ],
    ]
);

$this->start_controls_tabs(
    'od_testimonial_slider_arrow_style_tabs',
);

$this->start_controls_tab(
    'od_testimonial_slider_arrow_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_style_normal_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-arrow-box button span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .pg-testimonial-arrow-box button span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_style_normal_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-arrow-box button span' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .pg-testimonial-arrow-box button span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_style_normal_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'description' => esc_html__('It works for layout - 5'),
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-arrow-box button span' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_testimonial_slider_arrow_style_active_tab',
    [
        'label' => esc_html__('Active', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_style_active_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'description' => esc_html__('It works for layout - 1'),
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-arrow-box button.active span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow__style_active_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'description' => esc_html__('It works for layout - 1'),
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-arrow-box button.active span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_testimonial_slider_arrow_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_style_hover_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-arrow-box button:hover span' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_testimonial_slider_arrow__style_hover_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-arrow-box button:hover span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_style_hover_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'description' => esc_html__('It works for layout - 5'),
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-arrow-box button:hover span' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();


// Funfact Style
$this->start_controls_section(
    'od_testimonial_funfact_style',
    [
        'label' => __('Testimonial Funfact Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-4'],
        ],
    ]
);

$this->add_control(
    'od_testimonial_funfact_number_color',
    [
        'label' => esc_html__('Number Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-item h5' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Number Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_funfact_number_typography',
        'selector' => '{{WRAPPER}} .dt-funfact-item h5',
    ]
);

$this->add_control(
    'od_testimonial_funfact_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-funfact-item p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_funfact_description_typography',
        'selector' => '{{WRAPPER}} .dt-funfact-item p',
    ]
);

$this->end_controls_section();

// Arrow Style
$this->start_controls_section(
    'od_testimonial_slider_arrow_style_2',
    [
        'label' => __('Testimonial Arrow Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-6'],
            'od_testimonial_slider_arrow_switcher' => 'yes'
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_color_2',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ag-testimonial-style .it-testimonial-arrow-box button span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_bg_gradient_start_color',
    [
        'label' => esc_html__('Gradient BG Start Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#0bcf77',
        'selectors' => [
            '{{WRAPPER}} .ag-testimonial-style .it-testimonial-arrow-box button span' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_testimonial_slider_arrow_bg_gradient_end_color.VALUE}} 100%);',
        ],
    ]
);

$this->add_control(
    'od_testimonial_slider_arrow_bg_gradient_end_color',
    [
        'label' => esc_html__('Gradient BG End Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#69d619',
        'selectors' => [
            '{{WRAPPER}} .ag-testimonial-style .it-testimonial-arrow-box button span' => 'background: linear-gradient(90deg, {{od_testimonial_slider_arrow_bg_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
        ],
    ]
);

$this->end_controls_section();
