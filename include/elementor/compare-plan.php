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
class OD_Compare_Plan extends Widget_Base
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
        return 'od-compare-plan';
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
        return __('Compare Plan', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/compare-plan.php');
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
        $od_compare_lists = $settings['od_compare_lists'];
        $od_compare_plan_heading_title_1 = $settings['od_compare_plan_heading_title_1'];
        $od_compare_plan_heading_title_2 = $settings['od_compare_plan_heading_title_2'];
        $od_compare_plan_heading_title_3 = $settings['od_compare_plan_heading_title_3'];
        $od_compare_plan_heading_title_4 = $settings['od_compare_plan_heading_title_4'];
        $od_compare_plan_heading_title_5 = $settings['od_compare_plan_heading_title_5'];
        $od_compare_plan_info_icon_show = $settings['od_compare_plan_info_icon_show'];
?>


        <div class="it-plan-area">
            <div class="container">

                <div class="it-plan-wrap">
                    <div class="it-plan-box">
                        <div class="it-plan-top-box">
                            <div class="row gx-0 align-items-center it-plan-top-height">
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="it-plan-head">
                                        <h4 class="it-plan-title"><?php echo esc_html($od_compare_plan_heading_title_1, 'ordainit-toolkit'); ?></h4>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8">
                                    <div class="it-plan-head">
                                        <ul>
                                            <li>
                                                <div class="it-plan-item">
                                                    <span><?php echo esc_html($od_compare_plan_heading_title_2, 'ordainit-toolkit'); ?></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-plan-item">
                                                    <span><?php echo esc_html($od_compare_plan_heading_title_3, 'ordainit-toolkit'); ?></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-plan-item">
                                                    <span><?php echo esc_html($od_compare_plan_heading_title_4, 'ordainit-toolkit'); ?></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-plan-item">
                                                    <span><?php echo esc_html($od_compare_plan_heading_title_5, 'ordainit-toolkit'); ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="it-plan-bottom-box">
                            <?php foreach ($od_compare_lists as $od_compare_list): ?>
                                <div class="row gx-0 it-plan-height">
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <div class="it-plan-bottom-title d-flex justify-content-between align-items-center">
                                            <h4 class="it-plan-bottom-title-sm"><?php echo esc_html($od_compare_list['od_compare_list_title'], 'ordainit-toolkit') ?></h4>
                                            <?php if (!empty($od_compare_plan_info_icon_show)): ?>
                                                <span>
                                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5037 10.5682C8.35036 10.5824 8.19641 10.5478 8.06393 10.4693C7.96713 10.3699 7.92072 10.2319 7.9378 10.0943C7.94138 9.97967 7.95506 9.86558 7.9787 9.75338C8.00158 9.62465 8.03114 9.4972 8.06732 9.37155L8.4696 7.98745C8.51108 7.85084 8.53851 7.71033 8.55143 7.56812C8.55143 7.41472 8.57188 7.30902 8.57188 7.24767C8.58043 6.97425 8.46368 6.71186 8.25482 6.53517C7.99792 6.33795 7.678 6.241 7.35482 6.26245C7.12323 6.26593 6.89343 6.30384 6.673 6.37495C6.43209 6.44995 6.17867 6.53971 5.91277 6.64427L5.79688 7.09427C5.87527 7.067 5.97075 7.03633 6.07982 7.00222C6.18389 6.9714 6.29176 6.95532 6.40027 6.9545C6.5525 6.93801 6.70572 6.97539 6.83322 7.06017C6.91982 7.1635 6.96046 7.29774 6.94572 7.43177C6.94534 7.54641 6.93277 7.6607 6.90822 7.77267C6.88435 7.892 6.85367 8.01812 6.81617 8.15107L6.4105 9.54197C6.3778 9.67126 6.35164 9.8021 6.3321 9.93402C6.31616 10.047 6.30819 10.1609 6.30822 10.2749C6.30655 10.5502 6.43244 10.8108 6.64912 10.9806C6.90998 11.1809 7.23447 11.2802 7.56274 11.2601C7.7939 11.2649 8.02426 11.2315 8.24457 11.1613C8.43775 11.0953 8.69571 11.001 9.01845 10.8783L9.12755 10.4488C9.04013 10.485 8.9501 10.5147 8.85822 10.5374C8.74203 10.5639 8.62273 10.5742 8.5037 10.5682Z" fill="#5F6168" />
                                                        <path d="M8.92761 4.00568C8.74208 3.83529 8.49762 3.74362 8.24579 3.75001C7.9941 3.74432 7.74988 3.83591 7.56396 4.00568C7.22318 4.29953 7.18512 4.81401 7.479 5.15482C7.50519 5.1852 7.53358 5.21359 7.56396 5.23978C7.9522 5.58704 8.53937 5.58704 8.92758 5.23978C9.26836 4.94303 9.30408 4.42624 9.00733 4.08546C8.98266 4.05707 8.956 4.03041 8.92761 4.00568Z" fill="#5F6168" />
                                                        <path d="M7.5 0C3.35786 0 0 3.35786 0 7.5C0 11.6421 3.35786 15 7.5 15C11.6421 15 15 11.6421 15 7.5C15 3.35786 11.6421 0 7.5 0ZM7.5 14.3182C3.73441 14.3182 0.681826 11.2656 0.681826 7.5C0.681826 3.73441 3.73441 0.681826 7.5 0.681826C11.2656 0.681826 14.3182 3.73441 14.3182 7.5C14.3182 11.2656 11.2656 14.3182 7.5 14.3182Z" fill="#5F6168" />
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8">
                                        <div class="it-plan-bottom">
                                            <ul>
                                                <li>
                                                    <span><?php echo od_kses($od_compare_list['od_compare_list_item_1'], 'ordainit-toolkit'); ?></span>
                                                </li>
                                                <li>
                                                    <span><?php echo od_kses($od_compare_list['od_compare_list_item_2'], 'ordainit-toolkit'); ?></span>
                                                </li>
                                                <li>
                                                    <span><?php echo od_kses($od_compare_list['od_compare_list_item_3'], 'ordainit-toolkit'); ?></span>
                                                </li>
                                                <li>
                                                    <span><?php echo od_kses($od_compare_list['od_compare_list_item_4'], 'ordainit-toolkit'); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
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

$widgets_manager->register(new OD_Compare_Plan());
