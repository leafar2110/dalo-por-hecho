<?php global $current_user, $wp_roles; ?>
                            <!-- tab emblemas -->
                            <div class="tab-pane fade" id="v-pills-emblemas" role="tabpanel" aria-labelledby="v-pills-emblemas-tab">
                                <div class="card">
                                    <div class="card-header top-headline" role="tab" id="headingOne">
                                        <h5>
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Mis emblemas
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                        aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="content-inf-emblemas">
                                            <div class="content-inf-emblemas_h3">
                                                <h3>Adjunta, si tienes, tus certificados académicos si te aportan para
postular a realizar algún servicio solicitado, así como también tu Certificado de
Antecedentes Penales para entregar mas seguridad y confianza a la persona que solicita
un servicio</h3>
                                            </div>
                                            <div class="content-inf-emblemas-cont">
                                                <h2 class="mt-3 mb-3">Emblemas Principales</h2>
                                                <div class="row">                                         
                                                    <?php 
                                                    $argss = array (
                                                        'post_type' => 'emblema',
                                                        'post_status' =>'publish',
                                                                             
                                                    ); 
                                                     $loops = new WP_Query( $argss ); 
                                                     while ( $loops->have_posts() ) : $loops->the_post(); $title_emblema = "Emblema:&nbsp;".get_the_ID()."&nbsp;-Usuario:&nbsp;".$current_user->user_login; ?>
                                                        <div class="col-md-6 content-inf-emblemas-cont_col-6">
                                                            <div class="content-inf-emblemas-cont-box">
                                                                <div class="box-img-emblemas">
                                                                    <img class="blog-general__poster" src="<?php the_post_thumbnail_url('full'); ?>">
                                                                </div>
                                                                <div class="box-inf-emblemas">
                                                                    <h6><?php the_title() ?></h6>
                                                                    <p><?php echo the_excerpt(); ?></p>
                                                                </div>
                                                                <div class="box-boton-emblemas">
                                                                    <a class="box-boton-emblemas_a" data-toggle="modal" data-target="#modal_emblemas<?php echo get_the_ID(); ?>">Añadir</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <!-- Modal añadir -->
                                                        <div class="modal fade" id="modal_emblemas<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content"> 
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button> 
                                                                    <div class="modal-body">
                                                                        <div class="contenido">
                                                                            <div class="datos_name"> 
                                                                                <div class="col-md-12">
                                                                                    <center><img class="blog-general__poster" src="<?php the_post_thumbnail_url('full'); ?>"></center>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <center><h4><?php the_title(); ?></h4></center>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="content-inf-emblemas_h3">
                                                                                        <h3><?php the_content() ?></h3>
                                                                                    </div>
                                                                                </div>  
                                                                                <div class="datos_genereal">
                                                                                    <div class="col-md-12">
                                                                                        <?php echo do_shortcode('[frm-set-get title_emblema='.$title_emblema.'][frm-set-get id_emblema='.get_the_ID().'][frm-set-get id_user_emblema='.$current_user->ID.'][frm-set-get user_emblema='.$current_user->user_login.'][formidable id=16]');  ?>
                                                                                    </div>       
                                                                                </div>              
                                                                            </div>
                                                                        </div>
                                                                    </div>         
                                                                </div>
                                                            </div> 
                                                        </div>                                                 

                                                    <?php endwhile; ?>   
                                                        
                                                    
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>