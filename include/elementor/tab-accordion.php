<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Controls_Manager;
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

        $this->start_controls_section(
            'od_tab_accordion_title_content',
            [
                'label' => __('Title & Content', 'ordainit-toolkit'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'od_tab_section_title',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => od_kses('Frequently Asked  Questions', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'od_tab_section_descrption',
            [
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('Absolutely! One of our tools is a long-form article writer which is <br> specifically designed to generate unlimited content', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'od_tab_accordion_content_wrap',
            [
                'label' => __('Tab Accordion Content', 'ordainit-toolkit'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Sub-items repeater (nested items)
        $accordion_nested_repeater = new \Elementor\Repeater();
        $accordion_nested_repeater->add_control(
            'accordion_title',
            [
                'label'       => __('Accordion Title', 'ordainit-toolkit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Accordion Title', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $accordion_nested_repeater->add_control(
            'accordion_description',
            [
                'label'       => __('Accordion Description', 'ordainit-toolkit'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Accordion Descrption', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        // Main repeater
        $accordion_button_repeater = new \Elementor\Repeater();
        $accordion_button_repeater->add_control(
            'accordion_button_text',
            [
                'label'       => __('Button Text', 'ordainit-toolkit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Account', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        // Add sub-items repeater inside the main repeater
        $accordion_button_repeater->add_control(
            'accordion_nested_items',
            [
                'label'       => __('Accordion Title', 'ordainit-toolkit'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $accordion_nested_repeater->get_controls(),
                'title_field' => '{{{ accordion_title }}}',
            ]
        );

        // Add main repeater to widget controls
        $this->add_control(
            'accordion_multi_repeater',
            [
                'label'       => __('Accordion List Items', 'ordainit-toolkit'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $accordion_button_repeater->get_controls(),
                'title_field' => '{{{ accordion_button_text }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'od_accordion_tab_shap',
            [
                'label' => __('Shap', 'ordainit-toolkit'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'od_accordion_tab_shap_img',
            [
                'label' => esc_html__('Shap Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'od_accordion_tab_section_title_style',
            [
                'label' => __('Title & Content', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title style controls here

        $this->add_control(
            'od_accordion_tab_section_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Title typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_accordion_tab_section_title_typography',
                'label' => __('Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .seo-section-title',
            ]
        );

        // Description style controls here

        $this->add_control(
            'od_accordion_tab_section_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-section-title-box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Description typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_accordion_tab_section_description_typography',
                'label' => __('Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .seo-section-title-box p',
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'od_accordion_tab_button_style',
            [
                'label' => __('Accordion Button', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // button tabs controls here

        $this->start_controls_tabs(
            'od_accordion_tab_button_tabs'
        );

        $this->start_controls_tab(
            'od_accordion_tab_button_normal',
            [
                'label' => __('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_accordion_tab_button_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_accordion_tab_button_bg_color',
            [
                'label' => esc_html__('Background Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // end normal tab

        $this->end_controls_tab();

        // button active tab

        $this->start_controls_tab(
            'od_accordion_tab_button_active',
            [
                'label' => __('Active', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_accordion_tab_button_active_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button.active' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_accordion_tab_button_active_bg_color',
            [
                'label' => esc_html__('Background Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button.active' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // end active tab

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // button typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_accordion_tab_button_typography',
                'label' => __('Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .seo-faq-style .seo-faq-nav-button ul li button',
            ]
        );






        $this->end_controls_section();

        $this->start_controls_section(
            'od_accordion_tab_list_content_style',
            [
                'label' => __('Accordion List Content', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        // list content bg heading control

        $this->add_control(
            'od_accordion_tab_list_content_bg_heading',
            [
                'label' => __('Background', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        // list content bg color control

        $this->add_control(
            'od_accordion_tab_list_content_bg_color',
            [
                'label' => esc_html__('Background Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .accordion-items' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // list content bg padding control

        $this->add_control(
            'od_accordion_tab_list_content_bg_padding',
            [
                'label' => esc_html__('Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .accordion-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        // list content bg margin control

        $this->add_control(
            'od_accordion_tab_list_content_bg_margin',
            [
                'label' => esc_html__('Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .accordion-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        // list content bg border control

        $this->add_control(
            'od_accordion_tab_list_content_bg_border',
            [
                'label' => esc_html__('Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-faq-style .accordion-items' => 'border-color: {{VALUE}}',
                ],
            ]
        );


        // Title style heading control

        $this->add_control(
            'od_accordion_tab_list_content_title_heading',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        // Title color control

        $this->add_control(
            'od_accordion_tab_list_content_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-custom-accordion .accordion-buttons' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Title typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_accordion_tab_list_content_title_typography',
                'label' => __('Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .pg-custom-accordion .accordion-buttons',
            ]
        );

        // Description style heading control

        $this->add_control(
            'od_accordion_tab_list_content_description_heading',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        // Description color control

        $this->add_control(
            'od_accordion_tab_list_content_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-custom-accordion .accordion-body p' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Description typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_accordion_tab_list_content_description_typography',
                'label' => __('Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .pg-custom-accordion .accordion-body p',
            ]
        );


        // icon style heading control

        $this->add_control(
            'od_accordion_tab_list_content_icon_heading',
            [
                'label' => __('Icon', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        // icon tabs controls here

        $this->start_controls_tabs(
            'od_accordion_tab_list_content_icon_tabs'
        );

        $this->start_controls_tab(
            'od_accordion_tab_list_content_icon_normal',
            [
                'label' => __('Active', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_accordion_tab_list_content_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-custom-accordion .accordion-buttons::after' => 'color: {{VALUE}}',
                ],
            ]
        );

        // icon normal border control

        $this->add_control(
            'od_accordion_tab_list_content_icon_border',
            [
                'label' => esc_html__('Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-custom-accordion .accordion-buttons::after' => 'border-color: {{VALUE}}',
                ],
            ]
        );



        // end normal tab

        $this->end_controls_tab();

        // icon active tab

        $this->start_controls_tab(
            'od_accordion_tab_list_content_icon_active',
            [
                'label' => __('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_accordion_tab_list_content_icon_active_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-custom-accordion .accordion-buttons.collapsed::after' => 'color: {{VALUE}}',
                ],
            ]
        );

        // icon active border control

        $this->add_control(
            'od_accordion_tab_list_content_icon_active_border',
            [
                'label' => esc_html__('Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-custom-accordion .accordion-buttons.collapsed::after' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        // end active tab

        $this->end_controls_tab();

        $this->end_controls_tabs();








        $this->end_controls_section();

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
