<?php

namespace app\modules\api\modules\v1\models;

use Yii;
use app\traits\AuditTrailsTrait;
/**
 * This is the model class for table "bill_payments".
 *
 * @property int $no
 * @property int $amount
 * @property int $created_at
 * @property int $updated_at
 * @property string $payment_mode
 * @property string $bill
 * @property string $purchase_order
 * @property int $created_by
 * @property int $updated_by
 * @property int $account
 * @property string $bank_account
 *
 * @property Accounts $account0
 * @property BankAccounts $bankAccount
 * @property Bills $bill0
 * @property User $createdBy
 * @property User $updatedBy
 */
class BillPayments extends \yii\db\ActiveRecord
{
   use AuditTrailsTrait;
   /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill_payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'payment_mode', 'bill', 'purchase_order', 'account', 'bank_account'], 'required'],
            [['amount', 'created_at', 'updated_at', 'created_by', 'updated_by', 'account'], 'integer'],
            [['payment_mode', 'bill', 'bank_account'], 'string', 'max' => 55],
            [['purchase_order'], 'string', 'max' => 10],
            [['bill', 'purchase_order'], 'exist', 'skipOnError' => true, 'targetClass' => Bills::className(), 'targetAttribute' => ['bill' => 'no', 'purchase_order' => 'purchase_order']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['account' => 'id']],
            [['bank_account'], 'exist', 'skipOnError' => true, 'targetClass' => BankAccounts::className(), 'targetAttribute' => ['bank_account' => 'account']],
             
             ['amount', 'validateBank'],
             ['amount', 'validateAccount'],
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
            'bill' => Yii::t('app', 'Bill'),
            'purchase_order' => Yii::t('app', 'Purchase Order'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
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
     * Gets query for [[Bill0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBill0()
    {
        return $this->hasOne(Bills::className(), ['no' => 'bill', 'purchase_order' => 'purchase_order']);
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
     public function validateBank($attribute, $params)
    {
        $account = BankAccounts::find()->where(['account'=>$this->bank_account])->one();

        if ($account->balance<$this->amount) {
           $this->addError($attribute, 'Your Bank account balance is not enought! You have only '.$account->balance);
            }
        }
    public function validateAccount($attribute, $params)
    {
        //$part=Spares::find()->where(['part_no'=>$this->part])->one();
        $account = Accounts::find()->where(['id'=>$this->account])->one();
        if(!empty($account))
        {
       
            if($this->amount>$account->balance)
            {
                 $this->addError($attribute, 'Your account balance is not enought! You have only '.$account->balance);
            }
        }
        
    }
    
}
