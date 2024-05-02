<?php

namespace app\modules\api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property string $description
 * @property int $cr
 * @property int $dr
 * @property int $created_at
 * @property int $updated_at
 * @property int $account
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Accounts $account0
 * @property User $createdBy
 * @property User $updatedBy
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'cr', 'dr', 'account'], 'required'],
            [['cr', 'dr', 'created_at', 'updated_at', 'account', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string', 'max' => 100],
            [['account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['account' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'cr' => Yii::t('app', 'Cr'),
            'dr' => Yii::t('app', 'Dr'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'account' => Yii::t('app', 'Account'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Account0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccount0()
    {
        return $this->hasOne(Accounts::className(), ['id' => 'account']);
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
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
