
<main class="container">
	<div class="row">

		<h1 class="p-3">Categorías de la Película 
			<?php echo isset($data[0]->name) ? $data[0]->name : "<p></p>No has seleccionado categorías para esta película"; ?> <!--operador ternario-->
		</h1>
	</div>

		<div class="row row-cols-1 row-cols-md-3">
			<?php foreach ($categories as $category) : 
			 foreach($data as $dat): 
				if ($category->id == $dat->category_id) {?>
					<div class="col mb-4">
						<div class="card h-100">
						  <img src="<?php echo $category->img_category ?>" class="card-img-top  img" alt="img">
							<div class="card-body">
								<h5 class="card-title">
									<?php echo $category->name ?>
								</h5>
								<p class="card-text">
			<!-- 						<?php //echo $dat->description; ?> -->
										
								</p>
								<p class="text-muted mt-4">
									<?php echo $dat->estado; ?>
										
								</p>
					    	</div>
						</div>
				    </div>

				<?php } ?>
				<?php endforeach ?>
              <?php endforeach ?>
			</div>	
