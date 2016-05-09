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


	


}