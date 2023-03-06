$(document).ajaxStop(function() {
    //scroll to alert box if not a popup
    if ($('body.modal-open').length === 0) {
        scrollToSection('#formMsgBox', 70);
    }
});

/* Here we handel form submition */
$('form[class=theForm]').on('submit', function(e) {
    e.preventDefault();
    var btn = $(this).find('.submitBtn');
    btn.text('Loading...');
    var form = $(this);

    var url = form.attr('action');

    var data = new FormData();

    data.append('data', form.serialize());
    if ($('.formAttachment').length) {
        data.append('file', $('.formAttachment')[0].files[0]);
    }

    //remove alert message before showing the new one
    form.find('.alert').remove();

    $.ajax({

        type: 'POST',
        url: url,
        data: data,
        contentType: false,
        processData: false,
        success: function(response) {

            console.log(response.data);
            // window.google_trackConversion({
            //     google_conversion_id: 1111111,
            //     google_conversion_language: "en",
            //     google_conversion_format: "3",
            //     google_conversion_color: "ffffff",
            //     google_conversion_label: "11111",
            //     google_remarketing_only: false,
            // });

            if (response.status == 200) {

                //mail was sent
                form.prepend(msgBox(response.data, 'success'));

                ///clear inputs
                form.find('input, textarea')
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');
                //added google conversion code 				

            } else if (response.status == 406) {
                //this block displays validation errors
                form.prepend(msgBox(response.data, 'danger'));

            } else {

                ///other mailing related errors
                form.prepend(msgBox(response.data, 'danger'));

            }
            btn.text('Submit');

        },
        error: function() {

            form.prepend(msgBox('Sorry! We could not proccess your request', 'danger'));
            btn.text('Submit');

        }

    });
});

/* Generate alert message box */
function msgBox(data, type) {

    var msg = '<ul id="formMsgBox" class="list-unstyled alert alert-' + type + ' animated fadeIn">';

    msg += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    if ($.isArray(data)) {

        $.each(data, function(index, value) {

            msg += '<li>' + value + '</li>';

        });

    } else {

        msg += '<li>' + data + '</li>';

    }

    msg += '</ul>';

    return msg;

}