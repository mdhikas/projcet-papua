$(document).ajaxComplete(function() {
  $('[data-toggle="tooltip"]').tooltip({
     "html": true,
     "delay": {"show": 300, "hide": 0},
  });
});

function error_validation(message) {
  toastr.error(`${message}.`);
}