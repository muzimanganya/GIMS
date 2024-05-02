<?php

namespace app\modules\api\modules\v1\models;

use Yii;
use app\traits\AuditTrailsTrait;
/**
 * This is the model class for table "accounts".
 *
 * @property int $id
 * @property string $name
 * @property string $operation
 * @property string $memo
 * @property int $created_at
 * @property int $updated_at
 * @property int $balance
 * @property int $account_type
 * @property int $created_by
 * @property int $updated_by
 *
 * @property AccountCategories $accountType
 * @property BillPayments[] $billPayments
 * @property User $createdBy
 * @property InvoicePayments[] $invoicePayments
 * @property Transactions[] $transactions
 * @property User $updatedBy
 */
class Accounts extends \yii\db\ActiveRecord
{
	use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'operation',  'balance', 'account_type'], 'required'],
            [['created_at', 'updated_at','account_type', 'created_by', 'updated_by'], 'integer'],
             [['balance'], 'number'],
            [['name', 'memo'], 'string', 'max' => 100],
            [['operation'], 'string', 'max' => 24],
            [['account_type'], 'exist', 'skipOnError' => true, 'targetClass' => AccountCategory::className(), 'targetAttribute' => ['account_type' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
            'operation' => Yii::t('app', 'Operation'),
            'memo' => Yii::t('app', 'Memo'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'balance' => Yii::t('app', 'Balance'),
            'account_type' => Yii::t('app', 'Account Type'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[AccountType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountType()
    {
        return $this->hasOne(AccountCategories::className(), ['id' => 'account_type']);
    }

    /**
     * Gets query for [[BillPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillPayments()
    {
        return $this->hasMany(BillPayments::className(), ['account' => 'id']);
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
        return $this->hasMany(InvoicePayments::className(), ['account' => 'id']);
    }

    /**
     * Gets query for [[Transactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['account' => 'id']);
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
