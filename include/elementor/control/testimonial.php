<?php

use Elementor\Controls_Manager;

// Testimonial Content
$this->start_controls_section(
    'od_testimonial_single_content',
    [
        'label' => __('Testimonial Content', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_testimonial_single_author',
    [
        'label' => __('Author', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Author Name', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Author Name here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_testimonial_single_designation',
    [
        'label' => __('Designation', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Designation', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Author Designation here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_testimonial_single_avatar',
    [
        'label' => esc_html__('Choose Avatar', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/testimonial/avatar-3-3.png',
        ],
    ]
);

$this->add_control(
    'od_testimonial_single_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Testimonial Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your Description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_testimonial_single_star',
    [
        'label' => esc_html__('Select Star', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '5',
        'options' => [
            '1' => esc_html__('1 Star', 'ordainit-toolkit'),
            '2' => esc_html__('2 Stars', 'ordainit-toolkit'),
            '3' => esc_html__('3 Stars', 'ordainit-toolkit'),
            '4' => esc_html__('4 Stars', 'ordainit-toolkit'),
            '5' => esc_html__('5 Stars', 'ordainit-toolkit'),
        ],
        'condition' => [
            'od_testimonial_single_star_switcher' => 'yes',
        ],
    ]

);

$this->end_controls_section();

// Rating Star Switcher
$this->start_controls_section(
    'od_testimonial_single_star_switcher_section',
    [
        'label' => __('Rating Star Switcher', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_single_star_switcher',
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
    'od_testimonial_single_quote_switcher_section',
    [
        'label' => __('Quote Icon Switcher', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_single_quote_switcher',
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


// Style starts
$this->start_controls_section(
    'od_testimonial_single_style',
    [
        'label' => __('Testimonial Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Testimonial Box
$this->add_control(
    'od_testimonial_single_testimonial_bg_color',
    [
        'label' => esc_html__('Testimonial BG', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-inner-style-2 .pg-testimonial-item' => 'background: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_testimonial_single_border_color',
    [
        'label' => esc_html__('Testimonial Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-inner-style-2 .pg-testimonial-text' => 'border-color: {{VALUE}}',
        ],
    ]
);


// Author Style
$this->add_control(
    'od_testimonial_single_author_color',
    [
        'label' => esc_html__('Author Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dt-testimonial-author-info h5' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_single_author_typography',
        'selector' => '{{WRAPPER}} .dt-testimonial-author-info h5',
    ]
);

// Designation Style
$this->add_control(
    'od_testimonial_single_designation_color',
    [
        'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-inner-style-2 .dt-testimonial-author-info span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_single_designation_typography',
        'selector' => '{{WRAPPER}} .it-testimonial-inner-style-2 .dt-testimonial-author-info span',
    ]
);

// Description Style
$this->add_control(
    'od_testimonial_single_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pg-testimonial-text p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_single_description_typography',
        'selector' => '{{WRAPPER}} .pg-testimonial-text p',
    ]
);


// Rating star style
$this->add_control(
    'od_testimonial_single_star_color',
    [
        'label' => esc_html__('Rating Star Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-ratting span svg path' => 'fill: {{VALUE}}',
        ],
        'condition' => [
            'od_testimonial_single_star_switcher' => 'yes'
        ],
    ]
);

// Quote style
$this->add_control(
    'od_testimonial_single_quote_color',
    [
        'label' => esc_html__('Quote Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-quote svg path' => 'fill: {{VALUE}}',
        ],
        'condition' => [
            'od_testimonial_single_quote_switcher' => 'yes'
        ],
    ]
);



$this->end_controls_section();
