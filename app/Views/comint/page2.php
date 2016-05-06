<?php $this->layout('comint/layout', ['title' => $title, 'slider'=>false]) ?>


<?php $this->start('main_content') ?>
	
	<!-- row entete--> 
		<div class="container">
			<div class="row">

				<div class="col-xs-6">					
					<h1>Articles de la base</h1>
				</div>

				<div class="col-xs-6">					
					<p>moteur</p>
				</div>

			</div>
		</div>


	<!-- row articles--> 
		<div class="container bgBlanc">
				<div class="row" id="articles">

				</div>
		</div>
	

		<script type="text/javascript">

		$(document).ready( function() {

			// aller chercher le json
			// ->  option enchainement par functions
			// -> $.getJSON( "./jsonHome", five_last );

			// ->option gestionnaire objet 
			$.getJSON( "./jsonFromTableArticles", function(data) {

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


		});

		</script>

<?php $this->stop('main_content') ?>
