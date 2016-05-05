<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

	<link media="all" type="texx/css" rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<script src="http://localhost<?= $this->assetUrl('/scripts/jquery.flexslider-min.js') ?>"></script>

	<title><?= $title ?></title>

</head>

	<body>

	hello from home.
		


	<script type="text/javascript">

	$(document).ready( function() {

		// aller chercher le json
		$.getJSON( "./jsonHome", five_last );
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
		
		console.log(lasts_articles, 0);
		//console.log(json_resp[0].date_add<json_resp[1].date_add);

	}


	/*****
	* ajoute au dom les articles
	* typiquement ici angular ferait le job avec sa boucle initialisée avec latsts_articles.
	***/
	function display_last_five(lasts_articles, added) {

	}

		
	</script>								

	</body>
</html>
