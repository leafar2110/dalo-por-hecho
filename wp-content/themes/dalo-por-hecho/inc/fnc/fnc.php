<?php

/************* General wordpress ************/

the_post_thumbnail();
the_post_thumbnail('thumbnail');       
the_post_thumbnail('medium');          
the_post_thumbnail('large');           
the_post_thumbnail('full');            

add_theme_support( 'post-thumbnails' );
the_post_thumbnail( array(100,100) ); 
set_post_thumbnail_size( 1568, 9999 );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'store' ),
  'top' => __( 'Top Menu', 'store' ),
) );

add_theme_support( 'html5', array(
  'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
) );

add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link',
) );

add_theme_support( 'custom-background', apply_filters( 'store_custom_background_args', array(
    'default-color' => 'f7f5ee',
    'default-image' => '',
) ) );

add_image_size('store-sq-thumb', 600,600, true );
add_image_size('store-thumb', 540,450, true );
add_image_size('pop-thumb',542, 340, true );

add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-lightbox' );


/*********** Woocommerce **********************/
function my_theme_setup() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

add_action( 'after_setup_theme', 'yourtheme_setup' );

function yourtheme_setup() {
add_theme_support( 'wc-product-gallery-slider' );
} 


/***************** Widget ************************/
function dalo_por_hecho_widgets_init() {

  register_sidebar(
    array(
      'name'          => __( 'Sidebar Header', 'Dalo por hecho' ),
      'id'            => 'sidebar-1',
      'description'   => __( 'Add widgets here to appear in your header.', 'Dalo por hecho' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );  

}
add_action( 'widgets_init', 'dalo_por_hecho_widgets_init' );

/***************** Termmeta IMG *****************/
function termmeta_value_img( $meta_key, $post_id ){
            global $wpdb;  
            $value = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."termmeta WHERE meta_key = '$meta_key' and term_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$value'"); 
              foreach($result_link1 as $r1)
               {
                      $value_img = $r1->guid;                      
              }              
              return $value_img;

}

/***************** Format Date *****************/
function the_job_publish_date2( $post = null ) {
  $date_format = get_option( 'job_manager_date_format' );

  if ( 'default' === $date_format ) {
    $display_date = esc_html__( 'Posted on ', 'wp-job-manager' ) . date_i18n( get_option( 'date_format' ), get_post_time( 'U' ) );
  } else {
    // translators: Placeholder %s is the relative, human readable time since the job listing was posted.
    $display_date = sprintf( esc_html__( 'Hace %s ', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) );
  }

  echo '<time datetime="' . esc_attr( get_post_time( 'Y-m-d' ) ) . '">' . wp_kses_post( $display_date ) . '</time>';
}

/***************** Format Date pPostulados*****************/
function the_job_publish_date_postu( $post = null ) {
  $date_format = get_post(get_the_ID())->post_date;
  //$date_format = get_option( 'job_manager_date_format' );

  if ( 'default' === $date_format ) {
    $display_date = esc_html__( 'Posted on ', 'wp-job-manager' ) . date_i18n( get_option( 'date_format' ), get_post_time( 'U' ) );
  } else {
    // translators: Placeholder %s is the relative, human readable time since the job listing was posted.
    $display_date = sprintf( esc_html__( 'Hace %s ', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) );
  }

//echo get_the_ID();
  echo '<time datetime="' . esc_attr( get_post_time( 'Y-m-d' ) ) . '">' . wp_kses_post( $display_date ) . '</time>';
}


/***************** Date *****************/
function date_new($fecha){
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.' '.$num.', '.$mes.' '.$anno;
}

/***************** Date perfil *****************/
function date_new_perfil($fecha){
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $num.' de '.$mes.' del '.$anno;
}

/***************** Date Order *****************/
function date_order_new($fecha){
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('d', strtotime($fecha))];
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.' '.$num.' de '.$mes. ' del '.$anno;
}

/***************** Meta *****************/
function meta_value( $meta_key, $post_id ){
            global $wpdb;  
            $value = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '$meta_key' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $value = str_replace("\n", "<br>", $value); 
              return $value;

}


