<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "stock_adjustments".
 *
 * @property int $id
 * @property int $TYPE
 * @property string|null $adjustement_date
 * @property string|null $reference
 * @property string|null $observation
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $product
 * @property int $store
 * @property string $ACCOUNT
 *
 * @property Accounts $aCCOUNT
 * @property Products $product0
 * @property Stores $store0
 */
class StockAdjustments extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock_adjustments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TYPE', 'product', 'store', 'ACCOUNT'], 'required'],
            [['TYPE', 'created_at', 'updated_at', 'created_by', 'updated_by', 'product', 'store'], 'integer'],
            [['adjustement_date'], 'string', 'max' => 20],
            [['reference'], 'string', 'max' => 25],
            [['observation'], 'string', 'max' => 100],
            [['ACCOUNT'], 'string', 'max' => 50],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product' => 'id']],
            [['store'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::class, 'targetAttribute' => ['store' => 'id']],
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
            'TYPE' => Yii::t('app', 'Type'),
            'adjustement_date' => Yii::t('app', 'Adjustement Date'),
            'reference' => Yii::t('app', 'Reference'),
            'observation' => Yii::t('app', 'Observation'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'product' => Yii::t('app', 'Product'),
            'store' => Yii::t('app', 'Store'),
            'ACCOUNT' => Yii::t('app', 'Account'),
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
     * Gets query for [[Store0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore0()
    {
        return $this->hasOne(Stores::class, ['id' => 'store']);
    }
}
