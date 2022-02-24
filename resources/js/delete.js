$(function() {
    $('.delete').click(function() {

          Swal.fire({
            title: confirmDeleteMsg,
            text: confirmDeleteDescMsg,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: confirmDeleteButton,
            cancelButtonText: cancelDeleteButton,
            reverseButtons: false
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id")
                  })
                    .done(function(data) {
                        Swal.fire(
                            deletedMsg,
                            '',
                            'success'
                          )
                      window.location.reload();
                    })
                    .fail(function(data) {
                        Swal.fire(
                            somethingWrongMsg,
                            data.responseJSON.message,
                            'error'
                        )
                    });

            }
          })
    });
});
