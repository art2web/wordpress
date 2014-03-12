var $j = jQuery.noConflict();
$j(document).ready(function() {

var l = window.location;
var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

	var $logo = $j("<a>", {id: "logo", href:base_url, html: "<img src=\""+base_url+"/wp-content/themes/ccf/images/logo.png\" alt=\"Logo CCF\">"});

	$j('.menu-principal-container>ul#menu-principal li#menu-item-24').after($logo);
	// ---------------------------------------- //

$j( "dl.gallery-item dt.gallery-icon a" ).append( "<div class='baixar'>BAIXAR IMAGEM</div>" );


    $j('#widget-collapscat-2-top li li a').click(function(){
        $j(this).css('color','#F00');
    });


$j('#mapa').mapster({
	mapKey: 'data-key',
	fillOpacity: 0.6,
	fillColor: "ffffff",
	stroke: true,
	singleSelect: true,
	strokeColor: "ffffff",
	strokeWidth: 4,
	strokeOpacity: 0.8,
	clickNavigate: true,
	onClick: go,
    render_highlight: {
        altImage: base_url+'/wp-content/themes/ccf/images/mapa-rep-hover.png'
    },
	render_select: {
			fillColor: 'ff000c',
			stroke: true,
			altImage: base_url+'/wp-content/themes/ccf/images/mapa-rep-hover.png'
		},
		fadeInterval: 50
});


function go(data) {
    if (data.key == 'sul1') {
        window.open( base_url+'/representantes?regiao=Sul', "_self");
    }
    else if (data.key == 'sudeste1') {
        window.open( base_url+'/representantes?regiao=Sudeste', "_self");
    }
    else if (data.key == 'centro1') {
        window.open( base_url+'/representantes?regiao=Centro', "_self");
    }
    else if (data.key == 'norte1') {
        window.open( base_url+'/representantes?regiao=Norte', "_self");
    }
    else if (data.key == 'nordeste1') {
        window.open( base_url+'/representantes?regiao=Nordeste', "_self");
    }
}





});
