  $("#users-table").DataTable({
    "serverSide": true,
    "ajax": "/datatable/users",
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
      {data: 'created_at'},
      {data: 'name'},
      {data: 'identification'},
      {data: 'roles'},
      {data: 'contact'},
      {data: 'btn'},
    ]
  });

  $(document).on('click', "#search-users", function(){
    var search = $("#search").val();
    
    $("#agents-table").DataTable({
      "serverSide": true,
      "ajax": "/datatable/users/"+search,
      "responsive": true,
      "autoWidth": true,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "bDestroy": true,
      "language" : {
        "url": "/lang/dataTables.es.json"
      },
      "columns":[
        {data: 'created_at'},
        {data: 'name'},
        {data: 'contact'},
        {data: 'btn'},
      ]
    });
  });

  $(document).on("click", ".approve-user", function(){
    var token = $("#token").val();
    var id = $(this).attr('data-user');
    var state = $(this).attr('data-state');
    var route = "/aprueba-usuario/"+id;

    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN':token},
      type: 'POST',
      dataType: 'json',
      data: { state:state },

      beforeSend:function(data){
        //$(".contentBtnApprove"+id).html('<div class="loader"></div>');
      },
      success:function(data){
        toastr.success(data['message'], "Notificación:");
        $(".contentBtnApprove"+id).html(data['btn']);
      },
      error:function(data){
        console.log('Error al realizar la consulta.');
      }
    });
  });

  $(document).on("click", ".approve-email-user", function(){
    var token = $("#token").val();
    var id = $(this).attr('data-user');
    var state = $(this).attr('data-state');
    var route = "/aprueba-usuario-email/"+id;

    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN':token},
      type: 'POST',
      dataType: 'json',
      data: { },

      success:function(data){
        toastr.success(data['message'], "Notificación:");
      },
      error:function(data){
        console.log('Error al realizar la consulta.');
      }
    });
  });

  $(document).on('click', ".view-user", function(){
    var token = $("#token").val();
    var id = $(this).attr('data-user');
    var route = "/datos-de-usuario/"+id;

    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN':token},
      type: 'GET',
      dataType: 'html',
      data: { },
      success:function(data){
        $("#modalTitle").html("Información de usuario");
        $("#modalBody").html(data);
      },
      error:function(thrownError){
        console.log(thrownError);
        console.log('Error al realizar la consulta.');
      }
    });
  });