/***************** Meta IMG *****************/
function meta_value_img( $meta_key, $post_id ){
            global $wpdb; 
            $value = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '$meta_key' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$value'"); 
              foreach($result_link1 as $r1)
               {
                      $value_img = $r1->guid;                      
              }              
              return $value_img;

}

/***************** Meta JOB IMG *****************/
function job_meta_value_img($post_id ){
            global $wpdb; 
            $value = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_thumbnail_id' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '_wp_attached_file' and post_id = '$value'"); 
              foreach($result_link1 as $r1)
               {
                      $value_img = $r1->meta_value;                       
              }              
              return $value_img;

}

/***************** User var *****************/
function user_value_date( $post_id ){
            global $wpdb; 
            $value = NULL; 
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."users WHERE ID = '$post_id' "); 
              foreach($result_link as $r)
              {
                      $value = $r->user_registered;                      
              }
              return $value;

}

/***************** User *****************/
function user_value( $post_id ){
            global $wpdb; 
            $value = NULL; 
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."users WHERE ID = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->user_email;                      
              }
              return $value;

}

/***************** Meta User *****************/
function meta_user_value( $meta_key, $post_id ){
            global $wpdb; 
            $value = NULL; 
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."usermeta WHERE meta_key = '$meta_key' and user_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              return $value;

}
/***************** Meta IMG FRM *****************/
function meta_value_img_frm($user,$form_id){
            global $wpdb;
            $value_frm = NULL; $value_post = NULL; $value_img = NULL;
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."frm_items WHERE user_id = '$user' and form_id = '$form_id' "); 
              foreach($result_link as $r)
              {
                      $value_frm = $r->id;                      
              }
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."frm_item_metas WHERE item_id = '$value_frm' "); 
              foreach($result_link as $r)
              {
                      $value_post = $r->meta_value;                      
              }

              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_author = '$user' and ID = '$value_post' "); 
              foreach($result_link as $r)
              {
                      $value_img = $r->guid;                      
              }
              return $value_img;
}

/********************Cont preguntas**********************/

function count_preguntas( $id_tarea ){ 
            $value = 0;                                       
            $arg = array (
              'post_type' => 'preguntas',
              'post_status' =>'publish',
              'meta_query' => array(
                'relation'=>'AND', // 'AND' 'OR' ...
                array(
                  'key' => 'id_tareas_preguntas_copy',
                  'value' =>  $id_tarea,
                  'operator' => 'IN',
                )),                     
            ); 
            $loop = new WP_Query( $arg ); 
            while ( $loop->have_posts() ) : $loop->the_post();  
              $value = $value + 1;
            endwhile; 
              
            return $value;
}   


/********************Cont chat**********************/

function count_chat( $asignar_id_empleado){ 
            $value = 0;                                       
            $arg = array (
              'post_type' => 'chat',
              'post_status' =>'publish',
              'meta_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
              array(
              'key' => 'id_user_chat',
              'value' =>  $asignar_id_empleado,
              'operator' => 'IN',
              ),   
              array(
              'key' => 'visto_chat',
              'value' =>  'no',
              'operator' => 'IN',
              )),          
            ); 
            $loop = new WP_Query( $arg ); 
            while ( $loop->have_posts() ) : $loop->the_post();  
              $value = $value + 1;
            endwhile; 
              
            return $value;
}   

/********************Cont rating**********************/

function count_rating( $asignar_id_empleado, $rol_user){ 
            $value = 0; 
            $puntos = 0;                                      
if ($rol_user == 'todo') {
            $arg = array (
              'post_type' => 'rating',
              'post_status' =>'publish',
              'meta_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
              array(
              'key' => 'id_user_calif_valor',
              'value' =>  $asignar_id_empleado,
              'operator' => 'IN',
              ),   
              array(
              'key' => 'rol_user_rating_valor',
              'value' =>  array('Empleado', 'Empleador'),
              'operator' => 'IN',
              )),          
            ); 
}
if ($rol_user != 'todo') {
            $arg = array (
              'post_type' => 'rating',
              'post_status' =>'publish',
              'meta_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
              array(
              'key' => 'id_user_calif_valor',
              'value' =>  $asignar_id_empleado,
              'operator' => 'IN',
              ),   
              array(
              'key' => 'rol_user_rating_valor',
              'value' =>  $rol_user,
              'operator' => 'IN',
              )),          
            ); 
}
            $loop = new WP_Query( $arg ); 
            while ( $loop->have_posts() ) : $loop->the_post();  
              $value = $value + 1;
              $puntos = $puntos + get_the_title();
            endwhile;
            $resultado = round( $puntos / $value);  
            if ($puntos == 0) {
              $resultado = 0;
            }
            
            return $resultado;
}   

