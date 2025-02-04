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
class OD_Card_Box extends Widget_Base
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
        return 'od-card-box';
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
        return __('Card Box', 'ordainit-toolkit');
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


        // Content
        $this->start_controls_section(
            'od_card_box_content',
            [
                'label' => __('Card Box Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_card_box_title',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Od Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_card_box_description',
            [
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Od Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_card_box_number',
            [
                'label' => esc_html__('Number', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('01', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type work number here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_card_box_icon',
            [
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => od_kses('', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Put icon here here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );



        $this->end_controls_section();

        // Animation Section
        $this->start_controls_section(
            'od_card_box_animation',
            [
                'label' => __('Animation', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_card_box_animation_fade_from',
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
            'od_card_box_animation_delay',
            [
                'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('0.3', 'ordainit-toolkit'),
                'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Card Box Style
        $this->start_controls_section(
            'od_card_box_style',
            [
                'label' => __('Card Box Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_card_box_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-work-item-box::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .ss-work-item-box::after' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_card_box_bg_hover_color',
            [
                'label' => esc_html__('BG Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-work-item-box:hover::before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


        // Card Box Style
        $this->start_controls_section(
            'od_card_box_content_style',
            [
                'label' => __('Card Box Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_card_box_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-work-item-content span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-marketing-2-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_card_box_title_typography',
                'selector' => '{{WRAPPER}} .ss-work-item-content span, {{WRAPPER}} .ma-marketing-2-title',
            ]
        );

        $this->add_control(
            'od_card_box_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-work-item-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ma-marketing-2-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_card_box_description_typography',
                'selector' => '{{WRAPPER}} .ss-work-item-content p, {{WRAPPER}} .ma-marketing-2-content p',
            ]
        );

        $this->add_control(
            'od_card_box_number_color',
            [
                'label' => esc_html__('Number Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-work-item-number' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'od_card_box_icon_style',
            [
                'label' => __('Icon Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-2']
                ],
            ]
        );

        $this->start_controls_tabs(
            'od_card_box_icon_style_tabs'
        );

        $this->start_controls_tab(
            'od_card_box_icon_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_card_box_icon_style_normal_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-marketing-2-icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'od_card_box_icon_style_normal_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-marketing-2-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_card_box_icon_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_card_box_icon_style_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-marketing-2-content-box:hover .ma-marketing-2-icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'od_card_box_icon_style_hover_bg_color',
            [
                'label' => esc_html__('Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-marketing-2-content-box:hover .ma-marketing-2-icon' => 'background-color: {{VALUE}};',
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
        $od_card_box_title = $settings['od_card_box_title'];
        $od_card_box_description = $settings['od_card_box_description'];
        $od_card_box_number = $settings['od_card_box_number'];
        $od_card_box_animation_fade_from = $settings['od_card_box_animation_fade_from'];
        $od_card_box_animation_delay = $settings['od_card_box_animation_delay'];
        $od_card_box_icon = $settings['od_card_box_icon'];
?>


        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="ma-marketing-2-content-box d-inline-flex align-items-start">
                <span class="ma-marketing-2-icon">
                    <?php echo od_kses($od_card_box_icon, 'ordainit-toolkit'); ?>

                </span>
                <div class="ma-marketing-2-content">
                    <h4 class="ma-marketing-2-title"><?php echo esc_html($od_card_box_title, 'ordainit-toolkit'); ?></h4>
                    <p><?php echo od_kses($od_card_box_description, 'ordainit-toolkit'); ?></p>
                </div>
            </div>

        <?php else: ?>


            <div class="ss-work-item-box it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_card_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_card_box_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="z-index-1 d-flex align-items-center">
                    <h5 class="ss-work-item-number"><?php echo esc_html($od_card_box_number, 'ordainit-toolkit'); ?></h5>
                    <div class="ss-work-item-content">
                        <span><?php echo esc_html($od_card_box_title, 'ordainit-toolkit'); ?></span>
                        <p><?php echo od_kses($od_card_box_description, 'ordainit-toolkit'); ?></p>
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

$widgets_manager->register(new OD_Card_Box());
