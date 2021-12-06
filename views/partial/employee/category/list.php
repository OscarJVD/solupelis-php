<main class="container">
	<section class="col-md-12 text-center">
		<h1 class="p-2">Listado de categorías</h1>
		<div class="row justify-content-center my-2">
			<div class="col-12 col-sm-12 my-2">
				<h2 class="">Categorías</h2>
				<a href="?controller=category&method=add" class="btn btn-success ">Agregar</a>
			</div>
		</div>

		<section class="col-12 col-sm-12 col-md-12 table-responsive">
			
			<table class="table table-striped table-dark table-hover stacktable datatable table-bordered table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Categoría</th>
			      <th scope="col">Estado</th>
			      <th scope="col"><i class="fas fa-power-off"></th>
			      <th scope="col">Editar</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($categories as $category) : ?>
			     <tr>
			      <td><?php echo $category->id ?></td>
			      <td><?php echo $category->name ?></td>
			      <td><?php echo $category->status ?></td>
			      <td>
			      	<?php if ($category->status_id==1) {

			      			?>			      						      	   			      	   
			      			<a href="?controller=category&method=updateCategoryStatus&id=<?php echo $category->id ?>" class="btn btn-danger" class="btn btn-danger">Inactivar</a>
			      		<?php }else{				      	
			      			?> 
			      			<a href="?controller=category&method=updateCategoryStatus&id=<?php echo $category->id ?>" class="btn btn-success" class="btn btn-danger">Activar</a>
			      		<?php } ?>
			      </td>
			      <td>
			      	<?php if ($category->status_id==1) {
				      		?>
			      	<a href="?controller=category&method=edit&id=<?php echo $category->id ?>" class="btn btn-warning" class="btn btn-warning">Editar</a>
			      <?php } ?>

			      </td>				      				      				      
			     </tr>
				<?php endforeach ?>
			  </tbody>
			</table>
		

		</section>	
	</section>
</main>