<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "invoice_details".
 *
 * @property int $quantity
 * @property int $price
 * @property int $currency
 * @property int $created_at
 * @property int $updated_at
 * @property int $reconciled
 * @property string $item
 * @property string $invoice
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property Invoices $invoice0
 * @property Products $item0
 * @property User $updatedBy
 */
class InvoiceDetails extends \yii\db\ActiveRecord
{
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
        return 'invoice_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'price','item', 'invoice'], 'required'],
            [['quantity', 'price', 'currency', 'created_at', 'updated_at', 'reconciled', 'created_by', 'updated_by'], 'integer'],
            [['item'], 'string', 'max' => 25],
			['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE, self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE
            ],
            [['invoice'], 'string', 'max' => 55],
            [['item', 'invoice'], 'unique', 'targetAttribute' => ['item', 'invoice']],
            // [['item'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['item' => 'code']],
            [['invoice'], 'exist', 'skipOnError' => true, 'targetClass' => Invoices::className(), 'targetAttribute' => ['invoice' => 'no']],
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
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'currency' => Yii::t('app', 'Currency'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'reconciled' => Yii::t('app', 'Reconciled'),
            'item' => Yii::t('app', 'Item'),
            'invoice' => Yii::t('app', 'Invoice'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
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
     * Gets query for [[Invoice0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice0()
    {
        return $this->hasOne(Invoices::className(), ['no' => 'invoice']);
    }

    /**
     * Gets query for [[Item0]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getItem0()
    // {
    //     return $this->hasOne(Products::className(), ['code' => 'item']);
    // }

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
