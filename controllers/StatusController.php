<?php 

/**
 * CLASE StatusController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Status.php';
require 'models/Type_status.php';

class StatusController 
{
    private $model;
    private $type_status;


    public function __construct()
    {
        $this->model = new Status;
        $this->type_status = new Type_status;
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
        $statuses = $this->model->getAll();
        require 'views/status/list.php';

    }

    // muestra la vista de crear
    public function add()
    {
        $type_statuses = $this->type_status->getAll();
        require 'views/layout.php';
        require 'views/status/new.php';

    }

    // realiza el proceso de guardar
    public function save()
    {

        $this->model->newStatus($_REQUEST);
        header('Location: ?controller=status');

    }

    // muestra la vista de editar
    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getStatusById($id);
            $type_statuses = $this->type_status->getAll();
            require 'views/layout.php';
            require 'views/status/edit.php'; 


        }else{
            echo "Error :(";
        }
        
    }

    // realiza el proceso de editar
    public function update()
    {
        if(isset($_POST)){
            $this->model->editStatus($_POST);
            header('Location: ?controller=status');
        }else{
            echo "Error :(";
        }
    }


     // realiza el proceso de eliminar
    public function delete()
    {
        $this->model->deleteStatus($_REQUEST);
        header('Location: ?controller=status');
    }
}


 ?>