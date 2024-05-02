<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "bill_details".
 *
 * @property int $id
 * @property float $unit_price
 * @property float $quantity
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $product
 * @property float $tax
 * @property string $ACCOUNT
 * @property string $bill_no
 *
 * @property Accounts $aCCOUNT
 * @property Bills $billNo
 * @property Products $product0
 * @property Taxes $tax0
 */
class BillDetails extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
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
            [['unit_price', 'quantity', 'product', 'tax', 'ACCOUNT', 'bill_no'], 'required'],
            [['unit_price', 'quantity', 'tax'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'product'], 'integer'],
            [['ACCOUNT'], 'string', 'max' => 50],
            [['bill_no'], 'string', 'max' => 15],
            [['product', 'bill_no'], 'unique', 'targetAttribute' => ['product', 'bill_no']],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product' => 'id']],
            [['tax'], 'exist', 'skipOnError' => true, 'targetClass' => Taxes::class, 'targetAttribute' => ['tax' => 'percent']],
            [['ACCOUNT'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::class, 'targetAttribute' => ['ACCOUNT' => 'CODE']],
            [['bill_no'], 'exist', 'skipOnError' => true, 'targetClass' => Bills::class, 'targetAttribute' => ['bill_no' => 'bill_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'unit_price' => Yii::t('app', 'Unit Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'product' => Yii::t('app', 'Product'),
            'tax' => Yii::t('app', 'Tax'),
            'ACCOUNT' => Yii::t('app', 'Account'),
            'bill_no' => Yii::t('app', 'Bill No'),
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
     * Gets query for [[BillNo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillNo()
    {
        return $this->hasOne(Bills::class, ['bill_no' => 'bill_no']);
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
}
