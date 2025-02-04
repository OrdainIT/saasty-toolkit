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
class OD_Button_Gradient extends Widget_Base
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
        return 'od-button-gradient';
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
        return __('Button Gradient', 'ordainit-toolkit');
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

        // Button Content Section
        $this->start_controls_section(
            'od_btn_content',
            [
                'label' => __('Button Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_btn_text',
            [
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Button', 'ordainit-toolkit'),
                'title' => esc_html__('Enter button text', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_btn_link',
            [
                'label' => esc_html__('Button link', 'ordainit-toolkit'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('htods://your-link.com', 'ordainit-toolkit'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'od_btn_link_type' => '1',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'od_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => od_get_all_pages(),
                'condition' => [
                    'od_btn_link_type' => '2',
                ]
            ]
        );


        $this->end_controls_section();

        // Button Animation Section
        $this->start_controls_section(
            'od_btn_animation',
            [
                'label' => __('Button Animation', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_btn_animation_fade_from',
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
            'od_btn_animation_ease',
            [
                'label' => __('Ease', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => __('None', 'ordainit-toolkit'),
                    'bounce' => __('Bounce', 'ordainit-toolkit'),

                ],
                'default' => 'bounce',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_btn_animation_delay',
            [
                'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('0.3', 'ordainit-toolkit'),
                'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style Section Starts
        $this->start_controls_section(
            'od_btn_style',
            [
                'label' => __('Button Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'od_btn_margin',
            [
                'label' => esc_html__('Button Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => [
                    'top' => '20',
                    'right' => '30',
                    'bottom' => '20',
                    'left' => '30',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'od_btn_padding',
            [
                'label' => esc_html__('Button Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => [
                    'top' => '20',
                    'right' => '30',
                    'bottom' => '20',
                    'left' => '30',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .ag-btn',
            ]
        );

        $this->add_control(
            'od_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'default' => [
                    'top' => '30',
                    'right' => '30',
                    'bottom' => '30',
                    'left' => '30',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->start_controls_tabs(
            'od_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_btn_style_normal_color',
            [
                'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_btn_style_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->add_control(
            'hr_3',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Button Gradient BG

        $this->add_control(
            'od_btn_bg_gradient_color_1',
            [
                'label' => esc_html__('Button Gradient Bg Color 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{VALUE}}, {{od_btn_bg_gradient_color_2.VALUE}}, {{od_btn_bg_gradient_color_3.VALUE}}, {{od_btn_bg_gradient_color_4.VALUE}});',
                ],
            ]
        );

        $this->add_control(
            'od_btn_bg_gradient_color_2',
            [
                'label' => esc_html__('Button Gradient Bg Color 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_btn_bg_gradient_color_1.VALUE}}, {{VALUE}} , {{od_btn_bg_gradient_color_3.VALUE}}, {{od_btn_bg_gradient_color_4.VALUE}});',
                ],
            ]
        );

        $this->add_control(
            'od_btn_bg_gradient_color_3',
            [
                'label' => esc_html__('Button Gradient Bg Color 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_btn_bg_gradient_color_1.VALUE}}, {{od_btn_bg_gradient_color_2.VALUE}} ,{{VALUE}}, {{od_btn_bg_gradient_color_4.VALUE}});',
                ],
            ]
        );
        $this->add_control(
            'od_btn_bg_gradient_color_4',
            [
                'label' => esc_html__('Button Gradient Bg Color 4', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-btn' => 'background-image: linear-gradient(90deg, {{od_btn_bg_gradient_color_1.VALUE}}, {{od_btn_bg_gradient_color_2.VALUE}} , {{od_btn_bg_gradient_color_3.VALUE}}, {{VALUE}});',
                ],
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_button_typography',
                'selector' => '{{WRAPPER}} .ag-btn',
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
        $od_btn_text = $settings['od_btn_text'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];
        $od_btn_animation_fade_from = $settings['od_btn_animation_fade_from'];
        $od_btn_animation_ease = $settings['od_btn_animation_ease'];
        $od_btn_animation_delay = $settings['od_btn_animation_delay'];
?>
        <?php
        // Link
        if ('2' == $od_btn_link_type) {
            $this->add_render_attribute('od-button-arg', 'href', get_permalink($od_btn_page_link));
            $this->add_render_attribute('od-button-arg', 'target', '_self');
            $this->add_render_attribute('od-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('od-button-arg', 'class', 'ag-btn');
        } else {
            if (! empty($od_btn_link['url'])) {
                $this->add_link_attributes('od-button-arg', $od_btn_link);
                $this->add_render_attribute('od-button-arg', 'class', 'ag-btn');
            }
        }
        ?>

        <div
            class="it-fade-anim d-inline-block"
            data-fade-from="<?php echo esc_attr($od_btn_animation_fade_from, 'ordainit-toolkit'); ?>"
            data-ease="<?php echo esc_attr($od_btn_animation_ease, 'ordainit-toolkit'); ?>"
            data-delay="<?php echo esc_attr($od_btn_animation_delay, 'ordainit-toolkit'); ?>">

            <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                <?php echo esc_html($od_btn_text, 'ordainit-toolkit'); ?>
            </a>

        </div>


        <script>
            jQuery(document).ready(function($) {

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Button_Gradient());
