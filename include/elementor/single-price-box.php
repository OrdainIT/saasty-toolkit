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
class Od_Single_Price_Box extends Widget_Base
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
        return 'single-price-box';
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
        return __('Singel Price Box', 'ordainit-toolkit');
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
            'od_single_price_box_section_content',
            [
                'label' => __('Content', 'ordainit-toolkit'),
            ]
        );

        // price box package title control

        $this->add_control(
            'single_price_box_package_title',
            [
                'label' => __('Package Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Standard', 'ordainit-toolkit'),
                'label_block' => true,
            ]

        );

        // price box package price control

        $this->add_control(
            'single_price_box_package_price',
            [
                'label' => __('Package Price', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('$19.99', 'ordainit-toolkit'),
                'label_block' => true,
            ]

        );

        // price box package features control

        $this->add_control(
            'single_price_box_package_features',
            [
                'label' => __('Package Features', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => od_kses('Feature Item', 'ordainit-toolkit'),
                'label_block' => true,
            ]

        );

        // Description control

        $this->add_control(
            'single_price_box_package_description',
            [
                'label' => __('Package Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => od_kses('Feature Item', 'ordainit-toolkit'),
                'label_block' => true,
            ]

        );

        // Button control

        $this->add_control(
            'single_price_box_package_button',
            [
                'label' => __('Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Get Started Now', 'ordainit-toolkit'),
                'label_block' => true,
            ]

        );



        // Button Shap Media control

        $this->add_control(
            'single_price_box_package_shape_image',
            [
                'label' => esc_html__('Shap Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Button URL control Text Field


        $this->add_control(
            'single_price_box_package_button_url',
            [
                'label' => __('Button UrL', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'ordainit-toolkit'),
                'label_block' => true,
            ]

        );




        $this->end_controls_section();



        $this->start_controls_section(
            'od_single_price_box_section_settings',
            [
                'label' => __('Settings', 'ordainit-toolkit'),
            ]
        );

        // Fade Animation control

        $this->add_control(
            'od_single_price_box_fade_animation',
            [
                'label' => __('Fade Animation', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                    'top' => __('Top', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'right' => __('Right', 'ordainit-toolkit'),
                ],
            ]

        );

        // Delay control

        $this->add_control(
            'od_single_price_box_delay',
            [
                'label' => __('Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => '0.3',
                'label_block' => true,
            ]

        );



        $this->end_controls_section();

        $this->start_controls_section(
            'od_single_price_box_section_style',
            [
                'label' => __('Price Box', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // price box bg color control

        $this->add_control(
            'single_price_box_bg_color',
            [
                'label' => __('Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-price-style .it-price-item' => 'background-color: {{VALUE}}',
                ],
            ]

        );




        $this->end_controls_section();

        $this->start_controls_section(
            'od_single_price_box_content_style',
            [
                'label' => __('Content', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // price color control

        $this->add_control(
            'single_price_box_price_color',
            [
                'label' => __('Price Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-price-style .it-price-value' => 'color: {{VALUE}}',
                ],
            ]

        );

        // price typography control

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'single_price_box_price_typography',
                'label' => __('Price Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .ss-price-style .it-price-value',
            ]
        );

        // price package title color control

        $this->add_control(
            'single_price_box_package_title_color',
            [
                'label' => __('Package Title Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-price-style .it-price-head i' => 'color: {{VALUE}}',
                ],
            ]

        );

        // price package title typography control

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'single_price_box_package_title_typography',
                'label' => __('Package Title Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .ss-price-style .it-price-head i',
            ]
        );

        // button description color control

        $this->add_control(
            'single_price_box_package_description_color',
            [
                'label' => __('Package Description Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-price-style .it-price-head p' => 'color: {{VALUE}}',
                ],
            ]

        );

        // button description typography control

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'single_price_box_package_description_typography',
                'label' => __('Package Description Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .ss-price-style .it-price-head p',
            ]
        );

        // price package features color control

        $this->add_control(
            'single_price_box_package_features_color',
            [
                'label' => __('Package Features Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-price-style .it-price-item-list ul li span' => 'color: {{VALUE}}',
                ],
            ]

        );

        // price package features typography control

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'single_price_box_package_features_typography',
                'label' => __('Package Features Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .ss-price-style .it-price-item-list ul li span',
            ]
        );

        // package button heading control

        $this->add_control(
            'single_price_box_package_button_heading',
            [
                'label' => __('Button', 'ordainit-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]

        );

        // button tabs control

        $this->start_controls_tabs(
            'price_button_tabs'
        );

        // button normal tab control

        $this->start_controls_tab(
            'price_button_normal_tab',
            [
                'label' => __('Normal', 'ordainit-toolkit'),
            ]
        );

        // button color control

        $this->add_control(
            'single_price_box_package_button_color',
            [
                'label' => __('Button Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn' => 'color: {{VALUE}}',
                ],
            ]

        );

        // button bg color control

        $this->add_control(
            'single_price_box_package_button_bg_color',
            [
                'label' => __('Button Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn' => 'background-color: {{VALUE}}',
                ],
            ]

        );

        // button border color control

        $this->add_control(
            'single_price_box_package_button_border_color',
            [
                'label' => __('Button Border Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn' => 'border-color: {{VALUE}}',
                ],
            ]

        );

        $this->end_controls_tab();

        // button hover tab control

        $this->start_controls_tab(
            'price_button_hover_tab',
            [
                'label' => __('Hover', 'ordainit-toolkit'),
            ]
        );

        // button hover color control

        $this->add_control(
            'single_price_box_package_button_hover_color',
            [
                'label' => __('Button Hover Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn:hover' => 'color: {{VALUE}}',
                ],
            ]

        );

        // button hover bg color control

        $this->add_control(
            'single_price_box_package_button_hover_bg_color',
            [
                'label' => __('Button Hover Background Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn::after' => 'background-color: {{VALUE}}',
                ],
            ]

        );

        // button hover border color control

        $this->add_control(
            'single_price_box_package_button_hover_border_color',
            [
                'label' => __('Button Hover Border Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ss-btn.border-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]

        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // typography control

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'single_price_box_package_button_typography',
                'label' => __('Button Typography', 'ordainit-toolkit'),
                'selector' => '{{WRAPPER}} .ss-btn.border-btn',
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

        $single_price_box_package_title = $settings['single_price_box_package_title'];
        $single_price_box_package_price = $settings['single_price_box_package_price'];
        $single_price_box_package_features = $settings['single_price_box_package_features'];
        $single_price_box_package_description = $settings['single_price_box_package_description'];
        $single_price_box_package_button = $settings['single_price_box_package_button'];
        $single_price_box_package_button_url = $settings['single_price_box_package_button_url'];
        $single_price_box_package_shape_image = $settings['single_price_box_package_shape_image'];
        $od_single_price_box_fade_animation = $settings['od_single_price_box_fade_animation'];
        $od_single_price_box_delay = $settings['od_single_price_box_delay'];

?>

        <div class="ss-price-style it-fade-anim" data-fade-from="<?php echo esc_attr($od_single_price_box_fade_animation, 'ordainit-toolkit'); ?>" data-delay="<?php echo esc_attr($od_single_price_box_delay, 'ordainit-toolkit'); ?>">
            <div class="it-price-item p-relative mb-30">
                <div class="it-price-head">
                    <div class="it-price-value-wrap d-flex justify-content-between">
                        <div>
                            <span class="it-price-value"><?php echo esc_html($single_price_box_package_price, 'ordainit-toolkit');?></span>
                            <i><?php echo esc_html($single_price_box_package_title, 'ordainit-toolkit'); ?></i>
                        </div>
                        <div class="it-price-value-icon">
                            <img src="<?php echo esc_url($single_price_box_package_shape_image['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                    </div>
                    <p><?php echo od_kses($single_price_box_package_description, 'ordainit-toolkit'); ?></p>
                </div>
                <div class="it-price-body">
                    <div class="it-price-item-list mb-50">
                        <?php echo od_kses($single_price_box_package_features, 'ordainit-toolkit'); ?>

                    </div>
                    <div class="it-price-button">
                        <a class="ss-btn border-btn" href="<?php echo esc_url($single_price_box_package_button_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($single_price_box_package_button, 'ordainit-toolkit'); ?></a>
                    </div>
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

$widgets_manager->register(new Od_Single_Price_Box());
