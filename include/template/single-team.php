<?php get_header();

// Assuming $Team meta is the meta data retrieved for the post
$team_meta = get_post_meta(get_the_ID(), 'saasty_team_meta', true);
$team_skill_switcher = $team_meta['team_skill_switcher'];
$team_skill_list = $team_meta['team_skill_list'];
$team_social_switcher = $team_meta['team_social_switcher'];
$team_social_facebook_url = $team_meta['team_social_facebook_url'];
$team_social_twitter_url = $team_meta['team_social_twitter_url'];
$team_social_instagram_url = $team_meta['team_social_instagram_url'];
$team_social_linkedin_url = $team_meta['team_social_linkedin_url'];

$team_contact_switcher = $team_meta['team_contact_switcher'];
$team_contact_phone = $team_meta['team_contact_phone'];
$team_contact_email = $team_meta['team_contact_email'];
$team_contact_address = $team_meta['team_contact_address'];
$team_contact_map = $team_meta['team_contact_map'];

$team_button_switcher = $team_meta['team_button_switcher'];
$team_button_text = $team_meta['team_button_text'];
$team_button_url = $team_meta['team_button_url'];
$team_designation = $team_meta['team_designation'];

$team_carousel_switcher = $team_meta['team_carousel_switcher'];
$team_carousel_title = $team_meta['team_carousel_title'];




?>

