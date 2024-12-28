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
    'od_blog_section_title_wrap',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_blog_section_title_switcher',
    [
        'label' => esc_html__('Title & Content Show/Hide', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);



$this->add_control(
    'od_blog_section_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Latest Release News & Articles', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_blog_section_subtitle',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Blogs', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);
$this->add_control(
    'od_blog_section_description',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => od_kses('It is a long established fact that a reader will be distracted <br> by the readable content of a page.', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_blog_section_button_wrap',
    [
        'label' => __('Button', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('View All Blog', 'ordainit-toolkit'),
        'title' => esc_html__('Enter button text', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_link_type',
    [
        'label' => esc_html__('Button Link Type', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            '1' => 'Custom Link',
            '2' => 'Internal Page',
        ],
        'default' => '1',
        'label_block' => true,
    ]
);

$this->add_control(
    'od_btn_link',
    [
        'label' => esc_html__('Button link', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'dynamic' => [
            'active' => true,
        ],
        'placeholder' => esc_html__('htods://your-link.com', 'ordainit-toolkit'),
        'show_external' => false,
        'default' => [
            'url' => '#',
            'is_external' => true,
            'nofollow' => true,
            'custom_attributes' => '',
        ],
        'condition' => [
            'od_btn_link_type' => '1',
        ],
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_page_link',
    [
        'label' => esc_html__('Select Button Page', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => od_get_all_pages(),
        'condition' => [
            'od_btn_link_type' => '2',
        ]
    ]
);


$this->end_controls_section();

$this->start_controls_section(
    'od_blog_section_blog_qery',
    [
        'label' => __('Post Query', 'ordainit-toolkit'),
    ]
);



$this->add_control(
    'od_blog_section_blog_post_per_page',
    [
        'label' => esc_html__('Post Per Page', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('3', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_category_select',
    [
        'label' => esc_html__('Select Post Category', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'multiple' => true,
        'options' => od_get_all_categories(), // Custom function to get categories
    ]
);

$this->add_control(
    'od_blog_post_orderby',
    [
        'label' => esc_html__('Order', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'DESC',
        'options' => [
            'DESC' => esc_html__('DESC', 'ordainit-toolkit'),
            'ASC' => esc_html__('ASC', 'ordainit-toolkit'),
        ],
    ]
);



$this->add_control(
    'od_blog_section_blog_btn',
    [
        'label' => esc_html__('Blog Button Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Read More', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);




$this->end_controls_section();


$this->start_controls_section(
    'od_blog_section_shap',
    [
        'label' => __('Shap', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);


$this->add_control(
    'od_blog_section_shap_img_1',
    [
        'label' => esc_html__('Shap 1', 'textdomain'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);
$this->add_control(
    'od_blog_section_shap_img_2',
    [
        'label' => esc_html__('Shap 2', 'textdomain'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);
$this->add_control(
    'od_blog_section_shap_img_3',
    [
        'label' => esc_html__('Shap 3', 'textdomain'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);





$this->end_controls_section();

$this->start_controls_section(
    'od_blog_section_bg_style',
    [
        'label' => __('Section BG', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


$this->add_control(
    'od_blog_section_bg_color',
    [
        'label' => esc_html__('BG Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-wrap' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .blue-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_blog_section_title_content_style',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_blog_section_title_color',
    [
        'label' => esc_html__('Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-section-title' => 'color: {{VALUE}}',
        ],
    ]
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_section_title_typo',
        'selector' => '{{WRAPPER}} .it-section-title, {{WRAPPER}} .ss-section-title',
    ]
);

$this->add_control(
    'od_blog_section_subtitle_color',
    [
        'label' => esc_html__('Sub Title Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-section-subtitle' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_section_subtitle_typo',
        'selector' => '{{WRAPPER}} .ss-section-subtitle',
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);
$this->add_control(
    'od_blog_section_desc_color',
    [
        'label' => esc_html__('Description Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
    ]
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_section_desc_typo',
        'selector' => '{{WRAPPER}} .it-section-title-box p',
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
    ]
);

$this->end_controls_section();




$this->start_controls_section(
    'od_blog_section_blog_post_style',
    [
        'label' => __('Blog Post', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_blog_post_bg_color',
    [
        'label' => esc_html__('BG Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-item' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ss-blog-item' => 'background-color: {{VALUE}}',
        ],
    ]
);


$this->add_control(
    'od_blog_post_bg_hover_color',
    [
        'label' => esc_html__('BG Hover Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-blog-item:hover' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1'],
        ],
    ]
);


$this->add_control(
    'od_blog_post_title_heading',
    [
        'label' => esc_html__('Title', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->start_controls_tabs(
    'od_blog_post_title_tabs'
);

// Normal
$this->start_controls_tab(
    'od_blog_post_title_normal_tab',
    [
        'label' => esc_html__('Normal', 'textdomain'),
    ]
);
$this->add_control(
    'od_blog_post_title_normal_color',
    [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-blog-title' => 'color: {{VALUE}}',
        ],
    ]
);




$this->end_controls_tab();

// Hover
$this->start_controls_tab(
    'od_blog_post_title_hover_tab',
    [
        'label' => esc_html__('Hover', 'textdomain'),
    ]
);

$this->add_control(
    'od_blog_post_title_hover_color',
    [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-title .title-hover:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-blog-title:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_title_typo',
        'selector' => '{{WRAPPER}} .it-blog-title, {{WRAPPER}}  .ss-blog-title',
    ]
);



$this->add_control(
    'od_blog_post_description_color',
    [
        'label' => esc_html__('Description Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-content p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-blog-content p' => 'color: {{VALUE}}',
        ],
    ]
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_description_typo',
        'selector' => '{{WRAPPER}} .it-blog-content p, {{WRAPPER}} .ss-blog-content p',
    ]
);

$this->add_control(
    'od_blog_post_btn_heading',
    [
        'label' => esc_html__('Button', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);


$this->start_controls_tabs(
    'od_blog_post_btn_tabs'
);

$this->start_controls_tab(
    'od_blog_post_btn__nromal_tab',
    [
        'label' => esc_html__('Normal', 'textdomain'),
    ]
);

$this->add_control(
    'od_blog_post_btn__nromal_bg_color',
    [
        'label' => esc_html__('BG Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-btn' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_blog_post_btn__nromal_color',
    [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-link' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-btn' => 'color: {{VALUE}}',
        ],
    ]
);


$this->end_controls_tab();

$this->start_controls_tab(
    'od_blog_post_btn__hover_tab',
    [
        'label' => esc_html__('Hover', 'textdomain'),
    ]
);

$this->add_control(
    'od_blog_post_btn__hover_bg_color',
    [
        'label' => esc_html__('BG Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-blog-item:hover .ss-btn' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .ss-btn::after' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_blog_post_btn__hover_color',
    [
        'label' => esc_html__('Text Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-link:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-blog-item:hover .ss-btn' => 'color: {{VALUE}}',
        ],
    ]
);


$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_btn__typo',
        'selector' => '{{WRAPPER}} .it-blog-link, {{WRAPPER}} .ss-btn',
    ]
);


$this->add_control(
    'od_blog_post_date_heading',
    [
        'label' => esc_html__('Date', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_blog_post_date_bg_color',
    [
        'label' => esc_html__('Date BG Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-blog-date' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_blog_post_date_color',
    [
        'label' => esc_html__('Date Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-meta span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .ss-blog-date i' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_date_typo',
        'selector' => '{{WRAPPER}}  .it-blog-meta span, {{WRAPPER}}  .ss-blog-date i ',
    ]
);

$this->add_control(
    'od_blog_post_month_year_color',
    [
        'label' => esc_html__('Month Year Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ss-blog-date span' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_month_year_typo',
        'selector' => '{{WRAPPER}}  .ss-blog-date span ',
    ]
);
$this->add_control(
    'od_blog_post_category_heading',
    [
        'label' => esc_html__('Category', 'textdomain'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_blog_post_category_bg_color',
    [
        'label' => esc_html__('Category BG Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-meta i' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_blog_post_category_color',
    [
        'label' => esc_html__('Category Color', 'textdomain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-meta i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-blog-meta span::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_category_typo',
        'selector' => '{{WRAPPER}}  .it-blog-meta i',
    ]
);


$this->end_controls_section();
