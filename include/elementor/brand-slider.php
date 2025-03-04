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
class OD_Brand_Slider extends Widget_Base
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
        return 'od-brand-slider';
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
        return __('Brand Slider', 'ordainit-toolkit');
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();


        // Brand Title Area Starts
        $this->start_controls_section(
            'od_brand_title_section',
            [
                'label' => __('Brand Title', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1'],
                ],
            ]
        );

        $this->add_control(
            'od_brand_title_show',
            [
                'label' => esc_html__('Show Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'od_brand_title',
            [
                'label' => __('Brand Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('od brand', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type brand title here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_brand_title_show' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Brand Area Starts
        $this->start_controls_section(
            'od_brand_section',
            [
                'label' => __('Brand Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_lists',
            [
                'label' => esc_html__('Brand List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_brand_list_thumbnail',
                        'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],

                    ],
                ],
                'default' => [
                    [
                        'od_brand_list_thumbnail' => esc_url('od_brand_list_thumbnail', 'ordainit-toolkit'),
                    ],

                ],
                'title_field' => 'Brand',
            ]
        );

        $this->end_controls_section();


        // Brand Area 2 Starts
        $this->start_controls_section(
            'od_brand_section_2',
            [
                'label' => __('Brand Content 2', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-3'],
                ],
            ]
        );

        $this->add_control(
            'od_brand_2_lists',
            [
                'label' => esc_html__('Brand 2 List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_brand_2_list_thumbnail',
                        'label' => esc_html__('Choose Brand Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],


                    ],
                ],

                'default' => [
                    [
                        'od_brand_2_list_thumbnail' => esc_url('od_brand_2_list_thumbnail', 'ordainit-toolkit'),
                    ],

                ],

                'title_field' => 'Brand_2',
            ]
        );

        $this->end_controls_section();


        // Brand Slider settings
        $this->start_controls_section(
            'od_brand_slider_settings',
            [
                'label' => __('Brand Slider Settings', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_brand_slider_autoplay',
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
            'od_brand_style',
            [
                'label' => __('Brand Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_brand_bg_color',
            [
                'label' => esc_html__('Brand BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gray-bg' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .blue-bg' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_brand_padding',
            [
                'label' => esc_html__('Brand Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .it-brand-ptb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ss-brand-ptb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        // Brand Content Style
        $this->start_controls_section(
            'od_brand_content_style',
            [
                'label' => __('Brand Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_brand_line_color',
            [
                'label' => esc_html__('Brand Line Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .it-brand-top-box::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_brand_title_bg_color',
            [
                'label' => esc_html__('Brand Title BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .it-brand-top-box span' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_brand_title_color',
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
                'name' => 'od_brand_title_typography',
                'selector' => '{{WRAPPER}} .it-brand-top-box span',
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
        $od_brand_lists = $settings['od_brand_lists'];
        $od_brand_title = $settings['od_brand_title'];
        $od_brand_slider_autoplay = $settings['od_brand_slider_autoplay'];
        $od_brand_title_show = $settings['od_brand_title_show'];
        $od_brand_2_lists = $settings['od_brand_2_lists'];
?>

        <?php if ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="ma-brand-style ss-brand-area gray-bg ss-brand-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ss-brand-wrap mb-30">
                                <div class="swiper-container ss-brand-active" dir="rtl">
                                    <div class="swiper-wrapper slider-transtion d-flex align-items-center">

                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="ss-brand-item text-center">
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
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="ss-brand-wrap">
                                <div class="swiper-container ss-brand-active-2">
                                    <div class="swiper-wrapper slider-transtion d-flex align-items-center">

                                        <?php foreach ($od_brand_2_lists as $od_brand_2_list):
                                            $brand_thumbnail = $od_brand_2_list['od_brand_2_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="ss-brand-item text-center">
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

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="ss-brand-area ss-brand-ptb blue-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ss-brand-wrap">
                                <div class="swiper-container ss-brand-active">
                                    <div
                                        class="swiper-wrapper slider-transtion d-flex align-items-center">

                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="ss-brand-item text-center">
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

        <?php else: ?>
            <div class="it-brand-area it-brand-ptb gray-bg">
                <div class="container">
                    <?php if (!empty($od_brand_title_show)) : ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="it-brand-top-box text-center mb-65">
                                    <span><?php echo esc_html($od_brand_title, 'ordainit-toolkit'); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="it-brand-wrap">
                                <div class="brand-marquee">
                                    <div class="brand-track">
                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="it-brand-item">
                                                <img src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit'); ?>" alt="" />
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- Duplicate the content for seamless scrolling -->
                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="it-brand-item">
                                                <img src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit'); ?>" alt="" />
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- Duplicate the content for seamless scrolling -->
                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="it-brand-item">
                                                <img src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit'); ?>" alt="" />
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

        <style>
            .brand-marquee {
                overflow: hidden;
                white-space: nowrap;
                width: 100%;
            }

            .brand-track {
                animation: scrollLeft 7s linear infinite;
            }

            .it-brand-item {
                display: inline-block;
                margin: 0 50px;
            }



            @keyframes scrollLeft {
                100% {
                    transform: translateX(-50%);
                }

                0% {
                    transform: translateX(0%);
                }
            }
        </style>



        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_brand_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_brand_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay3 = <?php echo $od_brand_slider_autoplay ? 'true' : 'false'; ?>;

                // Layout-1
                var cr_brand_slider = new Swiper(".it-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: false,
                    },
                });

                // Layout 2
                const cr_brand_slider_2 = new Swiper(".ss-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    }
                });

                // layout -3
                const cr_brand_slider_3 = new Swiper(".ss-brand-active-2", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
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

$widgets_manager->register(new OD_Brand_Slider());
