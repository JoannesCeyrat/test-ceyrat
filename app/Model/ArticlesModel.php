<?php /* app/Model/JsonsModel.php */
namespace Model;

class ArticlesModel extends \W\Model\Model 
{
	//Récupère les commentaires associés à un article

	public  function add_article(array $arr)
	{
		
		$checked_arr = $this->verif_article($arr);

		if ( empty( $checked_arr ) ) {
			return [];
		}
		
		$row = $this->insert($checked_arr, true);

		return $row;
	}


	/*
	/* @param array => objet json
	/* @return array => clean array for insertion in database
	*/
	public function verif_article(array $arr)
	{
		$keys_needed=["title", "content", "date_add", "author"];
		$tab_r=[];
		
		foreach ($keys_needed as $key) {
			if ( !array_key_exists($key , $arr ) ){
				return [];
			}
			
			$tab_r[$key]=$arr[$key];	
		}

		return $tab_r;
	}

}