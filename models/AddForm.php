<?php
/**
 * Add new ads form
 * Using PhoneInputValidator
 */

namespace app\models;
use yii\base\Model;
use borales\extensions\phoneInput\PhoneInputValidator;

class AddForm extends Model
{
    public $name;
    public $phone;
    public $title;
    public $text;

    public function rules()
    {
        return [
            [['phone','title','text'], 'required'],
            [['phone'], PhoneInputValidator::className()],
        ];
    }
}