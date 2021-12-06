<main class="container">
	<div class="row">
		<h1>Editar Tipo de Estado</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Tipo de Estado</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
				<form action="?controller=type_status&method=update" method="post">
					<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese Tipo de Estado" value="<?php echo $data[0]->name ?>" autofocus>
					</div>
					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div> 
	</section>
</main>