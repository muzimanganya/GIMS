<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "stock_movemements".
 *
 * @property int $id
 * @property string $mouvement_date
 * @property float $quantitty
 * @property int $created_at
 * @property int $updated_at
 * @property string $TYPE
 * @property string|null $reference
 * @property int $created_by
 * @property int $updated_by
 * @property int $store_from
 * @property int $store_to
 * @property int $product
 *
 * @property Products $product0
 * @property Stores $storeFrom
 * @property Stores $storeTo
 */
class StockMovemements extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_movemements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mouvement_date', 'quantitty', 'TYPE', 'store_from', 'store_to', 'product'], 'required'],
            [['quantitty'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'store_from', 'store_to', 'product'], 'integer'],
            [['mouvement_date'], 'string', 'max' => 22],
            [['TYPE'], 'string', 'max' => 10],
            [['reference'], 'string', 'max' => 25],
            [['store_from'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::class, 'targetAttribute' => ['store_from' => 'id']],
            [['store_to'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::class, 'targetAttribute' => ['store_to' => 'id']],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mouvement_date' => Yii::t('app', 'Mouvement Date'),
            'quantitty' => Yii::t('app', 'Quantitty'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'TYPE' => Yii::t('app', 'Type'),
            'reference' => Yii::t('app', 'Reference'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'store_from' => Yii::t('app', 'Store From'),
            'store_to' => Yii::t('app', 'Store To'),
            'product' => Yii::t('app', 'Product'),
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
     * Gets query for [[StoreFrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoreFrom()
    {
        return $this->hasOne(Stores::class, ['id' => 'store_from']);
    }

    /**
     * Gets query for [[StoreTo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoreTo()
    {
        return $this->hasOne(Stores::class, ['id' => 'store_to']);
    }
}
