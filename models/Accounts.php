<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property string $CODE
 * @property string $NAME
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $category
 * @property string $TYPE
 *
 * @property BillDetails[] $billDetails
 * @property AccountCategories $category0
 * @property Products[] $products
 * @property Products[] $products0
 * @property Products[] $products1
 * @property PurchaseDetails[] $purchaseDetails
 * @property StockAdjustments[] $stockAdjustments
 * @property AccountTypes $tYPE
 */
class Accounts extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CODE', 'NAME', 'category', 'TYPE'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['CODE', 'NAME', 'category', 'TYPE'], 'string', 'max' => 50],
            [['NAME'], 'unique'],
            [['CODE'], 'unique'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => AccountCategories::class, 'targetAttribute' => ['category' => 'CODE']],
            [['TYPE'], 'exist', 'skipOnError' => true, 'targetClass' => AccountTypes::class, 'targetAttribute' => ['TYPE' => 'CODE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CODE' => Yii::t('app', 'Code'),
            'NAME' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'category' => Yii::t('app', 'Category'),
            'TYPE' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * Gets query for [[BillDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetails::class, ['ACCOUNT' => 'CODE']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(AccountCategories::class, ['CODE' => 'category']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['sales_account' => 'CODE']);
    }

    /**
     * Gets query for [[Products0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts0()
    {
        return $this->hasMany(Products::class, ['purchase_account' => 'CODE']);
    }

    /**
     * Gets query for [[Products1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts1()
    {
        return $this->hasMany(Products::class, ['discount_account' => 'CODE']);
    }

    /**
     * Gets query for [[PurchaseDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class, ['ACCOUNT' => 'CODE']);
    }

    /**
     * Gets query for [[StockAdjustments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStockAdjustments()
    {
        return $this->hasMany(StockAdjustments::class, ['ACCOUNT' => 'CODE']);
    }

    /**
     * Gets query for [[TYPE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(AccountTypes::class, ['CODE' => 'TYPE']);
    }
}
