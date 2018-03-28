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
        $this->createTable('table', [
            'id' => $this->primaryKey(),
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
