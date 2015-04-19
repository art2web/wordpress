<?php
/* =================================================================================================== */
/** Admin Slug Function */
function the_slug() {
    global $post;
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}
/* =================================================================================================== */

/* =================================================================================================== */
function the_slug_by_permalink($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}
/* =================================================================================================== */



add_action('init', 'cloneRole');
function cloneRole()
{
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
    $adm = $wp_roles->get_role('administrator');
    $aut = $wp_roles->get_role('administrator');
    //Adding a 'new_role' with all admin caps
    $wp_roles->add_role('agencia', 'Agência', $adm->capabilities);
    $wp_roles->add_role('cliente', 'Cliente', $aut->capabilities);
    $wp_roles->remove_role('author', 'Author', $aut->capabilities);
    $wp_roles->remove_role('colaborador', 'Colaborador', $aut->capabilities);
    $wp_roles->remove_role('assinante', 'Assinante', $aut->capabilities);
    $wp_roles->remove_role('editor', 'Editor', $aut->capabilities);
}

/* =================================================================================================== */

/* =================================================================================================== */
add_action('init', 'cloneRole');
function cloneRole()
{
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
    $adm = $wp_roles->get_role('administrator');
    //Adding a 'new_role' with all admin caps
    $wp_roles->add_role('cliente', 'Cliente', $adm->capabilities);
}
/* =================================================================================================== */


add_action( 'wp_enqueue_scripts', 'register_jquery' );
function register_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js' ), false, null, true );
    wp_enqueue_script( 'jquery' );
}

/* =================================================================================================== */
function re_rewrite_rules() {
    global $wp_rewrite;
    // $wp_rewrite->author_base = $author_slug;
//  print_r($wp_rewrite);
    $wp_rewrite->author_base        = 'autor';
    $wp_rewrite->search_base        = 'buscar';
    $wp_rewrite->comments_base      = 'comentarios';
    $wp_rewrite->pagination_base    = 'pagina';
    $wp_rewrite->flush_rules();
}
add_action('init', 're_rewrite_rules');
/* =================================================================================================== */

function art2web_remove_post_type_support() {
    remove_post_type_support( 'portfolio', 'editor' );
}
add_action( 'init', 'art2web_remove_post_type_support' );

/* =================================================================================================== */

/* =================================================================================================== */
function remove_core_updates(){
	if (!is_admin()) {
		global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');
/* =================================================================================================== */

/* =================================================================================================== */
// Add and remove dashboard widgets
function art2web_dashboard_cleanup() {

	//* remove meta boxes
//	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

	//* add call to include a custom widget
	wp_add_dashboard_widget( 'art2web_help_text', 'Ajuda e Suporte do Website', 'art2web_help_links' ); // add a new custom widget for help and support
}

add_action( 'wp_dashboard_setup', 'art2web_dashboard_cleanup' );

//* add custom help links
function art2web_help_links() {
	?>

	<img src="http://www.art2web.com.br/art2web-dashboard.png" />

	<p>Se tiver alguma dúvida ou sugestão, entre em contato.</p>

	<ul>
		<li>Art2web Studio: <a href="http://www.art2web.com.br/" target="new" title="Acesse Art2web Studio">www.art2web.com.br</a></li>
	</ul>

<?php
}
/* =================================================================================================== */
/* =================================================================================================== */


?>
