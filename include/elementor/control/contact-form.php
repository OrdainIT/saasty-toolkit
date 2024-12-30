<?php

use Elementor\Controls_Manager;
// Hero Contact Form
$this->start_controls_section(
    'od_contact_form',
    [
        'label' => __('Contact Form', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_contact_form_list',
    [
        'label' => esc_html__('Select Form', 'odcore'),
        'type' => Controls_Manager::SELECT,
        'default' => '0',
        'options' => $this->get_od_contact_form(),
    ]
);

$this->end_controls_section();
