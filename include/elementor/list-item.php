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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/list-item.php');
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
            <div class="it-software-item-list" data-fade-from="<?php echo esc_attr($list_fade_animation, 'ordainit-toolkit'); ?>" data-delay="<?php echo esc_attr($list_fade_delay, 'ordainit-toolkit'); ?>">

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
