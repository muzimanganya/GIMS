<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $name
 * @property int $type
 * @property string $code
 * @property string $category
 * @property int $tax
 * @property int $quantitt
 * @property int $buying_price
 * @property int $selling_price
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property string $memo
 * @property string $unit
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BillDetails[] $billDetails
 * @property Bills[] $bills
 * @property User $createdBy
 * @property Estmates[] $estimates
 * @property EstmateDetails[] $estmateDetails
 * @property InvoiceDetails[] $invoiceDetails
 * @property Invoices[] $invoices
 * @property PurchaseOrders[] $orderNos
 * @property PurchaseOrderDetails[] $purchaseOrderDetails
 * @property User $updatedBy
 */
class Products extends \yii\db\ActiveRecord
{
	use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'code', 'tax', 'unit'], 'required'],
            [['type', 'tax', 'quantitt', 'buying_price', 'selling_price', 'created_at', 'updated_at', 'status', 'created_by', 'updated_by'], 'integer'],
            [['name', 'memo'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 25],
            [['category', 'unit'], 'string', 'max' => 50],
            [['code'], 'unique'],
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
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'code' => Yii::t('app', 'Code'),
            'category' => Yii::t('app', 'Category'),
            'tax' => Yii::t('app', 'Tax'),
            'quantitt' => Yii::t('app', 'Quantity'),
            'buying_price' => Yii::t('app', 'Buying Price'),
            'selling_price' => Yii::t('app', 'Selling Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'memo' => Yii::t('app', 'Memo'),
            'unit' => Yii::t('app', 'Unit'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[BillDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetails::className(), ['item' => 'code']);
    }

    /**
     * Gets query for [[Bills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bills::className(), ['no' => 'bill', 'purchase_order' => 'purchase_order'])->viaTable('bill_details', ['item' => 'code']);
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
     * Gets query for [[Estimates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstimates()
    {
        return $this->hasMany(Estmates::className(), ['no' => 'estimate'])->viaTable('estmate_details', ['item' => 'code']);
    }

    /**
     * Gets query for [[EstmateDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstmateDetails()
    {
        return $this->hasMany(EstmateDetails::className(), ['item' => 'code']);
    }

    /**
     * Gets query for [[InvoiceDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetails::className(), ['item' => 'code']);
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoices::className(), ['no' => 'invoice'])->viaTable('invoice_details', ['item' => 'code']);
    }

    /**
     * Gets query for [[OrderNos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderNos()
    {
        return $this->hasMany(PurchaseOrders::className(), ['no' => 'order_no'])->viaTable('purchase_order_details', ['product' => 'code']);
    }

    /**
     * Gets query for [[PurchaseOrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetails::className(), ['product' => 'code']);
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
