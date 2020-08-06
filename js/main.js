(function () {
    "use strict";

    var regalo = document.getElementById("regalo");

    document.addEventListener("DOMContentLoaded", function () {

        if (document.getElementById("btnCalcular")) {

            //campos datos usuarios
            var nombre = document.getElementById("nombre");
            var apellido = document.getElementById("apellido");
            var email = document.getElementById("email");

            // campo pases
            var pase_dia = document.getElementById("pase_dia");
            var pase_dos_dias = document.getElementById("pase_dos_dias");
            var pase_completo = document.getElementById("pase_completo");


            //botones y divs

            var btnCalcular = document.getElementById("btnCalcular");
            var divError = document.getElementById("error");
            var btnRegistro = document.getElementById("btnRegistro");
            var lista_productos = document.getElementById("lista-productos");
            var suma = document.getElementById("suma-total");


            //extras
            var camisas_eventos = document.getElementById("camisas_eventos");
            var etiquetas_eventos = document.getElementById("etiquetas_eventos");

            nombre.addEventListener("blur", validarCampos);
            apellido.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarCampos);
            email.addEventListener("blur", validarEmail);

            pase_dia.addEventListener("blur", mostrarDias);
            pase_dos_dias.addEventListener("blur", mostrarDias);
            pase_completo.addEventListener("blur", mostrarDias);

            btnCalcular.addEventListener("click", calcularMontos);

            function calcularMontos(event) {
                event.preventDefault();

                if (regalo.value === '') {
                    alert("No has elejido ningun regalo!!!")
                    regalo.focus();
                } else {
                    var boletosDia = parseInt(pase_dia.value, 0) || 0;
                    var boletosDosDias = parseInt(pase_dos_dias.value, 0) || 0;
                    var boletosCompletos = parseInt(pase_completo.value, 0) || 0;
                    var cantidadCamisas = parseInt(camisas_eventos.value, 0) || 0;
                    var cantidadEtiquetas = parseInt(etiquetas_eventos.value, 0) || 0;

                    var totalPagar = (boletosDia * 10) + (boletosDosDias * 30) + (boletosCompletos * 50) + (cantidadEtiquetas * 2) + ((cantidadCamisas * 10) - ((cantidadCamisas * 10) * 0.25));

                    var listadoProductos = [];

                    if (boletosDia > 0) {
                        listadoProductos.push(boletosDia + " Pase por dia");
                    }
                    if (boletosDosDias > 0) {
                        listadoProductos.push(boletosDosDias + " Pase por dos dias");
                    }
                    if (boletosCompletos > 0) {
                        listadoProductos.push(boletosCompletos + " Pase completo");
                    }
                    if (cantidadCamisas > 0) {
                        listadoProductos.push(cantidadCamisas + " Camisas");
                    }
                    if (cantidadEtiquetas > 0) {
                        listadoProductos.push(cantidadEtiquetas + " Etiquetas");
                    }

                    lista_productos.style.display = "block";
                    lista_productos.innerHTML = "";

                    for (var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + "<br>";
                    }

                    suma.innerHTML = "$ " + totalPagar.toFixed(2);

                }

            };

            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 0) || 0;
                var boletosDosDias = parseInt(pase_dos_dias.value, 0) || 0;
                var boletosCompletos = parseInt(pase_completo.value, 0) || 0;

                var diasElejidos = [];

                if (boletosDia > 0) {
                    diasElejidos.push("viernes");
                }
                if (boletosDosDias > 0) {
                    diasElejidos.push("viernes", "sabado");
                }
                if (boletosCompletos > 0) {
                    diasElejidos.push("viernes", "sabado", "domingo");
                }
                console.log(diasElejidos);

                for (let i = 0; i < diasElejidos.length; i++) {
                    document.getElementById(diasElejidos[i]).style.display = "block";

                }

            }

            function validarCampos() {

                if (this.value === '') {
                    divError.innerHTML = "Este campo es obligatorio";
                    divError.style.border = "1px solid red";
                    this.style.border = "1px solid red";
                } else {
                    divError.innerHTML = "";
                    divError.style.border = "none";
                    this.style.border = "1px solid green";
                }

            }

            function validarEmail() {
                if (this.value.indexOf("@") > -1) {
                    divError.innerHTML = "";
                    divError.style.border = "none";
                    this.style.border = "1px solid green";
                } else {
                    divError.innerHTML = "El correo tiene que ser valido";
                    divError.style.border = "1px solid red";
                    this.style.border = "1px solid red";
                }
            }
        }

    });

}());

$(document).ready(function () {

    // Menu fijo

    var windowHeight = $(window).height();

    var barraHeight = $(".barra").innerHeight();

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll > windowHeight) {
            $(".barra").addClass("fixed");
        } else {
            $(".barra").removeClass("fixed");
        }

    });

    // Menu responsive

    $(".menu-movil").on("click", function () {
        $(".navegacion-principal").slideToggle();
    });

    agregarMapa();


    //programa de conferencia

    $(".programa-evento .info-curso:first").show();
    $(".menu-programa a:first").addClass("activo");

    $(".menu-programa a").on("click", function () {
        $(".menu-programa a").removeClass("activo");
        $(this).addClass("activo");

        let enlacePresionado = $(this);
        let enlace = enlacePresionado.attr("href");

        $(".programa-evento .info-curso").fadeOut();
        $(enlace).fadeIn();

        return false;
    });

    // animaciones numeros

    $(".resumen-evento li:nth-child(1) p").animateNumber({ number: 6 }, 3000);
    $(".resumen-evento li:nth-child(2) p").animateNumber({ number: 15 }, 3000);
    $(".resumen-evento li:nth-child(3) p").animateNumber({ number: 3 }, 3000);
    $(".resumen-evento li:nth-child(4) p").animateNumber({ number: 9 }, 3000);

    //cuenta regresiva

    $(".cuenta-regresiva").countdown("2022/09/09 09:00:00", function (event) {

        $("#dias").html(event.strftime("%D"));
        $("#horas").html(event.strftime("%H"));
        $("#minutos").html(event.strftime("%M"));
        $("#segundos").html(event.strftime("%S"));

    });

});

function agregarMapa() {

    var map = L.map('mapa').setView([13.461333, -88.165627], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([13.461333, -88.165627]).addTo(map)
        .bindPopup('VIsitanos.')
        .openPopup();
}