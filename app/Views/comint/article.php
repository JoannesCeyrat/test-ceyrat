<?php $this->layout('comint/layout', ['title' => $title, 'page2'=>$page2]) ?>


<?php $this->start('main_content') ?>
	
	<!-- row entete--> 
		<header class="container bgBlanc"  >
			<div class="row">

				<div class="col-xs-12" >	
					<div class="col-xs-12">				
						<h1><?=  $this->e($titre) ?></h1>
					</div>
					
				</div>

				

			</div>
		</header>


	<!-- row articles--> 
		<section class="container bgBlanc">
				<div class="row" >
					<div class="col-xs-12 content">
						<?php echo str_replace("\n", "<br>", $this->e($content)) ?>
					</div>	
					<div class="col-xs-12 signature">
						<h4><?= $this->e($author)." - <i>le ".$jour." à ".$heure."</i>" ?></h4>
					</div>
				</div>
		</section>


		<footer class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 ">
					<p class="margeTop"><a href="../" title="Retour page accueil du test" ><< Accueil </a> / <a href="../liste-articles" title="Retour page accueil du test" >Liste des articles </a></p>

				</div>

				<div class="col-xs-12 col-sm-6 ">	
						<h6>Recherche un autre titre</h6>
						<div id="bloodhound">				
							<input class="typeahead" type="text" placeholder="Titre de l'article">
						</div>
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
			  //console.log('Selection: ' + getID(suggestion) );
			  var id = getID(suggestion);
			  if (id==0) {
			  	alert("Article non disponible.");
			  }
			  else {
			  	location.href="../article/"+id;
			  }
			  
			});

			function getID(titre) {
				for (i=0; i<titles.length; i++) {
					if (titles[i].title == titre) {
						return titles[i].id
					}
				}
				return 0;
			}
		
			


		});

		</script>

<?php $this->stop('main_content') ?>
