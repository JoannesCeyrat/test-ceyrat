<?php $this->layout('comint/layout', ['title' => $title, 'slider'=>true]) ?>


<?php $this->start('main_content') ?>
	<!-- row fluid slider --> 
		<div class="container-fluid " style="overflow: hidden;">
			<div class="row">

				<div class="col-xs-12   padTop">
					<div class="flexslider">
					  <ul class="slides">
					  	<?php
					  	for($i=0; $i<count($tab_img_slider); $i++) {
					  	 	echo "
					  		<li>
					      		<img src=\"./images-slider/".$tab_img_slider[$i]."\" alt=\"Slider image ".($i+1)."/".count($tab_img_slider)."\"/>
					    	</li>
					  		";
					  	 } 
					  	?>					   
					  </ul>
					</div>
				</div>
			</div>
		</div>


	<!-- row articles -->
	<div class="container bgBlanc">
			<div class="row">
				<div class="col-xs-12"><h1>Nos derniers articles</h1></div>
			</div>
			<div class="row" id="articles">

			</div>
	</div>

	<!-- row page 2 de l'exo -->
	<div class="container ">
			<div class="row">
				<div class="col-xs-12">
					<p class="float-droit margeTop"><a href="../page2" title="Aller à la page 2 du test" >Page 2 du test >> </a></p>
				</div>
			</div>
	</div>


		<script type="text/javascript">

		$(document).ready( function() {

			// aller chercher le json
			// ->  option enchainement par functions
			// -> $.getJSON( "./jsonHome", five_last );

			// ->option gestionnaire objet 
			$.getJSON( "./jsonHome", function(data) {

				function recursive_display(index, max) {
					G.display_element("articles", "art"+index);
					index++;
					if (index <=max) {
						setTimeout( function() {recursive_display(index, max);}, (600-index*100));
					}
				}

				var G = new Gestionnaire_articles();
				var articles = G.get_all(data);
				var last_five = G.get_fresh_five(articles);
				for (i=0; i<last_five.length; i++) {
					G.add_to_element("articles", last_five[i]);
				}

				recursive_display( 0, last_five.length-1 );

			});


			// jouer slider
			$('.flexslider').flexslider({
			    animation: "slide"
			});
		});



		/**
		* trie et retourne les 5 derniers articles en date
		*/
		function five_last (json_resp) {

			var articles = [];
			var lasts_articles=[];

			  $.each( json_resp, function( key, val ) {
			    articles[key] = val;
			  });
		 
			
			articles.sort( function(a,b) {

				if (a.date_add < b.date_add) { 
					return 1;
				}
				else if ( a.date_add > b.date_add ) {
					return -1;
				}
				else {
					return 0;
				}
				
			});


			lasts_articles = articles.slice(0, 5 );
			
			add_article(lasts_articles,0);
			//console.log(json_resp[0].date_add<json_resp[1].date_add);

		}


		/*****
		* ajoute au dom les articles
		* typiquement ici angular ferait le job avec sa boucle initialisée avec latsts_articles.
		***/
		function add_article(lasts_articles, index) {

			var m = moment(lasts_articles[index].date_add);
			var df = m.format("dddd")+"<br><span class=\"jour\">"+m.format("DD")+" "+m.format("MMM")+"</span><br><span class=\"an\">"+m.format("YYYY")+"</span>";
			var d="<div class=\"col-xs-12 cache\" id=\"art"+index+"\"> \
					<div class=\"col-xs-12 contour margeTop\" > \
						<div class=\"col-xs-4 col-md-2\"><div class=\"dateFormat\">"+ df +"</div><p class=\"hh\">"+m.format("HH")+"h"+m.format("mm")+"</p></div>\
						<div class=\"col-xs-8 col-md-10\"><h3>"+lasts_articles[index].title+"</h3><h5>"+lasts_articles[index].author+"</h5><p>"+lasts_articles[index].content+"</p></div>\
					</div>\
				</div>";
			
			$("#articles").append(d);

			if( index<(lasts_articles.length-1) ) {
				index++;
				add_article(lasts_articles, index);
			}
			else {
				display_article(0,index);
			}
		}

		/*****
		* affiche les articles avec un fadeIN
		* le temps d'enchainement est plus rapide au fur à mesure.
		* comme on a 5 articles on verfie pas si on n'a pas un chiffre négatif comme param du setTimeout... 
		***/
		function display_article(index, max) {
			//console.log($("#articles").children("#art"+index));
			$("#articles").children("#art"+index).css("opacity", 1);
			index++;
			if (index <=max) {
				setTimeout( function() {display_article(index, max);}, (800-index*100));
			}
		}
			
		</script>								
		}

<?php $this->stop('main_content') ?>
