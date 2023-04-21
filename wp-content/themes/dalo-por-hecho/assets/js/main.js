$(function () {
	"use strict";

	$('[data-toggle="offcanvas"]').on("click", function () {
		$(".offcanvas-collapse").toggleClass("open");
	});
    $('#wp_user_profile_avatar_update_profile').text('Subir foto')
    $('#wp_user_profile_avatar_undo').text('Deshacer')
    $('#upload_avatar_responce.wp-user-profile-avatar-error').text('Error! al seleccionar imagen')
    $('#upload_avatar_responce.wp-user-profile-avatar-success').text('Imagen cargada correctamente')
});

///Buscar tareas
$(document).ready(function(){

load_data();

function load_data(query)
{ var urll = api.urlAjax; 
    $.ajax({
        url:urll,
        method:"post",
        data:{query:query},
        success:function(data)
        {
            $('#result').html(data);
        }
    });
}

$('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
        load_data(search);
    }
    else
    {
        load_data();            
    }
});


load_data2();
function load_data2(query)
{var urll2 = api.urlAjaxCat; 
    $.ajax({
        url:urll2,
        method:"post",
        data:{query:query},
        success:function(data)
        {
            $('#result2').html(data);
        }
    });
}

$('#search_text2').keyup(function(){
    var search = $(this).val();
    console.log(search)
    if(search != '')
    {
        load_data2(search);
    }
    else
    {
        load_data2();            
    }
});


var tab = "<?= $_GET['tab_tarea']; ?>";                   
if (tab != "") {
   var elemento_inicial = document.getElementById("v-pills-"+tab+"-tab");  
   elemento_inicial.className = "av-link active card-job";
   var elemento_inicial2 = document.getElementById("v-pills-"+tab);  
   elemento_inicial2.className = "tab-pane fade show active";           
}


});

var id_tarea_pre = "<?= $id_tarea ?>";
$("input#field_id_tarea_preguntas2").val(id_tarea_pre);
function block(){        
    $("#hiden").css("display", "block");

}
function close(){        
    $("#contente").css("display", "block");

}  
function mostrar(){        
    $("#contente").css("display", "block");
    $("#most").css("display", "block");
    $("#ocul").css("display", "none");

}   
function hidd(){        
    $("#contente").css("display", "none");
    $("#most").css("display", "none");
    $("#ocul").css("display", "block");

}       
function print2(name,slug){
     $("input#search_text3").val(name);
     $("input#search_text33").val(slug);
}  

////Footer

function enviarDatos(id_cat,names_cat){ 
    this.names_cat = names_cat;
    this.id_cat = id_cat;
    document.getElementById('job_category2').innerHTML=this.id_cat;
    $("#job_category2").val(this.names_cat);   

    document.getElementById('job_category').innerHTML=this.id_cat;
    $("#job_category").val(this.names_cat);     

    //$('.hid').prop('id', 'hidd');
} 
   
// function enviarDatos23(){ 
//     this.names_cat = 'Seleccionar';
//     this.id_cat = '0';
//     document.getElementById('job_cat').innerHTML=this.names_cat;
//     $("#job_cat").val(this.id_cat);   

//     //$('.hid').prop('id', 'hidd');
// }


$(document).ready(function() {     
                  
    $('#key').on('keyup', function() {
        var key = $(this).val();        
        var dataString = 'key='+key;
        var url = api.urlAjax; 
    $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return true;
                });
            }
        });
    });


    $('#job_location').on('keyup', function() {
        var job_location = $(this).val();        
        var dataString = 'job_location='+job_location;
        var url = api.urlAjax; 
    $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        //$('#job_location').val(data);
                         //$("#job_location").val(data1);
                        $('#job_location').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                       // $("#job_location").val(data);
                        return false;
                });
            }
        });
    });
    


$('#note_description').appendTo('.variation');


    
}); 


    function monto_salary2(name_tarea,title_tarea,id_tarea,email_empleador,name_empleado,id_empleado,salary,imagen_perfil_empleador){ 
       //$("input#field_ccdeo").val(name_tarea);
       //$("input#field_vqrer").val(tile_tarea);
       //$("input#field_a9ti0").val(id_tarea);
       //$("input#field_gvep8").val(email_empleador);
       //$("input#field_urvk3").val(name_empleado);
       //$("input#field_xjqxf").val(id_empleado);
       //$("input#field_41hfd").val(salary);

       $("input#field_name_tarea").val(name_tarea);
       $("input#field_title_tarea").val(title_tarea);
       $("input#field_id_tarea").val(id_tarea);
       $("input#field_email_empleador").val(email_empleador);
       
       $("input#field_name_empleado").val(name_empleado);
       $("input#field_id_empleado").val(id_empleado);
       $("input#field_salary_ofertado").val(salary);
       $("input#field_salary_ofertado_visible").val(salary);
       $("input#field_imagen_perfil_empleador").val(imagen_perfil_empleador) ;       
    } 

    function function_donation(salary_donation,array_note){

       $('.wdgk_donation').prop('disabled', true);
       var value_ofertar_monto =  salary_donation;
       var porcent = (value_ofertar_monto*0.10);
       var suma = parseFloat(porcent)+parseFloat(value_ofertar_monto);
       $("input.wdgk_donation").val(suma);

       $("textarea#w3mission").val(array_note);
       $('textarea#w3mission').prop('hidden', true); 

    }    

    function show_data(salary_donation,array_note,nombre_empleado,img_avatar){


       var value_ofertar_monto =  salary_donation;
       var porcent = (value_ofertar_monto*0.10);
       var suma = parseFloat(porcent)+parseFloat(value_ofertar_monto);
       var nombre_empleado =  nombre_empleado;
       var img_avatar =  img_avatar;
  
      
       document.getElementById("monto_tarea").innerHTML ="$"+salary_donation;
       document.getElementById("monto_comision").innerHTML ="$"+porcent; 
       document.getElementById("monto_total").innerHTML ="$"+suma; 
       document.getElementById("nombre_empleado").innerHTML = nombre_empleado; 
       document.getElementById("img_avatar").innerHTML = '<img alt="" src="'+img_avatar+'" class="avatar avatar-50 photo" height="50" width="50">'; 

    }     


    function block_2(){        
        $("#job_location").css("display", "none");
        $("#job_direccion").css("display", "none");  
        $("#job_location2").css("display", "none");
        $("#job_direccion2").css("display", "none");            
      //  $("input#job_location").prop('disabled', true);  
    }  

    function block_5(){         
        $("#job_location").css("display", "block");
        $("#job_direccion").css("display", "block");   
        $("#job_location2").css("display", "block");
        $("#job_direccion2").css("display", "block");              
    } 
