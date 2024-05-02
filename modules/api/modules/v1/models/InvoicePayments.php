<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "invoice_payments".
 *
 * @property int $no
 * @property int $amount
 * @property int $created_at
 * @property int $updated_at
 * @property string $payment_mode
 * @property int $created_by
 * @property int $updated_by
 * @property string $invoice
 * @property int $account
 * @property string $bank_account
 *
 * @property Accounts $account0
 * @property BankAccounts $bankAccount
 * @property User $createdBy
 * @property Invoices $invoice0
 * @property User $updatedBy
 */
class InvoicePayments extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'payment_mode', 'invoice', 'account', 'bank_account'], 'required'],
            [['amount', 'created_at', 'updated_at', 'created_by', 'updated_by', 'account'], 'integer'],
            [['payment_mode'], 'string', 'max' => 45],
            [['invoice', 'bank_account'], 'string', 'max' => 55],
           
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['invoice'], 'exist', 'skipOnError' => true, 'targetClass' => Invoices::className(), 'targetAttribute' => ['invoice' => 'no']],
            [['account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['account' => 'id']],
            [['bank_account'], 'exist', 'skipOnError' => true, 'targetClass' => BankAccounts::className(), 'targetAttribute' => ['bank_account' => 'account']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no' => Yii::t('app', 'No'),
            'amount' => Yii::t('app', 'Amount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'payment_mode' => Yii::t('app', 'Payment Mode'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'invoice' => Yii::t('app', 'Invoice'),
            'account' => Yii::t('app', 'Account'),
            'bank_account' => Yii::t('app', 'Bank Account'),
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
     * Gets query for [[BankAccount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankAccount()
    {
        return $this->hasOne(BankAccounts::className(), ['account' => 'bank_account']);
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
     * Gets query for [[Invoice0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice0()
    {
        return $this->hasOne(Invoices::className(), ['no' => 'invoice']);
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
