<?php if(is_user_logged_in() == NULL)
{ 
  header('Location: '.get_home_url().'');
}

/* Get user info. */
global $current_user, $wp_roles;?>  

<?php if ($_GET['post'] != NULL) { 
    $email_perfil = user_value( $_GET['post'] );
    $name_perfil = meta_user_value( 'first_name',  $_GET['post'] ); 
    $address_perfil =  meta_user_value( 'direccion_user',  $_GET['post'] ); 
    $date_perfil = date_new_perfil(user_value_date( $_GET['post'] ));
    $user_perfil = $_GET['post'];
    $description_perfil = meta_user_value( 'description', $_GET['post'] );
}else{
    $email_perfil = $current_user->user_email;
    $name_perfil = meta_user_value( 'first_name',  $current_user->ID ); 
    $address_perfil =  meta_user_value( 'direccion_user',  $current_user->ID ); 
    $date_perfil = date_new_perfil(user_value_date( $current_user->ID ));    
    $user_perfil = $current_user->ID;
    $description_perfil = meta_user_value( 'description', $current_user->ID );
}?>


   <?php get_header(); ?>
    <div class="top-gris">

        
    </div>
    <div class="container">
        <div class="img-p-p">
        <?php if ($_GET['post'] != NULL) { ?>
            <?php echo get_avatar( $email_perfil, 165 );?> 
       <?php }else{ ?>
           <?php if (is_user_logged_in()){ echo get_avatar( $email_perfil, 165 );  }?>
       <?php } ?>
   </div>
    </div>
    <div class="container inf-general-perfil">
        <div class="inf-general-perfil-1">
            <p class="p-na"> <?php echo $name_perfil; ?></p>
            <h6 class="p-az">Miembro desde <?php echo $date_perfil; ?></h6>

        </div>
        <div class="inf-general-perfil-2">
            
            
            <div class="valoracion-inf-general-perfil-2">
                <h6>Valoracion por tareas realizadas</h6>
                <?php                            
                  $count_rating = count_rating($user_perfil,'todo'); echo " ";

                  for ($i=0; $i < $count_rating; $i++) { ?>
                      <i class="fa fa-star" aria-hidden="true"></i>
                  <?php } 
                  for ($i=0; $i < (5-$count_rating); $i++) { ?>
                      <i class="fa fa-star-o" aria-hidden="true"></i>
              <?php } ?> 
            </div>
        </div>
    </div>
    <div class="container perfil m-60">
        <section class="section-perfil-dph">
            <div class="container perfil-dph-cont">
                <div class="row">
                    <div class="col-md-3">
                        <div class="perfil-content">
                          
                            <div class="emblemas-perfil-cont">
                                <h5>Emblemas</h5>


                                <div class="row">
                                    <div class="col-md-12 content-inf-emblemas-cont_col-12">
                                    <?php 
                                    $argss = array (
                                        'post_type' => 'emblemas_adjuntos',
                                        'author' => $user_perfil,

                                    ); 
                                        $loops = new WP_Query( $argss ); 
                                        while ( $loops->have_posts() ) : $loops->the_post(); $down_emblema = get_post(meta_value( 'id_emblema', get_the_ID() ))->post_title."&nbsp;-&nbsp;Usuario:&nbsp;".$user_perfil; ?>
                                        <div class="content-inf-emblemas-cont-box">
                                            <div class="">
                                                <div>
                                                <span title="Descargar Archivo">* <?php echo get_post(meta_value( 'id_emblema', get_the_ID() ))->post_title; ?></span>
                                                </div>
                                                <a class="" href="<?php echo meta_value_img( 'adjuntar_emblema', get_the_ID() ) ?>" download="<?php echo $down_emblema; ?>">Descargar</a> 
                                                <a class="" target="_blank" href="<?php echo meta_value_img( 'adjuntar_emblema', get_the_ID() ) ?>">Ver</a>

                                            </div>                                                            
                                        </div>
                                    <?php endwhile; ?>
                                    </div>
                                </div>
                                
                                <?php if ($current_user->ID == $user_perfil): ?>
                                    <a class="emblemas-perfil-cont_a" href="confi-perfil/?tab=emblemas">Consigue un emblema</a>    
                                <?php endif; ?>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-9 ">
                   <div class="cont-perfil-inf">
                        <h4>Acerca de mi</h4>  
                      <div class="cont-cont-perfil-inf">
                        <div class="cont-cont-perfil-inf">
                            <p><?php echo $description_perfil; ?></p>
                        </div>
                        
                      </div>
                       <h4>Mi portafolio</h4>
                       <div class="cont-cont-perfil-inf">

                        <div class="cont-cont-perfil-inf">
                         <div class="cont-espacio"></div>
                        </div>
                         

                        </div>
                       <h4>Mis aptitudes</h4>
                       <div class="cont-cont-perfil-inf">

                            <div class="cont-cont-perfil-inf">
                                <p></p>
                            </div>
                            

                        </div>
                       <h4>Comentarios de la comunidad</h4>
                       <div class="comentarios-comunidad-perfil">
                           <div class="comentario-comunidad-perfil">
                               <div class="comentario-comunidad-perfil-usuario">
                                    <div class="comentario-comunidad-perfil-usuario-gi">
                                        <div  class="comentario-comunidad-perfil-usuario_img"></div>
                                        <div class="comentario-comunidad-perfil-usuario-inf">
                                            <h6>Nombre de la persona</h6>
                                            <div class="circulos-n">
                                                <div class="circulos-n-i"></div>
                                                <div class="circulos-n-i"></div>
                                                <div class="circulos-n-i"></div>
                                                <div class="circulos-n-i"></div>
                                                <div class="circulos-n-i"></div>
                                                <h5>5.0 (3)</h5>
                                            </div>
                                        </div>
                                        <div class="ultima-c">Hace 11 minutos</div>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque nihil cumque facilis voluptate consequuntur expedita atque hic id enim adipisci sint, excepturi rerum totam maxime autem? Corrupti nobis quibusdam nulla?</p>
                               </div>
                               
                           </div>
                         
                       </div>

                    </div>
                    </div>
                    <div class="col-md-2 ">
                   
                    </div>
                </div>
            </div>
        </section>

</div>

<?php get_footer(); ?>    