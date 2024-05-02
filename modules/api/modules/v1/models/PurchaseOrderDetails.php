<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "purchase_order_details".
 *
 * @property string $no
 * @property int $created_at
 * @property int $updated_at
 * @property int $quantity
 * @property int $price
 * @property string $memo
 * @property int $tax
 * @property string $product
 * @property string $order_no
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property PurchaseOrders $orderNo
 * @property Products $product0
 * @property User $updatedBy
 */
class PurchaseOrderDetails extends \yii\db\ActiveRecord
{
	use AuditTrailsTrait;
	const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';


    private $_updateType;

    public function getUpdateType()
    {
        if (empty($this->_updateType)) {
            if ($this->isNewRecord) {
                $this->_updateType = self::UPDATE_TYPE_CREATE;
            } else {
                $this->_updateType = self::UPDATE_TYPE_UPDATE;
            }
        }

        return $this->_updateType;
    }

    public function setUpdateType($value)
    {
        $this->_updateType = $value;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_order_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no','quantity', 'price',  'product', 'order_no'], 'required'],
            ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE, self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE
            ],
			[['created_at', 'updated_at', 'quantity', 'price', 'tax', 'created_by', 'updated_by'], 'integer'],
            [['no'], 'string', 'max' => 55],
            [['memo'], 'string', 'max' => 100],
            [['product'], 'string', 'max' => 25],
            [['order_no'], 'string', 'max' => 10],
            [['product', 'order_no'], 'unique', 'targetAttribute' => ['product', 'order_no']],
            [['no'], 'unique'],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product' => 'code']],
            [['order_no'], 'exist', 'skipOnError' => true, 'targetClass' => PurchaseOrders::className(), 'targetAttribute' => ['order_no' => 'no']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    

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
     * Gets query for [[OrderNo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderNo()
    {
        return $this->hasOne(PurchaseOrders::className(), ['no' => 'order_no']);
    }

    /**
     * Gets query for [[Product0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct0()
    {
        return $this->hasOne(Products::className(), ['code' => 'product']);
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
