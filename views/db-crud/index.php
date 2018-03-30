<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
// app\assets\AppAsset::register($this);   
app\assets\AutoAssetBundle::register($this);  

$this->title = 'DB CRUD';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    This Controller would automatically run `Migrate` if the tables doesn't exist.
  </p>

  <a href="<?=Url::toRoute('db-crud/create')?>" class="btn btn-success">Create Record</a>

  <table class="table">
    <thead>
      <tr>
        <th width="150" scope="col">Record ID</th>
        <th>Title</th>
        <th width="200">Functions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($records as $key => $record):?>
      <tr>
        <th scope="row" class="text-left"><?=$record['id']?></th>
        <td scope="row" class="field-title"><?=$record['title']?></td>
        <td>
          <button type="button" class="btn btn-primary btn-update" data-url="<?=Url::to(['ajax-update', 'id'=>$record['id']])?>">Update</button>
          <a href="<?=Url::toRoute(['db-crud/delete', 'id'=>$record['id'] ])?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>