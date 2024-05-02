<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string|null $address
 * @property string|null $country
 * @property int|null $country_code
 * @property int $contact
 * @property int|null $fax
 * @property string|null $email
 * @property string|null $web
 * @property string|null $skype
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property Estmates[] $estmates
 * @property Invoices[] $invoices
 * @property User $updatedBy
 */
class Customers extends \yii\db\ActiveRecord
{
	use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type', 'contact'], 'required'],
            [['country_code', 'contact', 'fax', 'created_at', 'updated_at', 'status', 'created_by', 'updated_by'], 'integer'],
            [['id', 'type'], 'string', 'max' => 50],
            [['name', 'address'], 'string', 'max' => 100],
            [['country', 'email', 'web', 'skype'], 'string', 'max' => 55],
            [['id'], 'unique'],
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
            'type' => Yii::t('app', 'Type'),
            'address' => Yii::t('app', 'Address'),
            'country' => Yii::t('app', 'Country'),
            'country_code' => Yii::t('app', 'Country Code'),
            'contact' => Yii::t('app', 'Contact'),
            'fax' => Yii::t('app', 'Fax'),
            'email' => Yii::t('app', 'Email'),
            'web' => Yii::t('app', 'Web'),
            'skype' => Yii::t('app', 'Skype'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
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
     * Gets query for [[Estmates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstmates()
    {
        return $this->hasMany(Estmates::className(), ['customer' => 'id']);
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoices::className(), ['customer' => 'id']);
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
