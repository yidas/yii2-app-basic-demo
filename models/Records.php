<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Records extends ActiveRecord
{ 
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'records';
    }

    /**
     * Behaviors
     *
     * @return void
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'filter', 'filter'=>'htmlspecialchars']
        ];
    }
}
