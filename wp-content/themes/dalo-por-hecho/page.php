<?php get_header(); 
 while ( have_posts() ) : the_post();
 ?>

	<section class="main-categories main-tareas container" id="down">
		<div class="titulo-general text-center">
			<p><?php echo get_the_title(); ?></p>
	        <br><br>
		</div>

    <div class="container">
      <div class="main-soporte__content">

			<!--None template -->
			<?php if( get_the_content() != NULL){ ?>
				<?php
              // Include the page content template.
				/*  get_template_part( 'content', 'page' );*/
				the_content();

              // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
			    endif;           
			?>  
		    <?php } ?>   

        </div>
	</div>
</section>	

<?php  endwhile; ?>
<?php get_footer(); ?>