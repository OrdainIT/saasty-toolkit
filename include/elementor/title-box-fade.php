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
class OD_Title_Box_Fade extends Widget_Base
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
        return 'od-title-box-fade';
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
        return __('Title Box Fade', 'ordainit-toolkit');
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
            'od_title_box_content',
            [
                'label' => __('Title Box Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_title_box_alignment',
            [
                'label' => __('Box Alignment', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ordainit-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ordainit-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ordainit-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );


        $this->add_control(
            'od_title_box_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'tvcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'tvcore'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'tvcore'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'tvcore'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'tvcore'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'tvcore'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'tvcore'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'od_title_box_title',
            [
                'label' => __('Heading Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Heading', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_title_box_title_link',
            [
                'label' => __('Heading Link', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'ordainit-toolkit'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'hr_2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'od_title_box_subtitle_show',
            [
                'label' => esc_html__('Show Subtitle', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'od_title_box_subtitle',
            [
                'label' => __('Heading Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Heading Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_title_box_subtitle_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'hr_3',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'od_title_box_description_show',
            [
                'label' => esc_html__('Show Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ordainit-toolkit'),
                'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'od_title_box_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type description here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_title_box_description_show' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();


        // Title Box Animation
        $this->start_controls_section(
            'od_title_box_animation',
            [
                'label' => __('Title Box Animation', 'ordainit-toolkit'),
            ]
        );


        // Title 
        $this->add_control(
            'od_title_box_title_anim_heading',
            [
                'label' => esc_html__('Title Animation', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'od_title_box_title_fade_from',
            [
                'label' => __('Data Fade From', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'right' => __('Right', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'top' => __('Top', 'ordainit-toolkit'),
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                ],
                'default' => 'top',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_title_box_title_data_delay',
            [
                'label' => __('Data Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('.3', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type delay in s here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );


        // Subtitle 
        $this->add_control(
            'od_title_box_subtitle_anim_heading',
            [
                'label' => esc_html__('Subtitle Animation', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'od_title_box_subtitle_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'od_title_box_subtitle_anim',
            [
                'label' => __('Subtitle Anim', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'it-fade-anim' => __('Fade', 'ordainit-toolkit'),
                    'it_text_reveal_anim' => __('Reveal', 'ordainit-toolkit'),
                ],
                'default' => 'it-fade-anim',
                'label_block' => true,
                'condition' => [
                    'od_title_box_subtitle_show' => 'yes',
                ]
            ]
        );


        $this->add_control(
            'od_title_box_subtitle_fade_from',
            [
                'label' => __('Data Fade From', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'right' => __('Right', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'top' => __('Top', 'ordainit-toolkit'),
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                ],
                'default' => 'top',
                'label_block' => true,
                'condition' => [
                    'od_title_box_subtitle_anim' => 'it-fade-anim',
                    'od_title_box_subtitle_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'od_title_box_subtitle_data_delay',
            [
                'label' => __('Data Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('.3', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type delay in s here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_title_box_subtitle_anim' => 'it-fade-anim',
                    'od_title_box_subtitle_show' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();

        // Style Starts
        $this->start_controls_section(
            'od_title_box_title_style',
            [
                'label' => __('Title Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_title_box_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_title_box_title_gradient_start_color',
            [
                'label' => esc_html__('Gradient Start Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title span' => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{od_title_box_title_gradient_end_color.VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
                ],
            ]
        );

        $this->add_control(
            'od_title_box_title_gradient_end_color',
            [
                'label' => esc_html__('Gradient End Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title span' => 'background: linear-gradient(90deg, {{od_title_box_title_gradient_start_color.VALUE}} 0%, {{VALUE}} 100%);
                                                 -webkit-background-clip: text;
                                                 -webkit-text-fill-color: transparent;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_title_box_title_typography',
                'selector' => '{{WRAPPER}} .ag-section-title',
            ]
        );

        $this->add_control(
            'od_title_box_title_margin',
            [
                'label' => esc_html__('Title Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_title_box_title_padding',
            [
                'label' => esc_html__('Title Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Subtitle Style Starts
        $this->start_controls_section(
            'od_title_box_subtitle_style',
            [
                'label' => __('Subtitle Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_title_box_subtitle_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'od_title_box_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_title_box_subtitle_typography',
                'selector' => '{{WRAPPER}} .ag-section-subtitle',
            ]
        );

        $this->add_control(
            'od_title_box_subtitle_margin',
            [
                'label' => esc_html__('Subtitle Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ag-section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_title_box_subtitle_padding',
            [
                'label' => esc_html__('Subtitle Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ag-section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Description Style Starts
        $this->start_controls_section(
            'od_title_box_description_style',
            [
                'label' => __('Description Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_title_box_description_show' => 'yes',
                ]
            ]
        );

        // Description style
        $this->add_control(
            'od_title_box_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_title_box_description_typography',
                'selector' => '{{WRAPPER}} .ag-section-title-box p',
            ]
        );

        $this->add_control(
            'od_title_box_description_margin',
            [
                'label' => esc_html__('Description Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'od_title_box_description_padding',
            [
                'label' => esc_html__('Description Padding', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .ag-section-title-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $od_heading_title = $settings['od_title_box_title'];
        $od_title_box_title_fade_from = $settings['od_title_box_title_fade_from'];
        $od_title_box_title_data_delay = $settings['od_title_box_title_data_delay'];
        $od_heading_description = $settings['od_title_box_description'];
        $od_heading_title_alignment = $settings['od_title_box_alignment'];
        $od_title_box_description_show = $settings['od_title_box_description_show'];
        $od_title_box_subtitle_show = $settings['od_title_box_subtitle_show'];
        $od_heading_subtitle = $settings['od_title_box_subtitle'];
        $od_title_box_subtitle_anim = $settings['od_title_box_subtitle_anim'];
        $od_title_box_subtitle_fade_from = $settings['od_title_box_subtitle_fade_from'];
        $od_title_box_subtitle_data_delay = $settings['od_title_box_subtitle_data_delay'];

        // Add render attributes for the section title box
        $this->add_render_attribute('section_title_box_args', 'class', 'ag-section-title-box it-text-anim');
        $this->add_render_attribute('section_title_box_args', 'style', 'text-align: ' . $od_heading_title_alignment . ';');

        // Subtitle render attributes
        $this->add_render_attribute('subtitle_args', 'class', 'ag-section-subtitle ' . esc_attr($od_title_box_subtitle_anim));
        if (!empty($od_title_box_subtitle_fade_from)) {
            $this->add_render_attribute('subtitle_args', 'data-fade-from', esc_attr($od_title_box_subtitle_fade_from));
        }
        if (!empty($od_title_box_subtitle_data_delay)) {
            $this->add_render_attribute('subtitle_args', 'data-delay', esc_attr($od_title_box_subtitle_data_delay));
        }

        // Title render attributes
        $this->add_render_attribute('heading_title_args', 'class', 'ag-section-title');

        $link_attributes = "";
        $link_settings = $settings['od_title_box_title_link'];

        if (!empty($link_settings['url'])) {
            $this->add_render_attribute('heading_link_args', 'href', esc_url($link_settings['url']));
            if (!empty($link_settings['is_external'])) {
                $this->add_render_attribute('heading_link_args', 'target', '_blank');
            }
            if (!empty($link_settings['nofollow'])) {
                $this->add_render_attribute('heading_link_args', 'rel', 'nofollow');
            }
            $link_attributes = $this->get_render_attribute_string('heading_link_args');
        }
?>


        <div <?php echo $this->get_render_attribute_string('section_title_box_args'); ?>>

            <?php if (!empty($od_title_box_subtitle_show)) : ?>
                <span <?php echo $this->get_render_attribute_string('subtitle_args'); ?>>
                    <?php echo esc_html($od_heading_subtitle); ?>
                </span>
            <?php endif; ?>

            <div class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_title_box_title_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_title_box_title_data_delay, 'ordainit-toolkit'); ?>">
                <?php
                $heading_tag = esc_attr($settings['od_title_box_title_tag']);
                $heading_content = od_kses($od_heading_title, 'ordainit-toolkit');

                if ($link_attributes) {
                    $heading_content = '<a ' . $link_attributes . '>' . $heading_content . '</a>';
                }

                echo "<{$heading_tag} " . $this->get_render_attribute_string('heading_title_args') . ">{$heading_content}</{$heading_tag}>";
                ?>
            </div>

            <?php if (!empty($od_title_box_description_show)) : ?>
                <p><?php echo od_kses($od_heading_description, 'ordainit-toolkit'); ?></p>
            <?php endif; ?>
        </div>


        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Title_Box_Fade());
