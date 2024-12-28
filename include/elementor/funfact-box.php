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
class OD_FunFact_Box extends Widget_Base
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
        return 'od-funfact-box';
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
        return __('Fun Fact Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/funfact-box.php');
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
        $od_funfact_lists = $settings['od_funfact_lists'];
?>
        <?php if ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="pg-funfact-style pg-funfact-area">
                <div class="row">
                    <div class="col-12">

                        <div class="dt-funfact-wrap">
                            <div class="row">
                                <?php foreach ($od_funfact_lists as $index => $od_funfact_list): ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="dt-funfact-item 
                                                     <?php
                                                        if ($index === 0) {
                                                            echo 'style-1 d-flex justify-content-center justify-content-md-start';
                                                        } elseif ($index === 1) {
                                                            echo 'style-2 text-center';
                                                        } elseif ($index === 2) {
                                                            echo 'style-3 text-center';
                                                        } elseif ($index === 3) {
                                                            echo 'style-4 d-flex justify-content-center justify-content-md-start justify-content-lg-end';
                                                        }
                                                        ?> mb-30">
                                            <div class="text-center">
                                                <h5 class="mb-10">
                                                    <?php echo esc_html($od_funfact_list['od_funfact_prefix'], 'ordainit-toolkit'); ?><span class="purecounter"
                                                        data-purecounter-duration="1"
                                                        data-purecounter-end="<?php echo esc_attr($od_funfact_list['od_funfact_number'], 'ordainit-toolkit'); ?>">
                                                        0
                                                    </span><?php echo esc_html($od_funfact_list['od_funfact_suffix'], 'ordainit-toolkit'); ?>
                                                </h5>
                                                <p><?php echo esc_html($od_funfact_list['od_funfact_description'], 'ordainit-toolkit'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="dt-funfact-area pg-funfact-style-2">
                <div class="container">
                    <div class="dt-funfact-bg p-relative">
                        <div class="row">
                            <div class="col-12">
                                <div class="dt-funfact-wrap">
                                    <div class="row">

                                        <?php foreach ($od_funfact_lists as $index => $od_funfact_list): ?>
                                            <div class="col-lg-3 col-md-4">
                                                <div class="dt-funfact-item <?php echo esc_attr(($index === count($od_funfact_lists) - 1) ? 'text-lg-end' : 'border-right'); ?> style-<?php echo esc_attr($index + 1, 'ordainit-toolkit'); ?>">
                                                    <div>
                                                        <h5 class="mb-10">
                                                            <span class="purecounter"
                                                                data-purecounter-duration="1"
                                                                data-purecounter-end="<?php echo esc_attr($od_funfact_list['od_funfact_number'], 'ordainit-toolkit') ?>">
                                                                0</span><?php echo esc_html($od_funfact_list['od_funfact_suffix'], 'ordainit-toolkit') ?>
                                                        </h5>
                                                        <p><?php echo od_kses($od_funfact_list['od_funfact_description'], 'ordainit-toolkit') ?></p>
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
        <?php else: ?>

            <div class="dt-funfact-area">
                <div class="container">
                    <div class="dt-funfact-bg p-relative z-index-1 theme-2-bg">
                        <div class="row">
                            <div class="col-12">
                                <div class="dt-funfact-wrap flex-wrap d-flex align-items-center justify-content-between">

                                    <?php foreach ($od_funfact_lists as $index => $od_funfact_list): ?>
                                        <div class="dt-funfact-item <?php echo ($index === count($od_funfact_lists) - 1) ? 'd-none d-xl-block' : 'border-right'; ?> ">
                                            <h5 class="mb-10">
                                                <span class="purecounter"
                                                    data-purecounter-duration="1"
                                                    data-purecounter-end="<?php echo esc_attr($od_funfact_list['od_funfact_number'], 'ordainit-toolkit') ?>">
                                                    0
                                                </span><?php echo esc_html($od_funfact_list['od_funfact_suffix'], 'ordainit-toolkit') ?>
                                            </h5>
                                            <p><?php echo od_kses($od_funfact_list['od_funfact_description'], 'ordainit-toolkit') ?></p>
                                        </div>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                        </div>
                    </div>
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

$widgets_manager->register(new OD_FunFact_Box());
