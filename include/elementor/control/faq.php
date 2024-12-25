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
    'od_faq_content',
    [
        'label' => __('Accordion Lists', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_faq_items',
    [
        'label' => __('Accordion Item', 'ordainit-toolkit'),
        'type' => Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_faq_title',
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Accordion Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_faq_content',
                'label' => __('Content', 'ordainit-toolkit'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => od_kses('Accordion Content', 'ordainit-toolkit'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_faq_title' => esc_html__('Accordion Title 1', 'ordainit-toolkit'),
                'od_faq_content' => od_kses('Accordion Content 1', 'ordainit-toolkit'),
            ],
            [
                'od_faq_title' => esc_html__('Accordion Title 2', 'ordainit-toolkit'),
                'od_faq_content' => od_kses('Accordion Content 2', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{od_faq_title}}',
    ]
);



$this->end_controls_section();

$this->start_controls_section(
    'section_style',
    [
        'label' => __('Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'text_transform',
    [
        'label' => __('Text Transform', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => '',
        'options' => [
            '' => __('None', 'ordainit-toolkit'),
            'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
            'lowercase' => __('lowercase', 'ordainit-toolkit'),
            'capitalize' => __('Capitalize', 'ordainit-toolkit'),
        ],
        'selectors' => [
            '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();
