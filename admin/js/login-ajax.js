$(document).ready(function() {
  
    $("#login-admin-form").on("submit", function(e) {
        e.preventDefault();

        let datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr("method"),
            data: datos,
            url: $(this).attr("action"),
            dataType: "json",
            success: data => {
                let respuesta = data;

                console.log(respuesta);

                if(respuesta.respuesta === "exitoso") {
                    swal({
                        type: 'success',
                        title: 'Login',
                        text: 'Bienvenido '+ respuesta.usuario + '!',
                      })

                      setTimeout(() => {
                        window.location.href = "admin-area.php";
                      }, 2000);
                } else {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Se ha equivocado en el usuario o password',
                      })
                }
            }
        });
    });

});