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
class Od_Porfolio_Box extends Widget_Base
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
        return 'portfolio-box';
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
        return __('Portfolio Box', 'ordainit-toolkit');
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
            'od_layout',
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
            'od_portfolio_box',
            [
                'label' => __('Portfolio Box', 'ordainit-toolkit'),
            ]
        );

        // Portfoio Title Control

        $this->add_control(
            'portfolio_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Product Analysis', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        // Portfolio Sub Title Control

        $this->add_control(
            'portfolio_subtitle',
            [
                'label' => __('Sub Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Data Research', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
                'label_block' => true,
            ]
        );

        // Portfolio Image Control

        $this->add_control(
            'portfolio_image',
            [
                'label' => __('Image', 'ordainit-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ]
        );



        // Portfolio URL Control

        $this->add_control(
            'portfolio_url',
            [
                'label' => __('URL', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );



        $this->end_controls_section();



        $this->start_controls_section(
            'od_portfolio_settings',
            [
                'label' => __('Settings', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
            ]
        );

        // Portfolio Fade Animation Control

        $this->add_control(
            'portfolio_fade_animation',
            [
                'label' => __('Fade Animation', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'right' => __('Right', 'ordainit-toolkit'),
                    'top' => __('Top', 'ordainit-toolkit'),
                ],
            ]
        );

        // Portfolio Delay Control

        $this->add_control(
            'portfolio_delay',
            [
                'label' => __('Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => '0.3',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_portfolio_box_style',
            [
                'label' => __('Box', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // portfolio box bg color

        $this->add_control(
            'portfolio_box_bg_color',
            [
                'label' => __('Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-project-item' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
            ]
        );

        // Porfolio box overlay bg color

        $this->add_control(
            'portfolio_box_overlay_bg_color',
            [
                'label' => __('Overlay Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-project-thumb::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ag-portfolio-item::after' => 'background: {{VALUE}}',
                ],
            ]
        );

        // portfloio box border

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'portfolio_box_border',
                'selector' => '{{WRAPPER}} .ag-portfolio-item, {{WRAPPER}} .ag-portfolio-thumb, {{WRAPPER}} .ag-portfolio-thumb img ',
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
            ]
        );

        // border radius control

        $this->add_control(
            'portfolio_box_border_radius',
            [
                'label' => __('Border Radius', 'ordainit-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ag-portfolio-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                    '{{WRAPPER}} .ag-portfolio-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                    '{{WRAPPER}} .ag-portfolio-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'od_portfolio_box_title_style',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        // Portfolio Title Color Control

        $this->add_control(
            'portfolio_title_color',
            [
                'label' => __('Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-project-content h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ag-portfolio-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .border-line-black' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
                    '{{WRAPPER}} .border-line-white' => 'background-image: linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',

                ],
            ]
        );



        // title typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'portfolio_title_typography',
                'selector' => '{{WRAPPER}} .dt-project-content h4, {{WRAPPER}} .ag-portfolio-title',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'od_portfolio_box_subtitle_style',
            [
                'label' => __('Sub Title', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
            ]
        );

        // Sub Title Color Control

        $this->add_control(
            'portfolio_subtitle_color',
            [
                'label' => __('Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-project-content span' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Sub Title Typography Control

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'portfolio_subtitle_typography',
                'selector' => '{{WRAPPER}} .dt-project-content span',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'od_portfolio_box_button_style',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
            ]
        );

        // Button BG Color Control

        $this->add_control(
            'portfolio_button_bg_color',
            [
                'label' => __('Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-project-arrow a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // Button Icon color Control

        $this->add_control(
            'portfolio_button_icon_color',
            [
                'label' => __('Icon Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-project-arrow a' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'od_portfolio_box_button_style2',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
            ]
        );

        $this->start_controls_tabs(
            'portfolio_button_tabs'
        );

        $this->start_controls_tab(
            'portfolio_button_normal',
            [
                'label' => __('Normal', 'ordainit-toolkit'),
            ]
        );

        // Button BG Color Control

        $this->add_control(
            'portfolio_button_bg_color2',
            [
                'label' => __('Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-portfolio-arrow' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // Button Icon color Control

        $this->add_control(
            'portfolio_button_icon_color2',
            [
                'label' => __('Icon Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-portfolio-arrow' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'portfolio_button_hover',
            [
                'label' => __('Hover', 'ordainit-toolkit'),
            ]
        );

        // Button BG Color Control

        $this->add_control(
            'portfolio_button_bg_color_hover',
            [
                'label' => __('Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-portfolio-arrow:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // Button Icon color Control

        $this->add_control(
            'portfolio_button_icon_color_hover',
            [
                'label' => __('Icon Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-portfolio-arrow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

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

        $portfolio_title = $settings['portfolio_title'];
        $portfolio_subtitle = $settings['portfolio_subtitle'];
        $portfolio_image = $settings['portfolio_image'];
        $portfolio_url = $settings['portfolio_url'];
        $portfolio_fade_animation = $settings['portfolio_fade_animation'];
        $portfolio_delay = $settings['portfolio_delay'];

?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="ag-portfolio-item  p-relative">
                <div class="ag-portfolio-thumb">
                    <img class="w-100" src="<?php echo esc_url($portfolio_image['url'], 'ordainit-toolkit'); ?>" alt="">
                </div>
                <div class="ag-portfolio-content">
                    <h4 class="ag-portfolio-title"><a class="border-line-white" href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($portfolio_title, 'ordainit-toolkit'); ?>
                        </a></h4>
                    <a class="ag-portfolio-arrow" href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>">
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.46 3.59168C15.5538 3.04743 15.1887 2.53015 14.6445 2.43632L5.77531 0.907156C5.23106 0.813318 4.71378 1.17845 4.61994 1.72271C4.52611 2.26696 4.89124 2.78424 5.4355 2.87808L13.3192 4.23733L11.9599 12.121C11.8661 12.6653 12.2312 13.1825 12.7755 13.2764C13.3197 13.3702 13.837 13.0051 13.9308 12.4608L15.46 3.59168ZM1.62942 13.713L15.0512 4.23875L13.8979 2.60481L0.476051 12.079L1.62942 13.713Z" fill="currentcolor" />
                        </svg>
                    </a>
                </div>
            </div>

        <?php else: ?>

            <div class="it-fade-anim" data-fade-from="<?php echo esc_attr($portfolio_fade_animation, 'ordainit-toolkit'); ?>" data-delay="<?php echo esc_attr($portfolio_delay, 'ordainit-toolkit'); ?>">

                <div class="dt-project-item zoom">
                    <div class="dt-project-thumb img-zoom">
                        <img src="<?php echo esc_url($portfolio_image['url'], 'ordainit-toolkit'); ?>" alt="">
                        <div class="dt-project-arrow">
                            <a href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25 0.999999C25 0.447716 24.5523 9.47926e-07 24 -6.53655e-07L15 1.47135e-07C14.4477 -1.90039e-07 14 0.447715 14 1C14 1.55228 14.4477 2 15 2L23 2L23 10C23 10.5523 23.4477 11 24 11C24.5523 11 25 10.5523 25 10L25 0.999999ZM1.70711 24.7071L24.7071 1.70711L23.2929 0.292893L0.292893 23.2929L1.70711 24.7071Z" fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="dt-project-content">
                        <span><?php echo esc_html($portfolio_subtitle, 'ordainit-toolkit'); ?></span>
                        <h4><a class="border-line-black" href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($portfolio_title, 'ordainit-toolkit'); ?></a></h4>
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

$widgets_manager->register(new Od_Porfolio_Box());
