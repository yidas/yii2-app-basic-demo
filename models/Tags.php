<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use app\models\Records;

class Tags extends ActiveRecord
{ 
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'tags';
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

    public function getRecord()
    {
        return $this->hasOne(Records::className(), ['id' => 'records_id']);
    }
}
