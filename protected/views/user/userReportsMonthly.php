<?php
$this->pageTitle = Yii::app()->name . ' - Monthly reports';
$this->breadcrumbs = array(
    'Monthly reports',
);
?>

<h1>Monthly reports site</h1>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'report-form',
                'enableClientValidation' => true,
                //'enableAjaxValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="span-7">
        <div id="content" style="padding-top: 0px; margin-top: 0px; border-right: 2px;">

            <h3>Sensor information</h3>
            <div class="row">
                <?php echo $form->labelEx($model, 'gsn_list'); ?>
                <?php
                $gsn_order = new CDbCriteria;
                $gsn_order->order = 'gsn_name ASC';

                echo $form->dropDownList($model, 'gsn_list', CHtml::listData(DiGsn::model()->with(array('diGsnPrivileges' => array('select' => false, 'joinType' => 'INNER JOIN', 'condition' => '"diGsnPrivileges".user_id = ' . Yii::app()->user->id)))->findAll($gsn_order), 'gsn_id', 'gsn_name'),
                        array(
                            'empty' => 'Select',
                            'options' => array($model->selectedGsn => array('selected' => 'selected')),
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('reportsMonthlyDynamicSensors'),
                                'update' => '#UserReportsMonthly_' . 'sensor_list'
                            )
                        )
                );
                ?>

                <?php echo $form->error($model, 'gsn_list'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'sensor_list'); ?>
                <?php
                $sensor_order = new CDbCriteria;
                $sensor_order->order = 'sensor_name ASC';
                echo $form->dropDownList($model, 'sensor_list', /* array(), */CHtml::listData(DiSensors::model()->with(array('gsn' => array('select' => false, 'joinType' => 'INNER JOIN', 'condition' => '"gsn".gsn_id = ' . $model->selectedGsn)))->findAll($sensor_order), 'sensor_id', 'sensor_user_name'),
                        array(
                            'empty' => 'Select',
                            'options' => array($model->selectedSensor => array('selected' => 'selected')),
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('reportsMonthlyDynamicYears'),
                                'update' => '#UserReportsMonthly_' . 'year_list'
                            )
                        )
                );
                ?>
                <?php echo $form->error($model, 'sensor_list'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'year_list'); ?>
                <?php
                echo $form->dropDownList($model, 'year_list', /* array(), */ CHtml::listData(Yii::app()->db->createCommand()
                                        ->selectDistinct('a.sensor_id, a.month_id')
                                        ->from('agg_month_day_part a')
                                        //->join('di_days d', 'a.date_id=d.date_id')
                                        ->where('a.sensor_id=:id', array(':id' => $model->selectedSensor))
                                        ->order('a.month_id desc')
                                        ->queryAll(), 'month_id', 'month_id'),
                        array(
                            'empty' => 'Select',
                            'options' => array($model->selectedYear => array('selected' => 'selected')),
//                            'ajax' => array(
//                                'type' => 'POST',
//                                'url' => CController::createUrl('reportsMonthlyDynamicMonths'),
//                                'update' => '#UserReportsMonthly_' . 'month_list')
                        )
                );
                ?>
                <?php echo $form->error($model, 'year_list'); ?>
            </div>

            <!--            <div class="row">
            <?php //echo $form->labelEx($model, 'month_list');  ?>
            <?php
