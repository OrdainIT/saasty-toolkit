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
class OD_Single_Service extends Widget_Base
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
        return 'od-single-service';
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
        return __('Single Service', 'ordainit-toolkit');
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();


        // Feature Content
        $this->start_controls_section(
            'od_single_service_content',
            [
                'label' => __('Service Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_single_service_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Service Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_single_service_url',
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
            'od_single_service_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Service Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_single_service_thumbnail_image',
            [
                'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        // Service Bottom Content
        $this->start_controls_section(
            'od_single_service_bottom_content',
            [
                'label' => __('Service Bottom Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_single_service_bottom_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('50%', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_single_service_bottom_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Reduction in Writing Time', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Animation Section
        $this->start_controls_section(
            'od_single_service_animation',
            [
                'label' => __('Service Animation', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_single_service_animation_fade_from',
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
            'od_single_service_animation_delay',
            [
                'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('0.3', 'ordainit-toolkit'),
                'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // content style
        $this->start_controls_section(
            'od_single_service_style',
            [
                'label' => __('Service Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_single_service_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-item' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .pg-service-style .dt-service-item' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .ma-service-style .dt-service-item' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_single_service_bg_hover_color',
            [
                'label' => esc_html__('BG Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-item::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .seo-service-style .dt-service-item::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .ma-service-style .dt-service-item:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_single_service_border_color',
            [
                'label' => esc_html__('Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-item' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .ma-service-style .dt-service-item' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_single_service_border_hover_color',
            [
                'label' => esc_html__('Border Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-service-style .dt-service-item:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_single_service_divider_border_color',
            [
                'label' => esc_html__('Divider Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-service-bottom' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_single_service_divider_hover_border_color',
            [
                'label' => esc_html__('Divider Hover Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-service-style .dt-service-item:hover .seo-service-bottom' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->end_controls_section();


        // content style
        $this->start_controls_section(
            'od_single_service_content_style',
            [
                'label' => __('Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_single_service_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .dt-service-title' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'od_single_service_title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-service-style .dt-service-item:hover .dt-service-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_single_service_title_border_color',
            [
                'label' => esc_html__('Title Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .border-line-white' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
                    '{{WRAPPER}} .border-line-black' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_single_service_title_typography',
                'selector' => '
            {{WRAPPER}} .ss-service-style .dt-service-title,
            {{WRAPPER}} .dt-service-title
        ',
            ]
        );

        $this->add_control(
            'od_single_service_title_span_color',
            [
                'label' => esc_html__('Title Span Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .dt-service-title span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_single_service_title_span_typography',
                'selector' => '{{WRAPPER}} .dt-service-title span',
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_single_service_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .seo-service-style .dt-service-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .dt-service-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_single_service_description_hover_color',
            [
                'label' => esc_html__('Description Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pg-service-style .dt-service-item:hover p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_single_service_description_typography',
                'selector' => '
            {{WRAPPER}} .ss-service-style .dt-service-content p,
            {{WRAPPER}} .seo-service-style .dt-service-content p,
            {{WRAPPER}} .dt-service-content p
        ',
            ]
        );


        $this->end_controls_section();

        // content btn style
        $this->start_controls_section(
            'od_single_service_btn_style',
            [
                'label' => __('Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3']
                ],
            ]
        );

        $this->start_controls_tabs(
            'od_single_service_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_single_service_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkitn'),
            ]
        );


        $this->add_control(
            'od_single_service_btn_style_normal_tab_color',
            [
                'label' => esc_html__('Btn Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dt-service-link' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-service-style .dt-service-link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_single_service_btn_style_normal_tab_bg_color',
            [
                'label' => esc_html__('Btn BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-link' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ma-service-style .dt-service-link' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        //Hover
        $this->start_controls_tab(
            'od_single_service_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkitn'),
            ]
        );


        $this->add_control(
            'od_single_service_btn_style_hover_tab_color',
            [
                'label' => esc_html__('Btn Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-item:hover .dt-service-link' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-service-style .dt-service-link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_single_service_btn_style_hover_tab_bg_color',
            [
                'label' => esc_html__('Btn Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-service-style .dt-service-link::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ma-service-style .dt-service-link::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // Bottom Content style
        $this->start_controls_section(
            'od_single_service_bottom_content_style',
            [
                'label' => __('Bottom Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->add_control(
            'od_single_service_bottom_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-service-bottom span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_single_service_bottom_title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .seo-service-style .dt-service-item:hover .seo-service-bottom span' => 'color: {{VALUE}}',
                ],
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
        $od_single_service_title = $settings['od_single_service_title'];
        $od_single_service_url = $settings['od_single_service_url'];
        $od_single_service_description = $settings['od_single_service_description'];
        $od_single_service_thumbnail_image = $settings['od_single_service_thumbnail_image'];
        $od_single_service_animation_fade_from = $settings['od_single_service_animation_fade_from'];
        $od_single_service_animation_delay = $settings['od_single_service_animation_delay'];
        $od_single_service_bottom_title = $settings['od_single_service_bottom_title'];
        $od_single_service_bottom_description = $settings['od_single_service_bottom_description'];
?>
        <?php if ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="ma-service-style it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_single_service_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_single_service_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="dt-service-item mb-30">
                    <span class="dt-service-icon mb-40 d-block"><img src="<?php echo esc_url($od_single_service_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt=""></span>
                    <div class="dt-service-content">
                        <h4 class="dt-service-title mb-25">
                            <a class="border-line-black"
                                href="<?php echo esc_url($od_single_service_url['url'], 'ordainit-toolkit'); ?>">
                                <?php echo od_kses($od_single_service_title, 'ordainit-toolkit'); ?>
                            </a>
                        </h4>
                        <p class="mb-35"><?php echo od_kses($od_single_service_description, 'ordainit-toolkit'); ?></p>
                        <div class="dt-service-link">
                            <a class="dt-service-link" href="<?php echo esc_url($od_single_service_url['url'], 'ordainit-toolkit'); ?>">
                                <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7709 4.44699C19.7706 4.44676 19.7704 4.44648 19.7702 4.44625L15.688 0.383747C15.3821 0.0794115 14.8875 0.0805441 14.5831 0.386403C14.2787 0.692224 14.2799 1.18687 14.5857 1.49125L17.3265 4.21875H0.78125C0.349766 4.21875 0 4.56851 0 5C0 5.43148 0.349766 5.78125 0.78125 5.78125H17.3264L14.5857 8.50875C14.2799 8.81312 14.2788 9.30777 14.5831 9.61359C14.8875 9.91949 15.3822 9.92054 15.688 9.61625L19.7702 5.55375C19.7704 5.55351 19.7706 5.55324 19.7709 5.55301C20.0769 5.24761 20.0759 4.75136 19.7709 4.44699Z" fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="seo-service-style pg-service-style  it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_single_service_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_single_service_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="dt-service-item mb-30">
                    <span class="dt-service-icon mb-35 d-block">
                        <img src="<?php echo esc_url($od_single_service_thumbnail_image['url'], 'ordainit-toolkit'); ?>"
                            alt="">
                    </span>
                    <div class="dt-service-content">
                        <h4 class="dt-service-title mb-20">
                            <a class="border-line-white"
                                href="<?php echo esc_url($od_single_service_url['url'], 'ordainit-toolkit'); ?>">
                                <?php echo od_kses($od_single_service_title, 'ordainit-toolkit'); ?>
                            </a>
                        </h4>
                        <p class="mb-30">
                            <?php echo od_kses($od_single_service_description, 'ordainit-toolkit'); ?>
                        </p>
                        <div class="seo-service-bottom">
                            <span><?php echo esc_html($od_single_service_bottom_title, 'ordainit-toolkit'); ?></span>
                            <p class="mb-0"><?php echo od_kses($od_single_service_bottom_description, 'ordainit-toolkit'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="ss-service-style it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_single_service_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_single_service_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="dt-service-item mb-35">
                    <div>
                        <span class="dt-service-icon mb-40 d-block">
                            <img src="<?php echo esc_url($od_single_service_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                        </span>
                        <div class="dt-service-content">
                            <h4 class="dt-service-title mb-25">
                                <a class="border-line-white" href="<?php echo esc_url($od_single_service_url['url'], 'ordainit-toolkit'); ?>">
                                    <?php echo od_kses($od_single_service_title, 'ordainit-toolkit'); ?>
                                </a>
                            </h4>
                            <p class="mb-35">
                                <?php echo od_kses($od_single_service_description, 'ordainit-toolkit'); ?>
                            </p>
                            <div class="dt-service-link">
                                <a class="dt-service-link"
                                    href="<?php echo esc_url($od_single_service_url['url'], 'ordainit-toolkit'); ?>">
                                    <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.7709 4.44699C19.7706 4.44676 19.7704 4.44648 19.7702 4.44625L15.688 0.383747C15.3821 0.0794115 14.8875 0.0805441 14.5831 0.386403C14.2787 0.692224 14.2799 1.18687 14.5857 1.49125L17.3265 4.21875H0.78125C0.349766 4.21875 0 4.56851 0 5C0 5.43148 0.349766 5.78125 0.78125 5.78125H17.3264L14.5857 8.50875C14.2799 8.81312 14.2788 9.30777 14.5831 9.61359C14.8875 9.91949 15.3822 9.92054 15.688 9.61625L19.7702 5.55375C19.7704 5.55351 19.7706 5.55324 19.7709 5.55301C20.0769 5.24761 20.0759 4.75136 19.7709 4.44699Z" fill="currentcolor" />
                                    </svg>
                                </a>
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

$widgets_manager->register(new OD_Single_Service());
