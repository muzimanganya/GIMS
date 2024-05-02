<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "purchase_details".
 *
 * @property int $id
 * @property float $price
 * @property float $quantity
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $purchase_number
 * @property int $product
 * @property float $tax
 * @property string $ACCOUNT
 * @property int $received
 *
 * @property Accounts $aCCOUNT
 * @property Products $product0
 * @property Taxes $tax0
 */
class PurchaseDetails extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'quantity', 'created_at', 'updated_at', 'created_by', 'updated_by', 'purchase_number', 'product', 'tax', 'ACCOUNT', 'received'], 'required'],
            [['price', 'quantity', 'tax'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'product', 'received'], 'integer'],
            [['purchase_number'], 'string', 'max' => 25],
            [['ACCOUNT'], 'string', 'max' => 50],
            [['product', 'purchase_number'], 'unique', 'targetAttribute' => ['product', 'purchase_number']],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product' => 'id']],
            [['tax'], 'exist', 'skipOnError' => true, 'targetClass' => Taxes::class, 'targetAttribute' => ['tax' => 'percent']],
            [['ACCOUNT'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::class, 'targetAttribute' => ['ACCOUNT' => 'CODE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'price' => Yii::t('app', 'Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'purchase_number' => Yii::t('app', 'Purchase Number'),
            'product' => Yii::t('app', 'Product'),
            'tax' => Yii::t('app', 'Tax'),
            'ACCOUNT' => Yii::t('app', 'Account'),
            'received' => Yii::t('app', 'Received'),
        ];
    }

    /**
     * Gets query for [[ACCOUNT]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getACCOUNT()
    {
        return $this->hasOne(Accounts::class, ['CODE' => 'ACCOUNT']);
    }

    /**
     * Gets query for [[Product0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct0()
    {
        return $this->hasOne(Products::class, ['id' => 'product']);
    }

    /**
     * Gets query for [[Tax0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTax0()
    {
        return $this->hasOne(Taxes::class, ['percent' => 'tax']);
    }
    public static function getItems($po)
    {
        return self::find()->where(['purchase_number'=>$po])->all();
    }
}
