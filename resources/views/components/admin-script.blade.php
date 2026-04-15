
<!-- Libs JS -->
<script src="{{ asset('assets/admin/js/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="{{ asset('assets/admin/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/iziToast.min.js') }}"></script>


<!-- Tabler Core -->
<script src="{{ asset('assets/admin/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('assets/admin/js/demo.min.js') }}" defer></script>
<!-- TinyMce  -->
<script src="{{ asset('assets/frontend/js/tinymce/tinymce.min.js') }}"></script>

<!-- Admin JS -->
<script src="{{ asset('assets/admin/js/default/admin.js') }}"></script>

<script>
    $(document).ready(function() {
        // CSRF Token Setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            }
        });

        $(document).on('submit', '.ajax-form', function(e) {
            e.preventDefault();
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalBtnText = submitBtn.html();
            const formData = new FormData(this);

            // Clear previous errors
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.small.text-danger').remove();

            submitBtn.prop('disabled', true).html('<i class="ti ti-loader-2 icon-spin me-1"></i> Processing...');

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'Accept': 'application/json'
                },
                success: function(response) {
                    if (response.status === 'success' || response.success) {
                        iziToast.show({
                            message: response.message || 'Action completed successfully',
                            color: 'green',
                            position: 'topRight'
                        });
                        
                        // Close modal if exists
                        const modal = form.closest('.modal');
                        if (modal.length) {
                            const modalInstance = bootstrap.Modal.getInstance(modal[0]);
                            if (modalInstance) modalInstance.hide();
                        }

                        // Success redirect or reload
                        setTimeout(() => {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                window.location.reload();
                            }
                        }, 1000);
                    }
                },
                error: function(xhr) {
                    submitBtn.prop('disabled', false).html(originalBtnText);
                    
                    if (xhr.status === 422) {
                        // Validation error - NEVER show toast as per user request
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            // Handle array fields if any (e.g. data.name -> [name="data[name]"])
                            let input = form.find(`[name="${field}"]`);
                            if (!input.length) {
                                input = form.find(`[name="${field.replace(/\./g, '[') + ']'}"]`);
                            }
                            
                            const inputGroup = input.closest('.input-group');
                            input.addClass('is-invalid');
                            
                            const errorHtml = `<div class="small text-danger mt-1">${messages[0]}</div>`;
                            if (inputGroup.length) {
                                inputGroup.after(errorHtml);
                            } else {
                                input.after(errorHtml);
                            }
                        });
                    } else {
                        // System or other error
                        const errorMessage = (xhr.responseJSON && xhr.responseJSON.message) 
                                           ? xhr.responseJSON.message 
                                           : 'Something went wrong. Please try again.';
                        
                        iziToast.show({
                            message: errorMessage,
                            color: 'red',
                            position: 'topRight'
                        });
                    }
                }
            });
        });
    });
</script>


