<?php  get_header();?>
  <section class="error-404">
    <h2 class="error-404__title">
     Lo sentimos
    </h2>
    <h2 class="error-404__subtitle">
     No encontramos la pagina que buscas
    </h2>
    <img src="<?php echo get_template_directory_uri();?>/assets/img/404/404.png">
    <h2 class="error-404__subtitle">
      Te llevaremos de vuelta
    </h2>
    <a class="main-general__button" href="<?php echo get_home_url() ?>">Volver al inicio</a>
  </section>
<?php  get_footer(); ?>