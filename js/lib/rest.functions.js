// funkcije koje dohvacaju podatke sa yii REST API-a

/**
 * List the specific yii model records.
 * @param {string} model The yii model we are accessing.
 * @param {object} search Optional parameter used for searching the database,
 *                        if omited all records are listed.
 * @param {function} callback Callback function.
 */

function getREST(model, search, callback) {
	if (isFunction(search)) {
		$.ajax(apiUrl + model + '/', {
			success: search,
			type: 'GET'
		});
	} else {
		$.ajax(apiUrl + model + '/search', {
			success: callback,
			type: 'POST',
			data: JSON.stringify(search),
			processData: false
		});
	}
}
