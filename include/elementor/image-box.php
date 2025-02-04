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
class OD_Image_Box extends Widget_Base
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
        return 'od-image-box';
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
        return __('Image Box', 'ordainit-toolkit');
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

        // Image Box Content
        $this->start_controls_section(
            'od_image_box_content',
            [
                'label' => __('Image Box Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_image_box_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Feature Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_image_box_number',
            [
                'label' => __('Number', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('01', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Number here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_design_style' => ['layout-3'],
                ],
            ]
        );

        $this->add_control(
            'od_image_box_url',
            [
                'label' => __('URL', 'ordainit-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ordainit-toolkit'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3'],
                ],
            ]
        );

        $this->add_control(
            'od_image_box_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Feature Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_image_box_thumbnail_image',
            [
                'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Animation Section
        $this->start_controls_section(
            'od_image_box_animation',
            [
                'label' => __('Image Box Animation', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_image_box_animation_fade_from',
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
            'od_image_box_animation_delay',
            [
                'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('0.3', 'ordainit-toolkit'),
                'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // style
        $this->start_controls_section(
            'od_image_box_style',
            [
                'label' => __('Image Box Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_image_box_bg_color',
            [
                'label' => esc_html__('Feature BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-service-style .ai-service-item::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .cr-platform-item' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2'],
                ],
            ]
        );


        $this->add_control(
            'od_image_box_border_gradient_start_color',
            [
                'label' => esc_html__('Border Gradient Start Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0BCF77',
                'selectors' => [
                    '{{WRAPPER}} .ag-service-style .ai-service-item::after' => 'background: linear-gradient(to right, {{VALUE}} 0%, {{od_image_box_border_gradient_end_color.VALUE}} 100%);',
                ],
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
            ]
        );
        $this->add_control(
            'od_image_box_border_gradient_end_color',
            [
                'label' => esc_html__('Border Gradient End Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#69D619',
                'selectors' => [
                    '{{WRAPPER}} .ag-service-style .ai-service-item::after' => 'background: linear-gradient(to right, {{od_image_box_border_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);',
                ],
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
            ]
        );

        $this->add_control(
            'od_image_box_border_color',
            [
                'label' => esc_html__('Feature Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cr-platform-item' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .ai-service-item' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-2', 'layout-3'],
                ],
            ]
        );

        $this->add_control(
            'od_image_box_border_hover_color',
            [
                'label' => esc_html__('Feature Border Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ai-service-item:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => 'layout-3',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'od_image_box_content_style',
            [
                'label' => __('Image Box Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_image_box_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-service-style .dt-service-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-platform-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .dt-service-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_image_box_title_border_color',
            [
                'label' => esc_html__('Title Border Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .border-line-white' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
                    '{{WRAPPER}} .border-line-black' => 'background-image :linear-gradient({{VALUE}}, {{VALUE}}), linear-gradient({{VALUE}}, {{VALUE}});',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-3'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_image_box_title_typography',
                'selector' => '
            {{WRAPPER}} .ag-service-style .dt-service-title,
            {{WRAPPER}} .cr-platform-title,
            {{WRAPPER}} .pg-service-style .dt-service-title
        ',
            ]
        );

        $this->add_control(
            'od_image_box_number_color',
            [
                'label' => esc_html__('Number Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ai-service-number' => '-webkit-text-stroke: 1px {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => 'layout-3',
                ],
            ]
        );

        $this->add_control(
            'od_image_box_number_hover_color',
            [
                'label' => esc_html__('Number Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ai-service-item:hover .ai-service-number' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => 'layout-3',
                ],
            ]
        );

        $this->add_control(
            'od_image_box_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-service-style .ai-service-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .cr-platform-item p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ai-service-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_image_box_description_typography',
                'selector' => '
            {{WRAPPER}} .ag-service-style .ai-service-content p,
            {{WRAPPER}} .cr-platform-item p,
            {{WRAPPER}} .ai-service-content p
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
        $od_image_box_title = $settings['od_image_box_title'];
        $od_image_box_url = $settings['od_image_box_url'];
        $od_image_box_description = $settings['od_image_box_description'];
        $od_image_box_animation_fade_from = $settings['od_image_box_animation_fade_from'];
        $od_image_box_animation_delay = $settings['od_image_box_animation_delay'];
        $od_image_box_thumbnail_image = $settings['od_image_box_thumbnail_image'];
        $od_image_box_number = $settings['od_image_box_number'];
?>


        <?php if ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="it-fade-anim img-box-style-3"
                data-fade-from="<?php echo esc_attr($od_image_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_image_box_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="ai-service-item p-relative z-index-1 mb-30">
                    <span class="ai-service-icon mb-30 d-block">
                        <img src="<?php echo esc_url($od_image_box_thumbnail_image['url'], 'ordainit-toolkit'); ?>"
                            alt="image">
                    </span>
                    <i class="ai-service-number"><?php echo esc_html($od_image_box_number, 'ordainit-toolkit') ?></i>
                    <div class="ai-service-content">
                        <h4 class="dt-service-title mb-25">
                            <a class="border-line-black"
                                href="<?php echo esc_url($od_image_box_url['url'], 'ordainit-toolkit'); ?>">
                                <?php echo od_kses($od_image_box_title, 'ordainit-toolkit'); ?>
                            </a>
                        </h4>
                        <p class="mb-0">
                            <?php echo od_kses($od_image_box_description, 'ordainit-toolkit'); ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_image_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_image_box_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="cr-platform-item text-center mb-30">
                    <span class="cr-platform-icon d-block mb-35">
                        <img src="<?php echo esc_url($od_image_box_thumbnail_image['url'], 'ordainit-toolkit'); ?>"
                            alt="image">
                    </span>
                    <h4 class="cr-platform-title mb-25">
                        <?php echo od_kses($od_image_box_title, 'ordainit-toolkit'); ?>
                    </h4>
                    <p>
                        <?php echo od_kses($od_image_box_description, 'ordainit-toolkit'); ?>
                    </p>
                </div>
            </div>

        <?php else: ?>

            <div class="ag-service-style">
                <div class="it-fade-anim"
                    data-fade-from="<?php echo esc_attr($od_image_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                    data-delay="<?php echo esc_attr($od_image_box_animation_delay, 'ordainit-toolkit'); ?>">
                    <div class="ai-service-item p-relative z-index-1 mb-30">
                        <span class="ai-service-icon mb-55 d-block">
                            <img src="<?php echo esc_url($od_image_box_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="#">
                        </span>
                        <div class="ai-service-content">
                            <h4 class="dt-service-title mb-25">
                                <a class="border-line-white"
                                    href="<?php echo esc_url($od_image_box_url['url'], 'ordainit-toolkit'); ?>">
                                    <?php echo od_kses($od_image_box_title, 'ordainit-toolkit'); ?>
                                </a>
                            </h4>
                            <p class="mb-0"><?php echo od_kses($od_image_box_description, 'ordainit-toolkit'); ?></p>
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

$widgets_manager->register(new OD_Image_Box());
