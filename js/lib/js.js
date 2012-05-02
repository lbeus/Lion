var hostname = document.location.hostname,
    apiUrl = 'http://'+hostname+'/~josip/zavrsni/zavrsni/index.php/api/',
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
