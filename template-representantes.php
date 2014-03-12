<?php
/*
Template Name: Representantes
*/


get_header(); ?>

	<div id="top-content"><h1>REPRESENTANTES</h1>
   		<?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
    </div>        

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

	<div class="divisa-top"></div>

<div id="select-area">

    <img src="<?php echo BASE_URL; ?>/images/mapa-rep.png" width="464" height="465" usemap="#mapa" id="mapa" border="0">
    <map name="mapa" id="mapa">
        <area data-key="sul1" shape="poly" coords="209,421,231,395,247,385,245,364,237,363,238,343,249,334,267,337,283,339,288,355,287,360,296,362,295,394,286,408,282,417,273,436,262,443,274,422,268,421,262,433,258,455,249,466,246,458,253,448,227,428" href="#" alt="sul" name="sul">
      <area data-key="sudeste1" shape="poly" coords="250,331,266,309,274,295,285,286,302,283,313,281,314,270,313,258,317,252,322,243,329,248,355,239,357,245,368,242,383,252,388,258,400,263,389,275,397,286,392,304,382,319,373,332,341,335,332,343,315,350,300,361,291,357,287,339,278,333,263,334" href="#" alt="sudeste" name="sudeste">
      <area data-key="centro1" shape="poly" coords="235,343,226,339,219,325,195,322,194,293,198,277,189,264,189,253,168,251,164,239,162,227,169,213,168,199,155,195,148,187,150,172,184,172,187,152,199,177,279,182,277,228,282,221,286,227,293,227,300,230,307,233,312,231,326,231,329,245,321,244,312,256,313,279,298,282,279,286,268,299,260,314" href="#" alt="centro" name="centro">
      <area data-key="norte1" shape="poly" coords="160,222,146,216,131,210,115,208,102,198,101,180,90,177,67,189,40,192,40,176,26,181,12,174,0,156,4,146,8,135,15,119,45,112,52,76,46,56,52,52,53,43,51,38,74,36,85,45,104,48,108,42,114,41,120,32,123,27,115,22,117,9,135,9,157,2,163,4,164,14,160,22,163,32,174,44,182,43,190,39,201,35,215,35,218,29,230,32,251,29,264,10,270,14,271,26,281,38,313,67,330,73,323,98,302,124,314,135,310,150,315,158,323,161,318,170,320,180,329,189,325,202,328,210,327,224,325,230,312,230,300,227,276,226,279,181,202,178,187,153,184,170,150,171,147,192,154,198,166,199,165,212" href="#" alt="norte" name="norte">
      <area data-key="nordeste1" shape="poly" coords="333,75,344,78,348,89,377,91,402,94,425,107,443,121,457,122,463,138,462,163,446,184,422,212,414,211,410,224,407,264,399,283,391,276,402,262,390,257,365,241,358,244,355,238,331,246,326,231,329,209,325,201,332,190,320,177,323,159,313,150,315,134,303,125,325,99,328,94" href="#" alt="nordeste" name="nordeste">
    </map>

<div id="select" class="uf">
<h1>BRASIL</h1>
<span>Selecione uma Região no mapa ou um estado na seta abaixo</span>
<form action="<? echo 'wordpress/representantes/' ?>" method="GET">
	<select name="estado" class="select" onchange="this.form.submit()">
    <option value="" />Selecione o estado</option>
<?php
$the_query = new WP_Query(array('post_type' => 'representante', 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'uf', 'meta_query' => array(
    array(
      'key' => 'uf',
      'value' => 'REGIÃO NORTE',
      'compare' => 'NOT LIKE',
    ),
array(
      'key' => 'uf',
      'value' => 'REGIÃO SUL',
      'compare' => 'NOT LIKE',
    ),
array(
      'key' => 'uf',
      'value' => 'REGIÃO CENTRAL',
      'compare' => 'NOT LIKE',
    ),
array(
      'key' => 'uf',
      'value' => 'REGIÃO LESTE',
      'compare' => 'NOT LIKE',
    ),
array(
      'key' => 'uf',
      'value' => 'REGIÃO OESTE',
      'compare' => 'NOT LIKE',
    )				
	)));
if ( $the_query -> have_posts() ) : while ( $the_query -> have_posts() ) : $the_query -> the_post();
	?>

<?php	$values = $cfs->get('uf');
		foreach ( $values as $value_uf => $label ) { ?>
		<?php if ( $no_duplica != $value_uf ) { ?>
            <option value="<?php echo $value_uf; ?>" /><?php echo $value_uf; ?></option>
		<?php $no_duplica = $value_uf; }};
        endwhile;
        endif;
        ?>    
	</select>
