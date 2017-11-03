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
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="tel:<?=$ad->phone;?>"><?=$ad->phone;?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?=$ad->date;?>
                        </li>
                    </ol>
                </nav>
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
