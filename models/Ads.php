<?php
/*
 * Ads object
 * */

namespace app\models;
use yii\db\ActiveRecord;

class Ads extends ActiveRecord
{
    private $phone;
    private $title;
    private $text;
}