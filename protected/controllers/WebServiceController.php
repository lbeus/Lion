<?php

class WebServiceController extends Controller {

    public function actionReportGeneratingService() {
        $model = new ReportGeneratingService;

        $headers = "From: " . Yii::app()->params['adminEmail'] . "\r\nReply-To: " . Yii::app()->params['adminEmail'];
        $subject = "Report generating";
        $body = "";

        //$monthly_reports = new MonthlyReports();
        $monthly_reports = Yii::app()->db->createCommand()
                        ->selectDistinct('sensor_id, gsn_id')
                        ->from('monthly_reports m')
                        ->where('is_sending=:is_sending and is_active=:is_active', array(':is_sending' => '1', 'is_active' => '1'))
                        ->queryAll();

        foreach ($monthly_reports as $report) {
            $body.= "gsn_id = " . $report['gsn_id'] . ", sensor_id = " . $report['sensor_id'] . "\n";
            $new_report = new MonthlyReportGenerating;
            $new_report->selectedGsn = $report['gsn_id'];
            $new_report->selectedSensor = $report['sensor_id'];
            $new_report->selectedYear = 201203;

            exec('wget "http://161.53.67.224/lion/index.php?r=webService/monthlyReportGenerating&gsn_list=' . $report['gsn_id'] . '&sensor_list=' . $report['sensor_id'] . '&year_list=201204"');
            exec('mv "index.php?r=webService%2FmonthlyReportGenerating&gsn_list=' . $report['gsn_id'] . '&sensor_list=' . $report['sensor_id'] . '&year_list=201204" "/home/lpostruzin/' . "Monthly_report_" . $report['sensor_id'] . "_GSN_" . $report['gsn_id'] . "201204.pdf\"");
//$new_report->pdfGeneration();
        }
        mail("hyracoidea@gmail.com", $subject, $body, $headers);
    }

    public function actionMonthlyReportGenerating() {
        $model = new MonthlyReportGenerating;

        $model->selectedGsn = (int) (isset($_GET['gsn_list']) ? ($_GET['gsn_list']) : "-1");
        $model->selectedSensor = (int) (isset($_GET['sensor_list']) ? ($_GET['sensor_list']) : "-1");
        $model->selectedYear = (int) (isset($_GET['year_list']) ? ($_GET['year_list']) : "-1");

        if ($model->selectedGsn != -1 && $model->selectedSensor != -1 && $model->selectedYear != -1) {
            $this->layout = 'report_template'; //here we should place a layout for reports
            $this->render('monthlyReportGenerating', array('model' => $model));
        } else {
            echo "Not all parameters were passed correctly!";
        }

//        $this->layout = 'main';
//        $this->render('monthlyReportGenerating', array('model' => $model));
    }

    public function actionDailyReportGenerating() {
        $model = new DailyReportGenerating;

        $model->selectedGsn = (int) (isset($_GET['gsn_list']) ? ($_GET['gsn_list']) : "-1");
        $model->selectedSensor = (int) (isset($_GET['sensor_list']) ? ($_GET['sensor_list']) : "-1");
        $model->selectedDate = (int) (isset($_GET['date_list']) ? ($_GET['date_list']) : "-1");

        if ($model->selectedGsn != -1 && $model->selectedSensor != -1 && $model->selectedDate != -1) {
            $this->layout = 'report_template'; //here we should place a layout for reports
            $this->render('dailyReportGenerating', array('model' => $model));
        } else {
            echo "Not all parameters were passed correctly!";
        }

//        $this->layout = 'main';
//        $this->render('monthlyReportGenerating', array('model' => $model));
    }

}

?>
