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
class OD_Hero_Banner extends Widget_Base
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
        return 'od-hero-banner';
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
        return __('Hero Banner', 'ordainit-toolkit');
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
            'od_hero_banner_section_background',
            [
                'label' => __('Background Image', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9']
                ],
            ]

        );

        $this->add_control(
            'od_hero_banner_background_image',
            [
                'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Hero Content
        $this->start_controls_section(
            'od_hero_banner_content',
            [
                'label' => __('Hero Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_hero_banner_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_hero_banner_subtitle',
            [
                'label' => __('Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-8']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Button
        $this->start_controls_section(
            'od_section_button',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4', 'layout-5', 'layout-7']
                ],
            ]
        );

        $this->add_control(
            'od_btn_text',
            [
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'ordainit-toolkit'),
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

        // Button 2
        $this->start_controls_section(
            'od_section_button_2',
            [
                'label' => __('Second Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_btn_text_2',
            [
                'label' => esc_html__('Second Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Second Button Text', 'ordainit-toolkit'),
                'title' => esc_html__('Enter second button text', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_btn_link_type_2',
            [
                'label' => esc_html__('Second Button Link Type', 'ordainit-toolkit'),
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
            'od_btn_link_2',
            [
                'label' => esc_html__('Second Button Link', 'ordainit-toolkit'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'od_btn_link_type_2' => '1',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_btn_page_link_2',
            [
                'label' => esc_html__('Select Second Button Page', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => od_get_all_pages(),
                'condition' => [
                    'od_btn_link_type_2' => '2',
                ]
            ]
        );

        $this->end_controls_section();


        // Video Button
        $this->start_controls_section(
            'od_hero_banner_video_btn',
            [
                'label' => __('Video Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4', 'layout-7']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_video_btn_text',
            [
                'label' => __('Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Watch Video', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type button text here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_hero_banner_video_btn_url',
            [
                'label' => __('Video Url', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('https://www.youtube.com/watch?v=PO_fBTkoznc', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Put video url here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Thumbnail
        $this->start_controls_section(
            'od_hero_banner_thumbnail_section',
            [
                'label' => __('Thumbnail', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_hero_banner_thumbnail_image',
            [
                'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_thumbnail_image_2',
            [
                'label' => esc_html__('Choose Thumbnail Image 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-6', 'layout-8', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_thumbnail_image_3',
            [
                'label' => esc_html__('Choose Thumbnail Image 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-9']
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_thumbnail_image_4',
            [
                'label' => esc_html__('Choose Thumbnail Image 4', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-9']
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_thumbnail_image_5',
            [
                'label' => esc_html__('Choose Thumbnail Image 5', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-9']
                ],
            ]
        );

        $this->end_controls_section();

        // Shape
        $this->start_controls_section(
            'od_hero_banner_shape_section',
            [
                'label' => __('Shape', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_hero_banner_shape_image_1',
            [
                'label' => esc_html__('Choose Shape Image 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9']
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_shape_image_2',
            [
                'label' => esc_html__('Choose Shape Image 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3', 'layout-5', 'layout-7', 'layout-8']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_shape_image_3',
            [
                'label' => esc_html__('Choose Shape Image 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3', 'layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_shape_image_4',
            [
                'label' => esc_html__('Choose Shape Image 4', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-5']
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_shape_image_5',
            [
                'label' => esc_html__('Choose Shape Image 5', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_shape_svg',
            [
                'label' => esc_html__('Svg Shape', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('<svg width="207" height="144" viewBox="0 0 207 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M50.761 6.66596C57.462 5.97473 67.824 12.6849 69.4164 30.7859C69.6753 35.3424 69.7524 39.7372 69.6639 43.9738C62.2861 40.4056 55.7292 35.4838 50.7406 29.0565C45.2741 22.0135 43.7627 16.4824 44.3302 12.7551C44.8833 9.1232 47.4355 7.009 50.761 6.66596ZM49.1606 30.2828C54.5494 37.2257 61.657 42.4492 69.6031 46.1595C68.4648 78.894 57.3485 101.984 44.0237 117.191C36.3544 125.943 27.9456 132.094 20.2664 135.973C12.564 139.864 5.67156 141.433 1.03034 141.127L0.898568 143.122C6.02424 143.461 13.2836 141.741 21.1682 137.758C29.076 133.764 37.6894 127.454 45.5279 118.509C59.0625 103.062 70.2635 79.7832 71.5714 47.0406C79.7991 50.5689 88.822 52.5449 97.7101 53.1867C116.009 54.508 134.06 50.195 143.735 41.7685C150.905 35.5232 155.806 28.8745 158.558 22.7485C161.602 23.573 165.256 23.7948 169.567 23.1574C178.19 21.8825 189.481 17.1709 203.951 6.93765C203.941 6.9628 203.93 6.98804 203.92 7.01338C203.513 7.98434 203.096 9.08484 202.939 10.1757C202.763 11.4077 202.917 12.6218 203.692 13.6407C203.952 13.9873 204.448 14.0549 204.795 13.7935C205.143 13.5321 205.207 13.0461 204.947 12.6996C204.442 12.0156 204.379 11.2134 204.493 10.4016C204.634 9.4372 205.017 8.468 205.372 7.61764C205.419 7.50309 205.466 7.39021 205.512 7.27932C205.832 6.5135 206.113 5.84192 206.199 5.36166C206.274 4.93302 206.211 4.5888 206.075 4.33555C205.98 4.15858 205.681 3.88971 205.164 3.72426C204.466 3.49844 203.151 3.30567 202.298 3.18063C201.94 3.1282 201.663 3.08767 201.548 3.0616C200.741 2.88756 200.445 2.68908 200.079 2.41301C199.765 2.16874 199.402 1.89489 198.78 1.54642C198.396 1.344 197.921 1.47616 197.712 1.85676C197.504 2.23737 197.636 2.72578 198.02 2.9282C198.537 3.20809 198.847 3.4455 199.112 3.64913C199.202 3.71815 199.287 3.78329 199.373 3.84489C199.801 4.14194 200.25 4.38368 201.204 4.59723C201.415 4.643 202.361 4.82394 203.24 4.98996C188.692 15.3458 177.556 19.9545 169.274 21.179C165.33 21.7622 162.042 21.5779 159.336 20.8853C159.853 19.5423 160.263 18.2301 160.568 16.9591C161.473 13.1894 161.463 9.7266 160.496 6.89085C159.521 4.02918 157.578 1.84207 154.735 0.696958C152.67 -0.134724 150.79 0.0461687 149.323 1.08375C147.902 2.08847 147.028 3.78359 146.659 5.68057C145.922 9.47746 147.109 14.5273 150.771 18.2886C152.303 19.8629 154.252 21.1957 156.646 22.1228C154.019 27.8797 149.348 34.2274 142.421 40.2603C133.308 48.1977 115.879 52.4934 97.8541 51.1918C88.8654 50.5428 79.8088 48.5072 71.6427 44.8901C71.7629 40.3271 71.6927 35.5842 71.4123 30.6571L71.4114 30.6418L71.4101 30.6266C69.7696 11.9131 58.8196 3.82408 50.5558 4.67652C46.398 5.1054 43.0541 7.84988 42.353 12.454C41.6665 16.9626 43.5428 23.0447 49.1606 30.2828ZM152.204 16.8935C153.529 18.2546 155.251 19.4457 157.425 20.2793C157.933 18.9762 158.331 17.7101 158.623 16.4923C159.468 12.9741 159.414 9.91485 158.603 7.5362C157.801 5.18348 156.252 3.46391 153.988 2.55216C152.443 1.92989 151.299 2.13578 150.478 2.71676C149.609 3.33059 148.929 4.48578 148.623 6.06188C148.011 9.21114 148.997 13.5985 152.204 16.8935Z" fill="white" />
                               </svg>', 'ordainit-toolkit'),
                'placeholder' => esc_html__('put svg code here', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->end_controls_section();


        // Hero Contact Form
        $this->start_controls_section(
            'od_hero_contact_form',
            [
                'label' => __('Contact Form', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3', 'layout-6', 'layout-8', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_hero_contact_form_list',
            [
                'label'   => esc_html__('Select Form', 'odcore'),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_od_contact_form(),
            ]
        );

        $this->end_controls_section();

        // Brand Area Starts
        $this->start_controls_section(
            'od_hero_brand_section',
            [
                'label' => __('Brand Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-9'],
                    'od_hero_brand_slider_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'od_hero_brand_title',
            [
                'label' => __('Brand Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('od brand', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type brand title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'od_hero_brand_lists',
            [
                'label' => esc_html__('Brand List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_hero_brand_list_thumbnail',
                        'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],

                    ],
                ],
                'default' => [
                    [
                        'od_hero_brand_list_thumbnail' => esc_url('od_hero_brand_list_thumbnail', 'ordainit-toolkit'),
                    ],

                ],
                'title_field' => 'Brand',
            ]
        );

        $this->end_controls_section();
        // Brand Area 2 Starts
        $this->start_controls_section(
            'od_hero_brand_section_2',
            [
                'label' => __('Brand Content 2', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-9'],
                    'od_hero_brand_slider_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'od_hero_brand_2_lists',
            [
                'label' => esc_html__('Brand 2 List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_hero_brand_2_list_thumbnail',
                        'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],

                    ],
                ],

                'default' => [
                    [
                        'od_hero_brand_2_list_thumbnail' => esc_url('od_hero_brand_2_list_thumbnail', 'ordainit-toolkit'),
                    ],

                ],

                'title_field' => 'Brand_2',
            ]
        );

        $this->end_controls_section();

        // Brand Slider settings
        $this->start_controls_section(
            'od_hero_brand_settings',
            [
                'label' => __('Brand Slider Settings', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_hero_brand_slider_switcher',
            [
                'label' => esc_html__('Show Brand Slider', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'od_hero_brand_slider_autoplay',
            [
                'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'ordainit-toolkit'),
                'label_off' => esc_html__('Off', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'od_hero_brand_slider_switcher' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();

        // Info Section
        $this->start_controls_section(
            'od_hero_banner_info',
            [
                'label' => __('Banner Info', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-8']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_info_switcher',
            [
                'label' => esc_html__('Show Banner Info', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'od_hero_banner_info_lists',
            [
                'label' => esc_html__('Info List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_hero_banner_info_list_title',
                        'label' => esc_html__('Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],

                ],
                'default' => [
                    [
                        'od_hero_banner_info_list_title' => esc_html__('Title #1', 'ordainit-toolkit'),
                    ],
                    [
                        'od_hero_banner_info_list_title' => esc_html__('Title #2', 'ordainit-toolkit'),
                    ],
                    [
                        'od_hero_banner_info_list_title' => esc_html__('Title #2', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_hero_banner_info_list_title }}}',
                'condition' => [
                    'od_hero_banner_info_switcher' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();


        // Style Starts

        // Banner  Style
        $this->start_controls_section(
            'od_hero_banner_style',
            [
                'label' => __('Banner Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-4', 'layout-5', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_bg_color',
            [
                'label' => esc_html__('Banner BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-hero-ptb' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .blue-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .black-2-bg' => 'background-color: {{VALUE}}',
                ],

            ]
        );

        $this->end_controls_section();

        // Banner Content Style
        $this->start_controls_section(
            'od_hero_banner_content_style',
            [
                'label' => __('Banner Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Style
        $this->add_control(
            'od_hero_banner_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .dt-hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ai-hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .seo-hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-hero-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_title_span_color',
            [
                'label' => esc_html__('Title Span Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-hero-title span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-4']
                ],
            ]
        );


        $this->add_control(
            'od_hero_banner_title_span_gradient_start_color',
            [
                'label' => esc_html__('Title Gradient Start Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-hero-title span' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_hero_banner_title_span_gradient_end_color.VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
                ],
                'condition' => [
                    'od_design_style' => ['layout-9'],
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_title_span_gradient_end_color',
            [
                'label' => esc_html__('Title Gradient End Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-hero-title span' => 'background: linear-gradient(90deg, {{od_hero_banner_title_span_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
                ],
                'condition' => [
                    'od_design_style' => ['layout-9'],
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_title_typography',
                'selector' => '
            {{WRAPPER}} .it-hero-title, 
            {{WRAPPER}} .dt-hero-title,
            {{WRAPPER}} .pg-hero-title,
            {{WRAPPER}} .cr-hero-title,
            {{WRAPPER}} .ss-hero-title,
            {{WRAPPER}} .ai-hero-title,
            {{WRAPPER}} .seo-hero-title,
            {{WRAPPER}} .ma-hero-title,
            {{WRAPPER}} .ag-hero-title
        ',
            ]
        );

        // SubTitle Style
        $this->add_control(
            'od_hero_banner_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-hero-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-hero-subtitle' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-8']
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_subtitle_border_color',
            [
                'label' => esc_html__('Subtitle Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-hero-subtitle' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-4']
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_subtitle_typography',
                'selector' => '
            {{WRAPPER}} .it-hero-subtitle, 
            {{WRAPPER}} .pg-hero-subtitle,
            {{WRAPPER}} .cr-hero-subtitle,
            {{WRAPPER}} .ma-hero-subtitle
        ',
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3', 'layout-4', 'layout-8']
                ],
            ]
        );

        // Description Style
        $this->add_control(
            'od_hero_banner_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .dt-hero-content > span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-hero-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-hero-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ai-hero-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .seo-hero-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-hero-text p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-hero-text p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_description_typography',
                'selector' => '
            {{WRAPPER}} .it-hero-text p, 
            {{WRAPPER}} .dt-hero-content > span,
            {{WRAPPER}} .pg-hero-content p,
            {{WRAPPER}} .cr-hero-text p,
            {{WRAPPER}} .ss-hero-text p,
            {{WRAPPER}} .ai-hero-content p,
            {{WRAPPER}} .seo-hero-text p,
            {{WRAPPER}} .ma-hero-text p,
            {{WRAPPER}} .ag-hero-text p
        ',
            ]
        );


        $this->end_controls_section();

        // Button Style
        $this->start_controls_section(
            'od_hero_banner_btn_style',
            [
                'label' => __('Banner Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4', 'layout-5', 'layout-7']
                ],
            ]
        );

        $this->start_controls_tabs(
            'od_hero_banner_btn_style_tabs'
        );

        // Normal
        $this->start_controls_tab(
            'od_hero_banner_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_hero_banner_btn_style_normal_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_btn_style_normal_bgcolor',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_hero_banner_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_hero_banner_btn_style_hover_color',
            [
                'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_btn_style_hover_bgcolor',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ss-btn::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_btn_typography',
                'selector' => '
        {{WRAPPER}} .it-btn, 
        {{WRAPPER}} .cr-btn,
        {{WRAPPER}} .ss-btn
        ',
            ]
        );

        $this->end_controls_section();


        // Button 2 Style
        $this->start_controls_section(
            'od_hero_banner_btn_2_style',
            [
                'label' => __('Button 2 Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-5']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_btn_2_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-hero-explore a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_btn_2_typography',
                'selector' => '{{WRAPPER}} .ss-hero-explore a',
            ]
        );

        $this->end_controls_section();

        // Video Button Style
        $this->start_controls_section(
            'od_hero_banner_video_btn_style',
            [
                'label' => __('Video Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4', 'layout-7']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_video_btn_bg_color',
            [
                'label' => esc_html__('Video Btn BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-video a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_video_btn_icon_color',
            [
                'label' => esc_html__('Video Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-video a i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_video_btn_text_color',
            [
                'label' => esc_html__('Btn Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-hero-video span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_video_btn_typography',
                'selector' => '{{WRAPPER}} .it-hero-video span',
            ]
        );

        $this->end_controls_section();

        // Contact Form Style
        $this->start_controls_section(
            'od_hero_banner_contact_form_style',
            [
                'label' => __('Contact Form Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3', 'layout-6', 'layout-8', 'layout-9']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_bg_color',
            [
                'label' => esc_html__('Form Bg Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-hero-input-box form input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-input-box form input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ma-hero-style .pg-hero-input-box input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ag-hero-ptb .dt-hero-input-box form input' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_focus_color',
            [
                'label' => esc_html__('Focus Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-hero-input-box form input:focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-input-box form input:focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .ma-hero-style .pg-hero-input-box input:focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .ag-hero-ptb .dt-hero-input-box form input:focus' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-hero-input-box form input::placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-input-box form input::placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-input-icon svg path' => 'stroke: {{VALUE}}',
                    '{{WRAPPER}} .ma-hero-style .pg-hero-input-box input::placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-hero-ptb .dt-hero-input-box form input::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_text_color',
            [
                'label' => esc_html__('Input Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-hero-input-box form input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-hero-input-box form input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-hero-style .pg-hero-input-box input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-hero-ptb .dt-hero-input-box form input' => 'color: {{VALUE}}',
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
            'od_hero_banner_contact_form_style_tabs'
        );

        // Normal
        $this->start_controls_tab(
            'od_hero_banner_contact_form_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_btn_style_normal_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn.green-bg' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_btn_style_normal_bgcolor',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn.green-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn' => 'background-color: {{VALUE}}',

                ],
            ]
        );

        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_hero_banner_contact_form_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_btn_style_hover_color',
            [
                'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_contact_form_btn_style_hover_bgcolor',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-btn::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .cr-btn::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'od_hero_banner_contact_form_btn_bg_gradient_heading',
            [
                'label' => esc_html__('Button Bg Gradient Layout - 9', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_btn_bg_gradient_color_1',
            [
                'label' => esc_html__('Button Gradient Bg Color 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0bcf77',
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{VALUE}}, {{od_hero_banner_contact_form_btn_bg_gradient_color_2.VALUE}}, {{od_hero_banner_contact_form_btn_bg_gradient_color_3.VALUE}}, {{od_hero_banner_contact_form_btn_bg_gradient_color_4.VALUE}});',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_btn_bg_gradient_color_2',
            [
                'label' => esc_html__('Button Gradient Bg Color 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#69d619',
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_hero_banner_contact_form_btn_bg_gradient_color_1.VALUE}}, {{VALUE}} , {{od_hero_banner_contact_form_btn_bg_gradient_color_3.VALUE}}, {{od_hero_banner_contact_form_btn_bg_gradient_color_4.VALUE}});',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_contact_form_btn_bg_gradient_color_3',
            [
                'label' => esc_html__('Button Gradient Bg Color 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#69d619',
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_hero_banner_contact_form_btn_bg_gradient_color_1.VALUE}}, {{od_hero_banner_contact_form_btn_bg_gradient_color_2.VALUE}} ,{{VALUE}}, {{od_hero_banner_contact_form_btn_bg_gradient_color_4.VALUE}});',
                ],
            ]
        );
        $this->add_control(
            'od_hero_banner_contact_form_btn_bg_gradient_color_4',
            [
                'label' => esc_html__('Button Gradient Bg Color 4', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#69d619',
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_hero_banner_contact_form_btn_bg_gradient_color_1.VALUE}}, {{od_hero_banner_contact_form_btn_bg_gradient_color_2.VALUE}} , {{od_hero_banner_contact_form_btn_bg_gradient_color_3.VALUE}}, {{VALUE}});',
                ],
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_contact_form_btn_typography',
                'selector' => '
        {{WRAPPER}} .it-btn, 
        {{WRAPPER}} .pg-btn,
        {{WRAPPER}} .cr-btn,
        {{WRAPPER}} .ag-btn
        ',
            ]
        );

        $this->end_controls_section();

        // Brand Style
        $this->start_controls_section(
            'od_hero_brand_style',
            [
                'label' => __('Hero Brand Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_hero_brand_line_color',
            [
                'label' => esc_html__('Brand Line Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .it-brand-top-box::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_hero_brand_title_bg_color',
            [
                'label' => esc_html__('Brand Title BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-brand-style .it-brand-top-box span' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_hero_brand_title_color',
            [
                'label' => esc_html__('Brand Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-brand-top-box span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_brand_title_typography',
                'selector' => '{{WRAPPER}} .it-brand-top-box span',
            ]
        );

        $this->end_controls_section();

        // Banner Info Style
        $this->start_controls_section(
            'od_hero_banner_info_style',
            [
                'label' => __('Banner Info Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-8']
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_info_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-hero-info span svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_hero_banner_info_title_color',
            [
                'label' => esc_html__('Info Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-hero-info span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Info Title Typography', 'ordainit-toolkit'),
                'name' => 'od_hero_banner_info_title_typography',
                'selector' => '{{WRAPPER}} .ma-hero-info span',
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
        $od_hero_banner_title = $settings['od_hero_banner_title'];
        $od_hero_banner_subtitle = $settings['od_hero_banner_subtitle'];
        $od_hero_banner_description = $settings['od_hero_banner_description'];
        $od_hero_banner_btn_text = $settings['od_btn_text'];
        $od_hero_banner_btn_text_2 = $settings['od_btn_text_2'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];
        $od_btn_link_type_2 = $settings['od_btn_link_type_2'];
        $od_btn_link_2 = $settings['od_btn_link_2'];
        $od_btn_page_link_2 = $settings['od_btn_page_link_2'];
        $od_hero_banner_video_btn_text = $settings['od_hero_banner_video_btn_text'];
        $od_hero_banner_video_btn_url = $settings['od_hero_banner_video_btn_url'];
        $od_hero_banner_thumbnail_image = $settings['od_hero_banner_thumbnail_image'];
        $od_hero_banner_shape_image_1 = $settings['od_hero_banner_shape_image_1'];
        $od_hero_banner_shape_image_2 = $settings['od_hero_banner_shape_image_2'];
        $od_hero_banner_shape_image_3 = $settings['od_hero_banner_shape_image_3'];
        $od_hero_banner_shape_image_4 = $settings['od_hero_banner_shape_image_4'];
        $od_hero_banner_shape_image_5 = $settings['od_hero_banner_shape_image_5'];
        $od_hero_contact_form_list = $settings['od_hero_contact_form_list'];
        $od_hero_banner_background_image = $settings['od_hero_banner_background_image'];
        $od_hero_brand_lists = $settings['od_hero_brand_lists'];
        $od_hero_brand_title = $settings['od_hero_brand_title'];
        $od_hero_brand_slider_autoplay = $settings['od_hero_brand_slider_autoplay'];
        $od_hero_banner_shape_svg = $settings['od_hero_banner_shape_svg'];
        $od_hero_banner_thumbnail_image_2 = $settings['od_hero_banner_thumbnail_image_2'];
        $od_hero_banner_thumbnail_image_3 = $settings['od_hero_banner_thumbnail_image_3'];
        $od_hero_banner_thumbnail_image_4 = $settings['od_hero_banner_thumbnail_image_4'];
        $od_hero_banner_thumbnail_image_5 = $settings['od_hero_banner_thumbnail_image_5'];
        $od_hero_banner_info_lists = $settings['od_hero_banner_info_lists'];
        $od_hero_brand_2_lists = $settings['od_hero_brand_2_lists'];
        $od_hero_banner_info_switcher = $settings['od_hero_banner_info_switcher'];
        $od_hero_brand_slider_switcher = $settings['od_hero_brand_slider_switcher'];
?>


        <?php if ($settings['od_design_style']  == 'layout-9'): ?>

            <div
                class="ag-hero-area ag-hero-ptb z-index-1 p-relative black-2-bg section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="ag-hero-content text-center mb-110">
                                <div class="it-fade-anim" data-fade-from="bottom" data-delay=".3">
                                    <h1 class="ag-hero-title mb-20"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                </div>
                                <div class="ag-hero-text it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                    <p class="mb-40"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                </div>
                                <div class="dt-hero-input-box p-relative it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ag-hero-mb it-fade-anim" data-fade-from="bottom" data-delay=".7">
                        <div class="row gx-35">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-35">
                                <div class="ag-hero-thumb-box it-img-anim-wrap p-relative">
                                    <div class="ag-hero-thumb it-img-anim"
                                        data-displacement="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/webgl/pattern-1.jpg'; ?>"
                                        data-intensity="0.6"
                                        data-speedin="1"
                                        data-speedout="1">
                                        <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 order-1 order-lg-0 mb-35">
                                <div class="ag-hero-thumb-box">
                                    <div class="row gx-35">
                                        <div class="col-12">
                                            <div class="it-img-anim-wrap p-relative">
                                                <div class="ag-hero-thumb mb-35 it-img-anim"
                                                    data-displacement="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/webgl/pattern-1.jpg'; ?>"
                                                    data-intensity="0.6"
                                                    data-speedin="1"
                                                    data-speedout="1">
                                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="it-img-anim-wrap p-relative">
                                                <div class="ag-hero-thumb it-img-anim"
                                                    data-displacement="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/webgl/pattern-1.jpg'; ?>"
                                                    data-intensity="0.6"
                                                    data-speedin="1"
                                                    data-speedout="1">
                                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="it-img-anim-wrap p-relative">
                                                <div class="ag-hero-thumb it-img-anim"
                                                    data-displacement="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/webgl/pattern-1.jpg'; ?>"
                                                    data-intensity="0.6"
                                                    data-speedin="1"
                                                    data-speedout="1">
                                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_4['url'], 'ordainit-toolkit'); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 order-0 order-lg-1 mb-35">
                                <div class="ag-hero-thumb-box it-img-anim-wrap p-relative">
                                    <div class="ag-hero-thumb it-img-anim"
                                        data-displacement="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/webgl/pattern-1.jpg'; ?>"
                                        data-intensity="0.6"
                                        data-speedin="1"
                                        data-speedout="1">
                                        <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_5['url'], 'ordainit-toolkit'); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- brand-area-start -->
                <?php if (!empty($od_hero_brand_slider_switcher)) : ?>
                    <div class="ss-brand-area ag-brand-ptb">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="ss-brand-wrap mb-30">
                                        <div class="swiper-container ss-brand-active" dir="rtl">
                                            <div class="swiper-wrapper slider-transtion d-flex align-items-center">
                                                <?php foreach ($od_hero_brand_lists as $od_hero_brand_list):
                                                    $brand_thumbnail = $od_hero_brand_list['od_hero_brand_list_thumbnail'];
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div class="ss-brand-item text-center">
                                                            <img src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit') ?>" alt="">
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="ss-brand-wrap">
                                        <div class="swiper-container ss-brand-active-2">
                                            <div class="swiper-wrapper slider-transtion d-flex align-items-center">

                                                <?php foreach ($od_hero_brand_2_lists as $od_hero_brand_2_list):
                                                    $brand_thumbnail = $od_hero_brand_2_list['od_hero_brand_2_list_thumbnail'];
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div class="ss-brand-item text-center">
                                                            <img src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit') ?>" alt="">
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- brand-area-end -->

            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-8'): ?>

            <div
                class="ma-hero-style cr-hero-area z-index-1 p-relative p-relative section-bg ma-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="ma-hero-shape-1"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <img
                    class="ma-hero-shape-2"
                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="ma-hero-content">
                                <span class="ma-hero-subtitle mb-10 it_text_reveal_anim"><?php echo esc_html($od_hero_banner_subtitle, 'ordainit-toolkit'); ?></span>
                                <h1 class="ma-hero-title mb-10 it_text_reveal_anim"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="ma-hero-text it-fade-anim" data-delay=".5">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                </div>
                                <div class="mb-40 d-flex flex-wrap it-fade-anim" data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>


                                <?php if (!empty($od_hero_banner_info_switcher)): ?>
                                    <div class="ma-hero-info it-fade-anim" data-delay=".9">

                                        <?php foreach ($od_hero_banner_info_lists as $od_hero_banner_info_list): ?>
                                            <span>
                                                <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.39265 17.4113C8.09113 17.4113 7.78961 17.2959 7.55992 17.0662L0.345515 9.85159C-0.115172 9.39112 -0.115172 8.6466 0.345515 8.18613C0.805986 7.72566 1.55029 7.72566 2.01097 8.18613L8.39265 14.5678L21.9892 0.971513C22.4496 0.511042 23.1939 0.511042 23.6546 0.971513C24.1151 1.4322 24.1151 2.1765 23.6546 2.63719L9.22559 17.0662C8.9959 17.2959 8.69416 17.4113 8.39265 17.4113Z" fill="#1FE290" />
                                                </svg>
                                                <?php echo od_kses($od_hero_banner_info_list['od_hero_banner_info_list_title'], 'ordainit-toolkit'); ?>
                                            </span>
                                        <?php endforeach; ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="ma-hero-thumb-box p-relative it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                                <div class="ma-hero-thumb">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <div class="ma-hero-thumb-sm">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-7'):

            //Set attributes for Button
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'cr-btn hover-2 mr-30'
            );

        ?>

            <div
                class="seo-hero-style cr-hero-area z-index-1 p-relative section-bg seo-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="seo-hero-shape-1 d-none d-sm-block"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <img
                    class="seo-hero-shape-2"
                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="cr-hero-content text-center">
                                <h1 class="seo-hero-title mb-10 it_text_reveal_anim"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="seo-hero-text">
                                    <div class="it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                        <p class="mb-25"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    </div>
                                    <div class="cr-hero-button flex-nowrap d-sm-flex align-items-center justify-content-center it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                        <div class="it-hero-video d-flex align-items-center">
                                            <a href="<?php echo esc_url($od_hero_banner_video_btn_url, 'ordainit-toolkit'); ?>" class="popup-video">
                                                <i>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 6.2265L0 0.452994L0 12L10 6.2265Z"
                                                            fill="currentcolor" />
                                                    </svg>
                                                </i>
                                            </a>
                                            <span>
                                                <?php echo esc_html($od_hero_banner_video_btn_text, 'ordainit-toolkit');  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="seo-hero-thumb z-index-1 p-relative it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-6'): ?>

            <div
                class="ai-hero-area ai-hero-ptb z-index-1 p-relative section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="ai-hero-content">
                                <h1 class="ai-hero-title mb-20 it_text_reveal_anim"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="it-fade-anim" data-fade-from="bottom" data-delay=".3">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                </div>
                                <div class="dt-hero-input-box p-relative mb-30 it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                            <div class="ai-hero-thumb-wrap z-index-1 p-relative">
                                <div class="ai-hero-thumb text-center text-lg-end">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <div class="ai-hero-thumb-sm">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <img
                                    class="ai-hero-thumb-shape-1"
                                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-5'):

            // Set attributes for Button 1
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'ss-btn mr-30'
            );

            // Set attributes for Button 2
            $this->set_button_attributes(
                $od_btn_link_type_2,
                $od_btn_page_link_2,
                $od_btn_link_2,
                'od-button-arg-2',
                ''
            );

        ?>

            <div
                class="ss-hero-area blue-bg p-relative z-index-1 fix ss-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="ss-hero-shape-3"
                    src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <img
                    class="ss-hero-shape-4"
                    src="<?php echo esc_url($od_hero_banner_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="ss-hero-content it-text-anim">
                                <h1 class="ss-hero-title it-split-text it-split-in-right"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="ss-hero-text">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    <div class="it-hero-button d-flex align-items-center it-fade-anim" data-fade-from="top" data-ease="bounce" data-delay=".7">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                        </a>

                                        <div class="ss-hero-explore">
                                            <a <?php echo $this->get_render_attribute_string('od-button-arg-2'); ?>>
                                                <?php echo esc_html($od_hero_banner_btn_text_2, 'ordainit-toolkit'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                            <div class="ss-hero-thumb-box p-relative z-index-1 text-center text-lg-end">
                                <div class="ss-hero-thumb">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <img
                                    class="ss-hero-shape-1"
                                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="">
                                <img
                                    class="ss-hero-shape-2"
                                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-4'):
            //Set attributes for Button
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'cr-btn mr-30'
            );
        ?>

            <div
                class="cr-hero-area p-relative cr-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-11">
                            <div class="cr-hero-content text-center">
                                <span class="cr-hero-subtitle d-inline-block mb-15 it-fade-anim" data-fade-from="top" data-delay=".3">
                                    <?php echo esc_html($od_hero_banner_subtitle, 'ordainit-toolkit'); ?>
                                </span>
                                <div class="it_text_reveal_anim">
                                    <h1 class="cr-hero-title mb-15"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                </div>
                                <div class="cr-hero-text mb-105">
                                    <p class="mb-30 it-fade-anim" data-fade-from="bottom" data-delay=".5"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    <div class="cr-hero-button flex-nowrap d-sm-flex align-items-center justify-content-center">
                                        <div class="it-fade-anim" data-fade-from="top" data-delay=".5" data-ease="bounce">
                                            <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                                <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                            </a>
                                        </div>
                                        <div class="it-hero-video flex-wrap justify-content-center d-flex align-items-center it-fade-anim" data-fade-from="top" data-delay=".7" data-ease="bounce">
                                            <a href="<?php echo esc_url($od_hero_banner_video_btn_url, 'ordainit-toolkit'); ?>" class="popup-video">
                                                <i>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 6.2265L0 0.452994L0 12L10 6.2265Z"
                                                            fill="currentcolor" />
                                                    </svg>
                                                </i>
                                            </a>
                                            <span>
                                                <?php echo esc_html($od_hero_banner_video_btn_text, 'ordainit-toolkit');  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cr-hero-thumb it-fade-anim" data-fade-from="bottom" data-delay=".9">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div
                class="pg-hero-area pg-hero-ptb z-index-1 p-relative section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="pg-hero-shape-4"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <div class="container">
                    <div class="row align-items-xl-end align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="pg-hero-content">
                                <span class="pg-hero-subtitle it-fade-anim" data-fade-from="top"><?php echo od_kses($od_hero_banner_subtitle, 'ordainit-toolkit'); ?></span>
                                <h1 class="pg-hero-title mb-5 it-char-animation"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <p class="mb-40 it-fade-anim" data-fade-from="bottom" data-delay=".3"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                <div class="pg-hero-input-box p-relative it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 it-fade-anim" data-fade-from="left" data-delay=".5" data-ease="bounce">
                            <div class="pg-hero-thumb-box text-center text-lg-start z-index-1 p-relative">
                                <div class="pg-hero-thumb">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <img class="pg-hero-shape-1 d-none d-md-block" src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                <img class="pg-hero-shape-2 d-none d-sm-block" src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
                                <span class="pg-hero-shape-3 d-none d-lg-block">
                                    <?php echo od_kses($od_hero_banner_shape_svg, 'ordainit-toolkit'); ?>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div
                class="dt-hero-area dt-hero-ptb z-index-1 p-relative section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="dt-hero-shape-1"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-2"
                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-3 d-none d-sm-block"
                    src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-5"
                    src="<?php echo esc_url($od_hero_banner_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-6"
                    src="<?php echo esc_url($od_hero_banner_shape_image_5['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9">
                            <div class="dt-hero-content text-center">
                                <h2 class="dt-hero-title mb-25 it_text_reveal_anim">
                                    <?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?>
                                </h2>
                                <div
                                    class="dt-hero-input-box p-relative mb-30 it-fade-anim"
                                    data-delay=".3">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                                <span class="mb-70 it-fade-anim" data-delay=".5"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-11">
                            <div class="dt-hero-thumb it-fade-anim" data-delay=".7">
                                <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- brand-area-start -->
                <?php if (!empty($od_hero_brand_slider_switcher)) : ?>
                    <div class="it-brand-area dt-brand-style pt-165">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="it-brand-top-box text-center mb-65">
                                        <span><?php echo esc_html($od_hero_brand_title, 'ordainit-toolkit'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="it-brand-wrap">
                                        <div class="swiper-container it-brand-active">
                                            <div class="swiper-wrapper slider-transtion">
                                                <?php foreach ($od_hero_brand_lists as $od_hero_brand_list):
                                                    $brand_thumbnail = $od_hero_brand_list['od_hero_brand_list_thumbnail'];
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div
                                                            class="it-brand-item text-center text-xxl-start">
                                                            <img
                                                                src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit') ?>"
                                                                alt="" />
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- brand-area-end -->
            </div>

        <?php else:

            //Set attributes for Button
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'it-btn mr-30'
            );
        ?>

            <div class="it-hero-area p-relative it-hero-ptb">
                <img class="it-hero-shape-1 d-none d-xl-block" src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="it-hero-shape-3" src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit') ?>" alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-xl-6 col-lg-6">
                            <div class="it-hero-content">
                                <span class="it-hero-subtitle" style="background-image: url('<?php echo esc_url($od_hero_banner_shape_image_4['url'], 'ordainit-toolkit'); ?>')">
                                    <?php echo esc_html($od_hero_banner_subtitle, 'ordainit-toolkit') ?>
                                </span>
                                <h1 class="it-hero-title it-split-text it-split-in-right"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="it-hero-text it-text-anim">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    <div class="it-hero-button flex-nowrap d-sm-flex align-items-center it-fade-anim" data-fade-from="left" data-delay=".9">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                        <div class="it-hero-video d-flex align-items-center">
                                            <a href="<?php echo esc_url($od_hero_banner_video_btn_url, 'ordainit-toolkit'); ?>" class="popup-video">
                                                <i>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 6.2265L0 0.452994L0 12L10 6.2265Z"
                                                            fill="currentcolor" />
                                                    </svg>
                                                </i>
                                            </a>
                                            <span>
                                                <?php echo esc_html($od_hero_banner_video_btn_text, 'ordainit-toolkit');  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-6 it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                            <div class="it-hero-thumb p-relative">
                                <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                <div class="it-hero-thumb-shape-1">
                                    <img src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <script>
            jQuery(document).ready(function($) {
                const sliderAutoplay = <?php echo $od_hero_brand_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_hero_brand_slider_autoplay ? 'true' : 'false'; ?>;

                // Hero Layout 2 brand slider 
                var cr_brand_slider = new Swiper(".it-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: sliderAutoplay ? {
                        delay: 3000,
                        disableOnInteraction: true,
                    } : false,
                });

                // Hero Layout 9 brand slider-1 
                var cr_brand_slider = new Swiper(".ss-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: sliderAutoplay2 ? {
                        delay: 1,
                        disableOnInteraction: true,
                    } : false,
                });

                // Hero Layout 9 brand slider-2 
                var cr_brand_slider = new Swiper(".ss-brand-active-2", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: sliderAutoplay2 ? {
                        delay: 1,
                        disableOnInteraction: true,
                    } : false,
                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Hero_Banner());
