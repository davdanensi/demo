$(document).ready(function () {
    // save comment to database
    $(document).on('click', '#submit_btn', function () {
        var name = $('#name').val();
        var comment = $('#comment').val();

        var favorite = [];
        $.each($("input[name='vehicle[]']:checked"), function () {
            favorite.push($(this).val());
        });
        console.log(favorite);
        favorite = favorite.join(",");
        console.log(favorite);

//        return false;

        console.log(name);
        console.log(comment);
        $.ajax({
            url: 'server.php',
            type: 'POST',
            data: {
                'save': 1,
                'name': name,
                'comment': comment,
                'favorite': favorite,
            },
            success: function (response) {
                $('#name').val('');
                $('#comment').val('');
                //$('#display_area').append(response);
                alert(response);
                window.location.href = 'http://localhost/nensi/ajax/';
            }
        });
    });
    // delete from database
    $(document).on('click', '.delete', function () {
        var id = $(this).data('id');
        $clicked_btn = $(this);
        $.ajax({
            url: 'server.php',
            type: 'GET',
            data: {
                'delete': 1,
                'id': id,
            },
            success: function (response) {
                // remove the deleted comment
                $clicked_btn.parent().remove();
                $('#name').val('');
                $('#comment').val('');
            }
        });
    });
    var edit_id;
    var $edit_comment;
    $(document).on('click', '.edit', function () {
        edit_id = $(this).data('id');

        $.ajax({
            url: 'server.php',
            type: 'POST',
            data: {
                'get': 1,
                'id': edit_id
            },
            datatype: 'JSON',
            success: function (response) {
//                console.log(JSON.parse(response));
                var res = JSON.parse(response);
                var vehicle = res.favorite.split(',');
                console.log(vehicle);

                $.each(vehicle, function (index, value) {
                    console.log(value);
//                    alert(index + ": " + value);
                    $("#"+value).prop('checked', true);
                });

                $('#name').val(res.name);
                $('#comment').val(res.comment);
                $('#submit_btn').show();
                $('#update_btn').hide();
//                $edit_comment.replaceWith(response);
            }
        });

//        $edit_comment = $(this).parent();
//        // grab the comment to be editted
//        var name = $(this).siblings('.display_name').text();
//        var comment = $(this).siblings('.comment_text').text();
//        // place comment in form
//        $('#name').val(name);
//        $('#comment').val(comment);
//        $('#submit_btn').hide();
//        $('#update_btn').show();
    });
    $(document).on('click', '#update_btn', function () {
        var id = edit_id;
        var name = $('#name').val();
        var comment = $('#comment').val();
        $.ajax({
            url: 'server.php',
            type: 'POST',
            data: {
                'update': 1,
                'id': id,
                'name': name,
                'comment': comment,
            },
            success: function (response) {
                $('#name').val('');
                $('#comment').val('');
                $('#submit_btn').show();
                $('#update_btn').hide();
                $edit_comment.replaceWith(response);
            }
        });
    });
});