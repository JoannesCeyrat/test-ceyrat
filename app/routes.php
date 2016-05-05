<?php
	
	$w_routes = array(
		['GET', '/', 'Home#home', 'default_home'],
		['GET', '/jsonHome', 'Home#getJson', 'jsonHome'],
	);