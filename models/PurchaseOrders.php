<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "purchase_orders".
 *
 * @property int $purchase_number
 * @property string $po_date
 * @property string|null $reference
 * @property string|null $due_date
 * @property string $STATUS
 * @property int $tax_calculation
 * @property string|null $note
 * @property int $created_at
 * @property int $updated_at
 * @property float $amount
 * @property int $id
 * @property int $created_by
 * @property int $updated_by
 * @property int $supplier
 *
 * @property Bills[] $bills
 * @property Products[] $products
 * @property PurchaseDetails[] $purchaseDetails
 * @property Suppliers $supplier0
 */
class PurchaseOrders extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_number', 'po_date', 'STATUS', 'tax_calculation',  'amount', 'supplier'], 'required'],
            [[ 'tax_calculation', 'created_at', 'updated_at', 'created_by', 'updated_by', 'supplier'], 'integer'],
            [['amount'], 'number'],
            [['purchase_number','po_date', 'reference', 'due_date', 'STATUS'], 'string', 'max' => 25],
            [['note'], 'string', 'max' => 200],
            [['purchase_number'], 'unique'],
            [['supplier'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::class, 'targetAttribute' => ['supplier' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'purchase_number' => Yii::t('app', 'Purchase Number'),
            'po_date' => Yii::t('app', 'Po Date'),
            'reference' => Yii::t('app', 'Reference'),
            'due_date' => Yii::t('app', 'Due Date'),
            'STATUS' => Yii::t('app', 'Status'),
            'tax_calculation' => Yii::t('app', 'Tax Calculation'),
            'note' => Yii::t('app', 'Note'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'amount' => Yii::t('app', 'Amount'),
            'id' => Yii::t('app', 'ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'supplier' => Yii::t('app', 'Supplier'),
        ];
    }

    /**
     * Gets query for [[Bills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bills::class, ['purchase_number' => 'purchase_number']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['id' => 'product'])->viaTable('purchase_details', ['purchase_number' => 'purchase_number']);
    }

    /**
     * Gets query for [[PurchaseDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class, ['purchase_number' => 'purchase_number']);
    }

    /**
     * Gets query for [[Supplier0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier0()
    {
        return $this->hasOne(Suppliers::class, ['id' => 'supplier']);
    }
}
