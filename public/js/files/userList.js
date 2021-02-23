const swal = $('.swal').data('swal');

// $(document).ready(function () {

//     $('#form-delete-data').on('submit', function (e) {
//         e.preventDefault();

//         Swal.fire({
//             title: 'Apakah kamu yakin ?',
//             text: "Data ini tidak dapat dikembalikan!",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'Hapus',
//             cancelButtonText: 'Batal'
//         }).then((result) => {
//             if (result.value) {
//                 Swal.fire(
//                     'Deleted!',
//                     'Your file has been deleted.',
//                     'success'
//                 )
//             }
//         })
//     })
// });