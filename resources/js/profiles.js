  $("#profiles-table").DataTable({
    "serverSide": true,
    "ajax": "/datatable/profiles",
    "responsive": true,
    "autoWidth": true,
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "language" : {
      "url": "/lang/dataTables.es.json"
    },
    "columns":[
      {data: 'id'},
      {data: 'name'},
      {data: 'description'}
    ]
  });

  $("#profiles-transactions-table").DataTable({
    "serverSide": true,
    "ajax": "/datatable/profiles-transactions",
    "responsive": true,
    "autoWidth": true,
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "language" : {
      "url": "/lang/dataTables.es.json"
    },
    "columns":[
      {data: 'profile'},
      {data: 'transaction'},
      {data: 'delete'}
    ]
  });

  $(document).on("click", ".transaction-role", function(){
    var token = $("#token").val();
    var id = $(this).attr('data-transaction-role');
    var route = "/eliminar-perfil-transaccion/"+id;

    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN':token},
      type: 'DELETE',
      dataType: 'json',
      data: { },
      success:function(data){
        toastr.success(data['message'], "Notificación:");
        $("#profiles-transactions-table").DataTable().ajax.reload();
      },
      error:function(data){
        console.log('Error al realizar la consulta.');
      }
    });
  });