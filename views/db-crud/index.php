<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

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
        <th scope="col">Record ID</th>
        <th>Title</th>
        <th>Functions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($records as $key => $record):?>
      <tr>
        <th scope="row"><?=$record['id']?></th>
        <td scope="row"><?=$record['title']?></td>
        <td width="200">
          <a href="<?=Url::toRoute('db-crud/update')?>" class="btn btn-primary">Update</a>
          <a href="<?=Url::toRoute(['db-crud/delete', 'id'=>$record['id'] ])?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>
