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
class OD_Brand_Slider_Full extends Widget_Base
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
        return 'od-brand-slider-full';
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
        return __('Brand Slider Full', 'ordainit-toolkit');
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

        // Brand Area Starts
        $this->start_controls_section(
            'od_brand_full_heading_section',
            [
                'label' => __('Brand Heading Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_full_heading_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Brand Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_brand_full_heading_subtitle',
            [
                'label' => __('Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Brand Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_brand_full_heading_btn_text',
            [
                'label' => __('Btn Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type btn text here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_brand_full_heading_btn_url',
            [
                'label' => __('Btn Url', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type btn url here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_brand_full_heading_shape_image',
            [
                'label' => esc_html__('Choose Shape Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Brand Area Starts
        $this->start_controls_section(
            'od_brand_full_section',
            [
                'label' => __('Brand Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_full_lists',
            [
                'label' => esc_html__('Brand List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_brand_full_list_thumbnail',
                        'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],

                    ],
                ],
                'default' => [
                    [
                        'od_brand_full_list_thumbnail' => esc_url('od_brand_full_list_thumbnail', 'ordainit-toolkit'),
                    ],

                ],
                'title_field' => 'Brand',
            ]
        );

        $this->end_controls_section();


        // Brand Area 2 Starts
        $this->start_controls_section(
            'od_brand_full_section_2',
            [
                'label' => __('Brand Content 2', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_full_2_lists',
            [
                'label' => esc_html__('Brand 2 List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_brand_full_2_list_thumbnail',
                        'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],

                    ],
                ],
                'default' => [
                    [
                        'od_brand_full_2_list_thumbnail' => esc_url('od_brand_full_2_list_thumbnail', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => 'Brand_2',
            ]
        );

        $this->end_controls_section();


        // Brand Slider settings
        $this->start_controls_section(
            'od_brand_full_slider_settings',
            [
                'label' => __('Brand Slider Settings', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_full_slider_autoplay',
            [
                'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'ordainit-toolkit'),
                'label_off' => esc_html__('Off', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();


        // Brand Style
        $this->start_controls_section(
            'od_brand_full_style',
            [
                'label' => __('Brand Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_brand_gradient_direction',
            [
                'label' => esc_html__('Gradient Direction', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '180deg',
                'options' => [
                    '0deg' => esc_html__('Top to Bottom', 'ordainit-toolkit'),
                    '90deg' => esc_html__('Left to Right', 'ordainit-toolkit'),
                    '180deg' => esc_html__('Bottom to Top', 'ordainit-toolkit'),
                    '270deg' => esc_html__('Right to Left', 'ordainit-toolkit'),
                ],
            ]
        );

        $this->add_control(
            'od_brand_gradient_start_color',
            [
                'label' => esc_html__('Gradient Start Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f1f5ff',
                'selectors' => [
                    '{{WRAPPER}} .cr-brand-bg' => 'background: linear-gradient({{od_brand_gradient_direction.VALUE}}, {{VALUE}} 0%, {{od_brand_gradient_end_color.VALUE}} 100%);',
                ],
            ]
        );

        $this->add_control(
            'od_brand_gradient_end_color',
            [
                'label' => esc_html__('Gradient End Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(241, 245, 255, 0)',
                'selectors' => [
                    '{{WRAPPER}} .cr-brand-bg' => 'background: linear-gradient({{od_brand_gradient_direction.VALUE}}, {{od_brand_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
                ],
            ]
        );

        $this->end_controls_section();

        // Brand Style
        $this->start_controls_section(
            'od_brand_full_content_style',
            [
                'label' => __('Brand Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_brand_slider_full_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_brand_slider_full_title_typography',
                'selector' => '
            {{WRAPPER}} .cr-section-title 
        ',
            ]
        );

        $this->add_control(
            'od_brand_slider_full_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_brand_slider_full_subtitle_typography',
                'selector' => '
            {{WRAPPER}} .cr-section-subtitle
        ',
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
            'od_brand_slider_full_btn_style_tabs'
        );

        // Normal
        $this->start_controls_tab(
            'od_brand_slider_full_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_slider_full_btn_style_normal_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_brand_slider_full_btn_style_normal_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover

        $this->start_controls_tab(
            'od_brand_slider_full_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_slider_full_btn_style_hover_color',
            [
                'label' => esc_html__('Button hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_brand_slider_full_btn_style_hover_bgcolor',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-btn::after' => 'background-color: {{VALUE}}',
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
                'name' => 'od_brand_slider_full_btn_typography',
                'selector' => '
        {{WRAPPER}} .cr-btn
        ',
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
        $od_brand_full_heading_title = $settings['od_brand_full_heading_title'];
        $od_brand_full_heading_subtitle = $settings['od_brand_full_heading_subtitle'];
        $od_brand_full_heading_btn_text = $settings['od_brand_full_heading_btn_text'];
        $od_brand_full_heading_btn_url = $settings['od_brand_full_heading_btn_url'];
        $od_brand_full_heading_shape_image = $settings['od_brand_full_heading_shape_image'];
        $od_brand_full_lists = $settings['od_brand_full_lists'];
        $od_brand_full_2_lists = $settings['od_brand_full_2_lists'];
        $od_brand_full_slider_autoplay = $settings['od_brand_full_slider_autoplay'];
?>

        <div class="cr-brand-area z-index-1 p-relative">
            <img
                class="cr-brand-shape-1 d-none d-lg-block"
                src="<?php echo esc_url($od_brand_full_heading_shape_image['url'], 'ordainit-toolkit') ?>"
                alt="" />
            <div class="cr-brand-bg pt-150 pb-145">
                <div class="container">
                    <div class="cr-brand-top-wrap">
                        <div class="row align-items-end mb-60">
                            <div class="col-lg-8">
                                <div class="cr-section-title-box">
                                    <span
                                        class="cr-section-subtitle it_text_reveal_anim"><?php echo esc_html($od_brand_full_heading_subtitle, 'ordainit-toolkit') ?></span>
                                    <h4 class="cr-section-title it_text_reveal_anim">
                                        <?php echo od_kses($od_brand_full_heading_title, 'ordainit-toolkit') ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div
                                    class="cr-brand-btn text-lg-end it-fade-anim"
                                    data-fade-from="top"
                                    data-delay=".7"
                                    data-ease="bounce">
                                    <a
                                        class="cr-btn hover-2"
                                        href="<?php echo esc_url($od_brand_full_heading_btn_url, 'ordainit-toolkit') ?>">
                                        <?php echo esc_html($od_brand_full_heading_btn_text, 'ordainit-toolkit') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container container-1750 p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-brand-wrap">
                                <div class="swiper-container cr-brand-active">
                                    <div class="swiper-wrapper slider-transtion">


                                        <?php foreach ($od_brand_full_lists as $od_brand_full_list):
                                            $brand_thumbnail = $od_brand_full_list['od_brand_full_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="cr-brand-item">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-brand-wrap">
                                <div class="swiper-container cr-brand-active-2" dir="rtl">
                                    <div class="swiper-wrapper slider-transtion">

                                        <?php foreach ($od_brand_full_2_lists as $od_brand_full_2_list):
                                            $brand_thumbnail = $od_brand_full_2_list['od_brand_full_2_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="cr-brand-item">
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
        </div>


        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_brand_full_slider_autoplay ? 'true' : 'false'; ?>;

                const cr_brand_slider = new Swiper(".cr-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 4000,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    }
                });

                const cr_brand_slider_2 = new Swiper(".cr-brand-active-2", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 4000,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    }
                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Brand_Slider_Full());
