let mahasiswa_table;

$(document).ready(function () {
  show_records();

  $('#form-store-mahasiswa').on('submit', function (e) {
    e.preventDefault();

    form_validation();

  });

  $('#form-update-mahasiswa').on('submit', function (e) {
    e.preventDefault();

    const nim = $('input[name="nim"]').val();
    const nama = $('input[name="nama"]').val();
    const tempat_lahir = $('input[name="tempat_lahir"]').val();
    const tanggal_lahir = $('input[name="tanggal_lahir"]').val();
    const email = $('input[name="email"]').val();
    const jenis_kelamin = $('select[name="jenis_kelamin"]').val();
    const jurusan = $('select[name="jurusan"]').val();

    if (nim === "") {
      error_validation('N.I.M harus diisi');
      return false;
    }

    if (nama === "") {
      error_validation('Nama harus diisi');
      return false;
    }

    if (tempat_lahir === "") {
      error_validation('Tempat lahir harus diisi');
      return false;
    }

    if (tanggal_lahir === "") {
      error_validation('Tanggal lahir harus diisi');
      return false;
    }

    if (email === "") {
      error_validation('Email harus diisi');
      return false;
    }

    if (jenis_kelamin === "" || jenis_kelamin === null) {
      error_validation('Jenis kelamin harus dipilih');
      return false;
    }

    if (jurusan === "" || jurusan === null) {
      error_validation('Jurusan harus dipilih');
      return false;
    }

    update();
  });
});

function show_records() {
  mahasiswa_table = $('#data-table').DataTable({
    processing: true,
    serverside: true,
    language: {
      emptyTable: "Tidak ada data yang tersedia pada tabel",
      processing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw text-primary"></i>'
    },
    responsive: true,
    order: [],
    ajax: {
      url: './mahasiswa/get_records',
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

function form_validation() {
  const nim = $('input[name="nim"]').val();
  const nama = $('input[name="nama"]').val();
  const tempat_lahir = $('input[name="tempat_lahir"]').val();
  const tanggal_lahir = $('input[name="tanggal_lahir"]').val();
  const email = $('input[name="email"]').val();
  const jenis_kelamin = $('select[name="jenis_kelamin"]').val();
  const jurusan = $('select[name="jurusan"]').val();

  if (nim === "") {
    error_validation('N.I.M harus diisi');
    return false;
  }

  if (nama === "") {
    error_validation('Nama harus diisi');
    return false;
  }

  if (tempat_lahir === "") {
    error_validation('Tempat lahir harus diisi');
    return false;
  }

  if (tanggal_lahir === "") {
    error_validation('Tanggal lahir harus diisi');
    return false;
  }

  if (email === "") {
    error_validation('Email harus diisi');
    return false;
  }

  if (jenis_kelamin === "" || jenis_kelamin === null) {
    error_validation('Jenis kelamin harus dipilih');
    return false;
  }

  if (jurusan === "" || jurusan === null) {
    error_validation('Jurusan harus dipilih');
    return false;
  }

  store();
}

function store() {
  $.ajax({
    url: './store',
    type: 'POST',
    data: $('#form-store-mahasiswa').serialize(),
    dataType: 'JSON',
    success: function (res) {
      if (res.status === 1) {
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data berhasil disimpan',
        }).then(function () {
          window.location.href = '../mahasiswa';
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        });
      }
    },
    error: function (err) {
      console.error(err.responseText);
    }
  });
}

function update() {
  $.ajax({
    url: '../update',
    type: 'POST',
    data: $('#form-update-mahasiswa').serialize(),
    dataType: 'JSON',
    success: function (res) {
      if (res.status === 1) {
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data berhasil disimpan',
        }).then(function () {
          window.location.href = '../../mahasiswa';
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        });
      }
    },
    error: function (err) {
      console.error(err.responseText);
    }
  });
}

function destroy(nim) {
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
      url: './mahasiswa/destroy',
      type: 'POST',
      data: { nim },
      dataType: 'JSON',
      success: function (res) {
        if (res.status === 1) {
          mahasiswa_table.ajax.reload();
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