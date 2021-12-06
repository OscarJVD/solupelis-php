<main class="container">
	<div class="row">
		<h1>Agregar Alquiler</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Alquiler</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
<!-- 				<form action="?controller=rental&method=save" method="post"> -->
					<div class="form-group">
						<label>Fecha inicial</label>
						<input type="date" id="start_date" class="form-control" placeholder="Ingrese fecha inicial" autofocus autosave="" autocomplete="" required="">
					</div>
					<div class="form-group">
						<label>Fecha final</label>
						<input type="date" id="end_date" class="form-control" placeholder="Ingrese fecha final" required="">
					</div>
					<div class="form-group">
						<label>Total</label>
						<input type="number" id="total" class="form-control" placeholder="Ingrese el total" required="">
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<select id="user_id" class="form-control" required="">
						   <option value="">Seleccione...</option>
							<?php 
								foreach ($users as $user) {
									if ($user->id == $data[0]->user_id) {
										?>
											<option selected value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
										<?php
									}else{
										?>
											<option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
										<?php
									}
								}
							 ?>
						</select>
						<p class="h6 text-muted text-center">Verifica que hayan usuarios activos</p> 
					</div>
					<!-- ACCEDEMOS A LOS DATOS DE LA TABLA CATEGORIE_MOVIE -->
					<!-- sin si quiera tenerla relacionada -->
					<div class="form-group row">
						<div class="col-md-8">
						<label>Películas</label>
							<select id="movie" class="form-control" required="">
							   <option value="">Seleccione...</option>
								<?php 
									foreach ($movies as $movie) {?>
												<option selected value="<?php echo $movie->id ?>">
													<?php echo $movie->name ?>	
												</option>
											<?php
												}
								 			?>
							</select>
							<p class="h6 text-muted text-center">Verifica que hayan películas activas</p>
						</div>

						<div class="col-md-4 mt-4">
							<a href="#" id="addElement" class="btn btn-warning p-4 rounded-circle border-dark">
								<i class="fas fa-plus fa-lg"></i>
							</a>
						</div>
					</div>

					<div class="form-group" id="list-movies">
							
					</div>

					<div class="form-group">
						<label>Precio Unitario</label>
						<input type="number" id="unit_price" class="form-control" placeholder="Ingrese el precio unitario de las películas escogidas" required>
					</div>
					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button class="btn btn-primary" id="submit">Guardar</button>
					</div>
<!-- 				</form> -->
			</div>
		</div> 
	</section>
</main>

<script src="assets/js/rental.js"></script>