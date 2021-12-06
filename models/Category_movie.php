<?php 

/**
 * Modelo de la tabla Movies
 * CRUD.php
 */
class Movie
{
	
	private $id;	
	private $movie_id;
	private $category_id;
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

	public function getCategoryMovie()
	{
		try {
			$strSql = "SELECT cm.id as id_cm,cm.movie_id,cm.category_id,cm.status_id,c.img_category,c.name,m.name as movie,s.status as status FROM category_movie cm 
			INNER JOIN statuses s ON s.id = cm.status_id
			INNER JOIN categories c ON c.id = cm.category_id
			INNER JOIN movie m ON m.id = cm.movie_id"; //el where va despues de los inners

			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function getCategoryMovieById($id_cm)
	{
		try {			
			$strSql = "SELECT cm.id as id_cm,cm.movie_id,cm.category_id,cm.status_id,c.img_category,c.name,m.name as movie,s.status as status FROM category_movie cm 
			INNER JOIN statuses s ON s.id = cm.status_id
			INNER JOIN categories c ON c.id = cm.category_id
			INNER JOIN movie m ON m.id = cm.movie_id 
			WHERE id_cm=:id_cm"; //el where va despues de los inners
			$arrayData = ['id_cm'=>$id_cm];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

?>