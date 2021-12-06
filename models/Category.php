<?php 

/**
 * Modelo de la tabla Categorys
 * CRUD.php
 */
class Category
{
	
	private $id;	
	private $name;
	private $status_id;
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
			$strSql = "SELECT c.*,s.status as status FROM categories c INNER JOIN statuses s ON s.id = c.status_id ORDER BY c.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getActiveCategories()
	{
		try {
			$strSql = "SELECT c.*,s.status as status FROM categories c INNER JOIN statuses s ON s.id = c.status_id WHERE c.status_id = 1 ORDER BY c.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    

    // peticion request
	public function newCategory($data)
	{
		try {
			$data['status_id'] = 1;
			$this->pdo->insert('categories', $data);
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function getCategoryById($id)
	{
		try {			
			$strSql = "SELECT * FROM categories WHERE id=:id";
			$arrayData = ['id'=>$id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function editCategory($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->update('categories',$data,$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editCategoryStatus($data){
		try {
			$strWhere = 'id =' . $data['id'];
			$this->pdo->update('categories',$data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

 ?>