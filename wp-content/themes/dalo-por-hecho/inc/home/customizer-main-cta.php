<?php
  /////cta
  
  $wp_customize->add_section('cta', array (
    'title' => 'Main Cta',
    'panel' => 'panel1'
  )); 

  $wp_customize->add_setting('cta_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta_title_control', array (
    'description' => 'Título',
    'section' => 'cta',
    'settings' => 'cta_title',
  )));

  $wp_customize->add_setting('cta_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'cta',
    'settings' => 'cta_subtitle',
  )));

  $wp_customize->add_setting('cta_description', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta_description_control', array (
    'description' => 'Descripción',
    'section' => 'cta',
    'settings' => 'cta_description',
    'type' => 'textarea',
  )));

  $wp_customize->add_setting('cta_image');
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_image_control', array (
    'description' => 'Imagen',
    'section' => 'cta',
    'settings' => 'cta_image'
  )));

//// cta message
  $wp_customize->add_setting('cta_message_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta_message_title_control', array (
    'label' => 'Mensaje Central',
    'description' => 'Título',
    'section' => 'cta',
    'settings' => 'cta_message_title',
  )));

  $wp_customize->add_setting('cta_message_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta_message_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'cta',
    'settings' => 'cta_message_subtitle',
  )));  

  $wp_customize->add_setting('cta_message_buttom', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta_message_buttom_control', array (
    'description' => 'Botón',
    'section' => 'cta',
    'settings' => 'cta_message_buttom',
  ))); 

  $wp_customize->add_setting('cta_message_urlbuttom', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'cta_message_urlbuttom_control', array (
    'description' => 'Url Botón',
    'section' => 'cta',
    'settings' => 'cta_message_urlbuttom',
  ))); 

?>