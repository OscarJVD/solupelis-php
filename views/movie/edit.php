<main class="container">
	<div class="row">
		<h1>Editar Película</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de la Película</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
<!-- 				<form action="?controller=movie&method=update" method="post"> -->
					<input type="hidden" id="id" value="<?php echo $data[0]->id ?>">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" id="name" class="form-control" placeholder="Ingrese Nombre de Película" value="<?php echo $data[0]->name ?>">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea rows="3" id="description" placeholder="Ingrese descripción" value='<?php echo $data[0]->description ?>' class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<select id="users_id" class="form-control">
						   <option value="">Seleccione...</option>
							<?php 
								foreach ($users as $user) {
									if ($user->id == $data[0]->users_id) {
										?>
											<option selected value="<?php echo $user->id ?>">
												<?php echo $user->name ?>
											</option>
										<?php
									}else{
										?>
											<option value="<?php echo $user->id ?>">
												<?php echo $user->name ?>
											</option>
										<?php
									}
								}
							 ?>
						</select>
					</div>
					<div class="form-group">
						<label>Estado</label>
						<select id="status_id" class="form-control">
							<option value="">Seleccione...</option>
							<?php 
								foreach ($statuses as $status) {
									if ($status->id == $data[0]->status_id) {
										?>
											<option selected value="<?php echo $status->id ?>"><?php echo $status->status ?></option>
										<?php
									}else{
										?>
											<option value="<?php echo $status->id ?>"><?php echo $status->status ?></option>
										<?php
									}
								}
							 ?>
						</select>
					</div>
					<!-- ACCEDEMOS A LOS DATOS DE LA TABLA CATEGORIE_MOVIE -->
					<!-- sin si quiera tenerla relacionada -->
					<div class="form-group row">
						<div class="col-md-8">
						<label>Categorías</label>
							<select id="category" class="form-control">
							   <option value="">Seleccione...</option>
								<?php 
									foreach ($categories as $category) {?>
										<option selected value="<?php echo $category->id ?>">
											<?php echo $category->name ?>	
										</option>
								<?php
									}
					 			?>
							</select>
							<p class="h6 text-muted text-center">Verifica que hayan categorías activas</p>
						</div>

						<div class="col-md-4 mt-4">
							<a href="#" id="addElement" class="btn btn-warning p-4 rounded-circle border-dark">
								<i class="fas fa-plus fa-lg"></i>
							</a>
						</div>
					</div>
					
					<!-- Se llena el array con los datos que tienen en value y dentro del option,
					Luego se llevan al js con json_encode para que lo tome igual que en el new pasado -->
					<?php if (count($categoriesMovie) > 0) {
						$arrCategoryMovie = [];
						foreach ($categoriesMovie as $categoryMovie) {
							array_push($arrCategoryMovie, 
								[
									'id' => $categoryMovie->category_id,
								 	'name' => $categoryMovie->name
								]);
						}
					?>
						<script>
							var arrCategories = <?php echo json_encode($arrCategoryMovie); ?>
						</script>

					<?php }else{ ?>

						<script>
							var arrCategories = []
						</script>

 					<?php } ?>

					<div class="form-group" id="list-categories">
							
					</div>
					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button id="update" class="btn btn-primary">Actualizar</button>
					</div>
				<!-- </form> -->
			</div>
		</div> 
	</section>
</main>

<script src="assets/js/movie.js"></script>