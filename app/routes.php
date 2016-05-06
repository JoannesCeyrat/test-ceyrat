<?php
	
	$w_routes = array(
		['GET', '/', 'Home#home', 'default_home'],
		['GET', '/jsonHome', 'Home#getJson', 'jsonHome'],
		['GET', '/maintenance', 'Back#display_form', 'back'],
		['POST', '/maintenance', 'Back#receive_form', 'back_receive'],
	);