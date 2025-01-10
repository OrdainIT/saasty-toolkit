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
class OD_Brand_Slider extends Widget_Base
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
        return 'od-brand-slider';
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
        return __('Brand Slider', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/brand-slider.php');
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
        $od_brand_lists = $settings['od_brand_lists'];
        $od_brand_title = $settings['od_brand_title'];
        $od_brand_slider_autoplay = $settings['od_brand_slider_autoplay'];
        $od_brand_title_show = $settings['od_brand_title_show'];
        $od_brand_2_lists = $settings['od_brand_2_lists'];
?>

        <?php if ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="ma-brand-style ss-brand-area gray-bg ss-brand-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ss-brand-wrap mb-30">
                                <div class="swiper-container ss-brand-active" dir="rtl">
                                    <div class="swiper-wrapper slider-transtion d-flex align-items-center">

                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="ss-brand-item text-center">
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
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="ss-brand-wrap">
                                <div class="swiper-container ss-brand-active-2">
                                    <div class="swiper-wrapper slider-transtion d-flex align-items-center">

                                        <?php foreach ($od_brand_2_lists as $od_brand_2_list):
                                            $brand_thumbnail = $od_brand_2_list['od_brand_2_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="ss-brand-item text-center">
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

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="ss-brand-area ss-brand-ptb blue-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ss-brand-wrap">
                                <div class="swiper-container ss-brand-active">
                                    <div
                                        class="swiper-wrapper slider-transtion d-flex align-items-center">

                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="ss-brand-item text-center">
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

        <?php else: ?>
            <div class="it-brand-area it-brand-ptb gray-bg">
                <div class="container">
                    <?php if (!empty($od_brand_title_show)) : ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="it-brand-top-box text-center mb-65">
                                    <span><?php echo esc_html($od_brand_title, 'ordainit-toolkit'); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="it-brand-wrap">
                                <div class="swiper-container it-brand-active">
                                    <div class="swiper-wrapper slider-transtion">
                                        <?php foreach ($od_brand_lists as $od_brand_list):
                                            $brand_thumbnail = $od_brand_list['od_brand_list_thumbnail'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div
                                                    class="it-brand-item text-center text-xxl-start">
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
        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_brand_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_brand_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay3 = <?php echo $od_brand_slider_autoplay ? 'true' : 'false'; ?>;

                // Layout-1
                var cr_brand_slider = new Swiper(".it-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: {
                    delay: 1,
                    disableOnInteraction: true,
                    },
                });

                // Layout 2
                const cr_brand_slider_2 = new Swiper(".ss-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true,
                    }
                });

                // layout -3
                const cr_brand_slider_3 = new Swiper(".ss-brand-active-2", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
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

$widgets_manager->register(new OD_Brand_Slider());
