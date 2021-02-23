let fakultas_table;

$(document).ready(function () {
  $('#form-store-fakultas').on('submit', function (e) {
    e.preventDefault();
    store();
  });

  $('#form-update-fakultas').on('submit', function (e) {
    e.preventDefault();
    update();
  });

  $(document).on('click', '.btn-edit', function () {
    $('#modal-edit').modal('toggle');
    const kode_fakultas = $(this).data('kode_fakultas');
    const nama_fakultas = $(this).data('nama_fakultas');

    $('#modal-edit input[name="kode_fakultas"]').val(kode_fakultas);
    $('#modal-edit input[name="nama_fakultas"]').val(nama_fakultas);
  });

  $(document).on('click', '.btn-delete', function () {
    const kode_fakultas = $(this).data('kode_fakultas');
    destroy(kode_fakultas);
  });

  get_records();
});

function store() {
  const kode_fakultas = $('input[name="kode_fakultas"]').val();
  const nama_fakultas = $('input[name="nama_fakultas"]').val();

  if (kode_fakultas === "") {
    error_validation('Kode fakultas harus diisi');
    return false;
  }

  if (nama_fakultas === "") {
    error_validation('Nama fakultas harus diisi');
    return false;
  }

  $.ajax({
    url: 'fakultas/store',
    type: 'POST',
    data: $('#form-store-fakultas').serialize(),
    dataType: 'JSON',
    success: function (res) {
      $('#modal').modal('toggle');
      $('#form-store-fakultas').trigger('reset');
      if (res.status === 1) {
        fakultas_table.ajax.reload();
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
    error: function (err) {
      console.error(err.responseText)
    }
  });
}

function update() {
  const kode_fakultas = $('#modal-edit input[name="kode_fakultas"]').val();
  const nama_fakultas = $('#modal-edit input[name="nama_fakultas"]').val();

  if (kode_fakultas === "") {
    error_validation('Kode fakultas harus diisi');
    return false;
  }

  if (nama_fakultas === "") {
    error_validation('Nama fakultas harus diisi');
    return false;
  }

  $.ajax({
    url: 'fakultas/update',
    type: 'POST',
    data: $('#form-update-fakultas').serialize(),
    dataType: 'JSON',
    success: function (res) {
      $('#modal-edit').modal('toggle');
      $('#form-update-fakultas').trigger('reset');
      if (res.status === 1) {
        fakultas_table.ajax.reload();
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
    error: function (err) {
      console.error(err.responseText)
    }
  });
}

function destroy(kode_fakultas) {
  Swal.fire({
    title: 'Apakah kamu yakin ?',
    text: "Data ini tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
  }).then((result) => {
    $.ajax({
      url: 'fakultas/destroy',
      type: 'POST',
      data: { kode_fakultas },
      dataType: 'JSON',
      success: function (res) {
        if (res.status === 1) {
          fakultas_table.ajax.reload();
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
      error: function (err) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        });
      }
    });
  })
}

function get_records() {
  fakultas_table = $('#data-table').DataTable({
    processing: true,
    serverside: true,
    language: {
      emptyTable: "Tidak ada data yang tersedia pada tabel",
      processing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw text-primary"></i>'
    },
    responsive: true,
    order: [],
    ajax: {
      url: './fakultas/get_records',
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
