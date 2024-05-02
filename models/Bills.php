<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "bills".
 *
 * @property string $bill_no
 * @property string $bill_date
 * @property string|null $reference
 * @property string $STATUS
 * @property string $tax_catculation
 * @property string|null $note
 * @property string|null $due_date
 * @property int $created_at
 * @property int $updated_at
 * @property float $amount
 * @property int $id
 * @property int $created_by
 * @property int $updated_by
 * @property int $vendor
 * @property int|null $purchase_number
 *
 * @property BillDetails[] $billDetails
 * @property Payments[] $payments
 * @property Products[] $products
 * @property PurchaseOrders $purchaseNumber
 * @property Suppliers $vendor0
 */
class Bills extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bill_no', 'bill_date', 'tax_catculation', 'amount', 'vendor'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'vendor', 'purchase_number'], 'integer'],
            [['amount'], 'number'],
            [['bill_no'], 'string', 'max' => 15],
            [['bill_date', 'reference', 'STATUS', 'tax_catculation'], 'string', 'max' => 25],
            [['note', 'due_date'], 'string', 'max' => 200],
            [['bill_no'], 'unique'],
            [['vendor'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::class, 'targetAttribute' => ['vendor' => 'id']],
            [['purchase_number'], 'exist', 'skipOnError' => true, 'targetClass' => PurchaseOrders::class, 'targetAttribute' => ['purchase_number' => 'purchase_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bill_no' => Yii::t('app', 'Bill No'),
            'bill_date' => Yii::t('app', 'Bill Date'),
            'reference' => Yii::t('app', 'Reference'),
            'STATUS' => Yii::t('app', 'Status'),
            'tax_catculation' => Yii::t('app', 'Tax Catculation'),
            'note' => Yii::t('app', 'Note'),
            'due_date' => Yii::t('app', 'Due Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'amount' => Yii::t('app', 'Amount'),
            'id' => Yii::t('app', 'ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'vendor' => Yii::t('app', 'Vendor'),
            'purchase_number' => Yii::t('app', 'Purchase Number'),
        ];
    }

    /**
     * Gets query for [[BillDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetails::class, ['bill_no' => 'bill_no']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::class, ['bill_no' => 'bill_no']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['id' => 'product'])->viaTable('bill_details', ['bill_no' => 'bill_no']);
    }

    /**
     * Gets query for [[PurchaseNumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseNumber()
    {
        return $this->hasOne(PurchaseOrders::class, ['purchase_number' => 'purchase_number']);
    }

    /**
     * Gets query for [[Vendor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendor0()
    {
        return $this->hasOne(Suppliers::class, ['id' => 'vendor']);
    }
}
