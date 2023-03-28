	<!-- TAREAS-->
	<section class="main-tareas container" id="down">
		<div class="titulo-general text-center">
			<p><?php echo get_theme_mod('tareas_title'); ?></p>
			<span><?php echo get_theme_mod('tareas_subtitle'); ?></span>
		</div>
		
		<div class="main-tareas_grid mt-5">

		<?php for ($i=1; $i <= 9; $i++) { ?>
      <?php if(get_theme_mod('tareas_cat'.$i.'')!=NULL) { ?>
        <a class="main-tareas_item" href="" data-toggle="modal"	data-target="#step" id="send" onclick="enviarDatos('<?=get_theme_mod('tareas_cat'.$i.'') ?>','<?=get_term(get_theme_mod('tareas_cat'.$i.''))->name ?>');">
          <div class="main-tareas_item">
            <div class="main-tareas_item-content ">
              <img src="<?php echo termmeta_value_img('image_job_category', get_theme_mod('tareas_cat'.$i.'') );?>" alt="icono">
              <p><?=get_term(get_theme_mod('tareas_cat'.$i.''))->name ?></p>
            </div>
          </div>
        </a>
			<?php } ?>
    <?php } ?>  

            <a class="main-tareas_item main-tareas__last" href="<?php echo get_home_url() ?>/categorias" >
                <div class="main-tareas_item-content ">
                <img src="https://daloporhecho.cl/wp-content/uploads/2020/09/Enmascarar-grupo-9.png" alt="icono">
                <p>Otros</p>
                </div>
            </a>

		        							
	</div>

		
	</section>
	<!-- TAREAS-->
