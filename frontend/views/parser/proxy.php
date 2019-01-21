<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Навтройка прокси';
//$this->params['breadcrumbs'][] = $this->title;

$this->params['breadcrumbs'][] = ['label' => 'Парсинг', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'История запросов', 'url' => ['history']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


    <p><b>Выбраный прокси:</b> <?php echo $model->getActiveProxy(); ?></p>
    
    <hr>
    <p><b>Изменить на: </b>
        <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($model, 'ip'); ?>
                <?php echo Html::submitButton("Изменить", ['class' => 'btn btn-info']); ?>
        <?php ActiveForm::end(); ?>

    </p>
    <hr>




