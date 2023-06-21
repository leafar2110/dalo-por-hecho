	<!-- testimonios -->
	<?php global $current_user; ?>
	<section id="testimonios">
		<div class="bg-testimonios">
			<div class="main-testimonio ">
				<div class="main-testimonios__content">
                <?php $i=0;
                  $args = array (
                     'post_type' => 'job_listing',
                     'posts_per_page' => 100,
                     'post_status' => array('publish','draft','expired'),
                  ); 
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>	
                <a href="<?php echo get_home_url().'/buscar-tareas?tab_tarea='.get_the_ID() ?>">			
					<div class="main-testimonios__item">
						<div class="content-tetimonios">
							<div class="row">
								<div class="col-md-2 col-lg-12 col-xl-2" style="display:flex;justify-content:center">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
								</div>
								<div class="col-md-10 col-lg-12 col-xl-10 mb-2 text-justify">
									<?php if(wp_get_post_terms( get_the_ID(), 'job_listing_category' )):?>
									<p class="name"><?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->name; ?></p>
									<?php endif; ?>
									<span><?php echo get_the_author(); ?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 col-lg-12 col-xl-8">
									<p><?php echo cut_text(get_post_meta( get_the_ID(), '_job_description', true ), 10); ?></p>
								</div>
								<div class="col-md-4 col-lg-12 col-xl-4">
									<?php if(get_post_meta( get_the_ID(), '_job_salary', true )):?>
									<p class="money">$<?php echo number_format(get_post_meta( get_the_ID(), '_job_salary', true ), 0, '.', '.');  ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
			    </a>		
				<?php $i = $i+1; endwhile; ?>
				</div>
			</div>
		</div>
	</section>

	