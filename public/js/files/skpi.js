let skpi_table;

$(document).ready(function () {
  show_records();

  $("#form-store-skpi").on("submit", function (e) {
    e.preventDefault();
    let form = $("form")[0];
    let formData = new FormData(form);

    formData.append("file", $("input[type=file]")[0].files[0]);
    
    $.ajax({
      url: "../skpi/store",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnSave").html("Processing...");
      },
      success: function (res) {
        if (res.status) {
          Swal.fire({
            icon: "success",
            title: "Good Job",
            text: "Data berhasil disimpan",
          }).then(function () {
            window.location.href = "../skpi";
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
          });
        }
      },
      complete: function () {
        $("#btnSave").html('<i class="fas fa-save"></i> Simpan');
      },
      error: (err) => {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        });
      },
    });
  });

  $(document).on('click', '.btn-edit', function() {
    $('#modalUpdate').modal('show');
    const id = $(this).data('id');
    const penyelenggara = $(this).data('penyelenggara');
    const tanggal = $(this).data('tanggal');
    const judul = $(this).data('judul');

    $('input[name="judul_kegiatan"]').val(judul);
    $('input[name="nama_penyelenggara"]').val(penyelenggara);
    $('input[name="tanggal_sertif"]').val(tanggal);
    $('input[name="id_skpi"]').val(id);
  });

  $("#form-update-skpi").on("submit", function (e) {
    e.preventDefault();
    let form = $("form")[0];
    let formData = new FormData(form);

    formData.append("file", $("input[type=file]")[0].files[0]);
    
    $.ajax({
      url: "skpi/update",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnSave").html("Processing...");
      },
      success: function (res) {
        if (res.status) {
          $('#modalUpdate').modal('toggle');
          skpi_table.ajax.reload();
          Swal.fire({
            icon: "success",
            title: "Good Job",
            text: "Data berhasil diperbaharui",
          })
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
          });
        }
      },
      complete: function () {
        $("#btnSave").html('<i class="fas fa-save"></i> Simpan');
      },
      error: (err) => {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        });
      },
    });
  });
});

function show_records() {
  skpi_table = $('#data-table').DataTable({
    processing: true,
    serverside: true,
    language: {
      emptyTable: "Tidak ada data yang tersedia pada tabel",
      processing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw text-primary"></i>'
    },
    responsive: true,
    order: [],
    ajax: {
      url: './skpi/get_records',
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

function destroy(id) {
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
        url: './skpi/destroy',
        type: 'POST',
        data: { id },
        dataType: 'JSON',
        success: function (res) {
          if (res.status) {
            skpi_table.ajax.reload();
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
