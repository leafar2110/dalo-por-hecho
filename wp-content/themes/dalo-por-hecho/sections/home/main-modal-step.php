	<!-- Modal step -->
	<?php global $current_user, $wp_roles;?>
	<div class="modal fade" id="step" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="signup-step-container">
						<div class="">
							<div class="row d-flex justify-content-center">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="col-md-11">

									<div class="wizard">
										<div class="wizard-inner">
											<div class="connecting-line"></div>
											<ul class="nav nav-tabs" role="tablist">
												<!-- <li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
														aria-expanded="true"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
														aria-expanded="false"><span class="round-tab"></span>
														<i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step3" data-toggle="tab" aria-controls="step3"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step4" data-toggle="tab" aria-controls="step4"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li> -->
												
												<li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
														aria-expanded="true"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="<?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Ofrezco un Servicio" ){ echo"#step2"; } ?>" data-toggle="tab" aria-controls="step2" role="tab"
														aria-expanded="false"><span class="round-tab"></span>
														<i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="<?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Ofrezco un Servicio" ){ echo"#step3"; } ?>" data-toggle="tab" aria-controls="step3"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="<?php if (is_user_logged_in() != NULL && meta_user_value( 'user_registration_radio_1600171615', $current_user->ID ) == "Ofrezco un Servicio" ){ echo"#step4"; } ?>" data-toggle="tab" aria-controls="step4"
														role="tab"><span class="round-tab"></span> <i></i></a>
												</li>
											</ul>
										</div>
										<div role="form" action="index.html" class="login-box">
										<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
											 <?php echo do_shortcode('[submit_job_form]');  ?>
										</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
    function message_rol(){
        $("#message_rol").css("display", "block");
    }
</script>

<script language="javascript">

$("#job_total").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
        	$("#job_salary").val(value.replace(/\./g, ''));
            return value.replace(/\D/g, "")
                        //.replace(/([0-9])([0-9]{2})$/, '$1,$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});

	function mascara(o,f){  
		v_obj=o;  
		v_fun=f;  
		setTimeout("execmascara()",4);  
	}  
	function execmascara(){   
		v_obj.value=v_fun(v_obj.value);
	}  
	function cpf(v){     
    v=new Intl.NumberFormat("de-DE").format(v);
    return v;
	}  

		
