$(document).ready(function () {
    $('#live_search').keyup(function () {
        var name = $('#live_search').val();

        // Check if the input is empty
        if (name === "") {
            $('#test').html(""); // Clear the results
        } else {
            // If input is not empty, make the AJAX request
            $.post("suggestion.php", {suggestion: name}, function (data) {
                $('#test').html(data);
            });
        }
    });
});
