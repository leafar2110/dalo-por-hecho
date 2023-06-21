<?php global $current_user, $wp_roles; 
$cont1 = 0; $cont2 = 0; $cont3 = 0; $cont4 = 0; $cont5 = 0; $cont6 = 0; $cont7 = 0; $cont8 = 0;


if (meta_user_value( 'first_name', $current_user->ID ) != NULL) $cont2 = $cont2 +1;
//if (meta_user_value( 'foto_portada_user', $current_user->ID ) != NULL) $cont3 = $cont3 +1;
if (meta_user_value( 'description', $current_user->ID ) != NULL) $cont4 = $cont4 +1;
if (meta_user_value( 'direccion_user', $current_user->ID ) != NULL) $cont5 = $cont5 +1;
if (meta_user_value( 'frase_user', $current_user->ID ) != NULL) $cont6 = $cont6 +1;
if (meta_user_value( 'fecha_nac_user', $current_user->ID ) != NULL) $cont7 = $cont7 +1;
if (meta_user_value( 'foto_user', $current_user->ID ) != NULL) $cont8 = $cont8 +1;

$porcent = (( $cont2 + $cont4 + $cont5 + $cont6 + $cont7 + $cont8)/7)*100;
?>

                            <!-- tab conf -->
                            <div class="tab-pane fade" id="v-pills-conf" role="tabpanel" aria-labelledby="v-pills-conf-tab">
                              <div id="post-<?php the_ID(); ?>">
                                <div class="entry-content entry">
                                  <?php the_content(); ?>
                                  <?php if ( !is_user_logged_in() ) : ?>
                                    <p class="warning">
                                      <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                                    </p><!-- .warning -->
                                  <?php else : ?>
                                  <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>                                
                                    <div class="card">
                                      <div class="card-header top-headline" role="tab" id="headingOne">
                                        <h5>
                                          <div class="cont-img-conf-cuenta_a">
                                            <a class="ver-perfil-publico" href="perfil">Ver tu perfil publico</a>
                                          </div>
                                          <a data-toggle="collapse"  aria-expanded="true" aria-controls="collapseOne">
                                            <div class="cont-top-conf-cuenta">
                                              <div class="cont-top-conf-cuenta_h4">
                                                Cuenta 
                                                <?php $urlsinparametros= explode('=', $_SERVER['REQUEST_URI'], 2);
                                                $urlsin = $urlsinparametros[1]; ?>
                                              </div>
                                            </div>
                                          </a>
                                        </h5>
                                      </div>
                                      <div id="collapseOne" class="collapse show mb-5" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <?php if ( $_GET['mconf'] == 'save' ) {  ?>         
                                          <div class="woocommerce-notices-wrapper">
                                            <div class="woocommerce-message" role="alert">
                                              “Sus datos han sido guardados correctamente.
                                            </div> 
                                          </div>
                                        <?php } ?> 
                                        <ul class="nav nav-tabs h-p-nav-tab">
                                          <li class="nav-item">
                                            <a class="nav-link rol_user-tab active" id="item-perfil" data-toggle="tab" href="#rol_user">
                                              Cambiar Rol 
                                            </a>                                                      
                                          </li>   
                                          <li class="nav-item">
                                            <a class="nav-link imagen-perfil-tab" id="item-perfil" data-toggle="tab" href="#imagen-perfil">   
                                              Imagen Perfil 
                                            </a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link imagen-perfil-tab" id="item-perfil" data-toggle="tab" href="#datos-personales">   
                                              Datos Personales
                                            </a>
                                          </li>                                                       
                                        </ul> 

                                        <div class="tab-content">

                                          <!-- Imagen Perfil -->   
                                          <div id="rol_user" class="container tab-pane active"><br>
                                            <div class="cont-pago-estado">
                                              <div class="cont-pago-estado-tab">
                                                <p>Cambiar Rol de Usuario</p>
                                                <h6>Que deseas en DALO POR HECHO </h6>
                                                <div class="opc-conf-cuenta">
                                                  <form method="post" id="adduser" action="<?php echo get_home_url(); ?>/save">  
                                                    <input type="hidden" name="name_form" value="rol" />
                                                    <label class="radio-inline">
                                                      <input type="radio" name="user_registration_radio_1600171615" id="user_registration_radio_1600171615" value="Ofrezco un Servicio"  <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Ofrezco un Servicio" ){ echo 'checked="checked"';} ?>>Necesito un Servicio
                                                    </label>
                                                    <label class="radio-inline">
                                                      <input type="radio" name="user_registration_radio_1600171615" id="user_registration_radio_1600171615" value="Necesito un Servicio" <?php if( meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Necesito un Servicio" ){ echo 'checked="checked"';} ?>>
                                                      Ofrezco un Servicio
                                                    </label>
                                                    <div class="cont-boton-cambios">
                                                      <input name="updateuser" type="submit" id="updateuser" class="guardar-cambios" value="Guardar cambios" />
                                                                <?php wp_nonce_field( 'update-user' ) ?>
                                                      <input name="action" type="hidden" id="action" value="update-user" />
                                                    </div>
                                                  </form>                                                         
                                                </div>                                               
                                              </div>
                                            </div>
                                          </div> 
 
                                          <!-- Imagen Perfil -->                                    
                                          <div id="imagen-perfil" class="container tab-pane  fade"><br>
                                             <div class="cont-pago-estado">
                                                 <div class="cont-pago-estado-tab">
                                                    <p>Imagen Perfil</p>
                                                    <div class="cont-img-conf-cuenta"> 
                                                       <?php echo do_shortcode('[user_profile_avatar_upload]');?>
                                                     </div>                                     
                                                 </div>
                                             </div>
                                         </div>  
                                          <!-- Datos Personales -->                                    
                                          <div id="datos-personales" class="container tab-pane  fade"><br>
                                            <div class="cont-pago-estado">
                                              <div class="cont-pago-estado-tab">
                                                <p>Datos Personales</p>
                                                <div class="form-conf-cuenta">
                                                  <form method="post" id="adduser" action="<?php echo get_home_url(); ?>/save">                        
                                                    <div class="row cont-row-form">
                                                      <div class="col-md-6">
                                                        <input class="form-control" placeholder="Nombre y Apellido" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                                                        <input type="hidden" name="name_form" value="conf" />
                                                      </div>
                                                      <div class="col-md-6">
                                                        <input class="form-control" placeholder="Dirección" name="direccion_user" type="text" id="direccion_user" value="<?php the_author_meta( 'direccion_user', $current_user->ID ); ?>" />
                                                      </div>
                                                    </div>
                                                    <div class="row cont-row-form">
                                                      <div class="col-md-6">
                                                        <input class="form-control" placeholder="Escribe tu frase" name="frase_user" type="text" id="frase_user" value="<?php the_author_meta( 'frase_user', $current_user->ID ); ?>" />
                                                      </div>
    
                                                    </div>                                           
                                                    <h6>Fecha de nacimiento </h6>
                                                    <div class="form-inline cumple">
                                                      <input type="text" class="form-control" placeholder="DD" name="dia" id="dia" maxlength="2" value="<?php if (meta_user_value( 'fecha_nac_user', $current_user->ID )!=NULL) {echo date('d', strtotime(meta_user_value( 'fecha_nac_user', $current_user->ID ))); }?>">
                                                      <input type="text" class="form-control" placeholder="MM" name="mes" id="mes" min="1" max="12" maxlength="2" value="<?php if (meta_user_value( 'fecha_nac_user', $current_user->ID )!=NULL) {echo date('m', strtotime(meta_user_value( 'fecha_nac_user', $current_user->ID ))); }?>">
                                                      <input type="text" class="form-control" placeholder="AA" name="ano" id="ano" min="1900" maxlength="4" value="<?php if (meta_user_value( 'fecha_nac_user', $current_user->ID )!=NULL) {echo date('Y', strtotime(meta_user_value( 'fecha_nac_user', $current_user->ID ))); }?>">
                                                      <input type="hidden" class="form-control" id="fecha_nac_user" placeholder="Enter email" name="fecha_nac_user" value="<?php echo meta_user_value( 'fecha_nac_user', $current_user->ID ) ?>" />
                                                    </div>
                                                    <h6>Agrega tu descripción</h6>
                                                    <textarea name="description" id="description" rows="10" cols="30" class="textarea-conf"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                                                    
                                                    <div class="cont-boton-cambios">
                                                      <input name="updateuser" type="submit" id="updateuser" class="guardar-cambios" value="Guardar cambios" />
                                                          <?php wp_nonce_field( 'update-user' ) ?>
                                                      <input name="action" type="hidden" id="action" value="update-user" />
                                                      <a class="desactivar-cuenta" href="#">Desactivar cuenta</a>               
                                                    </div>
                                                  </form>
                                                </div>    
                                              </div>
                                            </div>
                                          </div>                                                   

                                        </div>
                                      </div>
                                    </div>                                                   
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>

                          
                        