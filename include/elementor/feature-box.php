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
class OD_Feature_Box extends Widget_Base
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
        return 'od-feature-box';
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
        return __('Feature Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/feature-box.php');
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
        $od_feature_title = $settings['od_feature_title'];
        $od_feature_url = $settings['od_feature_url'];
        $od_feature_description = $settings['od_feature_description'];
        $od_feature_thumbnail_image = $settings['od_feature_thumbnail_image'];
        $od_feature_animation_fade_from = $settings['od_feature_animation_fade_from'];
        $od_feature_animation_delay = $settings['od_feature_animation_delay'];
        $od_feature_btn_text = $settings['od_feature_btn_text'];
        $od_feature_btn_url = $settings['od_feature_btn_url'];
        $od_feature_btn_icon_switcher = $settings['od_feature_btn_icon_switcher'];
        $od_feature_background_image = $settings['od_feature_background_image'];
?>


        <?php if ($settings['od_design_style']  == 'layout-4'): ?>

            <div class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="ss-feature-item-wrap">
                    <div class="ss-feature-item text-center">
                        <div>
                            <div class="ss-feature-icon mb-35">
                                <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="#">
                            </div>
                            <div class="ss-feature-content">
                                <h4 class="ss-feature-title mb-20">
                                    <a class="border-line-white"
                                        href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                                        <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                                    </a>
                                </h4>
                                <p class="mb-0"><?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="pg-feature-item section-bg text-center it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                style="background-image: url(<?php echo esc_url($od_feature_background_image['url'], 'ordainit-toolkit'); ?>);">
                <span class="pg-feature-icon">
                    <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                </span>
                <h4 class="pg-feature-title">
                    <a class="border-line-white"
                        href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                        <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                    </a>
                </h4>
                <p><?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?></p>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>
            <div
                class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>">
                <div class="dt-feature-item mb-30 text-center">
                    <span class="dt-feature-icon mb-25 d-block">
                        <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="" />
                    </span>
                    <div class="dt-feature-content">
                        <h4 class="dt-feature-title mb-20">
                            <a
                                class="border-line-black"
                                href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                                <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                            </a>
                        </h4>
                        <p class="mb-20">
                            <?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?>
                        </p>
                        <?php if (!empty($od_feature_btn_text)): ?>
                            <div class="dt-feature-link">
                                <a class="it-btn-feature"
                                    href="<?php echo esc_url($od_feature_btn_url['url'], 'ordainit-toolkit'); ?>">
                                    <?php echo od_kses($od_feature_btn_text, 'ordainit-toolkit'); ?>
                                    <?php if (!empty($od_feature_btn_icon_switcher)):  ?>
                                        <svg
                                            width="22"
                                            height="12"
                                            viewBox="0 0 22 12"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.5303 6.53033C21.8232 6.23744 21.8232 5.76256 21.5303 5.46967L16.7574 0.696699C16.4645 0.403806 15.9896 0.403806 15.6967 0.696699C15.4038 0.989593 15.4038 1.46447 15.6967 1.75736L19.9393 6L15.6967 10.2426C15.4038 10.5355 15.4038 11.0104 15.6967 11.3033C15.9896 11.5962 16.4645 11.5962 16.7574 11.3033L21.5303 6.53033ZM0 6.75H21V5.25H0V6.75Z"
                                                fill="currentcolor" />
                                        </svg>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>

            <div class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>">
                <div class="it-feature-item text-center">
                    <div class="it-feature-icon mb-25">
                        <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                    </div>
                    <h4 class="it-feature-title mb-20">
                        <a class="border-line-black"
                            href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                            <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                        </a>
                    </h4>
                    <p class="mb-0"><?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?></p>
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

$widgets_manager->register(new OD_Feature_Box());
