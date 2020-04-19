<?php

use yii\db\Migration;

/**
 * Class m200411_202234_insert_user
 */
class m200411_202234_insert_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'Admin',
            'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
            'password_hash' => '$2y$13$YtJZcwaIeelHuXzMP.sHUON1ll9fl3Ot2HwqWO3AiDmLsqngbGhG6',
            'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
            'email' => 'admin@test.ru',
            'created_at' => 1,
            'updated_at' => 1,
            'status' => 10,
        ]);
        $this->insert('{{%user}}', [
            'username' => 'User',
            'auth_key' => 'tUu1qHcd10diwUol3xeI-18MuHkkprQI',
            'password_hash' => '$2y$13$YtJZcwaIeelHuXzMP.sHUON1ll9fl3Ot2HwqWO3AiDmLsqngbGhG6',
            'password_reset_token' => 'RkD_Jw0_8H1edzLk7MM-ZKEFfYR7VbMr_1392559490',
            'email' => 'user@test.ru',
            'created_at' => 1,
            'updated_at' => 1,
            'status' => 10,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200411_202234_insert_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200411_202234_insert_user cannot be reverted.\n";

        return false;
    }
    */
}
