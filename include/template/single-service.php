<?php get_header();

// Get the current post ID
$service_id = get_the_ID();
$service_meta = get_post_meta($service_id);




// Assuming $service_meta is the meta data retrieved for the post
$service_meta_slider = get_post_meta(get_the_ID(), 'saasty_service_meta', true);

$service_slider_list = $service_meta_slider['service_slider_list'];
$service_slider_switcher = $service_meta_slider['service_slider_switcher'];



$service_cta_form_title = $service_meta_slider['service_cta_form_title'];
$service_cta_form_tsub_itle = $service_meta_slider['service_cta_form_tsub_itle'];
$service_cta_form_bottom_text = $service_meta_slider['service_cta_form_bottom_text'];
$service_contact_form7 = $service_meta_slider['service_contact_form7'];

if (!empty($service_slider_list) && is_array($service_slider_list)) {
    foreach ($service_slider_list as $slider) {
        if (!empty($slider['service_slider_image'])) {
            // Extract image IDs (comma-separated)
            $image_ids = explode(',', $slider['service_slider_image']);

            // Convert IDs to URLs
            $image_urls = array_map('wp_get_attachment_url', $image_ids);
        }
    }
}



?>




<div class="it-sv-details-area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="it-sv-sidebar-wrapper">
                    <?php dynamic_sidebar('service-sidebar'); ?>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="it-sv-details-wrapper">
                    <div class="postbox-thumb text-center mb-40">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <h4 class="it-section-title mb-20"><?php the_title(); ?></h4>
                    <div class="it-sv-details-content">
                        <?php the_content(); ?>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<?php if (!empty($service_slider_switcher)): ?>
    <!-- brand-area-start -->
    <div class="it-brand-area dt-brand-style pt-95 pb-105">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="it-brand-wrap">
                        <div class="swiper-container it-brand-active">
                            <div class="swiper-wrapper slider-transtion d-flex align-items-center">
                                <?php foreach ($image_urls as $service_img_url) :
                                ?>
                                    <div class="swiper-slide">
                                        <div class="it-brand-item text-center text-xxl-start">
                                            <img src="<?php echo esc_url($service_img_url, 'ordainit-toolkit'); ?>" alt="">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->
<?php endif; ?>

<!-- cta-area-start -->
<div class="cr-cta-area it-cta-inner-style z-index-1 fix p-relative pb-120">
    <img class="cr-cta-shape-1" src="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/shap/cta-4-1.png'; ?>" alt="">

    <img class="cr-cta-shape-2" src="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/shap/cta-4-2.png'; ?>" alt="">
    <img class="cr-cta-shape-3" src="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/img/shap/cta-4-3.png'; ?>" alt="">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="cr-cta-wrap text-center">
                    <div class="it-section-title-box mb-30">
                        <h4 class="cr-section-title mb-15 it_text_reveal_anim"><?php echo od_kses($service_cta_form_title, 'ordainit-toolkit'); ?></h4>
                        <div class="it-fade-anim" data-fade-from="bottom" data-delay=".5">
                            <p class="text-black pb-15"><?php echo od_kses($service_cta_form_tsub_itle, 'ordainit-toolkit'); ?></p>
                        </div>
                    </div>
                    <div class="it-cta-input-box p-relative mb-40 it-fade-anim" data-fade-from="bottom" data-delay=".7">
                        <?php echo do_shortcode('[contact-form-7  id="' . $service_contact_form7 . '"]'); ?>

                    </div>
                    <div class="it-cta-link it-fade-anim" data-fade-from="bottom" data-delay=".9">
                        <?php echo od_kses($service_cta_form_bottom_text, 'ordainit-toolkit'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cta-area-end -->



<?php get_footer();
