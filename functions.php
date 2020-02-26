<?php

//Theme supports
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support( 'title-tag' );


//Render the title tag
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() { ?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php }
	add_action( 'wp_head', 'theme_slug_render_title' );
}


//Allow SVG uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//Try to fix the HTTP upload error
add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
    return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}


//Get rid of annoying non-breaking spaces in post content
add_filter( 'wp_insert_post_data', 'rm_wp_insert_post_data', '99', 2 );
function rm_wp_insert_post_data ( $data , $postarr ) {
return str_replace("\xc2\xa0", " ", $data);
}


//Enqueue all the things
function jc_enqueue_all_the_things(){
	wp_enqueue_style( 'jc_main_style', get_template_directory_uri() . '/style.css', '', '1.0');
}
add_action( 'wp_enqueue_scripts', 'jc_enqueue_all_the_things' );



//Admin styles
function jc_enqueue_admin_things(){
	wp_enqueue_style( 'jc_editor_style', get_template_directory_uri() . '/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'jc_enqueue_admin_things' );



//Register nav menus
register_nav_menus( array(
	'jc_main_nav' => 'Main Header Navigation',
	'jc_footer_menu' => 'Footer Nav Menu',
));


//Editor styles
function jc_editor_styles(){
	add_editor_style( 'css/editor.css' );
}

add_action('admin_init', 'jc_editor_styles');

//Register sidebar
function jc_2018_get_widgets(){
	$args = array(
		'name'          => __( 'Blog Sidebar', 'josh-collinsworth-2018' ),
		'id'            => 'jc-blog-sidebar',
		'description'   => 'The main sidebar for Josh Collinsworth 2018',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	); 
	register_sidebar( $args );
}

add_action( 'widgets_init', 'jc_2018_get_widgets' );




//Cron test
function jc_cron_test(){
	$my_file = 'cron-test.txt';
	$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
	$data = "\n" . 'The cron job ran.';
	fwrite($handle, $data);
	$new_data = "\n".'New data line 2';
	fwrite($handle, $new_data);
}

add_action('jc_custom_cron_hook', 'jc_cron_test');




// Hide Uncategorized category from sidebar widget
function wpfa_hide_category_widget_list_items( $cat_args ) {
	$cat_args = array_merge( $cat_args, array( 'exclude' => 1 ) );
	return $cat_args;
}
add_filter( 'widget_categories_args', 'wpfa_hide_category_widget_list_items' );



/* Allow shortcodes in widget areas */
add_filter('widget_text', 'do_shortcode');



//For paginating thoughts journal by month
function change_thoughts_pagination($query){
	if( !is_admin() && is_archive('thoughts') && $query->is_main_query() ){
		$query->set( 'date_pagination_type', 'monthly' );
	}
}

add_action( 'pre_get_posts', 'change_thoughts_pagination' );



//Shortcode for personalized ratings format
function renderRating($atts, $content = ''){

	extract(shortcode_atts(array(
	'score' => 	'',
	'title'	=>	'',
	'link'	=>	''
	), $atts));

	$ratingTemplate = array('[ ]', '[ ]', '[ ]', '[ ]', '[ ]');

	$output = "<p class='rating'>";

	if($link){
		$output = $output . "<a href='$link' target='_blank'>$title:</a><span><strong><span class='rating-highlight'>";
	} else {
			$output = $output . "$title: <span><strong><span class='rating-highlight'>";
	}
	

	for($i = 0; $i < $score; $i++){ 
		$output = $output . $ratingTemplate[$i];
	}
	$output = $output . "</span>";
	for ($i = $score; $i < 5; $i++) { 
		$output = $output . $ratingTemplate[$i];
	}
	$output = $output . "</strong>";
	return $output . '<small> ' . $score . '/5</small></span></p>';
}

add_shortcode('rating', 'renderRating');






//Whitelist LLA

function my_ip_whitelist($allow, $ip) {
return ($ip == '63.227.151.128') ? true : $allow;
}
add_filter('limit_login_whitelist_ip', 'my_ip_whitelist', 10, 2);