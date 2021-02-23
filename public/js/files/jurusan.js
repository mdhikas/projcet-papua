let jurusan_table

$(document).ready(function () {
  get_records();

  $('#form-store-jurusan').on('submit', function (e) {
    e.preventDefault();

    store();
  });

  $('#form-update-jurusan').on('submit', function (e) {
    e.preventDefault();
    update();
  });

  $(document).on('click', '.btn-edit', function () {
    $('#modal-edit').modal('toggle');
    const kode_fakultas = $(this).data('kode_fakultas');
    const kode_jurusan = $(this).data('kode_jurusan');
    const jenjang = $(this).data('jenjang');
    const nama_jurusan = $(this).data('nama_jurusan');

    $('#modal-edit select[name="kode_fakultas"]').val(kode_fakultas).trigger('change');
    $('#modal-edit input[name="kode_jurusan"]').val(kode_jurusan);
    $('#modal-edit input[name="jenjang"]').val(jenjang);
    $('#modal-edit input[name="nama_jurusan"]').val(nama_jurusan);
  });
});

function store() {
  const kode_jurusan = $('input[name="kode_jurusan"]').val();
  const jenjang = $('input[name="jenjang"]').val();
  const nama_jurusan = $('input[name="nama_jurusan"]').val();
  const kode_fakultas = $('select[name="kode_fakultas"]').val();

  if (kode_jurusan === "") {
    error_validation('Kode jurusan harus diisi');
    return false;
  }

  if (jenjang === "") {
    error_validation('Program studi harus diisi');
    return false;
  }

  if (nama_jurusan === "") {
    error_validation('Nama jurusan harus diisi');
    return false;
  }

  if (kode_fakultas === "") {
    error_validation('Kode jurusan harus diisi');
    return false;
  }

  $.ajax({
    url: 'jurusan/store',
    type: 'POST',
    data: $('#form-store-jurusan').serialize(),
    dataType: 'JSON',
    success: function (res) {
      $('#modal').modal('toggle');
      $('#form-store-jurusan').trigger('reset');
      $('.select2').val([]).trigger('change');
      $('.select2').select2({
        theme: 'bootstrap4',
        placeholder: '-- Pilih Fakultas --'
      });
      if (res.status === 1) {
        jurusan_table.ajax.reload();
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
  $.ajax({
    url: base_url() + '/jurusan/update',
    type: 'POST',
    data: $('#form-update-jurusan').serialize(),
    dataType: 'JSON',
    success: function (res) {
      $('#modal-edit').modal('toggle');
      $('#form-update-jurusan').trigger('reset');
      if (res.status === 1) {
        jurusan_table.ajax.reload();
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
    error: err => console.error(err.responseText)
  });
}

function destroy(kode_jurusan) {
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
    if (result.value) {
      $.ajax({
        url: base_url() + '/jurusan/destroy',
        type: 'POST',
        data: { kode_jurusan },
        dataType: 'JSON',
        success: function (res) {
          if (res.status === 1) {
            jurusan_table.ajax.reload();
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
    }
  })
}

function get_records() {
  jurusan_table = $('#data-table').DataTable({
    processing: true,
    serverside: true,
    language: {
      emptyTable: "Tidak ada data yang tersedia pada tabel",
      processing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw text-primary"></i>'
    },
    responsive: true,
    order: [],
    ajax: {
      url: './jurusan/get_records',
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