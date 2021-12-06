<main class="container">
	<div class="row">
		<h1>Agregar Categoría</h1>
	</div>

	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de Categoría</h2>
			
		</div>

		<div class="card-body">
			<!-- guardar -->
				<form action="?controller=category&method=save" method="post">
					<div class="form-group">
						<label>Categoria</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese Categoría" autofocus="" autosave="" autocomplete="">
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