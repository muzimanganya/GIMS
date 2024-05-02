<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "bank_accounts".
 *
 * @property string $NAME
 * @property string|null $account_number
 * @property int $on_dashboard
 * @property int $restricted
 * @property float|null $balance
 * @property int $created_by
 * @property int $updated_by
 * @property string $currency
 *
 * @property Currencies $currency0
 * @property Payments[] $payments
 */
class BankAccounts extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME' ,'currency'], 'required'],
            [['on_dashboard', 'restricted', 'created_by', 'updated_by'], 'integer'],
            [['balance'], 'number'],
            [['NAME'], 'string', 'max' => 100],
            [['account_number'], 'string', 'max' => 30],
            [['currency'], 'string', 'max' => 20],
            [['NAME'], 'unique'],
            [['currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::class, 'targetAttribute' => ['currency' => 'CODE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NAME' => Yii::t('app', 'Name'),
            'account_number' => Yii::t('app', 'Account Number'),
            'on_dashboard' => Yii::t('app', 'On Dashboard'),
            'restricted' => Yii::t('app', 'Restricted'),
            'balance' => Yii::t('app', 'Balance'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'currency' => Yii::t('app', 'Currency'),
        ];
    }

    /**
     * Gets query for [[Currency0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency0()
    {
        return $this->hasOne(Currencies::class, ['CODE' => 'currency']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::class, ['pay_from' => 'NAME']);
    }
}
