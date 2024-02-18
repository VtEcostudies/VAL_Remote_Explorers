<?php

// ACF: globally disable escaping HTML rendered by the_field and the_sub_field
// https://www.advancedcustomfields.com/blog/acf-6-2-5-security-release (see comment from Vaughn Royko)
// remove this if there are any security concerns about backend users, and follow instructions in the link above
add_filter( 'acf/the_field/allow_unsafe_html', function() { return true; }, 10, 2);

// ACF: disable error messages re excaping unsafe HTML, but allow ACF logs to populate
// https://www.advancedcustomfields.com/blog/acf-6-2-5-security-release/
// see section "Detection and notice information"
if ( is_admin() ) {
    add_filter(
        'acf/admin/prevent_escaped_html_notice',
        '__return_true'
    );
}

// enable editor-style.css
add_editor_style();

// enable post thumbnails
add_theme_support( 'post-thumbnails' );

// customize WP auto-scaling of large images
// https://make.wordpress.org/core/2019/10/09/introducing-handling-of-big-images-in-wordpress-5-3
function check_image_size($imagesize, $file, $attachment_id){
    return 3000;
}
add_filter( 'big_image_size_threshold', 'check_image_size',10,3 );

// custom images sizes
add_image_size( 'thumbnail-small', 100, 80, true ); // true = hard crop enabled
add_image_size( 'grid-thumbnail', 180, 130, true );
add_image_size( 'news', 500, 300, true );
add_image_size( 'card', 620, 410, true );
add_image_size( 'hero', 1600, 700, true );
add_image_size( 'featured-item', 800, 600, true );
add_image_size( 'partner-logo', 250, 250, false );
add_image_size( 'feature', 900, 620, true );
add_image_size( 'grid', 300, 270, true );
add_image_size( 'img-gallery', 400, 350, true );
add_image_size( 'portrait', 300, 350, true );
add_image_size( 'img-row-full', 1200, 500, true ); // hard crop enabled
add_image_size( 'img-row-two-thirds', 800, 500, true ); // hard crop enabled
add_image_size( 'img-row-half', 600, 500, true ); // hard crop enabled
add_image_size( 'img-row-third', 400, 500, true ); // hard crop enabled

// set compression for ACF Image Crop Add-on
// https://wordpress.org/support/topic/cropped-images-larger
add_filter('acf-image-crop/image-quality', function($arg){return 60;});

// nav menus
if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'main-nav' => 'Main Menu',
            'secondary-nav' => 'Secondary Menu',
            'footer-menu' => 'Footer Menu'
        )
    );
}

// acf options page settings
if(function_exists('acf_add_options_page')) { 

    acf_add_options_page();
    acf_add_options_sub_page('Footer');
    acf_set_options_page_title( __('Footer Content') );
    acf_set_options_page_menu( __('Footer Content') );
}

// ACF: show order number on field groups page
function acf_field_group_columns($columns) {
  $columns['menu_order'] = __('Order');
  return $columns;
} // end function reference_columns
add_filter('manage_edit-acf-field-group_columns', 'acf_field_group_columns', 20);
  
function acf_field_group_columns_content($column, $post_id) {
  switch ($column) {
    case 'menu_order':
      global $post;
      echo '<strong>',$post->menu_order,'</strong>';
      break;
    default:
      break;
  } // end switch
} // end function reference_columns_content
add_action('manage_acf-field-group_posts_custom_column', 'acf_field_group_columns_content', 20, 2);

// remove links/menus from the admin bar
// https://digwp.com/2011/04/admin-bar-tricks/#add-remove-links
function admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_render' );

// customize wp login logo
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
			width: 160px;
			height: 40px;
			background-size: 160px 40px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// change wp login logo link
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
	return get_option('home'); // link to the homepage
}

// replace "powered by wordpress" login logo text with site name
add_filter( 'login_headertext', 'new_wp_login_title' );
 
function new_wp_login_title( $headertext ) {
    return get_option( 'blogname' );
}

// load scripts for site-wide functionality
function scripts() {
    wp_enqueue_script(
        'scripts',
        get_stylesheet_directory_uri() . '/js/scripts.js',
        array('jquery')
    );
}
add_action( 'wp_enqueue_scripts', 'scripts' );

// load jqueryUI assets
function jqueryui_assets() {
    wp_enqueue_script(
        'jqueryui-js',
        get_bloginfo('stylesheet_directory').'/jquery-ui-1.12.1/jquery-ui.min.js',
        array('jquery')
    );
}
add_action('wp_enqueue_scripts', 'jqueryui_assets');

// add custom admin & ACF stylesheet
function admin_acf_styles() {
    wp_enqueue_style('admin-acf-styles', get_template_directory_uri() . '/css/admin-acf-styles.css');
}
add_action( 'admin_enqueue_scripts', 'admin_acf_styles' );

// customize excerpt length
function custom_excerpt_length( $length ) {
	return 40; // length in words
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// customize excerpt "more string"
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Remove H1 and other extraneous tags from the visual editor
// Default: p,address,pre,h1,h2,h3,h4,h5,h6
// http://wordpress.stackexchange.com/questions/45815/disable-h1-and-h2-from-rich-text-editor-combobox

function wp_wysiwyg_clean($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wp_wysiwyg_clean');

// remove auto-generated div container from custom menu widget
// http://wordpress.org/support/topic/custom-menu-remove-div-container
add_filter('wp_nav_menu_args', 'prefix_nav_menu_args');
function prefix_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

// automatic feed links
add_theme_support('automatic-feed-links');

// remove WP emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// change "howdy" in admin bar
function replace_howdy( $wp_admin_bar ) {
 $my_account=$wp_admin_bar->get_node('my-account');
 $newtitle = str_replace( 'Howdy,', 'Your account:', $my_account->title );
 $wp_admin_bar->add_node( array(
 'id' => 'my-account',
 'title' => $newtitle,
 ) );
 }
 add_filter( 'admin_bar_menu', 'replace_howdy',25 );

// BEGIN Changes for GBIF and VAL Data Explorers

/*
 * @param array $templates A list of candidate template files.
 * @return string Full path to template file.
 */
function change_template_path($templates) {

  // The custom sub-directory for page templates in your theme. 
  $val_data_explorer_dir = 'VAL_Data_Explorers';

  // Don't use the custom template directory in unexpected cases.
  if(empty($templates) || ! is_array($templates)) {
    return $templates;
  }

  $page_template_id = 0;
  $count = count($templates);
  if($templates[0] === get_page_template_slug()) {
    // if there is a custom template, then our page-{slug}.php template is at the next index
    $page_template_id = 1;
  }

  // The last one in $templates is page.php, single.php, or archives.php depending on the type of template hierarchy being read.
  // Paths of all items starting from $page_template_id will get updated
  for ($i = $page_template_id; $i < $count ; $i++) {
    //Change the template directory for MVAL Data Explorers and MVAL Species Profile
    if ($templates[$i] == 'page-home.php' || $templates[$i] == 'page-data-explorer.php' || $templates[$i] == 'page-species-explorer.php' || $templates[$i] == 'page-species-profile.php' || $templates[$i] == 'page-lit-explorer.php') {
        $templates[$i] = $val_data_explorer_dir . '/' . $templates[$i];
    }
  }

  return $templates;
}
add_filter('page_template_hierarchy', 'change_template_path');
//END Changes for GBIF and VAL Data Explorers
