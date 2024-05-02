<?php

namespace app\modules\api\modules\v1\models;

use Yii;
use app\traits\AuditTrailsTrait;
/**
 * This is the model class for table "estmates".
 *
 * @property string $no
 * @property string $expiration_date
 * @property int $status
 * @property int $discount
 * @property int $created_at
 * @property int $updated_at
 * @property string $memo
 * @property int $created_by
 * @property int $updated_by
 * @property string $customer
 *
 * @property User $createdBy
 * @property Customers $customer0
 * @property EstmateDetails[] $estmateDetails
 * @property Products[] $items
 * @property User $updatedBy
 */
class Estmates extends \yii\db\ActiveRecord
{
	use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estmates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no','customer'], 'required'],
            [['status', 'discount', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['no'], 'string', 'max' => 55],
            [['expiration_date'], 'string', 'max' => 15],
            [['memo'], 'string', 'max' => 100],
            [['customer'], 'string', 'max' => 50],
            [['no'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customer' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no' => Yii::t('app', 'No'),
            'expiration_date' => Yii::t('app', 'Expiration Date'),
            'status' => Yii::t('app', 'Status'),
            'discount' => Yii::t('app', 'Discount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'memo' => Yii::t('app', 'Memo'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'customer' => Yii::t('app', 'Customer'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Customer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer0()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customer']);
    }

    /**
     * Gets query for [[EstmateDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstmateDetails()
    {
        return $this->hasMany(EstmateDetails::className(), ['estimate' => 'no']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Products::className(), ['code' => 'item'])->viaTable('estmate_details', ['estimate' => 'no']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
