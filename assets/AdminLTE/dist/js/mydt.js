$(document).ready(function () {
  $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
    return {
      "iStart": oSettings._iDisplayStart,
      "iEnd": oSettings.fnDisplayEnd(),
      "iLength": oSettings._iDisplayLength,
      "iTotal": oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
  };
  var t = $("#skrining").dataTable({
    initComplete: function () {
      var api = this.api();
      $('#skrining_filter input')
        .off('.DT')
        .on('keyup.DT', function (e) {
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        });
    },
    oLanguage: {
      sProcessing: '<div class="overlay justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
    },
    processing: true,
    serverSide: true,
    ajax: {
      "url": window.location.pathname + "/getjson",
      "type": "POST"
    },
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    dom: 'Bfrtip',
    "buttons": [
      'copy',
      {
        extend: 'collection',
        text: 'Export',
        buttons: [
          'excel',
          'csv',
          'pdf',
        ]
      },
      'print'
    ],
    columns: [

      {
        "data": null,
        "sortable": false,
        "searchable": false,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      {
        "data": "id_petugas",
        "render": function (data, type, row) {
          return '<a class="btn btn-danger btn-xs" href="' + window.location.pathname + '/detail/' + data + '"><i class="fa fa-search" aria-hidden="true"></i> Proses</a>'
        }
      },
      {
        "data": "nama"
      },
      {
        "data": "nama_faskes"
      },
      {
        "data": "nik"
      },
      {
        "data": "tgl_lhr"
      },
      {
        "data": "alamat"
      },
      {
        "data": "kecamatan"
      },
      {
        "data": "kelurahan"
      },
      {
        "data": "profesi"
      },
    ],
    // columns: ["<?= $tbody; ?>"],
    order: [
      [1, 'asc']
    ],
    rowCallback: function (row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
    },

  });

});


// $(document).ready(function () {
//   // Setup datatables
//   $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
//     return {
//       "iStart": oSettings._iDisplayStart,
//       "iEnd": oSettings.fnDisplayEnd(),
//       "iLength": oSettings._iDisplayLength,
//       "iTotal": oSettings.fnRecordsTotal(),
//       "iFilteredTotal": oSettings.fnRecordsDisplay(),
//       "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
//       "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
//     };
//   };

//   var table = $("#dt-skrining").dataTable({
//     initComplete: function () {
//       var api = this.api();
//       $('#dt-skrining_filter input')
//         .off('.DT')
//         .on('input.DT', function () {
//           api.search(this.value).draw();
//         });
//     },
//     oLanguage: {
//       sProcessing: "loading..."
//     },
//     processing: true,
//     serverSide: true,
//     ajax: {
//       "url": "<?php echo base_url().'rapid/getjson'?>",
//       "type": "POST"
//     },
//     columns: [
//       //     {
//       //     "data": "id_petugas",
//       //     "render": function (data, type, row) {
//       //       return '<a href="<?php echo base_url()/rapid/detail/' + data + ' > ' + data + ' < /a>';
//       //     }
//       //   },
//       {
//         "data": "nama_faskes"
//       },
//       {
//         "data": "nik"
//       },
//       {
//         "data": "tgl_lhr"
//       },
//       {
//         "data": "alamat"
//       },
//       {
//         "data": "kecamatan"
//       },
//       {
//         "data": "kelurahan"
//       },
//       {
//         "data": "profesi"
//       },
//     ],
//     order: [
//       [1, 'asc']
//     ],
//     rowCallback: function (row, data, iDisplayIndex) {
//       var info = this.fnPagingInfo();
//       var page = info.iPage;
//       var length = info.iLength;
//       $('td:eq(0)', row).html();
//     }

//   });
//   // end setup datatables
// })
