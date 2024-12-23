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
class OD_Testimonial extends Widget_Base
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
        return 'od-testimonial';
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
        return __('Testimonial', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/testimonial.php');
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
        $od_testimonial_single_description = $settings['od_testimonial_single_description'];
        $od_testimonial_single_author = $settings['od_testimonial_single_author'];
        $od_testimonial_single_designation = $settings['od_testimonial_single_designation'];
        $od_testimonial_single_avatar = $settings['od_testimonial_single_avatar'];
        $od_testimonial_single_star_switcher = $settings['od_testimonial_single_star_switcher'];
        $od_testimonial_single_star = $settings['od_testimonial_single_star'];
        $od_testimonial_single_quote_switcher = $settings['od_testimonial_single_quote_switcher'];
?>
        <div class="it-testimonial-inner-style-2">
            <div class="it-fade-anim" data-fade-from="bottom" data-delay=".3">

                <div class="pg-testimonial-item mb-35">
                    <div class="pg-testimonial-top mb-30 d-flex justify-content-between align-items-center">
                        <?php if (!empty($od_testimonial_single_star_switcher)): ?>
                            <div class="it-testimonial-ratting">
                                <?php
                                $rating = intval($od_testimonial_single_star);
                                for ($i = 1; $i <= $rating; $i++) : ?>
                                    <span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 6.18155L10.1863 5.79933L7.99681 0.298828L5.80734 5.79933L0 6.18155L4.45419 9.96361L2.99256 15.7008L7.99681 12.5376L13.0011 15.7008L11.5395 9.96361L16 6.18155Z" fill="#F59E0B" />
                                        </svg>
                                    </span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($od_testimonial_single_quote_switcher)) : ?>
                            <span class="it-testimonial-quote">
                                <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.92382 4.12377H10.4125V0H9.92382C7.29263 0.00362133 4.77028 1.05059 2.90993 2.91131C1.04958 4.77203 0.00310307 7.29459 0 9.92577V20.785H11.347V9.43706H4.14136C4.26583 7.98861 4.92872 6.63943 5.99922 5.65579C7.06971 4.67216 8.47003 4.12552 9.92382 4.12377ZM10.3695 10.4155V19.8085H0.977427V9.92577C0.980109 7.63795 1.85793 5.43784 3.4309 3.77654C5.00387 2.11525 7.15279 1.11865 9.43706 0.991111V3.16002C7.72867 3.28532 6.1308 4.05187 4.96393 5.30594C3.79705 6.56002 3.14743 8.20888 3.14536 9.92186V10.4106L10.3695 10.4155Z" fill="#01103D" />
                                    <path d="M18.7976 9.43706C18.9218 7.98844 19.5846 6.63902 20.6552 5.65518C21.7257 4.67134 23.1261 4.12456 24.5801 4.12279H25.0688V0H24.5801C21.9485 0.00284596 19.4255 1.04951 17.5646 2.91033C15.7038 4.77116 14.6571 7.29417 14.6543 9.92577V20.785H26.0003V9.43706H18.7976ZM25.0228 19.8085H15.6298V9.92577C15.6324 7.63811 16.5101 5.43813 18.0829 3.77686C19.6556 2.11559 21.8043 1.1189 24.0884 0.991111V3.16002C22.38 3.28532 20.7822 4.05187 19.6153 5.30594C18.4484 6.56002 17.7988 8.20888 17.7967 9.92186V10.4106H25.0228V19.8085Z" fill="#01103D" />
                                </svg>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="pg-testimonial-text mb-30">
                        <p><?php echo od_kses($od_testimonial_single_description, 'ordainit-toolkit') ?></p>
                    </div>
                    <div class="dt-testimonial-author-wrap d-flex align-items-center">
                        <div class="dt-testimonial-avatar mr-20">
                            <img src="<?php echo esc_url($od_testimonial_single_avatar['url'], 'ordainit-toolkit') ?>" alt="">
                        </div>
                        <div class="dt-testimonial-author-info">
                            <h5 class="mb-10"><?php echo esc_html($od_testimonial_single_author, 'ordainit-toolkit'); ?></h5>
                            <span><?php echo esc_html($od_testimonial_single_designation, 'ordainit-toolkit'); ?></span>
                        </div>
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

$widgets_manager->register(new OD_Testimonial());
