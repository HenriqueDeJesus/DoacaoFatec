$(document).ready(function() {
    $('#searchInput').keyup(function() {
        var query = $(this).val();

        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: {query: query},
            success: function(response) {
                $('#searchResults').html(response);
            }
        });
    });
});
