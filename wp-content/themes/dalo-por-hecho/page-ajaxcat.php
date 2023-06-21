<?php
global $wpdb; 


$html = '';
$key = $_POST['query'] ?? '';
$cat = $_GET['cat'] ?? '';

  
  $product_categories = get_categories( array( 'taxonomy' => 'job_listing_category', 'orderby' => 'menu_order', 'order' => 'asc', 'hide_empty'=> FALSE ));  
  foreach($product_categories as $category):
    $checked =NULL;  if ($category->slug == $cat) { $checked = "checked='checked'"; } $categoria = $category->name; $category_id = $category->term_id; $category_link = get_category_link( $category_id );                 
                    
     $arraycolombia[] = ''.$categoria.','.$category->slug.','.$category->term_id;

  endforeach;  



if($key == NULL){ 
asort($arraycolombia);
$matches = $arraycolombia;
if($matches) { $i = 0;
   // echo 'Se ha encontrado el termino "'.$termToSearch.'" en los siguientes campos: <br>';
    foreach ($matches as $match) {
      if ($i <= 200) {
      //  echo $match.'<br>';
      $sinparametros= explode(',', $match);

        $html .= " "?><a class='dropdown-item' onclick="printcat('<?php echo $sinparametros[0] ?>','<?php echo $sinparametros[1] ?>','<?php echo $sinparametros[2] ?>')">
                                        <p><?php echo $sinparametros[0] ?></p>
                                    </a><?php ""; 
        $i = $i +1;
      }  
    }
}
}


if($key != NULL){ 
$termToSearch = $key;
$matches = array_filter($arraycolombia, function($var) use ($termToSearch) { return stristr($var, $termToSearch); });
if($matches) { $i = 0;
   // echo 'Se ha encontrado el termino "'.$termToSearch.'" en los siguientes campos: <br>';
    foreach ($matches as $match) {
      if ($i <= 4) {
      //  echo $match.'<br>';
$sinparametros= explode(',', $match);
 $html .= " "?><a class='dropdown-item' onclick="printcat('<?php echo $sinparametros[0] ?>','<?php echo $sinparametros[1] ?>','<?php echo $sinparametros[2] ?>')">
                                        <p><?php echo $sinparametros[0] ?></p>
                                    </a><?php ""; 

       
        $i = $i +1;
      }  
    }
} else {
    echo 'El termino "'.$termToSearch.'" no se ha encontrado.';
}
}//if


echo $html;
?>

<script type="text/javascript">
    function printcat(name,slug,term_id){
         $("input#search_text2").val(name);
         $("input#search_text22").val(slug);
         $("input#job_category2").val(name);
         $("input#job_category").val(term_id);
    } 
</script>