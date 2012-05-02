<section class="span3">
  <h3>Senzori:</h3>
  <div id="senzori"></div>
</section>

<section class="span9">
  <h2>Prikaz:</h2>
  <div class="graph" id="graph0"></div>
</section>



<div class="clearfix"></div>



<!-- template za senzore -->
<script id="sensorTmpl" type="text/x-handlebars-template">
  <ul class="nav nav-tabs nav-stacked" id="sensorList">
  {{#data}}

    <li class="sensor-name">

      <a href="#" data-toggle="collapse" data-target=".sensor{{sensor_id}}">
        <i class="icon-chevron-down"></i> {{sensor_user_name}}
      </a>
      <a href="#" class="sensor-name-icon"><i class="icon-list-alt"></i></a>

      <div class="hide tooltip-content">
        <p>{{#if is_active}}Sensor is <span class="label label-primary">active</span>!{{/if}}</p>
        <p>Location:{{location_x}}, {{location_y}}</p>
      </div>

    </li>

    {{#sensor_type}}
      <li class="sensor{{../sensor_id}} collapse sensor-unit">
        <a class="sensor-unit-link" href="#" data-sensor-id="{{../sensor_id}}" data-unit-id="{{unit_id}}">
          <span class="label">Off</span> {{unit_name}}
        </a>
      </li>
    {{/sensor_type}}

  {{/data}}
  </ul>
</script>