// declarar array global que contendra la lista de categorias
// var arrMovies = [] //aqui no va ;
showMovies()
// Llamar función de Jquery para acción de clic del botón addElement
$('#addElement').click(function(e){
	// Deshabilitar el envió por el protocolo HTTP
	e.preventDefault();

	// Traer valores del select de categoria id y nombre
	let idMovie = $("#movie").val();	
	let nameMovie = $("#movie option:selected").text(); //ojo con los espacios

	// Condicion de la funcion para 
	// Llenar el array con las categorias que seleccionemos
	if (idMovie != '') {
		if (typeof existMovie(idMovie) === 'undefined') {
			arrMovies.push({
				'id'  :idMovie,
				'name':nameMovie

			})
			console.log(arrMovies)
		}else{
			alert("La película ya se ha seleccionado")
		}
		showMovies()
	}else{
		alert("Seleccione una película por favor")
	}

});

// Metodo de validación para que no se repita la categoria
function existMovie(idMovie){
	let existMovie = arrMovies.find(function (movie){ //esta linea es como un for que tiene un as Movie
		return movie.id == idMovie // esta linea actua como un if
	})

	return existMovie //el metodo find() devuelve undefined si no encuentra nada
}

// Metodo para mostrar las peliculas
function showMovies(){
	$("#list-movies").empty() //asegurarme de que muestre las nuevas categorias

	arrMovies.forEach(function (movie){ //parametro Movie se utiliza abajo
		$("#list-movies").append('<div class="form-group"><button onclick="removeElement('+movie.id+')" class="btn btn-danger p-3 border-dark"><i class="fas fa-trash-alt fa-lg"></i></button> <span>  ' + movie.name+'</span></div>')//accede al nombre de la pelicula
	})
}

// Metodo para remover la categoría indeseada
function removeElement(idMovie){
	let index = arrMovies.indexOf(existMovie(idMovie)) //obtnego el indice
	arrMovies.splice(index,1) // remuevo el indice
	showMovies() //muestro de nuevo la lista
}

// Generar el metodo de envio al backend o BD
$("#submit").click(function(e){
	//deshabilitar el envio por HTTP
	e.preventDefault()

	let url = "?controller=rental&method=save"
	let params = {
		start_date: $("#start_date").val(),
		end_date:   $("#end_date").val(),
		total:      $("#total").val(),
		user_id: 	$("#user_id").val(),
		movies:     arrMovies,
		unit_price: $("#unit_price").val()
	}

	// metodo post usando ajax para enviar la info al backend
	$.post(url,params, function(response){
		// si la respuesta del request - o envió de la info fue exitosa
		if (typeof response.error !== 'undefined') {
			alert(response.message)
		}else{
			alert("Inserción Satisfactoria")

			// redireccion al modulo de listar películas
			location.href = "?controller=rental"
		}


		// En caso que falle el envió y el formato en que se debe enviar
	},'json').fail(function (error){
		alert("Inserción Fallida("+error.responseText+")")

	});

});



// Generar el metodo de envio al backend o BD
$("#update").click(function(e){
	//deshabilitar el envio por HTTP
	e.preventDefault()

	let url = "?controller=rental&method=update"
	let params = {
		id: $("#id").val(),
		start_date: $("#start_date").val(),
		end_date:   $("#end_date").val(),
		status_id: 	$("#status_id").val(),
		total:      $("#total").val(),
		user_id: 	$("#user_id").val(),
		movies:     arrMovies,
		unit_price: $("#unit_price").val()
	}

	// metodo post usando ajax para enviar la info al backend
	$.post(url,params, function(response){
		// si la respuesta del request - o envió de la info fue exitosa
		if (typeof response.error !== 'undefined') {
			alert(response.message)
		}else{
			alert("Actualización Satisfactoria")

			// redireccion al modulo de listar películas
			location.href = "?controller=rental"
		}


		// En caso que falle el envió y el formato en que se debe enviar
	},'json').fail(function (error){
		alert("Actualización Fallida("+error.responseText+")")

	});

});


// --------------------ejercicio de JS------------------------------------------------
// var formulario = document.getElementById("formMovie");

// formulario.addEventListener('submit',(e)=>{ //añadir un evento en escucha ese evento es el evento submit
// 	// console.log(e.target)
// 	e.preventDefault() //cancelar el proceso de redireccion que tiene por defecto el e
// 	// e.target es equivalente a formulario
// 	// accedemos a sus nodos hijos con childNodes, se almacenan objetos y se 
// 	// se ubican con indices el hijo del hijo del padre que tiene un hijo
// 	// que a su vez es padre
// 	let nombrep = e.target.childNodes[3].childNodes[5].value
// 	let descrip = e.target.childNodes[5].childNodes[3].value
	
// 	if (nombrep === '' && descrip === '') { //empty funciona igual
// 		alert('agregue los datos es una orden brrrrr')
// 	}

// 	var select  = e.target.childNodes[7].childNodes[3].options.selectedIndex
// 	console.log(e.target.childNodes[7].childNodes[3].options[select].innerText)
	// console.log(select)
	//for para obtener mas especifico en texto
	

	// patron de cadena

// });