function quitar(){
   var valuea = "";
   $("#job_salary1").val(valuea);
   $("#job_salary").val(valuea);
   $("#job_clp").val(valuea);
   $("#job_horas").val(valuea);
   $("#job_total").val(valuea);
}	
$(document).ready(function () {
	
 	    
        $("#job_clp").keyup(function () {
            var valuea =  document.getElementById("job_horas").value*$(this).val();
            v=new Intl.NumberFormat("de-DE").format(valuea);
            $("#job_salary1").val(v);
            $("#job_salary").val(valuea);
        });    
        $("#job_horas").keyup(function () {
            var valuea =  document.getElementById("job_clp").value*$(this).val();
            v=new Intl.NumberFormat("de-DE").format(valuea);
            $("#job_salary1").val(new Intl.NumberFormat("de-DE").format(valuea));
            $("#job_salary").val(valuea);

        });     
        $("#job_total").keyup(function () {
            var valuea =  document.getElementById("job_total").value;
            $("#job_salary1").val(valuea);
        });


});
	
	/*-- multistep form --*/


	$(document).ready(function () {
	$(".nav-tabs > li a[title]").tooltip();

	//Wizard
	$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
		var target = $(e.target);

		if (target.parent().hasClass("disabled")) {
			return false;
		}
	});

	$(".next-step").click(function (e) {

		val_job_title = 0;
		val_job_category = 0;	
		val_job_description = 0;

		var elemento_job_title = document.getElementById("job_title");	
		var elemento_job_category = document.getElementById("job_category2");
		var elemento_job_description = document.getElementById("job_description");

        valor_job_title = document.getElementById("job_title").value;
        if( valor_job_title == null || valor_job_title.length == 0  ) {
           
           elemento_job_title.className = "error-input";
           val_job_title = 1;

        }
      
        valor_job_category = document.getElementById("job_category2").value;
        valor_job_category_otro = document.getElementById("job_category").value;
        if( valor_job_category == null || valor_job_category_otro.length == 0 || valor_job_category.length == 0  ) {
           
           elemento_job_category.className = "form-control hid error-input";
           val_job_category = 1;

        }

        valor_job_description = document.getElementById("job_description").value;
        if( valor_job_description == null || valor_job_description.length == 0  ) {
           
           elemento_job_description.className = "form-control error-input";
           val_job_description = 1;

        }        


        if( val_job_title != 1 && val_job_category != 1 && val_job_description != 1  ) {
              elemento_job_title.className = " ";
              elemento_job_category.className = "form-control hid";
              elemento_job_description.className = "form-control";

		      var active = $(".wizard .nav-tabs li.active");
		      active.next().removeClass("disabled");
		      nextTab(active);
        }

      


	});

	$(".next-step2").click(function (e) {
		val_job_location = 0;
		var elemento_job_location = document.getElementById("job_location");	
        valor_job_location = document.getElementById("job_location").value;
        valor_job_location1 = document.getElementById("job_location1").value;

		val_job_direccion = 0;
		var elemento_job_direccion = document.getElementById("job_direccion");	
        valor_job_direccion = document.getElementById("job_direccion").value;  
        

        if (document.getElementById('en-persona').checked) {         	

           if( valor_job_location == null || valor_job_location.length == 0 || valor_job_location1.length == 0  ) {           
              elemento_job_location.className = "form-control hid error-input";
              val_job_location = 1;
           }
           if( valor_job_direccion == null || valor_job_direccion.length == 0  ) {           
              elemento_job_direccion.className = "error-input ";
              val_job_direccion = 1;
           }           
        }   

		val_job_expires = 0;
		var elemento_job_expires = document.getElementById("job_expires");	
        valor_job_expires = document.getElementById("job_expires").value;
        if( valor_job_expires == null || valor_job_expires.length == 0  ) {
           elemento_job_expires.className = "error-input";
           val_job_expires = 1;

        } 

        if( val_job_location != 1 && val_job_direccion != 1 && val_job_expires != 1 ) {
              elemento_job_location.className = "form-control hid ";
              elemento_job_direccion.className = " ";
              elemento_job_expires.className = " ";


		      var active = $(".wizard .nav-tabs li.active");
		      active.next().removeClass("disabled");
		      nextTab(active);
        }

	});

	$(".next-step3").click(function (e) {

		val_job_salary1 = 0; 
		var elemento_job_total = document.getElementById("job_total");	
        valor_job_total = document.getElementById("job_total").value;

        if (document.getElementById('radio1').checked) {         	

           if( valor_job_total == null || valor_job_total.length == 0  ) {
              elemento_job_total.className = "input-type__presupuesto error-input";
              val_job_salary1 = 1;

           }        
        }          
 
 		
		var elemento_job_clp = document.getElementById("job_salary");	
        valor_job_salary = document.getElementById("job_salary").value;

 		
		var elemento_job_horas = document.getElementById("job_horas");	
        valor_job_horas = document.getElementById("job_horas").value;        

        if (document.getElementById('radio2').checked) {         	

           if( valor_job_clp == null || valor_job_clp.length == 0  ) {
              elemento_job_clp.className = "error-input";
              val_job_salary1 = 1;

           }    

          if( valor_job_horas == null || valor_job_horas.length == 0  ) {
              elemento_job_horas.className = "error-input";
              val_job_salary1 = 1;

           } 

        }

        if( val_job_salary1 != 1 ) {
              elemento_job_total.className = "input-type__presupuesto ";
              elemento_job_clp.className = " ";
              elemento_job_horas.className = " ";


		      var active = $(".wizard .nav-tabs li.active");
		      active.next().removeClass("disabled");
		      nextTab(active);
        }        

	});	
       



	$(".prev-step").click(function (e) {
		var active = $(".wizard .nav-tabs li.active");
		prevTab(active);
	});

});

function nextTab(elem) {
	$(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
	$(elem).prev().find('a[data-toggle="tab"]').click();
}

$(".nav-tabs").on("click", "li", function () {
	$(".nav-tabs li.active").removeClass("active");
	$(this).addClass("active");
	if(".tab-step2.active"){
		$(".tab-step1").addClass("check-tab");
	}else{
		
	}
});



	$('.panel-collapse').on('show.bs.collapse', function () {
  $(this).siblings('.panel-heading').toggleClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function () {
  $(this).siblings('.panel-heading').removeClass('active');
});
  </script>

<style type="text/css">
   input.error-input{ 
     border-color: #900;
     background-color: #FDD;
   }
   select.error-input{ 
     border-color: #900;
     background-color: #FDD;
   }  
   textarea.error-input{ 
     border-color: #900;
     background-color: #FDD;
   }     
</style>