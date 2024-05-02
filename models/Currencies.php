<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "currencies".
 *
 * @property string $CODE
 * @property string $NAME
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $symbol
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BankAccounts[] $bankAccounts
 * @property Payments[] $payments
 */
class Currencies extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
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
            [['CODE', 'NAME'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['CODE'], 'string', 'max' => 20],
            [['NAME'], 'string', 'max' => 100],
            [['symbol'], 'string', 'max' => 5],
            [['NAME'], 'unique'],
            [['CODE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CODE' => Yii::t('app', 'Code'),
            'NAME' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'symbol' => Yii::t('app', 'Symbol'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[BankAccounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankAccounts()
    {
        return $this->hasMany(BankAccounts::class, ['currency' => 'CODE']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::class, ['currency' => 'CODE']);
    }
}
