<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'search-form']); ?>

<?= $form->field($model, 'str')->textInput(['autofocus' => true])->label('Введите поисковой запрос'); ?>

<div class="form-group">
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
</div>

<?php ActiveForm::end(); ?>
<? if(!empty($ads)): ?>
    <?foreach ($ads as $ad): ?>
        <div class="card">
            <div class="card-block">
                <h4 class="card-title"><?=$ad->title;?></h4>
                <a href="tel:<?=$ad->phone;?>">
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge"><?=$ad->phone;?></span> </h6>
                </a>
                <p class="card-text"><?=$ad->text;?></p>
                <hr>
                <?php $form = ActiveForm::begin(['action' =>['search/']]); ?>
                <?= $form->field($model, 'str')->hiddenInput(['value'=>$ad->phone])->label(false); ?>
                <?= Html::submitButton('Все объявления автора', ['class' => 'btn btn-primary btn-block', 'name' => 'search-button']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    <?endforeach;?>
    <div>
        <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]);?>
    </div>
<?endif;?>
