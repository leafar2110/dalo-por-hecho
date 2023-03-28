<?php get_header() ?>
	<!-- TAREAS-->
	<section class="main-categories main-tareas container" id="down">
		<div class="titulo-general text-center">
			<p>Nuestras Categorías</p>
	
		</div>

		<div class="main-tareas_grid mt-5">
		<?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'order' => 'ASC', 'hide_empty'=> FALSE  ));
		 $category_count = 1;
		?>
        <?php foreach($product_categories as $category):  global $wpdb; ?>
	        <a class="main-tareas_item" href="" data-toggle="modal"	data-target="#step" id="send" onclick="enviarDatos('<?=$category->term_id ?>','<?=$category->name ?>');">	
				<div class="main-tareas_item">
					<div class="main-tareas_item-content ">
						<img src="<?php echo termmeta_value_img('image_job_category', $category->term_id );?>" alt="icono">
						<p><?=$category->name ?></p>
					</div>
				</div>
			</a>	
		

	    <?php endforeach; ?>	
	</div>
		
	</section>
	<!-- TAREAS-->
<?php get_template_part('sections/home/main-modal-step'); ?>
<?php get_footer(); ?>