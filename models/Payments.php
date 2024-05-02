<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $NO
 * @property float $amount
 * @property string $reference
 * @property string $date_of_payment
 * @property int $created_at
 * @property int $updated_at
 * @property float $outstanding
 * @property int $created_by
 * @property int $updated_by
 * @property string $currency
 * @property int $payment_mode
 * @property string $bill_no
 * @property string $pay_from
 *
 * @property Bills $billNo
 * @property Currencies $currency0
 * @property BankAccounts $payFrom
 * @property PaymentModes $paymentMode
 */
class Payments extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount',  'date_of_payment', 'currency', 'payment_mode', 'bill_no', 'pay_from'], 'required'],
            [['amount', 'outstanding'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'payment_mode'], 'integer'],
            [['reference', 'date_of_payment'], 'string', 'max' => 25],
            [['currency'], 'string', 'max' => 20],
            [['bill_no'], 'string', 'max' => 15],
            [['pay_from'], 'string', 'max' => 100],
            [['currency'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::class, 'targetAttribute' => ['currency' => 'CODE']],
            [['payment_mode'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentModes::class, 'targetAttribute' => ['payment_mode' => 'id']],
            [['bill_no'], 'exist', 'skipOnError' => true, 'targetClass' => Bills::class, 'targetAttribute' => ['bill_no' => 'bill_no']],
            [['pay_from'], 'exist', 'skipOnError' => true, 'targetClass' => BankAccounts::class, 'targetAttribute' => ['pay_from' => 'NAME']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NO' => Yii::t('app', 'No'),
            'amount' => Yii::t('app', 'Amount'),
            'reference' => Yii::t('app', 'Reference'),
            'date_of_payment' => Yii::t('app', 'Date Of Payment'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'outstanding' => Yii::t('app', 'Outstanding'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'currency' => Yii::t('app', 'Currency'),
            'payment_mode' => Yii::t('app', 'Payment Mode'),
            'bill_no' => Yii::t('app', 'Bill No'),
            'pay_from' => Yii::t('app', 'Pay From'),
        ];
    }

    /**
     * Gets query for [[BillNo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillNo()
    {
        return $this->hasOne(Bills::class, ['bill_no' => 'bill_no']);
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
     * Gets query for [[PayFrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayFrom()
    {
        return $this->hasOne(BankAccounts::class, ['NAME' => 'pay_from']);
    }

    /**
     * Gets query for [[PaymentMode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMode()
    {
        return $this->hasOne(PaymentModes::class, ['id' => 'payment_mode']);
    }
}
