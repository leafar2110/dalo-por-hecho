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
    $nac_perfil = meta_user_value( 'foto_portada_user', $_GET['post'] );
    $image_perfil = get_post_meta($_GET['post'], 'foto_portada_user', true );
}else{
    $email_perfil = $current_user->user_email;
    $name_perfil = meta_user_value( 'first_name',  $current_user->ID ); 
    $address_perfil =  meta_user_value( 'direccion_user',  $current_user->ID ); 
    $date_perfil = date_new_perfil(user_value_date( $current_user->ID ));    
    $user_perfil = $current_user->ID;
    $description_perfil = meta_user_value( 'description', $current_user->ID );
    $nac_perfil = meta_user_value( 'foto_portada_user',$current_user->ID );
    $image_perfil = get_post_meta( $current_user->ID, 'foto_portada_user', true);
    
}?>


   <?php get_header(); ?>
   <?php var_dump(meta_value_img('foto_portada_user', $user_perfil )); ?>
    <div class="top-gris">

<img src="<?php echo termmeta_value_img('foto_portada_user', $user_perfil ); ?>" />
        
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
                     
                       <h4>Mis aptitudes</h4>
                       <div class="cont-cont-perfil-inf">

                            <div class="cont-cont-perfil-inf" style="flex-direction: column;">
                                <div>
                                    <strong>Idiomas</strong>
                                    <p><?php the_author_meta( 'idiomas_user', $current_user->ID ); ?></p>
                                </div>
                                <div>
                                    <strong>Certificaciones</strong>
                                    <p><?php the_author_meta( 'certificaciones_user', $current_user->ID ); ?></p>
                                </div>
                                <div>
                                    <strong>Mi experiencia</strong>
                                    <p><?php the_author_meta( 'experiencia_user', $current_user->ID ); ?></p>
                                </div>
                                <div>
                                    <strong>Indica tu medio de transporte</strong>
                                    <?php $sinparametrosu = explode(',', meta_user_value( 'medio_de_transporte_user', $current_user->ID ), 4); ?>
                                    <?php foreach( $sinparametrosu as $item ): ?>
                                        <?php if(!empty($item)): ?>
                                            <p><?php echo $item; ?></p>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            

                        </div>
                       <h4>Comentarios de la comunidad</h4>

                       <?php
                       $id_user = $_GET['post'] ?? '';
                        $arg = array (
                          'post_type' => 'rating',
                          'post_status' =>'publish',
                          'posts_per_page' => 15,
                          'meta_query' => array(
                                'relation'=>'AND', // 'AND' 'OR' ...
                                    array(
                                        'key' => 'id_user_calif_valor',
                                        'value' =>  $id_user,
                                        'operator' => 'IN',
                                    ),   
                            ),
                        ); 

                        $loop = new WP_Query( $arg ); 
                        while ( $loop->have_posts() ) : $loop->the_post();  
                            // Obtiene la fecha del post
                            $post_date = get_the_date();

                            // Calcula la diferencia de tiempo
                            $time_diff = human_time_diff(get_the_time('U'), current_time('timestamp'));

                            // Genera la cadena de texto con el formato "Hace X minutos"
                            $time_string = sprintf(__('Hace %s', 'text-domain'), $time_diff);

                            $rating = get_the_title();
                       ?>
                       <div class="comentarios-comunidad-perfil">
                           <div class="comentario-comunidad-perfil">
                               <div class="comentario-comunidad-perfil-usuario">
                                    <div class="comentario-comunidad-perfil-usuario-gi">

                                    <style>
                                        .content-image img {
                                            width: 85px;
                                            height: 85px;
                                        }
                                    </style>
                                    <div class="content-image">
                                        <?php 
                                        $user_data = get_userdata(get_field('id_user_valor'));

                                        if (is_user_logged_in()){ echo get_avatar( $user_data->user_email, 165 );  }?> 
                                    </div>
                                        <!-- <div  class="comentario-comunidad-perfil-usuario_img"></div> -->
                                        <div class="comentario-comunidad-perfil-usuario-inf">
                                            <?php
                                            if ($user_data): ?>
                                                 <h6><?php echo $user_data->display_name; ?></h6>
                                            <?php endif; ?>
                                            <br>
                                            <div class="circulos-n">
                                                <?php for( $i=0; $i < (int) $rating; $i++):?>
                                                    <div class="circulos-n-i"></div>
                                                <?php endfor;?>
                                                <h5><?php echo $rating . '.0'; ?></h5>
                                            </div>
                                        </div>
                                        <div class="ultima-c"><?php echo $time_string; ?></div>
                                    </div>
                                    <p><?php the_content(); ?></p>
                               </div>
                               
                           </div>
                         
                       </div>
                       <?php endwhile; ?>
                       <div class="comentar-usuario">
                           <br>
                           <br>
                           <br>
                       <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 21 ) ); ?>
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