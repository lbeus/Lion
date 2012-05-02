// tests


(function($) {
	var compiled = {};
	$.fn.handlebars = function(template, data) {
		if (template instanceof jQuery) {
			template = $(template).html();
		}

		compiled[template] = Handlebars.compile(template);
		this.html(compiled[template](data));
	};
})(jQuery);

// hooks



function initHooks() {
	var jsdoc = $(document);
	jsdoc.on('click','.sensor-unit-link', toggleSensorUnit);
}
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
var appPath = document.location.href.match(/http(.)+php/)[0],
    apiUrl = appPath+'/api/',
    plot,
    sensors = [];


var activeUnits = [];

var plotOptions = {
    series: {
        lines: {
            show: true
        },
        points: {
            show: false
        }
    },
    crosshair: {
        mode: "x"
    },
    xaxis: {
        mode: "time"
    }
};


function toggleSensorUnit() {
    var $this = $(this);
    var unitLabel = $this.find('.label');
    var unitID = $this.data('unit-id');
    var sensorID = $this.data('sensor-id');
    var uniqueID = getUniqueID(sensorID, unitID);
    var query = [];

    if (unitLabel.hasClass('label-success')) {
        unitLabel.text('Off');
    } else {
        unitLabel.text('On');
    }

    if (activeUnits[uniqueID]) {
        delete activeUnits[uniqueID];
    } else {
        activeUnits[uniqueID] = {
            'unit_id': unitID,
            'sensor_id': sensorID
        };
    }

    for (var i in activeUnits) {
        query.push(activeUnits[i]);
    }

    getLReading(query);

    unitLabel.toggleClass('label-success');
}

function init() {

    getREST('Sensors', function(data) {
        $.each(data.data, function(i,elem){
            sensors[elem.sensor_id] = elem.sensor_user_name;
        });
        $('#senzori').handlebars($('#sensorTmpl'), data);
        initTooltips();
    });




    initHooks();
}


$(init);

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
