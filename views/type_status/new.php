<main class="container">
	<div class="row">
		<h1>Agregar Tipo de estado</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Tipo de estado</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
				<form action="?controller=type_status&method=save" method="post">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese Tipo de estado" autofocus="" required="">
					</div>
					<!-- el estado se guarda solito -->
					<div class="form-group">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div> 
	</section>
</main>