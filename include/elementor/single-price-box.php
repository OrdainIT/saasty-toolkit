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
class Od_Single_Price_Box extends Widget_Base
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
        return 'single-price-box';
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
        return __('Singel Price Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/single-price-box.php');
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

        $single_price_box_package_title = $settings['single_price_box_package_title'];
        $single_price_box_package_price = $settings['single_price_box_package_price'];
        $single_price_box_package_features = $settings['single_price_box_package_features'];
        $single_price_box_package_description = $settings['single_price_box_package_description'];
        $single_price_box_package_button = $settings['single_price_box_package_button'];
        $single_price_box_package_button_url = $settings['single_price_box_package_button_url'];
        $single_price_box_package_shape_image = $settings['single_price_box_package_shape_image'];
        $od_single_price_box_fade_animation = $settings['od_single_price_box_fade_animation'];
        $od_single_price_box_delay = $settings['od_single_price_box_delay'];

?>

        <div class="ss-price-style it-fade-anim" data-fade-from="<?php echo esc_attr($od_single_price_box_fade_animation, 'ordainit-toolkit'); ?>" data-delay="<?php echo esc_attr($od_single_price_box_delay, 'ordainit-toolkit'); ?>">
            <div class="it-price-item p-relative mb-30">
                <div class="it-price-head">
                    <div class="it-price-value-wrap d-flex justify-content-between">
                        <div>
                            <span class="it-price-value"><?php echo esc_html($single_price_box_package_price, 'ordainit-toolkit');?></span>
                            <i><?php echo esc_html($single_price_box_package_title, 'ordainit-toolkit'); ?></i>
                        </div>
                        <div class="it-price-value-icon">
                            <img src="<?php echo esc_url($single_price_box_package_shape_image['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                    </div>
                    <p><?php echo od_kses($single_price_box_package_description, 'ordainit-toolkit'); ?></p>
                </div>
                <div class="it-price-body">
                    <div class="it-price-item-list mb-50">
                        <?php echo od_kses($single_price_box_package_features, 'ordainit-toolkit'); ?>

                    </div>
                    <div class="it-price-button">
                        <a class="ss-btn border-btn" href="<?php echo esc_url($single_price_box_package_button_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($single_price_box_package_button, 'ordainit-toolkit'); ?></a>
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

$widgets_manager->register(new Od_Single_Price_Box());
