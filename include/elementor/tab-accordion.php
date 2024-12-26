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
class Od_Tab_Accordion extends Widget_Base
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
        return 'tab-acordion';
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
        return __('Tab Accordion', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/tab-accordion.php');
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

        $od_tab_section_title = $settings['od_tab_section_title'];
        $od_tab_section_descrption = $settings['od_tab_section_descrption'];
        $accordion_repeater_content_wrap = $settings['accordion_multi_repeater'];
        $od_accordion_tab_shap_img = $settings['od_accordion_tab_shap_img'];


?>

        <!-- faq-area-start -->
        <div class="seo-faq-style pg-faq-style gray-bg pt-160 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="seo-section-title-box it-text-anim">
                            <h4 class="seo-section-title pb-15 it-split-text it-split-in-right"><?php echo od_kses($od_tab_section_title, 'ordainit-toolkit'); ?></h4>
                            <p class="mb-30"><?php echo od_kses($od_tab_section_descrption, 'ordainit-toolkit'); ?></p>
                            <div class="pg-faq-content d-flex align-items-center mr-55 justify-content-between it-fade-anim" data-fade-from="bottom" data-delay=".5">
                                <div class="seo-faq-nav-button">
                                    <ul class="nav nav-tab" id="myTab" role="tablist">
                                        <?php $i = 0;
                                        foreach ($accordion_repeater_content_wrap as $single_button_item): $i++; ?>
                                            <li class="nav-items" role="presentation">
                                                <button class="nav-link <?php echo esc_attr($i == '1' ? 'active' : ''); ?>" id="Account-tab<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" data-bs-toggle="tab" data-bs-target="#Account<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" type="button" role="tab" aria-controls="Account<?php echo esc_attr($i, 'ordainit-toolkit'); ?>" aria-selected="true"><?php echo esc_html($single_button_item['accordion_button_text']); ?></button>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                                <img class="d-none d-md-block" src="<?php echo esc_url($od_accordion_tab_shap_img['url'], 'ordainit-toolkit'); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="pg-faq-wrap">
                            <div class="tab-content" id="myTabContent">
                                <?php $i = 0;
                                foreach ($accordion_repeater_content_wrap as $single_faq_content_item):
                                    $i++;
                                    $tab_faq_array = $single_faq_content_item['accordion_nested_items'];
                                ?>
                                    <div class="tab-pane fade <?php echo esc_attr($i == 1 ? 'show active' : ''); ?>" id="Account<?php echo esc_attr($i); ?>" role="tabpanel" aria-labelledby="Account-tab<?php echo esc_attr($i); ?>">
                                        <div class="pg-custom-accordion">
                                            <div class="accordion" id="accordionExample-<?php echo esc_attr($i); ?>">

                                                <?php $x = 0;
                                                foreach ($tab_faq_array as $single_faq_data): $x++;
                                                    // Generate a unique ID based on the $x value and other properties if needed
                                                    $unique_id = 'faq-item-' . $i . '-' . $x; // Ensuring unique IDs across all items
                                                ?>
                                                    <div class="accordion-items">
                                                        <h2 class="accordion-header" id="heading-<?php echo esc_attr($unique_id); ?>">
                                                            <button class="accordion-buttons <?php echo esc_attr($x == 1 ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse-<?php echo esc_attr($unique_id); ?>" aria-expanded="<?php echo esc_attr($x == 1 ? 'true' : 'false'); ?>" aria-controls="collapse-<?php echo esc_attr($unique_id); ?>">
                                                                <?php echo esc_html($single_faq_data['accordion_title']); ?>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-<?php echo esc_attr($unique_id); ?>" class="accordion-collapse <?php echo esc_attr($x == 1 ? 'collapse show' : 'collapse'); ?>"
                                                            aria-labelledby="heading-<?php echo esc_attr($unique_id); ?>" data-bs-parent="#accordionExample-<?php echo esc_attr($i); ?>">
                                                            <div class="accordion-body d-flex align-items-center">
                                                                <p class="mb-0">
                                                                    <?php echo esc_html($single_faq_data['accordion_description']); ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

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
        <!-- faq-area-end -->





        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Tab_Accordion());
