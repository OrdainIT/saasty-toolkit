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
class OD_Video_Popup extends Widget_Base
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
        return 'od-video-popup';
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
        return __('Video Popup', 'ordainit-toolkit');
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
            'od_video_popup_content',
            [
                'label' => __('Popup Video Content', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_video_popup_thumbnail_image',
            [
                'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_video_popup_url',
            [
                'label' => __('URL', 'ordainit-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );


        $this->end_controls_section();


        // Animation Section
        $this->start_controls_section(
            'od_video_popup_animation',
            [
                'label' => __('Popup Animation', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_video_popup_animation_fade_from',
            [
                'label' => __('Fade From', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'top' => __('Top', 'ordainit-toolkit'),
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'right' => __('Right', 'ordainit-toolkit'),
                ],
                'default' => 'top',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_video_popup_animation_delay',
            [
                'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('0.3', 'ordainit-toolkit'),
                'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Style

        $this->start_controls_section(
            'od_video_popup_style',
            [
                'label' => __('Popup Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_video_popup_overlay_color',
            [
                'label' => esc_html__('Overlay Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-video-inner-item::after' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'od_video_popup_border_radius',
            [
                'label' => __('Border Radius', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .it-video-inner-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .it-video-inner-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_video_popup_btn_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-video-inner-item:hover .cr-video-btn svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_video_popup_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-video-inner-item:hover .cr-video-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_video_popup_btn_animation_color',
            [
                'label' => __('Animation Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255, 255, 255, 0.2)',
                'selectors' => [
                    '{{WRAPPER}} .cr-video-btn' => '--animation-color: {{VALUE}};',
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
        $od_video_popup_thumbnail_image = $settings['od_video_popup_thumbnail_image'];
        $od_video_popup_url = $settings['od_video_popup_url'];
        $od_video_popup_animation_fade_from = $settings['od_video_popup_animation_fade_from'];
        $od_video_popup_animation_delay = $settings['od_video_popup_animation_delay'];
        $animation_color = isset($settings['od_video_popup_btn_animation_color']) ? $settings['od_video_popup_btn_animation_color'] : 'rgba(255, 255, 255, 0.2)';
?>


        <div class="it-video-inner-item p-relative it-fade-anim"
            data-fade-from="<?php echo esc_attr($od_video_popup_animation_fade_from, 'ordainit-toolkit'); ?>"
            data-delay="<?php echo esc_attr($od_video_popup_animation_delay, 'ordainit-toolkit'); ?>"
            style="--animation-color: <?php echo esc_attr($animation_color); ?>;">
            <div class="it-video-inner-thumb">
                <img src="<?php echo esc_url($od_video_popup_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
            </div>
            <a class="cr-video-btn popup-video" href="<?php echo esc_url($od_video_popup_url['url'], 'ordainit-toolkit'); ?>">
                <i>
                    <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 12L0 24L0 0L20 12Z" fill="#143230" />
                    </svg>
                </i>
            </a>
        </div>

        <style>
            @-webkit-keyframes ripple-white {
                0% {
                    -webkit-box-shadow: 0 0 0 0 var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 10px var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(255, 255, 255, 0.2));
                    box-shadow: 0 0 0 0 var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 10px var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(255, 255, 255, 0.2));
                }

                100% {
                    -webkit-box-shadow: 0 0 0 10px var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 30px rgba(255, 255, 255, 0);
                    box-shadow: 0 0 0 10px var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(255, 255, 255, 0.2)),
                        0 0 0 30px rgba(255, 255, 255, 0);
                }
            }
        </style>


        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Video_Popup());
