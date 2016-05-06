<?php /* app/Model/JsonsModel.php */
namespace Model;

class JsonsModel extends \W\Model\Model 
{
	
	/*
	* @param id de la table jsons
	* @return array $row
	*/
	public  function findJson($id)
	{
		$this->setTable("jsons");

		$data = $this->find($id);

		return $data;
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


}