'use strict'

// Define the 'forms' namespace
if (!('forms' in window)) window['forms'] = [];

$(function() {
    $('body').on('click', '.form-ajax-submit', function (e) {
        e.preventDefault();

        // forms.disableSubmit(e);
        forms.ajaxSubmit(e);
    });
});

/*******************************
 * Methods ('forms' namespace) *
 *******************************/

forms.ajaxSubmit = function (e) {
    let form = $(e.target).closest('form');
    let formId = form.attr('id');
    let formName = form.attr('name');
    let formErrorSpan = form.find('span[data-failure]');
    let failureMessage = formErrorSpan.data('failure');

    // clear potential previously set validation errors
    // forms.clearValidationErrors(form); // For this issue you can assume no validation errors happen.

    // show spinning loader
    $('#envelope-icon').addClass('d-none');
    $('#spinning-loader').removeClass('d-none');

    let formDataForm = $('form#' + formId)[0];
    let formData = new FormData(formDataForm);

    // If the form contains the resume fields (file) we want to append both the resume and motivation files to the FormData
    if ($('input[name="resume"]').length > 0) {
        formData.append('resume', $('input[name="resume"]')[0].files[0]);
    }

    $.ajax('/ajaxforms/' + formName, {
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
    })
        .done(function (response) {
            let formContainer = form.closest('div');

            $(formContainer).html(response.renderedSuccessView);
            forms.enableSubmit(e);
        })
        .fail(function (response) {
            if (response.status === 404) {
                console.log(response.responseJSON.message);

                formErrorSpan.html(failureMessage);
                formErrorSpan.show();
            } else {
                $.each(response.responseJSON.error, function (formFieldName, validationErrorText) {
                    let formField = form.find('[name=' + formFieldName + ']');
                    let formFieldValidationSpan = form.find('span.' + formFieldName);

                    formFieldValidationSpan.html(validationErrorText);
                    formFieldValidationSpan.show();
                    formField.addClass('is-invalid');
                });
            }

            // forms.enableSubmit(e); // Enables the submit button again, not relevant for issue
        });
}
