<?php
global $wpdb; 


$html = '';
$key = $_POST['query'];



$arraycolombia = array(

'Santiago',
'Temuco',
'La Serena',
'Puerto Montt',
'Iquique',
'Concepción',
'Punta Arenas',
'Viña del Mar',
'Rancagua',
'Talca',
'Chillán',
'Copiapó',
'Antofagasta',
'Valdivia',
'Los Ángeles',
'Osorno',
'Calama',
'Coyhaique',
'Valparaíso',
'Talcahuano',
'Curicó',
'Padre de Las Casas',
'Castro',
'Puerto Varas',
'Concón',
'San Bernardo',
'Quilpué',
'Coquimbo',
'San Fernando',
'San Antonio',
'Villarrica',
'Pucón',
'Ovalle',
'Puerto Natales',
'San Felipe',
'Linares',
'Quillota',
'Vallenar',
'Angol',
'Ancud',
'Constitución',
'Machalí',
'Chiguayante',
'Alto Hospicio',
);
asort($arraycolombia);

if($key == NULL){ 
$matches = $arraycolombia;
if($matches) { $i = 0;
   // echo 'Se ha encontrado el termino "'.$termToSearch.'" en los siguientes campos: <br>';
    foreach ($matches as $match) {
      if ($i <= 200) {
      //  echo $match.'<br>';

        $html .= " "?><a class='dropdown-item' onclick="print('<?php echo $match ?>')">
                                        <p><?php echo $match ?></p>
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

        $html .= " "?><a class='dropdown-item' onclick="print('<?php echo $match ?>')">
                                        <p><?php echo $match ?></p>
                                    </a><?php ""; 
        $i = $i +1;
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
    function print(name){
         $("input#search_text").val(name);
         $("input#job_location").val(name);
         $("input#job_location1").val(name);
    } 
</script>