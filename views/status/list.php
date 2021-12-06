<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de estados</h1>
		<div class="row justify-content-center my-2">
			<div class="col-12 col-sm-12 my-2">
				<h2 class="">Estados</h2>
				<a href="?controller=status&method=add" class="btn btn-success ">Agregar</a>
			</div>
		</div>

		<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover stacktable datatable table-bordered table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Tipo de Estado</th>
			      <th scope="col"><i class="fas fa-power-off"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($statuses as $status) : ?>
				    <tr>
				      <td><?php echo $status->id ?></td>
				      <td><?php echo $status->status ?></td>
				      <td><?php echo $status->type_status ?></td>
				      <td>
				      	<a href="?controller=status&method=edit&id=<?php echo $status->id ?>" class="btn btn-warning" class="btn btn-warning">Editar</a>
				      	<a href="?controller=status&method=delete&id=<?php echo $status->id ?>" class="btn btn-danger" class="btn btn-danger">Eliminar</a>
				      </td>				      				      				      
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		

		</section>	
	</section>
</main>