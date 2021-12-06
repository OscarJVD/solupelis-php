<?php 

/**
 * CONEXION Y ESTANDAR DE CONTROL DE LA CRUD
 * CRUD GENERICO
 */

class Database extends PDO
{
	
	// definir atributos
	private $driver = 'mysql';
	private $host = 'localhost';
	private $dbName = 'solupelis';
	private $charset = 'utf8';
    private $user = 'root';
    private $password = '';

    // sobrecarga al constructor con cadena de conexion a la BD
	public function __construct()
	{
		try{
			// ESTANDAR
			// Hola jdajsdl
			parent::__construct("{$this->driver}:host={$this->host};
				dbname={$this->dbName}; charset={$this->charset}",$this->user,$this->password);
	        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
 			echo "Conexión Fallida {$e->getMessage()}";
        }

	}

	public function select($strSql, $arrayData = array(), $fetchMode=PDO::FETCH_OBJ)
	{ 
		// prepara al query
    	$query = $this->prepare($strSql);

        // asigna parametros al query si llegan como un array
    	foreach ($arrayData as $key => $value) {
    		
    		$query->bindParam(":$key",$value);	
    	}
        
        // valida si se ejecuta o no el query
    	if (!$query->execute()) {

    		echo "La consulta no se realizo";

    	}else{
            // devuelve el objeto del query
    		return $query->fetchAll($fetchMode);

    	}
	}

	public function insert($table, $data)
	{
		try {
			ksort($data);
			unset($data['controller'], $data['method']);
			$fieldNames = implode('`, `', array_keys($data));
			$fieldValues = ':' . implode(', :', array_keys($data));
			$strSql = $this->prepare("INSERT INTO $table (`$fieldNames`)VALUES ($fieldValues)");

			foreach ($data as $key => $value) {
				$strSql->bindValue(":$key", $value);
			}

			$strSql->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function update($table,$data,$where)
	{
		try {
			ksort($data);
			$fieldDetails=null;
			foreach ($data as $key => $value) {
				$fieldDetails .= "`$key` =:$key,";
			}
			$fieldDetails = rtrim($fieldDetails, ',');

			$strSql = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

			foreach ($data as $key => $value) {
				$strSql->bindValue(":$key", $value);
			}
			$strSql->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function delete($table,$where)
	{
		try {
			return $this->exec("DELETE FROM $table WHERE $where");
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


}




 ?>