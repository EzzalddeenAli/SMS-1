$(document).ready(function () {
    $(".edit-btn").click(function () {
        $.get('/admin/teachers/1', function (data) {
            console.log(data);
        });
        $('#edit-modal').modal('show');
    });
});