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
	<section class="container bgBlanc">
			<div class="row">
				<div class="col-xs-12"><h1>Nos derniers articles</h1></div>
			</div>
			<div class="row" id="articles">

			</div>
	</section>

	<!-- row page 2 de l'exo -->
	<footer class="container ">
			<div class="row">
				<div class="col-xs-12">
					<p class="float-droit margeTop"><a href="../liste-articles" title="Voir tous les articles" >Liste des articles >> </a></p>
				</div>
			</div>
	</footer>


		<script type="text/javascript">

		$(document).ready( function() {

			// aller chercher le json
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


			
		</script>								
		}

<?php $this->stop('main_content') ?>
