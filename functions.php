<?php
/*
 *  Author: Samuel Kobe | @samuelkobe
 *  URL: webok.ca/web-ok-starter_2022 | @web-ok-starter
 */

 /*------------------------------------*\
  Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 1920;
}

if (function_exists('add_theme_support')) {

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Localisation Support
    load_theme_textdomain('web-ok-starter', get_template_directory() . '/languages');

    // Custom logo support
    // $logo_width  = 64;
    // $logo_height = 64;

    // $logo_defaults = array(
    //     'height'               => $logo_height,
    //     'width'                => $logo_width,
    //     'unlink-homepage-logo' => false,
    // );
    // add_theme_support( 'custom-logo', $logo_defaults );

    add_editor_style( 'custom-editor-style.css' );
}

function webokstarter_custom_class_replace( $html ) {
    $html = str_replace('custom-logo', 'flex aspect-square', $html );
    return $html;
}
add_filter('get_custom_logo', 'webokstarter_custom_class_replace', 10);

function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

 /*------------------------------------*\
  Theme Settings - Dynamic Styles required
\*------------------------------------*/
    // fill-white fill-black - for svg fill
    // lg:pt-[0px] lg:pt-[16px] lg:pt-[32px] lg:pt-[48px] lg:pt-[64px] lg:pt-[80px] lg:pt-[96px] lg:pt-[112px] lg:t-[128px] lg:pt-[156px] - padding top for blocks
    // lg:pb-[0px] pb-[16px] pb-[32px] pb-[48px] pb-[64px] pb-[80px] pb-[96px] pb-[112px] pb-[128px] pb-[156px] - padding top for blocks
	// mb-[0px] mb-[16px] mb-[32px] mb-[48px] mb-[64px] mb-[80px] mb-[96px] mb-[112px] mb-[128px] mb-[156px] - margin bottom for other blocks
    // rounded-none rounded rouned-2xl rounded-full - image rounded for side by side block
	
	// various editor styles required
	// lg:text-brand-third

 /*------------------------------------*\
  Theme Settings - Editor Styles
\*------------------------------------*/
function legit_block_editor_styles() {
    wp_enqueue_style('editor-styles', get_theme_file_uri( 'src/styles/admin/style-editor.css' ), false, '1.0.0', 'all' );
    wp_enqueue_style('web-ok-starter-styles', get_theme_file_uri( '/style.css' ), false, '1.0.0', 'all');
} 
add_action( 'enqueue_block_editor_assets', 'legit_block_editor_styles' );

 /*------------------------------------*\
  Theme Settings - Added via ACF
\*------------------------------------*/
if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Theme Settings');
}

 /*------------------------------------*\
  Block Registry - Added via ACF
\*------------------------------------*/

add_action( 'acf/init', 'register_cta_block' );
function register_cta_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Call to action',
			'title' 				=> __( 'Call to action' ),
			'description' 			=> __( 'Call to action block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'call to action' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/cta.php',
		));
	}
}

add_action( 'acf/init', 'register_side_by_side_block' );
function register_side_by_side_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Hero',
			'title' 				=> __( 'Hero' ),
			'description' 			=> __( 'Hero block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'hero', '50/50', 'image and text', 'image', 'text', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/side-by-side.php',
		));
	}
}

add_action( 'acf/init', 'register_half_hero_block' );
function register_half_hero_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Half Hero',
			'title' 				=> __( 'Half Hero' ),
			'description' 			=> __( 'Half Hero block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'hero', 'half', 'text', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/half-hero.php',
		));
	}
}

add_action( 'acf/init', 'register_articles_block' );
function register_articles_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Articles',
			'title' 				=> __( 'Articles' ),
			'description' 			=> __( 'Articles block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'Article', 'Articles', 'loop' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/articles.php',
		));
	}
}

add_action( 'acf/init', 'register_steps_block' );
function register_steps_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Steps',
			'title' 				=> __( 'Steps' ),
			'description' 			=> __( 'Steps block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'steps' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/steps.php',
		));
	}
}

add_action( 'acf/init', 'register_testimonials_block' );
function register_testimonials_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Testimonials',
			'title' 				=> __( 'Testimonials' ),
			'description' 			=> __( 'Testimonials block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'testimonials' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/testimonials.php',
		));
	}
}

add_action( 'acf/init', 'register_advisors_block' );
function register_advisors_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Advisor',
			'title' 				=> __( 'Advisors' ),
			'description' 			=> __( 'Advisors block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'Advisor', 'Advisors', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/advisors.php',
		));
	}
}

add_action( 'acf/init', 'register_team_block' );
function register_team_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Team',
			'title' 				=> __( 'Team' ),
			'description' 			=> __( 'Team block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'Team', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/team.php',
		));
	}
}

add_action( 'acf/init', 'register_contact_block' );
function register_contact_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'Contact',
			'title' 				=> __( 'Contact' ),
			'description' 			=> __( 'Contact block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'TContacteam', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/contact.php',
		));
	}
}

add_action( 'acf/init', 'register_faqs_block' );
function register_faqs_block() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' 					=> 'FAQs',
			'title' 				=> __( 'FAQs' ),
			'description' 			=> __( 'FAQs block.' ),
			'category' 				=> 'formatting',
			'icon'					=> 'layout',
			'keywords'				=> array( 'FAQ', 'FAQs', 'content' ),
			'post_types'			=> array( 'post', 'page' ),
			'mode'					=> 'auto',
			'align'				=> 'wide',
			'render_template'		=> 'parts/blocks/faqs.php',
		));
	}
}

