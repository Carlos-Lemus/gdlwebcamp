$(document).ready(function() {
    $("#guardar_registro").on("submit", function(e) {
        e.preventDefault();
        
        let datos = $(this).serializeArray();
        
        $.ajax({
            type: $(this).attr("method"),
            data: datos,
            url: $(this).attr("action"),
            dataType: "json",
            success: data => {
                let respuesta = data.respuesta;
                console.log(data);
                if(respuesta === "exito") {
                    swal({
                        type: 'success',
                        title: 'Exito',
                        text: 'Se guardo/Edito el administrador',
                      })
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Ocurrio un error al realizar la operacion del administrador',
                      })
                }
            }
        });
    });

    // eliminar un registro

    $(".borrar_registro").on("click", function(e) {

        e.preventDefault();

        let tipo = $(this).attr("data-tipo");
        let id = $(this).attr("data-id");

        swal({
            title: '¿Estas seguro?',
            text: "Eliminaras el registro'",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si eliminar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            
              if(result.value) {
                $.ajax({
                    type: "post",
                    data: {
                        "id": id,
                        "registro": "eliminar"
                    },
                    dataType: "json",
                    url: "modelo_"+tipo+".php",
                    success: (data) => {
                        let resultado = data;
                        if(resultado.respuesta == "exito") {
                            jQuery("[data-id='"+resultado.id_eliminado+"']").parents("tr").remove();
                        } else {
                            swal({
                                type: 'error',
                                title: 'Error',
                                text: 'Ocurrio un error al realizar la operacion del administrador',
                              })
                        }
                    }

                });
              }
            });
    });

    $("#crear_registro").attr("disabled", true);

    $("#repetir_password").on("input", () => {
        let nuevoPass = $("#password").val();

        if($("#repetir_password").val() == nuevoPass) {
            $("#resultado_password").text("Correcto");
            $("#resultado_password").parents(".form-group").addClass("has-success").removeClass("has-error");
            $("input#password").parents(".form-group").addClass("has-success").removeClass("has-error");

            $("#crear_registro").attr("disabled", false);
        } else {
            $("#resultado_password").text("No son iguales");
            $("#resultado_password").parents(".form-group").addClass("has-error").removeClass("has-success");
            $("input#password").parents(".form-group").addClass("has-error").removeClass("has-success");
        }
    });

});