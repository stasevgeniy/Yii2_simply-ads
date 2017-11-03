<?php
/**
 * Search ads form
 */

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $str;

    public function rules()
    {
        return [
            // str are required
            [['str'], 'required'],
        ];
    }
}