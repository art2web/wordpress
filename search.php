<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="top-content"><h1>PRODUTOS</h1>
   		<?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>        
		<?php get_search_form(); ?>
    </div>

	<div class="divisa"></div>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

<div id="sibebar-produtos">
	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Produtos') ) ?>
</div>

<div id="list-produtos">
		<div id="bg-top-produtos"><h1 class="cat-desc"><?php echo category_description(); ?></h1><a href="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>"><img src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>" /></a></div>
        <?php 
        $the_query = new WP_Query(array('post_type' => 'produto', 'order' => 'DESC', 'paged' => get_query_var('paged'), 'posts_per_page' => 9, 's' => $s, 'showposts' => '-1'));

        ?>

		<h1 class="page-title"><?php printf( 'Resultados da busca para: %s', get_search_query() ); ?></h1>
		<?php if ( $the_query -> have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>


        <article id="busca-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="entry-thumbnail">
                    <a href="<?php echo $cfs->get( 'foto' ); ?>"><img src="<?php echo $cfs->get( 'foto' ); ?>" /></a>
                </div>
        
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
        
            </header><!-- .entry-header -->
        
            <div class="entry-content">
            	<?php
					$fields = $cfs->get('modelo_produto');
					foreach ($fields as $field) { ?>
						 <div class="codigo"><?php echo $field['codigo']; ?></div>
					     <div class="descricao"><?php echo $field['descricao']; ?></div>
			<?php
					};
				?>
            </div><!-- .entry-content -->
			 <a href="<?php echo $cfs->get('manual') ?>" target="new"><div class="manual">MANUAL DE MONTAGEM</div></a>

        
        </article><!-- #post -->
			<?php endwhile; ?>

			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $the_query )); } ?>
            <?php wp_reset_postdata(); ?>

            		<?php 
					else:
						?><div class="no-results">Nenhum resultado encontrado!</div><?php 					
					endif; ?>
  </div>
		</div><!-- #content -->
	</div><!-- #primary -->
	<div id="bottom-content"></div>    

<?php get_footer(); ?>
