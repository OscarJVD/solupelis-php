<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class Rental
{			
	private $id;	
	private $start_date;
	private $end_date;
	private $status_id;
	private $total;
	private $user_id;
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
			$strSql = "SELECT re.*,s.status as status,u.name as user FROM rentals re INNER JOIN statuses s ON s.id = re.status_id
						INNER JOIN users u ON u.id = re.user_id ORDER BY re.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    
    // peticion request
	public function newRental($data)
	{
		try {
			$this->pdo->insert('rentals', $data);
			return true;
		} catch (PDOException $e){
			return $e->getMessage();
		}
	}

	public function getRentalById($id)
	{
		try {			
			$strSql = "SELECT * FROM rentals WHERE id=:id";
			$arrayData = ['id'=>$id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getMoviesById($rental_id)
	{
		try {			
			$strSql = "call sp_getMoviesById(:rental_id)";
			$arrayData = [ 'rental_id' => $rental_id ];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getRentalLastId()
	{
		try {			
			$strSql = "SELECT MAX(id) as id FROM rentals";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function editRental($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->update('rentals',$data,$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editRentalStatus($data){
		try {
			$strWhere = 'id =' . $data['id'];
			$this->pdo->update('rentals',$data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function saveMovies($arrayMovies,$lastIdRental,$unit_price)
	{
		try {
			$unit_p = $unit_price;
			foreach ($arrayMovies as $movies) {
				$data = [
					'rental_id' => $lastIdRental,
					'movie_id' => $movies['id'],
					'unit_price' => $unit_price
					
				];
				
				$this->pdo->insert('movie_rental', $data);
			}
			return true;
		} catch (PDOException $e){
			return $e->getMessage();
		}
	}

	public function getMovies($rental_id)
	{
		try {			
			$strSql = "SELECT mr.*,m.name as name FROM movie_rental mr 
			INNER JOIN movie m ON m.id = mr.movie_id 
			WHERE mr.rental_id = '{$rental_id}' ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function deleteMovies($id)
	{
		try {
			$strWhere = 'rental_id=' . $id;
			$this->pdo->delete('movie_rental',$strWhere);
			// var_dump($strWhere);
			// exit(); 
			return true;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

}

 ?>