$(function() {
    $('.delete').click(function() {

          Swal.fire({
            title: 'Czy na pewno chcesz usunąć rekord?',
            text: "Nie można tego cofnąć",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak, usuń!',
            cancelButtonText: 'Nie, zachowaj!',
            reverseButtons: false
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id")
                  })
                    .done(function(data) {
                        Swal.fire(
                            'Usunięto!',
                            '',
                            'success'
                          )
                      window.location.reload();
                    })
                    .fail(function(data) {
                        Swal.fire(
                            'Coś poszło nie tak',
                            data.responseJSON.message,
                            'error'
                        )
                    });

            }
          })
    });
});
