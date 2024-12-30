<?php

use Elementor\Controls_Manager;

// Content
$this->start_controls_section(
    'od_webgl_img_content',
    [
        'label' => __('Webgl Img Content', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_webgl_img_thumbnail',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

$this->add_control(
    'od_webgl_img_anim_thumbnail',
    [
        'label' => esc_html__('Choose Animation Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/webgl/pattern-1.jpg',
        ],
    ]
);

$this->end_controls_section();