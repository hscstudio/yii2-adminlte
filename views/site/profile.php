<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="panel panel-default">
	  <div class="panel-heading">
		<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
	  </div>
	  <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	  </div>
	</div>
</div>
