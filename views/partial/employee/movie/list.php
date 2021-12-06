<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de películas</h1>
		<div class="row justify-content-center my-2">
			<div class="col-12 col-sm-12 my-2">
				<h2 class="">Películas</h2>
				<a href="?controller=movie&method=add" class="btn btn-success ">Agregar</a>
			</div>
		</div>

		<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover stacktable datatable table-bordered table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Película</th>
			      <th scope="col">Descripción</th>
			      <th scope="col">Usuario</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Categorías</th>
			      <th scope="col"><i class="fas fa-power-off"></i></th>
			      <th scope="col">Editar</th>

			    </tr>
			  </thead>
			  <tbody>

			  	<?php foreach ($movies as $movie) : ?>
				    <tr>
				      <td><?php echo $movie->id ?></td>
				      <td><?php echo $movie->name ?></td>

				      

				      <td class="acortador" onfocus="funcion()"><?php echo $movie->description ?></td>

						<script>

						function funcion(){
			  				document.write(<?php echo $movie->description ?>);
			  				document.write('<?php echo $movie->description ?>');
			  		  	} 
						</script>
				       

				      <td><?php echo $movie->user ?></td>
				      <td><?php echo $movie->status ?></td>
				      <td>
				      	<a href="?controller=movie&method=listCategories&id=<?php echo $movie->id ?>" class="btn btn-info" title="Categorías :D" id="btnCategories">Categorías
				      	</a>
				      </td>
				      <td>
				      	
				      	<?php if ($movie->status_id==1) {

			      			?>
			      			
			      			<a href="?controller=movie&method=updateMovieStatus&id=<?php echo $movie->id ?>" class="btn btn-primary" class="btn btn-danger">Inactivar</a>
			      		<?php }else{				      	
			      			?> 
			      			<a href="?controller=movie&method=updateMovieStatus&id=<?php echo $movie->id ?>" class="btn btn-success" class="btn btn-danger">Activar</a>
			      		<?php } ?>
				      	<!-- <a href="?controller=movie&method=delete&id=<?php //echo $movie->id ?>" class="btn btn-danger" class="btn btn-danger">Eliminar</a> -->
				      </td>
				      <td>
				      	<?php if ($movie->status_id==1) {
				      		
				      	 ?>
				      	 <a href="?controller=movie&method=edit&id=<?php echo $movie->id ?>" class="btn btn-warning" class="btn btn-warning">Editar</a>
				      	<?php } ?>
				      </td>				      				      				      
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		

		</section>	
	</section>
</main>
