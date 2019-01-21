<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


$this->title = 'Парсинг';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'История запросов', 'url' => ['history']];
$this->params['breadcrumbs'][] = ['label' => 'Настройка прокси', 'url' => ['proxy']];
\yii\web\YiiAsset::register($this);
?>

<div class="parser-index">
    <h2>Выборка результатов из Google.com.ua</h2>
    <hr>

    <?php if (Yii::$app->session->hasFlash('success'))
            echo Yii::$app->session->getFlash('sucess');
    ?>

    Использовать прокси? <input type="checkbox" name="checkProxy" value="checkbox" <?php if (isset($_REQUEST['checkProxy'])) echo 'checked="checked"'; ?> >
    <hr>
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="container"> 
        <div class="row " style="background-color: #f7f7f7 ">
            <div class="col-md-12"><h4><b> Введите домен и ключевое слово</b></h4></div></div>
        <div class="row" style="background-color: #f0ffec">
            <div class="col-md-6"><?php echo $form->field($model, 'keyword'); ?></div>
            <div class="col-md-6"><?php echo $form->field($model, 'domain'); ?></div>
        </div>
        <div class="row" style="background-color: #f7f7f7"><div class="col-md-12"> <?php echo Html::submitButton("Запросить", ['class' => 'btn btn-info']); ?> </div></div>
    <?php ActiveForm::end(); ?>

    </div>
    <hr>

</div>

