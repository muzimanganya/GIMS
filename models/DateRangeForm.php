<?php
namespace app\models;

use yii\base\Model;

class DateRangeForm extends Model
{
    public $start;
    public $end;

    public function rules()
    {
        return [
            [['start', 'end'], 'safe'],
        ];
    }
}
