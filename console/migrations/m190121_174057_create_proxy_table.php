<?php

use yii\db\Migration;

/**
 * Handles the creation of table `proxy`.
 */
class m190121_174057_create_proxy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('proxy', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(),
            'active' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('proxy');
    }
}
