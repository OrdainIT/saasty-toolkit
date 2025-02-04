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
class OD_Water_Mark_Text_Slider extends Widget_Base
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
        return 'od-water-mark-text-slider';
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
        return __('Water Mark Slider', 'ordainit-toolkit');
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

        // Content
        $this->start_controls_section(
            'od_water_mark_slider_content',
            [
                'label' => __('Water Mark Slider Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_water_mark_slider_lists',
            [
                'label' => esc_html__('Text Slider Items', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_water_mark_slider_list_text',
                        'label' => esc_html__('Slider Text', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_water_mark_slider_list_image',
                        'label' => esc_html__('Slider Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'default' => [
                    [
                        'od_water_mark_slider_list_text' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
                    ],
                    [
                        'od_water_mark_slider_list_text' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
                    ],
                    [
                        'od_water_mark_slider_list_text' => esc_html__('AI IMAGE GENERATE', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_water_mark_slider_list_text }}}',
            ]
        );


        $this->end_controls_section();


        // Style
        $this->start_controls_section(
            'od_water_mark_slider_style',
            [
                'label' => __('Water Mark Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_water_mark_slider_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-text-slider-item span' => '-webkit-text-stroke: 1px {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Text Typography', 'ordainit-toolkit'),
                'name' => 'od_water_mark_slider_text_typography',
                'selector' => '{{WRAPPER}} .it-text-slider-item span',
            ]
        );

        $this->add_control(
            'od_water_mark_slider_margin',
            [
                'label' => esc_html__('Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .it-text-slider-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_water_mark_slider_padding',
            [
                'label' => esc_html__('Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => [
                    'top' => 30,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .it-text-slider-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
        $od_water_mark_slider_lists = $settings['od_water_mark_slider_lists'];
?>


        <div class="it-text-slider-area fix black-2-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 it-fade-anim" data-fade-from="bottom" data-delay=".3">
                        <div class="swiper-container it-text-active">
                            <div class="swiper-wrapper slider-transtion">
                                <?php foreach ($od_water_mark_slider_lists as $od_water_mark_slider_list): ?>
                                    <div class="swiper-slide">
                                        <div class="it-text-slider-item">
                                            <span><?php echo esc_html($od_water_mark_slider_list['od_water_mark_slider_list_text'], 'ordainit-toolkit'); ?></span>
                                            <img src="<?php echo esc_url($od_water_mark_slider_list['od_water_mark_slider_list_image']['url'], 'ordainit-toolkit') ?>" alt="">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            jQuery(document).ready(function($) {
                var it_text_slider = new Swiper(".it-text-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 5000,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    },
                });
            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Water_Mark_Text_Slider());
