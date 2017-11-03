<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Простой сайт с объявлениями</h1>

        <p class="lead">Используется Yii 2 + Twitter Bootstrap</p>
            <a target="_blank" class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a>
            <a target="_blank" class="btn btn-lg btn-primary" href="http://getbootstrap.com/">About Bootstrap</a>
    </div>

    <div class="body-content">
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
    </div>
</div>
