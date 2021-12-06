<?php 
    session_start(); //1. Asunto de las sesiones

	require 'providers/Database.php'; //llamando clase conexion

	$controller = 'LoginController'; //2.
     
     // QUE SI NO EXISTE UNA SOLICITUD DEL FRONT 
	if (!isset($_REQUEST['controller'])){
		require 'controllers/'.$controller.'.php';

		$controller = ucwords($controller); //AQUI PARSEA
		// ES UNA INSTANCIA DE UN OBJETO DEL CONTROLADOR 
		// QUE SE ESTA DEFINIENDO EN LA VARIABLE CONTROLLER
		$controller = new $controller;
		// NOS ABRE LA VISTA DEL INDEX
		$controller->index();

	// SI SI EXISTE UNA PETICION DEL FRONT
	}else{

		$controller = ucwords($_REQUEST['controller'].'Controller');
		$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'index';
        
        require 'controllers/'.$controller.'.php';
        $controller = new $controller;

        // funcion para llamar al controlador y ejecutar el metodo
        call_user_func(array($controller, $method));
	}




 ?>