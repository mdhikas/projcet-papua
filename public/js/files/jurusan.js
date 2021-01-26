let jurusan_table

$(document).ready(function() {
  get_records();

  $('#form-store-jurusan').on('submit', function(e) {
    e.preventDefault();
    
    store();
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
    success: function(res) {
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
    error: function(err) {
      console.error(err.responseText)
    }
  });
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