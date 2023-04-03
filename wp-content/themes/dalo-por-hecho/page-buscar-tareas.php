<?php 
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */
get_header();
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $post, $current_user, $wp_roles;

$job_salary   = get_post_meta( get_the_ID(), '_job_salary', true );
$job_featured = get_post_meta( get_the_ID(), '_featured', true );
$company_name = get_post_meta( get_the_ID(), '_company_name', true );
$al=str_replace("%2C%20", ", ", $_GET["location"]);
$args = arg($_POST["search_text22"],'job_listing_category',$_POST["search"],$_POST["search_text"],$_POST["search_text33"]);  
$asig =  array(
  'post_type' => 'asignados',
  'post_status' => 'publish',

);

$user_actual = $current_user->ID;  

?>
<style type="text/css">
#show,#hide, #hiden, #most{
    display:none;
}

div#contente {
    display:none;
  padding:10px;

  cursor:pointer;
      max-width: 700px;
  
}
 
input#show:checked ~ div#contente {
    display:block;
}

input#hide:checked ~ div#contente {
    display:none;
}
</style>
<header>
<div class="nav_bottom ">
    <ul class="navbar-nav container row">
        <div class="container">
            <div class="row">
                <div class=" col-6">
                    <label for="show">
                        <span id="ocul">
                            <a href='#' onclick="mostrar()" id="mov" aria-expanded='false' aria-haspopup='true' class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                                Filtrar búsqueda
                            </a>
                        </span>
                        <span id="most">
                            <a href='#' onclick="hidd()" id="mov" aria-expanded='false' aria-haspopup='true' class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                                Filtrar búsqueda
                            </a>
                        </span>
                    </label>
                </div>       
                <div class="col-6">
                    <ul class="navbar-nav container ">
                        <li class='nav-item dropdown dowms'>
                            <a href='' aria-expanded='false' aria-haspopup='true' class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                            </a>
                            <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                                <div class='content-drop'>

                                </div>
                            </div>
                        </li>
                        <li class='nav-item dropdown dowms mr-auto'>
                            <a href='' aria-expanded='false' aria-haspopup='true' class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>

                            </a>
                            <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                                <div class='content-drop'>

                                </div>
                            </div>
                        </li>
                        <form class="form-inline position-relative" method="post">
                            <div class="main-form__icons">
                                <input class="form-control buscador " type="search" placeholder="Buscar Tarea" aria-label="Search" name="search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <button type="submit"></button> 
                            </div>                   
                        </form>
                    </ul>
                </div>               
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="contente" class="dropdown-menu dropdown-menu__scroll"> 
                        <form method="post">                       
                            <div class="container border-n smargen">
                                <div class="row">
                                    <div class="col-4">
                                        <li class='nav-item dropdown dowms'>
                                            <div class="main-form__icons">
                                                <input class="form-control buscador2" value="" type="search" placeholder=" Localización" aria-label="Search" name="search_text" id="search_text" autocomplete="off">
                                            </div>             
                                            <div aria-labelledby='dropdownMenuButton' class='dropdown-menu dropdown-menu__scroll'>
                                                <div class='content-drop' id="result">

                                                </div>
                                            </div>                    
                                        </li>
                                    </div>
                                    <div class="col-4">    
                                        <li class='nav-item dropdown dowms'>
                                            <div class="main-form__icons">
                                                <input class="form-control buscador2" type="search" placeholder="Categorías" aria-label="Search" name="search_text2" id="search_text2" autocomplete="off">
                                                <input class="form-control buscador2" type="hidden" placeholder="Categorías" aria-label="Search" name="search_text22" id="search_text22">
                                            </div>                   
                                            <div aria-labelledby='dropdownMenuButton' class='dropdown-menu dropdown-menu__scroll'>
                                                <div class='content-drop' id="result2">

                                                </div>
                                            </div> 
                                        </li>
                                    </div>
                                    <div class="col-4">    
                                        <li class='nav-item dropdown dowms'>
                                            <div class="main-form__icons">
                                                <input class="form-control buscador2" type="search" placeholder="Modo" aria-label="Search" name="search_text3" id="search_text3" autocomplete="off">
                                                <input class="form-control buscador2" type="hidden" placeholder="Modo" aria-label="Search" name="search_text33" id="search_text33">
                                            </div>                   
                                            <div aria-labelledby='dropdownMenuButton' class='dropdown-menu dropdown-menu__scroll'>
                                                <div class='content-drop' >                                              
                                                    <?php $product_categories = get_categories( array( 'taxonomy' => 'job_listing_type', 'orderby' => 'menu_order', 'order' => 'asc', 'hide_empty'=> FALSE ));  ?>
                                                    <?php foreach($product_categories as $category):  global $wpdb; $i = 0;?>  
                                                        <a class='dropdown-item' onclick="print2('<?=$category->name ?>','<?=$category->slug ?>')">
                                                           <p><?=$category->name ?> </p>
                                                        </a>                                        
                                                    <?php $i = $i + 1; endforeach; ?>                                              
                                                </div>                                                
                                            </div> 
                                        </li>
                                    </div>                            
                                </div>
                            </div>

                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-6">
                                        <li class='nav-item dropdown dowms'>
                                            <div class="main-form__icons">
                                                <input class="btn-oferta" type="submit" placeholder="Buscar" value="Buscar" >
                                            </div>                   

                                        </li>         
                                    </div>   
                                    <div class="col-6">
                                        <li class='nav-item dropdown dowms'>
                                            <div class="main-form__icons">                                               
                                                <a class="nav-link btn-custom-nav  btn-custom-transparent-nav" href="<?php echo get_home_url() ?>/buscar-tareas" >Cancelar</a>
                                            </div>                 
                                        </li>                                
                                    </div>
                                </div>
                            </div> 
                        </form>                           
                    </div>
                </div>
            </div>
        </div> 
      
    </ul>  
