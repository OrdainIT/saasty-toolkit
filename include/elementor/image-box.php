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
class OD_Image_Box extends Widget_Base
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
        return 'od-image-box';
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
        return __('Image Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/image-box.php');
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
        $od_image_box_title = $settings['od_image_box_title'];
        $od_image_box_url = $settings['od_image_box_url'];
        $od_image_box_description = $settings['od_image_box_description'];
        $od_image_box_animation_fade_from = $settings['od_image_box_animation_fade_from'];
        $od_image_box_animation_delay = $settings['od_image_box_animation_delay'];
        $od_image_box_thumbnail_image = $settings['od_image_box_thumbnail_image'];
?>


        <?php if ($settings['od_design_style']  == 'layout-3'): ?>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

        <?php else: ?>

            <div class="ag-service-style">
                <div class="it-fade-anim"
                    data-fade-from="<?php echo esc_attr($od_image_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                    data-delay="<?php echo esc_attr($od_image_box_animation_delay, 'ordainit-toolkit'); ?>">
                    <div class="ai-service-item p-relative z-index-1 mb-30">
                        <span class="ai-service-icon mb-55 d-block">
                            <img src="<?php echo esc_url($od_image_box_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="#">
                        </span>
                        <div class="ai-service-content">
                            <h4 class="dt-service-title mb-25">
                                <a class="border-line-white"
                                    href="<?php echo esc_url($od_image_box_url['url'], 'ordainit-toolkit'); ?>">
                                    <?php echo od_kses($od_image_box_title, 'ordainit-toolkit'); ?>
                                </a>
                            </h4>
                            <p class="mb-0"><?php echo od_kses($od_image_box_description, 'ordainit-toolkit'); ?></p>
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

$widgets_manager->register(new OD_Image_Box());