<div class="it-team-details-area pt-120 pb-120 z-index-2">
    <div class="container">
        <div class="it-team-details-wrap">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="it-team-details-left">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="it-team-details-left-thumb">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($team_social_switcher)): ?>
                            <div class="it-team-details-left-social text-center">
                                <a href="<?php echo esc_url($team_social_facebook_url); ?>"><i class="fab fa-facebook-f"></i></a>
                                <a href="<?php echo esc_url($team_social_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
                                <a href="<?php echo esc_url($team_social_instagram_url); ?>"><i class="fa-brands fa-instagram"></i></a>
                                <a href="<?php echo esc_url($team_social_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($team_contact_switcher)): ?>
                            <div class="it-contact-inner-list mb-40">
                                <ul>
                                    <?php if (!empty($team_contact_phone)): ?>
                                        <li><span>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.8054 12.3893C15.396 11.9629 14.9021 11.735 14.3787 11.735C13.8595 11.735 13.3614 11.9587 12.9351 12.3851L11.6012 13.7147C11.4914 13.6556 11.3817 13.6007 11.2761 13.5459C11.1242 13.4699 10.9807 13.3981 10.8583 13.3221C9.6088 12.5286 8.47331 11.4944 7.38426 10.1563C6.85662 9.48935 6.50204 8.92794 6.24455 8.35809C6.59069 8.0415 6.91149 7.71226 7.22386 7.39567C7.34205 7.27748 7.46024 7.15506 7.57843 7.03687C8.46487 6.15043 8.46487 5.00229 7.57843 4.11585L6.42606 2.96348C6.29521 2.83262 6.16013 2.69754 6.0335 2.56247C5.78023 2.30076 5.5143 2.03061 5.23992 1.77734C4.83047 1.37211 4.34082 1.15683 3.82584 1.15683C3.31086 1.15683 2.81277 1.37211 2.39066 1.77734C2.38644 1.78156 2.38644 1.78156 2.38221 1.78578L0.947028 3.23363C0.406722 3.77393 0.0985794 4.43243 0.0310412 5.19646C-0.070266 6.42903 0.292752 7.57718 0.571347 8.32854C1.25517 10.1732 2.27669 11.8827 3.80052 13.7147C5.64937 15.9224 7.87391 17.6657 10.415 18.894C11.3859 19.3542 12.6818 19.8987 14.1296 19.9915C14.2183 19.9958 14.3111 20 14.3956 20C15.3706 20 16.1896 19.6496 16.8312 18.9531C16.8354 18.9447 16.8438 18.9405 16.848 18.932C17.0675 18.6661 17.3208 18.4255 17.5867 18.168C17.7683 17.9949 17.954 17.8134 18.1355 17.6235C18.5534 17.1887 18.7729 16.6822 18.7729 16.163C18.7729 15.6396 18.5492 15.1372 18.1228 14.7151L15.8054 12.3893ZM17.3166 16.8341C17.3124 16.8341 17.3124 16.8384 17.3166 16.8341C17.152 17.0114 16.9831 17.1718 16.8016 17.3491C16.5272 17.6108 16.2486 17.8852 15.9869 18.1933C15.5606 18.6492 15.0583 18.8645 14.3998 18.8645C14.3365 18.8645 14.2689 18.8645 14.2056 18.8603C12.9519 18.7801 11.7869 18.2904 10.9131 17.8725C8.52397 16.7159 6.42606 15.0739 4.68273 12.9929C3.24333 11.258 2.28091 9.65398 1.64352 7.93175C1.25095 6.88069 1.10743 6.06179 1.17075 5.28932C1.21296 4.79545 1.40291 4.386 1.75326 4.03565L3.19267 2.59624C3.39951 2.40207 3.61901 2.29654 3.83428 2.29654C4.10022 2.29654 4.31549 2.45694 4.45057 2.59202C4.45479 2.59624 4.45901 2.60046 4.46323 2.60468C4.72072 2.84528 4.96555 3.09433 5.22304 3.36026C5.35389 3.49534 5.48897 3.63042 5.62405 3.76971L6.77642 4.92208C7.22386 5.36952 7.22386 5.7832 6.77642 6.23064C6.654 6.35305 6.53581 6.47546 6.4134 6.59365C6.05882 6.95667 5.72113 7.29436 5.35389 7.62361C5.34545 7.63205 5.33701 7.63627 5.33279 7.64472C4.96977 8.00773 5.03731 8.36231 5.11329 8.60291C5.11751 8.61558 5.12173 8.62824 5.12595 8.6409C5.42565 9.36694 5.84777 10.0508 6.48938 10.8654L6.4936 10.8697C7.65863 12.3049 8.88698 13.4235 10.242 14.2803C10.415 14.3901 10.5923 14.4787 10.7612 14.5632C10.9131 14.6391 11.0566 14.7109 11.1791 14.7869C11.1959 14.7953 11.2128 14.808 11.2297 14.8164C11.3732 14.8882 11.5083 14.922 11.6476 14.922C11.998 14.922 12.2175 14.7025 12.2892 14.6307L13.7328 13.1871C13.8764 13.0436 14.1043 12.8705 14.3702 12.8705C14.6319 12.8705 14.8472 13.0351 14.9781 13.1786C14.9823 13.1828 14.9823 13.1828 14.9865 13.1871L17.3124 15.5129C17.7471 15.9435 17.7471 16.3867 17.3166 16.8341Z" fill="#746FFF"></path>
                                                    <path d="M10.807 4.75747C11.9129 4.9432 12.9175 5.46662 13.7195 6.26863C14.5216 7.07065 15.0408 8.07528 15.2307 9.18122C15.2771 9.45981 15.5177 9.65398 15.7921 9.65398C15.8259 9.65398 15.8554 9.64976 15.8892 9.64554C16.2016 9.59489 16.4084 9.29941 16.3577 8.98704C16.1298 7.64894 15.4966 6.42904 14.53 5.4624C13.5634 4.49576 12.3434 3.86258 11.0053 3.63464C10.693 3.58399 10.4017 3.79083 10.3468 4.09897C10.292 4.40711 10.4946 4.70681 10.807 4.75747Z" fill="#746FFF"></path>
                                                    <path d="M19.9756 8.82242C19.6 6.61899 18.5616 4.61395 16.966 3.01836C15.3704 1.42277 13.3653 0.384369 11.1619 0.00868773C10.8538 -0.0461871 10.5625 0.16487 10.5076 0.473013C10.457 0.785377 10.6638 1.07664 10.9762 1.13151C12.9432 1.46498 14.7372 2.39785 16.1639 3.82037C17.5907 5.24712 18.5193 7.0411 18.8528 9.00815C18.8992 9.28675 19.1398 9.48092 19.4142 9.48092C19.448 9.48092 19.4775 9.4767 19.5113 9.47248C19.8195 9.42605 20.0305 9.13057 19.9756 8.82242Z" fill="#746FFF"></path>
                                                </svg>
                                                <a href="tel:<?php echo esc_attr($team_contact_phone, 'ordainit-toolkit'); ?>"><?php echo esc_html($team_contact_phone, 'ordainit-toolkit'); ?></a></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($team_contact_email)): ?>
                                        <li><span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.1781 2.9731C17.2609 1.05586 14.7118 0 12.0004 0C9.28906 0 6.7399 1.05586 4.82271 2.9731C2.90547 4.89038 1.84961 7.43945 1.84961 10.1508C1.84961 15.6357 7.03578 20.1978 9.82198 22.6487C10.2092 22.9893 10.5435 23.2835 10.8099 23.5323C11.1437 23.844 11.5721 24 12.0004 24C12.4288 24 12.8571 23.844 13.1909 23.5323C13.4572 23.2834 13.7916 22.9893 14.1788 22.6487C16.965 20.1978 22.1512 15.6357 22.1512 10.1508C22.1511 7.43945 21.0953 4.89038 19.1781 2.9731ZM13.2502 21.5932C12.8545 21.9412 12.5128 22.2419 12.2311 22.505C12.1017 22.6258 11.899 22.6258 11.7696 22.505C11.4879 22.2418 11.1462 21.9412 10.7505 21.5932C8.13111 19.289 3.25539 15 3.25539 10.1508C3.25539 5.32885 7.17832 1.40592 12.0003 1.40592C16.8223 1.40592 20.7452 5.32885 20.7452 10.1508C20.7452 15 15.8696 19.289 13.2502 21.5932Z" fill="#746FFF"></path>
                                                    <path d="M12.0007 5.29398C9.53407 5.29398 7.52734 7.30065 7.52734 9.76727C7.52734 12.2339 9.53407 14.2406 12.0007 14.2406C14.4673 14.2406 16.474 12.2339 16.474 9.76727C16.474 7.30065 14.4673 5.29398 12.0007 5.29398ZM12.0007 12.8346C10.3093 12.8346 8.93322 11.4586 8.93322 9.76722C8.93322 8.07587 10.3093 6.69981 12.0007 6.69981C13.6921 6.69981 15.0681 8.07587 15.0681 9.76722C15.0681 11.4586 13.6921 12.8346 12.0007 12.8346Z" fill="#746FFF"></path>
                                                </svg>
                                                <a href="mailto:<?php echo esc_attr($team_contact_email, 'ordainit-toolkit'); ?>"><?php echo esc_html($team_contact_email, 'ordainit-toolkit'); ?></a></span></li>
                                    <?php endif; ?>
                                    <?php if (!empty($team_contact_address)): ?>
                                        <li><span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_790_7612)">
                                                        <path d="M18.2253 7.93335C18.043 7.7496 17.7462 7.74838 17.5624 7.93067C17.3787 8.11302 17.3775 8.40983 17.5598 8.59363L17.5626 8.59653C17.6539 8.68855 17.7735 8.73439 17.8933 8.73439C18.0127 8.73439 18.1323 8.68874 18.2241 8.59771C18.4079 8.41536 18.4077 8.11714 18.2253 7.93335Z" fill="#746FFF"></path>
                                                        <path d="M23.8622 13.5704L19.5085 9.2167C19.3255 9.0337 19.0287 9.0337 18.8456 9.2167C18.6625 9.39975 18.6625 9.69656 18.8456 9.87965L22.3018 13.3358H14.06C13.3762 13.3358 12.8201 12.7796 12.8201 12.0959V3.85415L16.1568 7.19081C16.3398 7.37381 16.6366 7.37381 16.8197 7.19081C17.0028 7.00776 17.0028 6.71095 16.8197 6.52785L12.5855 2.29368C12.4025 2.11068 12.1056 2.11068 11.9226 2.29368L4.44979 9.76664C4.26674 9.94968 4.26674 10.2465 4.44979 10.4296L15.7265 21.7062C15.8143 21.7941 15.9336 21.8435 16.0579 21.8435C16.1822 21.8435 16.3015 21.7941 16.3894 21.7062L23.8622 14.2333C23.9501 14.1454 23.9995 14.0262 23.9995 13.9019C23.9995 13.7775 23.9501 13.6583 23.8622 13.5704ZM11.8827 3.65957V9.62939H5.91285L11.8827 3.65957ZM15.5892 20.2431L5.91285 10.5668H11.8827V12.0959C11.8827 13.2965 12.8594 14.2733 14.0601 14.2733H15.5892V20.2431ZM16.5266 20.2431V14.2733H22.4964L16.5266 20.2431Z" fill="#746FFF"></path>
                                                        <path d="M3.21708 11.9062H0.46875C0.209859 11.9062 0 12.1161 0 12.3749C0 12.6338 0.209859 12.8437 0.46875 12.8437H3.21708C3.47597 12.8437 3.68583 12.6338 3.68583 12.3749C3.68583 12.1161 3.47597 11.9062 3.21708 11.9062Z" fill="#746FFF"></path>
                                                        <path d="M4.61445 11.9062H4.60742C4.34853 11.9062 4.13867 12.1161 4.13867 12.3749C4.13867 12.6338 4.34853 12.8437 4.60742 12.8437H4.61445C4.87334 12.8437 5.0832 12.6338 5.0832 12.3749C5.0832 12.1161 4.87334 11.9062 4.61445 11.9062Z" fill="#746FFF"></path>
                                                        <path d="M1.96889 6.98447H0.46875C0.209859 6.98447 0 7.19437 0 7.45322C0 7.71206 0.209859 7.92197 0.46875 7.92197H1.96889C2.22778 7.92197 2.43764 7.71206 2.43764 7.45322C2.43764 7.19437 2.22778 6.98447 1.96889 6.98447Z" fill="#746FFF"></path>
                                                        <path d="M5.27319 6.98447H3.5C3.24111 6.98447 3.03125 7.19437 3.03125 7.45322C3.03125 7.71206 3.24111 7.92197 3.5 7.92197H5.27319C5.53208 7.92197 5.74194 7.71206 5.74194 7.45322C5.74194 7.19437 5.53208 6.98447 5.27319 6.98447Z" fill="#746FFF"></path>
                                                        <path d="M6.29488 14.4843H3.66992C3.41103 14.4843 3.20117 14.6942 3.20117 14.953C3.20117 15.2119 3.41103 15.4218 3.66992 15.4218H6.29488C6.55377 15.4218 6.76363 15.2119 6.76363 14.953C6.76363 14.6942 6.55372 14.4843 6.29488 14.4843Z" fill="#746FFF"></path>
                                                        <path d="M8.3437 17.4842H1.73437C1.47548 17.4842 1.26562 17.6941 1.26562 17.9529C1.26562 18.2118 1.47548 18.4217 1.73437 18.4217H8.3437C8.60259 18.4217 8.81245 18.2118 8.81245 17.9529C8.81245 17.6941 8.60259 17.4842 8.3437 17.4842Z" fill="#746FFF"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_790_7612">
                                                            <rect width="24" height="24" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <a href="<?php echo esc_url($team_contact_map, 'ordainit-toolkit'); ?>" target="_blank"><?php echo esc_html($team_contact_address, 'ordainit-toolkit'); ?></a></span></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($team_button_switcher)): ?>
                            <div class="it-team-details-left-btn">
                                <a class="it-btn" href="<?php echo esc_url($team_button_url); ?>">
                                    <?php echo esc_html($team_button_text); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="it-team-details-right">
                        <div class="it-team-details-right-title-box">
                            <h4><?php the_title(); ?></h4>
                            <?php if (!empty($team_designation)): ?>
                                <span><?php echo esc_html($team_designation, 'ordainit-toolkit'); ?></span>
                            <?php endif; ?>
                            <?php the_content(); ?>
                        </div>
                        <?php if (!empty($team_skill_switcher)): ?>
                            <div class="it-progress-bar-wrap inner-style">
                                <?php foreach ($team_skill_list as $single_skill): ?>
                                    <div class="it-progress-bar-item mb-10">
                                        <label><?php echo esc_html($single_skill['service_skill_name']); ?></label>
                                        <div class="it-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLeft" data-wow-delay=".1s" data-wow-duration="2s" role="progressbar" data-width="<?php echo esc_attr($single_skill['service_skill_value']); ?>%" aria-valuenow="<?php echo esc_attr($single_skill['service_skill_value']); ?>" aria-valuemin="0" aria-valuemax="100">
                                                    <span><?php echo esc_html($single_skill['service_skill_value']); ?>%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>


                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($team_carousel_switcher)): ?>
    <!-- Team-area-start -->
    <div class="it-Team-area p-relative z-index-1 pb-120">
        <div class="container">
            <div class="it-Team-title-wrap mb-65">
                <div class="row align-items-end">
                    <div class="col-xl-6 col-lg-7 col-md-8">
                        <div class="it-Team-title-box">
                            <h3 class="it-section-title"><?php echo esc_html($team_carousel_title, 'ordainit-toolkit'); ?></h3>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-4">
                        <div class="it-blog-arrow-box text-md-end">
                            <button class="slider-prev">
                                <span>
                                    <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76256 0.469669 5.46967L5.24264 0.696699C5.53553 0.403806 6.01041 0.403806 6.3033 0.696699C6.59619 0.989593 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM21 6.75H1V5.25H21V6.75Z"
                                            fill="currentcolor" />
                                    </svg>
                                </span>
                            </button>
                            <button class="slider-next">
                                <span>
                                    <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                            fill="currentcolor" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="it-Team-slider-wrapper">
                        <div class="swiper-container it-team-details-active">
                            <div class="swiper-wrapper">


                                <?php
                                // WP_Query arguments
                                $args = array(
                                    'post_type'      => 'team', // Replace 'team' with your custom post type slug
                                    'posts_per_page' => 4, // Change to the number of posts you want to show, or -1 for all
                                    'order'          => 'rand', // Optional: Sort in ascending order
                                );

                                // The Query
                                $team_query = new WP_Query($args);

                                // The Loop
                                if ($team_query->have_posts()) : ?>

                                    <?php while ($team_query->have_posts()) : $team_query->the_post();
                                        $team_meta = get_post_meta(get_the_ID(), 'saasty_team_meta', true);
                                        $team_designation = $team_meta['team_designation'];
                                        $team_social_twitter_url = $team_meta['team_social_twitter_url'];
                                        $team_social_facebook_url = $team_meta['team_social_facebook_url'];
                                        $team_social_instagram_url = $team_meta['team_social_instagram_url'];
                                        $team_social_linkedin_url = $team_meta['team_social_linkedin_url'];

                                    ?>
                                        <div class="swiper-slide">
                                            <div class="it-team-item mb-30 text-center">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="it-team-thumb">
                                                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="it-team-content">
                                                    <h5 class="it-team-title">
                                                        <a class="border-line-white" href="<?php the_permalink(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h5>
                                                    <span><?php echo esc_html($team_designation, 'ordainit-toolkit'); ?></span>
                                                </div>
                                                <div class="it-team-social-box">
                                                    <a href="<?php echo esc_url($team_social_facebook_url, 'ordainit-toolkit'); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                                    <a href="<?php echo esc_url($team_social_twitter_url, 'ordainit-toolkit'); ?>""><i class=" fa-brands fa-twitter"></i></a>
                                                    <a href="<?php echo esc_url($team_social_instagram_url, 'ordainit-toolkit'); ?>""><i class=" fa-brands fa-instagram"></i></a>
                                                    <a href="<?php echo esc_url($team_social_linkedin_url, 'ordainit-toolkit'); ?>""><i class=" fa-brands fa-linkedin-in"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endwhile; ?>

                                <?php
                                else :
                                    echo '<p>No team members found.</p>';
                                endif;

                                // Restore original Post Data
                                wp_reset_postdata();
                                ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area-end -->
<?php endif; ?>

<?php get_footer();