</div>
</header>

<div class="container buscar_tareas buscar_tareas-t">
    <div class="main-taks__maxgrid">
        <div class="main-taks__cards">
            <div class="main-taks__cardsmobile">
                <div class="main-taks__mobiletitle">
                    <span>Ver más tareas</span>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="main-taks__sidebar">
                    <div class="scroll-admin ">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php $i=0;

                            $loop = new WP_Query(  $args );
                            $loop2 = new WP_Query( $asig);

                            while ( $loop->have_posts() ) : $loop->the_post(); global $product; $show_slary = get_post_meta( get_the_ID(), '_job_salary', true )?>

                            <?php if ($status == "publish" && $asignados == ""): ?>       

                                <a class="av-link <?php if($i==0 && $_GET['tab_tarea'] == NULL){ echo "active";} ?> card-job" id="v-pills-<?php echo get_the_ID();?>-tab_m" data-toggle="pill" href="#v-pills-<?php echo get_the_ID();?>" role="tab" aria-controls="v-pills-<?php echo get_the_ID();?>" aria-selected="false">
                                    <div class="content-tetimonios admin-card">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 text-center">
                                               <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                            </div>
                                            <div class="col-md-12 col-lg-9 mb-2">
                                                <p class="name"><?php wpjm_the_job_title(); ?></p>
                                                <span> <?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->name; ?></span>
                                            </div>
                                            <div class="datos">
                                                <div class="">
                                                    <ul class="datos_card">
                                                       <li> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/ubicacion.png" alt=""><?php the_job_location( false ); ?></li>
                                                       <li> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/calendario.png" alt=""><?php echo date_new(get_post_time( 'Y-m-d' )); ?></li>
                                                       <li>Ofertas realizadas <?php echo num_ofertas(get_the_ID())?> </li>
                                                    </ul>
                                                </div>
                                                <div class="">
                                                    <ul>
                                                       <li class="price">$<?php echo str_replace(',', '.' ,number_format($show_slary)); ?></li>
                                                       <li class="open">Abierta</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                

                            <?php endif; ?>

                            <?php $i = $i+1; endwhile; ?>    
                        </div>   
                    </div>
                </div>
            </div>  


            <div class="scroll-admin main-taks__cardsdesktop">
                <div class="nav flex-column nav-pills" id="v-pills-tab"  role="tablist" aria-orientation="vertical">
                    <?php $i=0;
                    $loop = new WP_Query( $args); 
                    $loop2 = new WP_Query( $asig);

                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; $show_slary = get_post_meta( get_the_ID(), '_job_salary', true );  
                        
                    $asignados = $loop2->posts[$i]->ID;
                    $status =  $loop->posts[$i]->post_status; ?>
                    <?php if ($status == "publish" && $asignados == ""): ?>
                         <a class="av-link email_custom_job <?php if($i==0 && $_GET['tab_tarea'] == NULL){ echo "active";} ?> card-job" id="v-pills-<?php echo get_the_ID();?>-tab" data-mailjob="<?php echo get_the_author_meta( 'user_email' ); ?>" data-toggle="pill" href="#v-pills-<?php echo get_the_ID();?>" role="tab" aria-controls="v-pills-<?php echo get_the_ID();?>" aria-selected="false">
                            <div class="content-tetimonios admin-card">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 text-center">
                                        <p id="mail_empleador_preguntas" style="display: none;"><?php echo get_the_author_meta( 'user_email' ); ?></p>
                                       <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                    </div>
                                    <div class="col-md-12 col-lg-9 mb-2">
                                        <p class="name"><?php wpjm_the_job_title(); ?></p>
                                        <span> <?php echo $product_categories = wp_get_post_terms( get_the_ID(), 'job_listing_category' )[0]->name; ?></span>
                                    </div>
                                    <div class="datos">
                                        <div class="">
                                            <ul class="datos_card">
                                               <li> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/ubicacion.png" alt=""><?php the_job_location( false ); ?></li>
                                               <li> <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/calendario.png" alt=""><?php echo date_new(get_post_time( 'Y-m-d' )); ?></li>
                                               <li>Ofertas realizadas <?php echo num_ofertas(get_the_ID())?>     

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <ul>
                                               <li class="price">$<?php echo str_replace(',', '.' ,number_format($show_slary)); ?></li>
                                               <li class="open">Abierta</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a> 

                        
                    <?php endif; ?>
                         
                    <?php $i = $i+1; endwhile; ?>    
                </div>   
            </div>
        </div>

        <!-- Tab panes -->
        <div class=" main-content__tabs">
            <div class="tab-content main-taks__tabs" id="v-pills-tabContent">
                <?php $loop = new WP_Query( $args ); $j = 0; $v=0; $i = 0;
                $loop2 = new WP_Query( $asig);

                while ( $loop->have_posts() ) : $loop->the_post(); $user_tarea = get_the_author_meta( 'ID' ); $title_tarea = get_the_title(); $id_tarea = get_the_ID(); $monto_salary = get_post_meta( get_the_ID(), '_job_salary', true ); $email_empleador = get_the_author_meta( 'user_email' ); ?>

                  

                  <?php
                  $asignados = $loop2->posts[$j]->ID;
                  $status =  $loop->posts[$j]->post_status; ?>
                  <?php if ($status == "publish" && $asignados == ""): ?>

                    <?php var_dump(get_the_ID()) ?>

                    <div class="tab-pane fade <?php echo $i ; if($j == 0 ){ echo "show active";} ?>" id="v-pills-<?php echo get_the_ID();?>" role="tabpanel" aria-labelledby="v-pills-<?php echo get_the_ID();?>-tab">        
                        <div class="main-task__minigrid">                
                            <div class="main-taks__date">
                                <h3 class="mb-3 main-task__title"><?php wpjm_the_job_title(); ?></h3>
                                <div class="contenido">
                                    <div class="datos_name">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3">
                                                <?php echo get_avatar( user_value( get_post(get_the_ID())->post_author ), 50 );?> 
                                            </div>
                                            <div class="col-lg-8 col-md-9">
                                                <p class="name">Publicado por</p>
                                                <span><?php echo get_the_author(); ?></span>
                                            </div>
                                        </div>
                                        <ul>
                                            <li class="mr-4 ml-0"><?php the_job_publish_date2(); ?></li>
                                            <li class="active">Abierto</li>
                                        </ul>
                                    </div>
                                    <div class="datos_genereal">
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="main-content__localization">
                                                    <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/ubicacion.png" alt="">    
                                                    <div class="main-content__localizationtext">
                                                        <p> 
                                                           Localización
                                                        </p>
                                                        <span><?php the_job_location( false ); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="main-content__localization">
                                                    <img class="icons" src="<?php echo get_template_directory_uri();?>/assets/img/calendario.png" alt="">
                                                    <div class="main-content__localizationtext">
                                                        <p> 
                                                        Fecha del evento
                                                        </p>
                                                        <span><?php echo date_new(get_post_meta( get_the_ID(), '_job_expires', true )); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" datos_presupuesto main-presupuesto__mobile">
                                        <div class="presupuesto_minicard">
                                            <p>Presupuesto </p>
                                            <span class="precio">$<?php echo str_replace(',', '.' ,number_format(get_post_meta( get_the_ID(), '_job_salary', true ))); ?></span>
                                            <?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Necesito un Servicio" )
                                            { $title_tarea2 = $title_tarea."-".meta_user_value( 'first_name', $current_user->ID ); 
                                                if (bank_data() == "yes" )
                                                { 
                                                    $target = "publicar"; 
                                                }
                                                else
                                                { 
                                                    $target = "publicar_bank"; 
                                                }?>
                                                <a href="" class="btn-oferta" data-toggle="modal" data-target="#<?php echo $target ?>" onclick="monto_salary2('<?php echo $title_tarea2 ?>','<?php echo $title_tarea ?>','<?php echo $id_tarea ?>','<?php echo $email_empleador ?>','<?php echo meta_user_value( 'first_name', $current_user->ID ) ?>','<?php echo wp_get_current_user()->ID ?>','<?php echo str_replace(',', '.' ,number_format(get_post_meta( get_the_ID(), '_job_salary', true ))) ?>','<?php echo get_avatar_url( wp_get_current_user()->user_email, 50 );?>');">    Ofertar
                                                </a>
                                                <label>Se cargará un 10% del presupuesto por cargos de servicio</label>
                                            <?php }
                                            if (is_user_logged_in() == NULL )
                                            {?>
                                                <a href="" class="btn-oferta" data-toggle="modal" data-target="">Ofertar</a>
                                                <label>Se cargará un 10% del presupuesto por cargos de servicio</label>
                                                <label>Debe regristrarse <a href="#" data-toggle="modal" data-target="#exampleModal">aquí</a> para poder ofertar</label>

                                            <?php } ?>  
                                            <?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) != "Necesito un Servicio" )
                                            {?> 
                                                <a href="" class="btn-oferta" data-toggle="modal" data-target="">Ofertar</a>  
                                                <label>Se cargará un 10% del presupuesto por cargos de servicio</label>
                                                <label>Debes cambiar tu rol de perfil <a href="<?php echo get_home_url() ?>/confi-perfil/?tab=conf">aquí </a> para poder ofertar</label>
                                            <?php } ?>                            
                                        </div>
                                    </div>
                                    <!-- descripcion -->
                                    <p class="description"><?php wpjm_the_job_description(); ?></p>
                                    <h6 class="">Detalle</h6>
                                    <?php if (job_meta_value_img( get_the_ID()) != NULL) { ?>
                                        <img src="<?php echo get_home_url().'/wp-content/uploads/'.job_meta_value_img( get_the_ID()); ?>" >
                                    <?php } ?>
                                    <p class="description m-0 border-n"><?php echo meta_value( '_job_important_info', get_the_ID()); ?>
                                    </p>
                                    <div class="ofertas">
                                        <h6 class="mt-4 mb-4">Ofertas</h6>
                                        <?php 
                                        $args3 = array (
                                            'post_type' => 'postulados',
                                            'post_status' =>'publish',
                                            'meta_query' => array(
                                            'relation'=>'AND', // 'AND' 'OR' ...
                                            array(
                                            'key' => 'ofertar_id_tarea_publicada',
                                            'value' => get_the_ID(),
                                            'operator' => 'IN',
                                            )),                     
                                        ); 
                                        $loop3 = new WP_Query( $args3 ); 
                                        while ( $loop3->have_posts() ) : $loop3->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10); $salarys = get_field('ofertar_monto_tarea');
                                            global $id_postulado;
                                            $id_postulado = get_the_author_meta( 'ID' );  
                                            $rating_postulado  = get_field('ofertar_id_empleado');
                                            $postulado_mensaje = get_field('ofertar_message_empleado');
                                            $postulado_monto = get_field('ofertar_monto_tarea');
                                            $postulado_date = date_new(get_post_time( 'Y-m-d' )); 
                                            $var_array ="Tarea Publicada: ".$title_tarea."<br>ID Tarea: ".$id_tarea."<br>Usuario Postulado: ".meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) )."<br>ID Postulado: ".get_the_author_meta( 'ID' )."<br>Monto Ofertado: $".str_replace(',', '.' ,number_format(get_field('ofertar_monto_tarea')))."<br>Porcentaje Comisión: $".$comision."<br>ID Postulación: ".get_the_ID().""; ?>
                                            <div class="ofertas_conetnt">
                                                <div class="datos_name">
                                                    <div class="row border-n mb-5">
                                                        <div class="col-md-12">
                                                            <div class="ofertas_titulos mb-3">
                                                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                                                <div class="flex ml-3">
                                                                    <span><?php echo meta_user_value( 'first_name',  $rating_postulado ); ?></span>
                                                                    <div>
                                                                    <?php                                                
                                                                    $count_rating = count_rating($rating_postulado,'todo'); echo " ";

                                                                    for ($i=0; $i < $count_rating; $i++) { ?>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <?php } 
                                                                    for ($i=0; $i < (5-$count_rating); $i++) { ?>
                                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <?php } ?>                                                                    
                                                                </div>
                                                            </div>
                                                            <p class="ml-auto"><?php echo $postulado_date ?></p>
                                                        </div>
                                                        <p><?php echo $postulado_mensaje; ?></p>
                                                        <div class="cube mb-4">
                                                            <p>$ <?php echo $postulado_monto; ?></p>
                                                        </div>
                                                        <div class="respnse">
                                                            
                                                                <?php 
                                                            $value_var_array = str_replace("<br>",":",$var_array); 
                                                            $sinparametros= explode(':', $value_var_array, 14);
                                                            if ($sinparametros[3] =="124") {
                                                            '<p>'.$sinparametros[3].'</p>';
                                                            }?>
                                                            <a href=""></a>                                            
                                                            <?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Ofrezco un Servicio" && $user_actual == $user_tarea ){ 
                                                                $codigo_unico = get_the_author_meta( 'ID' )."".$id_tarea;
                                                                $codigo_unico = str_replace(' ', '', $codigo_unico); ?>
                                                                <?php if (post_asignados($current_user->ID,$codigo_unico,get_the_author_meta( 'ID' )) == 1) 
                                                                { ?>

                                                                    <div class="ml-auto"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Oferta respondida</div>
                                                                 <?php }
                                                                else{ ?>
                                                                    <div>
                                                                        <a target="_blank" href="perfil?post=<?php echo $id_postulado ?>">Ver perfil</a>
                                                                    </div>
                                                                    <a href="" class="ml-auto" data-toggle="modal" data-target="#modal_donation" onclick="function_donation('<?php echo $postulado_monto ?>','<?php echo $var_array ?>'), 
                                                                        show_data('<?php echo $postulado_monto ?>','<?php echo $var_array ?>','<?php echo $sinparametros[5]; ?>','<?php echo get_post(meta_user_value( '_wpupa_attachment_id', $sinparametros[7] ))->guid; ?>') "><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Responder oferta</a> 
                                                                <?php }} ?> 
                                                                <p></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="main-taks__presupuesto datos_presupuesto ">
                                <div class="main-presupuesto__desktop">
                                    <div class="presupuesto_minicard">
                                        <p>Presupuesto</p>
                                        <span class="precio">$<?php echo str_replace(',', '.' ,number_format(get_post_meta( get_the_ID(), '_job_salary', true ))); ?></span>
                                        <?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Necesito un Servicio" )
                                        { 
                                            $title_tarea2 = $title_tarea."-".meta_user_value( 'first_name', $current_user->ID ); 
                                            if (bank_data() == "yes" )
                                            { 
                                                $target = "publicar"; }else{ $target = "publicar_bank"; 
                                            } ?>
                                            <a href="" class="btn-oferta" data-toggle="modal" data-target="#<?php echo $target ?>" onclick="monto_salary2('<?php echo $title_tarea2 ?>','<?php echo $title_tarea ?>','<?php echo $id_tarea ?>','<?php echo $email_empleador ?>','<?php echo meta_user_value( 'first_name', $current_user->ID ) ?>','<?php echo wp_get_current_user()->ID ?>','<?php echo get_post_meta( $id_tarea, '_job_salary', true ) ?>','<?php echo get_avatar_url( wp_get_current_user()->user_email, 50 );?>');">Ofertar</a>   
                                            <label>Se cargará un 10% del presupuesto por cargos de servicio</label>
                                        <?php }
                                        else { ?>                            
                                            <a href="" class="btn-oferta" data-toggle="modal" data-target="">Ofertar</a>
                                            <label>Se cargará un 10% del presupuesto por cargos de servicio</label>         
                                        <?php } ?>   
                                    </div>
                                </div>
                            </div>
                            <div class="preguntas mb-4">
                                <p>Preguntas (<?php echo count_preguntas($id_tarea); ?>)</p>
                                <?php 
                                $argss = array (
                                    'post_type' => 'preguntas',
                                    'post_status' =>'publish',
                                    'meta_query' => array(
                                    'relation'=>'AND', // 'AND' 'OR' ...
                                    array(
                                    'key' => 'id_tareas_preguntas_copy',
                                    'value' =>  $id_tarea,
                                    'operator' => 'IN',
                                    ),
                                   
                                    array(
                                    'key' => 'id_pregunta',
                                    'value' =>  'NULL',
                                    'operator' => 'IN',
                                    ),                                                        
                                ),                     
                                ); 
                                $loops = new WP_Query( $argss ); 
                                while ( $loops->have_posts() ) : $loops->the_post(); $id_p = get_the_ID(); $rating_post = get_the_author_meta( 'ID' ); ?> 
                                    <div class="ofertas_conetnt">
                                        <div class="datos_name">
                                            <div class="row border-p mb-5">
                                                <div class="col-md-12">
                                                    <div class="ofertas_titulos mb-3">
                                                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                                        <div class="flex ml-3">
                                                            <span><?php echo meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) ); ?></span>
                                                            <div>
                                                                <?php                                                         
                                                                    $count_rating = count_rating($rating_postulado,'todo'); echo " ";

                                                                    for ($i=0; $i < $count_rating; $i++) { ?>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <?php } 
                                                                    for ($i=0; $i < (5-$count_rating); $i++) { ?>
                                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    <?php } ?> 
                                                            </div>
                                                        </div>
                                                        <p class="ml-auto"><?php the_job_publish_date_postu(); ?></p>
                                                    </div>
                                                    <p><?php the_field('pregunta_tarea'); ?></p>
                                                    <?php if (is_user_logged_in() != NULL && $user_actual == $user_tarea)
                                                    {  ?>
                                                        <a href="" data-toggle="modal" data-target="#modal_responder_p<?php echo get_the_ID() ?>"  aria-hidden="true">Responder</a>
                                                    <?php } ?>
                                                </div> 
                                            </div>
                                            <?php 
                                            $argsss = array (
                                                'post_type' => 'preguntas',
                                                'post_status' =>'publish',
                                                'meta_query' => array(
                                                'relation'=>'AND', // 'AND' 'OR' ...
                                                array(
                                                'key' => 'id_tareas_preguntas_copy',
                                                'value' =>  $id_tarea,
                                                'operator' => 'IN',
                                                ),
                                               
                                                array(
                                                'key' => 'id_pregunta',
                                                'value' =>  get_the_ID(),
                                                'operator' => 'IN',
                                                ),                                                        
                                            ),                     
                                            ); 
                                            $loopss = new WP_Query( $argsss ); 
                                            while ( $loopss->have_posts() ) : $loopss->the_post(); $rating_post = get_the_author_meta( 'ID' ); ?>
                                                <div class="ofertas_conetnt resp-espace">
                                                    <div class="datos_name">
                                                        <div class="row border-p mb-5">
                                                            <div class="col-md-12">
                                                                <div class="ofertas_titulos mb-3">
                                                                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 );?> 
                                                                    <div class="flex ml-3">
                                                                        <span><?php echo meta_user_value( 'first_name',  get_the_author_meta( 'ID' ) ); ?></span>
                                                                        <div>
                                                                            <?php                                              
                                                                                $count_rating = count_rating($rating_postulado,'todo'); echo " ";

                                                                                for ($i=0; $i < $count_rating; $i++) { ?>
                                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <?php } 
                                                                                for ($i=0; $i < (5-$count_rating); $i++) { ?>
                                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                                <?php } ?> 
                                                                        </div>
                                                                    </div>
                                                                    <p class="ml-auto"><?php the_job_publish_date_postu(); ?></p>
                                                                </div>
                                                                <p><?php the_field('pregunta_tarea'); ?></p>
                                                                <?php if (is_user_logged_in() != NULL && $user_actual == $user_tarea)
                                                                {  ?>
                                                                    <a href="" data-toggle="modal" data-target="#modal_responder_r<?php echo $id_p; ?>"  aria-hidden="true",>Responder</a>
                                                                <?php } ?>
                                                            </div>                                                          
                                                        </div>       
                                                    </div>
                                                </div>
                                                <!-- Modal Responder -->
                                                <div class="modal fade" id="modal_responder_r<?php echo get_the_ID() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">  
                                                            <div class="modal-body">
                                                                <h4 class="mb-3 main-task__title">Responder</h4>
                                                                    <?php echo do_shortcode('[frm-set-get id_tareas_preguntas_copy='.$id_tarea.'][frm-set-get id_pregunta='.get_the_ID().'][frm-set-get id_user_preguntas='.$user_actual.'][formidable id=15]');   ?>
                                                            </div>         
                                                        </div>
                                                    </div> 
                                                </div>
                                            <?php endwhile; ?>                                                              
                                            <!-- Modal Responder preguntas -->
                                            <div class="modal fade" id="modal_responder_p<?php echo $id_p ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">  
                                                        <div class="modal-body">
                                                            <h4 class="mb-3 main-task__title">Responder</h4>
                                                            <?php echo do_shortcode('[frm-set-get id_tareas_preguntas_copy='.$id_tarea.'][frm-set-get id_pregunta='.get_the_ID().'][frm-set-get id_user_preguntas='.$user_actual.'][formidable id=15]');   ?>
                                                        </div>         
                                                    </div>
                                                </div> 
                                            </div><!---->                                                        
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                        <?php if (is_user_logged_in() != NULL){ 
                             echo do_shortcode('[frm-set-get id_tareas_preguntas_copy='.$id_tarea.'][frm-set-get id_user_preguntas='.$user_actual.'][frm-set-get id_pregunta=NULL][formidable id=15]');  ?>
                        <?php }
                        else { ?>                           
                            <span>Debe iniciar sesión para hacer preguntas</span>                              
                            <textarea name="" id="" cols="37" rows="5" placeholder="Hacer preguntas"></textarea>
                        <?php } ?>                        
                    </div><!--tab-->   

                    


                    <?php endif; ?> 



                <?php $j = $j+1; $v = $v+1; $i = $i+1; endwhile; ?>


                <?php if ($v == 0) {
                    echo "<h6> No hay resultados </h6>";
                } ?>        

            </div><!--tab principal -->
        </div>

    </div>
