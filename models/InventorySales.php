<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_sales".
 *
 * @property int $id
 * @property string $customer
 * @property string $sale_date
 * @property int $store
 * @property string $bank_account
 * @property int|null $cerated_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class InventorySales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory_sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer', 'sale_date', 'store', 'bank_account'], 'required'],
            [['store', 'cerated_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['customer', 'sale_date', 'bank_account'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer' => Yii::t('app', 'Customer'),
            'sale_date' => Yii::t('app', 'Sale Date'),
            'store' => Yii::t('app', 'Store'),
            'bank_account' => Yii::t('app', 'Account'),
            'cerated_at' => Yii::t('app', 'Cerated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
