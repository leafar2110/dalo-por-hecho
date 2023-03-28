	<!-- funciona-->
	<section id="funciona" class="main-funciona container mt-5">
		<div class=" titulo-general text-center">
			<p><?php echo get_theme_mod('funciona_title'); ?></p>
			<span><?php echo get_theme_mod('funciona_subtitle'); ?></span>
		</div>

		<div class="main-funciona_grid mt-5">
			<?php for ($i=1; $i <=3 ; $i++) { 
				if (get_theme_mod('funciona_items'.$i.'_image') != NULL) { ?>
				<div class="main-funciona_grid-item">
					<div class="flexx">
						<img src="<?php echo get_theme_mod('funciona_items'.$i.'_image'); ?>" alt="">
						<p><?php echo get_theme_mod('funciona_items'.$i.'_title'); ?></p>
						<div class="w-22">
							<span><?php echo get_theme_mod('funciona_items'.$i.'_description'); ?></span>
						</div>
					</div>
				</div>
			<?php }} ?>			
		</div>

		<div class="text-center d-flex justify-content-center">
			<div class="cta-bg cta-bg_blue">
				<p><?php echo get_theme_mod('funciona_message_title'); ?></p>
				<span><?php echo get_theme_mod('funciona_message_subtitle'); ?></span>
 				<a href="<?php echo get_theme_mod('funciona_message_urlbuttom'); ?>" data-toggle="modal"	data-target="#step" class="btn-custom mt-3 cta-color"><?php echo get_theme_mod('funciona_message_buttom'); ?></a>
			</div>
		</div>
	</section>

	