<?php
  /////Tareas
  
  $wp_customize->add_section('tareas', array (
    'title' => 'Main Tareas',
    'panel' => 'panel1'
  )); 

  $wp_customize->add_setting('tareas_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas_title_control', array (
    'description' => 'Título',
    'section' => 'tareas',
    'settings' => 'tareas_title',
  )));

  $wp_customize->add_setting('tareas_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'tareas',
    'settings' => 'tareas_subtitle',
  )));

  /*** Categories ****/
  $wp_customize->add_setting('tareas_hidden', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas_hidden_control', array (
    'description' => '<hr>Categorías',
    'section' => 'tareas',
    'settings' => 'tareas_hidden',
    'type' => 'hidden'
  )));

    
    $a=array("0"=>"Seleccionar");
    $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'order' => 'asc', 'hide_empty'=> FALSE));  
    foreach($product_categories as $category):  
      $id_cat = $category->term_id;
      $name_cat = $category->name;
      $b = $a[$id_cat]=$name_cat;
      array_push($a, $b);
    endforeach;
    array_pop($a);

    for ($i=1; $i <=9; $i++) { 
      $wp_customize->add_setting('tareas_cat'.$i.'', array(
        'default' => ''
        ));

      $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas_cat'.$i.'_control', array (
        'description' => 'Categoría # '.$i.'',
        'section' => 'tareas',
        'settings' => 'tareas_cat'.$i.'',
        'type'     => 'select',
        'choices'  => $a,
      //$array_cat_id => $array_cat_name,
     // 'color' => 'Color',

        )));
    }    

  

//// Tareas 2
 $wp_customize->add_section('tareas2', array (
    'title' => 'Main Tareas 2',
    'panel' => 'panel1'
  )); 

  $wp_customize->add_setting('tareas2_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas2_title_control', array (
    'description' => 'Título',
    'section' => 'tareas2',
    'settings' => 'tareas2_title',
  )));

  $wp_customize->add_setting('tareas2_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tareas2_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'tareas2',
    'settings' => 'tareas2_subtitle',
  )));

?>