<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "purchase_orders".
 *
 * @property string $no
 * @property int $status
 * @property string $billing_cycle
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $supplier
 * @property string $currency
 *
 * @property Bills[] $bills
 * @property User $createdBy
 * @property Products[] $products
 * @property PurchaseOrderDetails[] $purchaseOrderDetails
 * @property Suppliers $supplier0
 * @property User $updatedBy
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
            [['no', 'billing_cycle', 'supplier'], 'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['no'], 'string', 'max' => 10],
            [['billing_cycle','currency'], 'string', 'max' => 55],
            [['supplier'], 'string', 'max' => 25],
            [['no'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['supplier'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplier' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no' => Yii::t('app', 'No'),
            'status' => Yii::t('app', 'Status'),
            'billing_cycle' => Yii::t('app', 'Billing Cycle'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
        return $this->hasMany(Bills::className(), ['purchase_order' => 'no']);
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
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['code' => 'product'])->viaTable('purchase_order_details', ['order_no' => 'no']);
    }

    /**
     * Gets query for [[PurchaseOrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetails::className(), ['order_no' => 'no']);
    }

    /**
     * Gets query for [[Supplier0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier0()
    {
        return $this->hasOne(Suppliers::className(), ['id' => 'supplier']);
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
