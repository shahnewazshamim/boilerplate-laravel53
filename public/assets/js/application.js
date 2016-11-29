/***********************************************************************************************************************
 * Custom function definations
 **********************************************************************************************************************/

/* Change Profile image */
function changeImage() {
    $('.change-pro-pic').hide();
    $('#btn-change-pro-pic').click(function () {
        $('.change-pro-pic').slideToggle("slow", function () {
            var link = $("#btn-change-pro-pic");
            if ($(this).is(":visible")) {
                link.text("No Thanks!");
                $('#profile-image').attr("disabled", false);
                $('#current-profile-image').hide();
            } else {
                link.text("Change Image");
                $('#profile-image').attr("disabled", true)
                $('#current-profile-image').show();
            }
        });
    });
}


/***********************************************************************************************************************
 * jQuery Document Ready for all pages...
 **********************************************************************************************************************/

$(document).ready(function () {

    $('#update_password').change(function () {

        $("input:password").removeAttr('disabled');
    });

    /*******************************************************************************************************************
     * Form validation and Change Image for all form of this project
     ******************************************************************************************************************/

    $('form').each(function () {
        var form_id = $(this).attr('id');
        switch (form_id) {
            case 'form-patient_profile':
            case 'form-doctor_profile':
            case 'form-admin_profile':
                changeImage();
                break;
            default:
                break;
        }
        $('#' + form_id).validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-tooltip-error'
                }
            }
        });
    });


    /*******************************************************************************************************************
     * Edit, Remove, Restore and Delete alert
     ******************************************************************************************************************/

    /* Edit alert */
    $('.edit').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "You are going to edit this record!",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-info",
            confirmButtonText: "Yes, edit it!",
            closeOnConfirm: false
        }, function () {
            window.location.href = url;
        });
    });

    /* Remove alert */
    $('.remove').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Data will move to trash list!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Yes, remove it!",
            closeOnConfirm: false
        }, function () {
            window.location.href = url;
        });
    });

    /* Restore alert */
    $('.restore').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Restore data to original location!",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Yes, restore it!",
            closeOnConfirm: false
        }, function () {
            window.location.href = url;
        });
    });

    /* Delete alert */
    $('.delete').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            window.location.href = url;
        });
    });


    /*******************************************************************************************************************
     * Toggle All Checkbox, Alert for Multiple Remove, Restore and Delete
     ******************************************************************************************************************/

    /* Select all toggle */
    $(".check-all").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    /* Multiple remove alert */
    $("#remove").click(function (e) {
        e.preventDefault();
        var ids = [];
        $('input:checkbox:checked').each(function () {
            ids.push($(this).val());
        });
        ids = jQuery.grep(ids, function (value) {
            return value != 'on';
        });
        if (ids.length > 0) {
            var url = $(this).attr('data-url');
            swal({
                title: "Are you sure?",
                text: "Data will move to trash list!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Yes, remove it!",
                closeOnConfirm: false
            }, function () {
                window.location.href = url + '/' + ids;
            });
        } else {
            swal({
                title: "Oops!",
                text: "Please select at least one row to remove!",
                type: "info",
                showCancelButton: false,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });
        }

    });

    /* Multiple restore alert */
    $("#restore").click(function (e) {
        e.preventDefault();
        var ids = [];
        $('input:checkbox:checked').each(function () {
            ids.push($(this).val());
        });
        ids = jQuery.grep(ids, function (value) {
            return value != 'on';
        });
        if (ids.length > 0) {
            var url = $(this).attr('data-url');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Yes, restore it!",
                closeOnConfirm: false
            }, function () {
                window.location.href = url + '/' + ids;
            });
        } else {
            swal({
                title: "Oops!",
                text: "Please select at least one row to restore!",
                type: "info",
                showCancelButton: false,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });
        }

    });

    /* Multiple delete alert */
    $("#delete").click(function (e) {
        e.preventDefault();
        var ids = [];
        $('input:checkbox:checked').each(function () {
            ids.push($(this).val());
        });
        ids = jQuery.grep(ids, function (value) {
            return value != 'on';
        });
        if (ids.length > 0) {
            var url = $(this).attr('data-url');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                window.location.href = url + '/' + ids;
            });
        } else {
            swal({
                title: "Oops!",
                text: "Please select at least one row to delete!",
                type: "info",
                showCancelButton: false,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });
        }

    });


    /*******************************************************************************************************************
     * AJAX Get City, State
     ******************************************************************************************************************/

    /* Render city list for state form DDL */
    $('#state-country_id').on('change', function (e) {
        var country_id = e.target.value;
        var url = $(this).attr("data-url") + '/' + country_id;
        render_ddl_ajax_request('state-city_id', url);
    });

    /* Render city list for state form DDL */
    $('#chamber-country_id').on('change', function (e) {
        var country_id = e.target.value;
        var url = $(this).attr("data-url") + '/' + country_id;
        render_ddl_ajax_request('chamber-city_id', url);
    });

    /* Render state list for chamber form DDL */
    $('#chamber-city_id').on('change', function (e) {
        var city_id = e.target.value;
        var url = $(this).attr("data-url") + '/' + city_id;
        render_ddl_ajax_request('chamber-state_id', url);
    });

    var render_ddl_ajax_request = function (selector, url) {
        $.ajax({
            url: url,
            method: "GET",
            dataType: "json",
            success: function (data) {
                $('#' + selector).html('<option></option>');
                $.each(data, function (index, object) {
                    $('#' + selector).append('<option value="' + object.id + '">' + object.name + '</option>');
                });
            },
            error: function (xhr) {
                swal({
                    title: "An error occurred!",
                    text: "Error: " + xhr.status + " " + xhr.statusText,
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Close",
                    closeOnConfirm: true
                });
            }

        });
    };

    /* Render state list for chamber form DDL */
    $('.show').on('click', function (e) {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            method: "GET",
            dataType: "text",
            success: function (data) {
                $('#show-modal').html(data);
            },
            error: function (xhr) {
                swal({
                    title: "An error occurred!",
                    text: "Error: " + xhr.status + " " + xhr.statusText,
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Close",
                    closeOnConfirm: true
                });
            }

        });

    });


});
