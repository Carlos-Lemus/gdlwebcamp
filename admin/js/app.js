$(document).ready(function () {
    $('#registros').DataTable({
      "paging": true,
      "pageLength": 5,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "languaje": {
        paginate: {
          next: "Siguiente",
          previous: "Anterior",
          last: "Ultimo",
          first: "Primero"
        },
        info: "Mostrar _START_ a _END_ de _TOTAL_ resultados",
        emptyTable: "No hay registros",
        infoEmpty: "0 Registros",
        search: "Buscar: "
      },
    });

    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    });

    //Initialize Select2 Elements
    $('.select2').select2();

    $('#icono').iconpicker();

    $.getJSON("servicio-registrados.php", (data) => {
        console.log(data);
    });

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },

      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    });
    

});
