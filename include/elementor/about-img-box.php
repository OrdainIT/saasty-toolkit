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
class OD_About_Img_Box extends Widget_Base
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
        return 'od-about-img-box';
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
        return __('About Image Box', 'ordainit-toolkit');
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
            'od_about_img_box_thumbnail_section',
            [
                'label' => __('Thumbnail', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_about_img_box_thumbnail_image',
            [
                'label' => esc_html__('Choose Thumbnail Image 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_about_img_box_thumbnail_image_2',
            [
                'label' => esc_html__('Choose Thumbnail Image 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_about_img_box_thumbnail_image_3',
            [
                'label' => esc_html__('Choose Thumbnail Image 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'od_about_img_box_thumbnail_image_4',
            [
                'label' => esc_html__('Choose Thumbnail Image 4', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'od_design_style' => ['layout-2']
                ]
            ]
        );

        $this->end_controls_section();

        // Animation Section
        $this->start_controls_section(
            'od_about_img_box_animation',
            [
                'label' => __('Animation', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_about_img_box_animation_fade_from',
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
            'od_about_img_box_animation_delay',
            [
                'label' => esc_html__('Animation Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('0.3', 'ordainit-toolkit'),
                'title' => esc_html__('enter delay in s', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_about_img_box_style',
            [
                'label' => __('About Image Box Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_about_img_box_bg_color',
            [
                'label' => esc_html__('BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ma-about-left' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ma-software-style .ma-software-left-box' => 'background-color: {{VALUE}}',
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
        $od_about_img_box_thumbnail_image = $settings['od_about_img_box_thumbnail_image'];
        $od_about_img_box_thumbnail_image_2 = $settings['od_about_img_box_thumbnail_image_2'];
        $od_about_img_box_thumbnail_image_3 = $settings['od_about_img_box_thumbnail_image_3'];
        $od_about_img_box_thumbnail_image_4 = $settings['od_about_img_box_thumbnail_image_4'];
        $od_about_img_box_animation_fade_from = $settings['od_about_img_box_animation_fade_from'];
        $od_about_img_box_animation_delay = $settings['od_about_img_box_animation_delay'];
?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="ma-software-style it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_about_img_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_about_img_box_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="ma-software-left-box d-flex align-items-end">
                    <div class="ma-software-thumb-box mr-20">
                        <div class="ma-software-thumb mb-20">
                            <img src="<?php echo esc_url($od_about_img_box_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                        <div class="ma-software-thumb">
                            <img src="<?php echo esc_url($od_about_img_box_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                    </div>
                    <div class="ma-software-thumb-box">
                        <div class="ma-software-thumb mb-20">
                            <img src="<?php echo esc_url($od_about_img_box_thumbnail_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                        <div class="ma-software-thumb">
                            <img src="<?php echo esc_url($od_about_img_box_thumbnail_image_4['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="it-fade-anim"
                data-fade-from="<?php echo esc_attr($od_about_img_box_animation_fade_from, 'ordainit-toolkit'); ?>"
                data-delay="<?php echo esc_attr($od_about_img_box_animation_delay, 'ordainit-toolkit'); ?>">
                <div class="ma-about-left d-flex align-items-center">
                    <div class="ma-about-thumb mr-30">
                        <img src="<?php echo esc_url($od_about_img_box_thumbnail_image['url'], 'ordainit-toolkit'); ?>" alt="">
                    </div>
                    <div class="ma-about-thumb-box">
                        <div class="ma-about-thumb mb-30">
                            <img src="<?php echo esc_url($od_about_img_box_thumbnail_image_2['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                        <div class="ma-about-thumb">
                            <img src="<?php echo esc_url($od_about_img_box_thumbnail_image_3['url'], 'ordainit-toolkit'); ?>" alt="">
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

$widgets_manager->register(new OD_About_Img_Box());
