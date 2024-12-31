<?php

namespace ordainit_toolkit\Widgets;

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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/title-box-fade.php');
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
