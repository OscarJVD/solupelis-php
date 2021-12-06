<?php 

/**
 * CLASE Type_statusController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Type_status.php';

class Type_statusController 
{
	private $model;

	public function __construct()
	{
		$this->model = new Type_status;
        if (!isset($_SESSION['user'])) //que sesion va a destruir si no existe
            header('Location: ?controller=login');

        if($_SESSION['user']->roles_id==3 || $_SESSION['user']->roles_id==2){
            header('Location: ?controller=login');
        }
	}

    public function index()
    {
    	require 'views/layout.php';
    	// Llamdo al metodo que trae la consulta
    	$type_statuses = $this->model->getAll();
    	require 'views/type_status/list.php';

    }

    // muestra la vista de crear
    public function add()
    {
        require 'views/layout.php';
        require 'views/type_status/new.php';

    }

    // realiza el proceso de guardar
    public function save()
    {

        $this->model->newType_status($_REQUEST);
        header('Location: ?controller=type_status');

    }

    // muestra la vista de editar
    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getType_statusById($id);
    
            require 'views/layout.php';
            require 'views/type_status/edit.php'; 

        }else{
            echo "Error :(";
        }
        
    }

    // realiza el proceso de editar
    public function update()
    {
        if(isset($_POST)){
            $this->model->editType_status($_POST);
            header('Location: ?controller=type_status');
        }else{
            echo "Error :(";
        }
    }


     // realiza el proceso de eliminar
    public function delete()
    {
        $this->model->deleteType_status($_REQUEST);
        header('Location: ?controller=type_status');
    }
}


 ?>