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
class OD_Brand_Slider_Full extends Widget_Base
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
        return 'od-brand-slider-full';
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
        return __('Brand Slider Full', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/brand-slider-full.php');
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
        $od_brand_full_heading_title = $settings['od_brand_full_heading_title'];
        $od_brand_full_heading_subtitle = $settings['od_brand_full_heading_subtitle'];
        $od_brand_full_heading_btn_text = $settings['od_brand_full_heading_btn_text'];
        $od_brand_full_heading_btn_url = $settings['od_brand_full_heading_btn_url'];
        $od_brand_full_heading_shape_image = $settings['od_brand_full_heading_shape_image'];
        $od_brand_full_lists = $settings['od_brand_full_lists'];
        $od_brand_full_2_lists = $settings['od_brand_full_2_lists'];
        $od_brand_full_slider_autoplay = $settings['od_brand_full_slider_autoplay'];
?>

        <div class="cr-brand-area z-index-1 p-relative">
            <img
                class="cr-brand-shape-1 d-none d-lg-block"
                src="<?php echo esc_url($od_brand_full_heading_shape_image['url'], 'ordainit-toolkit') ?>"
                alt="" />
            <div class="cr-brand-bg pt-150 pb-145">
                <div class="container">
                    <div class="cr-brand-top-wrap">
                        <div class="row align-items-end mb-60">
                            <div class="col-lg-8">
                                <div class="cr-section-title-box">
                                    <span
                                        class="cr-section-subtitle it_text_reveal_anim"><?php echo esc_html($od_brand_full_heading_subtitle, 'ordainit-toolkit') ?></span>
                                    <h4 class="cr-section-title it_text_reveal_anim">
                                        <?php echo od_kses($od_brand_full_heading_title, 'ordainit-toolkit') ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div
                                    class="cr-brand-btn text-lg-end it-fade-anim"
                                    data-fade-from="top"
                                    data-delay=".7"
                                    data-ease="bounce">
                                    <a
                                        class="cr-btn hover-2"
                                        href="<?php echo esc_url($od_brand_full_heading_btn_url, 'ordainit-toolkit') ?>">
                                        <?php echo esc_html($od_brand_full_heading_btn_text, 'ordainit-toolkit') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container container-1750 p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-brand-wrap">
                                <div class="swiper-container cr-brand-active">
                                    <div class="swiper-wrapper slider-transtion">


                                        <?php foreach ($od_brand_full_lists as $od_brand_full_list):
                                            $brand_thumbnail = $od_brand_full_list['od_brand_full_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="cr-brand-item">
                                                    <img
                                                        src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit') ?>"
                                                        alt="" />
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-brand-wrap">
                                <div class="swiper-container cr-brand-active-2" dir="rtl">
                                    <div class="swiper-wrapper slider-transtion">

                                        <?php foreach ($od_brand_full_2_lists as $od_brand_full_2_list):
                                            $brand_thumbnail = $od_brand_full_2_list['od_brand_full_2_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="cr-brand-item">
                                                    <img
                                                        src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit') ?>"
                                                        alt="" />
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_brand_full_slider_autoplay ? 'true' : 'false'; ?>;

                const cr_brand_slider = new Swiper(".cr-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 4000,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    }
                });

                const cr_brand_slider_2 = new Swiper(".cr-brand-active-2", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 4000,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    }
                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Brand_Slider_Full());
