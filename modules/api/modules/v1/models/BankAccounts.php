<?php

namespace app\modules\api\modules\v1\models;

use Yii;
use app\traits\AuditTrailsTrait;
/**
 * This is the model class for table "bank_accounts".
 *
 * @property string $account
 * @property string $name
 * @property string $bank
 * @property int $created_at
 * @property int $updated_at
 * @property string $currency
 * @property int $balance
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BillPayments[] $billPayments
 * @property User $createdBy
 * @property InvoicePayments[] $invoicePayments
 * @property User $updatedBy
 */
class BankAccounts extends \yii\db\ActiveRecord
{
	use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'name', 'bank',  'currency'], 'required'],
            [['created_at', 'updated_at', 'balance', 'created_by', 'updated_by'], 'integer'],
             [['balance'], 'number'],
            [['account', 'currency'], 'string', 'max' => 55],
            [['name', 'bank'], 'string', 'max' => 100],
            [['account'], 'unique'],
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
            'account' => Yii::t('app', 'Account'),
            'name' => Yii::t('app', 'Name'),
            'bank' => Yii::t('app', 'Bank'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'currency' => Yii::t('app', 'Currency'),
            'balance' => Yii::t('app', 'Balance'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[BillPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillPayments()
    {
        return $this->hasMany(BillPayments::className(), ['bank_account' => 'account']);
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
     * Gets query for [[InvoicePayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoicePayments()
    {
        return $this->hasMany(InvoicePayments::className(), ['bank_account' => 'account']);
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
