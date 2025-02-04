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
class Od_List_Item extends Widget_Base
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
        return 'list-item';
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
        return __('List Item', 'ordainit-toolkit');
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
            'od_list_item_section',
            [
                'label' => __('List Item', 'ordainit-toolkit'),
            ]
        );

        // List item title


        $this->add_control(
            'list_item_repeater',
            [
                'label' => esc_html__('List Items', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    // list item title
                    [
                        'name' => 'list_title',
                        'label' => esc_html__('Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Item Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],

                    // list item description
                    [
                        'name' => 'list_description',
                        'label' => esc_html__('Description', 'ordainit-toolkit'),
                        'description' => esc_html__('Only for style 2', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('List Item Description', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],

                    // list select control for icon and svg control

                    [
                        'name' => 'list_item_icon_type',
                        'label' => esc_html__('Icon Type', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'svg',
                        'options' => [
                            'icon' => esc_html__('Icon', 'ordainit-toolkit'),
                            'svg' => esc_html__('SVG', 'ordainit-toolkit'),
                        ],
                    ],

                    // Icon control

                    [
                        'name' => 'list_item_icon',
                        'label' => esc_html__('Icon', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-check',
                            'library' => 'solid',
                        ],
                        'condition' => [
                            'list_item_icon_type' => 'icon',
                        ],
                    ],

                    // SVG control in text control

                    [
                        'name' => 'list_item_svg',
                        'label' => esc_html__('SVG', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => '',
                        'condition' => [
                            'list_item_icon_type' => 'svg',
                        ],
                    ],
                ],
                'default' => [
                    [
                        'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
                    ],
                    [
                        'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
                    ],
                    [
                        'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
                    ],
                    [
                        'list_title' => esc_html__('List Item Title', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );







        $this->end_controls_section();


        $this->start_controls_section(
            'od_list_item_settings',
            [
                'label' => __('Settings', 'ordainit-toolkit'),
            ]
        );

        // list item animation delay

        $this->add_control(
            'list_fade_delay',
            [
                'label' => __('Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => '0.3',
                'label_block' => true,
            ]
        );

        // fade animation switcher control

        $this->add_control(
            'list_fade_animation_switcher',
            [
                'label' => __('Fade Animation Switcher', 'ordainit-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'ordainit-toolkit'),
                'label_off' => __('No', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // list item animation

        $this->add_control(
            'list_fade_animation',
            [
                'label' => __('Fade Animation', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'none' => __('None', 'ordainit-toolkit'),
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'right' => __('Right', 'ordainit-toolkit'),
                    'top' => __('Top', 'ordainit-toolkit'),
                ],
                'condition' => [
                    'list_fade_animation_switcher' => 'yes',
                ],
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'od_list_item_style_section',
            [
                'label' => __('list Item ', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // list item title color

        $this->add_control(
            'list_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .od-list-item.it-software-item-list ul li span' => 'color: {{VALUE}}',
                ],
            ]
        );


        // list item title typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'list_title_typography',
                'label' => esc_html__('Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .od-list-item.it-software-item-list ul li span',
            ]
        );

        // list item margin

        $this->add_responsive_control(
            'list_item_margin',
            [
                'label' => esc_html__('Margin', 'ordainit-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '18',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .it-software-item-list ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        // list item padding

        $this->add_responsive_control(
            'list_item_padding',
            [
                'label' => esc_html__('Padding', 'ordainit-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '32',
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .it-software-item-list ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );


        // list item description color  

        $this->add_control(
            'list_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
                'selectors' => [
                    '{{WRAPPER}} .od-list-item.it-software-item-list ul li p' => 'color: {{VALUE}}',
                ],
            ]
        );

        // list item description typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'list_description_typography',
                'label' => esc_html__('Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .od-list-item.it-software-item-list ul li p',
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
            ]
        );

        // list item description margin

        $this->add_responsive_control(
            'list_description_margin',
            [
                'label' => esc_html__('Description Margin', 'ordainit-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .it-software-item-list ul li p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
            ]
        );

        // list item description padding

        $this->add_responsive_control(
            'list_description_padding',
            [
                'label' => esc_html__('Description Padding', 'ordainit-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .it-software-item-list ul li p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
            ]
        );






        $this->end_controls_section();


        $this->start_controls_section(
            'od_list_item_icon_style_section',
            [
                'label' => __('Icon ', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // list item icon color

        $this->add_control(
            'list_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .od-list-item.it-software-item-list ul li i' => 'color: {{VALUE}}',
                ],
            ]
        );

        // list item icon size

        $this->add_responsive_control(
            'list_icon_size',
            [
                'label' => esc_html__('Icon Size', 'ordainit-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .od-list-item.it-software-item-list ul li i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'od_list_item_icon_svg_style_section',
            [
                'label' => __('SVG Icon ', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // list item icon color

        $this->add_control(
            'list_svg_color',
            [
                'label' => esc_html__('SVG Fill Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-software-item-list ul li svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        // list item icon stroke color

        $this->add_control(
            'list_svg_stroke_color',
            [
                'label' => esc_html__('SVG Stroke Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-software-item-list ul li svg path' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        // list item icon height width

        $this->add_responsive_control(
            'list_svg_height_width',
            [
                'label' => esc_html__('SVG Height Width', 'ordainit-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .it-software-item-list ul li svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
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
        $list_item_repeater = $settings['list_item_repeater'];
        $list_fade_delay = $settings['list_fade_delay'];
        $list_fade_animation_switcher = $settings['list_fade_animation_switcher'];
        $list_fade_animation = $settings['list_fade_animation'];

?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="od-list-item it-software-item-list" data-fade-from="<?php echo esc_attr($list_fade_animation, 'ordainit-toolkit'); ?>" data-delay="<?php echo esc_attr($list_fade_delay, 'ordainit-toolkit'); ?>">

                <ul>


                    <?php foreach ($list_item_repeater as $list_item) : ?>

                        <li>
                            <?php if ('icon' == $list_item['list_item_icon_type']) : ?>
                                <i class="<?php echo esc_attr($list_item['list_item_icon']['value']); ?>"></i>
                            <?php else : ?>
                                <?php echo $list_item['list_item_svg']; ?>
                            <?php endif; ?>
                            <span>
                                <?php echo esc_html($list_item['list_title']); ?>
                            </span>
                            <p> <?php echo od_kses($list_item['list_description']); ?></p>
                        </li>
                    <?php endforeach; ?>

                </ul>

            </div>
        <?php else : ?>

            <div class=" od-list-item it-software-item-list <?php echo esc_attr($list_fade_animation_switcher === 'yes' ? 'it-fade-anim' : ''); ?> d-inline-block" data-delay="<?php echo esc_attr($list_fade_delay, 'ordainit-toolkit'); ?>" data-fade-from="<?php echo esc_attr($list_fade_animation, 'ordainit-toolkit'); ?>">
                <ul>
                    <?php foreach ($list_item_repeater as $list_item) : ?>
                        <li>
                            <?php if ('icon' == $list_item['list_item_icon_type']) : ?>
                                <i class="<?php echo esc_attr($list_item['list_item_icon']['value']); ?>"></i>
                            <?php else : ?>
                                <?php echo $list_item['list_item_svg']; ?>
                            <?php endif; ?>
                            <span>
                                <?php echo esc_html($list_item['list_title']); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>

        <?php endif; ?>





        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_List_Item());
