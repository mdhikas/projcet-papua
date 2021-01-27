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
  const pathArray = window.location.pathname.split('/');
  return base_url + '/' + pathArray[1];
}

function error_validation(message) {
  toastr.error(`${message}.`);
}