<?php global $current_user, $wp_roles; ?>
<style type="text/css">
 input[type='radio']:checked:after {
        width: 16px;
        height: 16px;
        border-radius: 15px;
        top: -14px;
        left: 0.45px;
        position: relative;
        background-color: #ffa500;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }
    
    </style>
                <!-- asignados -->
                <div class="tab-pane fade " id="v-pills-asignados" role="tabpanel"
                                aria-labelledby="v-pills-asignados-tab">
                    <div id="accordion" role="tablist">
                        <div class="">
                            <div class="card-header top-headline" role="tab" id="headingOne">
                                <h5> Tareas Asignadas </h5>
                                <?php 
                                $args = 
                                array(
                                  'post_type' => 'job_listing',
                                  'post_status' => array('publish','draft','expired'),
                                  'author' => $current_user->ID,
                                ); 
                                $loop = new WP_Query( $args ); 
                                while ( $loop->have_posts() ) : $loop->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10);
                                $user_tarea = get_the_author_meta( 'ID' ); $title_tarea = get_the_title(); $id_tarea = get_the_ID(); $monto_salary = get_post_meta( get_the_ID(), '_job_salary', true ); $email_empleador = get_the_author_meta( 'user_email' ); 
                                
                                    $null = NULL;
                                    $a = 0; 
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
                                        // array(
                                        //    'key' => 'asignar_status_emp',
                                        //    'value' => 'En Curso',
                                        //    'operator' => 'IN',
                                        // )),                                                             
                                    ); 
                                    $loop3 = new WP_Query( $args3 ); 
                                    while ( $loop3->have_posts() ) : $loop3->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10); $asignar_id_empleado = get_field( 'asignar_id_empleado' ); 
                                        $id_empleador = get_post(get_field( 'asignar_id_tarea_publicada' ))->post_author;
                                        $cod_chat = $id_tarea.'-'.$id_empleador.'-'.get_field( 'asignar_id_empleado' ); 
                                        $rol_user = 'Empleado'; $asig_terminada = asig_terminada($cod_chat); 
                                        $post_id = get_the_ID();
                                        $meta_key = 'asignar_status_emp';
                                        $rating_postulado  = get_field('asignar_id_empleado');
                                        $meta_value = 'Terminada';?>
                                        <?php if ($asig_terminada > 0){  update_post_meta($post_id,$meta_key,$meta_value); } ?> 
                                        <?php if ($asig_terminada == 0) { ?>
                                           <?php if ($a == 0) {echo '<p class=" active show">'.$title_tarea.'</p>';} ?>
                                            <div class="ofertas_conetnt">
                                                <div class="datos_name">
                                                    <div class="row border-n mb-5">
                                                        <div class="col-md-12">
                                                            <div class="ofertas_titulos mb-3"> 
                                                                <a title="Perfil usuario" href="perfil?post=<?= get_field( 'asignar_id_empleado' ) ?>">
                                                                    <?php echo get_avatar( user_value( get_field( 'asignar_id_empleado' ) ), 50 );?>
                                                                </a> 
                                                                <div class="flex ml-3">
                                                                    <span><a title="Perfil usuario" href="perfil?post=<?= get_the_author_meta( 'ID' ) ?>">   <?php echo meta_user_value( 'first_name',  get_field( 'asignar_id_empleado' ) );  ?></a>
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
                                                                        
                                                                        <!-- <p>5.0 (3)</p> -->
                                                                    </div>
                                                                </div>

                                                                <a class="ml-auto btn-general" href="" data-toggle="modal" data-target="#modal_rating_<?php echo $cod_chat; ?>"  aria-hidden="true"> Estatus Asignación</a> 

                        
                                                                <!-- Modal rating -->
                                                                <div class="modal fade modal_rating" id="modal_rating_<?php echo $cod_chat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">  
                                                                            <div class="modal-body">
                                                                                <h4 class="mb-3 main-task__title">Estatus / Valoración </h4>
                                                                                <div class="contenido"> 
                                                                                    <div class="datos_genereal">                
                                                                                        <div class="col-lg-8 col-md-9">
                                                                                            <?php if (is_user_logged_in() != NULL){
                                                                                               
                                                                                                echo do_shortcode('[frm-set-get id_tarea_valor='.$id_tarea.'][frm-set-get id_user_valor='.$current_user->ID.'][frm-set-get cod_rating_valor='.$cod_chat.'][frm-set-get id_user_calif_valor='.$asignar_id_empleado.'][frm-set-get id_asignados_valor='.get_the_ID().'][frm-set-get rol_user_rating_valor='.$rol_user.'][formidable id=19]');  ?>
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
                                        <?php }?> 
                                       
                                    <?php $a = $a+1; endwhile; ?>  
                                <?php endwhile; ?>        
                            </div>
                        </div>                                
                    </div>
                </div>    


               