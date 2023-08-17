<?php

use yii\db\Migration;

/**
 * Class m230817_090814_profile
 */
class m230817_090814_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230817_090814_profile cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'phone_number' => $this->string(25),
            'address' => $this->text(),
        ]);

    }

    public function down()
    {
        $this->dropTable('profile');
    }
    
}
