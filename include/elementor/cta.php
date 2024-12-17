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
?>


        <?php if ($settings['od_cta_design_style']  == 'layout-5'): ?>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-4'): ?>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-3'): ?>

        <?php elseif ($settings['od_cta_design_style']  == 'layout-2'): ?>

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
                                        class="it-section-title-2 text-white mb-15 it-split-text it-split-in-right">
                                        Ready to take plan? It’s just a <br />
                                        matter of one click
                                    </h4>
                                    <p class="text-white">
                                        Try it risk free — we don’t charge cancellation fees.
                                    </p>
                                </div>
                                <div class="it-cta-input-box p-relative mb-35">
                                    <form action="#">
                                        <input type="email" placeholder="Email address" />
                                        <button class="it-btn">Subscribe</button>
                                    </form>
                                </div>
                                <div class="it-cta-link">
                                    <a href="#">Already a member?</a>
                                    <a href="#">Sign in.</a>
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
