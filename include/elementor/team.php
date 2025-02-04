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
class Od_Team extends Widget_Base
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
        return 'od-team';
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
        return __('OD Team', 'ordainit-toolkit');
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
            'od_team_section_content',
            [
                'label' => __('Team Query', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_team_count',
            [
                'label' => __('Team Count', 'ordainit-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->add_control(
            'od_team_orderby',
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

        // need team category
        $this->add_control(
            'od_team_category',
            [
                'label' => __('Select Team Category', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => od_get_all_categories_for_team(),
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'od_team_section_bg_style',
            [
                'label' => __('Team BG', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // need team bg tab color like normal and hover color use elemntor tab
        $this->start_controls_tabs(
            'od_team_section_bg_style_tabs'
        );

        // Normal tab

        $this->start_controls_tab(
            'od_team_section_bg_style__normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );

        // need team bg color
        $this->add_control(
            'od_team_bg_normal_color',
            [
                'label' => __('BG Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // border color
        $this->add_control(
            'od_team_border_normal_color',
            [
                'label' => __('Border Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover tab

        $this->start_controls_tab(
            'od_team_section_bg_style__hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_bg_hover_color',
            [
                'label' => __('BG Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // border color
        $this->add_control(
            'od_team_border_hover_color',
            [
                'label' => __('Border Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );




        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'od_team_section_content_style',
            [
                'label' => __('Team content', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // write elementor heading control for team title
        $this->add_control(
            'od_team_title_heading',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // write tab control for team title
        $this->start_controls_tabs(
            'od_team_title_style_tabs'
        );

        // Normal tab

        $this->start_controls_tab(
            'od_team_title_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        // write control for team title color
        $this->add_control(
            'od_team_title_color',
            [
                'label' => __('Title Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-title' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_tab();

        // Hover tab

        $this->start_controls_tab(
            'od_team_title_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        // write control for team title color

        $this->add_control(
            'od_team_title_hover_color',
            [
                'label' => __('Title Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover .it-team-title' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_team_title_typography',
                'selector' => '{{WRAPPER}} .it-team-title',
            ]
        );




        // Heading for team designation

        $this->add_control(
            'od_team_designation_heading',
            [
                'label' => esc_html__('Designation', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // write tab control for team designation

        $this->start_controls_tabs(
            'od_team_designation_style_tabs'
        );

        // Normal tab

        $this->start_controls_tab(
            'od_team_designation_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        // write control for team designation color

        $this->add_control(
            'od_team_designation_color',
            [
                'label' => __('Designation Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-content span' => 'color: {{VALUE}}',
                ],
            ]
        );

        // end normal tab

        $this->end_controls_tab();

        // Hover tab

        $this->start_controls_tab(
            'od_team_designation_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        // write control for team designation color

        $this->add_control(
            'od_team_designation_hover_color',
            [
                'label' => __('Designation Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover .it-team-content span' => 'color: {{VALUE}}',
                ],
            ]
        );

        // end hover tab

        $this->end_controls_tab();

        $this->end_controls_tabs();


        // typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'od_team_designation_typography',
                'selector' => '{{WRAPPER}} .it-team-content span',
            ]
        );

        // social icon heading

        $this->add_control(
            'od_team_social_heading',
            [
                'label' => esc_html__('Social Icons', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // write tab control for team social icons

        $this->start_controls_tabs(
            'od_team_social_style_tabs'
        );

        // Normal tab

        $this->start_controls_tab(
            'od_team_social_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        // write control for team social icon color

        $this->add_control(
            'od_team_social_color',
            [
                'label' => __('Social Icon Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a' => 'color: {{VALUE}}',
                ],
            ]
        );

        // end normal tab

        $this->end_controls_tab();

        // Hover tab

        $this->start_controls_tab(
            'od_team_social_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        // write control for team social icon color


        $this->add_control(
            'od_team_social_hover_color',
            [
                'label' => __('Social Icon Color', 'ordainit-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover .it-team-social-box a' => 'color: {{VALUE}}',
                ],
            ]
        );

        // end hover tab

        $this->end_controls_tab();

        $this->end_controls_tabs();







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
        $od_team_count = $settings['od_team_count'];
        $od_team_orderby = $settings['od_team_orderby'];
        $od_team_category = $settings['od_team_category'];

        // rewrite this quey when user select query then its show that category others show all post
        if (empty($od_team_category)) {
            $args = [
                'post_type' => 'team',
                'posts_per_page' => $od_team_count,
                'order' => $od_team_orderby,
            ];
        } else {
            $args = [
                'post_type' => 'team',
                'posts_per_page' => $od_team_count,
                'order' => $od_team_orderby,
                'tax_query' => [
                    [
                        'taxonomy' => 'team-cat',
                        'field' => 'term_id',
                        'terms' => $od_team_category,
                    ],
                ],
            ];
        }

?>

        <div class="container">
            <div class="row">
                <!-- post team query -->

                <?php
                $i = -1;
                $team_query = new \WP_Query($args);
                if ($team_query->have_posts()) :
                    while ($team_query->have_posts()) : $team_query->the_post();
                        $i++;

                        $team_meta = get_post_meta(get_the_ID(), 'saasty_team_meta', true);
                        $team_designation = $team_meta['team_designation'];
                        $team_social_facebook_url = $team_meta['team_social_facebook_url'];
                        $team_social_twitter_url = $team_meta['team_social_twitter_url'];
                        $team_social_instagram_url = $team_meta['team_social_instagram_url'];
                        $team_social_linkedin_url = $team_meta['team_social_linkedin_url'];
                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 it-fade-anim" data-fade-from="bottom" data-delay="<?php echo esc_attr(.3 + $i * .2); ?>">
                            <div class="it-team-item mb-30 text-center">
                                <div class="it-team-thumb">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="it-team-content">
                                    <h5 class="it-team-title"><a class="border-line-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <span><?php echo esc_html($team_designation, 'ordainit-toolkit'); ?></span>
                                </div>
                                <div class="it-team-social-box">
                                    <a href="<?php echo esc_url($team_social_facebook_url, 'ordainit-toolkit'); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="<?php echo esc_url($team_social_twitter_url, 'ordainit-toolkit'); ?>"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="<?php echo esc_url($team_social_instagram_url, 'ordainit-toolkit'); ?>"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="<?php echo esc_url($team_social_linkedin_url, 'ordainit-toolkit'); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>

            </div>
        </div>





        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Team());
