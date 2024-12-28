<?php

use Elementor\Controls_Manager;

class CustomSaastyContainer
{
    public function __construct()
    {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/column/section_advanced/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/section/section_advanced/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/container/section_layout/after_section_end', [$this, 'register_controls']);
        add_action('elementor/frontend/before_render', [$this, 'before_render'], 1);
    }

    public function register_controls($element)
    {
        // Data Fade Animation Control
        $element->start_controls_section(
            'data_fade_animation_wrapper',
            [
                'label' => __('Saasy Data Fade Animation', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'data_fade_animation',
            [
                'label' => __('Saasy Data Fade Animation', 'ordainit-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'ordainit-toolkit'),
                'label_off' => __('Off', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $element->end_controls_section();

        // Data Fade From Control
        $element->start_controls_section(
            'data_fade_from_wrapper',
            [
                'label' => __('Saasty Data Fade From', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'data_fade_from',
            [
                'label' => __('Saasy Data Fade From', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', 'ordainit-toolkit'),
                    'left' => __('Left', 'ordainit-toolkit'),
                    'right' => __('Right', 'ordainit-toolkit'),
                    'top' => __('Top', 'ordainit-toolkit'),
                    'bottom' => __('Bottom', 'ordainit-toolkit'),
                ],
            ]
        );

        $element->end_controls_section();

        // Data Delay Control
        $element->start_controls_section(
            'data_delay_wrapper',
            [
                'label' => __('Saasty Data Delay', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'data_delay',
            [
                'label' => __('Saasty Data Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'default' => 0,
                'description' => __('Enter delay in milliseconds.', 'ordainit-toolkit'),
            ]
        );

        $element->end_controls_section();

        // Bootstrap Grid Layout Control
        $element->start_controls_section(
            'saasty_boostrap_grid',
            [
                'label' => __('Saasty Boostrap', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'saasty_bootstrap_grid_layout',
            [
                'label' => __('Saasty Boostrap Layout', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', 'ordainit-toolkit'),
                    'container' => __('container', 'ordainit-toolkit'),
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function before_render($element)
    {
        $settings = $element->get_settings();

        // Add the data-delay attribute if it has a value
        if (!empty($settings['data_delay'])) {
            $element->add_render_attribute('_wrapper', 'data-delay', $settings['data_delay']);
        }

        // Add the data-fade-from attribute if it has a value
        if (!empty($settings['data_fade_from'])) {
            $element->add_render_attribute('_wrapper', 'data-fade-from', $settings['data_fade_from']);
        }

        // Add the it-fade-anim class if the switcher is set to "yes"
        if (isset($settings['data_fade_animation']) && $settings['data_fade_animation'] === 'yes') {
            $element->add_render_attribute('_wrapper', 'class', 'it-fade-anim');
        }

         // Add the it-fade-anim class if the switcher is set to "yes"
         if (!empty($settings['saasty_bootstrap_grid_layout']))  {
            $element->add_render_attribute('_wrapper', 'class', $settings['saasty_bootstrap_grid_layout']);
        }

       
    }
}

new CustomSaastyContainer();
