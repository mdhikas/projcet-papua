let semester_table;

$(document).ready(function() {
  get_records();

  $('#form-store-semester').on('submit', function(e) {
    e.preventDefault();
    store();
  });

  $('#form-update-semester').on('submit', function(e) {
    e.preventDefault();
    update();
  });

  $(document).on('click', '.btn-edit', function() {
    $('#modal-edit').modal('toggle');
    const kode_semester = $(this).data('kode_semester');
    const keterangan = $(this).data('keterangan');

    $('#modal-edit input[name="kode_semester"]').val(kode_semester);
    $('#modal-edit input[name="keterangan"]').val(keterangan);
  });
});

function store() {
  const kode_semester = $('input[name="kode_semester"]').val();
  const keterangan = $('input[name="keterangan"]').val();

  if (kode_semester === "") {
    error_validation('Kode semester harus diisi');
    return false;
  }

  if (keterangan === "") {
    error_validation('Keterangan semester harus diisi');
    return false;
  }

  $.ajax({
    url: base_url() + '/master/semester/store',
    type: 'POST',
    data: $('#form-store-semester').serialize(),
    dataType: 'JSON',
    success: function(res) {
      $('#modal').modal('toggle');
      $('#form-store-semester').trigger('reset');
      
      if (res.status === 1) {
        semester_table.ajax.reload();
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data berhasil disimpan',
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        });
      }
    },
    error: function(err) {
      console.error(err.responseText)
    }
  });
}

function update() {
  const kode_semester = $('#modal-edit input[name="kode_semester"]').val();
  const keterangan = $('#modal-edit input[name="keterangan"]').val();

  if (kode_semester === "") {
    error_validation('Kode semester harus diisi');
    return false;
  }

  if (keterangan === "") {
    error_validation('Keterangan semester harus diisi');
    return false;
  }

  $.ajax({
    url: base_url() + '/master/semester/update',
    type: 'POST',
    data: $('#form-update-semester').serialize(),
    dataType: 'JSON',
    success: function(res) {
      $('#modal-edit').modal('toggle');
      $('#form-update-semester').trigger('reset');
      
      if (res.status === 1) {
        semester_table.ajax.reload();
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data berhasil diperbaharui',
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        });
      }
    },
    error: function(err) {
      console.error(err.responseText)
    }
  });
}

function destroy(kode_semester) {
  Swal.fire({
    title: 'Apakah kamu yakin?',
    text: "Data ini tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: base_url() + '/master/semester/destroy',
        type: 'POST',
        data: { kode_semester },
        dataType: 'JSON',
        success: function(res) {
          if (res.status === 1) {
            semester_table.ajax.reload();
            Swal.fire({
              icon: 'success',
              title: 'Good Job',
              text: 'Data berhasil dihapus',
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
            });
          }
        },
        error: function(err) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          });
        }
      });
    }
  })
}

function get_records() {
  semester_table = $('#data-table').DataTable({
    processing: true,
    serverside: true,
    language: {
      emptyTable: "Tidak ada data yang tersedia pada tabel",
      processing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw text-primary"></i>'
    },
    responsive: true,
    order: [],
    ajax: {
        url: base_url() + '/master/semester/get_records',
        type: 'POST',
        data: {}
    },
    columnDefs: [
      {
        targets: [0, -1],
        orderable: false
      },
      {
        targets: [0],
        className: 'text-center'
      },
      {
        className: 'dt-nowrap',
        targets: [-1]
      }
    ]
  });
}