/********************Asig Terminada**********************/

function asig_terminada( $cod_chat){ 
            $value = 0;                                       
            $arg = array (
              'post_type' => 'rating',
              'post_status' =>'publish',
              'meta_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
              array(
              'key' => 'cod_rating_valor',
              'value' =>  $cod_chat,
              'operator' => 'IN',
              )),          
            ); 
            $loop = new WP_Query( $arg ); 
            while ( $loop->have_posts() ) : $loop->the_post();  
              $value = $value + 1;
             
            endwhile; 
            
            return $value;
}  
/******************Excerp Cut*****************/
function cut_text($text, $le) 
{ 
   $points = "...";
   $words = explode(' ', $text); 
   if (count($words) > $le) 
   { 
     return implode(' ', array_slice($words, 0, $le)) ." ". $points; 
   } else
         {
           return $text; 
         } 
}

/********************Arg **********************/

function arg($cat,$tax,$search,$location,$tipo){ 

  if ($cat == NULL && $location == NULL && $tipo == NULL && $search == NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => array('publish','draft','expired'),
     // 'paged' => $paged,
      'posts_per_page' =>-1,
    );
  }

  if ($cat != NULL && $location != NULL && $tipo != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
     // 'paged' => $paged,
     // 'posts_per_page' => 12,        
      'post_status' => array('publish','draft','expired'),
          'tax_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => $tax,
                'field'           => 'slug',
                'terms'           => $cat,
                'operator'        => 'IN',
               ),
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => 'job_listing_type',
                'field'           => 'slug',
                'terms'           => $tipo,
                'operator'        => 'IN',
               )),    
              'meta_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'key' => '_job_location',
                'value' => $location,
                'compare' => 'LIKE',
                )),                  
    );
  } 

  if ($cat != NULL && $location != NULL && $tipo == NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
     // 'paged' => $paged,
     // 'posts_per_page' => 12,        
      'post_status' => array('publish','draft','expired'),
          'tax_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => $tax,
                'field'           => 'slug',
                'terms'           => $cat,
                'operator'        => 'IN',
               )),    
              'meta_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'key' => '_job_location',
                'value' => $location,
                'compare' => 'LIKE',
                )),                  
    );
  } 

  if ($cat != NULL && $location == NULL && $tipo != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
     // 'paged' => $paged,
     // 'posts_per_page' => 12,        
      'post_status' => array('publish','draft','expired'),
          'tax_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => $tax,
                'field'           => 'slug',
                'terms'           => $cat,
                'operator'        => 'IN',
               ),
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => 'job_listing_type',
                'field'           => 'slug',
                'terms'           => $tipo,
                'operator'        => 'IN',
               )),                 
    );
  }

  if ($cat == NULL && $location != NULL && $tipo != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
     // 'paged' => $paged,
     // 'posts_per_page' => 12,        
      'post_status' => array('publish','draft','expired'),
          'tax_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => 'job_listing_type',
                'field'           => 'slug',
                'terms'           => $tipo,
                'operator'        => 'IN',
               )),  
              'meta_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'key' => '_job_location',
                'value' => $location,
                'compare' => 'LIKE',
                )),                              
    );
  }  

 if ($cat != NULL && $location == NULL && $tipo == NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => array('publish','draft','expired'),
          'tax_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => $tax,
                'field'           => 'slug',
                'terms'           => $cat,
                'operator'        => 'IN',
               )), 
    );    
  }

 if ($cat == NULL && $location != NULL && $tipo == NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => array('publish','draft','expired'),
      'meta_query' => array(
      'relation'=>'AND', // 'AND' 'OR' ...
        array(
        'key' => '_job_location',
        'value' => $location,
        'compare' => 'LIKE',
        )),
    );    
  }

 if ($cat == NULL && $location == NULL && $tipo != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => array('publish','draft','expired'),
          'tax_query' => array(
              'relation'=>'AND', // 'AND' 'OR' ...
                array(
                'taxonomy'        => 'job_listing_type',
                'field'           => 'slug',
                'terms'           => $tipo,
                'operator'        => 'IN',
               )),
    );    
  }


  if ($search != NULL) {
    $args = 
    array(
      'post_type' => 'job_listing',
      'post_status' => array('publish','draft','expired'),
      's' => $search,
    );
  }



  return $args; 
} 

