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
class OD_Hero_Banner extends Widget_Base
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
        return 'od-hero-banner';
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
        return __('Hero Banner', 'ordainit-toolkit');
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

    // Contact 7
    public function get_od_contact_form()
    {
        if (! class_exists('WPCF7')) {
            return;
        }
        $od_cfa         = array();
        $od_cf_args     = array('posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form');
        $od_forms       = get_posts($od_cf_args);
        $od_cfa         = ['0' => esc_html__('Select Form', 'odcore')];
        if ($od_forms) {
            foreach ($od_forms as $od_form) {
                $od_cfa[$od_form->ID] = $od_form->post_title;
            }
        } else {
            $od_cfa[esc_html__('No contact form found', 'odcore')] = 0;
        }
        return $od_cfa;
    }

    // Button func
    private function set_button_attributes($link_type, $page_link, $custom_link, $attribute_name, $class)
    {
        if ('2' == $link_type) {
            $this->add_render_attribute($attribute_name, 'href', get_permalink($page_link));
            $this->add_render_attribute($attribute_name, 'target', '_self');
            $this->add_render_attribute($attribute_name, 'rel', 'nofollow');
            $this->add_render_attribute($attribute_name, 'class', $class);
        } else {
            if (! empty($custom_link['url'])) {
                $this->add_link_attributes($attribute_name, $custom_link);
                $this->add_render_attribute($attribute_name, 'class', $class);
            }
        }
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/hero-banner.php');
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
        $od_hero_banner_title = $settings['od_hero_banner_title'];
        $od_hero_banner_subtitle = $settings['od_hero_banner_subtitle'];
        $od_hero_banner_description = $settings['od_hero_banner_description'];
        $od_hero_banner_btn_text = $settings['od_btn_text'];
        $od_hero_banner_btn_text_2 = $settings['od_btn_text_2'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];
        $od_btn_link_type_2 = $settings['od_btn_link_type_2'];
        $od_btn_link_2 = $settings['od_btn_link_2'];
        $od_btn_page_link_2 = $settings['od_btn_page_link_2'];
        $od_hero_banner_video_btn_text = $settings['od_hero_banner_video_btn_text'];
        $od_hero_banner_video_btn_url = $settings['od_hero_banner_video_btn_url'];
        $od_hero_banner_thumbnail_image = $settings['od_hero_banner_thumbnail_image'];
        $od_hero_banner_shape_image_1 = $settings['od_hero_banner_shape_image_1'];
        $od_hero_banner_shape_image_2 = $settings['od_hero_banner_shape_image_2'];
        $od_hero_banner_shape_image_3 = $settings['od_hero_banner_shape_image_3'];
        $od_hero_banner_shape_image_4 = $settings['od_hero_banner_shape_image_4'];
        $od_hero_banner_shape_image_5 = $settings['od_hero_banner_shape_image_5'];
        $od_hero_contact_form_list = $settings['od_hero_contact_form_list'];
        $od_hero_banner_background_image = $settings['od_hero_banner_background_image'];
        $od_hero_brand_lists = $settings['od_hero_brand_lists'];
        $od_hero_brand_title = $settings['od_hero_brand_title'];
        $od_hero_brand_slider_autoplay = $settings['od_hero_brand_slider_autoplay'];
        $od_hero_banner_shape_svg = $settings['od_hero_banner_shape_svg'];
        $od_hero_banner_thumbnail_image_2 = $settings['od_hero_banner_thumbnail_image_2'];
        $od_hero_banner_thumbnail_image_3 = $settings['od_hero_banner_thumbnail_image_3'];
        $od_hero_banner_thumbnail_image_4 = $settings['od_hero_banner_thumbnail_image_4'];
        $od_hero_banner_thumbnail_image_5 = $settings['od_hero_banner_thumbnail_image_5'];
        $od_hero_banner_info_lists = $settings['od_hero_banner_info_lists'];
        $od_hero_brand_2_lists = $settings['od_hero_brand_2_lists'];
        $od_hero_banner_info_switcher = $settings['od_hero_banner_info_switcher'];
        $od_hero_brand_slider_switcher = $settings['od_hero_brand_slider_switcher'];
?>


        <?php if ($settings['od_design_style']  == 'layout-9'): ?>

            <div
                class="ag-hero-area ag-hero-ptb z-index-1 p-relative black-2-bg section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="ag-hero-content text-center mb-110">
                                <div class="it-fade-anim" data-fade-from="bottom" data-delay=".3">
                                    <h1 class="ag-hero-title mb-20"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                </div>
                                <div class="ag-hero-text it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                    <p class="mb-40"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                </div>
                                <div class="dt-hero-input-box p-relative it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ag-hero-mb it-fade-anim" data-fade-from="bottom" data-delay=".7">
                        <div class="row gx-35">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-35">
                                <div class="ag-hero-thumb-box it-img-anim-wrap p-relative">
                                    <div class="ag-hero-thumb it-img-anim" data-displacement="assets/img/webgl/pattern-1.jpg" data-intensity="0.6" data-speedin="1" data-speedout="1">
                                        <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 order-1 order-lg-0 mb-35">
                                <div class="ag-hero-thumb-box">
                                    <div class="row gx-35">
                                        <div class="col-12">
                                            <div class="it-img-anim-wrap p-relative">
                                                <div class="ag-hero-thumb mb-35 it-img-anim" data-displacement="assets/img/webgl/pattern-1.jpg" data-intensity="0.6" data-speedin="1" data-speedout="1">
                                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="it-img-anim-wrap p-relative">
                                                <div class="ag-hero-thumb it-img-anim" data-displacement="assets/img/webgl/pattern-1.jpg" data-intensity="0.6" data-speedin="1" data-speedout="1">
                                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="it-img-anim-wrap p-relative">
                                                <div class="ag-hero-thumb it-img-anim" data-displacement="assets/img/webgl/pattern-1.jpg" data-intensity="0.6" data-speedin="1" data-speedout="1">
                                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_4['url'], 'ordainit-toolkit'); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 order-0 order-lg-1 mb-35">
                                <div class="ag-hero-thumb-box it-img-anim-wrap p-relative">
                                    <div class="ag-hero-thumb it-img-anim" data-displacement="assets/img/webgl/pattern-1.jpg" data-intensity="0.6" data-speedin="1" data-speedout="1">
                                        <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_5['url'], 'ordainit-toolkit'); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- brand-area-start -->
                <?php if (!empty($od_hero_brand_slider_switcher)) : ?>
                    <div class="ss-brand-area ag-brand-ptb">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="ss-brand-wrap mb-30">
                                        <div class="swiper-container ss-brand-active" dir="rtl">
                                            <div class="swiper-wrapper slider-transtion d-flex align-items-center">
                                                <?php foreach ($od_hero_brand_lists as $od_hero_brand_list):
                                                    $brand_thumbnail = $od_hero_brand_list['od_hero_brand_list_thumbnail'];
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div class="ss-brand-item text-center">
                                                            <img src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit') ?>" alt="">
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

                                                <?php foreach ($od_hero_brand_2_lists as $od_hero_brand_2_list):
                                                    $brand_thumbnail = $od_hero_brand_2_list['od_hero_brand_2_list_thumbnail'];
                                                ?>
                                                    <div class="swiper-slide">
                                                        <div class="ss-brand-item text-center">
                                                            <img src="<?php echo esc_url($brand_thumbnail['url'], 'ordainit-toolkit') ?>" alt="">
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
                <!-- brand-area-end -->

            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-8'): ?>

            <div
                class="ma-hero-style cr-hero-area z-index-1 p-relative p-relative section-bg ma-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="ma-hero-shape-1"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <img
                    class="ma-hero-shape-2"
                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="ma-hero-content">
                                <span class="ma-hero-subtitle mb-10 it_text_reveal_anim"><?php echo esc_html($od_hero_banner_subtitle, 'ordainit-toolkit'); ?></span>
                                <h1 class="ma-hero-title mb-10 it_text_reveal_anim"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="ma-hero-text it-fade-anim" data-delay=".5">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                </div>
                                <div class="mb-40 d-flex flex-wrap it-fade-anim" data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>


                                <?php if (!empty($od_hero_banner_info_switcher)): ?>
                                    <div class="ma-hero-info it-fade-anim" data-delay=".9">

                                        <?php foreach ($od_hero_banner_info_lists as $od_hero_banner_info_list): ?>
                                            <span>
                                                <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.39265 17.4113C8.09113 17.4113 7.78961 17.2959 7.55992 17.0662L0.345515 9.85159C-0.115172 9.39112 -0.115172 8.6466 0.345515 8.18613C0.805986 7.72566 1.55029 7.72566 2.01097 8.18613L8.39265 14.5678L21.9892 0.971513C22.4496 0.511042 23.1939 0.511042 23.6546 0.971513C24.1151 1.4322 24.1151 2.1765 23.6546 2.63719L9.22559 17.0662C8.9959 17.2959 8.69416 17.4113 8.39265 17.4113Z" fill="#1FE290" />
                                                </svg>
                                                <?php echo od_kses($od_hero_banner_info_list['od_hero_banner_info_list_title'], 'ordainit-toolkit'); ?>
                                            </span>
                                        <?php endforeach; ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="ma-hero-thumb-box p-relative it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                                <div class="ma-hero-thumb">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <div class="ma-hero-thumb-sm">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-7'):

            //Set attributes for Button
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'cr-btn hover-2 mr-30'
            );

        ?>

            <div
                class="seo-hero-style cr-hero-area z-index-1 p-relative section-bg seo-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="seo-hero-shape-1 d-none d-sm-block"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <img
                    class="seo-hero-shape-2"
                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="cr-hero-content text-center">
                                <h1 class="seo-hero-title mb-10 it_text_reveal_anim"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="seo-hero-text">
                                    <div class="it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                        <p class="mb-25"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    </div>
                                    <div class="cr-hero-button flex-nowrap d-sm-flex align-items-center justify-content-center it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                        <div class="it-hero-video d-flex align-items-center">
                                            <a href="<?php echo esc_url($od_hero_banner_video_btn_url, 'ordainit-toolkit'); ?>" class="popup-video">
                                                <i>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 6.2265L0 0.452994L0 12L10 6.2265Z"
                                                            fill="currentcolor" />
                                                    </svg>
                                                </i>
                                            </a>
                                            <span>
                                                <?php echo esc_html($od_hero_banner_video_btn_text, 'ordainit-toolkit');  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="seo-hero-thumb z-index-1 p-relative it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-6'): ?>

            <div
                class="ai-hero-area ai-hero-ptb z-index-1 p-relative section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="ai-hero-content">
                                <h1 class="ai-hero-title mb-20 it_text_reveal_anim"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="it-fade-anim" data-fade-from="bottom" data-delay=".3">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                </div>
                                <div class="dt-hero-input-box p-relative mb-30 it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                            <div class="ai-hero-thumb-wrap z-index-1 p-relative">
                                <div class="ai-hero-thumb text-center text-lg-end">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <div class="ai-hero-thumb-sm">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <img
                                    class="ai-hero-thumb-shape-1"
                                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-5'):

            // Set attributes for Button 1
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'ss-btn mr-30'
            );

            // Set attributes for Button 2
            $this->set_button_attributes(
                $od_btn_link_type_2,
                $od_btn_page_link_2,
                $od_btn_link_2,
                'od-button-arg-2',
                ''
            );

        ?>

            <div
                class="ss-hero-area blue-bg p-relative z-index-1 fix ss-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="ss-hero-shape-3"
                    src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <img
                    class="ss-hero-shape-4"
                    src="<?php echo esc_url($od_hero_banner_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="ss-hero-content it-text-anim">
                                <h1 class="ss-hero-title it-split-text it-split-in-right"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="ss-hero-text">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    <div class="it-hero-button d-flex align-items-center it-fade-anim" data-fade-from="top" data-ease="bounce" data-delay=".7">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                        </a>

                                        <div class="ss-hero-explore">
                                            <a <?php echo $this->get_render_attribute_string('od-button-arg-2'); ?>>
                                                <?php echo esc_html($od_hero_banner_btn_text_2, 'ordainit-toolkit'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                            <div class="ss-hero-thumb-box p-relative z-index-1 text-center text-lg-end">
                                <div class="ss-hero-thumb">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <img
                                    class="ss-hero-shape-1"
                                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="">
                                <img
                                    class="ss-hero-shape-2"
                                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-4'):
            //Set attributes for Button
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'cr-btn mr-30'
            );
        ?>

            <div
                class="cr-hero-area p-relative cr-hero-ptb"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-11">
                            <div class="cr-hero-content text-center">
                                <span class="cr-hero-subtitle d-inline-block mb-15 it-fade-anim" data-fade-from="top" data-delay=".3">
                                    <?php echo esc_html($od_hero_banner_subtitle, 'ordainit-toolkit'); ?>
                                </span>
                                <div class="it_text_reveal_anim">
                                    <h1 class="cr-hero-title mb-15"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                </div>
                                <div class="cr-hero-text mb-105">
                                    <p class="mb-30 it-fade-anim" data-fade-from="bottom" data-delay=".5"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    <div class="cr-hero-button flex-nowrap d-sm-flex align-items-center justify-content-center">
                                        <div class="it-fade-anim" data-fade-from="top" data-delay=".5" data-ease="bounce">
                                            <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                                <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                            </a>
                                        </div>
                                        <div class="it-hero-video flex-wrap justify-content-center d-flex align-items-center it-fade-anim" data-fade-from="top" data-delay=".7" data-ease="bounce">
                                            <a href="<?php echo esc_url($od_hero_banner_video_btn_url, 'ordainit-toolkit'); ?>" class="popup-video">
                                                <i>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 6.2265L0 0.452994L0 12L10 6.2265Z"
                                                            fill="currentcolor" />
                                                    </svg>
                                                </i>
                                            </a>
                                            <span>
                                                <?php echo esc_html($od_hero_banner_video_btn_text, 'ordainit-toolkit');  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cr-hero-thumb it-fade-anim" data-fade-from="bottom" data-delay=".9">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div
                class="pg-hero-area pg-hero-ptb z-index-1 p-relative section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="pg-hero-shape-4"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="">
                <div class="container">
                    <div class="row align-items-xl-end align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="pg-hero-content">
                                <span class="pg-hero-subtitle it-fade-anim" data-fade-from="top"><?php echo od_kses($od_hero_banner_subtitle, 'ordainit-toolkit'); ?></span>
                                <h1 class="pg-hero-title mb-5 it-char-animation"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <p class="mb-40 it-fade-anim" data-fade-from="bottom" data-delay=".3"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                <div class="pg-hero-input-box p-relative it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 it-fade-anim" data-fade-from="left" data-delay=".5" data-ease="bounce">
                            <div class="pg-hero-thumb-box text-center text-lg-start z-index-1 p-relative">
                                <div class="pg-hero-thumb">
                                    <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                                <img class="pg-hero-shape-1 d-none d-md-block" src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                <img class="pg-hero-shape-2 d-none d-sm-block" src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
                                <span class="pg-hero-shape-3 d-none d-lg-block">
                                    <?php echo od_kses($od_hero_banner_shape_svg, 'ordainit-toolkit'); ?>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div
                class="dt-hero-area dt-hero-ptb z-index-1 p-relative section-bg"
                style="background-image: url('<?php echo esc_url($od_hero_banner_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="dt-hero-shape-1"
                    src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-2"
                    src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-3 d-none d-sm-block"
                    src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-5"
                    src="<?php echo esc_url($od_hero_banner_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="dt-hero-shape-6"
                    src="<?php echo esc_url($od_hero_banner_shape_image_5['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9">
                            <div class="dt-hero-content text-center">
                                <h2 class="dt-hero-title mb-25 it_text_reveal_anim">
                                    <?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?>
                                </h2>
                                <div
                                    class="dt-hero-input-box p-relative mb-30 it-fade-anim"
                                    data-delay=".3">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_hero_contact_form_list . '"]'); ?>
                                </div>
                                <span class="mb-70 it-fade-anim" data-delay=".5"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-11">
                            <div class="dt-hero-thumb it-fade-anim" data-delay=".7">
                                <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- brand-area-start -->
                <?php if (!empty($od_hero_brand_slider_switcher)) : ?>
                    <div class="it-brand-area dt-brand-style pt-165">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="it-brand-top-box text-center mb-65">
                                        <span><?php echo esc_html($od_hero_brand_title, 'ordainit-toolkit'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="it-brand-wrap">
                                        <div class="swiper-container it-brand-active">
                                            <div class="swiper-wrapper slider-transtion">
                                                <?php foreach ($od_hero_brand_lists as $od_hero_brand_list):
                                                    $brand_thumbnail = $od_hero_brand_list['od_hero_brand_list_thumbnail'];
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
                <!-- brand-area-end -->
            </div>

        <?php else:

            //Set attributes for Button
            $this->set_button_attributes(
                $od_btn_link_type,
                $od_btn_page_link,
                $od_btn_link,
                'od-button-arg',
                'it-btn mr-30'
            );
        ?>

            <div class="it-hero-area p-relative it-hero-ptb">
                <img class="it-hero-shape-1 d-none d-xl-block" src="<?php echo esc_url($od_hero_banner_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="it-hero-shape-3" src="<?php echo esc_url($od_hero_banner_shape_image_2['url'], 'ordainit-toolkit') ?>" alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-xl-6 col-lg-6">
                            <div class="it-hero-content">
                                <span class="it-hero-subtitle" style="background-image: url('<?php echo esc_url($od_hero_banner_shape_image_4['url'], 'ordainit-toolkit'); ?>')">
                                    <?php echo esc_html($od_hero_banner_subtitle, 'ordainit-toolkit') ?>
                                </span>
                                <h1 class="it-hero-title it-split-text it-split-in-right"><?php echo od_kses($od_hero_banner_title, 'ordainit-toolkit'); ?></h1>
                                <div class="it-hero-text it-text-anim">
                                    <p class="mb-35"><?php echo od_kses($od_hero_banner_description, 'ordainit-toolkit'); ?></p>
                                    <div class="it-hero-button flex-nowrap d-sm-flex align-items-center it-fade-anim" data-fade-from="left" data-delay=".9">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_hero_banner_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                        <div class="it-hero-video d-flex align-items-center">
                                            <a href="<?php echo esc_url($od_hero_banner_video_btn_url, 'ordainit-toolkit'); ?>" class="popup-video">
                                                <i>
                                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 6.2265L0 0.452994L0 12L10 6.2265Z"
                                                            fill="currentcolor" />
                                                    </svg>
                                                </i>
                                            </a>
                                            <span>
                                                <?php echo esc_html($od_hero_banner_video_btn_text, 'ordainit-toolkit');  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-6 it-fade-anim" data-fade-from="right" data-delay=".5" data-ease="bounce">
                            <div class="it-hero-thumb p-relative">
                                <img src="<?php echo esc_url($od_hero_banner_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                                <div class="it-hero-thumb-shape-1">
                                    <img src="<?php echo esc_url($od_hero_banner_shape_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <script>
            jQuery(document).ready(function($) {
                const sliderAutoplay = <?php echo $od_hero_brand_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_hero_brand_slider_autoplay ? 'true' : 'false'; ?>;

                // Hero Layout 2 brand slider 
                var cr_brand_slider = new Swiper(".it-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: sliderAutoplay ? {
                        delay: 3000,
                        disableOnInteraction: true,
                    } : false,
                });

                // Hero Layout 9 brand slider-1 
                var cr_brand_slider = new Swiper(".ss-brand-active", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: sliderAutoplay2 ? {
                        delay: 1,
                        disableOnInteraction: true,
                    } : false,
                });

                // Hero Layout 9 brand slider-2 
                var cr_brand_slider = new Swiper(".ss-brand-active-2", {
                    loop: true,
                    freemode: true,
                    slidesPerView: 'auto',
                    spaceBetween: 100,
                    centeredSlides: true,
                    allowTouchMove: false,
                    speed: 2500,
                    autoplay: sliderAutoplay2 ? {
                        delay: 1,
                        disableOnInteraction: true,
                    } : false,
                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Hero_Banner());
