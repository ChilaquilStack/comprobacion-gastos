message_alert = (title, type) => {
    swal({
        'title': title,
        'type': type,
        'showCloseButton': false,
        'showConfirmButton': false,
        'focusConfirm': false,
        'timer': 1500
    });
}

exports.message_alert = message_alert;