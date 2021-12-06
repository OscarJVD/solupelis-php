<?php 

/**
 * CLASE MovieController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Movie.php';
require 'models/User.php';
require 'models/Status.php';
require 'models/Category.php';
// require 'models/Category_movie.php';

class MovieController 
{
    private $model;
    private $user;
    private $status;
    private $category;
    // private $category_movie;

    public function __construct()
    {
        try{
            $this->model = new Movie;
            $this->user = new User;
            $this->status = new Status;
            $this->category = new Category;
            if (!isset($_SESSION['user'])) 
                header('Location: ?controller=login');

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function index()
    {
        if ($_SESSION['user']->roles_id==1) {
            require 'views/layout.php';
            $movies = $this->model->getAll();
            require 'views/movie/list.php';

        }elseif($_SESSION['user']->roles_id==2){
            require 'views/partial/employee/employee.php';
            $movies = $this->model->getAll();
            require 'views/partial/employee/movie/list.php';

        }elseif ($_SESSION['user']->roles_id==3) {
            require 'views/partial/client/client.php';
            $movies = $this->model->getAll();
            require 'views/partial/client/movie/list.php';
        }

    }

    public function listCategories(){

        if ($_SESSION['user']->roles_id==1 || $_SESSION['user']->roles_id==2) {
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $data = $this->model->getCategoriesMovieById($id);
                $categories = $this->category->getAll();
                require 'views/layout.php';
                require 'views/fragments/categories.php';
            }else{
                echo "Algo salio mal :D";
            }

        }elseif ($_SESSION['user']->roles_id==3) {
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $data = $this->model->getCategoriesMovieById($id);
                $categories = $this->category->getAll();
                require 'views/partial/client/client.php';
                require 'views/fragments/categories.php';
            }else{
                echo "Algo salio mal :D";
            }

            // require 'views/errors/404/404.php';
        }

    }


    // muestra la vista de crear
    public function add()
    {
        if ($_SESSION['user']->roles_id==1 || $_SESSION['user']->roles_id==2) {
            require 'views/layout.php';
            $users = $this->user->getActiveUsers();
            $categories = $this->category->getActiveCategories();
            require 'views/movie/new.php';

        }elseif ($_SESSION['user']->roles_id==3) {
            require 'views/errors/404/404.php';
        }

    }

    // realiza el proceso de guardar
    public function save()
    {
        // guardar en dos tablas movie y su detalle 

        // organizar array para la tabla movie
        $dataMovie = 
        [
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'users_id'    => $_POST['users_id'],
            'status_id'   => 1
        
        ];

        // armar datos para category_movie que llegan desde el frontend
        $arrayCategories = isset($_POST['categories']) ? $_POST['categories'] : [];

        if (!empty($arrayCategories)) {

        // inserción de la película
        $respMovie = $this->model->newMovie($dataMovie);

        // obtener el ultimo id ingressado de la tabla movie
        $lastIdMovie = $this->model->getMovieLastId();

        // inserción a la tabla category_movie
        $respCategoryMovie = $this->model->saveCategoryMovie($arrayCategories,
            $lastIdMovie[0]->id);
        
        }else{
            $respMovie = false;
            $respCategoryMovie = false;
        }

        // validar si las inserciones se han hecho correctamente
        // trabajo mutuo entre controlador y modelo
        $arrayResp = [];

        if ($respMovie == true && $respCategoryMovie == true) {
          $arrayResp = [
            'success' => true,
            'message' => "Película creada con exito :D"
          ];
        }else{
          $arrayResp = [
            'error' => true, //js :/ ? 
            'message' => "Error creando la Película"
          ];
        }

        echo json_encode($arrayResp); 
        return;

    }

    // muestra la vista de editar
    public function edit()
    {
        if ($_SESSION['user']->roles_id == 1 || $_SESSION['user']->roles_id == 2) {
            if (isset($_REQUEST['id'])) {
                $id                = $_REQUEST['id'];
                $data              = $this->model   ->  getMovieById($id);
                $statuses          = $this->status  ->  getAll();
                $users             = $this->user    ->  getActiveUsers();
                $categories        = $this->category->  getActiveCategories();
                $categoriesMovie   = $this->model   ->  getCategoriesMovie($id);

                require 'views/layout.php';
                require 'views/movie/edit.php'; 

            }else{
                echo "Error :(";
            }

        }elseif ($_SESSION['user']->roles_id==3) {
            require 'views/errors/404/404.php';
        }
        
    }

    // realiza el proceso de editar
    public function update()
    {
        // validar si las inserciones se han hecho correctamente
        // trabajo mutuo entre controlador y modelo
        $arrayResp = [];

        if(isset($_POST)){
        // guardar en dos tablas movie y su detalle 

        // organizar array para la tabla movie
        $dataMovie = 
        [
            'id'        => $_POST['id'],
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'users_id'    => $_POST['users_id'],
            'status_id'   => $_POST['status_id']
        
        ];

        // armar datos para category_movie que llegan desde el frontend
        $arrayCategories = isset($_POST['categories']) ? $_POST['categories'] : [];

            if (!empty($arrayCategories)) {

            // inserción de la película
            $respMovie = $this->model->editMovie($dataMovie);

            // crear metodo para eliminar las categorias de category_movie  
            $this->model->deleteCategoryMovie($_POST['id']);

            // inserción a la tabla category_movie
            $respCategoryMovie = $this->model->saveCategoryMovie($arrayCategories,
                $_POST['id']);
            
            }else{
                $respMovie = false;
                $respCategoryMovie = false;
            }

        }else{
          $arrayResp = [
            'error' => true, //js :/ ? 
            'message' => "Error creando la Película"
          ];
        }
        echo json_encode($arrayResp); 
        return;
    }

    public function updateMovieStatus()
    {
        $movie = $this->model->getMovieById($_REQUEST['id']);
       

        if ($movie[0]->status_id==1) {
            $data = [
                        'id' =>$movie[0]->id,
                        'status_id' => 2
                    ];
        }elseif($movie[0]->status_id==2){
            $data = [
                        'id' =>$movie[0]->id,
                        'status_id' => 1
                    ];
        }
        $this->model->editMovieStatus($data);
        header('Location: ?controller=movie');


    }
}


 ?>