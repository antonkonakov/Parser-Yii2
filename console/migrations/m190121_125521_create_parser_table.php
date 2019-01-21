<?php

use yii\db\Migration;

/**
 * Handles the creation of table `parser`.
 */
class m190121_125521_create_parser_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('parser', [
            'id' => $this->primaryKey(),
            'domain' => $this->string(255),
            'keyword' => $this->string(255),
            'position' => $this->integer(),
            'date' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('parser');
    }
}
