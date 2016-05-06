<?php

namespace Controller;

use \W\Controller\Controller;
use Model\JsonsModel;

class HomeController extends Controller
{

	/*
	* methode appelée par une demand de json
	* 
	* @param  void
    * @return json
	*/
	public function getJson()
	{
		/*
		* $mModel = new JsonsModel;
		* $row = $mModel->->findJson(2);
		*
		* une ligne c'est plus clair */
		$row = (new JsonsModel)->findJson(2);

		/* si on ne trouve pas le json dans la bdd */
		if ( empty($row) ) {
			$this->showJson( json_decode('[{"id": 1, "title": "Pas encore d\'articles dans la base.", "content": "", "date_add": "'.date("Y-m-d H:i:s").'", "author": "Joannes CEYRAT"}]') ); 
		}

		$this->showJson( json_decode($row["json"]) ); 
		
	}



	/*
	* methode appelée pour afficher la home page
	* 
	* @param  void
    * @return affichage de la vue comint/home
	*/
	public function home()
	{
		$tab_img_slider = ["1.jpg", "2.jpg", "3.jpg", "4.jpg"];
		$this->show('comint/home', ['title' => 'Home de Joannes CEYRAT', "tab_img_slider"=>$tab_img_slider]);
	}




	public function page2()
	{
		$this->show('comint/page2', ['title' => 'Page 2 de Joannes CEYRAT', "tab_img_slider"=>false]);
	}
}