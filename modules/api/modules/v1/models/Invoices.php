<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "invoices".
 *
 * @property string $no
 * @property int $discount
 * @property string $memo
 * @property string $status
 * @property string $payment_due
 * @property int $created_at
 * @property int $updated_at
 * @property string $customer
 * @property int $created_by
 * @property int $updated_by
  * @property string $idate
 *
 * @property User $createdBy
 * @property Customers $customer0
 * @property InvoiceDetails[] $invoiceDetails
 * @property InvoicePayments $invoicePayments
 * @property Products[] $items
 * @property User $updatedBy
 */
class Invoices extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no', 'idate', 'customer','branch','payment_due'], 'required'],
            [['discount', 'created_at', 'updated_at', 'created_by', 'updated_by', 'branch'], 'integer'],
            [['no', 'memo', 'status'], 'string', 'max' => 55],
            [['payment_due'], 'string', 'max' => 25],
            [['customer', 'idate'], 'string', 'max' => 50],
            [['no'], 'unique'],
            [['customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customer' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no' => Yii::t('app', 'No'),
            'discount' => Yii::t('app', 'Discount'),
            'memo' => Yii::t('app', 'Memo'),
            'status' => Yii::t('app', 'Status'),
            'payment_due' => Yii::t('app', 'Payment Due'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'customer' => Yii::t('app', 'Customer'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'branch' => Yii::t('app', 'Branch'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Customer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer0()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customer']);
    }

    /**
     * Gets query for [[InvoiceDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetails::className(), ['invoice' => 'no']);
    }

    /**
     * Gets query for [[InvoicePayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoicePayments()
    {
        return $this->hasOne(InvoicePayments::className(), ['invoice' => 'no']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Products::className(), ['code' => 'item'])->viaTable('invoice_details', ['invoice' => 'no']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
