<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'История запросов';
//$this->params['breadcrumbs'][] = $this->title;

$this->params['breadcrumbs'][] = ['label' => 'Парсинг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройка прокси', 'url' => ['proxy']];
\yii\web\YiiAsset::register($this);
?>

<div class="parser-index">
    <h2>История парсинга</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'domain',
            'keyword',
            'position',
            'date',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<hr>
<hr>

</div>

