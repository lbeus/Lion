// hooks



function initHooks() {
	var jsdoc = $(document);
	jsdoc.on('click','.sensor-unit-link', toggleSensorUnit);
}