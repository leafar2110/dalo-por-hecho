	<!-- testimonios 2 -->
	<section id="testimonios" class="container-fluid">
		<div class=" bg-testimonios">
			<div class=" titulo-general text-center">
				<p>Testimonios de nuestros usuarios</p>
				
			</div>
			<div class="main-testimonio ">
				<div class="main-testimonios2__content">
                <?php $i=0;
                  $args = array (
                     'post_type' => 'testimonios',
                     'posts_per_page' => 10000,
                     'post_status' => 'publish'
                  ); 
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); ?>				
					<div class="main-testimonios__item">
						<div class="content-tetimonios">
							<div class="row">
								<div class="col-md-2">
									<img src="<?php the_field('imagen_perfil_testimonios') ?>" alt="">
								</div>
								<div class="col-md-10 mb-2 text-justify">
									<p class="name"><?php the_field('name_testimonios') ?></p>
									<span><?php the_field('especialidad_testimonios') ?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p><?php the_field('contenido_testimonios') ?></p>
								</div>
							</div>
						</div>
					</div>
			    <?php endwhile; ?>
				</div>
			</div>
		</div>
    </section>
    <?php get_header(); ?>
 


<?php get_footer(); ?>	