</div>       

<?php get_template_part('sections/home/main-modal-step'); ?>
<!-- FOOTER -->

<script src="<?php echo get_template_directory_uri();?>/assets/js/setting-slick.js"></script>
<script>
new WOW().init();

$('.main-taks__mobiletitle').click(function(){
    $('.main-taks__sidebar').toggleClass('active')
    $(this).toggleClass('active')
    $('.buscar_tareas').toggleClass('in-active')
    if ($(this).hasClass('active')) {
        $('.main-taks__mobiletitle span').text('Ver menos tareas')
    }
    else{
        $('.main-taks__mobiletitle span').text('Ver más tareas')   
    }
})



$('.content-tetimonios').click(function(){
    $('.main-taks__sidebar').removeClass('active')
})
</script>   



         

<!-- Modal Publicar -->
<div class="modal fade" id="publicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <div class="modal-body">
         <?php echo do_shortcode('[formidable id=13]');  ?>
      </div>         
    </div>
  </div> 
</div>

<!-- Modal publicar bancario -->
<div class="modal fade" id="publicar_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <div class="modal-body">
        <label>Para ofertar debe completar sus datos bancarios <a href="confi-perfil/?tab=bancario">Aquì</a></label>
      </div>         
    </div>
  </div>
</div>    

<!-- Modal Donation-->
<div class="modal fade" id="modal_donation2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">  
            <div class="modal-body">
               <h3 class="mb-3 main-task__title">Pagar Oferta</h3>
                <div class="contenido">
                    <div class="datos_name">
                        <div class="row">
                            <div class="col-lg-2 col-md-3">
                                <?php echo get_avatar( user_value( 10 ), 50 ); ?> 
                            </div>
                            <div class="col-lg-8 col-md-9">
                                <p class="name"><?php echo meta_user_value( 'first_name',  $sinparametros[7] ) ?></p>
                                <span><?php echo $sinparametros[1]; ?></span>
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
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-content__localization">                       
                                    <div class="main-content__localizationtext">
                                        <p>Monto tarea</p>
                                        <p id="modal_salary">$<?php echo $salarys; ?></p>
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
                                          <p>$<?php echo $comision; ?></p>
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
                                          <span>$<?php echo ($salarys+$comision); ?></span>
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


<?php get_footer(); ?>