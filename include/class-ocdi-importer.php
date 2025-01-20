<?php

/**
 * 
 * Demo Imports
 */
function od_ocdi_import_files()
{
  return array(
    array(
      'import_file_name'           => 'Main Demo',
      'local_import_file'          => trailingslashit(get_template_directory()) . 'sample-data/contents-demo.xml',
      'local_import_widget_file'   => trailingslashit(get_template_directory()) . 'sample-data/theme-widget.json',
      'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'sample-data/theme-customizer.dat',
      'import_preview_image_url'   => plugins_url('assets/img/demo/screenshot.png', dirname(__FILE__)),
      'import_notice'              => esc_html__('After you import this demo, you will have to click the Primary Menu From Appearance->Menu-> Primary Menu.', 'ordainit-toolkit'),
      'preview_url'                => 'https://ordainit.com/wp-theme/saasty/',
      'site_settings_file'         => trailingslashit(get_template_directory()) . 'sample-data/site-settings.json', // Custom key for site settings
    ),
    array(
      'import_file_name'           => 'RTL Demo',
      'local_import_file'          => trailingslashit(get_template_directory()) . 'sample-data/rtl-contents-demo.xml',
      'local_import_widget_file'   => trailingslashit(get_template_directory()) . 'sample-data/rtl-theme-widget.json',
      'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'sample-data/rtl-theme-customizer.dat',
      'import_preview_image_url'   => plugins_url('assets/img/demo/screenshot.png', dirname(__FILE__)),
      'import_notice'              => esc_html__('After you import this RTL demo, you will have to click the Primary Menu From Appearance->Menu-> Primary Menu.', 'ordainit-toolkit'),
      'preview_url'                => 'https://ordainit.com/wp-theme/saasty-rtl/',
      'site_settings_file'         => trailingslashit(get_template_directory()) . 'sample-data/site-settings.json', // Custom key for site settings
    ),
  );
}
add_filter('ocdi/import_files', 'od_ocdi_import_files');



function od_ocdi_page($od_page_name = 'Home 01')
{
  $posts = get_posts(
    array(
      'post_type'              => 'page',
      'title'                  => $od_page_name,
      'post_status'            => 'all',
      'posts_per_page'         => 1,
      'no_found_rows'          => true,
      'ignore_sticky_posts'    => true,
      'update_post_term_cache' => false,
      'update_post_meta_cache' => false,
      'orderby'                => 'post_date ID',
      'order'                  => 'ASC',
    )
  );

  if (! empty($posts)) {
    $page_got_by_title = $posts[0];
  } else {
    $page_got_by_title = null;
  }

  return $page_got_by_title;
}


// after demo imports
function od_ocdi_after_import_setup()
{
  // Assign menus to their locations.
  $main_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
  if ($main_menu) {
    set_theme_mod(
      'nav_menu_locations',
      array(
        'main-menu' => $main_menu->term_id, // Assign menu to 'main-menu' location.
      )
    );
  }

  // Assign front page and posts page (blog page).
  $front_page = get_page_by_title('Home 01');
  $blog_page = get_page_by_title('Blog');

  if ($front_page && $blog_page) {
    update_option('show_on_front', 'page'); // Set static front page option.
    update_option('page_on_front', $front_page->ID); // Set the front page.
    update_option('page_for_posts', $blog_page->ID); // Set the blog page.
  } elseif ($front_page) {
    update_option('show_on_front', 'page'); // Fallback to setting only the front page if Blog page is missing.
    update_option('page_on_front', $front_page->ID);
  } elseif ($blog_page) {
    update_option('show_on_front', 'posts'); // Fallback to setting only the blog page as the default posts page.
    update_option('page_for_posts', $blog_page->ID);
  }

  // Update Elementor settings from JSON.
  $json_file = trailingslashit(get_template_directory()) . 'sample-data/site-settings.json';
  if (file_exists($json_file)) {
    $settings_data = json_decode(file_get_contents($json_file), true);

    if (is_array($settings_data)) {
      foreach ($settings_data as $key => $value) {
        update_option($key, $value); // Apply each setting to the database.
      }
    }
  }


  // Clear theme cache (useful for Elementor or similar plugins).
  if (function_exists('Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
  }
}
add_action('ocdi/after_import', 'od_ocdi_after_import_setup');




function od_ocdi_plugin_page_setup($default_settings)
{
  $default_settings['parent_slug'] = 'themes.php';
  $default_settings['page_title']  = esc_html__('One Click Demo Import', 'one-click-demo-import');
  $default_settings['menu_title']  = esc_html__('Import Theme Demos', 'one-click-demo-import');
  $default_settings['capability']  = 'import';
  $default_settings['menu_slug']   = 'one-click-demo-import';

  return $default_settings;
}
add_filter('ocdi/plugin_page_setup', 'od_ocdi_plugin_page_setup');
