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
class OD_Feature_Box extends Widget_Base
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
        return 'od-feature-box';
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
        return __('Feature Box', 'ordainit-toolkit');
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
                    'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
                    'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();


        // Feature BG Content
        $this->start_controls_section(
            'od_feature_bg_content',
            [
                'label' => __('Feature BG', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_feature_background_image',
            [
                'label' => esc_html__('Choose BG Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Feature Content
        $this->start_controls_section(
            'od_feature_content',
            [
                'label' => __('Feature Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_feature_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Feature Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_feature_url',
            [
                'label' => __('URL', 'ordainit-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'od_feature_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Feature Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_feature_thumbnail_image',
            [
                'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Content Btn Section
        $this->start_controls_section(
            'od_feature_btn',
            [
                'label' => __('Feature Button', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_feature_btn_text',
            [
                'label' => __('Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type button text here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_feature_btn_url',
            [
                'label' => __('Button URL', 'ordainit-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'od_feature_btn_icon_switcher',
            [
                'label' => esc_html__('Show Icon', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();


        // Animation Section
        $this->start_controls_section(
            'od_feature_animation',
            [
                'label' => __('Feature Animation', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_feature_animation_fade_from',
            [
                'label' => __('Fade From', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'top' => __('Top', 'ordainit-toolkit'),
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'right' => __('Right', 'ordainit-toolkit'),
                ],
                'default' => 'top',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_feature_animation_delay',
            [
                'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('0.3', 'ordainit-toolkit'),
                'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Style Starts


        // feture content style
        $this->start_controls_section(
            'od_feature_content_style',
            [
                'label' => __('Feature Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_feature_bg_color',
            [
                'label' => esc_html__('Feature BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-feature-item' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .dt-feature-item' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ss-feature-item::before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
                ],
            ]
        );

        $this->add_control(
            'od_feature_hover_bg_color',
            [
                'label' => esc_html__('Feature Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-feature-item:hover::before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-4']
                ],
            ]
        );

        $this->add_control(
            'od_feature_border_color',
            [
                'label' => esc_html__('Feature Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-feature-item' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
                ],
            ]
        );

        $this->add_control(
            'od_feature_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-feature-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .dt-feature-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-feature-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-feature-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_feature_title_border_color',
            [
                'label' => esc_html__('Title Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .border-line-black' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
                    '{{WRAPPER}} .border-line-white' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_feature_title_typography',
                'selector' => '
            {{WRAPPER}} .it-feature-title,
            {{WRAPPER}} .dt-feature-title,
            {{WRAPPER}} .pg-feature-title,
            {{WRAPPER}} .ss-feature-title
        ',
            ]
        );

        $this->add_control(
            'od_feature_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pg-feature-item p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ss-feature-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_feature_description_typography',
                'selector' => '
            {{WRAPPER}} p,
            {{WRAPPER}} .pg-feature-item p,
            {{WRAPPER}} .ss-feature-content p
        ',
            ]
        );

        $this->end_controls_section();


        // feature content btn style
        $this->start_controls_section(
            'od_feature_btn_style',
            [
                'label' => __('Feature Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );


        $this->start_controls_tabs(
            'od_feature_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_feature_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_feature_btn_style_normal_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-feature' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'od_feature_btn_style_normal_circle_bg_color',
            [
                'label' => esc_html__('Circle BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-feature::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_feature_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_feature_btn_style_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-feature:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'od_feature_btn_style_hover_circle_bg_color',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-feature::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'hr_2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_feature_btn_typography',
                'selector' => '{{WRAPPER}} .it-btn-feature',
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
        $od_feature_title = $settings['od_feature_title'];
        $od_feature_url = $settings['od_feature_url'];
        $od_feature_description = $settings['od_feature_description'];
        $od_feature_thumbnail_image = $settings['od_feature_thumbnail_image'];
        $od_feature_animation_fade_from = $settings['od_feature_animation_fade_from'];
        $od_feature_animation_delay = $settings['od_feature_animation_delay'];
        $od_feature_btn_text = $settings['od_feature_btn_text'];
        $od_feature_btn_url = $settings['od_feature_btn_url'];
        $od_feature_btn_icon_switcher = $settings['od_feature_btn_icon_switcher'];
        $od_feature_background_image = $settings['od_feature_background_image'];
?>


        <?php if ($settings['od_design_style']  == 'layout-4'): ?>

            <div class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="ss-feature-item-wrap">
                    <div class="ss-feature-item text-center">
                        <div>
                            <div class="ss-feature-icon mb-35">
                                <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="#">
                            </div>
                            <div class="ss-feature-content">
                                <h4 class="ss-feature-title mb-20">
                                    <a class="border-line-white"
                                        href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                                        <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                                    </a>
                                </h4>
                                <p class="mb-0"><?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="pg-feature-item section-bg text-center it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                style="background-image: url(<?php echo esc_url($od_feature_background_image['url'], 'ordainit-toolkit'); ?>);">
                <span class="pg-feature-icon">
                    <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                </span>
                <h4 class="pg-feature-title">
                    <a class="border-line-white"
                        href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                        <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                    </a>
                </h4>
                <p><?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?></p>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>
            <div
                class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>">
                <div class="dt-feature-item mb-30 text-center">
                    <span class="dt-feature-icon mb-25 d-block">
                        <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="" />
                    </span>
                    <div class="dt-feature-content">
                        <h4 class="dt-feature-title mb-20">
                            <a
                                class="border-line-black"
                                href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                                <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                            </a>
                        </h4>
                        <p class="mb-20">
                            <?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?>
                        </p>
                        <?php if (!empty($od_feature_btn_text)): ?>
                            <div class="dt-feature-link">
                                <a class="it-btn-feature"
                                    href="<?php echo esc_url($od_feature_btn_url['url'], 'ordainit-toolkit'); ?>">
                                    <?php echo od_kses($od_feature_btn_text, 'ordainit-toolkit'); ?>
                                    <?php if (!empty($od_feature_btn_icon_switcher)):  ?>
                                        <svg
                                            width="22"
                                            height="12"
                                            viewBox="0 0 22 12"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.5303 6.53033C21.8232 6.23744 21.8232 5.76256 21.5303 5.46967L16.7574 0.696699C16.4645 0.403806 15.9896 0.403806 15.6967 0.696699C15.4038 0.989593 15.4038 1.46447 15.6967 1.75736L19.9393 6L15.6967 10.2426C15.4038 10.5355 15.4038 11.0104 15.6967 11.3033C15.9896 11.5962 16.4645 11.5962 16.7574 11.3033L21.5303 6.53033ZM0 6.75H21V5.25H0V6.75Z"
                                                fill="currentcolor" />
                                        </svg>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>

            <div class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_feature_animation_fade_from, 'ordainit-toolkit'); ?>">
                <div class="it-feature-item text-center">
                    <div class="it-feature-icon mb-25">
                        <img src="<?php echo esc_url($od_feature_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                    </div>
                    <h4 class="it-feature-title mb-20">
                        <a class="border-line-black"
                            href="<?php echo esc_url($od_feature_url['url'], 'ordainit-toolkit'); ?>">
                            <?php echo od_kses($od_feature_title, 'ordainit-toolkit'); ?>
                        </a>
                    </h4>
                    <p class="mb-0"><?php echo od_kses($od_feature_description, 'ordainit-toolkit') ?></p>
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

$widgets_manager->register(new OD_Feature_Box());
