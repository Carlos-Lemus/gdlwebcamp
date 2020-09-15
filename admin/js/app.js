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
    

});
