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

	/*
	* @param void
	* @return array of all $row de la table articles
	*/
	public  function get_all()
	{
		$this->setTable("articles");

		$data = $this->findAll();

		return $data;
	}


	/*
	* @param index from of LIMIT
	* @return array of all $row de la table articles
	*/
	public  function get_five($from)
	{
		$this->setTable("articles");

		$data = $this->findAll("id", "ASC", intval(5), intval($from));

		return $data;
	}


	/*
	* 
	* @return string of json of all id : titles de la table articles
	*/
	public  function get_titles()
	{
		$data = $this->get_all();

		/*s'il n'y a pas d'articles, 
		* @ return []
		*/
		if (empty($data)) {
			return "[]";
		}


		$str_json_titles="[";
		foreach ($data as $row) {
			//array_push($arr_titles, ["id"=>$row["id"], "name"=>$row["title"]]);
			$str_json_titles.="{id:".$row["id"].", title:\"".$row["title"]."\"},";
		}
		
		$str_json_titles=substr($str_json_titles, 0, -1);
		$str_json_titles.="]";
		return $str_json_titles;
	}


	/*
	* @param index from of LIMIT
	* @return array of all $row de la table articles
	*/
	public  function get_article($id)
	{
		$this->setTable("articles");

		$data = $this->find($id);

		return $data;
	}


}