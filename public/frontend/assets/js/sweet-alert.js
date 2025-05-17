   /*---------------------------------------------------------------------
        Sweet alert
        -----------------------------------------------------------------------*/
        $('[data-extra-toggle="delete"]').on('click', function(e) {
          const closestElem = $(this).attr('data-closest-elem')
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-primary btn-lg',
                  cancelButton: 'btn btn-outline-primary btn-lg ms-2'
              },
              buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  showClass: {
                      popup: 'animate__animated animate__zoomIn'
                  },
                  hideClass: {
                      popup: 'animate__animated animate__zoomOut'
                  }
              })
              .then((willDelete) => {
                  if (willDelete.isConfirmed) {
                      swalWithBootstrapButtons.fire({
                          title: 'Deleted!',
                          text: "Your Request has been deleted.",
                          icon: 'success',
                          showClass: {
                              popup: 'animate__animated animate__zoomIn'
                          },
                          hideClass: {
                              popup: 'animate__animated animate__zoomOut'
                          }
                      }).then(() => {
                          if (closestElem == '.card') {
                              $(this).closest(closestElem).parent().remove()
                          } else {
                              $(this).closest(closestElem).remove()
                          }
                      })
                  } else {
                      swalWithBootstrapButtons.fire({
                          title: "Your Request is safe!",
                          showClass: {
                              popup: 'animate__animated animate__zoomIn'
                          },
                          hideClass: {
                              popup: 'animate__animated animate__zoomOut'
                          }
                      });
                  }
              });
      })


      $('#warning').on('click', function() {
          Swal.fire({
              icon: 'warning',
              title: 'Changes are not saved',
              showConfirmButton: false,

          })
      });

      $('#confirmation').on('click', function() {
          Swal.fire({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      Swal.fire("Poof! Your imaginary file has been deleted!", {
                          icon: "success",
                      });
                  } else {
                      Swal.fire("Your imaginary file is safe!");
                  }
              });
      });