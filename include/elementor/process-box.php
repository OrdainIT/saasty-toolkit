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
class OD_Process_Box extends Widget_Base
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
        return 'od-process-box';
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
        return __('Process Box', 'ordainit-toolkit');
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

        // Process
        $this->start_controls_section(
            'od_process_box_initial_content',
            [
                'label' => __('Process Box', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_process_background_image',
            [
                'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_process_margin',
            [
                'label' => esc_html__('Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .pg-process-area.seo-process-style' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_process_padding',
            [
                'label' => esc_html__('Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .pg-process-area.seo-process-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Heading Content
        $this->start_controls_section(
            'od_process_heading_content',
            [
                'label' => __('Process Heading Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_process_heading_title',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Od Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_process_heading_subtitle_switcher',
            [
                'label' => esc_html__('Show Subtitle', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_process_heading_subtitle',
            [
                'label' => esc_html__('Subtitle', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Od Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_process_heading_subtitle_switcher' => 'yes'
                ],
            ]
        );

        $this->end_controls_section();

        // Process Steps
        $this->start_controls_section(
            'od_process_content',
            [
                'label' => __('Process Box Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_process_steps',
            [
                'label' => esc_html__('Process Steps', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_process_step_icon',
                        'label' => esc_html__('Step Icon', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'od_process_step_title',
                        'label' => esc_html__('Step Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Step Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_process_step_description',
                        'label' => esc_html__('Step Description', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Step description goes here.', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_process_step_button_text',
                        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                        'description' => esc_html__('It will work only for layout -1'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Step X', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_process_step_button_link',
                        'label' => esc_html__('Button Link', 'ordainit-toolkit'),
                        'description' => esc_html__('It will work only for layout -1'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
                        'default' => [
                            'url' => '#',
                        ],
                    ],
                ],
                'default' => [
                    [
                        'od_process_step_title' => esc_html__('Download App', 'ordainit-toolkit'),
                        'od_process_step_description' => esc_html__('Lacinia eleifend letius parturient a aliquam ultrices interdum mollis ut. Interdum', 'ordainit-toolkit'),
                        'od_process_step_button_text' => esc_html__('Step 1', 'ordainit-toolkit'),
                        'od_process_step_button_link' => ['url' => '#'],
                    ],
                    [
                        'od_process_step_title' => esc_html__('Register Account', 'ordainit-toolkit'),
                        'od_process_step_description' => esc_html__('Lacinia eleifend letius parturient a aliquam ultrices interdum mollis ut. Interdum', 'ordainit-toolkit'),
                        'od_process_step_button_text' => esc_html__('Step 2', 'ordainit-toolkit'),
                        'od_process_step_button_link' => ['url' => '#'],
                    ],
                    [
                        'od_process_step_title' => esc_html__('Choose Payment', 'ordainit-toolkit'),
                        'od_process_step_description' => esc_html__('Lacinia eleifend letius parturient a aliquam ultrices interdum mollis ut. Interdum', 'ordainit-toolkit'),
                        'od_process_step_button_text' => esc_html__('Step 3', 'ordainit-toolkit'),
                        'od_process_step_button_link' => ['url' => '#'],
                    ],
                    [
                        'od_process_step_title' => esc_html__('Enjoy Payment', 'ordainit-toolkit'),
                        'od_process_step_description' => esc_html__('Lacinia eleifend letius parturient a aliquam ultrices interdum mollis ut. Interdum', 'ordainit-toolkit'),
                        'od_process_step_button_text' => esc_html__('Step 4', 'ordainit-toolkit'),
                        'od_process_step_button_link' => ['url' => '#'],
                    ],
                ],
                'title_field' => '{{{ od_process_step_title }}}',
            ]
        );

        $this->end_controls_section();


        // Process Box Style
        $this->start_controls_section(
            'od_process_heading_title_style',
            [
                'label' => __('Process Heading Title Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_process_heading_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-section-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .seo-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_process_heading_title_typography',
                'selector' => '
            {{WRAPPER}} .pg-section-title,
            {{WRAPPER}} .seo-section-title
        ',
            ]
        );

        $this->add_control(
            'od_process_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 55,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pg-section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .seo-section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_process_heading_title_padding',
            [
                'label' => esc_html__('Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .pg-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .seo-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Process Box Subtitle Style
        $this->start_controls_section(
            'od_process_heading_subtitle title_style',
            [
                'label' => __('Process Heading Subtitle Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2'],
                    'od_process_heading_subtitle_switcher' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'od_process_heading_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-section-subtitle' => 'color: {{VALUE}}',

                ],
            ]
        );

        $this->add_control(
            'od_process_heading_subtitle_bg_color',
            [
                'label' => esc_html__('Subtitle BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-process-style .pg-section-subtitle' => 'background-color: {{VALUE}}',

                ],
            ]
        );

        $this->add_control(
            'od_process_heading_subtitle_border_color',
            [
                'label' => esc_html__('Subtitle Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-process-style .pg-section-subtitle' => 'border-color: {{VALUE}}',

                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_process_heading_subtitle_typography',
                'selector' => '{{WRAPPER}} .pg-section-subtitle',
            ]
        );

        $this->add_control(
            'od_process_heading_subtitle_margin',
            [
                'label' => esc_html__('Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .pg-section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_process_heading_subtitle_padding',
            [
                'label' => esc_html__('Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .pg-section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Process Box Style
        $this->start_controls_section(
            'od_process_style',
            [
                'label' => __('Process Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_process_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-process-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_process_title_typography',
                'selector' => '{{WRAPPER}} .pg-process-title',
            ]
        );

        $this->add_control(
            'od_process_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-process-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_process_description_typography',
                'selector' => '{{WRAPPER}} .pg-process-content p',
            ]
        );

        $this->add_control(
            'od_process_icon_bg_color',
            [
                'label' => esc_html__('Border BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-process-border::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .pg-process-icon::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .seo-process-style .pg-process-icon::before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_process_icon_border_color',
            [
                'label' => esc_html__('Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-process-icon' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .pg-process-icon::after' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .seo-process-style .pg-process-border::after' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .seo-process-style .pg-process-icon' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .seo-process-style .pg-process-icon::after' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Process Box Button Style
        $this->start_controls_section(
            'od_process_btn_style',
            [
                'label' => __('Process Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->start_controls_tabs(
            'od_process_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_process_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_process_btn_style_normal_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-btn.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'od_process_btn_style_normal_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-btn.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_process_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_process_btn_style_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-btn.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'od_process_btn_style_hover_bg_color',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-btn::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_process_btn_typography',
                'selector' => '{{WRAPPER}} .pg-btn',
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
        $od_process_steps = $settings['od_process_steps'];
        $od_process_heading_title = $settings['od_process_heading_title'];
        $od_process_heading_subtitle_switcher = $settings['od_process_heading_subtitle_switcher'];
        $od_process_heading_subtitle = $settings['od_process_heading_subtitle'];
        $od_process_background_image = $settings['od_process_background_image'];
?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="pg-process-area seo-process-style section-bg p-relative"
                style="background-image: url('<?php echo esc_url($od_process_background_image['url'], 'ordainit-toolkit'); ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="pg-section-title-box text-center">
                                <?php if (!empty($od_process_heading_subtitle_switcher)) : ?>
                                    <span class="pg-section-subtitle white-style it-fade-anim" data-fade-from="top" data-delay=".3">
                                        <?php echo esc_html($od_process_heading_subtitle, 'ordainit-toolkit'); ?>
                                    </span>
                                <?php endif; ?>
                                <div class="it_text_reveal_anim"></div>
                                <h4 class="seo-section-title it_text_reveal_anim"><?php echo od_kses($od_process_heading_title, 'ordainit-toolkit'); ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="pg-process-border">
                        <div class="row">

                            <?php foreach ($od_process_steps as $od_process_step): ?>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="pg-process-item text-center mb-30">
                                        <div class="pg-process-icon">
                                            <img src="<?php echo esc_url($od_process_step['od_process_step_icon']['url'], 'ordainit-toolkit'); ?>"
                                                alt="<?php echo esc_attr($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?>">
                                        </div>
                                        <div class="pg-process-content">
                                            <h4 class="pg-process-title"><?php echo od_kses($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?>
                                            </h4>
                                            <p><?php echo od_kses($od_process_step['od_process_step_description'], 'ordainit-toolkit'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>



        <?php else: ?>

            <div class="pg-process-area pg-process-border">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="pg-section-title-box text-center">
                                <h4 class="pg-section-title it-char-animation">
                                    <?php echo od_kses($od_process_heading_title, 'ordainit-toolkit'); ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($od_process_steps as $od_process_step): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="pg-process-item text-center mb-30">
                                    <div class="pg-process-icon">
                                        <img src="<?php echo esc_url($od_process_step['od_process_step_icon']['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_attr($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?>">
                                    </div>
                                    <div class="pg-process-content">
                                        <h4 class="pg-process-title"><?php echo od_kses($od_process_step['od_process_step_title'], 'ordainit-toolkit'); ?></h4>
                                        <p><?php echo od_kses($od_process_step['od_process_step_description'], 'ordainit-toolkit'); ?></p>
                                        <a class="pg-btn black-bg"
                                            href="<?php echo esc_url($od_process_step['od_process_step_button_link']['url'], 'ordainit-toolkit'); ?>">
                                            <?php echo esc_html($od_process_step['od_process_step_button_text'], 'ordainit-toolkit'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

$widgets_manager->register(new OD_Process_Box());
