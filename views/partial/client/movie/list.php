<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de películas</h1>
		<div class="row justify-content-center my-2">
			<div class="col-12 col-sm-12 my-2">
				<h2 class="">Películas</h2>
			</div>
		</div>

		<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover datatable table-bordered table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Película</th>
			      <th scope="col">Descripción</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Categorías</th>
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
				      <td><?php echo $movie->status ?></td>
				      <td>
				      	<a href="?controller=movie&method=listCategories&id=<?php echo $movie->id ?>" class="btn btn-info" title="Categorías :D" id="btnCategories">Categorías
				      	</a>
				      </td>
				      <td>      				      
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		

		</section>	
	</section>
</main>
