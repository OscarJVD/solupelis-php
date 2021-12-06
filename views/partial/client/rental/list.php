<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de mis alquileres</h1>
		<div class="row justify-content-center my-2">
			<div class="col-12 col-sm-12 my-2">
				<h2 class="">Mis Alquileres</h2>
				<a href="?controller=rental&method=add" class="btn btn-success ">Agregar</a>
			</div>
		</div>

		<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover stacktable datatable table-bordered table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Fecha de inicio</th>
			      <th scope="col">Fecha Final</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Total</th>
			      <th scope="col">Usuario</th>
			      <th scope="col">Películas</th>
			      <th scope="col"><i class="fas fa-power-off"></th>
			      <th scope="col">Editar</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($rentals as $rental) : ?>
				    <tr>
				      <td><?php echo $rental->id ?></td>
				      <td><?php echo $rental->start_date ?></td>
				      <td><?php echo $rental->end_date ?></td>
				      <td><?php echo $rental->status ?></td>
				      <td><?php echo $rental->total ?></td>
				      <td><?php echo $rental->user ?></td>
				      <td>
				      	<a href="?controller=rental&method=listMovies&id=<?php echo $rental->id ?>" class="btn btn-info" title="Películas :D" id="btnRentals">Películas
				      	</a>
				      </td>
				      <td>
				      	<?php if ($rental->status_id==1) {

			      			?>			      						      	   			      	   
			      			<a href="?controller=rental&method=updateRentalStatus&id=<?php echo $rental->id ?>" class="btn btn-danger" class="btn btn-danger">Inactivar</a>
			      		<?php }else{				      	
			      			?> 
			      			<a href="?controller=rental&method=updateRentalStatus&id=<?php echo $rental->id ?>" class="btn btn-success" class="btn btn-danger">Activar</a>
			      		<?php } ?>
				      </td>
				      <td>
				      	<?php if ($rental->status_id==1){ ?>
				      	<a href="?controller=rental&method=edit&id=<?php echo $rental->id ?>" class="btn btn-warning">Editar</a>
				        <?php } ?>
				      </td>				      				      				      
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		

		</section>	
	</section>
</main>