<?php global $current_user, $wp_roles; ?>
                <!--tab notificacion -->
<div class="tab-pane fade " id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-tareas-tab">
  <div id="collapseOne" class="collapse show mb-5" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">                        
    <ul class="nav nav-tabs h-p-nav-tab">
      <li class="nav-item">
        <a class="nav-link rol_user-tab active" id="item-perfil" data-toggle="tab" href="#notifi">
          Notificaciones
        </a>                                                      
      </li>   
      <li class="nav-item">
        <a class="nav-link imagen-perfil-tab" id="item-perfil" data-toggle="tab" href="#chate">   
          Chat  
        </a>
      </li>
    </ul>  
    <div class="tab-content"> 
      <!-- Notificaciones -->                                    
      <div id="notifi" class="container tab-pane active"><br>
        <?php $args = array(
          'post_type' => 'job_listing',
          'post_status' => 'publish',
          'author' => $current_user->ID,
        ); 
        $loop = new WP_Query( $args );

        while( $loop->have_posts() ) : $loop->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10);
          $user_tarea = get_the_author_meta( 'ID' ); $title_tarea = get_the_title(); $id_tarea = get_the_ID(); $monto_salary = get_post_meta( get_the_ID(), '_job_salary', true ); $email_empleador = get_the_author_meta( 'user_email' );
            $a = 0;
            $args3 = array (
                'post_type' => 'postulados',
                'post_status' =>'publish',
                'ORDER' => 'ID',
                'meta_query' => array(
                'relation'=>'AND', // 'AND' 'OR' ...
                array(
                  'key' => 'ofertar_id_tarea_publicada',
                  'value' => get_the_ID(),
                  'operator' => 'IN',
                )),                     
            ); 
            $loop3 = new WP_Query( $args3 );
            while ( $loop3->have_posts() ) : $loop3->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10); $rating_postulado  = get_field('ofertar_id_empleado'); $mensaje_postu = get_field('ofertar_message_empleado'); $monto_postu = get_field('ofertar_monto_tarea');?>
                <?php if ($a == 0) {echo '<p class="active show">'.$title_tarea.'</p>';} ?>
                <div class="ofertas_conetnt">
                  <div class="datos_name">
                    <div class="row border-n mb-5">
                      <div class="col-md-12">
                        <div class="ofertas_titulos mb-3">
                          <a title="Perfil usuario" href="perfil?post=<?= get_the_author_meta( 'ID' ) ?>">
                            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                          </a> 
                          <div class="flex ml-3">
                            <span>
                              <a title="Perfil usuario" href="perfil?post=<?= get_the_author_meta( 'ID' ) ?>">   <?php echo meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) ); ?></a>
                            </span>
                            <div>
                              <?php
                                $count_rating = count_rating($rating_postulado,'todo');
                                if ($count_rating == 0) { ?>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>
                                <?php  }
                                for ($i=0; $i < $count_rating; $i++) { ?>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                <?php } ?>
                                <!-- <p>5.0 (3)</p> -->
                            </div>
                          </div>
                          <p class="ml-auto">
                            <?php the_job_publish_date_postu(); ?>
                          </p>
                        </div>
                        <p><?php echo $mensaje_postu; ?></p>
                        <div class="cube mb-4"> 
                            <p>$ <?php echo number_format($monto_postu, 0, '.', '.'); ?></p>
                        </div>
                        <div class="respnse">
                            <?php $var_array ="Tarea Publicada: ".$title_tarea."<br>ID Tarea: ".$id_tarea."<br>Usuario Postulado: ".meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) )."<br>ID Postulado: ".get_the_author_meta( 'ID' )."<br>Monto Ofertado: $".get_field('ofertar_monto_tarea')."<br>Porcentaje Comisión: $".$comision."<br>ID Postulación: ".get_the_ID().""; ?>
                            <?php                                                   

                            $value_var_array = str_replace("<br>",":",$var_array); 
                            $sinparametros= explode(':', $value_var_array, 14);
                            if ($sinparametros[3] =="124") {
                                '<p>'.$sinparametros[3].'</p>';
                            } ?> 
                  
                           <script>
                               $(document).ready(function() {
                               var array_note = "<?= $var_array ?>"; 
                               // $("textarea#w3mission").val(array_note);
                               //$('textarea#w3mission').prop('hidden', true);
                               }); 
                            </script>    
                            
                        </div>
                      </div>
                  </div>
                </div>
              </div>    
            <?php $a = $a+1; endwhile; ?> 
        <?php endwhile; ?>
      </div> 

      <!-- Chat -->                                    
      <div id="chate" class="container tab-pane  fade"><br>
      <?php $args = array(
              'post_type' => 'job_listing',
              'post_status' => array('publish','draft' ,'expired'),
              'author' => $current_user->ID,
            ); 
        $loop = new WP_Query( $args ); 
        while ( $loop->have_posts() ) : $loop->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10);
        $user_tarea = get_the_author_meta( 'ID' ); $title_tarea = get_the_title(); $id_tarea = get_the_ID(); $monto_salary = get_post_meta( get_the_ID(), '_job_salary', true ); $email_empleador = get_the_author_meta( 'user_email' );
                                    
                                    
        $id_tarea_a = 0;
        $args3 = array (
            'post_type' => 'asignados',
            'post_status' =>'publish',
            'meta_query' => array(
            'relation'=>'AND', // 'AND' 'OR' ...
            array(
               'key' => 'asignar_id_tarea_publicada',
               'value' => get_the_ID(),
               'operator' => 'IN',
            )),                     
        ); 
        $loop3 = new WP_Query( $args3 ); 
          while ( $loop3->have_posts() ) : $loop3->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10); $asignar_id_empleado = get_field( 'asignar_id_empleado' );
            $id_empleador = get_post(get_field( 'asignar_id_tarea_publicada' ))->post_author;
            $rating_postulado  = get_field('asignar_id_empleado');
            $id_tarea_a = get_field( 'asignar_id_tarea_publicada' );
            $cod_chat = $id_tarea_a.'-'.$id_empleador.'-'.get_field( 'asignar_id_empleado' ); ?>
            <?php echo '<p class="active show">'.$title_tarea.'</p>'; ?>
            <div class="ofertas_conetnt">
              <div class="datos_name">
                <div class="row border-n mb-5">
                  <div class="col-md-12">
                    <div class="ofertas_titulos mb-3">
                      <a title="Perfil usuario" href="perfil?post=<?= get_field( 'asignar_id_empleado' ) ?>">
                          <?php echo get_avatar( user_value( get_field( 'asignar_id_empleado' ) ), 50 );?>
                      </a> 
                      <div class="flex ml-3">
                        <span>
                          <a title="Perfil usuario" href="perfil?post=<?= get_the_author_meta( 'ID' ) ?>">   <?php echo meta_user_value( 'first_name',  get_field( 'asignar_id_empleado' ) ); ?>
                          </a>
                        </span>
                        <div>
                          <?php       
                            $count_rating = count_rating($rating_postulado,'todo');
                            if ($count_rating == 0) { ?>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                              <i class="fa fa-star-o" aria-hidden="true"></i>
                            <?php  }
                            for ($i=0; $i < $count_rating; $i++) { ?>
                              <i class="fa fa-star" aria-hidden="true"></i>
                            <?php } ?>
                        </div>
                      </div>

                      <a class="ml-auto btn-general" href="" data-toggle="modal" data-target="#modal_chat_<?php echo $cod_chat; ?>"  aria-hidden="true"> Ir al chat</a> 

                      <!-- Modal chat -->
                      <div class="modal fade modal-chat" id="modal_chat_<?php echo $cod_chat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <button type="button" class="close main-modal__close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button> 
                              <div class="modal-body">
                                <h4 class="mb-3 main-task__title">Chat </h4>
                                <div class="contenido">
                                  <div class="datos_genereal">
                                    <div class="main-task__minigrid">
                                      <?php $argss = array (
                                        'post_type' => 'chat',
                                        'post_status' =>'publish',
                                        'meta_query' => array(
                                        'relation'=>'AND', // 'AND' 'OR' ...
                                        array(
                                        'key' => 'id_tareas_chat_copy',
                                        'value' =>  $id_tarea_a,
                                        'operator' => 'IN',
                                        ),
                                        array(
                                        'key' => 'cod_chat',
                                        'value' =>  $cod_chat,
                                        'operator' => 'IN',
                                        ),                         
                                        array(
                                        'key' => 'id_chat',
                                        'value' =>  'NULL',
                                        'operator' => 'IN',
                                          ),                       
                                        ),                     
                                      ); 
                                      $loops = new WP_Query( $argss ); 
                                        while ( $loops->have_posts() ) : $loops->the_post(); $id_p = get_the_ID();
                                          $post_id = get_the_ID();
                                          $meta_key = 'visto_chat';
                                          $meta_value = 'si'; 
                                          if (get_field( 'cod_chat' ) == $cod_chat && get_field( 'id_user_chat' ) == $current_user->ID && get_field( 'visto_chat' ) == 'no') {
                                              update_post_meta($post_id,$meta_key,$meta_value);
                                          }                     
                                      $chat_tarea = get_field('chat_tarea'); ?>
                                      <div class="ofertas_conetnt">
                                        <div class="datos_name">
                                          <div class="row border-p">
                                            <div class="col-md-12">
                                              <div class="ofertas_titulos mb-3">
                                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                                <div class="flex ml-3 ">
                                                  <span><?php echo meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) ); ?></span>

                                                  <div>
                                                    <?php
                                                      $count_rating = count_rating($rating_postulado,'todo');
                                                      if ($count_rating == 0) { ?>
                                                          <i class="fa fa-star-o" aria-hidden="true"></i>
                                                          <i class="fa fa-star-o" aria-hidden="true"></i>
                                                          <i class="fa fa-star-o" aria-hidden="true"></i>
                                                          <i class="fa fa-star-o" aria-hidden="true"></i>
                                                          <i class="fa fa-star-o" aria-hidden="true"></i>
                                                      <?php  }
                                                      for ($i=0; $i < $count_rating; $i++) { ?>
                                                          <i class="fa fa-star" aria-hidden="true"></i>
                                                      <?php } ?>
                                                  </div>
                                                </div>
                                                <p class="ml-auto">
                                                  <?php the_job_publish_date_postu(); ?>
                                                </p>
                                              </div>
                                              <p class="text-content-chat"><?php echo $chat_tarea; ?></p>
                                              <?php if (is_user_logged_in() != NULL && $user_actual == $user_tarea){  ?>
                                                <a href="" data-toggle="modal" data-target="#modal_responder_p<?php echo get_the_ID() ?>"  aria-hidden="true">Responder</a>
                                              <?php } ?>
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <?php endwhile; ?>            
                                    </div>    
                                    <div class="col-lg-12 pt-2">
                                      <?php if (is_user_logged_in() != NULL){ 
                                        $visto = 'no';      
                                        echo do_shortcode('[frm-set-get id_tareas_chat_copy='.$id_tarea.'][frm-set-get id_user_chat='.$asignar_id_empleado.'][frm-set-get cod_chat='.$cod_chat.'][frm-set-get visto_chat='.$visto.'][frm-set-get id_chat=NULL][formidable id=18]');  ?>
                                      <?php } ?>                                             
                                    </div> 
                                  </div>    
                                </div>
                              </div>
                            </div>
                          </div> 
                        </div>
                      </div>                                                       
                    </div>
                  </div>
                </div>
              </div>
            <?php $a = $a+1; endwhile; ?> 
          <?php endwhile; ?>  
      </div> 
    </div>
  </div>
</div>                                            