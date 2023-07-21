// alert Delete
$(document).on('click', '#btn-delete', function (e) {
  e.preventDefault();
  var link = $(this).attr('href');
  Swal.fire({
    title: 'Do You Want To delete This Data?',
    text: 'Confirm Delete data ',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = link;
    }
  });
});
// alert status
$(document).on('click', '#btn-status', function (e) {
  e.preventDefault();
  var status = $(this).attr('data-status');
  Swal.fire({
    title: `Do you want to ${status} this employee?`,
    text: `Konfirmasi ${status} Employee`,
    icon: 'warning',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: `Yes, ${status} it!`,
    denyButtonText: `Don't save`,
  }).then((result) => {
    if (result.isConfirmed) {
      $('#form-status').submit();
    } else if (result.isDenied) {
      Swal.fire('Changes are not saved', '', 'info');
    }
  });
});
// edit alert
$(document).ready(function () {
  // Fungsi yang akan dijalankan saat tombol delete diklik
  $(document).on('click', '#btn-update', function (e) {
    e.preventDefault();
    // Mengambil link dari atribut action pada form
    Swal.fire({
      title: 'Do you want to save the changes?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Save',
      denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $('#form-edit').submit();
      } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info');
      }
    });
  });
});
