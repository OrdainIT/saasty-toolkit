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
class Od_Tab extends Widget_Base
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
        return 'od-tab';
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
        return __('Od Tab', 'ordainit-toolkit');
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
            'od_tab_section',
            [
                'label' => __('Tab Content', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_tab_repeater',
            [
                'label' => esc_html__('Tab List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_tab_nav_button_title',
                        'label' => esc_html__('Tab Nav Button', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Management', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_tab_content_title',
                        'label' => esc_html__('Tab Content Title', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => od_kses('Manage All Operations <br> with Rich Analytics.', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_tab_content_description',
                        'label' => esc_html__('Tab Content Description', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => od_kses('CRM Brings your everything your need to increase lead <br>  numbers, accelerate sales and measure sales.', 'textdomain'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'od_tab_content_list',
                        'label' => esc_html__('Tab Content List', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => od_kses('List Content', 'textdomain'),
                        'label_block' => true,
                    ],
                    // button title

                    [
                        'name' => 'od_tab_button_title',
                        'label' => esc_html__('Button Text', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Get Started', 'textdomain'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'od_tab_button_url',
                        'label' => esc_html__('Button URL', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'textdomain'),
                        'label_block' => true,
                    ],

                    // tab bg image
                    [
                        'name' => 'od_tab_bg_image',
                        'label' => esc_html__('Tab Background Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    //tab shape image 1
                    [
                        'name' => 'od_tab_shape_image_1',
                        'label' => esc_html__('Tab Shape Image 1', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    // tab shape image 2
                    [
                        'name' => 'od_tab_shape_image_2',
                        'label' => esc_html__('Tab Shape Image 2', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    // tab shape image 3
                    [
                        'name' => 'od_tab_shape_image_3',
                        'label' => esc_html__('Tab Shape Image 3', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],








                ],
                'default' => [
                    [
                        'od_tab_nav_button_title' => esc_html__('Management', 'textdomain'),
                    ],
                    [
                        'od_tab_nav_button_title' => esc_html__('Sales', 'textdomain'),
                    ],
                    [
                        'od_tab_nav_button_title' => esc_html__('Performance', 'textdomain'),
                    ],
                    [
                        'od_tab_nav_button_title' => esc_html__('Omnichannel', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ od_tab_nav_button_title }}}',
            ]

        );





        $this->end_controls_section();


        $this->start_controls_section(
            'od_tab_shap',
            [
                'label' => __('Tab Shap', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_tab_shape_image_1',
            [
                'label' => __('Tab Shape Image 1', 'ordainit-toolkit'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'od_tab_shape_image_2',
            [
                'label' => __('Tab Shape Image 2', 'ordainit-toolkit'),
                'type' => Controls_Manager::MEDIA,
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'od_tab_style_section',
            [
                'label' => __('Tab Nav Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // Nav button bg color

        $this->add_control(
            'od_tab_nav_button_bg_color',
            [
                'label' => __('Nav Button Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-analytics-button nav button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // Nav button color

        $this->add_control(
            'od_tab_nav_button_color',
            [
                'label' => __('Nav Button Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-analytics-button nav button' => 'color: {{VALUE}}',
                ],
            ]
        );

        // nav button active bg color

        $this->add_control(
            'od_tab_nav_button_active_bg_color',
            [
                'label' => __('Nav Button Active Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-analytics-button nav #lineMarker' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // nav button active color

        $this->add_control(
            'od_tab_nav_button_active_color',
            [
                'label' => __('Nav Button Active Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-analytics-button nav button.active' => 'color: {{VALUE}}',
                ],
            ]
        );

        // nav button typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_tab_nav_button_typography',
                'label' => __('Nav Button Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .it-analytics-button nav button',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'od_tab_content_title_style_section',
            [
                'label' => __('Tab Content Title', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Tab content Title Color

        $this->add_control(
            'od_tab_content_title_color',
            [
                'label' => __('Tab Content Title Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .it-section-title-2' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Tab content Title Typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_tab_content_title_typography',
                'label' => __('Tab Content Title Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .it-section-title-2',
            ]
        );




        $this->end_controls_section();


        $this->start_controls_section(
            'od_tab_content_description_style',
            [
                'label' => __('Tab Description', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        // Tab content Description Color

        $this->add_control(
            'od_tab_content_description_color',
            [
                'label' => __('Tab Content Description Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .it-section-title-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Tab content Description Typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_tab_content_description_typography',
                'label' => __('Tab Content Description Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .it-section-title-box p',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'od_tab_content_list_style',
            [
                'label' => __('Tab List', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        // Tab content List Color

        $this->add_control(
            'od_tab_content_list_color',
            [
                'label' => __('Tab Content List Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .it-analytics-item-list ul li span' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Tab content List Typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_tab_content_list_typography',
                'label' => __('Tab Content List Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .it-analytics-item-list ul li span',
            ]
        );

        // List Icon Color

        $this->add_control(
            'od_tab_content_list_icon_color',
            [
                'label' => __('List Icon Fill Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-analytics-item-list ul li svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        // stroke color

        $this->add_control(
            'od_tab_content_list_icon_stroke_color',
            [
                'label' => __('List Icon Stroke Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-analytics-item-list ul li svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'od_tab_content_button_style',
            [
                'label' => __('Buton', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // tabs control for button


        $this->start_controls_tabs(
            'od_tab_content_button_style_tabs'
        );

        // tab for normal button

        $this->start_controls_tab(
            'od_tab_content_button_style_normal',
            [
                'label' => __('Normal', 'ordainit-toolkit'),
            ]
        );

        // Button Text Color

        $this->add_control(
            'od_tab_button_text_color',
            [
                'label' => __('Button Text Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn.white-bg' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Button Background Color

        $this->add_control(
            'od_tab_button_bg_color',
            [
                'label' => __('Button Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn.white-bg' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // end tab for normal button

        $this->end_controls_tab();

        // tab for hover button

        $this->start_controls_tab(
            'od_tab_content_button_style_hover',
            [
                'label' => __('Hover', 'ordainit-toolkit'),
            ]
        );

        // Button Text Color

        $this->add_control(
            'od_tab_button_text_hover_color',
            [
                'label' => __('Button Text Hover Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn.white-bg:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Button Background Color

        $this->add_control(
            'od_tab_button_bg_hover_color',
            [
                'label' => __('Button Background Hover Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // end tab for hover button

        $this->end_controls_tab();

        // end tabs for button

        $this->end_controls_tabs();

        // Button Typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_tab_button_typography',
                'selector' => '{{WRAPPER}} .it-btn.white-bg',
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
        $od_tab_repeater = $settings['od_tab_repeater'];
        $od_tab_shape_image_1 = $settings['od_tab_shape_image_1'];
        $od_tab_shape_image_2 = $settings['od_tab_shape_image_2'];
?>


        <!-- analytics-area-end -->
        <div class="it-analytics-area z-index-1 p-relative pt-110 pb-120">
            <img class="it-analytics-shape-2 d-none d-md-block" src="<?php echo esc_url($od_tab_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="it-analytics-button mb-35">
                            <nav>
                                <div class="nav nav-tab it-marker-tab p-relative" id="nav-tab" role="tablist">
                                    <?php $i = 0;
                                    foreach ($od_tab_repeater as $tab_content) : $i++; ?>
                                        <button class="nav-links <?php echo esc_attr($i === 1 ? 'active' : ''); ?> " id="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" type="button" role="tab" aria-controls="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" aria-selected="<?php echo esc_attr($i === 1 ? 'true' : 'false'); ?>"><?php echo esc_html($tab_content['od_tab_nav_button_title'], 'ordainit-toolkit'); ?></button>
                                    <?php endforeach; ?>
                                    <span id="lineMarker"></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="it-analytics-wrap">
                            <div class="tab-content" id="nav-tabContent">
                                <?php $i = 0;
                                foreach ($od_tab_repeater as $tab_content) : $i++;

                                    $tab_content_bg_img_url = $tab_content['od_tab_bg_image'];
                                    $od_tab_shape_image_1_url = $tab_content['od_tab_shape_image_1'];
                                    $od_tab_shape_image_2_url = $tab_content['od_tab_shape_image_2'];
                                    $od_tab_shape_image_3_url = $tab_content['od_tab_shape_image_3'];

                                ?>
                                    <div class="tab-pane fade <?php echo esc_attr($i === 1 ? 'active show' : ''); ?> " id="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>-tab">
                                        <div class="it-analytics-item-box z-index-1 p-relative fix d-flex justify-content-between align-items-center" style="background-image: url(<?php echo esc_url($tab_content_bg_img_url['url'], 'ordainit-toolkit'); ?>);">
                                            <img class="it-analytics-shape-1" src="<?php echo esc_url($od_tab_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                            <div class="it-analytics-item-left">
                                                <div class="it-section-title-box it-text-anim mb-30">
                                                    <h4 class="it-section-title-2 text-white mb-15 it-split-text it-split-in-right"><?php echo od_kses($tab_content['od_tab_content_title'], 'ordainit-toolkit'); ?></h4>
                                                    <p class="mb-0 "> <?php echo od_kses($tab_content['od_tab_content_description'], 'ordainit-toolkit'); ?> </p>
                                                </div>
                                                <div class="it-analytics-item-list">
                                                    <?php echo od_kses($tab_content['od_tab_content_list'], 'ordainit-toolkit'); ?>

                                                </div>
                                                <a href=" <?php echo esc_url($tab_content['od_tab_button_url'], 'ordainit-toolkit'); ?>" class="it-btn white-bg d-none d-lg-inline-block">
                                                    <?php echo esc_html($tab_content['od_tab_button_title'], 'ordainit-toolkit'); ?>
                                                </a>
                                            </div>
                                            <div class="it-analytics-item-right d-flex align-items-center">
                                                <div class="it-analytics-item-thumb-box mr-15">
                                                    <div class="it-analytics-item-thumb mb-15 it-fade-anim" data-fade-from="left" data-delay=".3">
                                                        <img src="<?php echo esc_url($od_tab_shape_image_1_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                                    </div>
                                                    <div class="it-analytics-item-thumb it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                                        <img src="<?php echo esc_url($od_tab_shape_image_2_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="it-analytics-item-thumb it-fade-anim" data-fade-from="top" data-delay=".7">
                                                    <img src="<?php echo esc_url($od_tab_shape_image_3_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- analytics-area-end -->







        <script>
            jQuery(document).ready(function($) {


                // analytics tab
                if ($('#lineMarker').length > 0) {

                    function it_tab_bg() {
                        var marker = document.querySelector('#lineMarker');
                        var item = document.querySelectorAll('.it-marker-tab button');
                        var itemActive = document.querySelector('.it-marker-tab .nav-links.active');

                        function indicator(e) {
                            marker.style.left = e.offsetLeft + "px";
                            marker.style.width = e.offsetWidth + "px";
                        }


                        item.forEach(link => {
                            link.addEventListener('click', (e) => {
                                indicator(e.target);
                            });
                        });

                        var activeNav = $('.it-marker-tab .nav-links.active');
                        var activewidth = $(activeNav).width();
                        var activePadLeft = parseFloat($(activeNav).css('padding-left'));
                        var activePadRight = parseFloat($(activeNav).css('padding-right'));
                        var totalWidth = activewidth + activePadLeft + activePadRight;

                        var precedingAnchorWidth = anchorWidthCounter();


                        $(marker).css('display', 'block');

                        $(marker).css('width', totalWidth);

                        function anchorWidthCounter() {
                            var anchorWidths = 0;
                            var a;
                            var aWidth;
                            var aPadLeft;
                            var aPadRight;
                            var aTotalWidth;
                            $('.it-marker-tab button').each(function(index, elem) {
                                var activeTest = $(elem).hasClass('active');
                                marker.style.left = elem.offsetLeft + "px";
                                if (activeTest) {

                                    return false;
                                }

                                a = $(elem).find('button');
                                aWidth = a.width();
                                aPadLeft = parseFloat(a.css('padding-left'));
                                aPadRight = parseFloat(a.css('padding-right'));
                                aTotalWidth = aWidth + aPadLeft + aPadRight;

                                anchorWidths = anchorWidths + aTotalWidth;

                            });

                            return anchorWidths;
                        }
                    }
                    it_tab_bg();
                }

            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Tab());
