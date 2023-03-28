<?php get_header(); ?>
  <section class="main-soporte">
	  <div class=" titulo-general text-center">
		  <p>Contactar con el equipo de soporte</p>
		  <br>
		  <br>
	  </div>
    <div class="container">
      <div class="main-soporte__content">
      <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 12, 'title' => false, 'description' => false ) ); ?>
      </div>
    </div>
    
  </section>

<?php get_template_part('sections/home/main-modal-step'); ?>

<?php get_footer(); ?>