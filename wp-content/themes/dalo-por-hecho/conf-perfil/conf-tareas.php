<?php global $current_user, $wp_roles; ?>
                <!--tab tareas -->          
                <div class="tab-pane fade " id="v-pills-tareas" role="tabpanel" aria-labelledby="v-pills-tareas-tab">

                    <div class="content-metodos-pago">
                        <h5>Tareas publicadas</h5>
                        <div class="container mt-3">
                            <?php if ( $_GET['mban'] == 'save' ) {  ?>         
                                <div class="woocommerce-notices-wrapper">
                                    <div class="woocommerce-message" role="alert">
                                        “Sus datos han sido guardados correctamente.
                                    </div> 
                                </div>
                            <?php } ?>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="list_job" class="container tab-pane active"><br>
                                    <div class="cont-pago-estado">
                                        <div class="tabla-pagos">
                                            <table class="tabla-pagos_table">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha de la tarea</th>
                                                        <th>Nombre de la tarea</th>
                                                        <th>Editar</th>
                                                    </tr>
                                                </thead>                                             
                                                <?php 
                                                $args = 
                                                array(
                                                    'post_type' => 'job_listing',
                                                    'post_status' => array('publish','draft', 'expired'),
                                                    'author' => $current_user->ID,
                                                ); 
                                                $loop = new WP_Query( $args ); 
                                                while ( $loop->have_posts() ) : $loop->the_post(); 
                                                ?>  
                                                <tr>                                                         
                                                     <td class="tabla-pagos_table_td">
                                                         <p><?php echo date("d/m/y",strtotime(get_post(get_the_ID())->post_date));?> </p>
                                                    </td>
                                                    <td class="tabla-pagos_table_td">
                                                        <p><?php the_title();?></p>
                                                    </td>
                                                    <td class="tabla-pagos_table_td">
                                                        
                                                            
                                                        <a class="btn-general historial-pago-tab" data-toggle="tab" href="#edit_job<?=get_the_ID()?>">Editar</a>
                                                        
                                                    </td>
                                                </tr>  
                                                <?php endwhile; ?>     
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                $args = 
                                array(
                                    'post_type' => 'job_listing',
                                    'post_status' => array('publish','draft', 'expired'),
                                    'author' => $current_user->ID,
                                ); 
                                $loop = new WP_Query( $args ); 
                                while ( $loop->have_posts() ) : $loop->the_post(); 
                                ?>    
                                    <div id="edit_job<?=get_the_ID()?>" class="container tab-pane ">
                                        <ul class="nav nav-tabs h-p-nav-tab">
                                            <li class="nav-item">
                                                <a class="nav-link historial-pago-tab " data-toggle="tab" href="#list_job">Volver</a>
                                            </li>
                                        </ul>                           
                                        <div class="form-conf-cuenta">
                                            <form method="post" id="adduser" action="<?php echo get_home_url(); ?>/save">
                                                <div class="row cont-row-form">
                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlSelect1">Título a tu tarea</label>
                                                        <input class="form-control" placeholder="Ej, cargar maletas en edificio" name="job_title" type="text" id="" value="<?php echo  get_post(get_the_ID())->post_title; ?>" required />

                                                        <input type="hidden" name="name_form" value="job_list" />
                                                    </div>
                                                </div>
                                                <div class="row cont-row-form">
                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlSelect1">Categorías</label>
                                                        <select class="form-control hid" name="job_category" id="job_category" required="">                  
                                                            <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'order' => 'asc', 'hide_empty'=> FALSE ));  ?>
                                                            <?php foreach($product_categories as $category):  global $wpdb; $select = NULL;?>
                                                                <?php if(wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->term_id == $category->term_id){ $select = 'selected';
                                                                 }?> 
                                                                 <option <?php echo $select; ?> id="<?=$category->term_id ?>" value="<?=$category->term_id?>">    <?=$category->name ?>
                                                                </option>
                                                            <?php  endforeach; ?>                       
                                                        </select>  
                                                    </div>                               
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <label for="exampleFormControlSelect1">Título a tu tarea</label>
                                                    <textarea class="textarea-conf" name="_job_description" id="_job_description"ows="10" cols="30" placeholder="Ej, vivo en el 5 piso , no puedo cargar peso por asuntos medicos" required=""><?php echo  meta_value( '_job_description', get_the_ID() ) ?>
                                                    </textarea>           
                                                </div> 
                                                <div class="col-md-12">
                                                    <div class="content-row">
                                                        <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_type', 'orderby' => 'menu_order', 'order' => 'asc', 'hide_empty'=> FALSE ));  ?>
                                                        <?php foreach($product_categories as $category):  global $wpdb; $i = 0;?>    <?php if($category->term_id == wp_get_post_terms( get_the_ID(), 'job_listing_type' )[0]->term_id){ $checked = 'checked'; ?>
                                                            <script type="text/javascript">
                                                                $("#job_location2").css("display", "none");
                                                                $("#job_direccion2").css("display", "none");
                                                            </script>
                                                            <?php }else{$checked = '';}?>                   
                                                            <div class="col-md-6 step-content ">
                                                                <a class="job-but" onclick="mark('<?=$category->slug ?>')"> 
                                                                    <p class="p-0 m-0 color-blue">
                                                                        <i  class="<?php if($category->name == 'En persona'){ $mens = "Selecciona si necesitas la persona físicamente en el lugar"; echo "fa fa-map-marker";}if($category->name == 'En línea'){ $mens = "Selecciona si la tarea se puede hacer desde casa"; echo "fa fa-globe";} ?>" aria-hidden="true"></i>
                                                                        <input name="job_type" id="<?=$category->slug ?>" type="radio" value="111" <?php echo $checked ?>  onclick="block_<?=$category->term_id ?>()"
                                                                        <?=$category->name ?>> 
                                                                    </p>
                                                                    <span><?php echo $mens; ?></span>
                                                                </a>        
                                                            </div>                                                              
                                                        <?php $i = $i + 1; endforeach; ?>                       
                                                    </div>
                                                </div>
                                                <div class="row cont-row-form" id="job_location3">
                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlSelect1">Ciudad</label>
                                                        <li class='nav-item dropdown dowms'>   
                                                            <div class="main-form__icons">
                                                                <input class="form-control" value="" type="search" placeholder="Localización" aria-label="Search" name="job_location" id="job_location" autocomplete="off">
                                                                <input class="form-control" value="" type="hidden" placeholder="Localización" aria-label="Search" name="job_location1" id="job_location1" autocomplete="off">
                                                            </div>             
                                                            <div aria-labelledby='dropdownMenuButton' class='dropdown-menu dropdown-menu__scroll'>
                                                                <div class='content-drop' id="result_submit">

                                                                </div>
                                                            </div>                    
                                                        </li>
                                                    </div>
                                                </div>
                                                <div class="row cont-row-form" id="job_direccion3">
                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlSelect1">Dirección</label>
                                                        <input class="search_query form-control" type="text" name="_job_direccion" id="_job_direccion" placeholder="Dirección" value="<?php echo  meta_value( '_job_direccion', get_the_ID() ) ?>">
                                                    </div>
                                                </div>
                                                <div class="row cont-row-form">
                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlSelect1">Fecha Tarea</label>
                                                        <input type="date" name="_job_expires" id="_job_expires" placeholder="seleciona una fecha" required=""  value="<?php echo  meta_value( '_job_expires', get_the_ID() ) ?>" />
                                                    </div>
                                                </div> 
                                                <div class="row cont-row-form">
                                                    <div class="col-md-12">
                                                        <p>
                                                            <a class="ml-auto" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                <label class="text-start mt-4">Desea cambiar tu presupuesto para la tarea? </label>
                                                                <input type="text"  name="" id="" placeholder="$000" value="<?php echo meta_value( '_job_salary', get_the_ID() ) ?>" disabled />
                                                            </a>
                                                        </p>
                                                        <div class="collapse" id="collapseExample">
                                                            <div class="card card-body">              
                                                                <?php if(meta_value( '_job_horas', get_the_ID() ) != NULL ){ $checkedh = 'checked'; 
                                                                }else{$checkedsh = 'checked';
                                                                }?>  
                                                                <span style="font-size: 12px;color: #b3b3b3;" class="list-inline text-center">Cuanto estás dispuesto a pagar por la tarea</span>            
                                                                <div class="row main-type__inputs mb-3">
                                                                    <input class="input-type__presupuesto" type="radio" name="radio1" id="radio1" onclick="quitar();" <?php echo $checkedsh ?> />
                                                                    <label class="label-type__presupuesto" for="tab1">Total</label>
                                                                    <input class="input-type__presupuesto" type="radio" name="radio1" id="radio2" onclick="quitar();" <?php echo $checkedh ?>/>
                                                                    <label class="label-type__presupuesto"  for="tab2">Tarifa por horas</label>   
                                                                    <div class="tab content1">
                                                                        <div class="row mb-3">
                                                                            <div class="col-md-6">
                                                                                <input type="text"  name="_job_total" id="job_total_conf" placeholder="$000"  value="" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab content2">
                                                                        <div class="row mb-3">
                                                                            <div class="col-md-6">
                                                                                <input type="text" onkeypress="return onlynumbers(event)" name="_job_clp" id="job_clp_conf" placeholder="CLP" value="<?php echo meta_value( '_job_clp', get_the_ID() ) ?>"/>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input type="text" onkeypress="return onlynumbers(event)" name="_job_horas" id="job_horas_conf" placeholder="Horas" value="<?php echo meta_value( '_job_horas', get_the_ID() ) ?>"/>
                                                                            </div>
                                                                        </div>                         
                                                                    </div>
                                                                    <div class="presupuesto">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <label class="text-start m-0">Presupueto estimado
                                                                                </label>
                                                                                <span class="list-inline text-center">El monto tendrá un recargo del 10%
                                                                                </span>
                                                                            </div>
                                                                            <div class="col-md-4 d-flex justify-content-center align-items-center" >
                                                                                <p id="multipli"></p>
                                                                                 <input type="text" class="form-control" name="_job_salary" id="job_salary_conf" value="" />
                                                                            </div>
                                                                        </div>
                                                                    </div>                               
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                     
                                                <div class="row cont-row-form">
                                                    <div class="col-md-12">
                                                        <fieldset class="fieldset-company_logo fieldset-type-file">
                                                            <label for="company_logo">Agregar Imagen <small>(opcional)</small></label>
                                                            <div class="field ">
                                                                <div class="job-manager-uploaded-files">
                                                                </div>
                                                                <input type="file" class="input-text wp-job-manager-file-upload" data-file_types="jpg|jpeg|gif|png" name="_company_logo" id="company_logo" placeholder="">
                                                                <small class="description">
                                                                Tamaño máximo del archivo: 10 MB.   </small>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>                                         
                                                <div class="cont-boton-cambios">
                                                    <input name="updateuser" type="submit" id="updateuser" class="guardar-cambios" value="Guardar cambios" />
                                                                <?php wp_nonce_field( 'update-user' ) ?>
                                                    <input type="hidden" id="id_job" name="id_job" value="<?php echo get_the_ID() ?>">    
                                                </div>                                     
                                            </form><!-- #adduser -->
                                        </div>
                                    </div> 
                                <?php endwhile; ?>
                            </div>
                        </div>    
                    </div>
                </div> 

