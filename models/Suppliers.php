<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "suppliers".
 *
 * @property int $id
 * @property string $NAME
 * @property string|null $contact_person
 * @property string|null $contact_phone
 * @property string|null $address
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Bills[] $bills
 * @property PurchaseOrders[] $purchaseOrders
 */
class Suppliers extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suppliers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['NAME', 'contact_person', 'address'], 'string', 'max' => 100],
            [['contact_phone'], 'string', 'max' => 15],
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
            'contact_person' => Yii::t('app', 'Contact Person'),
            'contact_phone' => Yii::t('app', 'Contact Phone'),
            'address' => Yii::t('app', 'Address'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Bills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bills::class, ['vendor' => 'id']);
    }

    /**
     * Gets query for [[PurchaseOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrders::class, ['supplier' => 'id']);
    }
}
