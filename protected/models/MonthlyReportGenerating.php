<?php

class MonthlyReportGenerating extends CFormModel {

    public $selectedGsn;
    public $selectedSensor;
    public $selectedYear;

    function pdfGeneration() {

        $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf',
                        'P', 'cm', 'A4', true, 'UTF-8');
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("Matija Renić & Luka Postružin");

////set margins
//        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//
////set image scale factor
//        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//set some language-dependent strings
//$pdf->setLanguageArray($l);
// ---------------------------------------------------------
// set font
        $pdf->SetFont('helvetica', '', 12);

        $gsn_row = DiGsn::model()->find(array('select' => 'gsn_name, gsn_ip, city', 'condition' => 'gsn_id=' . $this->selectedGsn));

        $sensor_row = DiSensors::model()->find(array(
                    'select' => 'sensor_user_name, location_x, location_y, sensor_type',
                    'condition' => 'sensor_id = ' . $this->selectedSensor));

//        $pdf->SetTitle("Monthly report for " . $sensor_row['sensor_user_name']);
//        //$pdf->SetSubject("TCPDF Tutorial");
//        $pdf->SetKeywords("sensor, monthly, report");
//        $pdf->setPrintHeader(false);
//        $pdf->setPrintFooter(false);


        $pdf->AddPage();
        $pdf->SetMargins(2, 2, 2);
        $pdf->SetFont('times', 'B', 24);
        $pdf->SetY(12);
        $pdf->Cell(0, 1, 'ColdWatch', 0, 1, 'R', false);
        $pdf->Cell(0, 1, 'Monthly report', 0, 1, 'R', false);

        $pdf->AddPage();
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 1, '1.   Disclaimer', 0, 1, 'L', false);
        $pdf->SetFont('times', '', 1);
        //$pdf->MultiCell(0,5,'This report has been sent to you because of your subscription from 10.7.2011. If you want to cancel your subscription, please contact us on ',0,'L',false);
        $pdf->Cell(85, 5, 'This report has been downloaded on ' . date("d.m.Y.", strtotime("today")) . ' from ', 0, 0, 'L', false);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->SetFont('', 'U');

        $pdf->Ln();
        $pdf->SetFont('times', 'B', 14);
        $pdf->SetTextColor(0, 0, 0);

        $pdf->Cell(0, 1, '2.   ' . $sensor_row['sensor_user_name'], 0, 1, 'L', false);
        $pdf->SetFont('times', '', 10);
        $pdf->Cell(0, 1, 'This sensor is called ' . $sensor_row['sensor_user_name'] . ' and is located on coordinates:', 0, 1, 'L', false);
        $pdf->Cell(0, 2, '   *  X: ' . sprintf("%f", $sensor_row['location_x']) . '', 0, 1, 'L', false);
        $pdf->Cell(0, 2, '   *  Y: ' . sprintf("%f", $sensor_row['location_y']) . '', 0, 1, 'L', false);
        $pdf->Cell(0, 1, 'This sensor belongs to GSN server "' . $gsn_row['gsn_name'] . '"', 0, 1, 'L', false);



//
        $pdf->AddPage();
