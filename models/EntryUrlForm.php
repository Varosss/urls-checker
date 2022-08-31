<?php

namespace app\models;

use yii\base\Model;

class EntryUrlForm extends Model
{
    public $address;
    public $check_frequency;
    public $error_check;

    public function rules()
    {
        return [
            [['address', 'check_frequency', 'error_check'], 'required'],
            ['address', 'url'],
            ['check_frequency', 'integer'],
            ['error_check', 'integer']
        ];
    }
}