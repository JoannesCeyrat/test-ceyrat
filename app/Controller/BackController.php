<?php

namespace Controller;

use \W\Controller\Controller;
use Model\ArticlesModel;

class BackController extends Controller
{

	
	public function display_form()
	{
		
		$this->show('comint/back/formulaire', ['title' => 'Saisie jSon']);
		
	}


	

	public function receive_form()
	{
		
		// en cas erreur de recption fichier
		if ( !is_uploaded_file($_FILES['lejs']['tmp_name'])) {		   
		   	 $this->show('comint/back/no_file_upload', ['title' => 'Erreur upload json', 'message'=>'Oups, je n\'ai pas reçu votre fichier' ]);  
		} 


		$fichier_content = file_get_contents($_FILES['lejs']['tmp_name']);
		$json_arr = json_decode($fichier_content, true);

		// erreur dans le format ou contenu
	   	if ( empty($json_arr) ){
	   		$this->show('comint/back/no_file_upload', ['title' => 'Erreur parse json', 'message'=>'Le fichier uploadé ne répond pas correctement au format json' ]);
	   	}

	   	$mArticlesModel = new ArticlesModel;
	   	foreach ($json_arr as $obj) {
	   		$row = $mArticlesModel->add_article($obj);

	   		if ( empty($row) ){
	   			$this->show('comint/back/no_file_upload', ['title' => 'Erreur insert json', 'message'=>'Erreur d\'insertion : '.implode(",", $obj) ]);
	   		}
	   	}

		$this->show('comint/back/no_file_upload', ['title' => 'OK import json', 'message'=>'Le fichier uploadé est correctement importé' ]);	
		
	}


	

}