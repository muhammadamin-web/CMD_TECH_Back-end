$('#tags-filter-form').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        url: form.attr('action'),
        type: 'GET',
        data: form.serialize(),
        success: function(data) {
            // Assuming you're sending back the filtered posts as HTML
            $('#filtered-posts-container').html(data);
        }
    });
});
