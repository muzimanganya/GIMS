<?php

namespace app\modules\api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "currencies".
 *
 * @property string $abr
 * @property string|null $name
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currencies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['abr'], 'required'],
            [['abr'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 145],
            [['name'], 'unique'],
            [['abr'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'abr' => Yii::t('app', 'Abr'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
