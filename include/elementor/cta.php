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
class OD_Cta extends Widget_Base
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
        return 'od-cta';
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
        return __('CTA', 'ordainit-toolkit');
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

    // Contact 7
    public function get_od_contact_form()
    {
        if (! class_exists('WPCF7')) {
            return;
        }
        $od_cfa         = array();
        $od_cf_args     = array('posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form');
        $od_forms       = get_posts($od_cf_args);
        $od_cfa         = ['0' => esc_html__('Select Form', 'odcore')];
        if ($od_forms) {
            foreach ($od_forms as $od_form) {
                $od_cfa[$od_form->ID] = $od_form->post_title;
            }
        } else {
            $od_cfa[esc_html__('No contact form found', 'odcore')] = 0;
        }
        return $od_cfa;
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

        // Layout
        $this->start_controls_section(
            'od_cta_layout',
            [
                'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
            ]
        );
        $this->add_control(
            'od_cta_design_style',
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
                    'layout-7' => esc_html__('Layout 7', 'ordainit-toolkit'),
                    'layout-8' => esc_html__('Layout 8', 'ordainit-toolkit'),
                    'layout-9' => esc_html__('Layout 9', 'ordainit-toolkit'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Background
        $this->start_controls_section(
            'od_cta_section_background',
            [
                'label' => __('Background Image', 'ordainit-toolkit'),
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-2', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_cta_background_image',
            [
                'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Content
        $this->start_controls_section(
            'od_cta_section_content',
            [
                'label' => __('CTA Title & Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_cta_section_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD CTA Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_cta_section_subtitle',
            [
                'label' => __('Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD CTA Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_cta_design_style' => ['layout-6']
                ],
            ]
        );

        $this->add_control(
            'od_cta_section_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD CTA Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-6', 'layout-9']
                ],
            ]
        );

        $this->end_controls_section();

        // CTA Button Content
        $this->start_controls_section(
            'od_cta_btn_content',
            [
                'label' => __('CTA Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-5', 'layout-6', 'layout-7', 'layout-8']
                ],
            ]
        );

        $this->add_control(
            'od_cta_btn_text',
            [
                'label' => __('Btn Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type btn text here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_cta_btn_url',
            [
                'label' => __('Btn Url', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type btn url here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // CTA Button 2 Content
        $this->start_controls_section(
            'od_cta_btn_2_content',
            [
                'label' => __('CTA Button 2', 'ordainit-toolkit'),
                'condition' => [
                    'od_cta_design_style' => ['layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_cta_btn_2_text',
            [
                'label' => __('Btn Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text 2', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type btn text here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_cta_btn_2_url',
            [
                'label' => __('Btn Url', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type btn url here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // CTA Form
        $this->start_controls_section(
            'od_cta_form',
            [
                'label' => __('CTA Form', 'ordainit-toolkit'),
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-4', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_cta_form_list',
            [
                'label'   => esc_html__('Select Form', 'odcore'),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_od_contact_form(),
            ]
        );

        $this->end_controls_section();

        // CTA Link Content
        $this->start_controls_section(
            'od_cta_link_content',
            [
                'label' => __('CTA Link Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-4', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_cta_link_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Already a member?', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_cta_link_subtitle',
            [
                'label' => __('Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sign In', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_cta_link_url',
            [
                'label' => __('URL', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type url here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // CTA Shape
        $this->start_controls_section(
            'od_cta_shape',
            [
                'label' => __('CTA Shape', 'ordainit-toolkit'),
                'condition' => [
                    'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_cta_shape_image_1',
            [
                'label' => esc_html__('Choose Shape Image 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_cta_shape_image_2',
            [
                'label' => esc_html__('Choose Shape Image 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_cta_shape_image_3',
            [
                'label' => esc_html__('Choose Shape Image 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => 'It will works only for layout-5 & layout-8',
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_cta_shape_image_4',
            [
                'label' => esc_html__('Choose Shape Image 4', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => 'It will works only for layout-5',
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();


        // CTA Info Section
        $this->start_controls_section(
            'od_cta_info',
            [
                'label' => __('CTA Info', 'ordainit-toolkit'),
                'condition' => [
                    'od_cta_design_style' => ['layout-6']
                ],
            ]
        );

        $this->add_control(
            'od_cta_info_switcher',
            [
                'label' => esc_html__('Show CTA Info', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'od_cta_info_lists',
            [
                'label' => esc_html__('Info List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_cta_info_list_title',
                        'label' => esc_html__('Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],

                ],
                'default' => [
                    [
                        'od_cta_info_list_title' => esc_html__('Title #1', 'ordainit-toolkit'),
                    ],
                    [
                        'od_cta_info_list_title' => esc_html__('Title #2', 'ordainit-toolkit'),
                    ],
                    [
                        'od_cta_info_list_title' => esc_html__('Title #2', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_cta_info_list_title }}}',
                'condition' => [
                    'od_cta_info_switcher' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();




        // Style Starts

        // CTA style Starts
        $this->start_controls_section(
            'od_cta_style',
            [
                'label' => __('CTA Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-5', 'layout-8']
                ],
            ]
        );

        $this->add_control(
            'od_cta_bg_color',
            [
                'label' => esc_html__('CTA BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gray-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-cta-wrap' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .blue-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .black-2-bg' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // CTA Wrap style Starts
        $this->start_controls_section(
            'od_cta_wrap_style',
            [
                'label' => __('CTA Wrap Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_cta_design_style' => ['layout-8']
                ],
            ]
        );

        $this->add_control(
            'od_cta_wrap_bg_gradient_direction',
            [
                'label' => esc_html__('Gradient Direction', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '90deg',
                'options' => [
                    '0deg' => esc_html__('Top to Bottom', 'ordainit-toolkit'),
                    '90deg' => esc_html__('Left to Right', 'ordainit-toolkit'),
                    '180deg' => esc_html__('Bottom to Top', 'ordainit-toolkit'),
                    '270deg' => esc_html__('Right to Left', 'ordainit-toolkit'),
                ],
            ]
        );

        $this->add_control(
            'od_cta_wrap_bg_gradient_start_color',
            [
                'label' => esc_html__('Gradient Start Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0bcf77',
                'selectors' => [
                    '{{WRAPPER}} .ag-cta-style .ai-cta-wrap' => 'background: linear-gradient({{od_cta_wrap_bg_gradient_direction.VALUE}}, {{VALUE}} 0%, {{od_cta_wrap_bg_gradient_end_color.VALUE}} 100%);',
                ],
            ]
        );

        $this->add_control(
            'od_cta_wrap_bg_gradient_end_color',
            [
                'label' => esc_html__('Gradient End Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#69d619',
                'selectors' => [
                    '{{WRAPPER}} .ag-cta-style .ai-cta-wrap' => 'background: linear-gradient({{od_cta_wrap_bg_gradient_direction.VALUE}}, {{od_cta_wrap_bg_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
                ],
            ]
        );

        $this->end_controls_section();

        // CTA Title & Content Starts
        $this->start_controls_section(
            'od_cta_content_style',
            [
                'label' => __('CTA Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_cta_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-title-2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-section-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-section-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-cta-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-section-title' => 'color: {{VALUE}}',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_title_typography',
                'selector' => '
            {{WRAPPER}} .it-section-title-2, 
            {{WRAPPER}} .it-section-title,
            {{WRAPPER}} .pg-section-title,
            {{WRAPPER}} .cr-section-title,
            {{WRAPPER}} .ss-cta-title,
            {{WRAPPER}} .ag-section-title
        ',
            ]
        );

        $this->add_control(
            'od_cta_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_cta_design_style' => ['layout-6']
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-section-subtitle',
                'condition' => [
                    'od_cta_design_style' => ['layout-6']
                ],
            ]
        );

        $this->add_control(
            'od_cta_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-section-title-box p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-6', 'layout-9']
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_description_typography',
                'selector' => '
            {{WRAPPER}} .it-section-title-box p,
            {{WRAPPER}} .pg-section-title-box p,
            {{WRAPPER}} .it-section-title-box p
        ',
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-6', 'layout-9']
                ],
            ]
        );

        $this->end_controls_section();


        // Contact Form Style
        $this->start_controls_section(
            'od_cta_contact_form_style',
            [
                'label' => __('Contact Form Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-4', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_cta_contact_form_bg_color',
            [
                'label' => esc_html__('Form Bg Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-cta-input-box form input' => 'background-color: {{VALUE}}',

                ],
            ]
        );

        $this->add_control(
            'od_cta_contact_form_focus_color',
            [
                'label' => esc_html__('Focus Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-cta-input-box form input:focus' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_contact_form_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-cta-input-box form input::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_contact_form_text_color',
            [
                'label' => esc_html__('Input Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-cta-input-box form input' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Button
        $this->start_controls_tabs(
            'od_cta_contact_form_style_tabs'
        );

        // Normal
        $this->start_controls_tab(
            'od_cta_contact_form_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_cta_contact_form_btn_style_normal_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_contact_form_btn_style_normal_bgcolor',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_cta_contact_form_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_cta_contact_form_btn_style_hover_color',
            [
                'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_cta_contact_form_btn_style_hover_bgcolor',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'hr_2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_contact_form_btn_typography',
                'selector' => '{{WRAPPER}} .it-btn',
            ]
        );

        $this->end_controls_section();




        // CTA Button Style
        $this->start_controls_section(
            'od_cta_btn_style',
            [
                'label' => __('Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_cta_design_style' => ['layout-2', 'layout-3', 'layout-5', 'layout-6', 'layout-7', 'layout-8']
                ],
            ]
        );

        // Button
        $this->start_controls_tabs(
            'od_cta_btn_style_tabs'
        );

        // Normal
        $this->start_controls_tab(
            'od_cta_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_cta_btn_style_normal_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn.green-bg' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-btn.white-bg' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-btn.white-bg' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_btn_style_normal_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn.green-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-btn.white-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ag-btn.white-bg' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_cta_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_cta_btn_style_hover_color',
            [
                'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_cta_btn_style_hover_bgcolor',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ag-btn::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'hr_3',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_btn_typography',
                'selector' => '
        {{WRAPPER}} .it-btn,
        {{WRAPPER}} .pg-btn,
        {{WRAPPER}} .ss-btn,
        {{WRAPPER}} .cr-btn,
        {{WRAPPER}} .ag-btn
        ',
            ]
        );

        $this->end_controls_section();

        // CTA Button 2 Style
        $this->start_controls_section(
            'od_cta_btn_2_style',
            [
                'label' => __('Button 2 Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_cta_design_style' => ['layout-5']
                ],
            ]
        );

        // Button
        $this->start_controls_tabs(
            'od_cta_btn_2_style_tabs'
        );

        // Normal
        $this->start_controls_tab(
            'od_cta_btn_2_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_cta_btn_2_style_normal_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_btn_2_style_normal_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_btn_2_style_normal_border_color',
            [
                'label' => esc_html__('Button Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_cta_btn_2_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_cta_btn_2_style_hover_color',
            [
                'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_btn_2_style_hover_bgcolor',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_btn_2_style_hover_border_color',
            [
                'label' => esc_html__('Button Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'hr_4',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_btn_2_typography',
                'selector' => '
        {{WRAPPER}} .ss-btn.border-btn,
        ',
            ]
        );

        $this->end_controls_section();

        // CTA Link Style
        $this->start_controls_section(
            'od_cta_link_content_style',
            [
                'label' => __('Link Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_cta_design_style' => ['layout-1', 'layout-4', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_cta_link_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-cta-link a' => 'color: {{VALUE}}',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_link_title_typography',
                'selector' => '{{WRAPPER}} .it-cta-link a',
            ]
        );

        $this->add_control(
            'od_cta_link_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-cta-link a:last-child' => 'color: {{VALUE}}',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_link_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-cta-link a:last-child',
            ]
        );

        $this->end_controls_section();

        // CTA Link Style
        $this->start_controls_section(
            'od_cta_info_style',
            [
                'label' => __('Info Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_cta_design_style' => ['layout-6']
                ],
            ]
        );


        $this->add_control(
            'od_cta_info_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ai-cta-wrap .it-cta-info span svg circle' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_cta_info_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ai-cta-wrap .it-cta-info span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_cta_info_title_typography',
                'selector' => '{{WRAPPER}} .ai-cta-wrap .it-cta-info span',
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
        $od_cta_design_style = $settings['od_cta_design_style'];
        $od_cta_background_image = $settings['od_cta_background_image'];
        $od_cta_section_title = $settings['od_cta_section_title'];
        $od_cta_section_subtitle = $settings['od_cta_section_subtitle'];
        $od_cta_section_description = $settings['od_cta_section_description'];
        $od_cta_form_list = $settings['od_cta_form_list'];
        $od_cta_link_title = $settings['od_cta_link_title'];
        $od_cta_link_subtitle = $settings['od_cta_link_subtitle'];
        $od_cta_link_url = $settings['od_cta_link_url'];
        $od_cta_shape_image_1 = $settings['od_cta_shape_image_1'];
        $od_cta_shape_image_2 = $settings['od_cta_shape_image_2'];
        $od_cta_shape_image_3 = $settings['od_cta_shape_image_3'];
        $od_cta_shape_image_4 = $settings['od_cta_shape_image_4'];
        $od_cta_btn_text = $settings['od_cta_btn_text'];
        $od_cta_btn_url = $settings['od_cta_btn_url'];
        $od_cta_btn_2_text = $settings['od_cta_btn_2_text'];
        $od_cta_btn_2_url = $settings['od_cta_btn_2_url'];
        $od_cta_info_switcher = $settings['od_cta_info_switcher'];
        $od_cta_info_lists = $settings['od_cta_info_lists'];
?>


        <?php if ($settings['od_cta_design_style']  == 'layout-9'): ?>

            <div class="cr-cta-area it-cta-inner-style z-index-1 fix p-relative pb-120">
                <img class="cr-cta-shape-1" src="<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="cr-cta-shape-2" src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="cr-cta-shape-3" src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cr-cta-wrap text-center">
                                <div class="it-section-title-box mb-30">
                                    <h4 class="cr-section-title mb-15 it_text_reveal_anim"><?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?></h4>
                                    <div class="it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                        <p class="pb-15"> <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?></p>
                                    </div>
                                </div>
                                <div class="it-cta-input-box p-relative mb-40 it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_cta_form_list . '"]'); ?>
                                </div>
                                <div class="it-cta-link it-fade-anim" data-fade-from="bottom" data-delay=".9">
                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_title, 'ordainit-toolkit'); ?>
                                    </a>

                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_subtitle, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-8'): ?>

            <div class="it-cta-area ag-cta-style black-2-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="ai-cta-wrap it-cta-wrap fix z-index-3 text-center">
                                <img
                                    class="ai-cta-shape-1"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-2"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-3"
                                    src="<?php echo esc_url($od_cta_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box">
                                    <h4
                                        class="ag-section-title mb-30 it-split-text it-split-in-right">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                </div>
                                <div
                                    class="it-fade-anim"
                                    data-fade-from="top"
                                    data-delay=".3"
                                    data-ease="bounce">
                                    <a class="ag-btn white-bg"
                                        href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-7'): ?>

            <div class="it-cta-area seo-cta-style">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="ai-cta-wrap it-cta-wrap z-index-3 p-relative fix text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <img
                                    class="ai-cta-shape-1"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-2"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box">
                                    <h4
                                        class="it-section-title mb-25 it_text_reveal_anim">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                </div>
                                <div
                                    class="it-fade-anim"
                                    data-fade-from="top"
                                    data-ease="bounce"
                                    data-delay=".5">
                                    <a class="cr-btn"
                                        href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-6'): ?>

            <div class="it-cta-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="ai-cta-wrap it-cta-wrap z-index-3 fix p-relative text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <img
                                    class="ai-cta-shape-1 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-2 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box mb-30">
                                    <span class="it-section-subtitle d-block mb-10">
                                        <?php echo esc_html($od_cta_section_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                    <h4 class="it-section-title-2 mb-15">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p>
                                        <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                    </p>
                                </div>
                                <a class="it-btn white-bg mb-40"
                                    href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                    <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                </a>

                                <?php if (!empty($od_cta_info_switcher)): ?>
                                    <div class="it-cta-info">
                                        <?php foreach ($od_cta_info_lists as $od_cta_info_list): ?>
                                            <span>
                                                <svg
                                                    width="25"
                                                    height="26"
                                                    viewBox="0 0 25 26"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle
                                                        opacity="0.2"
                                                        cx="12.5"
                                                        cy="12.5654"
                                                        r="12.5"
                                                        fill="white" />
                                                    <circle cx="13" cy="13.0654" r="3" fill="white" />
                                                </svg>
                                                <?php echo esc_html($od_cta_info_list['od_cta_info_list_title'], 'ordainit-toolkit'); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-5'): ?>

            <div
                class="ss-cta-area ss-cta-ptb z-index-1 p-relative blue-bg"
                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="ss-cta-shape-1 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="ss-cta-shape-2 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="ss-cta-shape-3 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="ss-cta-shape-4 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="ss-cta-content text-center">
                                <h4 class="ss-cta-title it_text_reveal_anim">
                                    <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                </h4>
                                <div
                                    class="d-inline-block it-fade-anim"
                                    data-fade-from="top"
                                    data-ease="bounce"
                                    data-delay=".5">
                                    <a class="ss-btn mr-30"
                                        href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                                <div
                                    class="d-inline-block it-fade-anim"
                                    data-fade-from="top"
                                    data-ease="bounce"
                                    data-delay=".7">
                                    <a
                                        class="ss-btn border-btn"
                                        href="<?php echo esc_url($od_cta_btn_2_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_2_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-4'): ?>

            <div class="cr-cta-area z-index-1 fix p-relative pt-150 pb-160">
                <img
                    class="cr-cta-shape-1"
                    src="<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="cr-cta-shape-2"
                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="cr-cta-shape-3"
                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cr-cta-wrap text-center">
                                <div class="it-section-title-box mb-30">
                                    <h4 class="cr-section-title mb-15 it_text_reveal_anim">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <div
                                        class="it-fade-anim"
                                        data-fade-from="bottom"
                                        data-delay=".5">
                                        <p class="pb-15">
                                            <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="it-cta-input-box p-relative mb-40 it-fade-anim"
                                    data-fade-from="bottom"
                                    data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_cta_form_list . '"]'); ?>
                                </div>
                                <div
                                    class="it-cta-link it-fade-anim"
                                    data-fade-from="bottom"
                                    data-delay=".9">
                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_title, 'ordainit-toolkit'); ?>
                                    </a>

                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_subtitle, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-3'): ?>

            <div class="pg-cta-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="pg-cta-wrap p-relative z-index-3 fix">
                                <img
                                    class="pg-cta-shape-1"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="pg-cta-shape-2"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="pg-section-title-box text-center it-text-anim">
                                    <h4 class="pg-section-title pb-15 it-char-animation">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p class="mb-20">
                                        <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                    </p>
                                    <div
                                        class="it-fade-anim"
                                        data-fade-from="top"
                                        data-delay=".3"
                                        data-ease="bounce">
                                        <a
                                            class="pg-btn green-bg"
                                            href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                            <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-2'): ?>

            <div class="dt-cta-area gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="dt-cta-wrap p-relative theme-2-bg z-index-2 text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <img
                                    class="dt-cta-shape-1 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="dt-cta-shape-2 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box mb-30">
                                    <h4
                                        class="it-section-title mb-30 it_text_reveal_anim">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <div
                                        class="it-fade-anim"
                                        data-fade-from="top"
                                        data-delay=".3"
                                        data-ease="bounce">
                                        <a
                                            class="it-btn dt-white-bg"
                                            href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                            <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="it-cta-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="it-cta-wrap z-index-3 text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <div class="it-section-title-box mb-30">
                                    <h4
                                        class="it-section-title-2 mb-15 it-split-text it-split-in-right">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p>
                                        <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                    </p>
                                </div>
                                <div class="it-cta-input-box p-relative mb-35">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_cta_form_list . '"]'); ?>
                                </div>
                                <div class="it-cta-link">
                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_title, 'ordainit-toolkit'); ?>
                                    </a>

                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_subtitle, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Cta());
