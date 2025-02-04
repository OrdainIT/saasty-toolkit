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
class OD_Single_FunFact extends Widget_Base
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
        return 'od-single-funfact';
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
        return __('Single FunFact', 'ordainit-toolkit');
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
            'od_single_funfact_layout',
            [
                'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_design_style',
            [
                'label' => esc_html__('Select Layout', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'ordainit-toolkit'),
                    'layout-2' => esc_html__('Layout 2', 'ordainit-toolkit'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_single_funfact_content',
            [
                'label' => __('Fun Fact Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_single_funfact_number',
            [
                'label' => esc_html__('Number', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('121', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_single_funfact_suffix',
            [
                'label' => esc_html__('Suffix', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_single_funfact_description',
            [
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Description', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();



        // Funfact Style
        $this->start_controls_section(
            'od_single_funfact_style',
            [
                'label' => __('Funfact Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2'],
                ],
            ]
        );

        $this->add_control(
            'od_SINGLE_funfact_bG_color',
            [
                'label' => esc_html__('Fun Fact bg Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-choose-item' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_single_funfact_margin',
            [
                'label' => esc_html__('Fun Fact Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .seo-choose-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_single_funfact_padding',
            [
                'label' => esc_html__('Fun Fact Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .seo-choose-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Funfact Style
        $this->start_controls_section(
            'od_single_funfact_content_style',
            [
                'label' => __('Funfact Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_single_funfact_number_color',
            [
                'label' => esc_html__('Number Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-about-funfact-item h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .seo-choose-item span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Number Typography', 'ordainit-toolkit'),
                'name' => 'od_single_funfact_number_typography',
                'selector' => '
            {{WRAPPER}} .ss-about-funfact-item h5,
            {{WRAPPER}} .seo-choose-item span
        ',
            ]
        );


        $this->add_control(
            'od_single_funfact_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-about-funfact-item span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .seo-choose-item p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_single_funfact_description_typography',
                'selector' => '
            {{WRAPPER}} .ss-about-funfact-item span,
            {{WRAPPER}} .seo-choose-item p
        ',
            ]
        );

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
        $od_single_funfact_number = $settings['od_single_funfact_number'];
        $od_single_funfact_suffix = $settings['od_single_funfact_suffix'];
        $od_single_funfact_description = $settings['od_single_funfact_description'];

?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="seo-choose-item">
                <span><i class="purecounter"
                        data-purecounter-duration="1"
                        data-purecounter-end="<?php echo esc_attr($od_single_funfact_number, 'ordainit-toolkit') ?>">
                        0</i><?php echo esc_html($od_single_funfact_suffix, 'ordainit-toolkit') ?></span>
                <p><?php echo od_kses($od_single_funfact_description, 'ordainit-toolkit') ?></p>
            </div>

        <?php else: ?>

           
                <div class="ss-about-funfact-item">
                    <h5><i class="purecounter"
                            data-purecounter-duration="1"
                            data-purecounter-end="<?php echo esc_attr($od_single_funfact_number, 'ordainit-toolkit') ?>">
                            0</i><?php echo esc_html($od_single_funfact_suffix, 'ordainit-toolkit') ?></h5>
                    <span><?php echo od_kses($od_single_funfact_description, 'ordainit-toolkit') ?></span>
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

$widgets_manager->register(new OD_Single_FunFact());
