// utils

function getDate(date) {
	date = '' + date;
	return date.substr(0, 4) + '-' + date.substr(4, 2) + '-' + date.substr(6, 2);
}

function isFunction(functionToCheck) {
	var getType = {};
	return functionToCheck && getType.toString.call(functionToCheck) == '[object Function]';
}

function getUniqueID(sensor_id,unit_id) {
	return sensor_id*20+unit_id;
}

function formatReadings(data){
	var tempData = [];
	var outData = [];

	$.each(data, function(i,elem){
		var uniqueID = getUniqueID(elem.sensor_id, elem.unit_id);
		var newPoint = [];

		var time = new Date('2012-03-22').valueOf() + elem.time_id*1000;

		if(typeof(tempData[uniqueID]) == 'undefined') {
			tempData[uniqueID] = {
				label: sensors[elem.sensor_id] + elem.unit_id,
				data:[],
				hoverable: true
			};
		}
		newPoint = [time, elem.value];

		tempData[uniqueID].data.push(newPoint);

	});

	for(var i in tempData){
		outData.push(tempData[i]);
	}
	return outData;
}


function getLReading(query) {
	if (!query) return false;
	getREST('LReadings', query, function(data) {
		var graphData = formatReadings(data.data);
		plot = $.plot($('#graph0'), graphData, plotOptions);
	});
}

// sensor tooltips
function initTooltips() {

    $('.sensor-name').each(function(i, elem) {
        var content = $(this).find('.tooltip-content').html();
        var title = $(this).find('a').text();

        $(this).popover({
            content: content,
            title: title
        });
    });
}