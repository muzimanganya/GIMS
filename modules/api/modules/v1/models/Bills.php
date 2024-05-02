<?php

namespace app\modules\api\modules\v1\models;

use Yii;
use app\traits\AuditTrailsTrait;
/**
 * This is the model class for table "bills".
 *
 * @property string $no
 * @property int $created_at
 * @property int $updated_at
 * @property string $memo
 * @property string $bill_document
 * @property string $purchase_order
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 *
 * @property BillDetails[] $billDetails
 * @property BillPayments[] $billPayments
 * @property User $createdBy
 * @property Products[] $items
 * @property PurchaseOrders $purchaseOrder
 * @property User $updatedBy
 */
class Bills extends \yii\db\ActiveRecord
{
		use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
	 
	public $bill_document;
    public $logoPath;
    public $logoUrl = '@web/uploads/logo/';

    public function init()
    {
        parent::init();
        $this->logoPath = Yii::getAlias('@webroot/uploads/logo/');

        if (!file_exists($this->logoPath)) {
            mkdir($this->logoPath, 0777, true);
        }
    }
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
            [['no', 'purchase_order','branch'], 'required'],
            [['created_at', 'updated_at','branch', 'created_by', 'updated_by','status'], 'integer'],
            [['no'], 'string', 'max' => 55],
            [['memo'], 'string', 'max' => 100],
			[['bill_document'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg'],
            [['purchase_order'], 'string', 'max' => 10],
            [['no', 'purchase_order'], 'unique', 'targetAttribute' => ['no', 'purchase_order']],
            [['branch'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch' => 'id']],

            [['purchase_order'], 'exist', 'skipOnError' => true, 'targetClass' => PurchaseOrders::className(), 'targetAttribute' => ['purchase_order' => 'no']],
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
            'no' => Yii::t('app', 'Bill No'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'memo' => Yii::t('app', 'Memo'),
            'bill_document' => Yii::t('app', 'Bill Document'),
            'purchase_order' => Yii::t('app', 'Purchase Order'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
			'status'=>Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[BillDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetails::className(), ['bill' => 'no', 'purchase_order' => 'purchase_order']);
    }

    /**
     * Gets query for [[BillPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillPayments()
    {
        return $this->hasMany(BillPayments::className(), ['bill' => 'no', 'purchase_order' => 'purchase_order']);
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
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Products::className(), ['code' => 'item'])->viaTable('bill_details', ['bill' => 'no', 'purchase_order' => 'purchase_order']);
    }

    /**
     * Gets query for [[PurchaseOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrder()
    {
        return $this->hasOne(PurchaseOrders::className(), ['no' => 'purchase_order']);
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
