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
class Od_Job_Post extends Widget_Base
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
        return 'job-post';
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
        return __('Job Post', 'ordainit-toolkit');
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
            'od_job_section_content',
            [
                'label' => __('Job Query', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_job_count',
            [
                'label' => __('Job Count', 'ordainit-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->add_control(
            'od_job_orderby',
            [
                'label' => __('Order', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => __('ASC', 'ordainit-toolkit'),
                    'DESC' => __('DESC', 'ordainit-toolkit'),
                ],
                'default' => 'ASC',
            ]
        );

        // need job category

        $this->add_control(
            'od_job_category',
            [
                'label' => __('Select Job Category', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => od_get_all_categories_for_job(),
            ]
        );

        // job button text

        $this->add_control(
            'od_job_btn_text',
            [
                'label' => __('Button Text', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('View Details', 'ordainit-toolkit'),
            ]
        );









        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'ordainit-toolkit'),
                    'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
                    'lowercase' => __('lowercase', 'ordainit-toolkit'),
                    'capitalize' => __('Capitalize', 'ordainit-toolkit'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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

        $od_job_count = $settings['od_job_count'];
        $od_job_orderby = $settings['od_job_orderby'];
        $od_job_category = $settings['od_job_category'];
        $od_job_btn_text = $settings['od_job_btn_text'];

        // rewrite this quey when user select query then its show that category others show all post
        if (empty($od_job_category)) {
            $args = [
                'post_type' => 'job',
                'posts_per_page' => $od_job_count,
                'order' => $od_job_category,
            ];
        } else {
            $args = [
                'post_type' => 'job',
                'posts_per_page' => $od_job_count,
                'order' => $od_team_orderby,
                'tax_query' => [
                    [
                        'taxonomy' => 'job-cat',
                        'field' => 'term_id',
                        'terms' => $od_team_category,
                    ],
                ],
            ];
        }
?>


        <div class="it-career-inner-area">
            <div class="container">
                <div class="row">
                    <?php
                    $i = -1;
                    $job_query = new \WP_Query($args);
                    if ($job_query->have_posts()) :
                        while ($job_query->have_posts()) : $job_query->the_post();
                            $i++;


                            $job_meta_slider = get_post_meta(get_the_ID(), 'saasty_job_meta', true);
                            $job_type = $job_meta_slider['job_type'];

                    ?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="it-career-item mb-30">
                                    <h4 class="it-career-title"><?php the_title(); ?></h4>
                                    <div class="it-career-meta">
                                        <span>
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.25 3H11V2C10.9991 1.30994 10.4401 0.750854 9.75 0.75H5.25C4.55994 0.750854 4.00085 1.30994 4 2V3H0.75C0.335815 3 0 3.33582 0 3.75V9.31494C0.00158691 9.63208 0.201416 9.91419 0.5 10.0208V13.5C0.5 13.9142 0.835815 14.25 1.25 14.25H13.75C14.1642 14.25 14.5 13.9142 14.5 13.5V10.021C14.7986 9.91431 14.9985 9.63208 15 9.31494V3.75C15 3.33582 14.6642 3 14.25 3ZM4.5 2C4.5 1.58582 4.83582 1.25 5.25 1.25H9.75C10.1642 1.25 10.5 1.58582 10.5 2V3H10V2C10 1.86194 9.88806 1.75 9.75 1.75H5.25C5.11194 1.75 5 1.86194 5 2V3H4.5V2ZM9.5 3H5.5V2.25H9.5V3ZM14 13.5C14 13.6381 13.8881 13.75 13.75 13.75H1.25C1.11194 13.75 1 13.6381 1 13.5V10.1067L6.5 10.8652V11.5C6.5 11.9142 6.83582 12.25 7.25 12.25H7.75C8.16418 12.25 8.5 11.9142 8.5 11.5V10.8652L14 10.1067V13.5ZM8 11.5C8 11.6381 7.88806 11.75 7.75 11.75H7.25C7.11194 11.75 7 11.6381 7 11.5V10C7 9.86194 7.11194 9.75 7.25 9.75H7.75C7.88806 9.75 8 9.86194 8 10V11.5ZM14.5 9.31494C14.5001 9.43958 14.4084 9.54529 14.285 9.56275L14.2157 9.57227L8.5 10.3605V10C8.5 9.58582 8.16418 9.25 7.75 9.25H7.25C6.83582 9.25 6.5 9.58582 6.5 10V10.3605L0.71521 9.56275C0.591797 9.54541 0.499878 9.4397 0.5 9.31494V3.75C0.5 3.61194 0.611938 3.5 0.75 3.5H14.25C14.3881 3.5 14.5 3.61194 14.5 3.75V9.31494Z" fill="#5F6168"></path>
                                            </svg>
                                            <?php echo esc_html($job_type); ?>
                                        </span>
                                        <span>
                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.9406 7.05353V3.16315C12.9406 2.23853 12.1835 1.47483 11.2588 1.47483H11.0493V1.21111C11.0493 0.551403 10.5145 0.0165905 9.85478 0.0165905C9.19507 0.0165905 8.66026 0.551403 8.66026 1.21111V1.47483H4.28036V1.21111C4.28036 0.542245 3.73811 0 3.06925 0C2.40038 0 1.85814 0.542245 1.85814 1.21111V1.47483H1.67714C0.75248 1.47483 0 2.23853 0 3.16315V12.0963C0 13.0209 0.75248 13.785 1.67714 13.785H6.93946C7.80704 14.8228 9.08942 15.4233 10.4421 15.4253C12.9539 15.4253 15 13.3788 15 10.8669C15.0001 9.27487 14.1683 7.86826 12.9406 7.05353ZM9.32388 1.21111C9.31877 0.922102 9.54888 0.683663 9.83789 0.678553C9.84253 0.678486 9.84718 0.678453 9.85182 0.678486C10.1436 0.675401 10.3826 0.909394 10.3857 1.20115C10.3857 1.20447 10.3857 1.20779 10.3857 1.21111V2.50345H9.32388V1.21111ZM2.52176 1.21111C2.52491 0.913773 2.76853 0.675301 3.06586 0.678453C3.0664 0.678453 3.06689 0.678453 3.06739 0.678486C3.36582 0.678486 3.61674 0.912712 3.61674 1.21111V2.50345H2.52176V1.21111ZM0.663621 3.16315C0.663621 2.60442 1.1184 2.13845 1.67714 2.13845H1.85814V2.84906C1.85814 3.03228 2.01117 3.16707 2.19443 3.16707H3.94042C4.12364 3.16707 4.28036 3.03228 4.28036 2.84906V2.13845H8.66026V2.84906C8.65535 3.01978 8.78976 3.16216 8.96048 3.16707C8.96659 3.16723 8.97269 3.16723 8.9788 3.16707H10.7248C10.8982 3.17284 11.0434 3.03696 11.0492 2.86359C11.0493 2.85875 11.0494 2.8539 11.0493 2.84906V2.13845H11.2588C11.8213 2.14413 12.2749 2.60063 12.277 3.16315V4.22886H0.663621V3.16315ZM1.67714 13.1214C1.1184 13.1214 0.663621 12.655 0.663621 12.0963V4.89248H12.277V6.69269C11.6994 6.43908 11.0754 6.30828 10.4446 6.30852C7.9328 6.30852 5.88795 8.35801 5.88795 10.8699C5.88669 11.659 6.09065 12.4349 6.47986 13.1214H1.67714ZM10.4421 14.7558C8.29268 14.7558 6.55024 13.0133 6.55024 10.8639C6.55024 8.71454 8.29268 6.97211 10.4421 6.97211C12.5915 6.97211 14.3339 8.71454 14.3339 10.8639V10.864C14.3315 13.0124 12.5905 14.7534 10.4421 14.7558Z" fill="#5F6168"></path>
                                                <path d="M12.004 10.8651H10.5503V8.86855C10.5503 8.68529 10.4018 8.53674 10.2185 8.53674C10.0353 8.53674 9.88672 8.68529 9.88672 8.86855V11.1965C9.88964 11.3811 10.0402 11.529 10.2248 11.5287H12.004C12.1873 11.5287 12.3358 11.3801 12.3358 11.1969C12.3358 11.0136 12.1873 10.8651 12.004 10.8651Z" fill="#5F6168"></path>
                                            </svg>
                                            <?php
                                            // Get the post date.
                                            $post_date = get_the_date('U'); // Get the post date as a Unix timestamp.

                                            // Calculate the difference between the current time and the post date.
                                            $time_difference = current_time('timestamp') - $post_date;

                                            // Define time periods in seconds.
                                            $time_periods = [
                                                'year'   => 365 * DAY_IN_SECONDS,
                                                'month'  => 30 * DAY_IN_SECONDS,
                                                'week'   => 7 * DAY_IN_SECONDS,
                                                'day'    => DAY_IN_SECONDS,
                                                'hour'   => HOUR_IN_SECONDS,
                                                'minute' => MINUTE_IN_SECONDS,
                                            ];

                                            // Determine the largest applicable time period.
                                            foreach ($time_periods as $period_name => $period_seconds) {
                                                $elapsed = floor($time_difference / $period_seconds);
                                                if ($elapsed > 0) {
                                                    echo sprintf(
                                                        'Posted %d %s%s ago',
                                                        $elapsed,
                                                        $period_name,
                                                        $elapsed > 1 ? 's' : '' // Add 's' for plural.
                                                    );
                                                    break;
                                                }
                                            }

                                            // If the post is very recent.
                                            if ($time_difference < MINUTE_IN_SECONDS) {
                                                echo 'Posted just now';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <?php
                                    // Get the post content
                                    $content = get_the_content();

                                    // Strip any HTML tags and truncate to 16 words
                                    $truncated_content = wp_trim_words($content, 25, '...');

                                    // Output the truncated content
                                    echo '<p>' . esc_html($truncated_content) . '</p>';
                                    ?>

                                    <div class="it-career-list mb-40">
                                        <?php
                                        $categories = wp_get_post_terms(get_the_ID(), 'job-cat'); // Get terms from 'job-cat' taxonomy
                                        $count = 0;
                                        if (!empty($categories)) {
                                            foreach ($categories as $category) {
                                                if ($count >= 3) break; // Limit to 3 categories
                                                echo '<a href="' . esc_url(get_term_link($category->term_id, 'job-cat')) . '">' . esc_html($category->name) . '</a>';
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </div>


                                    <div class="it-career-btn text-end">
                                        <a class="it-btn" href="<?php the_permalink(); ?>"><?php echo esc_html($od_job_btn_text, 'ordainit-toolkit'); ?></a>
                                    </div>
                                </div>
                            </div>


                    <?php endwhile;
                    endif; ?>

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

$widgets_manager->register(new Od_Job_Post());