//                echo $form->dropDownList($model, 'month_list', /* array(), */ CHtml::listData(Yii::app()->db->createCommand()
//                                        ->selectDistinct('a.sensor_id, d.month, d.name_month')
//                                        ->from('agg_month_day_part a')
//                                        ->join('di_days d', 'a.month=d.month and a.year=d.year')
//                                        ->where('a.sensor_id=:id and d.year=:year', array(':id'=> $model->selectedSensor, ':year'=> $model->selectedYear))
//                                        //->where('d.year=:year',array(':year'=> $model->selectedYear))
//                                        ->order('d.month asc')
//                                        ->queryAll(), 'month', 'name_month'),
//                        array(
//                            'empty' => 'Select',
//                            'options' => array($model->selectedMonth => array('selected' => 'selected')),
//                        )
//                );
            ?>
            <?php //echo $form->error($model, 'month_list'); ?>
                                </div>-->

                <div class="row buttons">
                <?php echo CHtml::submitButton('Generate', array('name' => 'submit_button')); ?>
                <?php echo CHtml::submitButton('PDF', array('name' => 'pdf_button')); ?>
            </div>

            <?php
                if ($model->submitedForm) {
                    //ako je ispravno postavljeno sve od strane korisnika, ispisujemo report, u protivnom javljamo gresku
                    //and then magic occurs bi bila tocna definicija, ako smo do tud dosli, krecemo sa reportom
                    $gsn_row = DiGsn::model()->find(array('select' => 'gsn_name, gsn_ip, city', 'condition' => 'gsn_id=' . $model->selectedGsn));

                    echo "GSN server: " . $gsn_row['gsn_name'] . ", from " . $gsn_row['city'];

                    $sensor_row = DiSensors::model()->find(array(
                                'select' => 'sensor_user_name, location_x, location_y, sensor_type',
                                'condition' => 'sensor_id = ' . $model->selectedSensor));
                    echo "<br/>Sensor: " . $sensor_row['sensor_user_name'] . ", at location<br/>Latitude: " . $sensor_row['location_x'] . "<br/>Longitude: " . $sensor_row['location_y'];
                    echo "<br/>Sensor type: " . $sensor_row['sensor_type'];
                    echo "<br/>";

                    Yii::import('application.extensions.EGMap.*');

                    $gMap = new EGMap();
                    $gMap->setWidth(200);
// it can also be called $gMap->height = 400;
                    $gMap->setHeight(200);
                    $gMap->zoom = 10;
                    $mapTypeControlOptions = array(
                        'position' => EGMapControlPosition::LEFT_BOTTOM,
                        'style' => EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
                    );

                    $gMap->mapTypeControlOptions = $mapTypeControlOptions;

                    $gMap->setCenter($sensor_row['location_y'], $sensor_row['location_x']);

// Create GMapInfoWindows
                    $info_window_a = new EGMapInfoWindow('<div>This is the location of the chosen sensor</div>');
                    //$info_window_b = new EGMapInfoWindow('Hey! I am a marker with label!');

                    $icon = new EGMapMarkerImage("http://mapicons.nicolasmollet.com/wp-content/uploads/mapicons/shape-default/color-128e4d/shapecolor-color/shadow-1/border-dark/symbolstyle-white/symbolshadowstyle-dark/gradient-no/water.png");

                    $icon->setSize(32, 37);
                    $icon->setAnchor(16, 16.5);
                    $icon->setOrigin(0, 0);

// Create marker
                    $marker = new EGMapMarker($sensor_row['location_y'], $sensor_row['location_x'], array('title' => $sensor_row['sensor_user_name'], 'icon' => $icon));
                    $marker->addHtmlInfoWindow($info_window_a);
                    $gMap->addMarker($marker);

                    $gMap->enableMarkerClusterer(new EGMapMarkerClusterer());

                    $gMap->renderMap();
                }
            ?>
            </div>
        </div>

        <div class="span-15 last">
        <?php
                //$model->displayReport($model->selectedGsn, $model->selectedSensor, $model->selectedDate, $model->submitedForm);

                if ($model->submitedForm) {
                    //ako je ispravno postavljeno sve od strane korisnika, ispisujemo report, u protivnom javljamo gresku
                    //and then magic occurs bi bila tocna definicija, ako smo do tud dosli, krecemo sa reportom
                    $gsn_row = DiGsn::model()->find(array('select' => 'gsn_name, gsn_ip, city', 'condition' => 'gsn_id=' . $model->selectedGsn));

                    echo "GSN server: " . $gsn_row['gsn_name'] . ", from " . $gsn_row['city'];

                    $sensor_row = DiSensors::model()->find(array(
                                'select' => 'sensor_user_name, location_x, location_y, sensor_type',
                                'condition' => 'sensor_id = ' . $model->selectedSensor));
                    echo "<br/>Sensor: " . $sensor_row['sensor_user_name'] . ", at location => latitude: " . $sensor_row['location_x'] . ", longitude: " . $sensor_row['location_y'];
                    echo "<br/>Sensor type: " . $sensor_row['sensor_type'];

                    $sensor_units = DiUnits::model()->with(array('fSensorTypes' => array('select' => false, 'joinType' => 'INNER JOIN', 'condition' => '"fSensorTypes".sensor_id = ' . $model->selectedSensor)))->findAll();

                    foreach ($sensor_units as $unit) {
                        $agg_daily = AggMonthDayPart::model()->find(array('condition' => 'sensor_id = ' . $model->selectedSensor . ' AND month_id = ' . $model->selectedYear . ' AND unit_id = ' . $unit['unit_id']));
                        echo "<br/><br/><h1>" . $unit['unit_name'] . "</h1>";
                        echo '<ul>';
                        echo "<li>Average measured value: " . number_format($agg_daily['avg_value'], 2) . "</li>";
                        echo "<li>Maximum measured value: " . number_format($agg_daily['max_value'], 2) . "</li>";
                        echo "<li>Minimum measured value: " . number_format($agg_daily['min_value'], 2) . "</li>";
                        echo "</ul>";

                        $aggregated_data = AggMonthDayPart::model()->findAll(array('condition' => 'sensor_id = ' . $model->selectedSensor . ' AND month_id = ' . $model->selectedYear . ' AND unit_id = ' . $unit['unit_id']));

                        //array presenting part of the day
                        $day_part = array();
                        $max_values = array();
                        $min_values = array();
                        $avg_values = array();
                        //$data_span = 0;

                        foreach ($aggregated_data as $row) {
                            array_push($day_part, $row->dayPart['day_part_name']);
                            array_push($max_values, (double) number_format($row['max_value'], 2));
                            array_push($min_values, (double) number_format($row['min_value'], 2));
                            array_push($avg_values, (double) number_format($row['avg_value'], 2));
                            //$data_span = max($row['max_value'], $data_span);
                        }

                        $rows_array = array($max_values, $min_values, $avg_values);

                        // echo "<canvas>";
                        echo "<table>";
                        echo "<caption>Aggregated data for " . $unit['unit_name'] . "</caption>";
                        echo "<thead>
                                <tr>
                                    <td></td>";
                        foreach ($day_part as $part)
                            echo "<td>" . $part . "</td>";

                        echo "  </tr>
                             </thead>";
                        echo "<tbody>
                                <tr>
                                    <td>Max</td>";
                        foreach ($max_values as $max)
                            echo "<td>" . $max . "</td>";
                        echo "  </tr>";
                        echo "  <tr>
                                    <td>Min</td>";
                        foreach ($min_values as $min)
                            echo "<td>" . $min . "</td>";

                        echo "  </tr>";
                        echo "  <tr>
                                    <td>Avg</td>";
                        foreach ($avg_values as $avg)
                            echo "<td>" . $avg . "</td>";

                        echo "</tr></tbody>";
                        echo "</table>";
                        //echo "</canvas>";

                        $aggregated_data = AggDay::model()->findAll(array('condition' => 'sensor_id = ' . $model->selectedSensor . ' AND date_id between ' . $model->selectedYear . '01 and ' . $model->selectedYear . '31 AND unit_id = ' . $unit['unit_id']));

                        //array presenting part of the day
                        $day_part = array();
                        $max_values = array();
                        $min_values = array();
                        $avg_values = array();
                        //$data_span = 0;

                        foreach ($aggregated_data as $row) {
                            array_push($day_part, /* $row->dayPart['day_part_name'] */ $row['date_id']);
                            array_push($max_values, (double) number_format($row['max_value'], 2));
                            array_push($min_values, (double) number_format($row['min_value'], 2));
                            array_push($avg_values, (double) number_format($row['avg_value'], 2));
                            //$data_span = max($row['max_value'], $data_span);
                        }

                        $this->Widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options' => array(
                                'theme' => 'dark-blue',
                                'chart' => array(
                                    'width' => '500',
                                    'height' => '300',
                                ),
                                'title' => array('text' => 'Aggregated data for ' . $unit['unit_name']),
                                'xAxis' => array(
                                    'categories' => $day_part,
                                    'labels' => array('rotation' => 60, 'step' => 2, 'y' => 30),
                                ),
                                'yAxis' => array(
                                    'title' => array('text' => $unit['unit_name']),
                                //'max' => 20,
                                ),
//                                'plotOptions' => array(
//                                    'line' => array(
//                                           // 'dataLabels' => array('enabled' => true),
//                                        //'enableMouseTracking' => false
//                                        )
//                                    ),
                                'series' => array(
                                    array('name' => 'Max values', 'data' => $max_values),
                                    array('name' => 'Min values', 'data' => $min_values),
                                    array('name' => 'Avg values', 'data' => $avg_values))
                            )
                                )
                        );
                    }
                }
        ?>
            </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->