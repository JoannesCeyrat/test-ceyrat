<?php $this->layout('comint/layout', ['title' => $title, 'page2'=>$page2]) ?>


<?php $this->start('main_content') ?>
	
	<!-- row entete--> 
		<header class="container"  >
			<div class="row">

				<div class="col-xs-12 fixe" >	
					<div class="col-xs-12 col-sm-6">				
						<h1>Articles de la base</h1>
					</div>
					<div class="col-xs-12 col-sm-6">	
						<h6>Recherche par titre</h6>
						<div id="bloodhound">				
							<input class="typeahead" type="text" placeholder="Titre de l'article">
						</div>
					</div>
				</div>

				

			</div>
		</header>


	<!-- row articles--> 
		<section class="container bgBlanc" style="margin-top: 10rem;">
				<div class="row" id="articles">

				</div>

				<div id="trigger" class="trig"></div>
		</section>


		<footer class="container">
			<div class="row">
				<div class="col-xs-12">
					<p class="margeTop"><a href="../" title="Retour page accueil du test" ><< Accueil </a></p>
				</div>
			</div>
		</footer>
	

		<script type="text/javascript">

		var titles=<?= $arr_json ?>;

		$(document).ready( function() {

			/***
			* moteur de suggestions
			****/
			var titles_light =[];
			for (i=0; i<titles.length; i++) {
				titles_light.push(titles[i].title);
			}

			var titles_b = new Bloodhound({
			  datumTokenizer: Bloodhound.tokenizers.whitespace,
			  queryTokenizer: Bloodhound.tokenizers.whitespace,
			  // `states` is an array of state names defined in "The Basics"
			  local: titles_light
			});

			$('#bloodhound .typeahead').typeahead({
			  hint: true,
			  highlight: true,
			  minLength: 1
			},
			{
			  name: 'titles',
			  source: titles_b
			});


			$('.typeahead').bind('typeahead:select', function(ev, suggestion) {
			  console.log('Selection: ' + getID(suggestion) );
			});

			function getID(titre) {
				for (i=0; i<titles.length; i++) {
					if (titles[i].title == titre) {
						return titles[i].id
					}
				}
				return 0;
			}

			/***
			* affichage des teasers articles
			*/

			var cinq_articles;
			var articles_displayed=0;

			function recursive_display(index, max, G) {
				G.display_element("articles", "art"+index);
				index++;
				if (index <max) {
					setTimeout( function() {recursive_display(index, max, G);}, 100 );
				}
				else {
					delete G;
					articles_displayed+=5;
					
				}
			}

			

			function fetch_json() {

				$.getJSON( ("../jsonFromTableArticles/"+articles_displayed), function(data) {
		

					var G = new Gestionnaire_articles();
					var articles = G.get_all(data);

					if (articles.length == 0) {
						$("#trigger").remove();
						return false;
					} 

					G.tronque_content(articles, 'content', 150);


					for (i=0; i<articles.length; i++) {
						G.add_to_element("articles", articles[i]);
					}

					recursive_display(0, 5, G);
				
				});
			}

			// lancement initial de fetch_json
			fetch_json()
			



			/*
			** inview **
			*/
			$('#trigger').on('inview', function(event, isInView) {
				  if (isInView) {
				    // element is now visible in the viewport
				    fetch_json();

				  } else {
				    // element has gone out of viewport
				    // do nothing
				  }
				});
			


		});

		</script>

<?php $this->stop('main_content') ?>
