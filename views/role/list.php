 <main class="container">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de Roles</h1>
		<div class="row justify-content-center my-2">
			<div class="col-12 col-sm-12 my-2">
				<h2 class="">Roles</h2>
				<!-- <a href="?controller=role&method=add" class="btn btn-success">Agregar</a> -->
			</div>
		</div>
		<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover stacktable datatable table-bordered table-sm">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Rol</th>
						<th scope="col">Estado</th>
						<th scope="col"><i class="fas fa-power-off"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($roles as $role) : ?>
						<tr>
							<td><?php echo $role->id ?></td>
							<td><?php echo $role->name ?></td>
							<td><?php echo $role->status ?></td>
							<td>
				      	<!-- <a href="?controller=role&method=edit&id=<?php //echo $role->id ?>" class="btn btn-warning" class="btn btn-warning">Editar</a>
				      		<a href="?controller=role&method=delete&id=<?php //echo $role->id ?>" class="btn btn-danger" class="btn btn-danger">Eliminar</a> -->
				      		<?php if ($role->status_id==1) {

				      			?>
				      			<a href="?controller=role&method=updateRoleStatus&id=<?php echo $role->id ?>" class="btn btn-danger" class="btn btn-danger">Inactivar</a>
				      		<?php }else{				      	
				      			?> 
				      			<a href="?controller=role&method=updateRoleStatus&id=<?php echo $role->id ?>" class="btn btn-success" class="btn btn-danger">Activar</a>
				      		<?php } ?>
				      	</td>				      				      				      
				      </tr>
				  <?php endforeach ?>
				</tbody>
			</table>


		</section>	
	</section>
</main>