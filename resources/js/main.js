$(document).ready(function() {
    $(document).foundation();
    $('#search').focus();

    $('#team_id').change(function(event) {
        var teamId = $(this).val();
        $('#manager_id').html('');

        $.get('/vote/get-manager/' + teamId, function(data){
            $.each(data, function(index, manager) {
                $('#manager_id').append('<option value="' + manager.id + '">' + manager.name + '</option>');
            });
        });
    });
});