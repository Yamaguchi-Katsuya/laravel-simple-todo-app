$(document).on('click', '.del-btn', (event) => {
    const id = $(event.currentTarget).data('id');
    const type = $(event.currentTarget).data('type');
    if(!window.confirm(`Are you sure you want to delete id: ${id}?`)) {
        return;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `/${type}/${id}`,
        type: 'POST',
        data: {
            '_method': 'DELETE'
        }
    })
    .done((data) => {
        location.reload();
    })
    .fail((data) => {
        alert('Failed to delete.');
    });
});
