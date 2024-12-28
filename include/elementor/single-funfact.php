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
class OD_Single_FunFact extends Widget_Base
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
        return 'od-single-funfact';
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
        return __('Single FunFact', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/single-funfact.php');
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
        $od_single_funfact_number = $settings['od_single_funfact_number'];
        $od_single_funfact_suffix = $settings['od_single_funfact_suffix'];
        $od_single_funfact_description = $settings['od_single_funfact_description'];

?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="seo-choose-item">
                <span><i class="purecounter"
                        data-purecounter-duration="1"
                        data-purecounter-end="<?php echo esc_attr($od_single_funfact_number, 'ordainit-toolkit') ?>">
                        0</i><?php echo esc_html($od_single_funfact_suffix, 'ordainit-toolkit') ?></span>
                <p><?php echo od_kses($od_single_funfact_description, 'ordainit-toolkit') ?></p>
            </div>

        <?php else: ?>

            <div class="it-fade-anim" data-fade-from="bottom" data-delay=".7">
                <div class="ss-about-funfact-item">
                    <h5><i class="purecounter"
                            data-purecounter-duration="1"
                            data-purecounter-end="<?php echo esc_attr($od_single_funfact_number, 'ordainit-toolkit') ?>">
                            0</i><?php echo esc_html($od_single_funfact_suffix, 'ordainit-toolkit') ?></h5>
                    <span><?php echo od_kses($od_single_funfact_description, 'ordainit-toolkit') ?></span>
                </div>
            </div>

        <?php endif; ?>


        <script>
            jQuery(document).ready(function($) {

                // Counter Js
                if ($(".purecounter").length) {
                    new PureCounter({
                        filesizing: true,
                        selector: ".filesizecount",
                        pulse: 2,
                    });
                    new PureCounter();
                }

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Single_FunFact());
