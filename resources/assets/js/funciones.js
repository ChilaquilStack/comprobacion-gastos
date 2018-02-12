var modal = (title, type) => {
	swal({
		'title': title,
		'type': type,
		'showCloseButton': false,
        'showConfirmButton': false,
        'focusConfirm': false,
        'timer': 1500
    });
};