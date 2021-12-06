<main class="container">
	<div class="row">
		<h1>Editar Alquiler</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Alquiler</h2>

		</div>

		<div class="card-body">
			<!-- guardar -->
				<!-- <form action="?controller=rental&method=update" method="post"> -->
					<input type="hidden" id="id" value="<?php echo $data[0]->id ?>">
					<div class="form-group">
						<label>Fecha Inicial</label>
						<input type="date" id="start_date" class="form-control" placeholder="Ingrese Fecha Inicial" value="<?php echo $data[0]->start_date ?>" autofocus>
					</div>
					<div class="form-group">
						<label>Fecha Final</label>
						<input type="date" id="end_date" class="form-control" placeholder="Ingrese Fecha Final" value="<?php echo $data[0]->end_date ?>">
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
								} else {
								?>
									<option value="<?php echo $status->id ?>"><?php echo $status->status ?></option>
								<?php
								}
								}
								?>
						</select>
					</div>
					<div class="form-group">
						<label>Total</label>
						<input type="number" id="total" class="form-control" placeholder="Ingrese Total a pagar" value="<?php echo $data[0]->total ?>">
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<select id="user_id" class="form-control">
						   <option value="">Seleccione...</option>
							<?php
								foreach ($users as $user) {
								if ($user->id == $data[0]->user_id) {
								?>
									<option selected value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
								<?php
								} else {
								?>
									<option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
								<?php
								}
								}
								?>
						</select>
					</div>
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

					<?php
                        if (count($moviesRental) > 0) {
							$arrMovieRental = [];
							foreach($moviesRental as $movieRental){
								array_push($arrMovieRental, ['id' => $movieRental->movie_id, "name" => $movieRental->name]);
							}
					?>
						<script>
							var arrMovies = <?php echo json_encode($arrMovieRental); ?>
						</script>
					<?php
                        } else {
					?>
						<script>
							var arrMovies = []
						</script>
					<?php
                        }
                    ?>

					<div class="form-group" id="list-movies">

					</div>

					<div class="form-group">
						<label>Precio Unitario</label>
						<input type="number" value="<?php echo $moviesRental[0]->unit_price ?>" id="unit_price" class="form-control" placeholder="Ingrese el precio unitario de las películas escogidas" required>
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

<script src="assets/js/rental.js"></script>