let field_counter = 1;
let ips, total_bobot = 0, jumlah_sks = 0;
let arr_nilai = [];
let total_sks = [];

$(document).ready(function() {
  check_field_counter();

  $('#nim').keyup(function() {
    let query = $(this).val();

    if (query != "") {
      $.ajax({
        url: base_url() + '/mahasiswa/search_nim',
        type: 'POST',
        data: { query },
        dataType: 'JSON',
        beforeSend: function() {
          $('#result_nim').html(`
            <ul class="list-group">
              <li class="list-group-item">Searching...</li>
            </ul>
          `);
        },
        success: function(res) {
          $('#result_nim').html(res.data);
        },
        error: err => console.log(err)
      });
    } else {
      $('#result_nim').html('');
    }
  });

  $('#form-store-nilai').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: base_url() + '/mahasiswa/nilai/store',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'JSON',
      success: function(res) {
        if (res.status === 1) {
          Swal.fire({
            icon: 'success',
            title: 'Good Job',
            text: 'Data berhasil disimpan',
          }).then(function() {
            window.location.href = base_url() + '/mahasiswa/nilai';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          });
        }
      },
      error: err => console.log(err)
    });
  });
});

function get_nama_mahasiswa(nim) {
  $('.list-group').css('display', 'none');
  $('#nim').val(nim);

  $.ajax({
    url: base_url() + '/mahasiswa/get_nama_mahasiswa_by_nim',
    type: 'POST',
    data: { nim },
    dataType: 'JSON',
    success: function(res) {
      $('#nama').val(res.nama);
    },
    error: err => console.log(err)
  });
}

function search_kode_mk(index) {
  $('#kode_mk_' + index).keyup(function() {
    let query = $(this).val();
    
    if (query != "") {
      $.ajax({
        url: base_url() + '/master/matkul/search_kode_mk',
        type: 'GET',
        data: { index, query },
        dataType: 'JSON',
        beforeSend: function() {
          $('#result_kode_mk_' + index).html(`
            <ul class="list-group">
              <li class="list-group-item">Searching...</li>
            </ul>
          `);
        },
        success: function(res) {
          $('#result_kode_mk_' + index).html(res.data);
        },
        error: err => console.log(err)
      });
    } else {
      $('#result_kode_mk_' + index).html('');
    }
  });
}

function get_nama_matkul(index, kode_mk) {
  $('.list-group').css('display', 'none');
  $('#kode_mk_' + index).val(kode_mk);

  $.ajax({
    url: base_url() + '/master/matkul/get_nama_matkul_by_kode_mk',
    type: 'GET',
    data: { kode_mk },
    dataType: 'JSON',
    success: function(res) {
      $('#nama_mk_' + index).val(res.nama_mk);
      $('#sks_' + index).val(res.sks);
    },
    error: err => console.log(err)
  });
}


function calculate_ips(index, value) {
  const sks = $('#sks_' + index).val();
  if (typeof arr_nilai[index - 1] === 'undefined') {
    arr_nilai.push(bobot(value) * sks);
  } else {
    arr_nilai[index - 1 ] = bobot(value) * sks;
  }

  if (typeof total_sks[index - 1] === 'undefined') {
    total_sks.push(sks);
  } else {
    total_sks[index - 1] = sks;
  }
  jumlah_sks = total_sks
                .map(Number)
                .reduce((acc, curr) => acc + curr);
  total_bobot = arr_nilai.reduce((acc, curr) => acc + curr);
  ips = total_bobot / jumlah_sks;
  $('#total_sks').html(jumlah_sks);
  $('#total_bobot').html(total_bobot);
  $('#ips').html(ips);
}

function add_field() {
  if (field_counter <= 100) {
    set_field(field_counter);
    field_counter += 1
  }
  check_field_counter();
}

function remove_field() {
  if (field_counter > 0) {
    const added_field = $('.added-field');
    const last_added = added_field[added_field.length - 1];
    last_added.parentNode.removeChild(last_added);
    field_counter -= 1;
    check_field_counter();
  }
  const last_arr_nilai = arr_nilai[arr_nilai.length - 1];
  const last_arr_sks = total_sks[total_sks.length - 1];
  total_bobot = total_bobot -= last_arr_nilai;
  jumlah_sks = jumlah_sks -= last_arr_sks;
  ips = total_bobot / jumlah_sks;
  arr_nilai.pop();
  total_sks.pop();
  $('#total_sks').html(jumlah_sks);
  $('#total_bobot').html(total_bobot);
  $('#ips').html(ips);
}

function check_field_counter() {
  if (field_counter <= 1) {
    $('#btn-remove-input').prop('disabled', true);
  } else {
    $('#btn-remove-input').prop('disabled', false);
  }
}

function set_field(counter) {
  let html = `
    <div class="row added-field">
      <div class="col-md-3">
        <div class="form-group">
          <label for="exampleInputEmail1">Kode Mata Kuliah ${counter + 1}</label>
          <input type="text" class="form-control" name="kode_mk[]" id="kode_mk_${counter + 1}" autocomplete="off" onkeyup="search_kode_mk(${counter + 1})" placeholder="Kode Mata Kuliah">
          <div id="result_kode_mk_${counter + 1}"></div>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">            
          <label for="exampleInputEmail1">Nama Mata Kuliah ${counter + 1}</label>
          <input type="text" class="form-control" name="nama_mk[]" id="nama_mk_${counter + 1}" placeholder="Nama Mata Kuliah" readonly>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">            
          <label for="exampleInputEmail1">SKS ${counter + 1}</label>
          <input type="text" class="form-control" name="sks[]" id="sks_${counter + 1}" placeholder="SKS" readonly>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="exampleInputEmail1">Grade</label>
          <select name="grade[]" class="form-control" onchange="calculate_ips(${counter + 1}, this.value)">
            <option selected disabled>-- Pilih Nilai --</option>
            <option value="A">A</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B">B</option>
            <option value="B-">B-</option>
            <option value="C+">C+</option>
            <option value="C">C</option>
            <option value="C-">C-</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
        </div>
      </div>
    </div>
  `;
  $('.field-nilai').append(html);
}