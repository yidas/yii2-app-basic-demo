<?php


namespace app\controllers\level1;

use Yii;

class DeepController extends \yii\web\Controller
{
    /**
     * Index
     *
     * @return string
     */
    public function actionIndex()
    {
        
        return $this->render('index', []);
    } 
}