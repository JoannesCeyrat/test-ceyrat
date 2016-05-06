<?php
	
	$w_routes = array(
		//front
		['GET', '/', 'Home#home', 'default_home'],
		['GET', '/jsonHome', 'Home#getJson', 'jsonHome'],
		['GET', '/page2', 'Home#page2', 'page2'],

		// back
		['GET', '/maintenance', 'Back#display_form', 'back'],
		['POST', '/maintenance', 'Back#receive_form', 'back_receive'],
	);