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
class OD_Cta extends Widget_Base
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
        return 'od-cta';
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
        return __('CTA', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/cta.php');
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
        $od_cta_design_style = $settings['od_cta_design_style'];
        $od_cta_background_image = $settings['od_cta_background_image'];
        $od_cta_section_title = $settings['od_cta_section_title'];
        $od_cta_section_subtitle = $settings['od_cta_section_subtitle'];
        $od_cta_section_description = $settings['od_cta_section_description'];
        $od_cta_form_list = $settings['od_cta_form_list'];
        $od_cta_link_title = $settings['od_cta_link_title'];
        $od_cta_link_subtitle = $settings['od_cta_link_subtitle'];
        $od_cta_link_url = $settings['od_cta_link_url'];
        $od_cta_shape_image_1 = $settings['od_cta_shape_image_1'];
        $od_cta_shape_image_2 = $settings['od_cta_shape_image_2'];
        $od_cta_shape_image_3 = $settings['od_cta_shape_image_3'];
        $od_cta_shape_image_4 = $settings['od_cta_shape_image_4'];
        $od_cta_btn_text = $settings['od_cta_btn_text'];
        $od_cta_btn_url = $settings['od_cta_btn_url'];
        $od_cta_btn_2_text = $settings['od_cta_btn_2_text'];
        $od_cta_btn_2_url = $settings['od_cta_btn_2_url'];
        $od_cta_info_switcher = $settings['od_cta_info_switcher'];
        $od_cta_info_lists = $settings['od_cta_info_lists'];
?>


        <?php if ($settings['od_cta_design_style']  == 'layout-9'): ?>

            <div class="cr-cta-area it-cta-inner-style z-index-1 fix p-relative pb-120">
                <img class="cr-cta-shape-1" src="<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="cr-cta-shape-2" src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
                <img class="cr-cta-shape-3" src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cr-cta-wrap text-center">
                                <div class="it-section-title-box mb-30">
                                    <h4 class="cr-section-title mb-15 it_text_reveal_anim"><?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?></h4>
                                    <div class="it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                        <p class="pb-15"> <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?></p>
                                    </div>
                                </div>
                                <div class="it-cta-input-box p-relative mb-40 it-fade-anim" data-fade-from="bottom" data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_cta_form_list . '"]'); ?>
                                </div>
                                <div class="it-cta-link it-fade-anim" data-fade-from="bottom" data-delay=".9">
                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_title, 'ordainit-toolkit'); ?>
                                    </a>

                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_subtitle, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-8'): ?>

            <div class="it-cta-area ag-cta-style black-2-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="ai-cta-wrap it-cta-wrap fix z-index-3 text-center">
                                <img
                                    class="ai-cta-shape-1"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-2"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-3"
                                    src="<?php echo esc_url($od_cta_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box">
                                    <h4
                                        class="ag-section-title mb-30 it-split-text it-split-in-right">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                </div>
                                <div
                                    class="it-fade-anim"
                                    data-fade-from="top"
                                    data-delay=".3"
                                    data-ease="bounce">
                                    <a class="ag-btn white-bg"
                                        href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-7'): ?>

            <div class="it-cta-area seo-cta-style">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="ai-cta-wrap it-cta-wrap z-index-3 p-relative fix text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <img
                                    class="ai-cta-shape-1"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-2"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box">
                                    <h4
                                        class="it-section-title mb-25 it_text_reveal_anim">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                </div>
                                <div
                                    class="it-fade-anim"
                                    data-fade-from="top"
                                    data-ease="bounce"
                                    data-delay=".5">
                                    <a class="cr-btn"
                                        href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-6'): ?>

            <div class="it-cta-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="ai-cta-wrap it-cta-wrap z-index-3 fix p-relative text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <img
                                    class="ai-cta-shape-1 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="ai-cta-shape-2 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box mb-30">
                                    <span class="it-section-subtitle d-block mb-10">
                                        <?php echo esc_html($od_cta_section_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                    <h4 class="it-section-title-2 mb-15">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p>
                                        <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                    </p>
                                </div>
                                <a class="it-btn white-bg mb-40"
                                    href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                    <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                </a>

                                <?php if (!empty($od_cta_info_switcher)): ?>
                                    <div class="it-cta-info">
                                        <?php foreach ($od_cta_info_lists as $od_cta_info_list): ?>
                                            <span>
                                                <svg
                                                    width="25"
                                                    height="26"
                                                    viewBox="0 0 25 26"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle
                                                        opacity="0.2"
                                                        cx="12.5"
                                                        cy="12.5654"
                                                        r="12.5"
                                                        fill="white" />
                                                    <circle cx="13" cy="13.0654" r="3" fill="white" />
                                                </svg>
                                                <?php echo esc_html($od_cta_info_list['od_cta_info_list_title'], 'ordainit-toolkit'); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-5'): ?>

            <div
                class="ss-cta-area ss-cta-ptb z-index-1 p-relative blue-bg"
                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                <img
                    class="ss-cta-shape-1 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="ss-cta-shape-2 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="ss-cta-shape-3 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_3['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="ss-cta-shape-4 zoom-anim"
                    src="<?php echo esc_url($od_cta_shape_image_4['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="ss-cta-content text-center">
                                <h4 class="ss-cta-title it_text_reveal_anim">
                                    <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                </h4>
                                <div
                                    class="d-inline-block it-fade-anim"
                                    data-fade-from="top"
                                    data-ease="bounce"
                                    data-delay=".5">
                                    <a class="ss-btn mr-30"
                                        href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                                <div
                                    class="d-inline-block it-fade-anim"
                                    data-fade-from="top"
                                    data-ease="bounce"
                                    data-delay=".7">
                                    <a
                                        class="ss-btn border-btn"
                                        href="<?php echo esc_url($od_cta_btn_2_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_btn_2_text, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-4'): ?>

            <div class="cr-cta-area z-index-1 fix p-relative pt-150 pb-160">
                <img
                    class="cr-cta-shape-1"
                    src="<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="cr-cta-shape-2"
                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <img
                    class="cr-cta-shape-3"
                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                    alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cr-cta-wrap text-center">
                                <div class="it-section-title-box mb-30">
                                    <h4 class="cr-section-title mb-15 it_text_reveal_anim">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <div
                                        class="it-fade-anim"
                                        data-fade-from="bottom"
                                        data-delay=".5">
                                        <p class="pb-15">
                                            <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="it-cta-input-box p-relative mb-40 it-fade-anim"
                                    data-fade-from="bottom"
                                    data-delay=".7">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_cta_form_list . '"]'); ?>
                                </div>
                                <div
                                    class="it-cta-link it-fade-anim"
                                    data-fade-from="bottom"
                                    data-delay=".9">
                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_title, 'ordainit-toolkit'); ?>
                                    </a>

                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_subtitle, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-3'): ?>

            <div class="pg-cta-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="pg-cta-wrap p-relative z-index-3 fix">
                                <img
                                    class="pg-cta-shape-1"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="pg-cta-shape-2"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="pg-section-title-box text-center it-text-anim">
                                    <h4 class="pg-section-title pb-15 it-char-animation">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p class="mb-20">
                                        <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                    </p>
                                    <div
                                        class="it-fade-anim"
                                        data-fade-from="top"
                                        data-delay=".3"
                                        data-ease="bounce">
                                        <a
                                            class="pg-btn green-bg"
                                            href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                            <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-2'): ?>

            <div class="dt-cta-area gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="dt-cta-wrap p-relative theme-2-bg z-index-2 text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <img
                                    class="dt-cta-shape-1 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_1['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <img
                                    class="dt-cta-shape-2 d-none d-lg-block"
                                    src="<?php echo esc_url($od_cta_shape_image_2['url'], 'ordainit-toolkit'); ?>"
                                    alt="" />
                                <div class="it-section-title-box mb-30">
                                    <h4
                                        class="it-section-title mb-30 it_text_reveal_anim">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <div
                                        class="it-fade-anim"
                                        data-fade-from="top"
                                        data-delay=".3"
                                        data-ease="bounce">
                                        <a
                                            class="it-btn dt-white-bg"
                                            href="<?php echo esc_url($od_cta_btn_url, 'ordainit-toolkit'); ?>">
                                            <?php echo esc_html($od_cta_btn_text, 'ordainit-toolkit'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="it-cta-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div
                                class="it-cta-wrap z-index-3 text-center section-bg"
                                style="background-image: url('<?php echo esc_url($od_cta_background_image['url'], 'ordainit-toolkit'); ?>');">
                                <div class="it-section-title-box mb-30">
                                    <h4
                                        class="it-section-title-2 mb-15 it-split-text it-split-in-right">
                                        <?php echo od_kses($od_cta_section_title, 'ordainit-toolkit'); ?>
                                    </h4>
                                    <p>
                                        <?php echo od_kses($od_cta_section_description, 'ordainit-toolkit'); ?>
                                    </p>
                                </div>
                                <div class="it-cta-input-box p-relative mb-35">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $od_cta_form_list . '"]'); ?>
                                </div>
                                <div class="it-cta-link">
                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_title, 'ordainit-toolkit'); ?>
                                    </a>

                                    <a
                                        href="<?php echo esc_url($od_cta_link_url, 'ordainit-toolkit'); ?>">
                                        <?php echo esc_html($od_cta_link_subtitle, 'ordainit-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
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

$widgets_manager->register(new OD_Cta());
