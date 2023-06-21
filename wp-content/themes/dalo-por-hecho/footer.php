  <footer>
    <ul class="footer">
      <li><a href=""><img class="logo-f" src="<?php echo get_template_directory_uri();?>/assets/img/logo-blanco.png"></a></li>
      <!--<li><a href="">Nosotros</a></li>-->
      <li><a href="<?php echo get_home_url() ?>/categorias">Categorías Populares</a></li>
    </ul>
    
    <div class=" d-flex justify-content-center align-items-center text-center mr-4">
      <?php if( is_user_logged_in() != NULL):?>
              <a class="border-b" href="<?php echo get_home_url() ?>/confi-perfil"> 
              <?php else: ?>
              <a class="border-b" href="#" data-toggle="modal" data-target="#exampleModal"> 
              <?php endif; ?>
              
                        <?php if (is_user_logged_in()){
                          echo "Mi cuenta";
                        }else{ ?>
                            Ingresa
                            </a>
                        <?php } ?>
              </a>
      <!--<a href="" class="border-b">Ingresar</a>-->
      <div class="d-flex">
        <div class="rrss">
          <a href="https://www.facebook.com/Daloporhechocl-105957037944444" target="_blank" ><i class="fa fa-facebook"></i></a> 
        </div>
        
        <div class="rrss">
          <a href="https://www.instagram.com/daloporhecho/" target="_blank"><i class="fa fa-instagram"></i></a>   
        </div>
      
      </div>
    
    
      <a href="<?php echo get_home_url() ?>/soporte" class="border-b">Soporte</a>
    </div>
  </footer>

 <footer class='footer-bottom'>
  <div class="row">
      <hr>
      <div class="col-md-4">Av. Apoquindo 6410, oficina 605, Las Condes</div>
      <div class="col-md-4"></div>
      <div class="col-md-4">Derechos reservados / Teléfonos: (+569) 3 706 9999</div>  
  </div>
</footer>

<!-- Modal Donation-->
<div class="modal fade" id="modal_donation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
    <div class="modal-content">  
        <div class="modal-body">
           <h3 class="mb-3 main-task__title">Pagar Oferta</h3>
                            <div class="contenido">
                                <div class="datos_name">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3">
                                           <div id="img_avatar">
                                             <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?>
                                           </div>
                                        </div>
                                        <div class="col-lg-8 col-md-9">
                                            <p class="name" id="nombre_empleado"></p>
                                            <?php if(!empty($sinparametros)):?>
                                              <span><?php echo $sinparametros[1]; ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="datos_genereal">
                                    <div class="row ">
                                        <div class="col-md-6">
                                          <div class="main-content__localization">                   
                                            <div class="main-content__localizationtext">
                                              <p> 
                                               Resumen
                                              </p>
                                              <br>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                          <div class="main-content__localization">                       
                                            <div class="main-content__localizationtext">
                                              <p>Monto tarea</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="main-content__localization">                       
                                            <div class="main-content__localizationtext">
                                              <p id="monto_tarea"></p>
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                          <div class="main-content__localization">                   
                                            <div class="main-content__localizationtext">
                                              <p>Monto Comisiòn</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="main-content__localization">                    
                                            <div class="main-content__localizationtext">
                                              <p id="monto_comision"></p>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="main-content__localization">                   
                                            <div class="main-content__localizationtext">
                                              <span>Total</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="main-content__localization">                    
                                            <div class="main-content__localizationtext">
                                              <span id="monto_total"></span>
                                            </div>
                                          </div>
                                        </div>                               
                                    </div>
                                </div>
                            </div>


         <?php  echo do_shortcode('[wdgk_donation]');  ?>
        </div>         
    </div>
 </div> 
</div>      
    
    <script src="<?php echo get_template_directory_uri();?>/assets/js/setting-slick.js"></script>
  <script>
    new WOW().init();
  </script> 

 

</body>
<?php wp_footer(); ?>
</html> 