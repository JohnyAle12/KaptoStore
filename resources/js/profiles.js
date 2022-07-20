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