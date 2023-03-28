	<!-- banner -->
	<div class="main-banner">
		<div class="main-banner__content">
			<div class="main-banner__item">
				<div class="mask">
					<div class="main-banner__text ">
						<p class="animated fadeInDown wow"><?php echo get_theme_mod('banner1_description'); ?></p>
						<h1><?php echo get_theme_mod('banner1_title'); ?></h1>
						<h2><?php echo get_theme_mod('banner1_subtitle'); ?></h2>
						<div class="btn-content">
						  <?php if(get_theme_mod('banner1_button1') != NULL){ ?>
							<a class="btn-custom p-14 mr-4" href="<?php echo get_theme_mod('banner1_urlbutton1'); ?>"><?php echo get_theme_mod('banner1_button1'); ?></a>
					      <?php } ?>
					      <?php if(get_theme_mod('banner1_button2') != NULL){ ?>		

                        <?php if( is_user_logged_in() != NULL):?>
                            <a class="btn-custom p-14 btn-custom-transparent btn-custom-transparent-white" href="<?php echo get_theme_mod('banner1_urlbutton2'); ?>" data-toggle="modal"	data-target="#step" ><?php echo get_theme_mod('banner1_button2'); ?></a>
                        <?php else: ?>
							<a class="btn-custom p-14 btn-custom-transparent btn-custom-transparent-white" href="#" data-toggle="modal" data-target="#exampleModal" ><?php echo get_theme_mod('banner1_button2'); ?></a>                        
                        <?php endif; ?>							
						  <?php } ?>	
						</div>
					</div>
				</div>
				<div class="main-banner__img">
					<img src="<?php echo get_theme_mod('banner1_image'); ?>" alt="">
				</div>
			</div>

		</div>
		<div class="text-center main-banner__down">
			<a href="#down"><img class="arrow" src="<?php echo get_template_directory_uri();?>/assets/img/arrow.png" alt=""></a>
		</div>

	</div>
	<!-- banner -->