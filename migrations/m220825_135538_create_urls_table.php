<?php

use yii\db\Migration;

class m220825_135538_create_urls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('urls', [
            'id' => $this->primaryKey(),
            'address' => $this->text(2083)->notNull(),
            'check_frequency' => $this->integer()->notNull(),
            'error_check' => $this->integer()->notNull(),
            'creation_date' => $this->dateTime()->notNull(),
            'timestamp' => $this->bigInteger()->notNull(),
            'attempt' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('urls');
    }
}
