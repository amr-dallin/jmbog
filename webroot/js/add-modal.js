$(document).ready(function() {
    var form = $('form:first');
    var url = new URL(form.attr('action'));
    var urlParams = new URLSearchParams(url.search);
    var objectId;
    if (urlParams.has('object_id')) {
        objectId = urlParams.get('object_id');
    }

    console.log(objectId);

    form.on('click', 'input[type=submit]', function(event) {
        event.preventDefault();

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            cache: false,
            data: form.serialize(),
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function(response) {
                if (undefined === response.result) {
                    $('.modal-content').html('');
                    $('.modal-content').html(response.content);

                    $('.modal-content div.alert').css('display', 'block');
                    $('.modal-content .alert span#error-message').html(response._message[0]['message']);
                } else {
                    $('.modal-content').html('');
                    // Добавим информацию об успешном добавление записи
                    var object = $('body');
                    if (undefined !== objectId) {
                        object = $('#' + objectId);
                    }

                    object.trigger('added', response.result);
                }

            },
            error: function(error) {
                alert(error);
            }
        });
    });
});
