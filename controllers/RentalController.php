<?php 

/**
 * CLASE RentalController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Rental.php';
require 'models/Status.php';
require 'models/User.php';
require 'models/Movie.php';

class RentalController 
{

	private $model;
    private $status;
    private $user;
    private $movie;


	public function __construct()
	{
		$this->model = new Rental;
        $this->status = new Status;
        $this->user = new User;
        $this->movie = new Movie;
        if (!isset($_SESSION['user'])){ //que sesion va a destruir si no existe
            header('Location: ?controller=login');
        }

	}

    public function index()
    {
        if ($_SESSION['user']->roles_id==1) {
            require 'views/layout.php';
            // Llamdo al metodo que trae la consulta
            $rentals = $this->model->getAll();
            require 'views/rental/list.php';

        }elseif($_SESSION['user']->roles_id==2){
            require 'views/partial/employee/employee.php';
            $rentals = $this->model->getAll();
            require 'views/partial/employee/rental/list.php';

        }elseif ($_SESSION['user']->roles_id==3) {
            require 'views/partial/client/client.php';
            $rentals = $this->model->getAll();
            require 'views/partial/client/rental/list.php';
        }

    }

    public function listMovies()
    {

        if ($_SESSION['user']->roles_id==1 || $_SESSION['user']->roles_id==2) {
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $data = $this->model->getMoviesById($id);
                $movies = $this->movie->getAll();
                require 'views/layout.php';
                require 'views/fragments/movies.php';
            }else{
                echo "Algo salio mal :D";
            }

        }elseif ($_SESSION['user']->roles_id==3) {
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $data = $this->model->getMoviesById($id);
                $movies = $this->movie->getAll();
                require 'views/partial/client/client.php';
                require 'views/fragments/movies.php';
            }else{
                echo "Algo salio mal :D";
            }
        }

    }

    // muestra la vista de crear
    public function add()
    {
        if ($_SESSION['user']->roles_id==1 || $_SESSION['user']->roles_id==2) {
            require 'views/layout.php';
            $users = $this->user->getActiveUsers();
            $movies = $this->movie->getActiveMovies();
            require 'views/rental/new.php';

        }elseif ($_SESSION['user']->roles_id==3) {
            require 'views/partial/client/client.php';
            require 'views/partial/client/rental/new.php';
            // require 'views/errors/404/404.php';
        }
// VOY AQUI!-----------------------------
    }

    // realiza el proceso de guardar
    public function save()
    {
        // guardar en dos tablas rentals y su detalle 

        // organizar array para la tabla rentals
        $dataRental = 
        [
            'start_date'  => $_POST['start_date'],
            'end_date'    => $_POST['end_date'],
            'total'       => $_POST['total'],
            'user_id'    => $_POST['user_id'],
            'status_id'   => 1
        
        ];

        // armar datos para category_movie que llegan desde el frontend
        $arrayMovies = isset($_POST['movies']) ? $_POST['movies'] : [];
        $unit_price = isset($_POST['unit_price']) ? $_POST['unit_price'] : [];

        if (!empty($arrayMovies) && !empty($unit_price)) {

        // inserción de la renta
        $respRental = $this->model->newRental($dataRental);
        
        // obtener el ultimo id ingressado de la tabla rentals
        $lastIdRental = $this->model->getRentalLastId();

        // inserción a la tabla category_movie
        $respMovies = $this->model->saveMovies($arrayMovies,
            $lastIdRental[0]->id,$unit_price);
        
        }else{
            $respRental = false;
            $respMovies = false;
        }

        // validar si las inserciones se han hecho correctamente
        // trabajo mutuo entre controlador y modelo
        $arrayResp = [];

        if ($respRental == true && $respMovies == true) {
          $arrayResp = [
            'success' => true,
            'message' => "Alquiler generado con exito :D"
          ];
        }else{
          $arrayResp = [
            'error' => true, //js :/ ? 
            'message' => "Error generando el Alquiler, Pruebe diligencié los datos e intentelo nuevamente"
          ];
        }

        echo json_encode($arrayResp); 
        return;

    }

    // muestra la vista de editar
    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getRentalById($id);
            $statuses = $this->status->getAll();
            $users = $this->user->getActiveUsers();
            $movies = $this->movie->getActiveMovies();
            $moviesRental = $this->model->getMovies($id);
            require 'views/layout.php';
            require 'views/rental/edit.php'; 

        }else{
            echo "Error :(";
        }
        
    }

    // realiza el proceso de editar
    public function update()
    {
        $arrayResp = [];
        if(isset($_POST)){
            $dataRental = 
            [
                'id'  => $_POST['id'],
                'start_date'  => $_POST['start_date'],
                'end_date'    => $_POST['end_date'],
                'status_id'   => $_POST['status_id'],
                'total'       => $_POST['total'],
                'user_id'    => $_POST['user_id']
            
            ];
    
            // armar datos para category_movie que llegan desde el frontend
            $arrayMovies = isset($_POST['movies']) ? $_POST['movies'] : [];
            $unit_price = isset($_POST['unit_price']) ? $_POST['unit_price'] : [];
    
            if (!empty($arrayMovies) && !empty($unit_price)) {
    
            // inserción de la renta
            $respRental = $this->model->editRental($dataRental);
            
            // metodo para eliminar películas de movie_rental
            $this->model->deleteMovies($_POST['id']);

            // inserción a la tabla category_movie
            $respMovies = $this->model->saveMovies($arrayMovies, $_POST['id'],$unit_price);
            
            }else{
                $respRental = false;
                $respMovies = false;
            }
        }else{
            $arrayResp = [
                'error' => true, //js :/ ? 
                'message' => "Error actualizando el Alquiler, Pruebe diligencié los datos e intentelo nuevamente"
              ];
        }
        
        echo json_encode($arrayResp); 
        return;
    }


    public function updateRentalStatus()
    {
        $rental = $this->model->getRentalById($_REQUEST['id']);
       

        if ($rental[0]->status_id==1) {
            $data = [
                        'id' =>$rental[0]->id,
                        'status_id' => 2
                    ];
        }elseif($rental[0]->status_id==2){
            $data = [
                        'id' =>$rental[0]->id,
                        'status_id' => 1
                    ];
        }
        $this->model->editRentalStatus($data);
        header('Location: ?controller=rental');


    }

}


 ?>