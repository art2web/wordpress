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



?>
