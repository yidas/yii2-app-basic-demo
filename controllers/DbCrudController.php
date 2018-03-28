<?php


namespace app\controllers;

use Yii;

class DbCrudController extends \yii\web\Controller
{
    /**
     * Index
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = '\app\models\Table';
        
        // Check Table by none error method
        $tableSchema = Yii::$app->db->schema->getTableSchema($model::tableName());
        
        if (!$tableSchema) {
            
            $this->_migrate();
        }
        
        $records = $model::find()
            ->asArray()
            ->all();
        
        return $this->render('index', [
            'records' => &$records,
        ]);
    } 

    /**
     * Create
     *
     * @return void
     */
    public function actionCreate()
    {
        $record = new \app\models\Table;

        $result = $record->save();

        $this->redirect(['db-crud/']);
    }

    /**
     * Create
     *
     * @return void
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        
        $record = \app\models\Table::findOne($id);

        $result = ($record) ? $record->delete() : null;

        $this->redirect(['db-crud/']);
    }

    /**
     * Migrate by Web
     *
     * @return void
     */
    public function _migrate()
    {
        // Keep current application
        $oldApp = \Yii::$app;
        // Load Console Application config
        $config = require \Yii::getAlias('@app'). '/config/console.php';
        new \yii\console\Application($config);
        $result = \Yii::$app->runAction('migrate', ['migrationPath' => '@app/migrations/', 'interactive' => false]);
        // Revert application
        \Yii::$app = $oldApp;
        return;
    }
}