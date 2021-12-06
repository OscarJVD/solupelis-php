<?php 

/**
 * CLASE UserController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/User.php';
require 'models/Status.php';
require 'models/Role.php';

class UserController 
{
	private $model;
    private $status;
    private $role;

	public function __construct()//esta vaina es lo primero que se ejecuta todo weon
	{
		$this->model = new User;
        $this->status = new Status;
        $this->role = new Role;
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
    	$users = $this->model->getAll();
    	require 'views/user/list.php';

    }

    // muestra la vista de crear
    public function add()
    {
        require 'views/layout.php';
        $roles = $this->role->getActiveRoles();
        require 'views/user/new.php';

    }

    // realiza el proceso de guardar
    public function save()
    {

        $this->model->newUser($_REQUEST);
        header('Location: ?controller=user');

    }

    // muestra la vista de editar
    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getUserById($id);
            $statuses = $this->status->getAll();
            $roles = $this->role->getActiveRoles();
            require 'views/layout.php';
            require 'views/user/edit.php'; 

        }else{
            echo "Error :(";
        }
        
    }

    // realiza el proceso de editar
    public function update()
    {
        if(isset($_POST)){
            $this->model->editUser($_POST);
            header('Location: ?controller=user');
        }else{
            echo "Error :(";
        }
    }


    public function updateUserStatus()
    {
        $user = $this->model->getUserById($_REQUEST['id']);
       

        if ($user[0]->status_id==1) {
            $data = [
                        'id' =>$user[0]->id,
                        'status_id' => 2
                    ];
        }elseif($user[0]->status_id==2){
            $data = [
                        'id' =>$user[0]->id,
                        'status_id' => 1
                    ];
        }
        $this->model->editUserStatus($data);
        header('Location: ?controller=user');


    }

 
}


 ?>