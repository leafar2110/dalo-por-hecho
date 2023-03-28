<?php
  /////container
  
  $wp_customize->add_section('container', array (
    'title' => 'Main container',
    'panel' => 'panel1'
  )); 

  $wp_customize->add_setting('container_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'container_title_control', array (
    'description' => 'Título',
    'section' => 'container',
    'settings' => 'container_title',
  )));

  $wp_customize->add_setting('container_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'container_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'container',
    'settings' => 'container_subtitle',
  )));

  $wp_customize->add_setting('message_items', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'message_items_control', array (
    'label' => 'Items',
    'description' => '<hr>Agregar Items<hr>',
    'section' => 'container',
    'settings' => 'message_items',
    'type' => 'hidden'
  )));

  ///Items
  for ($i=1; $i <= 3; $i++) { 
    $wp_customize->add_setting('container_items'.$i.'_title', array(
      'default' => ''
      ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'container_items'.$i.'_title_control', array (
      'description' => 'Items '.$i.'',
      'section' => 'container',
      'settings' => 'container_items'.$i.'_title',
      )));

    $wp_customize->add_setting('container_items'.$i.'_description', array(
      'default' => ''
      ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'container_items'.$i.'_description_control', array (
      'description' => 'Descripción',
      'section' => 'container',
      'settings' => 'container_items'.$i.'_description',
      'type' => 'textarea',
      )));

    $wp_customize->add_setting('container_items'.$i.'_image');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'container_items'.$i.'_image_control', array (
      'description' => 'Imagen',
      'section' => 'container',
      'settings' => 'container_items'.$i.'_image'
      )));
  }

?>