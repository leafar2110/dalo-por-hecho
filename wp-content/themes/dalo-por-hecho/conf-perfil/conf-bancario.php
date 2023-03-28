<?php global $current_user, $wp_roles; ?>
                            <!-- tab bancario -->
                            <div class="tab-pane fade" id="v-pills-bancario" role="tabpanel"
                                aria-labelledby="v-pills-bancario-tab">
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
                                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="cont-top-conf-cuenta">
                                                                <div class="cont-top-conf-cuenta_h4">
                                                                    Datos Bancarios
                                                                </div>
                                                                <div class="barra-progreso">
                                                                    <h6>Completa tu perfil para mejorar tus oportunidades de trabajo
                                                                    </h6>
                                                                    <br>
                                                                    <div class="cont-barra-progreso">
                                                                        <div class="progress">
                                                                            <div class="progress-bar" style="width:<?php echo $porcent; ?>%"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show mb-5" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">  
                                                    <div class="form-conf-cuenta">
                                                    <?php if ( $_GET['mban'] == 'save' ) {  ?>         
                                                        <div class="woocommerce-notices-wrapper">
                                                           <div class="woocommerce-message" role="alert">
                                                               “Sus datos han sido guardados correctamente.
                                                           </div> 
                                                        </div>
                                                    <?php } ?>                                                          
                                                        <form method="post" id="adduser" action="<?php echo get_home_url(); ?>/save">
                                                            <div class="row cont-row-form">
                                                                <div class="col-md-12">
                                                                    <input class="form-control" placeholder="Nombre y Apellido" name="nombre_bancario" type="text" id="nombre_bancario" value="<?php the_author_meta( 'nombre_bancario', $current_user->ID ); ?>" required />

                                                                    <input type="hidden" name="name_form" value="bancario" />
                                                                </div>
                                                            </div>
                                                            <div class="row cont-row-form">    
                                                                <div class="col-md-12">
                                                                    <input class="form-control" placeholder="Rut" name="rut_bancario" type="text" id="rut_bancario" value="<?php the_author_meta( 'rut_bancario', $current_user->ID ); ?>" required />
                                                                </div>
                                                            </div> 
                                                            <div class="row cont-row-form">
                                                                <div class="col-md-12">           
                                                                    <label for="exampleFormControlSelect1">Tipo de Cuenta</label><br>              
                                                                    <select class="form-control" name="tipo_de_cuenta_bancario" id="tipo_de_cuenta_bancario" required>
                                                                        <?php if (meta_user_value( 'tipo_de_cuenta_bancario', $current_user->ID ) != NULL) 
                                                                        { ?>
                                                                            <option><?php echo meta_user_value( 'tipo_de_cuenta_bancario', $current_user->ID )?></option>
                                                                             
                                                                        <?php } else { ?>       
                                                                            <option value="">Seleccione</option>
                                                                        <?php } ?>      
                                                                        <option value="Cuenta Vista">Cuenta Vista</option>
                                                                        <option value="Chequera Electrónica">Chequera Electrónica</option>
                                                                        <option value="Cuenta Corriente">Cuenta Corriente</option>
                                                                        <option value="Cuenta Ahorro">Cuenta Ahorro</option>
                                                                    </select>
                                                                </div>
                                                            </div>                   
                                                            <div class="row cont-row-form">
                                                                <div class="col-md-12">
                                                                    <label for="exampleFormControlSelect1">Banco</label><br>
                                                                    <select class="form-control" name="banco_bancario" id="banco_bancario" required>
                                                                        <?php if (meta_user_value( 'banco_bancario', $current_user->ID ) != NULL) { ?>
                                                                            <option><?php echo meta_user_value( 'banco_bancario', $current_user->ID )?></option>
                                                                             
                                                                        <?php } else { ?>       
                                                                            <option value="">Seleccione</option>
                                                                        <?php } ?>      
                                                                        <option value="Coopeuch">Coopeuch</option>
                                                                        <option value="HSBC Bank">HSBC Bank</option>
                                                                        <option value="Itaú">Itaú</option>
                                                                        <option value="Rabobank">Rabobank</option>
                                                                        <option value="Prepao Los Héroes">Prepao Los Héroes</option>
                                                                        <option value="Scotiabank">Scotiabank</option>
                                                                        <option value="Scotiabank Azul">Scotiabank Azul</option>
                                                                        <option value="Banco BICE">Banco BICE</option>
                                                                        <option value="Banco Consorio">Banco Consorio</option>
                                                                        <option value="Banco Corpbanca">Banco Corpbanca</option>
                                                                        <option value="Banco Crédito e Inversiones">Banco Crédito e Inversiones</option>
                                                                        <option value="Banco Estado">Banco Estado</option>
                                                                        <option value="Banco Falabella">Banco Falabella</option>
                                                                        <option value="Banco Internacional">Banco Internacional</option>
                                                                        <option value="Banco París">Banco París</option>
                                                                        <option value="Banco Ripley">Banco Ripley</option>
                                                                        <option value="Banco Santander">Banco Santander</option>
                                                                        <option value="Banco Security">Banco Security</option>
                                                                        <option value="Banco de Chile / Edwards-Citi">Banco de Chile / Edwards-Citi</option>
                                                                        <option value="Banco del Desarollo">Banco del Desarollo</option>
                                                                    </select>                           
                                                                </div>
                                                            </div>
                                                            <div class="row cont-row-form">    
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" id="numero_de_cuenta_bancario" placeholder="Número de Cuenta" name="numero_de_cuenta_bancario" value="<?php the_author_meta( 'numero_de_cuenta_bancario', $current_user->ID ); ?>" required/>
                                                                </div>
                                                            </div>
                                                            <div class="row cont-row-form">   
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" id="email_bancario"
                                                            placeholder="Email" name="email_bancario" value="<?php the_author_meta( 'email_bancario', $current_user->ID ); ?>" required/>
                                                                </div>
                                                            </div> 
                                                            <div class="cont-boton-cambios">
                                                                <input name="updateuser" type="submit" id="updateuser" class="guardar-cambios" value="Guardar cambios" />
                                                                <?php wp_nonce_field( 'update-user' ) ?>
                                                                <input name="action" type="hidden" id="action" value="update-user" />
                                                                                                            
                                                            </div>                                     
                                                        </form><!-- #adduser -->
                                                    </div>    
                                                </div>    
                                            </div>    
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>  