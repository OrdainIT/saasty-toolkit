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
class OD_About_Tab extends Widget_Base
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
        return 'od-about-tab';
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
        return __('About Tab', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/about-tab.php');
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
        $od_about_tab_lists = $settings['od_about_tab_lists'];
?>


        <div class="it-about-details-right-box">
            <div class="it-about-details-nav-button">
                <ul class="nav nav-tab" id="myTab" role="tablist">
                    <?php foreach ($od_about_tab_lists as $index => $tab) : ?>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link <?php echo $tab['od_about_tab_list_is_active'] === 'yes' ? 'active' : ''; ?>"
                                id="tab-<?php echo esc_attr($index); ?>"
                                data-bs-toggle="tab"
                                data-bs-target="#content-<?php echo esc_attr($index); ?>"
                                type="button"
                                role="tab"
                                aria-controls="content-<?php echo esc_attr($index); ?>"
                                aria-selected="<?php echo $tab['od_about_tab_list_is_active'] === 'yes' ? 'true' : 'false'; ?>">
                                <?php echo esc_html($tab['od_about_tab_list_title'], 'ordainit-toolkit'); ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="it-about-details-nav-content">
                <div class="tab-content" id="myTabContent">
                    <?php foreach ($od_about_tab_lists as $index => $tab) : ?>
                        <div
                            class="tab-pane fade <?php echo $tab['od_about_tab_list_is_active'] === 'yes' ? 'show active' : ''; ?>"
                            id="content-<?php echo esc_attr($index); ?>"
                            role="tabpanel"
                            aria-labelledby="tab-<?php echo esc_attr($index); ?>">
                            <p><?php echo od_kses($tab['od_about_tab_list_description'], 'ordainit-toolkit'); ?></p>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>


        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_About_Tab());
