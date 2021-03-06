<?php


namespace app\controllers;

use Yii;
use Exception;
use app\models\Records;

class DbCrudController extends \yii\web\Controller
{
    /**
     * Index
     *
     * @return string
     */
    public function actionIndex()
    {
        // Check Table by none error method
        $tableSchema = Yii::$app->db->schema->getTableSchema(Records::tableName());
        
        if (!$tableSchema) {
            
            $this->_migrate();
        }
        
        $records = Records::find()
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
        $record = new Records;

        $result = $record->save();

        $this->redirect(['db-crud/']);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function actionAjaxUpdate($id)
    {
        // JSON response
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        
        // Get PUT body
        $request = Yii::$app->request;

        $title = $request->getBodyParam('title');
        
        try {

            $model = Records::findOne($id);
            // Check record
            if (!$model) {
                throw new Exception("Record not found", 404);
            }
            $model->title = $title;

            if (!$model->validate()) {
                Yii::$app->response->statusCode = 400;
                return [
                    'errors' => $model->errors,
                ];
            }

            $result = $model->save(false);
            // Check save
            if (!$result) {
                throw new Exception("Error on update", 500);
            }

        } catch (\Exception $e) {
            
            throw $e;
        }

        return [
            'id' => $id,
            'title' => $title,
        ];
    }

    /**
     * Create
     *
     * @return void
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        
        $record = Records::findOne($id);

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
