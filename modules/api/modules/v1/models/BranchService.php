<?php

namespace app\modules\api\modules\v1\models;
use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "branch_service".
 *
 * @property int $branch
 * @property string $service
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class BranchService extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch', 'service', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['branch', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['service'], 'string', 'max' => 45],
            [['branch', 'service'], 'unique', 'targetAttribute' => ['branch', 'service']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'branch' => Yii::t('app', 'Branch'),
            'service' => Yii::t('app', 'Service'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
