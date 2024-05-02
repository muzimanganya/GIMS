<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m211224_132348_initial_admin
 */
class m211224_132348_initial_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'users',
            ['first_name', 'middle_name', 'last_name', 'username', 'password', 'is_active', 'gender', 'date_of_birth', 'lang', 'role', 'created_at', 'updated_at'],
            [
                ['Hilkiah', 'Dii', 'Stef', 'admin', Yii::$app->security->generatePasswordHash('@123456#'), true, 'f', '2020-05-12', 'en', User::ROLE_ADMIN, time(), time()],
                ['Eli', 'Dii', 'Stef', 'student', Yii::$app->security->generatePasswordHash('@123456#'), true, 'f', '2020-05-12', 'en', User::ROLE_STUDENT, time(), time()],

            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211224_132348_initial_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211224_132348_initial_admin cannot be reverted.\n";

        return false;
    }
    */
}
