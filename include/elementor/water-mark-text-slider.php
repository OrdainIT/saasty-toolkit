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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/water-mark-text-slider.php');
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
