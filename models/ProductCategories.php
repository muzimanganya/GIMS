<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "product_categories".
 *
 * @property string $NAME
 * @property string $description
 * @property int $is_active
 * @property int $created_at
 * @property int $updated_at
 * @property int $id
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Products[] $products
 */
class ProductCategories extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['is_active', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['NAME', 'description'], 'string', 'max' => 100],
            [['NAME'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NAME' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'id' => Yii::t('app', 'ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['product_category' => 'id']);
    }
}
