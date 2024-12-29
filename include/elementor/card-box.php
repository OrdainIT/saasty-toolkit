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
class OD_Card_Box extends Widget_Base
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
        return 'od-card-box';
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
        return __('Card Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/card-box.php');
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
        $od_card_box_title = $settings['od_card_box_title'];
        $od_card_box_description = $settings['od_card_box_description'];
        $od_card_box_number = $settings['od_card_box_number'];
        $od_card_box_animation_fade_from = $settings['od_card_box_animation_fade_from'];
        $od_card_box_animation_delay = $settings['od_card_box_animation_delay'];
        $od_card_box_icon = $settings['od_card_box_icon'];
?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="ma-marketing-2-content-box d-inline-flex align-items-start">
                <span class="ma-marketing-2-icon">
                    <?php echo od_kses($od_card_box_icon, 'ordainit-toolkit'); ?>

                </span>
                <div class="ma-marketing-2-content">
                    <h4 class="ma-marketing-2-title"><?php echo esc_html($od_card_box_title, 'ordainit-toolkit'); ?></h4>
                    <p><?php echo od_kses($od_card_box_description, 'ordainit-toolkit'); ?></p>
                </div>
            </div>

        <?php else: ?>


            <div class="ss-work-item-box it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_card_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_card_box_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="z-index-1 d-flex align-items-center">
                    <h5 class="ss-work-item-number"><?php echo esc_html($od_card_box_number, 'ordainit-toolkit'); ?></h5>
                    <div class="ss-work-item-content">
                        <span><?php echo esc_html($od_card_box_title, 'ordainit-toolkit'); ?></span>
                        <p><?php echo od_kses($od_card_box_description, 'ordainit-toolkit'); ?></p>
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

$widgets_manager->register(new OD_Card_Box());
