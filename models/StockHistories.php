<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "stock_history".
 *
 * @property float $stock_in
 * @property float $stock_out
 * @property float $previous_balance
 * @property float $Balance
 * @property int $id
 * @property float $previous_price
 * @property float $new_price
 * @property float $current_price
 * @property string $type
 * @property float $quantity
 * @property string $reference
 * @property int $product
 * @property int $store
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $updated_at
 *
 * @property Products $product0
 * @property Stores $store0
 */
class StockHistories extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_in', 'stock_out', 'previous_balance', 'Balance', 'previous_price', 'new_price', 'current_price', 'type', 'quantity', 'reference', 'product', 'store'], 'required'],
            [['stock_in', 'stock_out', 'previous_balance', 'Balance', 'previous_price', 'new_price', 'current_price', 'quantity'], 'number'],
            [['product', 'store', 'created_at', 'created_by', 'updated_by', 'updated_at'], 'integer'],
            [['type', 'reference'], 'string', 'max' => 25],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product' => 'id']],
            [['store'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::class, 'targetAttribute' => ['store' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stock_in' => Yii::t('app', 'Stock In'),
            'stock_out' => Yii::t('app', 'Stock Out'),
            'previous_balance' => Yii::t('app', 'Previous Balance'),
            'Balance' => Yii::t('app', 'Balance'),
            'id' => Yii::t('app', 'ID'),
            'previous_price' => Yii::t('app', 'Previous Price'),
            'new_price' => Yii::t('app', 'New Price'),
            'current_price' => Yii::t('app', 'Current Price'),
            'type' => Yii::t('app', 'Type'),
            'quantity' => Yii::t('app', 'Quantity'),
            'reference' => Yii::t('app', 'Reference'),
            'product' => Yii::t('app', 'Product'),
            'store' => Yii::t('app', 'Store'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
     * Gets query for [[Store0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore0()
    {
        return $this->hasOne(Stores::class, ['id' => 'store']);
    }
}
