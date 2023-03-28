<?php if(is_user_logged_in() == NULL)
{ 
  header('Location: '.get_home_url().'/404.php');
}?>
    <div class="container perfil m-110">
        <section>
<?php

/* Get user info. */
global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();    
/* If profile was saved, update profile. */
$user_actual = $current_user->ID;  


///Rol Usuarios 
if ( $_POST['name_form'] == 'rol' ) {                  
   
    update_user_meta( $current_user->ID, 'user_registration_radio_1600171615', esc_attr( $_POST['user_registration_radio_1600171615'] ) ); 

header('Location: '.get_home_url().'/confi-perfil?tab=conf&mconf=save');

}

///Aptitudes   
if ( $_POST['name_form'] == 'aptitudes' ) {                                     
   
    update_user_meta( $current_user->ID, 'dedicacion_user', esc_attr( $_POST['dedicacion_user'] ) );
    $transporte =  $_POST['medio_de_transporte_user1'].','.$_POST['medio_de_transporte_user2'].','.$_POST['medio_de_transporte_user3'].','.$_POST['medio_de_transporte_user4'];
    update_user_meta( $current_user->ID, 'medio_de_transporte_user', esc_attr( $transporte ) );
    update_user_meta( $current_user->ID, 'idiomas_user', esc_attr( $_POST['idiomas_user'] ) );
    update_user_meta( $current_user->ID, 'certificaciones_user', esc_attr( $_POST['certificaciones_user'] ) );
    update_user_meta( $current_user->ID, 'experiencia_user', esc_attr( $_POST['experiencia_user'] ) );

header('Location: '.get_home_url().'/confi-perfil?tab=aptitudes&map=save');

}

///Tareas Asignadas  
if ( $_POST['name_form'] == 'asignados' ) {                        
   
  update_post_meta( $_POST['asignar_id_status'], 'asignar_status', esc_attr( $_POST['asignar_status'] ) );

header('Location: '.get_home_url().'/confi-perfil?tab=asignados&masig=save');

}

///Datos bancarios 
if ( $_POST['name_form'] == 'bancario' ) {                        
   
    update_user_meta( $current_user->ID, 'nombre_bancario', esc_attr( $_POST['nombre_bancario'] ) ); 
    update_user_meta( $current_user->ID, 'rut_bancario', esc_attr( $_POST['rut_bancario'] ) );                      
    update_user_meta( $current_user->ID, 'banco_bancario', esc_attr( $_POST['banco_bancario'] ) );   
    update_user_meta( $current_user->ID, 'tipo_de_cuenta_bancario', esc_attr( $_POST['tipo_de_cuenta_bancario'] ) );                   
    update_user_meta( $current_user->ID, 'numero_de_cuenta_bancario', esc_attr( $_POST['numero_de_cuenta_bancario'] ) );         
    update_user_meta( $current_user->ID, 'email_bancario', esc_attr( $_POST['email_bancario'] ) );

header('Location: '.get_home_url().'/confi-perfil?tab=bancario&mban=save');

}

///Conf Cuenta
if ( $_POST['name_form'] == 'conf' ) {                        
   
  
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }


    update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );    
    update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );

    update_user_meta( $current_user->ID, 'direccion_user', esc_attr( $_POST['direccion_user'] ) );
    update_user_meta( $current_user->ID, 'frase_user', esc_attr( $_POST['frase_user'] ) ); 
    update_user_meta( $current_user->ID, 'fecha_nac_user', esc_attr( $_POST['fecha_nac_user'] ) ); 
    

header('Location: '.get_home_url().'/confi-perfil?tab=conf&mconf=save');

}


///Edit Taredas
if ( $_POST['name_form'] == 'job_list' ) {  

     $post = get_post( $_POST['id_job'] );
     $post->post_title = $_POST['job_title'];
     //$post->post_content = $_POST['job_title'];

     wp_update_post( $post ); 
     //wp_set_object_terms( $_POST['id_job'], job_listing_category, 'job_listing_category', FALSE );
     //wp_set_object_terms( $object_id, $terms, $taxonomy, $append );
     //wp_set_post_terms( $_POST['id_job'], $_POST['job_category'], 'job_listing_category' ) ;

     update_post_meta( $_POST['id_job'], '_job_description', esc_attr( $_POST['_job_description'] ) );
     update_post_meta( $_POST['id_job'], '_job_location', esc_attr( $_POST['_job_location'] ) );
     update_post_meta( $_POST['id_job'], '_job_direccion', esc_attr( $_POST['_job_direccion'] ) );
     update_post_meta( $_POST['id_job'], '_job_expires', esc_attr( $_POST['_job_expires'] ) );
     if ($_POST['_job_salary'] != NULL) {
        update_post_meta( $_POST['id_job'], '_job_salary', esc_attr( $_POST['_job_salary'] ) );
        if ($_POST['_job_clp'] != NULL && $_POST['_job_horas'] != NULL) {
          update_post_meta( $_POST['id_job'], '_job_clp', esc_attr( $_POST['_job_clp'] ) );
          update_post_meta( $_POST['id_job'], '_job_horas', esc_attr( $_POST['_job_horas'] ) );
        }    
     }
     update_post_meta( $_POST['id_job'], '_company_logo', esc_attr( $_POST['_company_logo'] ) );



header('Location: '.get_home_url().'/confi-perfil?tab=tareas&mban=save');

}




?>

 