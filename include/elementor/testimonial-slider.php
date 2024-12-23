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
class OD_Testimonial_Slider extends Widget_Base
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
        return 'od-testimonial-slider';
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
        return __('Testimonial Slider', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/testimonial-slider.php');
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
        $od_testimonial_slider_heading_title = $settings['od_testimonial_slider_heading_title'];
        $od_testimonial_slider_heading_subtitle = $settings['od_testimonial_slider_heading_subtitle'];
        $od_testimonial_slider_heading_description = $settings['od_testimonial_slider_heading_description'];
        $od_testimonial_slider_lists = $settings['od_testimonial_slider_lists'];
        $od_testimonial_slider_thumbnail_image = $settings['od_testimonial_slider_thumbnail_image'];
        $od_testimonial_slider_shape_image_1 = $settings['od_testimonial_slider_shape_image_1'];
        $od_testimonial_slider_shape_image_2 = $settings['od_testimonial_slider_shape_image_2'];
        $od_testimonial_slider_shape_image_3 = $settings['od_testimonial_slider_shape_image_3'];
        $od_testimonial_slider_shape_image_4 = $settings['od_testimonial_slider_shape_image_4'];
        $od_testimonial_slider_shape_image_5 = $settings['od_testimonial_slider_shape_image_5'];
        $od_testimonial_slider_shape_image_6 = $settings['od_testimonial_slider_shape_image_6'];
        $od_testimonial_slider_shape_image_7 = $settings['od_testimonial_slider_shape_image_7'];
        $od_testimonial_slider_arrow_switcher = $settings['od_testimonial_slider_arrow_switcher'];
        $od_testimonial_slider_quote_switcher = $settings['od_testimonial_slider_quote_switcher'];
        $od_testimonial_slider_star_switcher = $settings['od_testimonial_slider_star_switcher'];
        $od_testimonial_slider_autoplay = $settings['od_testimonial_slider_autoplay'];
        $od_testimonial_slider_heading_title_animation_split_in = $settings['od_testimonial_slider_heading_title_animation_split_in'];
        $od_testimonial_slider_background_image = $settings['od_testimonial_slider_background_image'];
        $od_testimonial_funfact_lists = $settings['od_testimonial_funfact_lists'];
?>


        <?php if ($settings['od_design_style']  == 'layout-6'): ?>

            <div class="ag-testimonial-style it-testimonial-area p-relative black-2-bg">
                <div class="ag-testimonial-thumb it-img-anim-wrap">
                    <div class="it-img-anim"
                        data-displacement="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/webgl/pattern-1.jpg'; ?>"
                        data-intensity="0.6"
                        data-speedin="1"
                        data-speedout="1">
                        <img src="<?php echo esc_url($od_testimonial_slider_thumbnail_image['url']); ?>" alt="">
                    </div>

                </div>
                <img class="it-testimonial-shape-11" src="<?php echo esc_url($od_testimonial_slider_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="offset-xl-5 offset-lg-5 col-xl-7 col-lg-7">
                            <div class="ag-testimonial-right-box p-relative">
                                <div class="ag-section-title-box mb-65">
                                    <span class="ag-section-subtitle it-fade-anim" data-fade-from="bottom" data-delay=".3">
                                        <?php echo esc_html($od_testimonial_slider_heading_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                    <div class="it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                        <h4 class="ag-section-title mb-15">
                                            <?php echo od_kses($od_testimonial_slider_heading_title, 'ordainit-toolkit'); ?>
                                        </h4>
                                    </div>
                                </div>
                                <?php if (!empty($od_testimonial_slider_arrow_switcher)): ?>
                                    <div class="it-testimonial-arrow-box d-none d-lg-block">
                                        <button class="slider-prev active">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23743 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46446 6.59619 0.989591 6.3033 0.696697C6.01041 0.403804 5.53553 0.403804 5.24264 0.696697L0.469669 5.46967ZM26 5.25L1 5.25L1 6.75L26 6.75L26 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="slider-next">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25.5303 5.46967C25.8232 5.76256 25.8232 6.23743 25.5303 6.53033L20.7574 11.3033C20.4645 11.5962 19.9896 11.5962 19.6967 11.3033C19.4038 11.0104 19.4038 10.5355 19.6967 10.2426L23.9393 6L19.6967 1.75736C19.4038 1.46446 19.4038 0.989591 19.6967 0.696697C19.9896 0.403804 20.4645 0.403804 20.7574 0.696697L25.5303 5.46967ZM-6.55672e-08 5.25L25 5.25L25 6.75L6.55672e-08 6.75L-6.55672e-08 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                <?php endif; ?>

                                <div class="swiper-container ag-testimonial-active">
                                    <div class="swiper-wrapper d-flex align-items-center">
                                        <?php foreach ($od_testimonial_slider_lists as $od_testimonial_slider_list):
                                            $testimonial_rating_star = $od_testimonial_slider_list['od_testimonial_slider_list_rating'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="it-testimonial-item">
                                                    <?php if (!empty($od_testimonial_slider_star_switcher)): ?>
                                                        <div class="it-testimonial-ratting mb-30">
                                                            <?php
                                                            $rating = intval($testimonial_rating_star);
                                                            for ($i = 1; $i <= $rating; $i++) : ?>
                                                                <span>
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M20 7.72742L12.7329 7.24965L9.99602 0.374023L7.25918 7.24965L0 7.72742L5.56773 12.455L3.7407 19.6264L9.99602 15.6725L16.2514 19.6264L14.4243 12.455L20 7.72742Z" fill="#F59E0B" />
                                                                    </svg>
                                                                </span>
                                                            <?php endfor; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <p class="it-testimonial-text">
                                                        "<?php echo od_kses($od_testimonial_slider_list['od_testimonial_slider_list_description'], 'orsdainit-toolkit'); ?>"
                                                    </p>
                                                    <div class="it-testimonial-author-wrap d-flex align-items-center">
                                                        <img class="mr-20" src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_avatar']['url'], 'ordainit-toolkit'); ?>" alt="">
                                                        <div class="it-testimonial-author-info">
                                                            <h5><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_author'], 'ordainit-toolkit'); ?></h5>
                                                            <span><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_designation'], 'ordainit-toolkit'); ?></span>
                                                        </div>
                                                    </div>
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

        <?php elseif ($settings['od_design_style']  == 'layout-5'): ?>

            <div class="pg-testimonial-area ss-testimonial-style blue-bg">
                <div class="container">
                    <div class="pg-testimonial-top-wrap mb-50">
                        <div class="row align-items-center">
                            <div class="col-xl-7 col-lg-6">
                                <div class="ss-section-title-box">
                                    <span class="ss-section-subtitle it_text_reveal_anim">
                                        <?php echo esc_html($od_testimonial_slider_heading_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                    <h4 class="ss-section-title pb-15 it_text_reveal_anim">
                                        <?php echo od_kses($od_testimonial_slider_heading_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                </div>
                            </div>

                            <?php if (!empty($od_testimonial_slider_arrow_switcher)): ?>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="pg-testimonial-arrow-box text-lg-end">
                                        <button class="slider-prev mr-25">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23743 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46446 6.59619 0.989591 6.3033 0.696697C6.01041 0.403804 5.53553 0.403804 5.24264 0.696697L0.469669 5.46967ZM26 5.25L1 5.25L1 6.75L26 6.75L26 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="slider-next active">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25.5303 5.46967C25.8232 5.76256 25.8232 6.23743 25.5303 6.53033L20.7574 11.3033C20.4645 11.5962 19.9896 11.5962 19.6967 11.3033C19.4038 11.0104 19.4038 10.5355 19.6967 10.2426L23.9393 6L19.6967 1.75736C19.4038 1.46446 19.4038 0.989591 19.6967 0.696697C19.9896 0.403804 20.4645 0.403804 20.7574 0.696697L25.5303 5.46967ZM-6.55672e-08 5.25L25 5.25L25 6.75L6.55672e-08 6.75L-6.55672e-08 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pg-testimonial-right">
                                <div class="swiper-container pg-testimonial-active-2">
                                    <div class="swiper-wrapper d-flex align-items-center">
                                        <?php foreach ($od_testimonial_slider_lists as $od_testimonial_slider_list):
                                            $testimonial_rating_star = $od_testimonial_slider_list['od_testimonial_slider_list_rating']; ?>

                                            <div class="swiper-slide">
                                                <div class="pg-testimonial-item">
                                                    <div class="pg-testimonial-top mb-30 d-flex justify-content-between">
                                                        <div class="dt-testimonial-author-wrap d-flex align-items-center">
                                                            <div class="dt-testimonial-avatar mr-15">
                                                                <img src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_avatar']['url'], 'ordainit-toolkit'); ?>" alt="">
                                                            </div>
                                                            <div class="dt-testimonial-author-info">
                                                                <h5 class="mb-10"><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_author'], 'ordainit-toolkit'); ?></h5>
                                                                <span><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_designation'], 'ordainit-toolkit'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pg-testimonial-text mb-25">
                                                        <p>“<?php echo od_kses($od_testimonial_slider_list['od_testimonial_slider_list_description'], 'orsdainit-toolkit'); ?>”</p>
                                                    </div>

                                                    <?php if (!empty($od_testimonial_slider_star_switcher)): ?>
                                                        <div class="it-testimonial-ratting">

                                                            <?php
                                                            $rating = intval($testimonial_rating_star);
                                                            for ($i = 1; $i <= $rating; $i++) : ?>
                                                                <span>
                                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M16 6.18155L10.1863 5.79933L7.99681 0.298828L5.80734 5.79933L0 6.18155L4.45419 9.96361L2.99256 15.7008L7.99681 12.5376L13.0011 15.7008L11.5395 9.96361L16 6.18155Z" fill="#F59E0B" />
                                                                    </svg>
                                                                </span>
                                                            <?php endfor; ?>

                                                        </div>
                                                    <?php endif; ?>
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

        <?php elseif ($settings['od_design_style']  == 'layout-4'): ?>

            <div class="pg-testimonial-area cr-testimonial-style dark-green-bg pt-150 pb-80"
                style="background-image: url('<?php echo esc_url($od_testimonial_slider_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5">
                            <div class="pg-testimonial-left">
                                <div class="cr-section-title-box mb-30 it-text-anim">
                                    <span class="cr-section-subtitle it_text_reveal_anim">
                                        <?php echo esc_html($od_testimonial_slider_heading_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                    <h4 class="cr-section-title it_text_reveal_anim pb-15">
                                        <?php echo od_kses($od_testimonial_slider_heading_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p>
                                        <?php echo od_kses($od_testimonial_slider_heading_description, 'ordainit-toolkit'); ?>
                                    </p>
                                </div>
                                <?php if (!empty($od_testimonial_slider_arrow_switcher)): ?>
                                    <div class="pg-testimonial-arrow-box it-fade-anim" data-fade-from="bottom" data-delay=".9">
                                        <button class="slider-prev mr-25">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23743 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46446 6.59619 0.989591 6.3033 0.696697C6.01041 0.403804 5.53553 0.403804 5.24264 0.696697L0.469669 5.46967ZM26 5.25L1 5.25L1 6.75L26 6.75L26 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="slider-next active">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25.5303 5.46967C25.8232 5.76256 25.8232 6.23743 25.5303 6.53033L20.7574 11.3033C20.4645 11.5962 19.9896 11.5962 19.6967 11.3033C19.4038 11.0104 19.4038 10.5355 19.6967 10.2426L23.9393 6L19.6967 1.75736C19.4038 1.46446 19.4038 0.989591 19.6967 0.696697C19.9896 0.403804 20.4645 0.403804 20.7574 0.696697L25.5303 5.46967ZM-6.55672e-08 5.25L25 5.25L25 6.75L6.55672e-08 6.75L-6.55672e-08 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="pg-testimonial-right">
                                <div class="swiper-container pg-testimonial-active">
                                    <div class="swiper-wrapper d-flex align-items-center">
                                        <?php foreach ($od_testimonial_slider_lists as $od_testimonial_slider_list):
                                            $testimonial_rating_star = $od_testimonial_slider_list['od_testimonial_slider_list_rating'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="pg-testimonial-item">
                                                    <div class="pg-testimonial-top mb-30 d-flex justify-content-between">
                                                        <div>
                                                            <img class="mb-10"
                                                                src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_icon_image']['url'], 'ordainit-toolkit'); ?>"
                                                                alt="">

                                                            <?php if (!empty($od_testimonial_slider_star_switcher)): ?>
                                                                <div class="it-testimonial-ratting">

                                                                    <?php
                                                                    $rating = intval($testimonial_rating_star);
                                                                    for ($i = 1; $i <= $rating; $i++) : ?>
                                                                        <span>
                                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M16 6.18155L10.1863 5.79933L7.99681 0.298828L5.80734 5.79933L0 6.18155L4.45419 9.96361L2.99256 15.7008L7.99681 12.5376L13.0011 15.7008L11.5395 9.96361L16 6.18155Z" fill="#F59E0B" />
                                                                            </svg>
                                                                        </span>
                                                                    <?php endfor; ?>

                                                                </div>
                                                            <?php endif; ?>

                                                        </div>

                                                        <?php if (!empty($od_testimonial_slider_quote_switcher)): ?>
                                                            <span class="cr-testimonial-quote">
                                                                <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.92382 4.12377H10.4125V0H9.92382C7.29263 0.00362133 4.77028 1.05059 2.90993 2.91131C1.04958 4.77203 0.00310307 7.29459 0 9.92577V20.785H11.347V9.43706H4.14136C4.26583 7.98861 4.92872 6.63943 5.99922 5.65579C7.06971 4.67216 8.47003 4.12552 9.92382 4.12377ZM10.3695 10.4155V19.8085H0.977427V9.92577C0.980109 7.63795 1.85793 5.43784 3.4309 3.77654C5.00387 2.11525 7.15279 1.11865 9.43706 0.991111V3.16002C7.72867 3.28532 6.1308 4.05187 4.96393 5.30594C3.79705 6.56002 3.14743 8.20888 3.14536 9.92186V10.4106L10.3695 10.4155Z" fill="#01103D" />
                                                                    <path d="M18.7976 9.43706C18.9218 7.98844 19.5846 6.63902 20.6552 5.65518C21.7257 4.67134 23.1261 4.12456 24.5801 4.12279H25.0688V0H24.5801C21.9485 0.00284596 19.4255 1.04951 17.5646 2.91033C15.7038 4.77116 14.6571 7.29417 14.6543 9.92577V20.785H26.0003V9.43706H18.7976ZM25.0228 19.8085H15.6298V9.92577C15.6324 7.63811 16.5101 5.43813 18.0829 3.77686C19.6556 2.11559 21.8043 1.1189 24.0884 0.991111V3.16002C22.38 3.28532 20.7822 4.05187 19.6153 5.30594C18.4484 6.56002 17.7988 8.20888 17.7967 9.92186V10.4106H25.0228V19.8085Z" fill="#01103D" />
                                                                </svg>
                                                            </span>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class="pg-testimonial-text mb-30">
                                                        <p><?php echo od_kses($od_testimonial_slider_list['od_testimonial_slider_list_description'], 'orsdainit-toolkit'); ?></p>
                                                    </div>
                                                    <div class="dt-testimonial-author-wrap d-flex align-items-center">
                                                        <div class="dt-testimonial-avatar mr-15">
                                                            <img src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_avatar']['url'], 'ordainit-toolkit'); ?>" alt="">
                                                        </div>
                                                        <div class="dt-testimonial-author-info">
                                                            <h5 class="mb-10"><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_author'], 'ordainit-toolkit'); ?></h5>
                                                            <span><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_designation'], 'ordainit-toolkit'); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- funfact-area-start -->
                    <div class="pg-funfact-area cr-funfact-style mt-35">
                        <div class="row">
                            <div class="col-12">
                                <div class="dt-funfact-wrap">
                                    <div class="row">

                                        <?php
                                        $total_items = count($od_testimonial_funfact_lists);
                                        $current_index = 0;
                                        foreach ($od_testimonial_funfact_lists as $od_testimonial_funfact_list) :
                                            $current_index++;
                                            $is_last = ($current_index === $total_items);
                                        ?>
                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                <div class="dt-funfact-item <?php
                                                                            echo esc_attr($od_testimonial_funfact_list['od_testimonial_funfact_style'], 'ordainit-toolkit');
                                                                            echo esc_attr($is_last ? ' text-md-end' : '');
                                                                            ?>">
                                                    <div>
                                                        <h5 class="mb-10"><span class="purecounter" data-purecounter-duration="1"
                                                                data-purecounter-end="<?php echo esc_attr($od_testimonial_funfact_list['od_testimonial_funfact_number'], 'ordainit-toolkit'); ?>">
                                                                <?php echo esc_html($od_testimonial_funfact_list['od_testimonial_funfact_number'], 'ordainit-toolkit'); ?>
                                                            </span><?php echo esc_html($od_testimonial_funfact_list['od_testimonial_funfact_suffix'], 'ordainit-toolkit'); ?></h5>
                                                        <p><?php echo esc_html($od_testimonial_funfact_list['od_testimonial_funfact_description'], 'ordainit-toolkit'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- funfact-area-end -->

                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="pg-testimonial-area pg-testimonial-ptb green-bg"
                style="background-image: url('<?php echo esc_url($od_testimonial_slider_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5">
                            <div class="pg-testimonial-left">
                                <div class="pg-section-title-box it-text-anim mb-30">
                                    <span class="pg-section-subtitle white-style it-fade-anim"
                                        data-fade-from="top">
                                        <?php echo esc_html($od_testimonial_slider_heading_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                    <h4 class="pg-section-title pb-15 it-char-animation">
                                        <?php echo od_kses($od_testimonial_slider_heading_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p>
                                        <?php echo od_kses($od_testimonial_slider_heading_description, 'ordainit-toolkit'); ?>
                                    </p>
                                </div>
                                <?php if (!empty($od_testimonial_slider_arrow_switcher)): ?>
                                    <div class="pg-testimonial-arrow-box">
                                        <button class="slider-prev mr-25">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23743 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46446 6.59619 0.989591 6.3033 0.696697C6.01041 0.403804 5.53553 0.403804 5.24264 0.696697L0.469669 5.46967ZM26 5.25L1 5.25L1 6.75L26 6.75L26 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="slider-next active">
                                            <span>
                                                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25.5303 5.46967C25.8232 5.76256 25.8232 6.23743 25.5303 6.53033L20.7574 11.3033C20.4645 11.5962 19.9896 11.5962 19.6967 11.3033C19.4038 11.0104 19.4038 10.5355 19.6967 10.2426L23.9393 6L19.6967 1.75736C19.4038 1.46446 19.4038 0.989591 19.6967 0.696697C19.9896 0.403804 20.4645 0.403804 20.7574 0.696697L25.5303 5.46967ZM-6.55672e-08 5.25L25 5.25L25 6.75L6.55672e-08 6.75L-6.55672e-08 5.25Z" fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="pg-testimonial-right">
                                <div class="swiper-container pg-testimonial-active">
                                    <div class="swiper-wrapper d-flex align-items-center">

                                        <?php foreach ($od_testimonial_slider_lists as $od_testimonial_slider_list):
                                            $testimonial_rating_star = $od_testimonial_slider_list['od_testimonial_slider_list_rating'];
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="pg-testimonial-item">
                                                    <div class="pg-testimonial-top mb-30 d-flex justify-content-between">
                                                        <div>
                                                            <img class="mb-10"
                                                                src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_icon_image']['url'], 'ordainit-toolkit'); ?>"
                                                                alt="">

                                                            <?php if (!empty($od_testimonial_slider_star_switcher)): ?>
                                                                <div class="it-testimonial-ratting">

                                                                    <?php
                                                                    $rating = intval($testimonial_rating_star);
                                                                    for ($i = 1; $i <= $rating; $i++) : ?>
                                                                        <span>
                                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M16 6.18155L10.1863 5.79933L7.99681 0.298828L5.80734 5.79933L0 6.18155L4.45419 9.96361L2.99256 15.7008L7.99681 12.5376L13.0011 15.7008L11.5395 9.96361L16 6.18155Z" fill="#F59E0B" />
                                                                            </svg>
                                                                        </span>
                                                                    <?php endfor; ?>

                                                                </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <?php if (!empty($od_testimonial_slider_quote_switcher)): ?>
                                                            <span class="it-testimonial-quote">
                                                                <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.92382 4.12377H10.4125V0H9.92382C7.29263 0.00362133 4.77028 1.05059 2.90993 2.91131C1.04958 4.77203 0.00310307 7.29459 0 9.92577V20.785H11.347V9.43706H4.14136C4.26583 7.98861 4.92872 6.63943 5.99922 5.65579C7.06971 4.67216 8.47003 4.12552 9.92382 4.12377ZM10.3695 10.4155V19.8085H0.977427V9.92577C0.980109 7.63795 1.85793 5.43784 3.4309 3.77654C5.00387 2.11525 7.15279 1.11865 9.43706 0.991111V3.16002C7.72867 3.28532 6.1308 4.05187 4.96393 5.30594C3.79705 6.56002 3.14743 8.20888 3.14536 9.92186V10.4106L10.3695 10.4155Z" fill="#01103D" />
                                                                    <path d="M18.7976 9.43706C18.9218 7.98844 19.5846 6.63902 20.6552 5.65518C21.7257 4.67134 23.1261 4.12456 24.5801 4.12279H25.0688V0H24.5801C21.9485 0.00284596 19.4255 1.04951 17.5646 2.91033C15.7038 4.77116 14.6571 7.29417 14.6543 9.92577V20.785H26.0003V9.43706H18.7976ZM25.0228 19.8085H15.6298V9.92577C15.6324 7.63811 16.5101 5.43813 18.0829 3.77686C19.6556 2.11559 21.8043 1.1189 24.0884 0.991111V3.16002C22.38 3.28532 20.7822 4.05187 19.6153 5.30594C18.4484 6.56002 17.7988 8.20888 17.7967 9.92186V10.4106H25.0228V19.8085Z" fill="#01103D" />
                                                                </svg>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="pg-testimonial-text mb-30">
                                                        <p><?php echo od_kses($od_testimonial_slider_list['od_testimonial_slider_list_description'], 'orsdainit-toolkit'); ?></p>
                                                    </div>
                                                    <div class="dt-testimonial-author-wrap d-flex align-items-center">
                                                        <div class="dt-testimonial-avatar mr-15">
                                                            <img src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_avatar']['url'], 'ordainit-toolkit'); ?>" alt="">
                                                        </div>
                                                        <div class="dt-testimonial-author-info">
                                                            <h5 class="mb-10"><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_author'], 'ordainit-toolkit'); ?></h5>
                                                            <span><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_designation'], 'ordainit-toolkit'); ?></span>
                                                        </div>
                                                    </div>
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

            <div
                class="dt-testimonial-area z-index-1 p-relative p-relative">
                <img
                    class="dt-testimonial-shape-2 zoom-anim d-none d-lg-block"
                    src="<?php echo esc_url($od_testimonial_slider_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-testimonial-shape-3 zoom-anim d-none d-lg-block"
                    src="<?php echo esc_url($od_testimonial_slider_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-testimonial-shape-4 zoom-anim d-none d-lg-block"
                    src="<?php echo esc_url($od_testimonial_slider_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-testimonial-shape-5 zoom-anim d-none d-lg-block"
                    src="<?php echo esc_url($od_testimonial_slider_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-testimonial-shape-6 zoom-anim d-none d-lg-block"
                    src="<?php echo esc_url($od_testimonial_slider_shape_image_5['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-testimonial-shape-7 zoom-anim d-none d-lg-block"
                    src="<?php echo esc_url($od_testimonial_slider_shape_image_6['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="dt-testimonial-shape-1">
                    <img src="<?php echo esc_url($od_testimonial_slider_shape_image_7['url'], 'ordainit-toolkit'); ?>" alt="" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <div class="dt-section-title-box text-center mb-55">
                                <?php if (!empty($od_testimonial_slider_heading_subtitle)): ?>
                                    <span class="dt-section-subtitle it_text_reveal_anim">
                                        <?php echo esc_html($od_testimonial_slider_heading_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                <?php endif; ?>
                                <h4 class="dt-section-title-2 it_text_reveal_anim">
                                    <?php echo od_kses($od_testimonial_slider_heading_title, 'ordainit-toolkit'); ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="swiper-container it-testimonial-active">
                                <div class="swiper-wrapper d-flex align-items-center">

                                    <?php foreach ($od_testimonial_slider_lists as $od_testimonial_slider_list): ?>
                                        <div class="swiper-slide">
                                            <div class="dt-testimonial-wrap text-center">
                                                <div class="dt-testimonial-item">
                                                    <div class="dt-testimonial-avatar mb-35">
                                                        <img
                                                            src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_avatar']['url'], 'ordainit-toolkit'); ?>"
                                                            alt="" />
                                                    </div>
                                                    <div class="dt-testimonial-author-info mb-20">
                                                        <h5 class="mb-5"><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_author'], 'ordainit-toolkit'); ?></h5>
                                                        <span><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_designation'], 'ordainit-toolkit'); ?></span>
                                                    </div>
                                                    <div class="dt-testimonial-text">
                                                        <p class="mb-0">
                                                            “<?php echo od_kses($od_testimonial_slider_list['od_testimonial_slider_list_description'], 'orsdainit-toolkit'); ?>”
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="it-testimonial-area p-relative">
                <img
                    class="it-testimonial-shape-4"
                    src="<?php echo esc_url($od_testimonial_slider_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-5 order-1 order-xl-0">
                            <div class="d-block text-center text-lg-start">
                                <div
                                    class="it-testimonial-left-box text-xl-start d-inline-block text-center p-relative">
                                    <img
                                        class="it-testimonial-shape-1 d-none d-sm-block"
                                        src="<?php echo esc_url($od_testimonial_slider_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                        alt="" />
                                    <img
                                        class="it-testimonial-shape-2 d-none d-xl-block"
                                        src="<?php echo esc_url($od_testimonial_slider_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                                        alt="" />
                                    <img
                                        class="it-testimonial-shape-3 d-none d-xl-block"
                                        src="<?php echo esc_url($od_testimonial_slider_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                                        alt="" />
                                    <div class="it-testimonial-thumb">
                                        <img
                                            src="<?php echo esc_url($od_testimonial_slider_thumbnail_image['url'], 'ordainit-toolkit'); ?>"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 order-0 order-lg-1">
                            <div class="it-testimonial-right-box p-relative">
                                <div class="it-section-title-box it-text-anim mb-65">
                                    <h4
                                        class="it-section-title mb-15 it-split-text it-split-in-<?php echo esc_attr($od_testimonial_slider_heading_title_animation_split_in, 'ordianit-toolkit') ?>">
                                        <?php echo od_kses($od_testimonial_slider_heading_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p>
                                        <?php echo od_kses($od_testimonial_slider_heading_description, 'ordainit-toolkit'); ?>
                                    </p>
                                </div>

                                <?php if (!empty($od_testimonial_slider_arrow_switcher)): ?>

                                    <div class="it-testimonial-arrow-box d-none d-lg-block">
                                        <button class="slider-next active">
                                            <span>
                                                <svg
                                                    width="26"
                                                    height="12"
                                                    viewBox="0 0 26 12"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M25.5303 5.46967C25.8232 5.76256 25.8232 6.23743 25.5303 6.53033L20.7574 11.3033C20.4645 11.5962 19.9896 11.5962 19.6967 11.3033C19.4038 11.0104 19.4038 10.5355 19.6967 10.2426L23.9393 6L19.6967 1.75736C19.4038 1.46446 19.4038 0.989591 19.6967 0.696697C19.9896 0.403804 20.4645 0.403804 20.7574 0.696697L25.5303 5.46967ZM-6.55672e-08 5.25L25 5.25L25 6.75L6.55672e-08 6.75L-6.55672e-08 5.25Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="slider-prev">
                                            <span>
                                                <svg
                                                    width="26"
                                                    height="12"
                                                    viewBox="0 0 26 12"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23743 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46446 6.59619 0.989591 6.3033 0.696697C6.01041 0.403804 5.53553 0.403804 5.24264 0.696697L0.469669 5.46967ZM26 5.25L1 5.25L1 6.75L26 6.75L26 5.25Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>

                                <?php endif; ?>
                                <div class="swiper-container it-testimonial-active">
                                    <div class="swiper-wrapper d-flex align-items-center">

                                        <?php foreach ($od_testimonial_slider_lists as $od_testimonial_slider_list):
                                            $testimonial_rating_star = $od_testimonial_slider_list['od_testimonial_slider_list_rating'];

                                        ?>

                                            <div class="swiper-slide">
                                                <div class="it-testimonial-item">
                                                    <?php if (!empty($od_testimonial_slider_quote_switcher)): ?>
                                                        <span class="it-testimonial-quote mb-25">
                                                            <svg
                                                                width="26"
                                                                height="21"
                                                                viewBox="0 0 26 21"
                                                                fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.92382 4.12377H10.4125V0H9.92382C7.29263 0.00362133 4.77028 1.05059 2.90993 2.91131C1.04958 4.77203 0.00310307 7.29459 0 9.92577V20.785H11.347V9.43706H4.14136C4.26583 7.98861 4.92872 6.63943 5.99922 5.65579C7.06971 4.67216 8.47003 4.12552 9.92382 4.12377ZM10.3695 10.4155V19.8085H0.977427V9.92577C0.980109 7.63795 1.85793 5.43784 3.4309 3.77654C5.00387 2.11525 7.15279 1.11865 9.43706 0.991111V3.16002C7.72867 3.28532 6.1308 4.05187 4.96393 5.30594C3.79705 6.56002 3.14743 8.20888 3.14536 9.92186V10.4106L10.3695 10.4155Z"
                                                                    fill="#01103D" />
                                                                <path
                                                                    d="M18.7976 9.43706C18.9218 7.98844 19.5846 6.63902 20.6552 5.65518C21.7257 4.67134 23.1261 4.12456 24.5801 4.12279H25.0688V0H24.5801C21.9485 0.00284596 19.4255 1.04951 17.5646 2.91033C15.7038 4.77116 14.6571 7.29417 14.6543 9.92577V20.785H26.0003V9.43706H18.7976ZM25.0228 19.8085H15.6298V9.92577C15.6324 7.63811 16.5101 5.43813 18.0829 3.77686C19.6556 2.11559 21.8043 1.1189 24.0884 0.991111V3.16002C22.38 3.28532 20.7822 4.05187 19.6153 5.30594C18.4484 6.56002 17.7988 8.20888 17.7967 9.92186V10.4106H25.0228V19.8085Z"
                                                                    fill="#01103D" />
                                                            </svg>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($od_testimonial_slider_star_switcher)): ?>
                                                        <div class="it-testimonial-ratting mb-30">
                                                            <?php
                                                            $rating = intval($testimonial_rating_star);
                                                            for ($i = 1; $i <= $rating; $i++) : ?>
                                                                <span>
                                                                    <svg
                                                                        width="20"
                                                                        height="20"
                                                                        viewBox="0 0 20 20"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M20 7.72742L12.7329 7.24965L9.99602 0.374023L7.25918 7.24965L0 7.72742L5.56773 12.455L3.7407 19.6264L9.99602 15.6725L16.2514 19.6264L14.4243 12.455L20 7.72742Z"
                                                                            fill="#F59E0B" />
                                                                    </svg>
                                                                </span>
                                                            <?php endfor; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <p class="it-testimonial-text">
                                                        "<?php echo od_kses($od_testimonial_slider_list['od_testimonial_slider_list_description'], 'orsdainit-toolkit'); ?>"
                                                    </p>
                                                    <div
                                                        class="it-testimonial-author-wrap d-flex align-items-center justify-content-between">
                                                        <div class="it-testimonial-author-info">
                                                            <h5><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_author'], 'ordainit-toolkit'); ?></h5>
                                                            <span><?php echo esc_html($od_testimonial_slider_list['od_testimonial_slider_list_designation'], 'ordainit-toolkit'); ?></span>
                                                        </div>
                                                        <img
                                                            src="<?php echo esc_url($od_testimonial_slider_list['od_testimonial_slider_list_icon_image']['url'], 'ordainit-toolkit'); ?>"
                                                            alt="" />
                                                    </div>
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

                const sliderAutoplay = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay3 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay4 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;

                // Layout- 1 & 2
                const testimonialswiper = new Swiper('.it-testimonial-active', {
                    // Optional parameters
                    speed: 1500,
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 60,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.slider-prev',
                        nextEl: '.slider-next',
                    },

                });

                // Slider Option layout-3 & 4
                const pgtestimonialswiper = new Swiper('.pg-testimonial-active', {
                    // Optional parameters
                    speed: 1500,
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 35,
                    autoplay: sliderAutoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 3,
                        },
                        '1200': {
                            slidesPerView: 2,
                        },
                        '992': {
                            slidesPerView: 2,
                        },
                        '768': {
                            slidesPerView: 2,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.slider-prev',
                        nextEl: '.slider-next',
                    },

                });

                //Layout-5
                const pgtestimonial2swiper = new Swiper('.pg-testimonial-active-2', {
                    // Optional parameters
                    speed: 1500,
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 35,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 3,
                        },
                        '1200': {
                            slidesPerView: 2,
                        },
                        '992': {
                            slidesPerView: 2,
                        },
                        '768': {
                            slidesPerView: 2,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.slider-prev',
                        nextEl: '.slider-next',
                    },

                });

                //Layout-6
                const agtestimonialswiper = new Swiper('.ag-testimonial-active', {
                    // Optional parameters
                    speed: 1500,
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 40,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.slider-prev',
                        nextEl: '.slider-next',
                    },

                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Testimonial_Slider());
