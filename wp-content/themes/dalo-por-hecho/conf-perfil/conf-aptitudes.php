<?php global $current_user, $wp_roles; ?>
              <!--tab aptitudes -->  
                <div class="tab-pane fade " id="v-pills-aptitudes" role="tabpanel" aria-labelledby="v-pills-aptitudes-tab">
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header top-headline" role="tab" id="headingOne">
                                 <h5>
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"aria-controls="collapseOne">
                                        Mis aptitudes
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                            aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Indica en tu perfil tus aptitudes, medio de transporte, certificados y/o cualidades, para tener mas posibilidades de adjudicar un trabajo
                                    </p>
                                        <?php
                                         $sinparametrosu= explode(',', meta_user_value( 'medio_de_transporte_user', $current_user->ID ), 4);

                                        ?>                                    
                                <?php if ( $_GET['map'] == 'save' ) {  ?>         
                                    <div class="woocommerce-notices-wrapper">
                                       <div class="woocommerce-message" role="alert">
                                           “Sus datos han sido guardados correctamente.
                                       </div> 
                                    </div>
                                <?php } ?>     
                                      
                                <form method="post" id="adduser" action="<?php echo get_home_url(); ?>/save">
                                    <div class="form mb-4">
                                        <label for="">¿A qué te dedicas?</label>
                                        <input type="text" placeholder="Coloca tus aptitudes separadas por una ," name="dedicacion_user" id="dedicacion_user" value="<?php the_author_meta( 'dedicacion_user', $current_user->ID ); ?>" />                    

                                        <input type="hidden" name="name_form" value="aptitudes" />
                                    </div>
                                    <div class="form">
                                        <p>Indica tu medio de transporte</p>
                                        <div class="col-md-12 check-line">                                          
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkbox">En linea
                                                    <?php if ($sinparametrosu[0] == 'En linea' OR $sinparametrosu[1] == 'En linea' OR $sinparametrosu[2] == 'En linea' OR $sinparametrosu[3] == 'En linea') { 
                                                    $checked1 = 'checked';?>
                                                    <?php } ?>    
                                                    <input type="checkbox" class="apt" id="medio_de_transporte_user" name="medio_de_transporte_user1" <?php echo $checked1 ?> value="En linea">
                                                    <span class="check"></span>
                                                </label>                                          
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkbox">Caminando
                                                    <?php if ($sinparametrosu[0] == 'Caminando' OR $sinparametrosu[1] == 'Caminando' OR $sinparametrosu[2] == 'Caminando' OR $sinparametrosu[3] == 'Caminando') { 
                                                        $checked2 = 'checked';?>
                                                    <?php } ?>                                                
                                                    
                                                    <input type="checkbox" class="apt" name="medio_de_transporte_user2" id="medio_de_transporte_user" value="Caminando" <?php echo $checked2 ?> >
                                                    <span class="check"></span>
                                                </label>                                          
                                            </div>                                            
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkbox">Bicicleta
                                                    <?php if ($sinparametrosu[0] == 'Bicicleta' OR $sinparametrosu[1] == 'Bicicleta' OR $sinparametrosu[2] == 'Bicicleta' OR $sinparametrosu[3] == 'Bicicleta') { 
                                                        $checked3 = 'checked';?>
                                                    <?php } ?>                                                 
                                                   
                                                    <input type="checkbox" class="apt" name="medio_de_transporte_user3" id="medio_de_transporte_user" value="Bicicleta" <?php echo $checked3 ?>>
                                                    <span class="check"></span>
                                                </label>                                          
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkbox"> Vehículo
                                                    <?php if ($sinparametrosu[0] == 'Vehículo' OR $sinparametrosu[1] == 'Vehículo' OR $sinparametrosu[2] == 'Vehículo' OR $sinparametrosu[3] == 'Vehículo') { 
                                                        $checked4 = 'checked';?>
                                                    <?php } ?>                                                  
                                                    <input type="checkbox" class="apt" name="medio_de_transporte_user4" id="medio_de_transporte_user" value="Vehículo" <?php echo $checked4 ?>>
                                                    <span class="check"></span>
                                                </label>                                          
                                            </div>                                            
                                        </div>
                                        <div class="form mb-4">
                                            <label for="">¿Cuáles idioma maneja?</label>
                                            <input type="text"  placeholder="¿Cuáles idiomas?" id="idiomas_user" name="idiomas_user" value="<?php the_author_meta( 'idiomas_user', $current_user->ID ); ?>"/>
                                        </div>
                                        <div class="form mb-4">
                                            <label for="">Certificaciones</label>
                                            
                                            <input class="form-control" placeholder="Coloca tus aptitudes" name="certificaciones_user" type="text" id="certificaciones_user" value="<?php the_author_meta( 'certificaciones_user', $current_user->ID ); ?>" required />                                            
                                        </div>
                                        <div class="form mb-4">
                                            <label for="">Mi experiencia</label>
                                            
                                            
                                            <textarea rows="10" cols="30" class="textarea-conf" placeholder="¿Dónde ha trabajado y el tiempo?" name="experiencia_user" id="experiencia_user"><?php the_author_meta( 'experiencia_user', $current_user->ID ); ?></textarea>                
                                        </div>
                                    </div>
                                    <div class="cont-boton-cambios">
                                        <input name="updateuser" type="submit" id="updateuser" class="guardar-cambios" value="Guardar cambios" />                         
                                                                                                            
                                    </div> 
                                </form>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>                                
