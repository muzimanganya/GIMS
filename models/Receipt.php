<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receipt".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property ReceiptDetail[] $receiptDetails
 */
class Receipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * Gets query for [[ReceiptDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReceiptDetails()
    {
        return $this->hasMany(ReceiptDetail::className(), ['receipt_id' => 'id']);
    }
}
