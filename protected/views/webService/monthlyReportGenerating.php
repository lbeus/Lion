<h1>Monthly reports site</h1>


            <?php
            echo "<br/>".date("F")."<br/><br/>";
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
                    $gMap->setWidth(300);
// it can also be called $gMap->height = 400;
                    $gMap->setHeight(300);
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

                    //$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());

                    $gMap->renderMap();

            ?>

        <div class="span-15 last">
        <?php
                //$model->displayReport($model->selectedGsn, $model->selectedSensor, $model->selectedDate, $model->submitedForm);
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
                                'plotOptions' => array(
                                    'line' => array(
                                           // 'dataLabels' => array('enabled' => true),
                                        'enableMouseTracking' => false,
                                        'shadow' => false,
                                        'animation' => false,
                                        )
                                    ),
                                'series' => array(
                                    array('name' => 'Max values', 'data' => $max_values),
                                    array('name' => 'Min values', 'data' => $min_values),
                                    array('name' => 'Avg values', 'data' => $avg_values))
                            )
                                )
                        );
                    }
        ?>
            </div>