<script type="text/javascript">

function form_confi(){
   $("#form_conf").css("pointer-events", "none");
}

function formconfi(){
   $("#form_conf").css("pointer-events", "");
} 
    
function onlynumbers_conf(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " 0123456789";
      especiales = [];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }

    
$("#job_total_conf").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        //.replace(/([0-9])([0-9]{2})$/, '$1,$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});



function quitar_conf(){
   var valuea = "";
   $("#job_salary_conf").val(valuea);
   $("#job_clp_conf").val(valuea);
   $("#job_horas_conf").val(valuea);
   $("#job_total_conf").val(valuea);
}   
$(document).ready(function () {
    
        
        $("#job_clp_conf").keyup(function () {
            var valuea =  document.getElementById("job_horas_conf").value*$(this).val();
            v=new Intl.NumberFormat("de-DE").format(valuea);
            $("#job_salary_conf").val(v);
        });    
        $("#job_horas_conf").keyup(function () {
            var valuea =  document.getElementById("job_clp_conf").value*$(this).val();
            v=new Intl.NumberFormat("de-DE").format(valuea);
            $("#job_salary_conf").val(new Intl.NumberFormat("de-DE").format(valuea));

        });     
        $("#job_total_conf").keyup(function () {
            var valuea =  document.getElementById("job_total_conf").value;
            $("#job_salary_conf").val(valuea);
        });


});
</script>                                   
