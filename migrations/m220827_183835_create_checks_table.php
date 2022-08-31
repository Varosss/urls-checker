<?php

use yii\db\Migration;

class m220827_183835_create_checks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('checks', [
            'id' => $this->primaryKey(),
            'url' => $this->text(2083)->notNull(),
            'code' => $this->string()->notNull(),
            'attempt' => $this->integer()->notNull(),
            'check_date' => $this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%checks}}');
    }
}
