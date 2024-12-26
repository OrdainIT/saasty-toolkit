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
class OD_Single_Service extends Widget_Base
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
        return 'od-single-service';
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
        return __('Single Service', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/single-service.php');
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
        $od_single_service_title = $settings['od_single_service_title'];
        $od_single_service_url = $settings['od_single_service_url'];
        $od_single_service_description = $settings['od_single_service_description'];
        $od_single_service_thumbnail_image = $settings['od_single_service_thumbnail_image'];
        $od_single_service_animation_fade_from = $settings['od_single_service_animation_fade_from'];
        $od_single_service_animation_delay = $settings['od_single_service_animation_delay'];
?>

        <div class="ss-service-style it-fade-anim"
            data-fade-from="<?php echo esc_attr($od_single_service_animation_fade_from, 'ordainit-toolkit'); ?>"
            data-delay="<?php echo esc_attr($od_single_service_animation_delay, 'ordainit-toolkit'); ?>">
            <div class="dt-service-item mb-35">
                <div>
                    <span class="dt-service-icon mb-40 d-block">
                        <img src="<?php echo esc_url($od_single_service_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                    </span>
                    <div class="dt-service-content">
                        <h4 class="dt-service-title mb-25">
                            <a class="border-line-white" href="<?php echo esc_url($od_single_service_url['url'], 'ordainit-toolkit'); ?>">
                                <?php echo od_kses($od_single_service_title, 'ordainit-toolkit'); ?>
                            </a>
                        </h4>
                        <p class="mb-35">
                            <?php echo od_kses($od_single_service_description, 'ordainit-toolkit'); ?>
                        </p>
                        <div class="dt-service-link">
                            <a class="dt-service-link"
                                href="<?php echo esc_url($od_single_service_url['url'], 'ordainit-toolkit'); ?>">
                                <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7709 4.44699C19.7706 4.44676 19.7704 4.44648 19.7702 4.44625L15.688 0.383747C15.3821 0.0794115 14.8875 0.0805441 14.5831 0.386403C14.2787 0.692224 14.2799 1.18687 14.5857 1.49125L17.3265 4.21875H0.78125C0.349766 4.21875 0 4.56851 0 5C0 5.43148 0.349766 5.78125 0.78125 5.78125H17.3264L14.5857 8.50875C14.2799 8.81312 14.2788 9.30777 14.5831 9.61359C14.8875 9.91949 15.3822 9.92054 15.688 9.61625L19.7702 5.55375C19.7704 5.55351 19.7706 5.55324 19.7709 5.55301C20.0769 5.24761 20.0759 4.75136 19.7709 4.44699Z" fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Single_Service());
