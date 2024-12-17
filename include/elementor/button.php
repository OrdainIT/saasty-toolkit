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
class OD_Button extends Widget_Base
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
        return 'od-button';
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
        return __('Button', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/button.php');
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
        $od_btn_text = $settings['od_btn_text'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];
        $od_btn_animation_fade_from = $settings['od_btn_animation_fade_from'];
        $od_btn_animation_ease = $settings['od_btn_animation_ease'];
        $od_btn_animation_delay = $settings['od_btn_animation_delay'];
?>
        <?php
        // Link
        if ('2' == $od_btn_link_type) {
            $this->add_render_attribute('od-button-arg', 'href', get_permalink($od_btn_page_link));
            $this->add_render_attribute('od-button-arg', 'target', '_self');
            $this->add_render_attribute('od-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('od-button-arg', 'class', 'it-btn');
        } else {
            if (! empty($od_btn_link['url'])) {
                $this->add_link_attributes('od-button-arg', $od_btn_link);
                $this->add_render_attribute('od-button-arg', 'class', 'it-btn');
            }
        }
        ?>

        <div
            class="it-fade-anim d-inline-block"
            data-fade-from="<?php echo esc_attr($od_btn_animation_fade_from, 'ordainit-toolkit'); ?>"
            data-ease="<?php echo esc_attr($od_btn_animation_ease, 'ordainit-toolkit'); ?>"
            data-delay="<?php echo esc_attr($od_btn_animation_delay, 'ordainit-toolkit'); ?>">

            <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                <?php echo esc_html($od_btn_text, 'ordainit-toolkit'); ?>
            </a>

        </div>


        <script>
            jQuery(document).ready(function($) {

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Button());
