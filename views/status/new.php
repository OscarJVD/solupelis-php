<main class="container">
	<div class="row">
		<h1>Agregar Estado</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de Estados</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
				<form action="?controller=status&method=save" method="post">
					<div class="form-group">
						<label>Estado</label>
						<input type="text" name="status" class="form-control" placeholder="Ingrese el nombre del Estado" required="">
					</div>
					<div class="form-group">
						<label>Tipo de estado</label>
						<select name="type_statuses_id" class="form-control">
							<option value="">Seleccione...</option>
							
							<?php 
								foreach ($type_statuses as $type_status) {
									if ($type_status->id == $data[0]->type_statuses_id) {
										?>
											<option selected value="<?php echo $type_status->id ?>"><?php echo $type_status->name ?></option>
										<?php
									}else{
										?>
											<option value="<?php echo $type_status->id ?>"><?php echo $type_status->name ?></option>
										<?php
									}
								}
							 ?>
						</select>
					</div>

					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button class="btn btn-primary">Generar</button>
					</div>
				</form>
			</div>
		</div> 
	</section>
</main>