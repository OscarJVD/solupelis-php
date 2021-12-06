<main class="container mb-5">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de usuarios</h1>
		<div class="row justify-content-center my-2">
			<!-- mostrar vista -->
			<div class="col-12 col-sm-12 my-1">
				<h2>Usuarios</h2>
				<a href="?controller=user&method=add" class="btn btn-success">Agregar</a>
			</div>
			
		</div>

			<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover stacktable datatable table-bordered table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Email</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Rol</th>			
			      <th scope="col"><i class="fas fa-power-off"></th>
			      <th scope="col">Editar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($users as $user) : ?>
				    <tr>
				      <td><?php echo $user->id ?></td>
				      <td><?php echo $user->name ?></td>
				      <td><?php echo $user->email ?></td>
				      <td><?php echo $user->status ?></td>
				      <td><?php echo $user->role ?></td>
				      <td>
				      	
			      		<?php if ($user->status_id==1) {

			      			?>			      						      	   			      	   
			      			<a href="?controller=user&method=updateUserStatus&id=<?php echo $user->id ?>" class="btn btn-danger" class="btn btn-danger">Inactivar</a>
			      		<?php }else{				      	
			      			?> 
			      			<a href="?controller=user&method=updateUserStatus&id=<?php echo $user->id ?>" class="btn btn-success" class="btn btn-danger">Activar</a>
			      		<?php } ?>
				      </td>
				      <td>
				      	<?php if ($user->status_id==1) {
				      		?>

							<a href="?controller=user&method=edit&id=<?php echo $user->id ?>" class="btn btn-warning">Editar</a>
				      	<?php } ?>
				      </td>				      				      				      
				    </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		</section>	

	</section>
</main>