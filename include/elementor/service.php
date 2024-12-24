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
class Od_Service extends Widget_Base
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
        return 'Service';
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
        return __('Od Services', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/service.php');
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

        $od_blog_section_service_post_per_page = $settings['od_blog_section_service_post_per_page'];
        $od_category_select = $settings['od_categoryservice_select'];
        $od_blog_post_orderby = $settings['od_blog_service_orderby'];
        $od_service_button_text = $settings['od_service_button_text'];



        // Check if category is selected
        if (!empty($od_category_select)) {
            // If categories are selected, add tax_query
            $args = array(
                'post_type'      => 'service', // Fetch blog posts
                'posts_per_page' => $od_blog_section_service_post_per_page, // Number of posts to display
                'order'          => $od_blog_post_orderby, // Order of posts
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'service-cat', // Taxonomy to filter by
                        'field'    => 'term_id',  // Field type ('term_id', 'slug', or 'name')
                        'terms'    => $od_category_select, // Selected category IDs (single or multiple)
                        'operator' => 'IN', // Show posts matching any of the selected categories
                    ),
                ),
            );
        } else {
            // If no category is selected, show all posts
            $args = array(
                'post_type'      => 'service', // Fetch blog posts
                'posts_per_page' => $od_blog_section_service_post_per_page, // Number of posts to display
                'order'          => $od_blog_post_orderby, // Order of posts
            );
        }


        $service_query = new \WP_Query($args);




?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="container">
                <div class="row">
                    <?php
                    $i = -1;

                    if ($service_query->have_posts()) :
                        while ($service_query->have_posts()) : $service_query->the_post();
                            $i++;

                            $service_meta_thumbnail = get_post_meta(get_the_ID(), 'saasty_service_meta_side', true);


                            $service_thumbnail_image = isset($service_meta_thumbnail['service_thumbnail_image']) ? $service_meta_thumbnail['service_thumbnail_image']['url'] : '';

                    ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 it-fade-anim" data-fade-from="bottom" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                                <div class="dt-service-item mb-30">
                                    <?php if (!empty($service_thumbnail_image)): ?>
                                        <span class="dt-service-icon mb-40 d-block"><img src="<?php echo esc_url($service_thumbnail_image, 'ordainit-toolkit') ?>" alt=""></span>
                                    <?php endif; ?>
                                    <div class="dt-service-content">
                                        <h4 class="dt-service-title mb-25"><a class="border-line-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <p class="mb-35"><?php echo wp_trim_words(get_the_excerpt(), 16, '...'); ?></p>
                                        <div class="dt-service-link">
                                            <a class="dt-service-link" href="<?php the_permalink(); ?>">
                                                <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.7709 4.44699C19.7706 4.44676 19.7704 4.44648 19.7702 4.44625L15.688 0.383747C15.3821 0.0794115 14.8875 0.0805441 14.5831 0.386403C14.2787 0.692224 14.2799 1.18687 14.5857 1.49125L17.3265 4.21875H0.78125C0.349766 4.21875 0 4.56851 0 5C0 5.43148 0.349766 5.78125 0.78125 5.78125H17.3264L14.5857 8.50875C14.2799 8.81312 14.2788 9.30777 14.5831 9.61359C14.8875 9.91949 15.3822 9.92054 15.688 9.61625L19.7702 5.55375C19.7704 5.55351 19.7706 5.55324 19.7709 5.55301C20.0769 5.24761 20.0759 4.75136 19.7709 4.44699Z" fill="currentcolor" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); // Reset the query to avoid conflicts
                    else : ?>
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>
            <div class="dt-service-area ai-service-style-2 p-relative z-index-1 pg-service-style  ">
                <div class="container">
                    <div class="row">


                        <?php


                        if ($service_query->have_posts()) :
                            while ($service_query->have_posts()) : $service_query->the_post();

                                $service_meta_thumbnail = get_post_meta(get_the_ID(), 'saasty_service_meta_side', true);


                                $service_thumbnail_image = isset($service_meta_thumbnail['service_thumbnail_image']) ? $service_meta_thumbnail['service_thumbnail_image']['url'] : '';

                        ?>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="dt-service-item mb-30">
                                        <?php if (!empty($service_thumbnail_image)): ?>
                                            <span class="dt-service-icon mb-35 d-block"><img src="<?php echo esc_url($service_thumbnail_image, 'ordainit-toolkit') ?>"
                                                    alt=""></span>
                                        <?php endif; ?>
                                        <div class="dt-service-content">
                                            <h4 class="dt-service-title mb-20"><a class="border-line-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p class="mb-30"><?php echo wp_trim_words(get_the_excerpt(), 16, '...'); ?></p>

                                            <a class="pg-btn" href="<?php the_permalink(); ?>"><?php echo esc_html($od_service_button_text, 'ordainit-toolkit'); ?></a>
                                        </div>
                                    </div>
                                </div>


                            <?php endwhile;
                            wp_reset_postdata(); // Reset the query to avoid conflicts
                        else : ?>
                            <p>No posts found.</p>
                        <?php endif; ?>


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

$widgets_manager->register(new Od_Service());
