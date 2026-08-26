// HERO LIST SCRIPT
function loadHeroList() {
    $.get('/api/heroes/list?per_page=1', function (result) {
        if (result.status === 'success' && result.data.data && result.data.data.length > 0) {
            const hero = result.data.data[0];
            window.HERO_DATA = hero;
            $('#heroListActionBtn').text('Update Hero');

            const image = hero.image ? '/admin/assets/img/hero/' + hero.image : '/admin/assets/img/avatars/1.png';

            $('#heroListContent').html(
                '<div class="card mb-6">' +
                '  <div class="card-body">' +
                '    <div class="d-flex flex-column flex-md-row align-items-md-center gap-6">' +
                '      <div class="flex-shrink-0">' +
                '        <img src="' + image + '" alt="Hero image" class="rounded w-100" style="max-width: 260px; max-height: 180px; object-fit: cover;" />' +
                '      </div>' +
                '      <div class="flex-grow-1">' +
                '        <h5 class="mb-2">' + (hero.title || '') + '</h5>' +
                '        <p class="mb-2 fw-medium text-body">' + (hero.sub_title || '') + '</p>' +
                '        <p class="mb-4 text-body-secondary">' + (hero.description || '') + '</p>' +
                '        <div class="d-flex flex-wrap gap-4">' +
                '          <a href="/admin/hero/update" class="btn btn-primary">Update Hero</a>' +
                '          <button type="button" class="btn btn-label-danger" onclick="deleteHero(' + hero.id + ')">Delete</button>' +
                '        </div>' +
                '      </div>' +
                '    </div>' +
                '  </div>' +
                '</div>'
            );
        } else {
            $('#heroListActionBtn').text('Create Hero');
            $('#heroListContent').html(
                '<div class="card">' +
                '  <div class="card-body text-center py-12">' +
                '    <h5 class="mb-1">No hero created yet</h5>' +
                '    <p class="mb-4 text-body-secondary">Create your hero section to show it on the frontend.</p>' +
                '    <a href="/admin/hero/create" class="btn btn-primary">Create Hero</a>' +
                '  </div>' +
                '</div>'
            );
        }
    }).fail(function (xhr) {
        errorToast(xhr.responseJSON?.message || 'Something went wrong');
    });
}

function deleteHero(heroId) {
    if (!confirm('Are you sure you want to delete this hero?')) {
        return;
    }
    showLoader();
    $.ajax({
        url: '/api/heroes/destroy',
        type: 'DELETE',
        data: { hero_id: heroId },
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
            const data = xhr.responseJSON;
            errorToast(data?.message || data?.error || 'Something went wrong');
        }
    });
}

$(function () {
    loadHeroList();
});
