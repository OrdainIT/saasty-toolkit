<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Controls_Manager;


use Elementor\Widget_Base;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Od_Blog_Post extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'od-blog';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('OD Blog', 'ordainit-toolkit');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'od-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['ordainit-toolkit'];
    }



    // Button func
    private function set_button_attributes($link_type, $page_link, $custom_link, $attribute_name, $class)
    {
        if ('2' == $link_type) {
            $this->add_render_attribute($attribute_name, 'href', get_permalink($page_link));
            $this->add_render_attribute($attribute_name, 'target', '_self');
            $this->add_render_attribute($attribute_name, 'rel', 'nofollow');
            $this->add_render_attribute($attribute_name, 'class', $class);
        } else {
            if (! empty($custom_link['url'])) {
                $this->add_link_attributes($attribute_name, $custom_link);
                $this->add_render_attribute($attribute_name, 'class', $class);
            }
        }
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

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
    }

    /**
     * Render the widget ouodut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $od_blog_section_title_switcher = $settings['od_blog_section_title_switcher'];
        $od_blog_section_title = $settings['od_blog_section_title'];
        $od_blog_section_description = $settings['od_blog_section_description'];

        $od_blog_section_blog_btn = $settings['od_blog_section_blog_btn'];



        $od_blog_section_blog_post_per_page = $settings['od_blog_section_blog_post_per_page'];
        $od_category_select = $settings['od_category_select'];
        $od_blog_post_orderby = $settings['od_blog_post_orderby'];

        $od_btn_text = $settings['od_btn_text'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];

        // Post Query

        // Check if category is selected
        if (!empty($od_category_select)) {
            // If categories are selected, add tax_query
            $args = array(
                'post_type'      => 'post', // Fetch blog posts
                'posts_per_page' => $od_blog_section_blog_post_per_page, // Number of posts to display
                'order'          => $od_blog_post_orderby, // Order of posts
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category', // Taxonomy to filter by
                        'field'    => 'term_id',  // Field type ('term_id', 'slug', or 'name')
                        'terms'    => $od_category_select, // Selected category IDs (single or multiple)
                        'operator' => 'IN', // Show posts matching any of the selected categories
                    ),
                ),
            );
        } else {
            // If no category is selected, show all posts
            $args = array(
                'post_type'      => 'post', // Fetch blog posts
                'posts_per_page' => $od_blog_section_blog_post_per_page, // Number of posts to display
                'order'          => $od_blog_post_orderby, // Order of posts
            );
        }


        $blog_query = new \WP_Query($args);


?>

        <?php if ($settings['od_design_style']  == 'layout-2'):

            $od_blog_section_shap_img_1 = $settings['od_blog_section_shap_img_1'];
            $od_blog_section_shap_img_2 = $settings['od_blog_section_shap_img_2'];
            $od_blog_section_shap_img_3 = $settings['od_blog_section_shap_img_3'];

            $od_blog_section_subtitle = $settings['od_blog_section_subtitle'];


        ?>

            <!-- blog-area-start -->
            <div class="ss-blog-area p-relative z-index-1 blue-bg pb-140">
                <img class="ss-blog-shape-1 d-none d-lg-block" src="<?php echo esc_url($od_blog_section_shap_img_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="ss-blog-shape-2" src="<?php echo esc_url($od_blog_section_shap_img_2['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="ss-blog-shape-3" src="<?php echo esc_url($od_blog_section_shap_img_3['url'], 'ordainit-toolkit'); ?>" alt="">
                <div class="container">
                    <?php if (!empty($od_blog_section_title_switcher)): ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="ss-section-title-box text-center mb-50">
                                    <span class="ss-section-subtitle it_text_reveal_anim"><?php echo esc_html($od_blog_section_subtitle, 'ordainit-toolkit'); ?></span>
                                    <h4 class="ss-section-title pb-15 it_text_reveal_anim"><?php echo esc_html($od_blog_section_title, 'ordainit-toolkit'); ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">

                        <?php
                        $i = -1;

                        if ($blog_query->have_posts()) :
                            while ($blog_query->have_posts()) : $blog_query->the_post();

                                $i++;

                        ?>
                                <div class="col-xl-4 col-xl-4 col-md-6 it-fade-anim" data-fade-from="bottom" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                                    <div class="ss-blog-item mb-30">
                                        <div class="ss-blog-thumb p-relative mb-85">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                // Post Thumbnail
                                                if (has_post_thumbnail()) :
                                                    the_post_thumbnail('medium', ['alt' => get_the_title()]);
                                                endif;
                                                ?>
                                            </a>
                                            <div class="ss-blog-date-wrap">
                                                <div class="ss-blog-date">
                                                    <i><?php echo get_the_date('d'); ?></i>
                                                    <span><?php echo get_the_date('M, Y'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ss-blog-content">
                                            <h4 class="ss-blog-title">
                                                <a class="border-line-white" href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>
                                            <p class="mb-35">
                                                <?php echo wp_trim_words(get_the_excerpt(), 13, '...'); ?>
                                            </p>
                                            <a class="ss-btn" href="<?php the_permalink(); ?>">
                                                <?php echo esc_html($od_blog_section_blog_btn, 'ordainit-toolkit'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            <?php endwhile;
                            wp_reset_postdata(); // Reset the query to avoid conflicts
                        else : ?>
                            <p>No posts found.</p>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <!-- blog-area-end -->
        <?php else:

            //Set attributes for Button
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'it-btn'
            );


        ?>


            <!-- blog-area-start -->
            <div class="it-blog-area it-blog-mlr">
                <div class="it-blog-wrap">
                    <div class="container">
                        <?php if (!empty($od_blog_section_title_switcher)): ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="it-section-title-box text-center it-text-anim mb-55">
                                        <?php if (!empty($od_blog_section_title)): ?>
                                            <h4 class="it-section-title it-split-text it-split-in-right mb-15"><?php echo esc_html($od_blog_section_title, 'ordainit-toolkit'); ?></h4>
                                        <?php endif; ?>
                                        <p><?php echo od_kses($od_blog_section_description, 'ordainit-toolkit'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">

                            <?php


                            $i = -1;
                            if ($blog_query->have_posts()) :
                                while ($blog_query->have_posts()) : $blog_query->the_post();
                                    $i++;
                            ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 it-fade-anim" data-fade-from="bottom" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                                        <div class="it-blog-item zoom white-bg mb-30">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="it-blog-thumb img-zoom">
                                                    <a href="<?php the_permalink(); ?>">

                                                        <img class="w-100" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">

                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="it-blog-content">
                                                <div class="it-blog-meta mb-25">
                                                    <span><?php echo get_the_date('F d, Y'); ?></span>
                                                    <?php
                                                    $categories = get_the_category();
                                                    if (!empty($categories)) : ?>
                                                        <i><?php echo esc_html($categories[0]->name); ?></i>
                                                    <?php endif; ?>
                                                </div>
                                                <h4 class="it-blog-title mb-20">
                                                    <a class="border-line-theme title-hover" href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h4>
                                                <p><?php echo wp_trim_words(get_the_excerpt(), 13, '...'); ?></p>
                                                <a class="it-blog-link border-line-theme title-hover" href="<?php the_permalink(); ?>">
                                                    <?php echo esc_html($od_blog_section_blog_btn, 'ordainit-toolkit'); ?>
                                                    <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="currentcolor"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif; ?>


                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="it-blog-button text-center mt-30 it-fade-anim" data-fade-from="top" data-ease="bounce" data-delay=".5">
                                    <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                        <?php echo esc_html($od_btn_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- blog-area-end -->

        <?php endif; ?>





        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Blog_Post());
