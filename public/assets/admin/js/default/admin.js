'use strict'

const csrf = $('meta[name=csrf]').attr('content');

var notyf = new Notyf();

$(document).ready(function() {
    $('.select_2').select2();
});

tinymce.init({
    selector: 'textarea#editor',
    plugins: 'autolink link image lists table',
    menubar: 'file edit view insert format tools table',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist | link image table',
    height: 400,
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
    setup: function(editor) {
        editor.on('change', function() {
            editor.save();
        });
    },
    file_picker_callback: function(callback, value, meta) {
        // Create input element and trigger click
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.onchange = function() {
            var file = this.files[0];

            // You can add your image upload logic here
            // For example, using FileReader to preview:
            var reader = new FileReader();
            reader.onload = function() {
                callback(reader.result, {
                    alt: file.name
                });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    }
});

$(function () {
    $('.delete-item').on('click', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: csrf
                    },
                    success: function(data) {
                        if(data.status == 'success') {
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        const errorMessage = xhr.responseJSON?.message || 'An unexpected error occurred!';
                        notyf.error(errorMessage);
                    }
                });
            }
        });
    })

})

