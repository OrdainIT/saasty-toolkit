<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_team_section_content',
    [
        'label' => __('Team Query', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_team_count',
    [
        'label' => __('Team Count', 'ordainit-toolkit'),
        'type' => Controls_Manager::NUMBER,
        'default' => 3,
    ]
);

$this->add_control(
    'od_team_orderby',
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

// need team category
$this->add_control(
    'od_team_category',
    [
        'label' => __('Select Team Category', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => od_get_all_categories_for_team(),
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_team_section_bg_style',
    [
        'label' => __('Team BG', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// need team bg tab color like normal and hover color use elemntor tab
$this->start_controls_tabs(
    'od_team_section_bg_style_tabs'
);

// Normal tab

$this->start_controls_tab(
    'od_team_section_bg_style__normal_tab',
    [
        'label' => esc_html__('Normal', 'textdomain'),
    ]
);

// need team bg color
$this->add_control(
    'od_team_bg_normal_color',
    [
        'label' => __('BG Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

// border color
$this->add_control(
    'od_team_border_normal_color',
    [
        'label' => __('Border Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Hover tab

$this->start_controls_tab(
    'od_team_section_bg_style__hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_bg_hover_color',
    [
        'label' => __('BG Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

// border color
$this->add_control(
    'od_team_border_hover_color',
    [
        'label' => __('Border Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover' => 'border-color: {{VALUE}}',
        ],
    ]
);




$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

$this->start_controls_section(
    'od_team_section_content_style',
    [
        'label' => __('Team content', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// write elementor heading control for team title
$this->add_control(
    'od_team_title_heading',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

// write tab control for team title
$this->start_controls_tabs(
    'od_team_title_style_tabs'
);

// Normal tab

$this->start_controls_tab(
    'od_team_title_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

// write control for team title color
$this->add_control(
    'od_team_title_color',
    [
        'label' => __('Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-title' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_tab();

// Hover tab

$this->start_controls_tab(
    'od_team_title_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

// write control for team title color

$this->add_control(
    'od_team_title_hover_color',
    [
        'label' => __('Title Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover .it-team-title' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_team_title_typography',
        'selector' => '{{WRAPPER}} .it-team-title',
    ]
);




// Heading for team designation

$this->add_control(
    'od_team_designation_heading',
    [
        'label' => esc_html__('Designation', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

// write tab control for team designation

$this->start_controls_tabs(
    'od_team_designation_style_tabs'
);

// Normal tab

$this->start_controls_tab(
    'od_team_designation_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

// write control for team designation color

$this->add_control(
    'od_team_designation_color',
    [
        'label' => __('Designation Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-content span' => 'color: {{VALUE}}',
        ],
    ]
);

// end normal tab

$this->end_controls_tab();

// Hover tab

$this->start_controls_tab(
    'od_team_designation_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

// write control for team designation color

$this->add_control(
    'od_team_designation_hover_color',
    [
        'label' => __('Designation Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover .it-team-content span' => 'color: {{VALUE}}',
        ],
    ]
);

// end hover tab

$this->end_controls_tab();

$this->end_controls_tabs();


// typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_team_designation_typography',
        'selector' => '{{WRAPPER}} .it-team-content span',
    ]
);

// social icon heading

$this->add_control(
    'od_team_social_heading',
    [
        'label' => esc_html__('Social Icons', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

// write tab control for team social icons

$this->start_controls_tabs(
    'od_team_social_style_tabs'
);

// Normal tab

$this->start_controls_tab(
    'od_team_social_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

// write control for team social icon color

$this->add_control(
    'od_team_social_color',
    [
        'label' => __('Social Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a' => 'color: {{VALUE}}',
        ],
    ]
);

// end normal tab

$this->end_controls_tab();

// Hover tab

$this->start_controls_tab(
    'od_team_social_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

// write control for team social icon color


$this->add_control(
    'od_team_social_hover_color',
    [
        'label' => __('Social Icon Color', 'ordainit-toolkit'),
        'type' => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover .it-team-social-box a' => 'color: {{VALUE}}',
        ],
    ]
);

// end hover tab

$this->end_controls_tab();

$this->end_controls_tabs();







$this->end_controls_section();
