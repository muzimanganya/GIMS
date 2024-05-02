<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "stores".
 *
 * @property int $id
 * @property string $NAME
 * @property string $location
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StockAdjustments[] $stockAdjustments
 * @property StockMovemements[] $stockMovemements
 * @property StockMovemements[] $stockMovemements0
 */
class Stores extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['NAME', 'location'], 'string', 'max' => 100],
            [['NAME'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'location' => Yii::t('app', 'Location'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[StockAdjustments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStockAdjustments()
    {
        return $this->hasMany(StockAdjustments::class, ['store' => 'id']);
    }

    /**
     * Gets query for [[StockMovemements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStockMovemements()
    {
        return $this->hasMany(StockMovemements::class, ['store_from' => 'id']);
    }

    /**
     * Gets query for [[StockMovemements0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStockMovemements0()
    {
        return $this->hasMany(StockMovemements::class, ['store_to' => 'id']);
    }
}
