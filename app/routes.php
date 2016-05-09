<?php
	
	$w_routes = array(
		//front
		['GET', '/', 'Home#home', 'home'],
		['GET', '/jsonHome', 'Home#getJson', 'jsonHome'],
		['GET', '/liste-articles', 'Home#liste_articles', 'liste'],
		['GET', '/article/[:id]', 'Home#article', 'article'],
		['GET', '/jsonFromTableArticles/[:from]', 'Home#getJsonFromTableArticles', 'jsonFromTableArticles'],


		// back
		['GET', '/maintenance', 'Back#display_form', 'back'],
		['POST', '/maintenance', 'Back#receive_form', 'back_receive'],
	);