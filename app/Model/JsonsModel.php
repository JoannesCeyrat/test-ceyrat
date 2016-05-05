<?php /* app/Model/JsonsModel.php */
namespace Model;

class JsonsModel extends \W\Model\Model 
{
	//Récupère les commentaires associés à un article

	public  function findJson($id)
	{
		$this->setTable("jsons");

		$data = $this->find($id);

		return $data;
	}

}