</form>
</div>



<div id="select" class="pais">
<h1>OUTROS PAÍSES</h1>
<span>Selecione o País na seta abaixo</span>
<form action="<? echo 'wordpress/representantes/' ?>" method="GET">
	<select name="pais" class="select" onchange="this.form.submit()">
    <option value="" />Selecione o país</option>
<?php
$the_query = new WP_Query(array('post_type' => 'representante', 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'pais', 'meta_query' => array(
    array(
      'key' => 'pais',
      'value' => 'Brasil',
      'compare' => 'NOT LIKE',
    ))));
if ( $the_query -> have_posts() ) : while ( $the_query -> have_posts() ) : $the_query -> the_post();
	?>

<?php	$values = $cfs->get('pais');
		foreach ( $values as $value_uf => $label ) { ?>
		<?php if ( $no_duplica != $value_uf ) { ?>
            <option value="<?php echo $value_uf; ?>" /><?php echo $value_uf; ?></option>
		<?php $no_duplica = $value_uf; }};
        endwhile;
        endif;
        ?>    
	</select>
</form>
</div>


</div>

<div id="list-representantes">

<?php
	$regiao_url = $_GET['regiao'];
	$regiao_url_uf = $_GET['estado'];
	$regiao_url_pais = $_GET['pais'];	
?>
<h1>
<?php
if ($regiao_url) { echo $regiao_url; }
if ($regiao_url_uf) { echo $regiao_url_uf; }
if ($regiao_url_pais) { echo $regiao_url_pais; }
?>
</h1>

<?php if ( $regiao_url == "Sul" ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC', 'meta_query' => array(
    array(
      'key' => 'regiao',
      'value' => 'Sul',
      'compare' => 'LIKE',
    )
  )	
));	
} elseif ( $regiao_url == "Sudeste" ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC', 'meta_query' => array(
    array(
      'key' => 'regiao',
      'value' => 'Sudeste',
      'compare' => 'LIKE',
    )
  )	
));	
} elseif ( $regiao_url == "Centro-Oeste" ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC', 'meta_query' => array(
    array(
      'key' => 'regiao',
      'value' => 'Centro-Oeste',
      'compare' => 'LIKE',
    )
  )	
));
} elseif ( $regiao_url == "Nordeste" ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC', 'meta_query' => array(
    array(
      'key' => 'regiao',
      'value' => 'Nordeste',
      'compare' => 'LIKE',
    )
  )	
));	
} elseif ( $regiao_url == "Norte" ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC', 'meta_query' => array(
    array(
      'key' => 'regiao',
      'value' => 'Norte',
      'compare' => 'LIKE',
    )
  )	
));	
} elseif ( $regiao_url_uf ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC', 'meta_query' => array(
    array(
      'key' => 'uf',
      'value' => $regiao_url_uf,
      'compare' => 'LIKE',
    )
  )	
));	
} elseif ( $regiao_url_pais ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC', 'meta_query' => array(
    array(
      'key' => 'pais',
      'value' => $regiao_url_pais,
      'compare' => 'LIKE',
    )
  )	
));	
} elseif ( $regiao_url == "" && $regiao_url_uf == "" && $regiao_url_pais == "" ) {
        $the_query = new WP_Query(array('post_type' => 'representante', 'paged' => get_query_var('paged'), 'posts_per_page' => 2, 'order' => 'ASC' ));	
}; ?>


		<?php if ( $the_query -> have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>


        <article id="rep-<?php the_ID(); ?>" <?php post_class(); ?>>
      
            <div class="entry-content">
            	<?php

			?> <h4 class="uf-list"> <?php
					$values = $cfs->get('uf');
					foreach ($values as $value => $label) {
						echo $value;
					};
			?> </h4> <?php
					$fields = $cfs->get('abrangencia');
					foreach ($fields as $field) { ?>
                    	<?php if ( !empty($field) ) { ?>
						 <div class="codigo"><?php echo $field['localidade']; ?></div>
                         <?php } ?>
			<?php }; ?>
                <h4 class="rep-name"><?php the_title(); ?></h4>
				<?php echo $cfs->get('dados'); ?>
            </div><!-- .entry-content -->
        
        </article><!-- #post -->
			<?php endwhile; ?>
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $the_query )); } ?>
            <?php wp_reset_postdata(); ?>
	<?php endif; ?>
</div>


		</div><!-- #content -->
	</div><!-- #primary -->
	<div id="bottom-content"></div>    

<?php get_footer(); ?>
