<?php
/* =================================================================================================== */
/** Admin Slug Function */
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
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

?>
