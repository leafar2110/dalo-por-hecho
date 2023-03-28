	<section class="container mt-5 mb-5">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('container_title'); ?></p>
			<span><?php echo get_theme_mod('container_subtitle'); ?></span>
		</div>

		<div class="cards mt-5">
			<div class="row">
            <?php for ($i=1; $i <=3 ; $i++) { 
				if (get_theme_mod('container_items'.$i.'_image') != NULL) { ?>			
				<div class="col-md-6">
					<div class="card-contenido">
						<img src="<?php echo get_theme_mod('container_items'.$i.'_image'); ?>" alt="">
						<p><?php echo get_theme_mod('container_items'.$i.'_title'); ?></p>
						<span><?php echo get_theme_mod('container_items'.$i.'_description'); ?></span>
					</div>

				</div>
            <?php }} ?>
			</div>
		</div>
	</section>