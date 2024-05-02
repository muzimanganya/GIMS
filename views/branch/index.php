<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\api\modules\v1\models\Branch;
use app\modules\api\modules\v1\models\BranchService;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\api\modules\v1\models\SearchBranch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Branches');
$this->params['breadcrumbs'][] = $this->title;
$branches=Branch::find()->All();
// var_dump($branches);
// die;
?>
<div class="branch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Branch'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 

    foreach($branches as $branch)
    {
        $services=BranchService::find()->where(['branch'=>$branch->id])->all();
     echo '<LI><span><strong>'.$branch->name.'</strong></span>
      ';
     foreach($services as $service)
     {
        echo'
        <UL>
    <LI>'.$service->service.'</LI>
   
   </UL>';

     }
     echo'</LI>';
  
       

    }
?>


</div>
<script type="text/javascript">
var allSpan = document.getElementsByTagName('span');

for(var x = 0; x < allSpan.length; x++)
{
    allSpan[x].onclick=function()
    {
        if(this.parentNode)
        {
            var childList = this.parentNode.getElementsByTagName('LI');
            for(var y = 0; y< childList.length;y++)
            {
                var currentState = childList[y].style.display;
                if(currentState=="none")
                {
                    childList[y].style.display="block";
                }
                else
                {
                    childList[y].style.display="none";
                }
            }
        }
    }
}
</script>