<?php

namespace Controller;

use \W\Controller\Controller;
use Model\JsonsModel;
use Model\ArticlesModel;

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
	* methode appelée par une demande de json from table articles
	* 
	* @param  void
    * @return json
	*/
	public function getJsonFromTableArticles($from)
	{
		
		//$json_arr = (new JsonsModel)->get_all();
		$json_arr = (new ArticlesModel)->get_five($from);


		$this->showJson( $json_arr ); 

		
	}


	/*
	* methode appelée pour afficher les vues
	* 
	* @param  void
    * @return affichage des vues
	*/
	public function home()
	{
		$tab_img_slider = ["1.jpg", "2.jpg", "3.jpg", "4.jpg"];
		$this->show('comint/home', ['title' => 'Home de Joannes CEYRAT', "tab_img_slider"=>$tab_img_slider]);
	}




	public function page2()
	{
		$arr_json = (new ArticlesModel)->get_titles();
		$this->show('comint/page2', ['title' => 'Page 2 de Joannes CEYRAT',  "arr_json"=>$arr_json, "page2"=>true]);
	}



}