//        $pdf->SetFont("times", "BI", 20);
//
        $html = '
        <h1>Monthly report</h1>
        <h2>' . $sensor_row['sensor_user_name'] . '</h2>
        <i>Sensor is located at server: ' . $gsn_row['gsn_name'] . ', ' . $gsn_row['city'] . '</i>
        <p>Type of sensor: ' . $sensor_row['sensor_type'] . '</p>
        <p>Location of sensor: <br/>Latitude: ' . $sensor_row['location_x'] . '<br/>Longitude: ' . $sensor_row['location_y'] . '</p>
        ';

        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        //$pdf->AddPage();
        $sensor_units = DiUnits::model()->with(array('fSensorTypes' => array('select' => false, 'joinType' => 'INNER JOIN', 'condition' => '"fSensorTypes".sensor_id = ' . $this->selectedSensor)))->findAll();

        foreach ($sensor_units as $unit) {
            $agg_daily = AggMonthDayPart::model()->find(array('condition' => 'sensor_id = ' . $this->selectedSensor . ' AND month_id = ' . $this->selectedYear . ' AND unit_id = ' . $unit['unit_id']));
            $html = "<br/><br/><h3>" . $unit['unit_name'] . "</h3>";
            $html.= '<ul>';
            $html.= "<li>Average measured value: " . number_format($agg_daily['avg_value'], 2) . $unit->unit_mark . "</li>";
            $html.= "<li>Maximum measured value: " . number_format($agg_daily['max_value'], 2) . $unit->unit_mark . "</li>";
            $html.= "<li>Minimum measured value: " . number_format($agg_daily['min_value'], 2) . $unit->unit_mark . "</li>";
            $html.= "</ul>";
            $pdf->writeHTMLCell($w = 0, $h = 0, $x = 1, $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'L', $autopadding = true);

            $aggregated_data = AggMonthDayPart::model()->findAll(array('condition' => 'sensor_id = ' . $this->selectedSensor . ' AND month_id = ' . $this->selectedYear . ' AND unit_id = ' . $unit['unit_id']));

            //array presenting part of the day
            $day_part = array();
            array_push($day_part, "");
            $max_values = array();
            array_push($max_values, "Maximum / " . $unit->unit_mark);
            $min_values = array();
            array_push($min_values, "Minimum / " . $unit->unit_mark);
            $avg_values = array();
            array_push($avg_values, "Average / " . $unit->unit_mark);
            //$data_span = 0;

            foreach ($aggregated_data as $row) {
                array_push($day_part, ucfirst($row->dayPart['day_part_name']));
                array_push($max_values, (double) number_format($row['max_value'], 2));
                array_push($min_values, (double) number_format($row['min_value'], 2));
                array_push($avg_values, (double) number_format($row['avg_value'], 2));
                //$data_span = max($row['max_value'], $data_span);
            }

            $rows_array = array($max_values, $min_values, $avg_values);

            //header for each unit table
            $html = "<br/><br/><b>Aggregated data for " . $unit['unit_name'] . "</b>";
            $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'C', $autopadding = true);

            $pdf->SetFillColor(255, 0, 0);
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(128, 0, 0);
            $pdf->SetLineWidth(0.1);
            $pdf->SetFont('', 'B');
            $w = array(3, 3, 3, 3, 3, 3);

            $i = 0;
            foreach ($day_part as $part) {
                $pdf->Cell($w[$i], 0.5, $part, 1, 0, 'C', 1, '', 0);
                $i = $i + 1;
            }

            $pdf->Ln();
            $pdf->SetFillColor(224, 235, 255);
            $pdf->SetTextColor(0);
            $pdf->SetFont('');

            $fill = 0;

            $i = 0;
            //Max values
            foreach ($max_values as $max) {
                $pdf->Cell($w[$i], 0.5, $max, 'LR', 0, 'L', 1, '', 0);
                $i = $i + 1;
            }
            $pdf->Ln();
            $fill = !$fill;

            $i = 0;
            //Min values
            foreach ($min_values as $min) {
                $pdf->Cell($w[$i], 0.5, $min, 'LR', 0, 'L', 1, '', 0);
                $i = $i + 1;
            }
            $pdf->Ln();
            $fill = !$fill;

            $i = 0;
            //Avg values
            foreach ($avg_values as $avg) {
                $pdf->Cell($w[$i], 0.5, $avg, 'LR', 0, 'L', 1, '', 0);
                $i = $i + 1;
            }
            $pdf->Ln();
            $fill = !$fill;
            $pdf->Cell(array_sum($w), 0, '', 'T');
        }

//        $pdf->Cell(0, 2, $sensor_row['sensor_user_name'], 1, 1, 'L');
//        $pdf->Cell(0, 10, "Sensor is located on GSN: ".$gsn_row['gsn_name']." in ".$gsn_row['city'], 1, 1, 'L');
        $pdf->Output("Monthly_report_" . $sensor_row['sensor_user_name'] ."_GSN_".$gsn_row['gsn_name']. "_" . $this->selectedYear . ".pdf", "D");
    }
}

?>
