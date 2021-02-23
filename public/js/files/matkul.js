let matkul_table;
let field_counter = 1;

$(document).ready(function () {
  get_records();
  check_field_counter();

  $('#form-store-matkul').on('submit', function (e) {
    e.preventDefault();
    store();
  });

  $('#form-update-matkul').on('submit', function (e) {
    e.preventDefault();
    update();
  });

  $(document).on('click', '.btn-edit', function () {
    $('#modal-edit').modal('toggle');
    const kode_jurusan = $(this).data('kode_jurusan');
    const kode_mk = $(this).data('kode_mk');
    const nama_mk = $(this).data('nama_mk');
    const sks = $(this).data('sks');

    $('#modal-edit select[name="kode_jurusan"]').val(kode_jurusan).trigger('change');
    $('#modal-edit input[name="kode_matkul"]').val(kode_mk);
    $('#modal-edit input[name="nama_matkul"]').val(nama_mk);
    $('#modal-edit input[name="sks"]').val(sks);
  });
});

function get_records() {
  matkul_table = $('#data-table').DataTable({
    processing: true,
    serverside: true,
    language: {
      emptyTable: "Tidak ada data yang tersedia pada tabel",
      processing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw text-primary"></i>'
    },
    responsive: true,
    order: [],
    ajax: {
      url: './matkul/get_records',
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

function store() {
  $.ajax({
    url: base_url() + '/matkul/store',
    type: 'POST',
    data: $('#form-store-matkul').serialize(),
    dataType: 'JSON',
    success: function (res) {

      $('#modal').modal('toggle');
      $('#form-store-matkul').trigger('reset');
      $('#additional-field').html('');
      $('.select2').val([]).trigger('change');
      $('.select2').select2({
        theme: 'bootstrap4',
        placeholder: '-- Pilih Jurusan --'
      });
      field_counter = 1;
      matkul_table.ajax.reload();
      Swal.fire({
        icon: 'success',
        title: 'Good Job',
        text: 'Data berhasil disimpan',
      });
    },
    error: function (err) {
      console.error(err.responseText);
    }
  });
}

function update() {
  $.ajax({
    url: base_url() + '/matkul/update',
    type: 'POST',
    data: $('#form-update-matkul').serialize(),
    dataType: 'JSON',
    success: function (res) {
      $('#modal-edit').modal('toggle');
      $('#form-update-matkul').trigger('reset');
      if (res.status === 1) {
        matkul_table.ajax.reload();
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

function destroy(kode_matkul) {
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
        url: base_url() + '/matkul/destroy',
        type: 'POST',
        data: { kode_matkul },
        dataType: 'JSON',
        success: function (res) {
          if (res.status === 1) {
            matkul_table.ajax.reload();
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


function check_field_counter() {
  if (field_counter <= 1) {
    $('#btn-remove-input').prop('disabled', true);
  } else {
    $('#btn-remove-input').prop('disabled', false);
  }
}

function add_input_field() {
  if (field_counter <= 100) {
    set_field(field_counter);
    field_counter += 1;
  }
  check_field_counter();
}

function remove_input_field() {
  if (field_counter > 0) {
    const added_field = $('.added-field');
    const last_added_field = added_field[added_field.length - 1];
    last_added_field.parentNode.removeChild(last_added_field);
    field_counter -= 1;
    check_field_counter();
  }
}

function set_field(number) {
  $('#additional-field').append(`
    <div class="row added-field">
      <div class="col-5">
        <div class="form-group">
          <label for="">Kode Mata Kuliah ${number + 1}</label>
          <input type="text" class="form-control" name="kode_matkul[]" placeholder="Kode Mata Kuliah" required>
        </div>
      </div>
      <div class="col-5">
        <div class="form-group">
          <label for="">Nama Mata Kuliah ${number + 1}</label>
          <input type="text" class="form-control" name="nama_matkul[]" placeholder="Mata Kuliah" required>
        </div>
      </div>
      <div class="col-2">
        <div class="form-group">
          <label for="">SKS ${number + 1}</label>
          <input type="text" class="form-control" name="sks[]" placeholder="Jumlah SKS" required>
        </div>
      </div>
    </div>
  `);
}