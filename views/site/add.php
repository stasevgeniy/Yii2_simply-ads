<?php

/* @var $this yii\web\View
 With using PhoneInput : https://github.com/Borales/yii2-phone-input
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;

$this->title = 'Добавить объявление';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($ok): ?>
    <div class="alert alert-success">
        Спасибо, Ваше объявление добавлено
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-lg-5">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'phone')->widget(PhoneInput::className(), [
            'jsOptions' => [
                'preferredCountries' => ['no', 'pl', 'ua'],
            ]
        ])->label('Ваш телефон')?>


            <?= $form->field($model, 'title')->label('Заголовок объявления') ?>
            <?= $form->field($model, 'text')->textArea(['rows' => '4'])->label('Текст объявления') ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <?php endif; ?>
</div>
