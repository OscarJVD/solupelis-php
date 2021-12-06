<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class Type_status
{
	
	private $id;	
	private $name;
	private $pdo;


	public function __construct()
	{
    	try {
    		$this->pdo = new Database;
    	} catch (PDOException $e) {
    		die($e->getMessage());
    	}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT * FROM type_statuses ORDER BY id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    
    // peticion request
	public function newType_status($data)
	{
		try {
			$this->pdo->insert('type_statuses', $data);
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function getType_statusById($id)
	{
		try {			
			$strSql = "SELECT * FROM type_statuses WHERE id=:id";
			$arrayData = ['id'=>$id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function editType_status($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->update('type_statuses',$data,$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function deleteType_status($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->delete('type_statuses',$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

 ?>