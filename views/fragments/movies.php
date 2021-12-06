
<main class="container">
	<div class="row">

		<h1 class="p-3">Películas del Alquiler #
			<?php echo isset($data[0]->rental) ? $data[0]->rental : "<p></p>No has seleccionado películas para el Alquiler"; ?> <!--operador ternario-->
		</h1>
	</div>

		<div class="row row-cols-1 row-cols-md-3">
			<?php foreach ($movies as $movie) : 
			 foreach($data as $dat): 
				if ($movie->id == $dat->movie_id) {?>
					<div class="col mb-4">
						<div class="card h-100">
						 <!--  <img src="<?php echo $movie->img_movie ?>" class="card-img-top  img" alt="img"> -->
							<div class="card-body">
								<h5 class="card-title">
									<?php echo $movie->name ?>
								</h5>
								<p class="card-text">
			<!-- 						<?php //echo $dat->description; ?> -->
										
								</p>
								<p class="text-muted mt-4">
									<p class="h6"> Precio Unitario: 
										<?php echo $dat->unit_price; ?>
									</p>
								</p>
					    	</div>
						</div>
				    </div>

				<?php } ?>
				<?php endforeach ?>
              <?php endforeach ?>
			</div>	
