// declarar array global que contendra la lista de categorias
// var arrCategories = [] //aqui no va ;
showCategories()
// Llamar función de Jquery para acción de clic del botón addElement
$('#addElement').click(function(e){
	// Deshabilitar el envió por el protocolo HTTP
	e.preventDefault();

	// Traer valores del select de categoria id y nombre
	let idCategory = $("#category").val();	
	let nameCategory = $("#category option:selected").text(); //ojo con los espacios

	// Condicion de la funcion para 
	// Llenar el array con las categorias que seleccionemos
	if (idCategory != '') {
		if (typeof existCategory(idCategory) === 'undefined') {
			arrCategories.push({
				'id'  :idCategory,
				'name':nameCategory
			})
			console.log(arrCategories)
		}else{
			alert("La categoria ya se ha seleccionado")
		}
		showCategories()
	}else{
		alert("Seleccione una categoría por favor")
	}

});

// Metodo de validación para que no se repita la categoria
function existCategory(idCategory){
	let existCategory = arrCategories.find(function (category){ //esta linea es como un for que tiene un as category
		return category.id == idCategory // esta linea actua como un if
	})

	return existCategory //el metodo find() devuelve undefined si no encuentra nada
}

// Metodo para mostrar las categorias
function showCategories(){
	$("#list-categories").empty() //asegurarme de que muestre las nuevas categorias

	arrCategories.forEach(function (category){ //parametro category se utiliza abajo
		$("#list-categories").append('<div class="form-group"><button onclick="removeElement('+category.id+')" class="btn btn-danger p-3 border-dark"><i class="fas fa-trash-alt fa-lg"></i></button> <span>  ' +  category.name+'</span></div>')//accede al nombre de la categoria
	})
}

// Metodo para remover la categoría indeseada
function removeElement(idCategory){
	let index = arrCategories.indexOf(existCategory(idCategory)) //obtnego el indice
	arrCategories.splice(index,1) // remuevo el indice
	showCategories() //muestro de nuevo la lista
	console.log(arrCategories)
}

// Generar el metodo de envio al backend o BD
$("#submit").click(function(e){
	//deshabilitar el envio por HTTP
	e.preventDefault()

	let url = "?controller=movie&method=save"
	let params = {
		name: 		 $("#name").val(),
		description: $("#description").val(),
		users_id: 	 $("#users_id").val(),
		categories:  arrCategories
	}

	// metodo post usando ajax para enviar la info al backend
	$.post(url,params, function(response){
		// si la respuesta del request - o envió de la info fue exitosa
		if (typeof response.error !== 'undefined') {
			alert(response.message)
		}else{
			alert("Inserción Satisfactoria")

			// redireccion al modulo de listar películas
			location.href = "?controller=movie"
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

	let url = "?controller=movie&method=update"
	let params = {
		id: 		 $("#id").val(),
		name: 		 $("#name").val(),
		description: $("#description").val(),
		users_id: 	 $("#users_id").val(),
		status_id: 	 $("#status_id").val(),
		categories:  arrCategories
	}

	// metodo post usando ajax para enviar la info al backend
	$.post(url,params, function(response){
		// si la respuesta del request - o envió de la info fue exitosa
		if (typeof response.error !== 'undefined') {
			alert(response.message)
		}else{
			alert("Actualización Satisfactoria")

			// redireccion al modulo de listar películas
			location.href = "?controller=movie"
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




