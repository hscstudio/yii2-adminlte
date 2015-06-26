<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */
//$this->context->layout = "blank";
$this->title = 'Lock Screen';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lockscreen-wrapper">
     <div class="lockscreen-logo">
		<h1><?= Html::encode($this->title) ?></h1>
	</div><!-- /.login-logo -->
	
	<!-- User name -->
	  <p class="login-box-msg">John Doe</p>
      <!-- START LOCK SCREEN ITEM -->
	  <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form',
		'class'=>'lockscreen-credentials',
		'options'=>[]]); ?>
      <div class="lockscreen-item" style="padding-left:75px;">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="<?=\yii\helpers\Url::to('adminlte/img/user1-128x128.jpg') ?>" alt="user image"/>
        </div>
        <!-- /.lockscreen-image -->
        <!-- lockscreen credentials (contains the form) -->
		<?= $form->field($model, 'password', [
			'inputOptions' => [
				'placeholder' => $model->getAttributeLabel('password'),
			],
		])->passwordInput()->label(false) ?>
      </div><!-- /.lockscreen-item -->
		<div class="row">
		<div class="col-xs-8 text-right"> 				
		  <?= Html::a('Or sign in as a different user', ['site/login']) ?>                      
		</div><!-- /.col -->
		<div class="col-xs-4">
		  <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-flat']) ?>
		</div><!-- /.col -->
		</div>
	  <?php ActiveForm::end(); ?>	
      <div class='lockscreen-footer text-center'>		
        Copyright &copy; 2015 <b><a href="http://www.hafidmukhlasin.com" class='text-black'>Hafid Mukhlasin</a></b><br>
        All rights reserved
      </div>
</div>
