<?php 

/**
 * Modelo de la tabla Movies
 * CRUD.php
 */
class Movie
{
	
	private $id;	
	private $name;
	private $description;
	private $users_id;
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
			$strSql = "SELECT m.*,s.status as status,u.name as user FROM movie m 
			INNER JOIN statuses s ON s.id = m.status_id
			INNER JOIN users u ON u.id = m.users_id 
			ORDER BY m.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getActiveMovies()
	{
		try {
			$strSql = "SELECT m.*,s.status as status,u.name as user FROM movie m 
			INNER JOIN statuses s ON s.id = m.status_id
			INNER JOIN users u ON u.id = m.users_id
			WHERE m.status_id = 1 
			ORDER BY m.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

    // peticion request
	public function newMovie($data)
	{
		try {
			$this->pdo->insert('movie', $data);
			return true;
		} catch (PDOException $e){
			return $e->getMessage();
		}
	}

	public function getMovieById($id)
	{
		try {			
			$strSql = "SELECT * FROM movie WHERE id=:id";
			$arrayData = ['id'=>$id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getCategoriesMovieById($id_movie)
	{
		try {			
			$strSql = "call sp_getCategoriesById(:id_movie)";
			$arrayData = [ 'id_movie' => $id_movie ];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getMovieLastId()
	{
		try {			
			$strSql = "SELECT MAX(id) as id FROM movie";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}



	public function editMovie($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->update('movie',$data,$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function editMovieStatus($data){
		try {
			$strWhere = 'id =' . $data['id'];
			$this->pdo->update('movie',$data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function saveCategoryMovie($arrayCategories,$lastIdMovie)
	{
		try {
			foreach ($arrayCategories as $category) {
				$data = [
					'movie_id' => $lastIdMovie,
					'category_id' => $category['id'],
					'status_id' => 1
				];
				
				$this->pdo->insert('category_movie', $data);
			}
			return true;
		} catch (PDOException $e){
			return $e->getMessage();
		}
	}

	public function getCategoriesMovie($movie_id)
	{
		try {			
			$strSql = "SELECT cm.*,c.name as name FROM category_movie cm 
			INNER JOIN categories c ON c.id = cm.category_id 
			WHERE cm.movie_id = '{$movie_id}'";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function deleteCategoryMovie($id)
	{
		try {
			$strWhere = 'movie_id=' . $id;
			$this->pdo->delete('category_movie',$strWhere);
			// var_dump($strWhere);
			// exit();
			return true;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

}

?>