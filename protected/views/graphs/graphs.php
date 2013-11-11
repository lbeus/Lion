<?php
  $this->pageTitle = Yii::app()->name . ' - Graphs';
  $this->breadcrumbs = array(
      'Graphs',
  );
?>

<div class="container">
<section class="span3">
  <h2>Sensors:</h2>
  <div id="senzori"></div>
</section>

<section class="span9">

  <h3>Time period:</h3>
  <div class="time-period row">


      <div class="span4">
        <div class="well ">
          <label class="control-label" for="startTime">Start time</label>
          <input class="" id="startTime" name="startTime" size="16" type="text">
          <label class="control-label" for="startDate">Start date</label>
          <input class="" id="startDate" name="startDate" size="16" type="text">
        </div>
      </div>

      <div class="span4">
        <div class="well ">
          <label class="control-label" for="endTime">End time</label>
          <input class="" id="endTime" name="endTime" size="16" type="text">
          <label class="control-label" for="endDate">End date</label>
          <input class="" id="endDate" name="endDate" size="16" type="text">
        </div>
      </div>



  </div>

  
  <h3>Display data by value:</h3>
  <div id="valueChoice" class="well value-choice">
    <span>Get values </span>
    <select id="limitSelect">
      <option value="false" selected>&lt;</option>
      <option value="true">&gt;</option>
    </select>
    <input type="number" val="0" id="limitText"/>
    <span> in unit </span>
    <select id="unitSelect">
    </select>
    
    <a id="limitSubmit" href="#" class="btn">Get data</a>
    
  </div>

  <h2>Graphs:</h2>

  <div id="graphs"></div>
</section>



<div class="clearfix"></div>
</div>

<div id="noDataAlert" class="alert fade out">
  <button class="close" data-dismiss="alert">×</button>
  <strong>No data available!</strong>
  <p>There is no data available for selected time period.
    Choose another time period above.</p>
</div>


<!-- template za value chooser -->
<script id="valueTmpl" type="text/x-handlebars-template">
  
    {{#units}}
      <option data-unit-id="{{unit_id}}" data-sensor-id="{{sensor_id}}">{{sensor_name}} - {{unit_name}}</option>
    {{/units}}
  
</script>

<!-- template za senzore -->
<script id="sensorTmpl" type="text/x-handlebars-template">
  {{#gsn}}
    <h3>{{name}}</h3>
    <ul class="nav nav-tabs nav-stacked" id="sensorList">
    {{#data}}

      <li class="sensor-name">

        <a href="#" data-toggle="collapse" data-target=".sensor{{sensor_id}}">
          <i class="icon-chevron-down"></i> {{sensor_user_name}}
        </a>
        <!--
        <a href="#" class="sensor-name-icon"><i class="icon-list-alt"></i></a>
        -->
        <div class="hide tooltip-content">
          <p>
            {{#if is_active}}
              Sensor is <span class="label label-success">active</span>!
            {{else}}
              Sensor is <span class="label label-important">inactive</span>!
            {{/if}}
          </p>
          <p>
            {{#if location_x}}
              Location:
              <span class="label">{{location_x}}, {{location_y}}</span>
            {{/if}}
          </p>
        </div>

      </li>

      {{#sensor_type}}
        <li class="sensor{{../sensor_id}} collapse sensor-unit">
          <a class="sensor-unit-link" href="#" data-sensor-id="{{../sensor_id}}" data-sensor-name="{{../sensor_name}}" data-unit-id="{{unit_id}}">
            <span class="label">Off</span> <span class="unit-name">{{unit_name}}</span>
          </a>
        </li>
      {{/sensor_type}}

    {{/data}}
    </ul>
  {{/gsn}}
</script>

<!-- bootstrap CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-bootstrap/jquery-ui.css"  />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-bootstrap/jquery.noty.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-bootstrap/noty_theme_twitter.css"/>

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-bootstrap/jquery-ui.ie.css"/>
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.timepicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flot.crosshair.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flot.selection.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/handlebars.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/js.js"></script>
