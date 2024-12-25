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
class Od_Price_Box extends Widget_Base
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
        return 'od-price-box';
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
        return __('Price Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/price-box.php');
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

        $od_price_box_togle_title_monthly = $settings['od_price_box_togle_title_monthly'];

        $od_price_box_togle_title_yearly = $settings['od_price_box_togle_title_yearly'];

        $od_price_monlty_price_box_items = $settings['od_price_monlty_price_box_items'];

        $od_price_yearly_price_box_items = $settings['od_price_yearly_price_box_items'];

?>


        <?php if ($settings['od_design_style']  == 'layout-4'): ?>
            <div class="ag-price-style  ai-price-style">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-12 it-fade-anim" data-fade-from="bottom">
                            <div class="it-price-button it-price-nav-wrapper  p-relative mb-70">
                                <label class="it-toggler-pre" id="it-nav-monthly">
                                    <?php echo esc_html($od_price_box_togle_title_monthly, 'ordainit-toolkit'); ?>
                                </label>
                                <div class="it-toggle-input-wrap">
                                    <input type="checkbox" id="it-switcher-input" class="it-input-check">
                                    <b class="it-switch-toggle"></b>
                                </div>
                                <label class="it-toggler-post is-active" id="it-nav-yearly">
                                    <?php echo esc_html($od_price_box_togle_title_yearly, 'ordainit-toolkit'); ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="it-tab-monthly" class="it-price-tab it-tab-hide">
                                <div class="row">
                                    <?php $i = -1;
                                    foreach ($od_price_monlty_price_box_items as $montlybox4): $i++; ?>
                                        <div class="col-xl-4 col-lg-6 col-md-6 it-fade-anim" data-fade-from="bottom" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                                            <div class="it-price-item p-relative <?php echo ($i === 1) ? 'active' : ''; ?> mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($montlybox4['od_price_monlty_price_box_package_title']); ?></span></div>
                                                <div class="it-price-head">
                                                    <span class="it-price-value"><?php echo od_kses($montlybox4['od_price_monlty_price_box_price']); ?></span>
                                                </div>
                                                <div class="it-price-body">
                                                    <div class="it-price-item-list mb-40">
                                                        <span><?php echo od_kses($montlybox4['od_price_monlty_price_box_description_'], 'ordainit-toolkit'); ?></span>
                                                        <ul>
                                                            <?php echo od_kses($montlybox4['od_price_monlty_price_box_list_item']); ?>
                                                        </ul>
                                                    </div>
                                                    <div class="it-price-button">
                                                        <a class="<?php echo ($i === 1) ? 'ai-btn' : 'ag-btn'; ?>" href="<?php echo esc_html($montlybox4['od_price_monlty_price_box_button_url']); ?>"><?php echo esc_html($montlybox4['od_price_monlty_price_box_button_text']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                            <div id="it-tab-yearly" class="it-price-tab">
                                <div class="row">
                                    <?php
                                    $i = -1;
                                    foreach ($od_price_yearly_price_box_items as $yearlybox4): $i++; ?>
                                        <div class="col-xl-4 col-lg-6 col-md-6 it-fade-anim" data-fade-from="bottom" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                                            <div class="it-price-item p-relative <?php echo ($i === 1) ? 'active' : ''; ?> mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($yearlybox4['od_price_yearly_price_box_package_title']); ?></span></div>
                                                <div class="it-price-head">
                                                    <span class="it-price-value"><?php echo od_kses($yearlybox4['od_price_yearly_price_box_price']); ?></span>
                                                </div>
                                                <div class="it-price-body">
                                                    <div class="it-price-item-list mb-40">
                                                        <span><?php echo od_kses($yearlybox4['od_price_yearly_price_box_description_'], 'ordainit-toolkit'); ?></span>
                                                        <ul>
                                                            <?php echo od_kses($yearlybox4['od_price_yearly_price_box_list_item']); ?>
                                                        </ul>
                                                    </div>
                                                    <div class="it-price-button">
                                                        <a class="<?php echo ($i === 1) ? 'ai-btn' : 'ag-btn'; ?>" href="<?php echo esc_html($yearlybox4['od_price_yearly_price_box_button_url']); ?>"><?php echo esc_html($yearlybox4['od_price_yearly_price_box_button_text']); ?></a>
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
        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>
            <div class="ma-price-style  ai-price-style">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="it-price-button it-price-nav-wrapper p-relative mb-50">
                                <label class="it-toggler-pre" id="it-nav-monthly">
                                    <?php echo esc_html($od_price_box_togle_title_monthly, 'ordainit-toolkit'); ?>
                                </label>
                                <div class="it-toggle-input-wrap">
                                    <input type="checkbox" id="it-switcher-input" class="it-input-check">
                                    <b class="it-switch-toggle"></b>
                                </div>
                                <label class="it-toggler-post is-active" id="it-nav-yearly">
                                    <?php echo esc_html($od_price_box_togle_title_yearly, 'ordainit-toolkit'); ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="it-tab-monthly" class="it-price-tab it-tab-hide">
                                <div class="row">
                                    <!-- pricing box for montly package loop -->

                                    <?php foreach ($od_price_monlty_price_box_items as $montlybox3): ?>



                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="it-price-item text-center p-relative mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($montlybox3['od_price_monlty_price_box_package_title']); ?></span></div>
                                                <div class="it-price-text">
                                                    <p><?php echo od_kses($montlybox3['od_price_monlty_price_box_description_']); ?>/p>
                                                </div>
                                                <div class="cr-price-button mb-25">
                                                    <a class="cr-btn hover-2" href="<?php echo esc_html($montlybox3['od_price_monlty_price_box_button_url']); ?>"><?php echo esc_html($montlybox3['od_price_monlty_price_box_button_text']); ?></a>
                                                </div>
                                                <div class="it-price-head">
                                                    <span class="it-price-value">
                                                        <?php echo od_kses($montlybox3['od_price_monlty_price_box_price']); ?>

                                                    </span>
                                                </div>
                                                <div class="it-price-body text-start">
                                                    <div class="it-price-item-list">
                                                        <?php echo od_kses($montlybox3['od_price_monlty_price_box_list_item']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="it-tab-yearly" class="it-price-tab">
                                <div class="row">
                                    <!-- pricing box for yearly package loop -->

                                    <?php foreach ($od_price_yearly_price_box_items as $yearlybox3): ?>

                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="it-price-item text-center p-relative mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($yearlybox3['od_price_yearly_price_box_package_title']); ?></span></div>
                                                <div class="it-price-text">
                                                    <p><?php echo od_kses($yearlybox3['od_price_yearly_price_box_description_']); ?></p>
                                                </div>
                                                <div class="cr-price-button mb-25">
                                                    <a class="cr-btn hover-2" href="<?php echo esc_html($yearlybox3['od_price_yearly_price_box_button_url']); ?>"><?php echo esc_html($yearlybox3['od_price_yearly_price_box_button_text']); ?></a>
                                                </div>
                                                <div class="it-price-head">
                                                    <span class="it-price-value">
                                                        <?php echo od_kses($yearlybox3['od_price_yearly_price_box_price']); ?>

                                                    </span>
                                                </div>
                                                <div class="it-price-body text-start">
                                                    <div class="it-price-item-list">
                                                        <?php echo od_kses($yearlybox3['od_price_yearly_price_box_list_item']); ?>

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
        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="ai-price-style">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="it-price-button it-price-nav-wrapper p-relative mb-50">
                                <label class="it-toggler-pre" id="it-nav-monthly">
                                    <?php echo esc_html($od_price_box_togle_title_monthly, 'ordainit-toolkit'); ?>
                                </label>
                                <div class="it-toggle-input-wrap">
                                    <input type="checkbox" id="it-switcher-input" class="it-input-check">
                                    <b class="it-switch-toggle"></b>
                                </div>
                                <label class="it-toggler-post is-active" id="it-nav-yearly">
                                    <?php echo esc_html($od_price_box_togle_title_yearly, 'ordainit-toolkit'); ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="it-tab-monthly" class="it-price-tab it-tab-hide">
                                <div class="row">
                                    <?php $i = 0;
                                    foreach ($od_price_monlty_price_box_items as $monthly_pricebox2): $i++; ?>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="it-price-item <?php echo ($i === 2) ? 'active' : ''; ?> p-relative mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($monthly_pricebox2['od_price_monlty_price_box_package_title']); ?> </span></div>
                                                <div class="it-price-head">
                                                    <span class="it-price-value">
                                                        <?php echo od_kses($monthly_pricebox2['od_price_monlty_price_box_price']); ?>

                                                    </span>
                                                </div>
                                                <div class="it-price-body">
                                                    <div class="it-price-item-list mb-40">
                                                        <span> <?php echo od_kses($monthly_pricebox2['od_price_monlty_price_box_description_']); ?></span>
                                                        <?php echo od_kses($monthly_pricebox2['od_price_monlty_price_box_list_item']); ?>

                                                    </div>
                                                    <div class="it-price-button">
                                                        <a class="ai-btn" href="<?php echo od_kses($monthly_pricebox2['od_price_monlty_price_box_button_text']); ?>"> <?php echo od_kses($monthly_pricebox2['od_price_monlty_price_box_button_text']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="it-tab-yearly" class="it-price-tab">
                                <div class="row">
                                    <!-- pricing box for yearly -->

                                    <?php $i = 0;
                                    foreach ($od_price_yearly_price_box_items as $yearly_pricebox2): $i++; ?>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="it-price-item <?php echo ($i === 2) ? 'active' : ''; ?> p-relative mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($yearly_pricebox2['od_price_yearly_price_box_package_title']); ?> </span></div>
                                                <div class="it-price-head">
                                                    <span class="it-price-value">
                                                        <?php echo od_kses($yearly_pricebox2['od_price_yearly_price_box_price']); ?>

                                                    </span>
                                                </div>
                                                <div class="it-price-body">
                                                    <div class="it-price-item-list mb-40">
                                                        <span> <?php echo od_kses($yearly_pricebox2['od_price_yearly_price_box_description_']); ?></span>
                                                        <?php echo od_kses($yearly_pricebox2['od_price_yearly_price_box_list_item']); ?>

                                                    </div>
                                                    <div class="it-price-button">
                                                        <a class="ai-btn" href="<?php echo od_kses($yearly_pricebox2['od_price_yearly_price_box_button_text']); ?>"> <?php echo od_kses($yearly_pricebox2['od_price_yearly_price_box_button_text']); ?></a>
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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="it-price-button it-price-nav-wrapper p-relative mb-50">
                            <label class="it-toggler-pre" id="it-nav-monthly">
                                <?php echo esc_html($od_price_box_togle_title_monthly, 'ordainit-toolkit'); ?>
                            </label>
                            <div class="it-toggle-input-wrap">
                                <input type="checkbox" id="it-switcher-input" class="it-input-check">
                                <b class="it-switch-toggle"></b>
                            </div>
                            <label class="it-toggler-post is-active" id="it-nav-yearly">
                                <?php echo esc_html($od_price_box_togle_title_yearly, 'ordainit-toolkit'); ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="it-price-tab-wrap">
                            <div id="it-tab-monthly" class="it-price-tab it-tab-hide">
                                <div class="row">
                                    <?php

                                    $i = -1;

                                    foreach ($od_price_monlty_price_box_items as $monlty_item) :

                                        $i++;

                                        $monlty_item_img_url = $monlty_item['od_price_monlty_price_box_image']['url'];

                                    ?>
                                        <div class="col-xl-4 col-lg-6 col-md-6 it-fade-anim" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                                            <div class="it-price-item p-relative <?php echo ($i === 1) ? 'active' : ''; ?> mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($monlty_item['od_price_monlty_price_box_package_title'], 'ordainit-toolkit'); ?></span></div>
                                                <div class="text-center">
                                                    <div class="it-price-thumb-box mb-35">
                                                        <div class="it-price-thumb">
                                                            <img src="<?php echo esc_url($monlty_item_img_url, 'ordainit-toollkit'); ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="it-price-head">
                                                        <p class="mb-15"><?php echo od_kses($monlty_item['od_price_monlty_price_box_description_'], 'ordainit-toolkit'); ?></p>
                                                        <span class="it-price-value"><?php echo od_kses($monlty_item['od_price_monlty_price_box_price'], 'ordainit-toolkit'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="it-price-body">
                                                    <div class="it-price-item-list mb-25">
                                                        <?php echo od_kses($monlty_item['od_price_monlty_price_box_list_item'], 'ordainit-toolkit'); ?>

                                                    </div>
                                                    <div class="it-price-button">
                                                        <a class="it-btn w-100 black-bg " href="<?php echo esc_html($monlty_item['od_price_monlty_price_box_button_url'], 'ordainit-toolkit'); ?>"> <?php echo esc_html($monlty_item['od_price_monlty_price_box_button_text'], 'ordainit-toolkit'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div id="it-tab-yearly" class="it-price-tab">
                                <div class="row">

                                    <?php
                                    $i = -1;
                                    foreach ($od_price_yearly_price_box_items as $yearly_item) :
                                        $i++;

                                        $yearly_item_img_url = $yearly_item['od_price_yearly_price_box_image']['url'];  ?>

                                        <div class="col-xl-4 col-lg-6 col-md-6 it-fade-anim" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                                            <div class="it-price-item p-relative <?php echo ($i === 1) ? 'active' : ''; ?> mb-30">
                                                <div class="it-price-tag"><span><?php echo esc_html($yearly_item['od_price_yearly_price_box_package_title'], 'ordainit-toolkit'); ?></span></div>
                                                <div class="text-center">
                                                    <div class="it-price-thumb-box mb-35">
                                                        <div class="it-price-thumb">
                                                            <img src="<?php echo esc_url($yearly_item_img_url, 'ordainit-toollkit'); ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="it-price-head">
                                                        <p class="mb-15"><?php echo od_kses($yearly_item['od_price_yearly_price_box_description_'], 'ordainit-toolkit'); ?></p>
                                                        <span class="it-price-value"><?php echo od_kses($yearly_item['od_price_yearly_price_box_price'], 'ordainit-toolkit'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="it-price-body">
                                                    <div class="it-price-item-list mb-25">
                                                        <?php echo od_kses($yearly_item['od_price_yearly_price_box_list_item'], 'ordainit-toolkit'); ?>

                                                    </div>
                                                    <div class="it-price-button">
                                                        <a class="it-btn w-100 black-bg " href="<?php echo esc_html($yearly_item['od_price_yearly_price_box_button_url'], 'ordainit-toolkit'); ?>"> <?php echo esc_html($yearly_item['od_price_yearly_price_box_button_text'], 'ordainit-toolkit'); ?></a>
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
        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Price_Box());
