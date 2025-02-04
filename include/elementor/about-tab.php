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

        $this->start_controls_section(
            'od_about_tab_content',
            [
                'label' => esc_html__('Tab Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_about_tab_lists',
            [
                'label' => esc_html__('Tabs List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_about_tab_list_title',
                        'label' => esc_html__('Tab Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('OD Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_about_tab_list_description',
                        'label' => esc_html__('Tab Description', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('OD Description', 'ordainit-toolkit'),
                    ],
                    [
                        'name' => 'od_about_tab_list_is_active',
                        'label' => esc_html__('Active Tab', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'ordainit-toolkit'),
                        'label_off' => esc_html__('No', 'ordainit-toolkit'),
                        'return_value' => 'yes',
                        'default' => '',
                    ],
                ],
                'default' => [
                    [
                        'od_about_tab_list_title' => esc_html__('Mission', 'ordainit-toolkit'),
                        'od_about_tab_list_description' => esc_html__('At the heart of our mission is a commitment to...', 'ordainit-toolkit'),
                        'od_about_tab_list_is_active' => 'yes',
                    ],
                    [
                        'od_about_tab_list_title' => esc_html__('Vision', 'ordainit-toolkit'),
                        'od_about_tab_list_description' => esc_html__('Our vision focuses on empowering businesses through...', 'ordainit-toolkit'),
                    ],
                    [
                        'od_about_tab_list_title' => esc_html__('Values', 'ordainit-toolkit'),
                        'od_about_tab_list_description' => esc_html__('We prioritize integrity, innovation, and collaboration...', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_about_tab_list_title }}}',
            ]
        );

        $this->end_controls_section();

        // About Tab Style
        $this->start_controls_section(
            'od_about_tab_style',
            [
                'label' => __('About Tab Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_about_tab_margin',
            [
                'label' => esc_html__('Tab Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 30,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'od_about_tab_btn_heading',
            [
                'label' => esc_html__('Tab Button Style', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->start_controls_tabs(
            'od_about_tab_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_about_tab_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_about_tab_btn_style_normal_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'od_about_tab_btn_style_normal_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_about_tab_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover/Active', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_about_tab_btn_style_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-button ul li button.active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .it-about-details-nav-button ul li button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'od_about_tab_btn_style_hover_bg_color',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-button ul li button.active' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .it-about-details-nav-button ul li button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_about_tab_btn_typography',
                'selector' => '{{WRAPPER}} .it-about-details-nav-button ul li button',
            ]
        );

        $this->add_control(
            'od_about_tab_btn_margin',
            [
                'label' => esc_html__('Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_about_tab_btn_padding',
            [
                'label' => esc_html__('Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-button ul li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'od_about_tab_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-details-nav-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_about_tab_description_typography',
                'selector' => '{{WRAPPER}} .it-about-details-nav-content p',
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
