<?php

    add_action( 'rest_api_init', 'define_endpoints' );
    add_action( 'wp_enqueue_scripts','load_scripts' );
    add_action( 'wp_enqueue_scripts', 'register_args_form' );


    function load_scripts(){

        wp_enqueue_script( 'forms-jobs-js',
            get_stylesheet_directory_uri() . '/assets/js/forms-jobs.js',
            ['jquery'],
            '1',
            true
        );
    }


	function define_endpoints()
	{
        register_rest_route( 'create', 'new/job', [
        	'methods'  => ['POST', 'GET'],
        	'callback' => 'create_jobs',
        	'permission_callback' => '__return_true',
        ] );
    }


	function  register_args_form(){
		
		$args = [
			'restNonce'           => wp_create_nonce( 'wp_rest' ),
			'adminID'		      => base64_encode(get_current_user_id()),
			'crateFormEndpoint'   => rest_url( 'create/new/job' ),
		];

		wp_localize_script( 'forms-jobs-js', 'form_api', $args );
	}


    function create_jobs() 
    {
        try {
            $user_sesion = explode('*&', $_POST['fxaction']);
            $user_id = $user_sesion[0];
            $nonce = $user_sesion[1];

            // if ( ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
            //     wp_send_json(['status' => 'denied']);
            //     exit;
            // } 

            $jobs = array(
            'post_title' => $_POST['job_title'],
            'post_content' => $_POST['job_description'],
            'post_status' => 'publish',
            'post_author' => (int) base64_decode($user_id),
            'post_type' => 'job_listing'
            );

            $post_id= wp_insert_post( $jobs );
            
            // Verificar si se ha enviado una imagen
            if (isset($_FILES['company_logo'])) {
                $file = $_FILES['company_logo'];
                
                // Comprobar si no hay errores en la carga de la imagen
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $file_name = $file['name'];
                    $file_tmp = $file['tmp_name'];

                    // Mover la imagen cargada a una ubicación deseada
                    $upload_dir = wp_upload_dir(); // Directorio de subidas de WordPress
                    $file_path = $upload_dir['path'] . '/' . $file_name;
                    move_uploaded_file($file_tmp, $file_path);

                    // Obtener la URL de la imagen cargada
                    $file_url = $upload_dir['url'] . '/' . $file_name;

                    // Guardar la URL de la imagen en el CPT
                    update_post_meta($post_id, '_company_logo', $file_url);
                }
            }
                
            $salary = str_replace('.', '', $_POST['job_total']);
            $salary = str_replace(',', '',  $salary);
            $salary = intval($salary);
            update_post_meta( $post_id, '_job_salary', $salary );
            update_post_meta( $post_id, '_job_direccion', $_POST['job_direccion'] );
            update_post_meta( $post_id, '_job_expires', $_POST['job_expires'] );
            update_post_meta( $post_id, '_job_horas', $_POST['job_horas'] );
            update_post_meta( $post_id, '_job_location', $_POST['job_location'] );
            wp_set_object_terms( $post_id, (int) $_POST['job_category'], 'job_listing_category' );
            wp_set_object_terms( $post_id, (int) $_POST['job_type'], 'job_listing_type' );

            wp_send_json(['status' => 'aproved', 'id' => $post_id]);

        } catch ( \Exception $e ) {

            return $e->getMessage();

        }
    }