
$( "button[name='save_draft']" ).click(function( event ) {
    event.preventDefault();
    //url de enpoint
    let newInfo = document.querySelectorAll('#submit-job-form input, #submit-job-form select, #submit-job-form textarea');
    let url = form_api.crateFormEndpoint
    let nonce = form_api.restNonce
    let data = {}

    data['fxaction'] = form_api.adminID+'*&'+nonce

    newInfo.forEach(function(element){
        data[element.name] = element.value
    })

    console.log(data)

    jQuery.post(url, data, function(response) {
       if( response['status'] === 'aproved'){
        window.location.href = "http://localhost/dalo-por-hecho/buscar-tareas/";
       }
    });

});
