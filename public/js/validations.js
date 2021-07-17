$(function() {
    $("#btnSave").on('click', function() {
        $.validator.addMethod("formEmail", function (value, element) {
            var pattern = /^[a-zA-Z ]+$/;
            return this.optional(element) || pattern.test(value);
         }, "Sólo se permiten letras y espacios");

        $("#formCrear").validate({
            rules: {
                nombre: {
                    required: true,
                    formEmail: true
                },
                email: {
                    required: true, 
                    email:true
                },
                sexo: {
                    required: true,
                },
                descripcion: {
                    required: true,
                },
            },
            messages: {
                nombre: {
                    required: "Campo nombre requerido *"
                },
                email: {
                    required: "Campo email requerido *",
                    email: 'El formato de email es incorrecto'
                },
                sexo: {
                    required: "Campo sexo requerido *"
                },
                descripcion: {
                    required: "Campo descripción requerido *"
                },
            }
        });
    });
});