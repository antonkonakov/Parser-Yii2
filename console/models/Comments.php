<?php
namespace frontend\models;
use yii\base\Model;
use yii\db\ActiveRecord;
use Yii;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comments
 *
 * @author anton
 */
class Comments extends ActiveRecord{
    //put your code here
    public static function tableName()
    {
        return '{{comments}}';
    }
    
}
