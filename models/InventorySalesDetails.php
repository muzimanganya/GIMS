<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_sales_details".
 *
 * @property int $id
 * @property string $product
 * @property float $price
 * @property float $quantity
 * @property float $tax
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 * @property int $sale_id
 */
class InventorySalesDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory_sales_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product', 'price', 'quantity', 'created_at', 'created_by', 'updated_at', 'updated_by', 'sale_id'], 'required'],
            [['price', 'quantity', 'tax'], 'number'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'sale_id'], 'integer'],
            [['product'], 'string', 'max' => 45],
            [['product', 'sale_id'], 'unique', 'targetAttribute' => ['product', 'sale_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product' => Yii::t('app', 'Product'),
            'price' => Yii::t('app', 'Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'tax' => Yii::t('app', 'Tax'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'sale_id' => Yii::t('app', 'Sale ID'),
        ];
    }
}
