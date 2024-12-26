<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Widget_Base;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class OD_Video_Button extends Widget_Base
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
        return 'od-video-button';
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
        return __('Video Button', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/video-button.php');
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
        $od_video_btn_url = $settings['od_video_btn_url'];
        $animation_color = isset($settings['od_video_popup_btn_animation_color']) ? $settings['od_video_popup_btn_animation_color'] : 'rgba(255, 255, 255, 0.2)';

?>

        <?php if ($settings['od_design_style']  == 'layout-3'): ?>
            <div class="d-inline-block ag-video-style"
                style="--animation-color: <?php echo esc_attr($animation_color); ?>;">
                <a class="cr-video-btn popup-video cr-video-btn-layout-2" href="<?php echo esc_url($od_video_btn_url['url'], 'ordainit-toolkit'); ?>">
                    <i>
                        <svg width="35" height="41" viewBox="0 0 35 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M35 20.7927L0 0.58548V41L35 20.7927Z" fill="white"></path>
                        </svg>
                    </i>
                </a>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="d-inline-block" style="--animation-color: <?php echo esc_attr($animation_color); ?>;">
                <a class="cr-video-btn popup-video cr-video-btn-layout-2" href="<?php echo esc_url($od_video_btn_url['url'], 'ordainit-toolkit'); ?>">
                    <i>
                        <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 10L0 0L0 20L14 10Z" fill="currentcolor"></path>
                        </svg>
                    </i>
                </a>
            </div>

        <?php else: ?>

            <div class="dt-video-box d-inline-block"
                style="--animation-color: <?php echo esc_attr($animation_color); ?>;">
                <a href="<?php echo esc_url($od_video_btn_url['url'], 'ordainit-toolkit'); ?>" class="popup-video">
                    <i>
                        <svg width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12.5L0.349365 25V0L22 12.5Z" fill="#0C1E1B"></path>
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


        <?php endif; ?>

        <style>
            @-webkit-keyframes ripple-green {
                0% {
                    -webkit-box-shadow: 0 0 0 0 var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 10px var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(31, 226, 145, 0.2));
                    box-shadow: 0 0 0 0 var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 10px var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(31, 226, 145, 0.2));
                }

                100% {
                    -webkit-box-shadow: 0 0 0 10px var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 30px rgba(31, 226, 145, 0);
                    box-shadow: 0 0 0 10px var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 20px var(--animation-color, rgba(31, 226, 145, 0.2)),
                        0 0 0 30px rgba(31, 226, 145, 0);
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

$widgets_manager->register(new OD_Video_Button());
