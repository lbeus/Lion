<?php

class ReportSubscriptionController extends Controller {

    public $layout = 'main';

    /**
     * Actions for report generation site for sensors
     */
    public function actionReportsDailyDynamicSensors() {
        $data = DiSensors::model()->findAll('gsn_id=:parent_id',
                        array(':parent_id' => (int) $_POST['UserReportsDaily']['gsn_list']));


        $data = CHtml::listData($data, 'sensor_id', 'sensor_user_name');
        echo CHtml::tag('option', array('value' => 0), 'Select', true);
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

    /**
     * Actions for daily report generation site for dates
     */
    public function actionReportsDailyDynamicDates() {
//        $data = AggDay::model()->findAll('sensor_id=:parent_id',
//                        array(':parent_id' => (int) $_POST['UserReportsMain']['sensor_list']));

        $data = Yii::app()->db->createCommand()
                        ->selectDistinct('a.sensor_id, a.date_id, d.date')
                        ->from('agg_day a')
                        ->join('di_days d', 'a.date_id=d.date_id')
                        ->where('a.sensor_id=:id', array(':id' => (int) $_POST['UserReportsDaily']['sensor_list']))
                        ->order('a.date_id desc')
                        ->queryAll();

        //$data = CHtml::listData($data, 'date_id', 'date_id');

        $data = CHtml::listData($data, 'date_id', 'date');

        echo CHtml::tag('option', array('value' => 0), 'Select', true);
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

    /**
     * Actions for monthly report generation site for sensors
     */
    public function actionReportsMonthlyDynamicSensors() {
        $data = DiSensors::model()->findAll('gsn_id=:parent_id',
                        array(':parent_id' => (int) $_POST['UserReportsMonthly']['gsn_list']));


        $data = CHtml::listData($data, 'sensor_id', 'sensor_user_name');
        echo CHtml::tag('option', array('value' => 0), 'Select', true);
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

    /**
     * Actions for report generation site for dates
     */
    public function actionReportsMonthlyDynamicYears() {
        $data = Yii::app()->db->createCommand()
                        ->selectDistinct('a.sensor_id,  a.month_id')
                        ->from('agg_month_day_part a')
                        //->join('di_days d', 'a.date_id=d.date_id')
                        ->where('a.sensor_id=:id', array(':id' => (int) $_POST['UserReportsMonthly']['sensor_list']))
                        ->order('a.month_id desc')
                        ->queryAll();

        $data = CHtml::listData($data, 'month_id', 'month_id');

        echo CHtml::tag('option', array('value' => 0), 'Select', true);
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

    public function actionReportsMonthlyDynamicMonths() {
        $data = Yii::app()->db->createCommand()
                        ->selectDistinct('a.sensor_id, a.date_id, d.month, d.name_month')
                        ->from('agg_month_day_part a')
                        ->join('di_days d', 'a.month=d.month and a.year = d.year')
                        ->where('a.sensor_id=:id and d.year=:year', array(':id' => $model->selectedSensor, ':year' => (int) $_POST['UserReportsMonthly']['year_list']))
                        //->where('d.year=:year',array(':year'=>(int)$_POST['UserReportsMonthly']['year_list']))
                        ->order('d.month asc')
                        ->queryAll();

        $data = CHtml::listData($data, 'month', 'name_month');

        echo CHtml::tag('option', array('value' => 0), 'Select', true);
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

    /**
     * Displays daily reports generating page
     */
    public function actionUserReportsDaily() {
        $model = new UserReportsDaily;

        $model->selectedGsn = (isset($_POST['UserReportsDaily']['gsn_list']) ? ($_POST['UserReportsDaily']['gsn_list']) : "-1");
        $model->selectedSensor = (isset($_POST['UserReportsDaily']['sensor_list']) ? ($_POST['UserReportsDaily']['sensor_list']) : "-1");
        $model->selectedDate = (isset($_POST['UserReportsDaily']['date_list']) ? ($_POST['UserReportsDaily']['date_list']) : "-1");
        $model->submitedForm = (isset($_POST['submit_button']) ? true : false);

        $model->test = (isset($_POST['submit_button']) ? ($_POST['submit_button']) : "petar");
        //$model->pdfGeneration();

        $this->render('userReportsDaily', array('model' => $model));
    }

    /**
     * Displays daily reports generating page
     */
    public function actionUserReportsMonthly() {
        $model = new UserReportsMonthly;

        $model->selectedGsn = (int) (isset($_POST['UserReportsMonthly']['gsn_list']) ? ($_POST['UserReportsMonthly']['gsn_list']) : "-1");
        $model->selectedSensor = (int) (isset($_POST['UserReportsMonthly']['sensor_list']) ? ($_POST['UserReportsMonthly']['sensor_list']) : "-1");
        $model->selectedYear = (int) (isset($_POST['UserReportsMonthly']['year_list']) ? ($_POST['UserReportsMonthly']['year_list']) : "-1");
        //$model->selectedMonth = (isset($_POST['UserReportsMonthly']['month_list'])?($_POST['UserReportsMonthly']['month_list']):"-1");

        $model->submitedForm = (isset($_POST['submit_button']) ? true : false);
        $model->pdfGenerating = (isset($_POST['pdf_button']) ? true : false);

        if ($model->pdfGenerating && $model->selectedGsn != -1 && $model->selectedSensor != -1 && $model->selectedYear != -1)
            $model->pdfGeneration();

        $this->render('userReportsMonthly', array('model' => $model));
    }

    public function actionUserReportsMain() {
        $model = new UserReportsMain;

        $this->render('userReportsMain', array('model' => $model));
    }

    /**
     * Actions for generating new report subscription
     */
    public function actionReportsDynamicSensors() {
        $data = DiSensors::model()->findAll('gsn_id=:parent_id',
                        array(':parent_id' => (int) $_POST['UserReportsNewSubscription']['gsn_id']));


        $data = CHtml::listData($data, 'sensor_id', 'sensor_user_name');
        echo CHtml::tag('option', array('value' => 0), 'Select', true);
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

    public function actionUserReportsNewSubscription() {
        $model = new UserReportsNewSubscription;

        $model->selectedGsn = (int) (isset($_POST['UserReportsNewSubscription']['gsn_id']) ? ($_POST['UserReportsNewSubscription']['gsn_id']) : "-1");
        $model->selectedSensor = (int) (isset($_POST['UserReportsNewSubscription']['sensor_id']) ? ($_POST['UserReportsNewSubscription']['sensor_id']) : "-1");
        $model->selectedEmail = (isset($_POST['UserReportsNewSubscription']['email']) ? ($_POST['UserReportsNewSubscription']['email']) : "-1");
        $model->selectedType = (int) (isset($_POST['UserReportsNewSubscription']['report_type']) ? ($_POST['UserReportsNewSubscription']['report_type']) : "-1");
        $model->successful = true;
        $model->newSubscription = false;

        if (isset($_POST['submit_button'])) {
            $text = "";
            //user has requested new subscription
            if ($model->selectedGsn != -1 && $model->selectedSensor != -1 && $model->selectedEmail != -1 && $model->selectedType != -1) {
                $model->newSubscription = true;
                if ($model->selectedType == 1) {
                    $rawData = Yii::app()->db->createCommand('SELECT * FROM daily_reports d WHERE gsn_id = ' . $model->selectedGsn . ' and sensor_id = ' . $model->selectedSensor . ' and email = \'' . $model->selectedEmail.'\'')->queryAll();

                    if ($rawData != null)
                        $model->successful = false;
                    else
                        $model->successful = true;
                }
                else {
                    $rawData = Yii::app()->db->createCommand('SELECT * FROM monthly_reports d WHERE gsn_id = ' . $model->selectedGsn . ' and sensor_id = ' . $model->selectedSensor . ' and email = ' . $model->selectedEmail)->queryAll();

                    if ($rawData != null)
                        $model->successful = false;
                    else
                        $model->successful = true;
                }

                if ($model->successful) {
                    try {
                        if ($model->selectedType == 1)
                            $report = new DailyReports();
                        else if ($model->selectedType == 2)
                            $report = new MonthlyReports ();
                        else {
                            $text = "Type you have chosen does not exist, please try again";
                        }
                        $report->gsn_id = $model->selectedGsn;
                        $report->sensor_id = $model->selectedSensor;
                        $report->email = $model->selectedEmail;
                        $report->user_id = Yii::app()->user->id;
                        $report->is_sending = '1';
                        $report->save();
                    } catch (Exception $ae) {
                        
                    }
                }
            }
        }

        $this->render('userReportsNewSubscription', array('model' => $model));
    }

    public function actionUserReportsSubscription() {
        $model = new UserReportsSubscription;

        if (isset($_REQUEST['report_id'])) {
            try {
                if ($_REQUEST['type_int'] == 1) { //daily report
                    $report = new DailyReports;
                    $report = DailyReports::model()->findByAttributes(array('report_id' => $_REQUEST['report_id']));
                } else if ($_REQUEST['type_int'] == 2) {//monthly report
                    $report = new MonthlyReports;
                    $report = MonthlyReports::model()->findByAttributes(array('report_id' => $_REQUEST['report_id']));
                }

                if (isset($_REQUEST['action'])) {
                    if ($report->delete())
                        $text = "Delete of report was successful!";
                    else
                        $text = "Delete of report was unseccessful!";
                }
                else {
                    if ($report->is_sending == '1')
                        $report->is_sending = '0';
                    else
                        $report->is_sending = '1';
                    $report->save();
                }
            } catch (Exception $e) {
                $message = "We were unable to find your report by its id or proceed with your request!";
            }
        }

        $this->render('userReportsSubscription', array('model' => $model));
    }

}

?>
