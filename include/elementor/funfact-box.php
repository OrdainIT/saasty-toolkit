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

        $this->start_controls_section(
            'od_funfact_layout',
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
                    'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'od_funfact_section',
            [
                'label' => esc_html__('Fun Facts', 'ordainit-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'od_funfact_lists',
            [
                'label' => esc_html__('Repeater List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_funfact_number',
                        'label' => esc_html__('Number', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('0', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_funfact_suffix',
                        'label' => esc_html__('Suffix', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('m', 'ordainit-toolkit'),
                    ],
                    [
                        'name' => 'od_funfact_description',
                        'label' => esc_html__('Description', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Description', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_funfact_prefix',
                        'label' => esc_html__('Prefix', 'ordainit-toolkit'),
                        'description' => esc_html__('It will works only for layout 3'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('$', 'ordainit-toolkit'),
                    ],
                ],
                'default' => [
                    [
                        'od_funfact_number' => esc_html__('90', 'ordainit-toolkit'),
                        'od_funfact_suffix' => esc_html__('%', 'ordainit-toolkit'),
                        'od_funfact_description' => esc_html__('Powerful customization', 'ordainit-toolkit'),
                    ],
                    [
                        'od_funfact_number' => esc_html__('125', 'ordainit-toolkit'),
                        'od_funfact_suffix' => esc_html__('+', 'ordainit-toolkit'),
                        'od_funfact_description' => esc_html__('Project Completed', 'ordainit-toolkit'),
                    ],
                    [
                        'od_funfact_number' => esc_html__('2', 'ordainit-toolkit'),
                        'od_funfact_suffix' => esc_html__('X', 'ordainit-toolkit'),
                        'od_funfact_description' => esc_html__('Faster development', 'ordainit-toolkit'),
                    ],
                    [
                        'od_funfact_number' => esc_html__('50', 'ordainit-toolkit'),
                        'od_funfact_suffix' => esc_html__('+', 'ordainit-toolkit'),
                        'od_funfact_description' => esc_html__('Winning Award', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_funfact_description }}}',
            ]
        );

        $this->end_controls_section();


        // Funfact Style
        $this->start_controls_section(
            'od_funfact_style',
            [
                'label' => __('Funfact Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_funfact_bg_color',
            [
                'label' => esc_html__('Fun Fact BG', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-2-bg' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .pg-funfact-style-2 .dt-funfact-bg' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2'],
                ],
            ]
        );

        $this->add_control(
            'od_funfact_after_bg_color',
            [
                'label' => esc_html__('Fun Fact After BG', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-bg::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .pg-funfact-style-2 .dt-funfact-bg::after' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2'],
                ],
            ]
        );

        $this->add_control(
            'od_funfact_border_color',
            [
                'label' => esc_html__('Border Right Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-item.border-right::after' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2'],
                ],
            ]
        );

        $this->add_control(
            'od_funfact_margin',
            [
                'label' => esc_html__('Fun Fact Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pg-funfact-style' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_funfact_padding',
            [
                'label' => esc_html__('Fun Fact Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pg-funfact-style-2 .dt-funfact-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pg-funfact-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Funfact Style
        $this->start_controls_section(
            'od_funfact_content_style',
            [
                'label' => __('Funfact Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_funfact_number_color',
            [
                'label' => esc_html__('Number Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-item h5' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Number Typography', 'ordainit-toolkit'),
                'name' => 'od_funfact_number_typography',
                'selector' => '{{WRAPPER}} .dt-funfact-item h5',
            ]
        );

        $this->add_control(
            'od_funfact_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-item p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2'],
                ],
            ]
        );

        $this->add_control(
            'od_funfact_description_gradient',
            [
                'label' => esc_html__('Description Gradient Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'od_design_style' => ['layout-3'],
                ],
            ]
        );

        $this->add_control(
            'od_funfact_gradient_start_color',
            [
                'label' => esc_html__('Gradient Start Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-item p' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_funfact_gradient_end_color.VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
                ],
                'condition' => [
                    'od_design_style' => ['layout-3'],
                ],
            ]
        );

        $this->add_control(
            'od_funfact_gradient_end_color',
            [
                'label' => esc_html__('Gradient End Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-funfact-item p' => 'background: linear-gradient(90deg, {{od_funfact_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
                ],
                'condition' => [
                    'od_design_style' => ['layout-3'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_funfact_description_typography',
                'selector' => '{{WRAPPER}} .dt-funfact-item p',
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
