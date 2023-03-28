<?php
  /////funciona
  
  $wp_customize->add_section('funciona', array (
    'title' => 'Main Funciona',
    'panel' => 'panel1'
  )); 

  $wp_customize->add_setting('funciona_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_title_control', array (
    'description' => 'Título',
    'section' => 'funciona',
    'settings' => 'funciona_title',
  )));

  $wp_customize->add_setting('funciona_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'funciona',
    'settings' => 'funciona_subtitle',
  )));

  $wp_customize->add_setting('message_items', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'message_items_control', array (
    'label' => 'Items',
    'description' => '<hr>Agregar Items<hr>',
    'section' => 'funciona',
    'settings' => 'message_items',
    'type' => 'hidden'
  )));

  ///Items
  for ($i=1; $i <= 3; $i++) { 
    $wp_customize->add_setting('funciona_items'.$i.'_title', array(
      'default' => ''
      ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_items'.$i.'_title_control', array (
      'description' => 'Items '.$i.'',
      'section' => 'funciona',
      'settings' => 'funciona_items'.$i.'_title',
      )));

    $wp_customize->add_setting('funciona_items'.$i.'_description', array(
      'default' => ''
      ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_items'.$i.'_description_control', array (
      'description' => 'Descripción',
      'section' => 'funciona',
      'settings' => 'funciona_items'.$i.'_description',
      'type' => 'textarea',
      )));

    $wp_customize->add_setting('funciona_items'.$i.'_image');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'funciona_items'.$i.'_image_control', array (
      'description' => 'Imagen',
      'section' => 'funciona',
      'settings' => 'funciona_items'.$i.'_image'
      )));
  }


//// funciona message
  $wp_customize->add_setting('funciona_message_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_message_title_control', array (
    'label' => 'Mensaje Central',
    'description' => 'Título',
    'section' => 'funciona',
    'settings' => 'funciona_message_title',
  )));

  $wp_customize->add_setting('funciona_message_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_message_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'funciona',
    'settings' => 'funciona_message_subtitle',
  )));  

  $wp_customize->add_setting('funciona_message_buttom', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_message_buttom_control', array (
    'description' => 'Botón',
    'section' => 'funciona',
    'settings' => 'funciona_message_buttom',
  ))); 

  $wp_customize->add_setting('funciona_message_urlbuttom', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'funciona_message_urlbuttom_control', array (
    'description' => 'Url Botón',
    'section' => 'funciona',
    'settings' => 'funciona_message_urlbuttom',
  ))); 

?>