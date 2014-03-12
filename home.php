<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
        <?php do_action('slideshow_deploy', '4'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<div id="slide-lancamentos">
        	<!-- <a href="<?php //echo get_site_url(); ?>/produtos"> -->
			<?php do_action('slideshow_deploy', '27'); ?>
            <!-- </a> -->
        </div>

<div id="home-features">
    	<a href="<?php echo get_site_url(); ?>/monte-sua-pickup/">
	<div id="home-custom-pickup">
        <h1>MONTE SUA PICK UP</h1>
        <span>Confira os acessórios CCF que agregam Valor e segurança ao seu veículo</span>
        <img src="<?php echo BASE_URL; ?>/images/pickup-home.png" /> 
    </div>
	    </a>


	    <a href="<?php echo get_site_url(); ?>/representantes/">
	<div id="home-representantes">
        <h1>REPRESENTANTES</h1>
        <img src="<?php echo BASE_URL; ?>/images/brasil-home.png" />
        <span>Encontre os produtos CCF na sua região</span>
    </div>
	    </a>

      	<a href="<?php echo get_site_url(); ?>/produtos">
	<div id="home-catalogo">
        <h1>CATÁLOGO ONLINE</h1>
        <div class="box-grey">
	        <img src="<?php echo BASE_URL; ?>/images/logo.png" />
	        <h2>CATÁLOGO DE PRODUTOS</h2>
    </div>
    </div>
		</a>

</div>    

	<div id="home-newsletter">
    	<h4>NEWSLETTER</h4>
        <span>Receba os Lançamentos da CCF por e-mail</span>
	    <?php echo do_shortcode ('[contact-form-7 id="133" title="Newsletter"]'); ?>
    </div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
