<?php

use yii\db\Migration;

/**
 * Class m191230_144744_change_users_field_requirements
 */
class m191230_144744_change_users_field_requirements extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%user}}', 'username', $this->string());
        $this->alterColumn('{{%user}}', 'password_hash', $this->string());
        $this->alterColumn('{{%user}}', 'email', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%user}}', 'username', $this->string()->notNull());
        $this->alterColumn('{{%user}}', 'password_hash', $this->string()->notNull());
        $this->alterColumn('{{%user}}', 'email', $this->string()->notNull());
        echo "m191230_144744_change_users_field_requirements cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191230_144744_change_users_field_requirements cannot be reverted.\n";

        return false;
    }
    */
}
