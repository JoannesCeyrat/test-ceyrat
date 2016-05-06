<?php $this->layout('comint/layout', ['title' => $title, 'slider'=>false]) ?>


<?php $this->start('main_content') ?>
	
	<!-- row entete--> 
		<div class="container"  >
			<div class="row">

				<div class="col-xs-12 fixe" >	
					<div class="col-xs-6">				
						<h1>Articles de la base</h1>
					</div>
					<div class="col-xs-6">					
						<p>moteur</p>
					</div>
				</div>

				

			</div>
		</div>


	<!-- row articles--> 
		<div class="container bgBlanc" style="margin-top: 10rem;">
				<div class="row" id="articles">

				</div>

				<div id="trigger" class="trig"></div>
		</div>


	

		<script type="text/javascript">

		

		$(document).ready( function() {

			var cinq_articles;
			var articles_displayed=10;

			function recursive_display(index, max, G) {
				G.display_element("articles", "art"+index);
				index++;
				if (index <max) {
					setTimeout( function() {recursive_display(index, max, G);}, 100 );
				}
				else {
					// append the inview element
					delete G;
					articles_displayed+=5;
					
				}
			}

			// aller chercher le json
			// ->  option enchainement par functions
			// -> $.getJSON( "./jsonHome", five_last );

			// ->option gestionnaire objet 
			function fetch_json() {

				$.getJSON( ("../jsonFromTableArticles/"+articles_displayed), function(data) {
		

					var G = new Gestionnaire_articles();
					var articles = G.get_all(data);

					G.tronque_content(articles, 'content', 150);

					console.log(articles);
					//cinq_articles = articles.slice(articles_displayed,5);

					for (i=0; i<articles.length; i++) {
						G.add_to_element("articles", articles[i]);
					}

					recursive_display(0, 5, G);
				
				});
			}

			// lancement initial de fetch_json
			fetch_json()
			
			/*** inview ***/
					$('#trigger').on('inview', function(event, isInView) {
						  if (isInView) {
						    // element is now visible in the viewport
						    console.log("vue");
						    fetch_json();

						  } else {
						    // element has gone out of viewport
						    // do nothing
						  }
						});
			


		});

		</script>

<?php $this->stop('main_content') ?>
