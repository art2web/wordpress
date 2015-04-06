/* =================================================================================================== */
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/wp-content/themes/ac3/images/favicon.png" />';
}
add_action('wp_head', 'blog_favicon');
/* =================================================================================================== */
