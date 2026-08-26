// HERO CREATE/UPDATE SCRIPT
function submitHero() {
    const heroId = $('#heroId').val() || '';
    const title = $('#heroTitle').val();
    const subTitle = $('#heroSubTitle').val();
    const description = $('#heroDescription').val();
    const image = $('#heroImage')[0].files[0];

    if (title.length === 0) {
        errorToast("Title is required");
        return;
    }

    const isUpdate = heroId.length > 0;

    showLoader();
    const formData = new FormData();
    formData.append('title', title);
    formData.append('sub_title', subTitle);
    formData.append('description', description);
    if (image) {
        formData.append('image', image);
    }
    if (isUpdate) {
        formData.append('hero_id', heroId);
    }

    $.ajax({
        url: isUpdate ? '/api/heroes/update' : '/api/heroes/store',
        type: isUpdate ? 'PUT' : 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            hideLoader();
            if (result.status === 'success') {
                successToast(result.message);
                setTimeout(function () {
                    window.location.href = '/admin/hero';
                }, 1000);
            } else {
                errorToast(result.message);
            }
        },
        error: function (xhr) {
            hideLoader();
            const status = xhr.status;
            const data = xhr.responseJSON;
            if (status === 422) {
                errorToast(data?.message || "Validation failed. Please check your input.");
            } else if (status === 409) {
                errorToast(data?.message || "You already have a hero. Please update your existing hero.");
            } else if (status === 401) {
                errorToast("Unauthorized. Please login again.");
            } else {
                errorToast(data?.message || data?.error || "Something went wrong");
            }
        }
    });
}

// Load existing hero (one hero per user) and populate the form
function loadHero() {
    $.get('/api/heroes/list?per_page=1', function (result) {
        if (result.status === 'success' && result.data.data && result.data.data.length > 0) {
            const hero = result.data.data[0];
            window.HERO_DATA = hero;
            $('#heroId').val(hero.id);
            $('#heroTitle').val(hero.title || '');
            $('#heroSubTitle').val(hero.sub_title || '');
            $('#heroDescription').val(hero.description || '');
            if (hero.image) {
                $('#heroImagePreview').attr('src', '/admin/assets/img/hero/' + hero.image);
            }
            $('#heroPageTitle').text('Update Hero');
            $('#heroPageSubtitle').text('Edit the hero section shown on the frontend');
            $('#heroSubmitBtn').text('Update Hero');
        }
    }).fail(function (xhr) {
        errorToast(xhr.responseJSON?.message || 'Something went wrong');
    });
}

// Preview image when a file is selected
$(function () {
    loadHero();

    const $heroImageInput = $('#heroImage');
    const $heroImagePreview = $('#heroImagePreview');
    const $heroImageReset = $('#heroImageReset');

    $heroImageInput.on('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg+xml', 'image/webp'];
        if (!allowedTypes.includes(file.type)) {
            errorToast("Please select a valid image (JPG, JPEG, PNG, SVG or WebP).");
            this.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function (event) {
            $heroImagePreview.attr('src', event.target.result);
        };
        reader.readAsDataURL(file);
    });

    $heroImageReset.on('click', function () {
        $heroImageInput.val('');
        const data = window.HERO_DATA || {};
        $heroImagePreview.attr('src', data.image
            ? '/admin/assets/img/hero/' + data.image
            : '/admin/assets/img/avatars/1.png');
    });
});
