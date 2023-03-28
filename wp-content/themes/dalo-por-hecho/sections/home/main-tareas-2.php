	<!-- TAREAS 2-->
	<section class="main-tareas-2 container">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('tareas2_title'); ?></p>
			<span><?php echo get_theme_mod('tareas2_subtitle'); ?></span>
		</div>

		<div class="main-tareas_grid mt-5">
		<?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'desc', 'hide_empty'=> FALSE ));
		$category_counter = 1;
		?>
		<?php foreach($product_categories as $category):  global $wpdb;?>	
			<?php if ($category_counter <= 10) { ?>	
			  <a class="main-tareas_item" href="" data-toggle="modal"	data-target="#step" id="send" onclick="enviarDatos('<?=$category->term_id ?>','<?=$category->name ?>');">	
				<div class="main-tareas_item">
					<div class="main-tareas_item-content ">
						<p><?=$category->name ?></p>
					</div>
				</div>
			   </a>	  
				<?php } ?>
		<?php $category_counter++; endforeach; ?>
		</div>
	</section>
	<!-- TAREAS-->