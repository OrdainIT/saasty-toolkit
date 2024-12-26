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
class Od_Porfolio_Box extends Widget_Base
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
        return 'portfolio-box';
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
        return __('Portfolio Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/portfolio-box.php');
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

        $portfolio_title = $settings['portfolio_title'];
        $portfolio_subtitle = $settings['portfolio_subtitle'];
        $portfolio_image = $settings['portfolio_image'];
        $portfolio_url = $settings['portfolio_url'];
        $portfolio_fade_animation = $settings['portfolio_fade_animation'];
        $portfolio_delay = $settings['portfolio_delay'];

?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="ag-portfolio-item  p-relative">
                <div class="ag-portfolio-thumb">
                    <img class="w-100" src="<?php echo esc_url($portfolio_image['url'], 'ordainit-toolkit'); ?>" alt="">
                </div>
                <div class="ag-portfolio-content">
                    <h4 class="ag-portfolio-title"><a class="border-line-white" href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($portfolio_title, 'ordainit-toolkit'); ?>
                        </a></h4>
                    <a class="ag-portfolio-arrow" href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>">
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.46 3.59168C15.5538 3.04743 15.1887 2.53015 14.6445 2.43632L5.77531 0.907156C5.23106 0.813318 4.71378 1.17845 4.61994 1.72271C4.52611 2.26696 4.89124 2.78424 5.4355 2.87808L13.3192 4.23733L11.9599 12.121C11.8661 12.6653 12.2312 13.1825 12.7755 13.2764C13.3197 13.3702 13.837 13.0051 13.9308 12.4608L15.46 3.59168ZM1.62942 13.713L15.0512 4.23875L13.8979 2.60481L0.476051 12.079L1.62942 13.713Z" fill="currentcolor" />
                        </svg>
                    </a>
                </div>
            </div>

        <?php else: ?>

            <div class="it-fade-anim" data-fade-from="<?php echo esc_attr($portfolio_fade_animation, 'ordainit-toolkit'); ?>" data-delay="<?php echo esc_attr($portfolio_delay, 'ordainit-toolkit'); ?>">

                <div class="dt-project-item zoom">
                    <div class="dt-project-thumb img-zoom">
                        <img src="<?php echo esc_url($portfolio_image['url'], 'ordainit-toolkit'); ?>" alt="">
                        <div class="dt-project-arrow">
                            <a href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25 0.999999C25 0.447716 24.5523 9.47926e-07 24 -6.53655e-07L15 1.47135e-07C14.4477 -1.90039e-07 14 0.447715 14 1C14 1.55228 14.4477 2 15 2L23 2L23 10C23 10.5523 23.4477 11 24 11C24.5523 11 25 10.5523 25 10L25 0.999999ZM1.70711 24.7071L24.7071 1.70711L23.2929 0.292893L0.292893 23.2929L1.70711 24.7071Z" fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="dt-project-content">
                        <span><?php echo esc_html($portfolio_subtitle, 'ordainit-toolkit'); ?></span>
                        <h4><a class="border-line-black" href="<?php echo esc_url($portfolio_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($portfolio_title, 'ordainit-toolkit'); ?></a></h4>
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

$widgets_manager->register(new Od_Porfolio_Box());
