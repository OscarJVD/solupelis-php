<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class Status
{
		
	private $id;	
	private $status;
	private $type_statuses_id;
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
			$strSql = "SELECT s.*,t.name as type_status FROM statuses s 
			INNER JOIN type_statuses t ON t.id = s.type_statuses_id ORDER BY s.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    
    // peticion request
	public function newStatus($data)
	{
		try {
			$this->pdo->insert('statuses', $data);
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function getStatusById($id)
	{
		try {			
			$strSql = "SELECT * FROM statuses WHERE id=:id";
			$arrayData = ['id'=>$id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function editStatus($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->update('statuses',$data,$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function deleteStatus($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->delete('statuses',$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

 ?>