// BLOCK REGISTRY ENDS

 /*------------------------------------*\
  Fucntions  
\*------------------------------------*/
/* ####### Load scripts (header.php) ####### */
function header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('webokscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0'); // Custom scripts
        wp_enqueue_script('webokscripts'); // Enqueue
    }
	wp_register_script('vue-call', get_template_directory_uri() . '/js/vue.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('vue-call'); // Enqueue
}

/* ####### Load scripts (footer.php) ####### */
function footer_scripts()
{
    wp_register_script('vue-settings', get_template_directory_uri() . '/js/vue-data.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('vue-settings'); // Enqueue

	wp_register_script('scroll-nav', get_template_directory_uri() . '/js/scroll.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('scroll-nav'); // Enqueue

    wp_register_script('faqs', get_template_directory_uri() . '/js/faqs.js', array(), '1.0.0'); // Custom scripts
    wp_enqueue_script('faqs'); // Enqueue
}

/* ####### Load styles ####### */
function styles_sheet()
{
    wp_register_style('web-ok-starter-styles', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('web-ok-starter-styles'); // Enqueue
}

/* ####### Main Navigation ####### */
function webokstarter_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="flex flex-col lg:flex-row relative w-full h-auto pt-16 pb-6 lg:pt-0 lg:pb-0 lg:items-center lg:justify-end text-white font-title font-light text-3xl lg:text-base xl:text-lg tracking-wider capitalize lg:w-auto space-y-2 lg:space-y-0 lg:space-x-2">%3$s</ul>', // The items_wrap lets us put Tailwind CSS classes on the menu's <ul> element.
		'depth'           => 0,
        'add_li_class'    => '',
		'walker'          => false
		)
	);
}

/* ####### Register Navigation Options ####### */
function register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'web-ok-starter'), // Header/Main Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// widgets
// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// restrict searchs to only posts
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

/**
 * Halt the main query in the case of an empty search 
 */
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function webokstarter_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function webokstarter_wp_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function webokstarter_wp_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

/*------------------------------------*\
	Web Ok - Navigation alterations
\*------------------------------------*/

// Remove and add custom navigation classes - Web Ok
function add_link_atts($atts, $item) {
  $atts['class'] = "menu-anchor"; // styles for anchors in menu.
  $dataTitle = formatAnchor($item->title);
  $atts['data-title'] = $dataTitle; // gives menu <a> a data attribute for the title of the page
  return $atts;
}

function clear_nav_menu_item_id($id, $item, $args) {
    return ""; //clears <li> IDs from menu
}

function clear_nav_menu_item_class($classes, $item, $args) {
  if (in_array('current-menu-item', $classes) ){
    return array('active last:lg:pr-4'); //adds classes the active <li> on the menu
  } else {
    return array('last:lg:pr-4'); // adds classes to all the other menu <li>
  }
}

/*------------------------------------*\
	Custom Services Post Type
\*------------------------------------*/
// NO CUSTOM POST TYPES CURRENTLY

/*------------------------------------*\
	Web Ok - Remove Comments completely
\*------------------------------------*/
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function webokstarter_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

/*------------------------------------*\
	Anchors formatted with hyphens(-) instead of spaces
\*------------------------------------*/
function formatAnchor($str, $sep='-')
{
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        return trim($res, $sep);
}

/*------------------------------------*\
	Web Ok - User restrictions - Requires Plugin 'members'
\*------------------------------------*/

// if (is_admin() && current_user_can('director')) {

//     function remove_menu () {
//         remove_menu_page('edit.php');

//     }

//     function hideUnncessaryMenuItems () {
//         global $menu;
//         $itemsToHIDE = array(
//             ('Tools'),
//             ('Users'),
//             ('Plugins'),
//             ('Gutenberg'),
//             ('Contact'),
//             );
//         end ($menu);
//         while (prev($menu)){
//             $value = explode(
//                     ' ',
//                     $menu[key($menu)][0]);
//             if(in_array($value[0] != NULL?$value[0]:"" , $itemsToHIDE)){
//                 unset($menu[key($menu)]);
//             }
//         }
//     }

//     add_action('admin_menu', 'remove_menu');
//     add_action('admin_menu', 'hideUnncessaryMenuItems');
// }

/* ####### Actions + Filters + ShortCodes ####### */

// Add Actions
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_footer', 'footer_scripts'); // Add custom scripts to wp_footer
add_action('wp_enqueue_scripts', 'styles_sheet'); // Add Theme Stylesheet
add_action('init', 'register_menu'); // Add Menus
add_action('init', 'webokstarter_wp_pagination'); // Add the Pagination

// Remove Actions
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.

// Add Filters
add_filter('avatar_defaults', 'webokstarter_wp_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'webokstarter_wp_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Web Ok filters
add_filter('nav_menu_link_attributes', 'add_link_atts', 10, 2); // add attr to menu anchors - Web Ok
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3); // Remove id attr on menu items - Web Ok
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3); // Remove class attr on menu items - Web Ok
add_action( 'wp_before_admin_bar_render', 'webokstarter_admin_bar_render' );

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

?>
