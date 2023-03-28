	<!-- CTA-->
	<section class="cta container">
		<div class="row">
			<div class="col-md-6">
				<div class="titulo-general titulo-general-custom">
					<p><?php echo get_theme_mod('cta_title'); ?></p>
					<span><?php echo get_theme_mod('cta_subtitle'); ?></span>
				</div>
				<div>
					<ul>
					    <li>					        
					        <img src="<?php echo get_template_directory_uri();?>/assets/img/iconos/Trazado 3.png" alt=""><?php echo str_replace("\n", '<br><img src="'.get_template_directory_uri().'/assets/img/iconos/Trazado 3.png" alt="">', get_theme_mod('cta_description')); ?>
					    </li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<img class="cta-ilutracion " src="<?php echo get_theme_mod('cta_image'); ?>" alt="">
			</div>
		</div>
		<div class="text-center d-flex justify-content-center">
			<div class="cta-bg">
				<p><?php echo get_theme_mod('cta_message_title'); ?></p>
				<span><?php echo get_theme_mod('cta_message_subtitle'); ?></span>
				
				<?php if( is_user_logged_in() != NULL):?>
							<a class="btn-custom mt-3 cta-color" href="<?php echo get_home_url() ?>/buscar-tareas"> 
							<?php else: ?>
							<a class="btn-custom mt-3 cta-color" href="#" data-toggle="modal" data-target="#exampleModal"> 
							<?php endif; ?>
							
                        <?php if (is_user_logged_in()){
                        	echo get_theme_mod('cta_message_buttom');
                           
                        }else{ ?>
                            <?php echo get_theme_mod('cta_message_buttom'); ?>
                            </a>
                        <?php } ?>
							</a>
				<!--<a href="<?php echo get_theme_mod('cta_message_urlbuttom'); ?>" class="btn-custom mt-3 cta-color"><?php echo get_theme_mod('cta_message_buttom'); ?></a>-->
			</div>
		</div>
	</section>