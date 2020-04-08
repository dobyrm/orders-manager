/**
 * Custom method for ajax
 *
 * @param url
 * @param method
 * @param data
 * @param onSuccess
 * @param onFail
 */
function doAjaxCall(url, method, data, onSuccess, onFail) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/' + url,
        method: method,
        data: data,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.messages !== undefined) {
                $.each(response.messages, function (index, value) {
                    toastr.success(value);
                });
            }

            onSuccess(response);
        },
        error: function (response) {
            if (response.responseJSON.messages !== undefined) {
                let errors = response.responseJSON.messages;
                $.each(errors, function (index, value) {
                    toastr.error(value);
                    $('[name$="['+index+']"]').css('border-color', 'red');
                    setTimeout(function () {$('[name$="['+index+']"]').css('border-color', '#d2d6de')}, 4000)
                });
            }

            onFail(response);
        }
    });
}
