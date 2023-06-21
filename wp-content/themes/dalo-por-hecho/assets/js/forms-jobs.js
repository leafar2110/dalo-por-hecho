$("button[name='save_draft']").click(function(event) {
    event.preventDefault();
  
    var formData = new FormData();
    formData.append('fxaction', form_api.adminID + '*&' + form_api.restNonce);
  
    var formElements = document.querySelectorAll('#submit-job-form input, #submit-job-form select, #submit-job-form textarea');
    var fieldNames = {};
  
    formElements.forEach(function(element) {
      var fieldName = element.name;
  
      // Verificar si el campo ya ha sido agregado al objeto FormData
      if (!fieldNames.hasOwnProperty(fieldName)) {
        if (element.type === 'file') {
          var file = element.files[0];
          formData.append(fieldName, file);
        } else {
          formData.append(fieldName, element.value);
        }
  
        // Registrar el nombre del campo para evitar duplicados
        fieldNames[fieldName] = true;
      }
    });
  
    jQuery.ajax({
      url: form_api.crateFormEndpoint,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        if (response['status'] === 'aproved') {
          window.location.href = "/";
        }
      },
      error: function(xhr, status, error) {
        // Manejar los errores de la solicitud AJAX
      }
    });
  });
  