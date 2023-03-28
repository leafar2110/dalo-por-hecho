<?php global $current_user, $wp_roles; ?>
                            <!--tab senales -->
                            <div class="tab-pane fade" id="v-pills-senales" role="tabpanel"
                            aria-labelledby="v-pills-senales-tab">
                                <div class="card">
                                    <div class="card-header top-headline" role="tab" id="headingOne">
                                        <h5>
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                               Señales de Tareas
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show mb-5" role="tabpanel"
                                    aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="content-inf-s-tareas">
                                            <div class="content-inf-s-tareas_h3">
                                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y
                                                archivos de texto. </p>
                                            </div>
                                            <div class="content-card-s-tareas">
                                                <div class="content-card-s-tareas_icon"><img
                                                    src="<?php echo get_template_directory_uri();?>/assets/img/vistobueno.png" alt="">
                                                </div>
                                                <div class="content-card-s-tareas_p">
                                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis laboriosam molestias</p>
                                                </div>
                                            </div>
                                            <div class="s-personalizada_h3">
                                                <h3>AGREGAR SEÑAL PERSONALIZADA</h3>
                                                <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h6>
                                                <input class="s-personalizada_input" type="text" placeholder="Limpieza, Mecanico, cocina, etc">
                                                <div class="a-btn-n">
                                                    <a class=" btn-a-dl" href="#">Agregar Señal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- end tab senales-->  