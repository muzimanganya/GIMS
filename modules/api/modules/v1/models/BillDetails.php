<?php

namespace app\modules\api\modules\v1\models;

use Yii;
use app\traits\AuditTrailsTrait;
/**
 * This is the model class for table "bill_details".
 *
 * @property int $quantity
 * @property int $price
 * @property int $tax
 * @property int $created_at
 * @property int $updated_at
 * @property string $bill
 * @property string $purchase_order
 * @property int $created_by
 * @property int $updated_by
 * @property string $item
 *
 * @property Bills $bill0
 * @property User $createdBy
 * @property Products $item0
 * @property User $updatedBy
 */
class BillDetails extends \yii\db\ActiveRecord
{
		use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
	 
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
    public static function tableName()
    {
        return 'bill_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'price', 'bill', 'purchase_order', 'item'], 'required'],
			 ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE, self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE
            ],
            [['quantity', 'price', 'tax', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['bill'], 'string', 'max' => 55],
            [['purchase_order'], 'string', 'max' => 10],
            [['item'], 'string', 'max' => 25],
            [['bill', 'purchase_order', 'item'], 'unique', 'targetAttribute' => ['bill', 'purchase_order', 'item']],
            [['bill', 'purchase_order'], 'exist', 'skipOnError' => true, 'targetClass' => Bills::className(), 'targetAttribute' => ['bill' => 'no', 'purchase_order' => 'purchase_order']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['item'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['item' => 'code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'tax' => Yii::t('app', 'Tax'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'bill' => Yii::t('app', 'Bill'),
            'purchase_order' => Yii::t('app', 'Purchase Order'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'item' => Yii::t('app', 'Item'),
        ];
    }

    /**
     * Gets query for [[Bill0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBill0()
    {
        return $this->hasOne(Bills::className(), ['no' => 'bill', 'purchase_order' => 'purchase_order']);
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
     * Gets query for [[Item0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem0()
    {
        return $this->hasOne(Products::className(), ['code' => 'item']);
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
