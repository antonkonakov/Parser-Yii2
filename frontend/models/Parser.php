<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "parser".
 *
 * @property int $id
 * @property string $domain
 * @property string $keyword
 * @property int $position
 * @property string $date
 */
class Parser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position'], 'integer'],
            [['date'], 'safe'],
            [['domain', 'keyword'], 'string', 'max' => 255],
            [['domain', 'keyword'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain' => 'Домен',
            'keyword' => 'Ключевое слово',
            'position' => 'Position',
            'date' => 'Date',
        ];
    }
    
    public function savePosition($news) 
    {
        foreach ($news as $elem) {
            $pq = pq($elem);
            if (preg_match("/\/url\?q=/", $pq->attr('href')))
                $urlList[] = $pq->attr('href');
        }

        $domain = preg_replace("/\//", "\/", $this->domain);
        for ($i = 0; $i < count($urlList); $i++) {
            if (preg_match("/$domain/", $urlList[$i])) {
                $this->position = $i + 1;
                break;
            } else
                $this->position = "0";
        }
        return $urlList;
    }

    public function saveDate()
    {
        $this->date = date("y-m-d H:i:s");
    }
}
