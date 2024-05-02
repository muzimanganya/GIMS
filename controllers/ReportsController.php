<?php

namespace app\controllers;

use app\models\DocumentReport;
use app\modules\api\modules\v1\models\Card;
use app\modules\api\modules\v1\models\DocumentType;
use app\modules\api\modules\v1\models\SearchCard;
use yii\data\SqlDataProvider;
use yii\base\DynamicModel;
use Yii;

class ReportsController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $model = new \app\models\Report();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                return $this->redirect([$model->report, 'start' => $model->start, 'end' => $model->end, 'reference' => $model->reference]);
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    

    public function actionStation($start,$end)
    {

        $sql = "SELECT date(from_unixTime(created_at)) as date, SUM(case when location='HUYE' then amount*no_rura_quantity+rura_price*rura_quantity end) as HUYE,SUM(case when location='NYABUGOGO' then amount*no_rura_quantity+rura_price*rura_quantity end) as NYABUGOGO FROM transaction  where date(from_unixTime(created_at)) between :start and :end group by date(from_unixTime(created_at))";
        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('station', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionVehicle($start,$end)
    {

        $sql = "SELECT plateNo,sum(Quantity) as litters,sum(amount*no_rura_quantity+rura_price*rura_quantity) as amount,sum(used_mileage)  as mileage,sum(used_mileage)/sum(Quantity) as rate FROM vcarburant.transaction  where date(from_unixTime(created_at)) between :start and :end group by plateNo";
        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('vehicle', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function actionCarDocuments($start,$end,$reference)
    {

        $sql = "SELECT document,starting_date,expiry_date FROM vcarburant.documents  where date(from_unixTime(created_at)) between :start and :end and vehicle=:reference";
        $params = [':start' =>$start, ':end' => $end,':reference'=>$reference];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('car-documents', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function actionCarDocumentsReport($start,$end)
    {
        $model = new DynamicModel(['documentReports']);
        $model->addRule(['documentReports'], 'safe');

        
        if ($model->load(Yii::$app->request->post())) {
           
            $doc=$model->documentReports;
            $document=DocumentType::find()->where(['document_id'=>$doc])->one()->document_name;
            
            
            if($model->documentReports == $doc){

           $sql = "SELECT vehicle,document,vendor,starting_date,expiry_date FROM vcarburant.documents  where date(from_unixTime(created_at)) between :start and :end and document=$doc";
            $params = [':start' =>$start, ':end' => $end,];
    
            $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();
    
            $dataProvider = new SqlDataProvider([
                'sql' => $sql,
                'totalCount' => $count,
                'params' => $params,
            ]);
            return $this->render('car-documents-report', [
                'dataProvider' => $dataProvider,
                'start' => $start,
                'end' => $end,
            ]);
            }
    
        }
        else{

        
        $asql = "SELECT vehicle,document,vendor,starting_date,expiry_date FROM vcarburant.documents  where date(from_unixTime(created_at)) between :start and :end";
            $params = [':start' =>$start, ':end' => $end];
    
            $acount = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($asql) t", $params)->queryScalar();
    
            $adataProvider = new SqlDataProvider([
                'sql' => $asql,
                'totalCount' => $acount,
                'params' => $params,
            ]);


        return $this->render('car-documents-report', [
           'dataProvider' => $adataProvider,
            'start' => $start,
            'end' => $end,
        ]);
    }
    }
    //}

    public function actionBusLeasing($start,$end)
    {
        $sql="SELECT date(from_unixTime(created_at)) as _Date,vehicle as plateNo,price as Amount,destination,departure_date,departure_time,return_date,return_time from vcarburant.car_leasing  where date(from_unixTime(created_at)) between :start and :end ";

         $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('bus-leasing', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }
    public function actionBusLeasingReport($start,$end,$reference){
        $sql="SELECT date(from_unixTime(created_at)) as _Date,vehicle, destination,driver,customer,price as Amount FROM vcarburant.car_leasing where vehicle=:reference and date(from_unixTime(created_at)) between :start and :end  ";
        
        $params = [':start' =>$start, ':end' => $end,':reference'=>$reference];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('bus-leasing-report', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }

    public function actionCustomer($start,$end){
        $sql="SELECT date(from_unixTime(created_at)) as _Date ,customer,vehicle as plateNo,price as Amount FROM vcarburant.car_leasing WHERE date(from_unixTime(created_at)) between :start and :end";

        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('customer', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }

    public function actionRepairsReport($start,$end){
        $sql="SELECT date(from_unixtime(j.created_at)) as _date,j.plateNo,job,part,quantity,price,driver FROM vcarburant.jobcard j join vcarburant.part_out p on j.no=p.job join vcarburant.driver d on j.driver=d.mobile WHERE date(from_unixTime(j.created_at)) between :start and :end";

        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('repairs-report', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }

    public function actionRepairsHistory($start,$end,$reference){
        $sql="SELECT date(from_unixtime(j.created_at)) as _date,j.plateNo,job,part,quantity,price,driver FROM vcarburant.jobcard j join vcarburant.part_out p on j.no=p.job join vcarburant.driver d on j.driver=d.mobile WHERE j.plateNo=:reference and date(from_unixTime(j.created_at)) between :start and :end";

        $params = [':start' =>$start, ':end' => $end,':reference'=>$reference];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('repairs-history', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
            'plateNo'=>$reference,
        ]);

    }
    
    public function actionDetails($plateNo,$start,$end)
    {
       
       $sql="Select from_unixTime(t.created_at) as time, plateNo,Quantity as litters,amount as no_rura_price,no_rura_quantity,rura_price,rura_quantity,(amount*no_rura_quantity+rura_price*rura_quantity) as total_cost,concat(name,' ',location) as station,t.mileage,names as driver from transaction t join vcarburant.driver d on t.driver=d.mobile where date(from_unixTime(t.created_at)) between :start and :end and plateNo=:plateNo";
        
          $params = [':start' => $start,':end'=>$end,':plateNo'=>$plateNo];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

         $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);
        return $this->render('details', [
            
            
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionRevenueFuel($start,$end)
    {

        $sql="SELECT t.date,SUM(t.fuel) as fuel,SUM(t.revenue) as revenue,SUM(t.revenue)-SUM(t.fuel) as diff From (
SELECT date(from_unixTime(created_at)) as date,sum(amount*no_rura_quantity+rura_price*rura_quantity) as fuel, 0 as revenue FROM vcarburant.transaction where date(from_unixTime(created_at)) between :start and :end group by date(from_unixTime(created_at)) UNION
SELECT revenu_date as date, 0 as fuel,sum(amount) as revenue FROM vcarburant.revenues where revenu_date between :start and :end group by revenu_date)t group by t.date";
       
       $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) x", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('revenue-fuel', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMealStipendDrivers($start,$end){
        $sql="SELECT date(from_unixTime(created_at)) as _CDATE ,meal_stipend_date as _Date,driver,amount FROM vcarburant.meal_stipend WHERE date(from_unixTime(created_at)) between :start and :end";

        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('meal-stipend-drivers', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }


    public function actionGeneralReport($start,$end){
        $sql="select _date,sum(leasing) as leasing,sum(revenue) as revenue,sum(fuel) as fuel,sum(garage) as garage,sum(meal) as meal,sum(fine) as fine,sum(parking) as parking,sum(car_wash) as car_wash,sum(leasing+revenue-garage-fuel-meal-fine-parking-car_wash) as profit from (
SELECT  date(from_unixtime(created_at)) as _date, sum(price+fines) as leasing,0 as revenue,0 as fuel,0 as garage,0 as meal,0 as fine,0 as parking,0 as car_wash FROM vcarburant.car_leasing group by date(from_unixtime(created_at)) UNION
SELECT  date(revenu_date) as _date, 0 as leasing,sum(amount) as revenue,0 as fuel,0 as garage,0 as meal,0 as fine,0 as parking,0 as car_wash FROM vcarburant.revenues group by revenu_date UNION
SELECT  date(from_unixtime(created_at)) as _date, 0 as leasing,0 as revenue,sum(amount*no_rura_quantity+rura_price*rura_quantity) as fuel,0 as garage,0 as meal,0 as fine,0 as parking,0 as car_wash FROM vcarburant.transaction group by date(from_unixtime(created_at)) UNION
SELECT  date(from_unixtime(j.created_at)) as _date, 0 as leasing,0 as revenue,0 as fuel,sum(p.price*p.quantity) as garage,0 as meal,0 as fine,0 as parking,0 as car_wash FROM vcarburant.jobcard j join vcarburant.part_out p on j.no=p.job group by date(from_unixtime(j.created_at)) UNION
SELECT  date(from_unixtime(created_at)) as _date, 0 as leasing,0 as revenue,0 as fuel,0 as garage,sum(amount) as meal,0 as fine,0 as parking,0 as car_wash FROM vcarburant.meal_stipend group by date(from_unixtime(created_at)) union
SELECT date(from_unixtime(created_at)) as _date, 0 as leasing,0 as revenue,0 as fuel,0 as garage,0 as meal,0 as fine,SUM(price) as parking,0 as car_wash FROM vcarburant.parking_transaction group by date(from_unixtime(created_at)) UNION
SELECT date(from_unixtime(created_at)) as _date, 0 as leasing,0 as revenue,0 as fuel,0 as garage,0 as meal,sum(Amount) as fine,0 as parking,0 as car_wash FROM vcarburant.contervation group by date(from_unixtime(created_at))) t WHERE _date between :start and :end group by _date";

        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('general-report', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }





    public function actionMealStipendVehicle($start,$end){
        $sql="SELECT date(from_unixTime(created_at)) as _CDATE ,meal_stipend_id,meal_stipend_date as _Date,vehicle,amount FROM vcarburant.meal_stipend WHERE date(from_unixTime(created_at)) between :start and :end";

        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('meal-stipend-vehicle', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }

    
    public function actionCarRentalSchedule($start,$end){
        //$sql="SELECT c.name,c.phone,l.destination,departure_date,return_date,count(*) as quantity,price,sum(paid_amount) as paid_amount, payment_mode FROM vcarburant.car_leasing l join vcarburant.customers c on l.customer=c.phone group by c.name,c.phone,l.destination,departure_date,return_date,payment_mode,price WHERE date(from_unixTime(created_at)) between :start and :end";
    
        $sql="SELECT date(from_unixTime(created_at)) as _Date,l.vehicle,c.name,c.phone,l.destination,departure_date,return_date,count(*) as quantity,price,sum(paid_amount) as paid_amount,payment_mode FROM vcarburant.car_leasing l join vcarburant.customers c on l.customer=c.phone Where date(from_unixTime(created_at)) between :start and :end group by c.name,c.phone,l.destination,departure_date,return_date,payment_mode,price ";
        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t",$params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
             'params' => $params,
        ]);

        return $this->render('car-rental-schedule', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }
    public function actionContervation($start,$end){
        $sql="SELECT contervation_id,date,driver,vehicle,amount,location,fault FROM vcarburant.contervation WHERE date(from_unixTime(created_at)) between :start and :end";

        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('contervation', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }

    public function actionCarWash($start,$end){
        $sql="SELECT t.date  as _Date,t.price,t.vehicle,t.driver,c.name,c.location from vcarburant.car_wash c,vcarburant.car_wash_transaction t WHERE c.car_wash_id=t.car_wash_id and date(from_unixTime(t.created_at)) between :start and :end";

        $params = [':start' =>$start, ':end' => $end];

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) t", $params)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'params' => $params,
        ]);

        return $this->render('car-wash', [
            'dataProvider' => $dataProvider,
            'start' => $start,
            'end' => $end,
        ]);

    }



    
}
