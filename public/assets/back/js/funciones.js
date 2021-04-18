var APP = function () {
    return {
        validacionGeneral: function (id, reglas, mensajes) {
            const formulario = $('#' + id);
            formulario.validate({
                rules: reglas,
                messages: mensajes,
                errorElement: 'div', //contenedor de mensajes de error de entrada predeterminado
                errorClass: 'invalid-feedback', //clase de mensaje de error de entrada predeterminada
                focusInvalid: false, //no enfoque la última entrada inválida
                ignore: "", //validar todos los campos, incluida la entrada oculta del formulario
                highlight: function (element, errorClass, validClass) { //entradas de error de resaltado
                    $(element).addClass('is-invalid'); //establecer la clase de error en el grupo de control
                },
                unhighlight: function (element) {  //revertir el cambio hecho por resaltar
                    $(element).removeClass('is-invalid'); //eliminar la clase de error al grupo de control
                },
                success: function (element) {
                    element.removeClass('is-invalid'); //establecer clase de éxito para el grupo de control
                    //element.closest('.form-group).removeClass('is-invalid); //establecer clase de éxito para el grupo de control
                },
                errorPlacement: function (error, element) {
                    if (element.closest('.bootstrap-select').length > 0) {
                        element.closest('.bootstrap-select').find('bs-placeholder').after(error);
                    } else if ($(element).is('select') && element.hasClass('select2-hidden-accessible')) {
                        element.next().after(error);
                    } else {
                        error.insertAfter(element); //ubicación predeterminada para todo
                    }
                },
                invalidHandler: function (event, validator) { //mostrar alerta de error al enviar el formulario

                },
                submitHandler: function (form) {
                    return true;
                }
            });
        },
    }
}();
