/*
    Project: Olshop
    Author: Aezo27
    Start: 08 Juni 2020
    https://aezo27.github.io/
*/

$(document).ready(function ($) {
 /*//////////////////////////////////////////////////////////////////
 [ Custom File Input ]*/
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

/*//////////////////////////////////////////////////////////////////
[ Delete Confirmation ]*/
    $(document).on("submit", '#delOrd', function (e) {
        var form = this;
        e.preventDefault();
        swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan dihapus secara permanen !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#d47e00',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                form.submit();
            } else {
                // handle cancel
            }
        })
    });
    $(document).on("submit", '#delProd', function (e) {
        var form = this;
        e.preventDefault();
        swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan dihapus secara permanen !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#d47e00',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                form.submit();
            } else {
                // handle cancel
            }
        })
    });


/*//////////////////////////////////////////////////////////////////
[ Data Table ]*/
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();

/*//////////////////////////////////////////////////////////////////
[ Add Tags ]*/
    // add tags
    $(document).on('click', '#add', function (e) {
        e.preventDefault();
        var tag = $(this).parent().parent().find('#addTag').val();
        var form = $(this).parent().parent().find('#addTag');
        if (tag != '') {
            var html = '';
            html += '<span style="cursor:pointer; margin: 0 2px 3px 2px; text-transform: capitalize;" id="tagItem" class="btn btn-success">' + tag + '</span>';
            html += '<input tag="' + tag.replace(/ /g, "_") + '" type="hidden" value="' + tag + '" name="tag[]">';
            $('#tag').append(html);
            form.val('');
        }
    });

    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            if ($("#add:focus")) {
                $("#add").trigger("click");
            }
            return false;
        }
    });


    // remove tags
    $(document).on('click', '#tagItem', function (e) {
        e.preventDefault();
        var tagKey = $(this).text().replace(/ /g, "_");
        tag = $(this).parent().find('input[tag='+tagKey+']');
        if (tag != null) {
            $(this).remove();
            tag.remove()
        }
    });

    // remove old tags
    $(document).on('click', '#oldTag', function (e) {
        e.preventDefault();
        var tagKey = $(this).text().replace(/ /g, "_");
        tag = $(this).parent().find('input[tag=' + tagKey + ']');
        if (tag != null) {
            $(this).remove();
            tag.remove();
        }
    });


/*//////////////////////////////////////////////////////////////////
[ Upload Image ]*/
    $('#file1').change(function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#file1').parent().css('background-image', 'url("' + reader.result + '")');
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
        }
    });
    $('#file2').change(function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#file2').parent().css('background-image', 'url("' + reader.result + '")');
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
        }
    });
    $('#file3').change(function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#file3').parent().css('background-image', 'url("' + reader.result + '")');
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
        }
    });
    $('#file4').change(function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#file4').parent().css('background-image', 'url("' + reader.result + '")');
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
        }
    });
});
