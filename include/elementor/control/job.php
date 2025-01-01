<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_job_section_content',
    [
        'label' => __('Job Query', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_job_count',
    [
        'label' => __('Job Count', 'ordainit-toolkit'),
        'type' => Controls_Manager::NUMBER,
        'default' => 3,
    ]
);

$this->add_control(
    'od_job_orderby',
    [
        'label' => __('Order', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'ASC' => __('ASC', 'ordainit-toolkit'),
            'DESC' => __('DESC', 'ordainit-toolkit'),
        ],
        'default' => 'ASC',
    ]
);

// need job category

$this->add_control(
    'od_job_category',
    [
        'label' => __('Select Job Category', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => od_get_all_categories_for_job(),
    ]
);

// job button text

$this->add_control(
    'od_job_btn_text',
    [
        'label' => __('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => __('View Details', 'ordainit-toolkit'),
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
