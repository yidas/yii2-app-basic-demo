<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table`.
 */
class m180328_031557_create_table_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('records', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->defaultValue(''),
            'updated_at' => $this->dateTime(),
            'created_at' => $this->dateTime(),
        ]);

        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->defaultValue(''),
            'records_id' => $this->integer(),
            'updated_at' => $this->dateTime(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('table');
    }
}
