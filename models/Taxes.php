<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "taxes".
 *
 * @property string|null $NAME
 * @property float $percent
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BillDetails[] $billDetails
 * @property Products[] $products
 * @property Products[] $products0
 * @property PurchaseDetails[] $purchaseDetails
 */
class Taxes extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taxes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percent'], 'required'],
            [['percent'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['NAME'], 'string', 'max' => 25],
            [['percent'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NAME' => Yii::t('app', 'Name'),
            'percent' => Yii::t('app', 'Percent'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
        return $this->hasMany(BillDetails::class, ['tax' => 'percent']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['sales_tax' => 'percent']);
    }

    /**
     * Gets query for [[Products0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts0()
    {
        return $this->hasMany(Products::class, ['purchase_tax' => 'percent']);
    }

    /**
     * Gets query for [[PurchaseDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class, ['tax' => 'percent']);
    }
}
