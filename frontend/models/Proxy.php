<?php

namespace frontend\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "proxy".
 *
 * @property int $id
 * @property string $ip
 * @property int $active
 */
class Proxy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proxy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active','id'], 'integer'],
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'IP:Port',
            'active' => 'Active',
        ];
    }
    
//    public function getProxyList()
//    { 
//        return ArrayHelper::map($this::find()->select('id, ip')->asArray()->all(),  'id', 'ip');
//    }
    
    public static function getActiveProxy()
    {
        return self::findOne(['active' => '1'])->ip;
    }

}
