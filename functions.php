<?php

define('BASE_URL', get_bloginfo( 'stylesheet_directory' ));

//include('metaboxes/meta_box.php');
//include('metaboxes/custom_meta_box.php');

/*-----------------SCRIPTS------------------*/
function my_init() {
	if (!is_admin()) {

		wp_register_script('jquery-imagemapster', get_stylesheet_directory_uri().'/js/jquery.imagemapster.min.js', array('jquery'), false, false);
        wp_enqueue_script( 'jquery-imagemapster' );

		wp_register_script('custom', get_stylesheet_directory_uri().'/js/custom.js', array('jquery'), false, false);
        wp_enqueue_script( 'custom' );

	}
}
add_action('init', 'my_init');

load_child_theme_textdomain('woothemes', get_stylesheet_directory().'/languages');

add_action('admin_head', 'my_custom_admin_css');

function my_custom_admin_css() {
  echo '<style>
		.cfs_loop .cfs_loop_body {
			display: block !important;
		}
  </style>';
}



/******************************************
Produtos
*******************************************/
class produto {
	
	function produto() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Produtos',
		    'singular_name' => 'Produto',
		    'add_new' => 'Novo Produto',
		    'all_items' => 'Todos os Produtos',
		    'add_new_item' => 'Adicionar Novo Produto',
		    'edit_item' => 'Editar Produto',
		    'new_item' => 'Novo Produto',
		    'view_item' => 'Visualizar Produto',
		    'search_items' => 'Buscar Produtos',
		    'not_found' =>  'Nenhum produto encontrado',
		    'not_found_in_trash' => 'Nenhum produto encontrado na lixeira',
		    'parent_item_colon' => 'Modelo',
		    'menu_name' => 'Produtos'
		);
		$args = array(
			'labels' => $labels,
			'description' => "Cat&aacute;logo de Produtos",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 5,
			'menu_icon' => get_stylesheet_directory_uri().'/images/posttype.png',
			'capability_type' => 'post',
			'taxonomies' => array( 'marca', 'modelo' ),
			'hierarchical' => true,
			'supports' => array('title'),
			'has_archive' => false,
			'rewrite' => array('with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('produto',$args);
	}
}

$produto = new produto();					
				

/******************************************
Marcas
*******************************************/
add_action( 'init', 'register_taxonomy_marcas' );

function register_taxonomy_marcas() {

    $labels = array( 
        'name' => ( 'Marcas' ),
        'singular_name' => ( 'Marca' ),
        'search_items' => ( 'Buscar Marcas' ),
        'popular_items' => ( 'Principais Marcas' ),
        'all_items' => ( 'Todas as Marcas' ),
        'parent_item' => ( 'produto' ),
        'edit_item' => ( 'Editar Marca' ),
        'update_item' => ( 'Atualizar Marca' ),
        'add_new_item' => ( 'Adicionar Marca' ),
        'new_item_name' => ( 'Nova Marca' ),
        'separate_items_with_commas' => ( 'Separate marcas with commas' ),
        'add_or_remove_items' => ( 'Add or remove marcas' ),
        'choose_from_most_used' => ( 'Choose from the most used marcas' ),
        'menu_name' => ( 'Marcas' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

		'rewrite' => array('slug' => 'marcas'),
        'query_var' => true
    );

    register_taxonomy( 'marcas', array('produto'), $args );
}




add_filter('gettext',  'translate_text');
add_filter('ngettext',  'translate_text');
 
function translate_text($translated) {
     $translated = str_ireplace('Add File',  'Adicionar Arquivo',  $translated);
     $translated = str_ireplace('Remove',  'Remover',  $translated);
     return $translated;
}



/**** Sidebar Produtos ***** */
function wpb_widgets_init() {

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Produtos'),
   'id' => 'custom-widget',
   'description' => "",
   'before_widget' => '<div id="%1$s">',
   'after_widget' => "</div>",
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );
    }
add_action( 'widgets_init', 'wpb_widgets_init' );
/**** Sidebar Footer #4 ***** */




/******************************************
Representantes
*******************************************/
class representante {
	
	function representante() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Representantes',
		    'singular_name' => 'Representante',
		    'add_new' => 'Novo Representante',
		    'all_items' => 'Todos os Representantes',
		    'add_new_item' => 'Adicionar Novo Produto',
		    'edit_item' => 'Editar Representante',
		    'new_item' => 'Novo Representante',
		    'view_item' => 'Visualizar Representante',
		    'search_items' => 'Buscar Representantes',
		    'not_found' =>  'Nenhum representante encontrado',
		    'not_found_in_trash' => 'Nenhum representante encontrado na lixeira',
		    'menu_name' => 'Representantes'
		);
		$args = array(
			'labels' => $labels,
			'description' => "",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 6,
			'menu_icon' => get_stylesheet_directory_uri().'/images/posttype.png',
			'capability_type' => 'post',
			'taxonomies' => array( '' ),
			'hierarchical' => true,
			'supports' => array('title'),
			'has_archive' => false,
			'rewrite' => array('with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('representante',$args);
	}
}

$representante = new representante();					





// HIDE THE EDITOR ON CERTAIN CUSTOM POST TYPES
add_action('init', 'hide_editor');
function hide_editor() { remove_post_type_support( 'product', 'editor' ); }