/********************Order Itemmeta **********************/

function order_itemmeta($key,$id){ 
            global $wpdb; 
            $value = NULL; 
            $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_id = '$id' and order_item_type = 'line_item' "); 
            foreach($result_link as $r)
            {
                     $order_item_id = $r->order_item_id; 
                     $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_itemmeta WHERE meta_key = '$key' and order_item_id = '$order_item_id' "); 
                    foreach($result_link2 as $r2)
                    {
                            $value = $r2->meta_value;                      
                    }                                           
            }
            return $value;
}  

/*********************Crypt Array Note ******************/

function descrypt_note($array_note,$key){
  $value_var_array = str_replace("<br>",":",$array_note); 
  $sinparametros= explode(':', $value_var_array, 14);
  if ($key == "name_tarea") {
    return $sinparametros[1];
  }
  if ($key == "id_tarea") {
    return $sinparametros[3];
  } 
  if ($key == "email_empleador") {
    return $sinparametros[3];
  }  
  if ($key == "id_postulacion") {
    return $sinparametros[13];
  }  
  if ($key == "name_empleado") {
    return $sinparametros[5];
  }     
  if ($key == "id_empleado") {
    return $sinparametros[7];
  } 
  if ($key == "monto_tarea") {
    return $sinparametros[9];
  }     
  
}

/********************* Bank data ******************/
function bank_data(){
   global $current_user;
   if (meta_user_value( 'nombre_bancario', $current_user->ID ) != NULL && meta_user_value( 'rut_bancario', $current_user->ID ) != NULL && meta_user_value( 'banco_bancario', $current_user->ID ) != NULL && meta_user_value( 'numero_de_cuenta_bancario', $current_user->ID ) != NULL && meta_user_value( 'email_bancario', $current_user->ID ) != NULL){ return "yes"; }
}

/***************** Asignados *****************/
function post_asignados($author,$codigo_unico,$id_empleado){
            global $wpdb;  
            
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'asignados' and post_author = '$author' ORDER by ID ASC"); 
              foreach($result_link as $r)
              {
                $post_id = $r->ID; 
                $result_link2 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$post_id' and meta_key = 'asignar_codigo_unico' and meta_value = '$codigo_unico' "); 
                foreach($result_link2 as $r2)
                {              
                    $value = 1;
                }  
                if ($value == 1) {
                      $result_link3 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE post_id = '$post_id' and meta_key = 'asignar_id_empleado' and meta_value = '$id_empleado' "); 
                      foreach($result_link3 as $r3)
                      {              
                          $value2 = 1;
                      } 
                }
                                          
              }           
              return $value2;

}

/******************Excerp*****************/
function custom_excerpt_length( $length ) {
  return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/****************** Num ofertas *****************/
function num_ofertas($id){
  $i=0;
  $args3 = array (
      'post_type' => 'postulados',
      'post_status' =>'publish',
      'meta_query' => array(
      'relation'=>'AND', // 'AND' 'OR' ...
      array(
      'key' => 'ofertar_id_tarea_publicada',
      'value' => $id,
      'operator' => 'IN',
      )),                     
  ); 
  $loop3 = new WP_Query( $args3 ); 
  while ( $loop3->have_posts() ) : $loop3->the_post(); $comision = (get_field('ofertar_monto_tarea')*0.10); $salarys = get_field('ofertar_monto_tarea');
                                         
     $i = $i+1; 
  endwhile; 
  return $i;
}