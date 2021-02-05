$(document).ajaxComplete(function() {
  $('[data-toggle="tooltip"]').tooltip({
     "html": true,
     "delay": {"show": 300, "hide": 0},
  });
});

$(document).ready(function() {
  $('.modal').on('hidden.bs.modal', function (e) {
    $(this)
       .find("input,textarea,select")
          .val('')
          .end()
       .find("input[type=checkbox], input[type=radio]")
          .prop("checked", "")
          .end();
 });
});

function base_url() {
  const base_url = window.location.origin;
  // const pathArray = window.location.pathname.split('/');
  return base_url;
}

function error_validation(message) {
  toastr.error(`${message}.`);
}

function bobot(grade) {
  let bobot;
  
  switch (grade) {
    case 'A' :
      bobot = 4.00;
      break;
    case 'A-' :
      bobot = 3.75;
      break;
    case 'B+' :
      bobot = 3.50;
      break;
    case 'B' :
      bobot = 3.25;
      break;
    case 'B-' :
      bobot = 3.00;
      break;
    case 'C+' :
      bobot = 2.75;
      break;
    case 'C' :
      bobot = 2.50;
      break;
    case 'C-' :
      bobot = 2.00;
      break;
    case 'D' :
      bobot = 1.00;
      break;
    default :
      bobot = 0.00;
      break;
  }

  return bobot;
}