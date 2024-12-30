<?php

use Elementor\Controls_Manager;


// Content
$this->start_controls_section(
    'od_water_mark_text_content',
    [
        'label' => __('Water Mark Text', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_water_mark_text',
    [
        'label' => esc_html__('Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('OrdainIt', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your text here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();
