<?php
  /////Banner
  /*****************banner1 ******************/
  $wp_customize->add_section('banner', array (
    'title' => 'Main Banner',
    'panel' => 'panel1'
  ));

  $wp_customize->add_setting('banner1_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_title_control', array (
    'description' => 'Título',
    'section' => 'banner',
    'settings' => 'banner1_title',
  )));

  $wp_customize->add_setting('banner1_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'banner',
    'settings' => 'banner1_subtitle',
  )));

  $wp_customize->add_setting('banner1_description', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_description_control', array (
    'description' => 'Descripción',
    'section' => 'banner',
    'settings' => 'banner1_description',
  )));  

  $wp_customize->add_setting('banner1_button1', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_button1_control', array (
    'label' => 'Botón 1',
    'description' => 'Texto Botón',
    'section' => 'banner',
    'settings' => 'banner1_button1',
  ))); 

  $wp_customize->add_setting('banner1_urlbutton1', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_urlbutton1_control', array (
    'description' => 'Url Botón',
    'section' => 'banner',
    'settings' => 'banner1_urlbutton1',
  )));

 $wp_customize->add_setting('banner1_button2', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner2_button1_control', array (
    'label' => 'Botón 2',
    'description' => 'Texto Botón',
    'section' => 'banner',
    'settings' => 'banner1_button2',
  ))); 

  $wp_customize->add_setting('banner1_urlbutton2', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_urlbutton2_control', array (
    'description' => 'Url Botón',
    'section' => 'banner',
    'settings' => 'banner1_urlbutton2',
  )));

  $wp_customize->add_setting('banner1_image');
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner1_image_control', array (
    'description' => 'Imagen',
    'section' => 'banner',
    'settings' => 'banner1_image'
  )));

 
?>