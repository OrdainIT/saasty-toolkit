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
class OD_Process_Box extends Widget_Base
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
        return 'od-process-box';
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
        return __('Process Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/process-box.php');
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
        $od_process_steps = $settings['od_process_steps'];
        $od_process_heading_title = $settings['od_process_heading_title'];
        $od_process_heading_subtitle_switcher = $settings['od_process_heading_subtitle_switcher'];
        $od_process_heading_subtitle = $settings['od_process_heading_subtitle'];
        $od_process_background_image = $settings['od_process_background_image'];
?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="pg-process-area seo-process-style section-bg p-relative"
                style="background-image: url('<?php echo esc_url($od_process_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="pg-section-title-box text-center">
                                <?php if (!empty($od_process_heading_subtitle_switcher)) : ?>
                                    <span class="pg-section-subtitle white-style it-fade-anim" data-fade-from="top" data-delay=".3">
                                        <?php echo esc_html($od_process_heading_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                <?php endif; ?>
                                <div class="it_text_reveal_anim"></div>
                                <h4 class="seo-section-title it_text_reveal_anim"><?php echo od_kses($od_process_heading_title, 'ordainit-toolkit'); ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="pg-process-border">
                        <div class="row">

                            <?php foreach ($od_process_steps as $od_process_step): ?>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="pg-process-item text-center mb-30">
                                        <div class="pg-process-icon">
                                            <img src="<?php echo esc_url($od_process_step['od_process_step_icon']['url'], 'ordainit-toolkit'); ?>"
                                                alt="<?php echo esc_attr($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?>">
                                        </div>
                                        <div class="pg-process-content">
                                            <h4 class="pg-process-title"><?php echo od_kses($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?>
                                            </h4>
                                            <p><?php echo od_kses($od_process_step['od_process_step_description'], 'ordainit-toolkit'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>



        <?php else: ?>

            <div class="pg-process-area pg-process-border">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="pg-section-title-box text-center">
                                <h4 class="pg-section-title it-char-animation">
                                    <?php echo od_kses($od_process_heading_title, 'ordainit-toolkit'); ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($od_process_steps as $od_process_step): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="pg-process-item text-center mb-30">
                                    <div class="pg-process-icon">
                                        <img src="<?php echo esc_url($od_process_step['od_process_step_icon']['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_attr($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?>">
                                    </div>
                                    <div class="pg-process-content">
                                        <h4 class="pg-process-title"><?php echo od_kses($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?></h4>
                                        <p><?php echo od_kses($od_process_step['od_process_step_description'], 'ordainit-toolkit'); ?></p>
                                        <a class="pg-btn black-bg"
                                            href="<?php echo esc_url($od_process_step['od_process_step_button_link']['url'], 'ordainit-toolkit'); ?>">
                                            <?php echo esc_html($od_process_step['od_process_step_button_text'], 'ordainit-toolkit'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

$widgets_manager->register(new OD_Process_Box());
