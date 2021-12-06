<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de Tipos de estados</h1>
		<div class="row justify-content-center my-2">
			<!-- mostrar vista -->
			<div class="col-12 col-sm-12 my-2">
				<h2>Tipos de estados</h2>
				<a href="?controller=type_status&method=add" class="btn btn-success">Agregar
				</a>
			</div>
		</div>
		<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover stacktable datatable table-bordered table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Editar</th>
			      <th scope="col"><i class="fas fa-trash"></i></th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($type_statuses as $type_status) : ?>
				    <tr>
				      <td><?php echo $type_status->id ?></td>
				      <td><?php echo $type_status->name ?></td>
				      <td>
				      	<a href="?controller=type_status&method=edit&id=<?php echo $type_status->id ?>" class="btn btn-warning">Editar</a>
				      </td>
				      <td>
				      	<a href="?controller=type_status&method=delete&id=<?php echo $type_status->id ?>" class="btn btn-danger">Eliminar</a>
				      </td>				      				      				      
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		

		</section>	
	</section>
</main>