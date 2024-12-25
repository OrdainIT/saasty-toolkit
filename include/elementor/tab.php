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
class Od_Tab extends Widget_Base
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
        return 'od-tab';
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
        return __('Od Tab', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/tab.php');
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
        $od_tab_repeater = $settings['od_tab_repeater'];
        $od_tab_shape_image_1 = $settings['od_tab_shape_image_1'];
        $od_tab_shape_image_2 = $settings['od_tab_shape_image_2'];
?>


        <!-- analytics-area-end -->
        <div class="it-analytics-area z-index-1 p-relative pt-110 pb-120">
            <img class="it-analytics-shape-2 d-none d-md-block" src="<?php echo esc_url($od_tab_shape_image_1['url'], 'ordainit-toolkit'); ?>" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="it-analytics-button mb-35">
                            <nav>
                                <div class="nav nav-tab it-marker-tab p-relative" id="nav-tab" role="tablist">
                                    <?php $i = 0;
                                    foreach ($od_tab_repeater as $tab_content) : $i++; ?>
                                        <button class="nav-links <?php echo esc_attr($i === 1 ? 'active' : ''); ?> " id="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" type="button" role="tab" aria-controls="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" aria-selected="<?php echo esc_attr($i === 1 ? 'true' : 'false'); ?>"><?php echo esc_html($tab_content['od_tab_nav_button_title'], 'ordainit-toolkit'); ?></button>
                                    <?php endforeach; ?>
                                    <span id="lineMarker"></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="it-analytics-wrap">
                            <div class="tab-content" id="nav-tabContent">
                                <?php $i = 0;
                                foreach ($od_tab_repeater as $tab_content) : $i++;

                                    $tab_content_bg_img_url = $tab_content['od_tab_bg_image'];
                                    $od_tab_shape_image_1_url = $tab_content['od_tab_shape_image_1'];
                                    $od_tab_shape_image_2_url = $tab_content['od_tab_shape_image_2'];
                                    $od_tab_shape_image_3_url = $tab_content['od_tab_shape_image_3'];

                                ?>
                                    <div class="tab-pane fade <?php echo esc_attr($i === 1 ? 'active show' : ''); ?> " id="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_attr($i, 'ordainit-toolkit'); ?>-tab">
                                        <div class="it-analytics-item-box z-index-1 p-relative fix d-flex justify-content-between align-items-center" style="background-image: url(<?php echo esc_url($tab_content_bg_img_url['url'], 'ordainit-toolkit'); ?>);">
                                            <img class="it-analytics-shape-1" src="<?php echo esc_url($od_tab_shape_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                                            <div class="it-analytics-item-left">
                                                <div class="it-section-title-box it-text-anim mb-30">
                                                    <h4 class="it-section-title-2 text-white mb-15 it-split-text it-split-in-right"><?php echo od_kses($tab_content['od_tab_content_title'], 'ordainit-toolkit'); ?></h4>
                                                    <p class="mb-0 "> <?php echo od_kses($tab_content['od_tab_content_description'], 'ordainit-toolkit'); ?> </p>
                                                </div>
                                                <div class="it-analytics-item-list">
                                                    <?php echo od_kses($tab_content['od_tab_content_list'], 'ordainit-toolkit'); ?>

                                                </div>
                                                <a href=" <?php echo esc_url($tab_content['od_tab_button_url'], 'ordainit-toolkit'); ?>" class="it-btn white-bg d-none d-lg-inline-block">
                                                    <?php echo esc_html($tab_content['od_tab_button_title'], 'ordainit-toolkit'); ?>
                                                </a>
                                            </div>
                                            <div class="it-analytics-item-right d-flex align-items-center">
                                                <div class="it-analytics-item-thumb-box mr-15">
                                                    <div class="it-analytics-item-thumb mb-15 it-fade-anim" data-fade-from="left" data-delay=".3">
                                                        <img src="<?php echo esc_url($od_tab_shape_image_1_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                                    </div>
                                                    <div class="it-analytics-item-thumb it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                                        <img src="<?php echo esc_url($od_tab_shape_image_2_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="it-analytics-item-thumb it-fade-anim" data-fade-from="top" data-delay=".7">
                                                    <img src="<?php echo esc_url($od_tab_shape_image_3_url['url'], 'ordainit-toolkit'); ?>" alt="">
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
        <!-- analytics-area-end -->







        <script>
            jQuery(document).ready(function($) {


                // analytics tab
                if ($('#lineMarker').length > 0) {

                    function it_tab_bg() {
                        var marker = document.querySelector('#lineMarker');
                        var item = document.querySelectorAll('.it-marker-tab button');
                        var itemActive = document.querySelector('.it-marker-tab .nav-links.active');

                        function indicator(e) {
                            marker.style.left = e.offsetLeft + "px";
                            marker.style.width = e.offsetWidth + "px";
                        }


                        item.forEach(link => {
                            link.addEventListener('click', (e) => {
                                indicator(e.target);
                            });
                        });

                        var activeNav = $('.it-marker-tab .nav-links.active');
                        var activewidth = $(activeNav).width();
                        var activePadLeft = parseFloat($(activeNav).css('padding-left'));
                        var activePadRight = parseFloat($(activeNav).css('padding-right'));
                        var totalWidth = activewidth + activePadLeft + activePadRight;

                        var precedingAnchorWidth = anchorWidthCounter();


                        $(marker).css('display', 'block');

                        $(marker).css('width', totalWidth);

                        function anchorWidthCounter() {
                            var anchorWidths = 0;
                            var a;
                            var aWidth;
                            var aPadLeft;
                            var aPadRight;
                            var aTotalWidth;
                            $('.it-marker-tab button').each(function(index, elem) {
                                var activeTest = $(elem).hasClass('active');
                                marker.style.left = elem.offsetLeft + "px";
                                if (activeTest) {

                                    return false;
                                }

                                a = $(elem).find('button');
                                aWidth = a.width();
                                aPadLeft = parseFloat(a.css('padding-left'));
                                aPadRight = parseFloat(a.css('padding-right'));
                                aTotalWidth = aWidth + aPadLeft + aPadRight;

                                anchorWidths = anchorWidths + aTotalWidth;

                            });

                            return anchorWidths;
                        }
                    }
                    it_tab_bg();
                }

            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Tab());
